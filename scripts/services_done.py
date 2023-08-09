#!/usr/bin/env python3

import sqlite3
import random

conn = sqlite3.connect("../db/main.db")
c = conn.cursor()

c.execute("SELECT service_id,username FROM service;")
res = c.fetchall()
service_id = {}
user_id = []
for x in res:
    service_id[x[1]] = x[0]
    user_id.append(x[1])
for x in user_id:
    c.execute("SELECT car_id FROM cars_owned WHERE username = ?",(x,))
    temp = c.fetchall()
    cars = []
    parts = {}
    for i in temp:
        cars.append(i[0])
    for i in cars:
        c.execute("SELECT part_id FROM part WHERE car_id = ? or car_id = -1",(i,))
        res = c.fetchall()
        temp = []
        for j in res:
            temp.append(j[0])
        parts[i] = temp
    car = random.choice(cars)
    part = random.choice(parts[car])
    quantity = random.randint(1,5)
    print(service_id[x],part,quantity)
    row = {'service_id':service_id[x],
            'part_id':part,
            'quantity':quantity
            }
    c.execute("INSERT INTO services_done VALUES (:service_id,:part_id,:quantity)",row)
conn.commit()
conn.close()
