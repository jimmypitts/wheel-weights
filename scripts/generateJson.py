import os
import json

with open('weights.csv', 'r') as f:
  rv = []
  for line in f:
    result = line.split(',')

    try:
      name    = result[0]
      method  = result[1]
      size    = result[2]
      weight  = result[3]
    except:
      continue

    # Split the single entry into multiple searchable entries
    height, width = size.split('x')

    # Clean up the variables
    name = name.strip()
    method = method.strip()
    height = height.strip()
    width = width.strip()
    weight = weight.strip()

    wheel = {
      'name': name,
      'method': method,
      'height': height,
      'width': width,
      'weight': weight
    }
    rv.append(wheel)

with open('wheels.json', 'w') as f:
  f.write(json.dumps(rv))

print 'complete'

