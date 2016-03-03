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

emails = ['cvickery@gmail.com', 'christopher.vickery@qc.cuny.edu']
to_list = [Address('Christopher Vickery', addr_spec=x) for x in emails]

# Construct the test messages
# --------------------------------------------
text_message = """
Congratulations.
"""
html_message = """
  <p>Congratulations</p>
"""

msg               = EmailMessage()
msg['Subject']    = 'Your Python email test'
msg['From']       = Address('Christopher Vickery', addr_spec='christopher.vickery@qc.cuny.edu')
msg['To']         = to_list
msg.add_header('Date',        formatdate(localtime=True))
msg.add_header('Message-ID',  make_msgid())
msg.set_content(text_message)
msg.add_alternative(html_message, subtype='html')
server = smtplib.SMTP('smtp.qc.cuny.edu')
server.send_message(msg)
server.quit()
print('Sent email to {} and {}'.format(emails[0], emails[1]))