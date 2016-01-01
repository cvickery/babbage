#! /usr/local/bin/python3

import sys
import os
import re
import datetime
from stat import *

# excel stuff
import xlrd

# email stuff
import  smtplib
from    email.headerregistry  import Address
from    email.message         import EmailMessage
from    email.utils           import formatdate
from    email.utils           import make_msgid

# CGI stuff -- with debugging
import cgi
import cgitb
import pprint
cgitb.enable()

# oops()
# ---------------------------------------------------------
def oops(msg):
  """ Die because something went oops.
  """
  sys.stdout.buffer.write("""
   <h1>Unable To Check Grades</h1>
   <h2>{}</h2>
                          """.format(msg).encode('utf-8'))
  exit()

# html2str()
# ---------------------------------------------------------
def html2text(str):
  """ Convert HTML to plain text.
      Change <p> to \n, then get rid of all other tags.
  """
  return_str = str.replace('<p>', '\n')
  return_str = re.sub(r'<.*?>', '', return_str)
  return return_str.replace('\n\n', '\n')

# get_student()
# ---------------------------------------------------------
def get_student(wbk, sheet_name, student_id):
  """ Get the header row and student data from a named sheet in a
      workbook. Die if the student isn't there.
  """
  try:
    sheet = wbk.sheet_by_name(sheet_name)
  except:
    oops('Workbook sheet {} not found'.format(sheet_name))

  for row in range(sheet.nrows):
    if sheet.cell(row, 0).ctype == xlrd.XL_CELL_NUMBER and int(sheet.cell(row, 0).value) == student_id:
      # sys.stdout.buffer.write('{}: found {}'.format(sheet_name, student_id).encode('utf-8'))
      return {'headers':sheet.row(0), 'data':sheet.row(row)}
    # else:
    #  sys.stdout.buffer.write('<p>{}: %{}% ({}) does not equal %{}%</p>'.format(sheet_name, sheet.cell(row, 0).value, sheet.cell(row,0).ctype, student_id).encode('utf-8'))
  oops('Student ID {} not found in {}'.format(student_id, sheet_name))

# do_sheet()
# ----------------------------------------------------------
def do_sheet(h3, sheet, text_message, html_message, header_1 = 'Date'):
  headers = sheet['headers']
  data    = sheet['data']
  value   = ''
  if len(data) > 3:
    if data[3].ctype == xlrd.XL_CELL_NUMBER:
      value = round(data[3].value, 1)
    else:
      value = data[3].value
  text = '{}: {}'.format(h3, value)
  text_message = text_message + text + '\n'
  html_message = html_message + '<h3>{}</h3>'.format(text)
  if len(data) < 5:
    return (text_message + 'No data\n', html_message + '<p>No data</p>')
  text_1 = '{:<7}:'.format(header_1)
  text_2 = '{:<7}:'.format('Score')
  html = '<table><tr><th><strong>{}:<br/>Score:</strong></th>'.format(header_1)
  num_cols = 0
  for col in range(4,len(headers)):
    if headers[col].ctype == xlrd.XL_CELL_EMPTY: continue
    if num_cols > 0:
      if (num_cols % 6) == 0:
        text_1 = text_1 + '\n'
        text_2 = text_2 + '\n'
      if (num_cols % 10) == 0:
        html = html + '</tr><tr><th><strong>{}:<br/>Score:</strong></th>'.format(header_1)
    num_cols = num_cols + 1
    header_str = headers[col].value
    if headers[col].ctype == xlrd.XL_CELL_DATE:
      header_str = datetime.datetime(*xlrd.xldate_as_tuple(headers[col].value, wbk.datemode)).strftime('%b %d')
    text_1 = text_1 + '{:8}'.format(header_str)
    text_2 = text_2 + '{:8}'.format(data[col].value)
    html = html + '<td>{}<br/><strong>{}</strong></td>'.format(header_str.replace(' ','&nbsp;'), data[col].value)

  text_message = text_message + text_1 + '\n' + text_2 + '\n'
  html_message = html_message + html + '</tr></table>'
  return (text_message, html_message)


""" Get form data
"""
args = cgi.FieldStorage()

""" Web page headers
"""
sys.stdout.buffer.write("Content-Type: text/html; charset=utf-8\r\n\r\n".encode('utf-8'))

""" Check/Extract form data
"""
if 'course' not in args: oops('Missing course')
course = args['course'].value
sheet_name = course.lower().replace('csci', 'cs').replace('-', '')

if 'semester' not in args: oops('Missing term')
semester = args['semester'].value

if 'student_id' not in args: oops('Missing student ID')

include_data = ''
if 'include-file' in args:
  with open('../courses/{}/{}/{}'.format(sheet_name, semester, args['include-file'].value),
            encoding='utf-8') as inc:
    include_data = inc.read()

""" Locate and open workbook
"""
workbook_file = '../../Grades/{}.xls'.format(semester)
if not os.path.isfile(workbook_file): oops("Missing file: {}.xls".format(semester))

modtime = datetime.datetime.fromtimestamp(os
                                          .stat(workbook_file)
                                          .st_mtime).strftime('%B %d, %Y at %I:%M %p')
try:
  wbk           = xlrd.open_workbook(workbook_file)
except:
  oops('Unable to open ' + workbook_file)

# Be sure Student ID supplied is an unambiguous sequence of digits.
student_id = args['student_id'].value.strip()
student_ids = []
try:
    sheet = wbk.sheet_by_name('Roster')
