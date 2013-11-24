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


print db
