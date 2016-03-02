#! /usr/local/bin/python3

import sys
import os
import re
import datetime
from stat import *

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
  print("""
   <h1>Unable To Send Email</h1>
   <h2>{}</h2>
                          """.format(msg))
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


  text = '{}: {}'.format(h3_leadin, h3_value)
  text_message = text_message + text + '\n'
  html_message = html_message + '<h3>{}</h3>'.format(text)
  if len(data) <= start_at:
    return (text_message + 'No information yet\n', html_message + '<p>No information yet</p>')
  text_1 = '{:<7}:'.format(header_1)
  text_2 = '{:<7}:'.format('Score')
  html = '<table><tr><th><strong>{}:<br/>Score:</strong></th>'.format(header_1)

  num_cols = 0
  for col in range(start_at, len(headers)):
    if headers[col] == '--': continue
    if num_cols > 0:
      if (num_cols % 6) == 0:
        text_1 = text_1 + '\n'
        text_2 = text_2 + '\n'
      if (num_cols % 10) == 0:
        html = html + '</tr><tr><th><strong>{}:<br/>Score:</strong></th>'.format(header_1)
    num_cols = num_cols + 1
    header_str = headers[col]
    text_1 = text_1 + '{:8}'.format(header_str)
    if data[col].value:
      text_2 = text_2 + '{:8}'.format(data[col].value)
      html = html + '<td>{}<br/>{}</td>'.format(header_str.replace(' ','&nbsp;'), data[col].value)
    else:
      text_2 = text_2 + '        '
      html = html + '<td>{}<br/>{}</td>'.format(header_str.replace(' ','&nbsp;'), '&nbsp;')

  text_message = text_message + text_1 + '\n' + text_2 + '\n'
  html_message = html_message + html + '</tr></table>'
  return (text_message, html_message)

""" Web page headers
"""
sys.stdout.buffer.write("Content-Type: text/html; charset=utf-8\r\n\r\n".encode('utf-8'))


emails = ['christopher.vickery@qc.cuny.edu',
          'cvickery@gmail.com']

# Construct the test message
# --------------------------------------------
text_message = """
Congratulations.
"""
html_message = """
  <p>Congratulations</p>
"""

""" Style the HTML message
"""
css = """
<style type='text/css'>
  * {font-family: sans-serif;}
  h1 {color: blue;}
</style>
"""

""" Localhost page: show the test page
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
      <title>Test Message</title>
      {}
    </head>
    <body>
      <h1>This is your HTML test message</h1>
      {}
    </body>
  </html>
  """.format(css, email_info, html_message).encode('utf-8')
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
      <title>Test Message</title>
      {}
    </head>
    <body>
      <h1>This is your HTML test message</h1>
      {}
    </body>
  </html>
  """.format(css, email_info).encode('utf-8')
  to_list = [Address('Christopher Vickery', addr_spec = x) for x in emails]
  text_content  = """
This is your text test message.
{}
""".format(text_message)

  html_content  = """
  <head>
    {}
  </head>
  <body>
    <h1>HTML Test Message</h1>
    {}
  </body>
</html>
""".format(css, html_message)

  msg               = EmailMessage()
  msg['Subject']    = 'Your Python email test'
  msg['From']       = Address('Christopher Vickery', addr_spec='christopher.vickery@qc.cuny.edu')
  msg['To']         = to_list
  msg['Bcc']        = Address('Christopher Vickery', addr_spec='christopher.vickery@qc.cuny.edu')
  msg.add_header('Reply-To',    'christopher.vickery@qc.cuny.edu')
  msg.add_header('Date',        formatdate(localtime=True))
  msg.add_header('Message-ID',  make_msgid())
  msg.set_content(text_message)
  msg.add_alternative(html_content, subtype='html')
  mailer = smtplib.SMTP('smtp.qc.cuny.edu')
  mailer.send_message(msg)
  mailer.quit()
sys.stdout.buffer.write(xhtml_page)
