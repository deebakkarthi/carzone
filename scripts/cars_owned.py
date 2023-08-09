#!/usr/bin/env python3

import sqlite3
import random

conn = sqlite3.connect("../db/main.db")

c = conn.cursor()

c.execute("SELECT username FROM customer;")

user_id = c.fetchall()

for x in user_id:
    for i in range(0,random.randint(1,5)):
        c.execute("SELECT car_id FROM car ORDER BY RANDOM() LIMIT 1;")
        car_id = c.fetchall()
        car_id = car_id[0][0]
        row = {"user_id":x[0],"car_id":car_id}
        c.execute("""INSERT OR IGNORE INTO cars_owned VALUES(
                    :user_id,
                    :car_id
                );""",row)
        print(row)
conn.commit()
conn.close()
