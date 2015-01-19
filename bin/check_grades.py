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

""" Check/Extract arguments
"""
if 'course' not in args: oops('Missing course')
course = args['course'].value
sheet_name = course.lower().replace('csci', 'cs').replace('-', '')

if 'semester' not in args: oops('Missing term')
semester = args['semester'].value

if 'student_id' not in args: oops('Missing student')
student_id = int(args['student_id'].value)

""" Locate and open workbook
"""
workbook_file = '../../Grades/{}.xls'.format(semester)
if not os.path.isfile(workbook_file): oops("Missing file: {}.xls".format(semester))

modtime = datetime.datetime.fromtimestamp(os
                                          .stat(workbook_file)
                                          .st_mtime).strftime('%B %d, %Y at %I:%M %p')
try:
  wbk = xlrd.open_workbook(workbook_file)
  sheet = wbk.sheet_by_name(sheet_name)
except:
  oops('Error accessing sheet {} in {}.xls'.format(sheet_name, semester))

""" Find the student
"""
student_row = -1
for rowx in range(sheet.nrows):
  if sheet.cell(rowx, 0).ctype == xlrd.XL_CELL_NUMBER:
    if  int(sheet.cell(rowx, 0).value) == student_id:
      student_row = rowx
      break
if student_row == -1: oops('Student ID {} not found in {}'.format(student_id, course))
row = sheet.row(student_row)
fname = row[1].value
lname = row[2].value

table = '<table>'
for col in range(3, len(row)):
  if sheet.cell(0, col).ctype != xlrd.XL_CELL_BLANK:
    value = row[col].value
    if row[col].ctype == xlrd.XL_CELL_NUMBER and value == int(value): value = int(value)
    table = table + '<tr><th>{}</th><td>{}</td></tr>'.format(sheet.cell(0, col).value, value)
table = table + '</table>'

""" Generate the web page
      Note: this will become the email message body later
"""
sys.stdout.buffer.write("""
<?xml version='1.0' encoding='UTF-8'?>
<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en'>
  <head>
    <title>Check My Grades</title>
  </head>
  <body>
    <h1>“Grades for {} {} in {}”</h1>
    <p>Grades were last updated {}</p>
    {}
  </body>
</html>
""".format(fname, lname, course, modtime, table)
   .encode('utf-8'))
