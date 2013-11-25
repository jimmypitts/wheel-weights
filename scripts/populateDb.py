import os
import json
import MySQLdb

db = MySQLdb.Connection(
  '127.0.0.1',
  'root',
  'root',
  'wheels'
)

with open('wheels.json', 'r') as f:
  wheels = json.loads(f.readline())


cursor = db.cursor()

for wheel in wheels:
  statement = "insert into wheels (name, method, height, width, weight) " \
      'values ("' + wheel['name'] + '","' + wheel['method'] + '",' + wheel['height'] + ',' + wheel['width'] + ',' + wheel['weight'] + ');'

  cursor.execute(statement)


db.commit()
db.close()
print 'complete'
