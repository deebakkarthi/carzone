#!/usr/bin/env python3


import sqlite3
import random
import uuid

conn = sqlite3.connect("../db/main.db")
c = conn.cursor()

c.execute("SELECT car_id from car where car_id != 0;")
res = c.fetchall()
opt = ["Halogen","LED","Projector"]
for i in res:
    part_id = str(uuid.uuid4())
    name = random.choice(opt) + "-Headlight"
    price = random.randint(50,100)
    row = {'part_id':part_id,
            'car_id':i[0],
            'name':name,
            'price':price
            }
    print(row)
    c.execute("INSERT INTO part VALUES(:part_id,:car_id,:name,:price)",row)
conn.commit()
conn.close()
