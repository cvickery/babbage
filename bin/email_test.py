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

emails = ['cvickery@qc.cuny.edu', 'cvickery@gmail.com']
to_list = [Address(student_name, addr_spec=x) for x in emails]

# Construct the test messages
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
msg['To']         = emails
msg.add_header('Date',        formatdate(localtime=True))
msg.add_header('Message-ID',  make_msgid())
msg.set_content(text_message)
msg.add_alternative(html_content, subtype='html')
server = smtplib.SMTP('smtp.qc.cuny.edu')
server.send_message(msg)
server.quit()
print('Sent email to {} and {}'.format(emails[0], emails[1]))