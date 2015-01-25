#! /usr/local/bin/python3

import sys
import os
from stat import *
import datetime

# excel stuff
import xlrd

# email stuff
import  smtplib
from    email.headerregistry  import Address
from    email.message         import EmailMessage
from    email.utils           import formatdate

# CGI stuff -- with debugging
import cgi
import cgitb
import pprint
cgitb.enable()

def oops(msg):
  """ Die because something went oops.
  """
  sys.stdout.buffer.write("""
   <h1>Unable To Check Grades</h1>
   <h2>{}</h2>
                          """.format(msg).encode('utf-8'))
  exit()

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
student_id = int(args['student_id'].value)

include_data = ''
if 'include-file' in args:
  with open('../courses/{}/{}/{}'.format(sheet_name, semester, args['include-file'].value)) as inc:
    include_data = inc.read()

""" Locate and open workbook
"""
workbook_file = '../../Grades/{}.xls'.format(semester)
if not os.path.isfile(workbook_file): oops("Missing file: {}.xls".format(semester))

modtime = datetime.datetime.fromtimestamp(os
                                          .stat(workbook_file)
                                          .st_mtime).strftime('%B %d, %Y at %I:%M %p')
try:
  wbk = xlrd.open_workbook(workbook_file)
  grades_sheet  = wbk.sheet_by_name(sheet_name)
  sheet_name    = sheet_name + '_emails'
  emails_sheet  = wbk.sheet_by_name(sheet_name)
except:
  oops('Error accessing sheet {} in {}.xls'.format(sheet_name, semester))

""" Find the student
"""
student_row = -1
for rowx in range(grades_sheet.nrows):
  if grades_sheet.cell(rowx, 0).ctype == xlrd.XL_CELL_NUMBER:
    if  int(grades_sheet.cell(rowx, 0).value) == student_id:
      student_row = rowx
      break
if student_row == -1: oops('Student ID {} not found in {}'.format(student_id, course))

row = grades_sheet.row(student_row)
fname = row[1].value
lname = row[2].value
if row[0].value != emails_sheet.row(student_row)[0].value:
  oops('ID error: {} is not {}'.format(row[0].value, emails_sheet.row(student_row)[0].value))
emails = [ emails_sheet.row(student_row)[3].value ]
email_info = '<h2>Email would go to:</h2><blockquote><p>' + emails[0]
if len(emails_sheet.row(student_row)) > 4:
  emails.append(emails_sheet.row(student_row)[4].value)
  email_info = email_info + '<br/>' + emails[1]
  emails_info = '</blockquote>'

""" Construct the HTML and text tables of grades
"""
text_table = ''
html_table = """
  <table>
    <thead>
      <tr>
        <th>Item</th><th>Your Score</th>
      </tr>
    </thead>
    <tbody>
"""
for col in range(3, len(row)):
  if grades_sheet.cell(0, col).ctype != xlrd.XL_CELL_BLANK:
    name  = grades_sheet.cell(0, col).value
    value = row[col].value
    if row[col].ctype == xlrd.XL_CELL_NUMBER and value == int(value): value = int(value)
    html_table = html_table + '<tr><th>{}</th><td>{}</td></tr>'.format(name, value)
    text_table = text_table + '{:<15} {}\n'.format(name,value)
html_table = html_table + '</tbody></table>'

""" Style the HTML table
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
</style>
"""

""" Localhost page: show the grades table and notes
"""
xhtml_page = """
<?xml version='1.0' encoding='UTF-8'?>
<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en'>
  <head>
    <title>Check My Grades</title>
    {}
  </head>
  <body>
    <h1>{} Grades for {} {}</h1>
    <h2>Grades were last updated {}</h2>
    {}
    {}
    {}
  </body>
</html>
""".format(css, course, fname, lname, modtime, email_info, html_table, include_data).encode('utf-8')

if 'localhost' in os.environ['SERVER_NAME']:
  sys.stdout.buffer.write(xhtml_page)
else:
  student_name = '{} {}'.format(fname, lname)
  to_list = [Address(student_name, addr_spec = x) for x in emails]
  text_content  = """
{} Grades for {}{}
Grades were last updated {}
{}
{}
""".format(course, fname, lname, modtime, text_table, include_data)
  html_content  = """

<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en'>
  <head>
    {}
  </head>
  <body>
    <h1>{} Grades for {} {}</h1>
    <h2>Grades were last updated {}</h2>
    {}
    {}
  </body>
</html>
""".format(css, course, fname, lname, modtime, html_table, include_data).encode('utf-8')

  msg               = EmailMessage()
  msg['Subject']    = 'Your CSCI-100 Grades'
  msg['From']       = Address('Christopher Vickery', addr_spec='christopher.vickery@qc.cuny.edu')
  ## Tuples allow for multiple Address() items, but single Address() items work too
  msg['To']         = to_list
  msg['Bcc']        = Address('Christopher Vickery', addr_spec='christopher.vickery@qc.cuny.edu')
  msg.add_header('Reply-To', 'christopher.vickery@qc.cuny.edu')
  msg.add_header('Date', formatdate(localtime=True))
  msg.set_content(text_content)
  msg.add_alternative(html_content, subtype='html')
  mailer = smtplib.SMTP('smtp.qc.cuny.edu')
  mailer.send_message(msg)
  mailer.quit()
