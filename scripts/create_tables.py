#!/usr/bin/env python3

import sqlite3

conn = sqlite3.connect('../db/main.db')

c = conn.cursor()

c.execute('''CREATE TABLE customer(
username TEXT PRIMARY KEY,
firstname TEXT,
middlename TEXT,
lastname TEXT,
salt TEXT,
hash TEXT,
email TEXT,
phone_number TEXT
);''')

c.execute("""CREATE TABLE address(
username TEXT,
door_no TEXT,
street TEXT,
city TEXT,
PIN TEXT,
PRIMARY KEY(username,door_no,street,city,PIN),
FOREIGN KEY (username) REFERENCES customer(username)
);""")

c.execute("""CREATE TABLE card(
card_no INTEGER PRIMARY KEY,
name TEXT,
expiry INTEGER
);""")

c.execute("""CREATE TABLE payment(
username TEXT,
card_no INTEGER,
PRIMARY KEY(username,card_no),
FOREIGN KEY(username) REFERENCES customer(username),
FOREIGN KEY(card_no) REFERENCES card(card_no)
);""")

c.execute("""CREATE TABLE car(
car_id TEXT PRIMARY KEY,
make TEXT,
model TEXT
);""")

c.execute("""CREATE TABLE cars_owned (
username TEXT,
car_id TEXT,
PRIMARY KEY (username, car_id),
FOREIGN KEY(username) REFERENCES customer(username),
FOREIGN KEY(car_id) REFERENCES car(car_id));""")

c.execute("""CREATE TABLE part(
part_id TEXT PRIMARY KEY,
car_id TEXT,
name TEXT,
price FLOAT
);""")

c.execute("""CREATE TABLE service(
service_id TEXT PRIMARY KEY,
username TEXT,
date INTEGER,
rating INTEGER,
comment TEXT,
FOREIGN KEY (username) REFERENCES customer(username)
);""")

c.execute("""CREATE TABLE services_done(
service_id TEXT,
part_id TEXT,
quantity INTEGER,
PRIMARY KEY (service_id, part_id),
FOREIGN KEY(part_id) REFERENCES part(part_id),
FOREIGN KEY(service_id) REFERENCES service(service_id));""")
conn.commit()
conn.close()