except:
    oops('Workbook sheet "Roster" not found')

for row in range(sheet.nrows):
  if sheet.cell(row, 0).ctype == xlrd.XL_CELL_NUMBER and \
     student_id in '{:08}'.format(int(sheet.cell(row, 0).value)):
    student_ids.append(int(sheet.cell(row, 0).value))
if len(student_ids) == 0: oops('Student ID "{}" not in Roster'.format(student_id))
if len(student_ids)  > 1: oops('Student ID "{}" is ambiguous. Use more digits.'.format(student_id))
student_id = student_ids[0]

roster        = get_student(wbk, 'Roster', student_id)
takeaways     = get_student(wbk, 'Takeaways', student_id)
quizzes       = get_student(wbk, 'Quizzes', student_id)
assignments   = get_student(wbk, 'Assignments', student_id)
other_grades  = get_student(wbk, 'Other Grades', student_id)

data = roster['data']
fname = data[2].value
lname = data[1].value
student_name = '{} {}'.format(fname, lname)

emails = [ data[3].value ]
if data[4].ctype != xlrd.XL_CELL_EMPTY :
  emails.append(data[4].value)

# Construct the HTML and text tables of grades
# --------------------------------------------
text_message = ''
html_message = ''

#  Takeaways
text_message, html_message = do_sheet('Takeaways',
                                      takeaways,
                                      text_message,
                                      html_message)
text_message, html_message = do_sheet('Quizzes',
                                      quizzes,
                                      text_message,
                                      html_message)
text_message, html_message = do_sheet('Assignments',
                                      assignments,
                                      text_message,
                                      html_message,
                                      header_1 = 'Date/Item')
text_message, html_message = do_sheet('Other Grades',
                                      other_grades,
                                      text_message,
                                      html_message,
                                      header_1 = 'Item')

""" Style the HTML message
"""
css = """
<style type='text/css'>
  * {font-family: sans-serif;}
  table {
  border-collapse: collapse;
  border: 1px solid lightgray;
  }
  th, td {
    padding: 0.1em 0.5em;
    border: 1px solid lightgray;
    text-align: center;
  }
  tbody th {
    text-align: right;
  }
  thead {
    background-color: lightgray;
  }
  thead th {
    border: 1px solid black;
  }
  h3 {
    margin:1em 0 0 0;
  }
  .scores {
    display: inline-block;
    width: 5em;
    padding:0.1em;
  }
</style>
"""

""" Localhost page: show the grades table and notes
"""
if 'localhost' in os.environ['SERVER_NAME']:
  email_info = '<h2>Email would go to:</h2><blockquote><p>' + emails[0]
  if len(emails) > 1: email_info = email_info + '<br/>' + emails[1]
  emails_info = email_info + '</blockquote>'

  xhtml_page = """
  <?xml version='1.0' encoding='UTF-8'?>
  <!DOCTYPE html>
  <html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en'>
    <head>
      <title>Check My Grades</title>
      {}
    </head>
    <body>
      <h1>{} Grades for {}</h1>
      <h2>Grades were last updated {}</h2>
      {}
      {}
      {}
    </body>
  </html>
  """.format(css, course, student_name, modtime,
             email_info, html_message, include_data).encode('utf-8')
else:
  email_info  = '<blockquote><p>' + emails[0]
  syntax      = ' with your grades has'
  if len(emails) > 1:
    email_info  = email_info + '<br/>' + emails[1]
    syntax      = 's with your grades have'
  email_info = '<h2>Email{} been sent to:</h2>{}</blockquote>'.format(syntax, email_info)
  xhtml_page = """
  <?xml version='1.0' encoding='UTF-8'?>
  <!DOCTYPE html>
  <html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en'>
    <head>
      <title>Check My Grades</title>
      {}
    </head>
    <body>
      <h1>{} Grades for {}</h1>
      <h2>Grades were last updated {}</h2>
      {}
      {}
    </body>
  </html>
  """.format(css, course, student_name, modtime,
             email_info, include_data).encode('utf-8')
  to_list = [Address(student_name, addr_spec = x) for x in emails]
  text_content  = """
{} Grades for {}
Grades were last updated {}
{}
{}
""".format(course, student_name, modtime, text_message, html2text(include_data))

  html_content  = """
  <head>
    {}
  </head>
  <body>
    <h1>{} Grades for {}</h1>
    <h2>Grades were last updated {}</h2>
    {}
    {}
  </body>
</html>
""".format(css, course, student_name, modtime, html_message, include_data)

  msg               = EmailMessage()
  msg['Subject']    = 'Your CSCI-100 Grades'
  msg['From']       = Address('Christopher Vickery', addr_spec = 'christopher.vickery@qc.cuny.edu')
  msg['To']         = to_list
  msg['Bcc']        = Address('Christopher Vickery', addr_spec = 'christopher.vickery@qc.cuny.edu')
  msg.add_header('Reply-To',    'christopher.vickery@qc.cuny.edu')
  msg.add_header('Date',        formatdate(localtime=True))
  msg.add_header('Message-ID',  make_msgid())
  msg.set_content(text_message)
  msg.add_alternative(html_content, subtype='html')
  mailer = smtplib.SMTP('smtp.qc.cuny.edu')
  mailer.send_message(msg)
  mailer.quit()
sys.stdout.buffer.write(xhtml_page)
