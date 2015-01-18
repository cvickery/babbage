#! /usr/local/bin/python3

import sys
import os
from stat import *
import datetime
import cgi
import xlrd
# enable debugging
import cgitb
import pprint
cgitb.enable()

def oops(msg):
  """ Die because something went oops
  """
  sys.stdout.buffer.write("""
 <h1>Unable To Check Grades</h1>
 <p>{}</p>
                          """.format(msg).encode('utf-8'))
  exit()

args = cgi.FieldStorage()

sys.stdout.buffer.write("Content-Type: text/html; charset=utf-8\r\n\r".encode('utf-8'))

if 'course' not in args: oops('Missing course')
if 'semester' not in args: oops('Missing term')
if 'student_id' not in args: oops('Missing student')
workbook_file = '../../Grades/' + args['semester'].value + '.xls'
if not os.path.isfile(workbook_file): oops("Missing file: {}.xls".
                                            format(args['semester'].value))
stats = os.stat(workbook_file)
mtime = stats.st_mtime
modtime = datetime.datetime.fromtimestamp(mtime).strftime('%B %d, %Y at %I:%M %p')

sys.stdout.buffer.write("""
<?xml version='1.0' encoding='UTF-8'?>
<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en'>
  <head>
    <title>Check My Grades</title>
  </head>
  <body>
    <h1>“Hello World!”</h1>
    <p>Grades were last updated {}</p>
  </body>
</html>
""".format(modtime)
   .encode('utf-8'))
