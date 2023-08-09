#!/usr/bin/env python3

import sqlite3
import uuid

f = open("../res/csv/cars.csv")

conn = sqlite3.connect("../db/main.db")
c = conn.cursor()

for x in f:
    l = x.split(',')
    l[-1] = l[-1].replace('\n','')
    print(l)
    fname = l[0] + l[1]
    car_id = str(uuid.uuid4())
    val = {'car_id': car_id,
            'make':l[0],
            'model':l[1],
            }
    print(val)
    c.execute("""INSERT INTO car VALUES(:car_id,:make,:model)""",val)
conn.commit()
conn.close()
