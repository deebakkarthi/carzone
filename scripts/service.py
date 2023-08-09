#!/usr/bin/env python3


import sqlite3
import secrets
import hashlib

conn = sqlite3.connect("../db/main.db")
c = conn.cursor()

c.execute("SELECT username FROM customer;")
temp = c.fetchall()
users = []
comment = ["Never visiting again",
        "Poor quality parts",
        "Delivery could have been faster",
        "Great service but need more mechanics",
        "Best place to repair. Loved it"
        ]
for x in temp:
    users.append(x[0])
for x in users:
    d = secrets.randbelow(10)
    m = secrets.randbelow(60)
    c.execute("SELECT strftime('%s',(SELECT strftime('%s')),'unixepoch',?,?);",(str(d)+" days",str(m)+" minutes"))
    date = c.fetchall()
    date = date[0][0]
    service_id = hashlib.md5((date + str(secrets.randbelow(10)+1)).encode())
    service_id = service_id.hexdigest()[:8]
    rating = secrets.randbelow(4)
    row = {'service_id':service_id,
            'username':x,
            'date':date,
            'rating':rating + 1,
            'comment':comment[rating],
            }
    print(row)
    c.execute("INSERT INTO service VALUES (:service_id,:username,:date,:rating,:comment);",row)
conn.commit()
conn.close()
