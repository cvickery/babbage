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


""" Web page headers
"""
sys.stdout.buffer.write("Content-Type: text/html; charset=utf-8\r\n\r\n".encode('utf-8'))

student_name = 'Christopher Vickery'
emails = ['cvickery@qc.cuny.edu', 'cvickery@gmail.com']
to_list = [Address(student_name, addr_spec=x) for x in emails]
email_info = '</h2><blockquote><p>"{}" &lt;{}@{}></p>'\
            .format(to_list[0].display_name, to_list[0].username, to_list[0].domain)
if len(to_list) > 1:
  email_info += '<p>"{}" &lt;{}@{}></p>'.format(to_list[1].display_name, to_list[1].username,
                                             to_list[1].domain)
email_info += '</blockquote>'

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

msg               = EmailMessage()
msg['Subject']    = 'Your Python email test'
msg['From']       = Address('Christopher Vickery', addr_spec='christopher.vickery@qc.cuny.edu')
msg['To']         = 'cvickery@gmail.com'
msg.add_header('Date',        formatdate(localtime=True))
msg.add_header('Message-ID',  make_msgid())

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

  msg.set_content(text_message)
  msg.add_alternative(html_content, subtype='html')
  server = smtplib.SMTP('smtp.qc.cuny.edu')
  server.send_message(msg)
  server.quit()
sys.stdout.buffer.write(xhtml_page)
