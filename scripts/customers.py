#!/usr/bin/env python3

f = open("../res/csv/customers.csv")
import secrets
import string
import hashlib
import sqlite3
import time

conn = sqlite3.connect("../db/main.db")

c = conn.cursor()
 
for x in f:
    l = x.split(",")
    l[-1] = l[-1].replace("\n","")
    salt = ''.join(secrets.choice(string.ascii_uppercase + string.ascii_lowercase + string.digits) for i in range(8))
    pswd = l[3]
    phsh = hashlib.sha256((salt+pswd).encode())
    phsh = phsh.hexdigest()
    mname = ''.join(secrets.choice(string.ascii_uppercase))
    username = str(l[0]+mname+l[1])
    username.replace(" ","")
    username = username.lower()
    username = username + str(secrets.choice(range(0,10)))
    date = 1701388800
    card_no = l[8].strip()
    card_no = card_no.replace(" ","")
    card_no = int(card_no)
    row = {'username':username,
            'firstname':l[0],
            'middlename':mname,
            'lastname':l[1],
            'salt':salt,
            'hash':phsh,
            'email':l[2],
            'phone':l[3],
            }
    row2 = {
            'username':username,
            'door_no':int(l[6]),
            'street':l[5],
            'city':l[4],
            'pin':int(l[7]),
        }
    row3 = {
            'card_no':card_no,
            'name':str(l[0]+" "+l[1]),
            'expiry':date
            }
    row4 = {
            'username':username,
            'card_no':card_no
            }
    c.execute("""
    INSERT INTO customer VALUES(
    :username,
    :firstname,
    :middlename,
    :lastname,
    :salt,
    :hash,
    :email,
    :phone
    );""",row)
    c.execute("""
    INSERT INTO address VALUES(
    :username,
    :door_no,
    :street,
    :city,
    :pin
    );
    """,row2)
    c.execute("""
    INSERT OR IGNORE INTO card VALUES(
    :card_no,
    :name,
    :expiry
    );
    """,row3)
    c.execute("""
    INSERT INTO payment VALUES(
    :username,
    :card_no
    );
    """,row4)
    print(row)
    print(row2)
    print(row3)
    print(row4)
conn.commit()
conn.close()
