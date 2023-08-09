#!/usr/bin/env python3


import sqlite3
import random
import uuid

conn = sqlite3.connect("../db/main.db")
c = conn.cursor()

res = ["Brake Repair",
        "Oil Change",
        "Wiper",
        "General Checkup",
        "Tire Replacement",
        "Battery Replacement",
        "Coolant Check",
        "Wheel Balance"]
for i in res:
    part_id = str(uuid.uuid4())
    name = i
    price = random.randint(50,200)
    row = {'part_id':part_id,
            'car_id':0,
            'name':name,
            'price':price
            }
    print(row)
    c.execute("INSERT INTO part VALUES(:part_id,:car_id,:name,:price)",row)
conn.commit()
conn.close()
