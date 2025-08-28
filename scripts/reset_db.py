#!/usr/bin/env python3


# TODO: Make this file as "reset_db.py"
# put all the insertion logic in this file

import os
import random
import sqlite3
import time
import uuid

import bcrypt

DB_PATH = "../db/main.db"


def db_backup():
    backup_file_path = DB_PATH + "." + time.strftime("%Y%m%d-%H%M%S") + ".bak"
    print(backup_file_path)
    try:
        os.rename(DB_PATH, backup_file_path)
        print(f"File '{DB_PATH}' moved successfully.")
    except FileNotFoundError:
        print(f"File '{DB_PATH}' not found.")
    except Exception as e:
        print(f"An error occurred while moving the file: {e}")


def db_create_tables(cursor: sqlite3.Cursor):
    cursor.execute(
        """CREATE TABLE customer(
        username TEXT PRIMARY KEY,
        firstname TEXT,
        middlename TEXT,
        lastname TEXT,
        passwd_hash TEXT,
        email TEXT,
        phone_number TEXT
        );"""
    )

    cursor.execute(
        """CREATE TABLE address(
        username TEXT,
        door_no TEXT,
        street TEXT,
        city TEXT,
        PIN TEXT,
        PRIMARY KEY(username,door_no,street,city,PIN),
        FOREIGN KEY (username) REFERENCES customer(username)
        );"""
    )

    cursor.execute(
        """CREATE TABLE card(
        card_no INTEGER PRIMARY KEY,
        name TEXT,
        expiry INTEGER
        );"""
    )

    cursor.execute(
        """CREATE TABLE payment(
        username TEXT,
        card_no TEXT,
        PRIMARY KEY(username,card_no),
        FOREIGN KEY(username) REFERENCES customer(username),
        FOREIGN KEY(card_no) REFERENCES card(card_no)
        );"""
    )

    cursor.execute(
        """CREATE TABLE car(
        car_id TEXT PRIMARY KEY,
        make TEXT,
        model TEXT
        );"""
    )

    cursor.execute(
        """CREATE TABLE cars_owned (
        username TEXT,
        car_id TEXT,
        PRIMARY KEY (username, car_id),
        FOREIGN KEY(username) REFERENCES customer(username),
        FOREIGN KEY(car_id) REFERENCES car(car_id));"""
    )

    cursor.execute(
        """CREATE TABLE part(
        part_id TEXT PRIMARY KEY,
        car_id TEXT,
        name TEXT,
        price FLOAT
        );"""
    )

    cursor.execute(
        """CREATE TABLE service(
        service_id TEXT PRIMARY KEY,
        username TEXT,
        date INTEGER,
        rating INTEGER,
        comment TEXT,
        FOREIGN KEY (username) REFERENCES customer(username)
        );"""
    )

    cursor.execute(
        """CREATE TABLE services_done(
        service_id TEXT,
        part_id TEXT,
        quantity INTEGER,
        PRIMARY KEY (service_id, part_id),
        FOREIGN KEY(part_id) REFERENCES part(part_id),
        FOREIGN KEY(service_id) REFERENCES service(service_id));"""
    )
    return


def db_insert_customer(cursor):
    fname = "John"
    lname = "Doe"
    mname = "H"
    username = "johndoe23"
    date = 1701388800
    card_no = "4716818961107838"
    email = "johndoe23@armyrep.com"
    phone = "1-512-9680-603"
    passwd_hash = bcrypt.hashpw(b"pasword@123", bcrypt.gensalt())
    row = {
        "username": username,
        "firstname": fname,
        "middlename": mname,
        "lastname": lname,
        "passwd_hash": passwd_hash,
        "email": email,
        "phone": phone,
    }
    row2 = {
        "username": username,
        "door_no": 689,
        "street": "Short Street",
        "city": "Neligh",
        "pin": 68756,
    }
    row3 = {"card_no": card_no, "name": " ".join([fname, mname, lname]), "expiry": date}
    row4 = {"username": username, "card_no": card_no}
    cursor.execute(
        """
            INSERT INTO customer VALUES(
            :username,
            :firstname,
            :middlename,
            :lastname,
            :passwd_hash,
            :email,
            :phone
            );""",
        row,
    )
    cursor.execute(
        """
            INSERT INTO address VALUES(
            :username,
            :door_no,
            :street,
            :city,
            :pin
            );
            """,
        row2,
    )
    cursor.execute(
        """
            INSERT OR IGNORE INTO card VALUES(
            :card_no,
            :name,
            :expiry
            );
            """,
        row3,
    )
    cursor.execute(
        """
            INSERT INTO payment VALUES(
            :username,
            :card_no
            );
            """,
        row4,
    )


def db_insert_cars(cursor):
    with open("../res/csv/cars.csv") as file:
        for line in file:
            line = line.split(",")
            line[-1] = line[-1].replace("\n", "")
            print(line)
            fname = line[0] + line[1]
            car_id = str(uuid.uuid4())
            val = {
                "car_id": car_id,
                "make": line[0],
                "model": line[1],
            }
            cursor.execute("""INSERT INTO car VALUES(:car_id,:make,:model)""", val)

    val = {
        "car_id": "0",
        "make": "",
        "model": ""
    }
    cursor.execute("""INSERT INTO car VALUES(:car_id,:make,:model)""", val)
    return


def db_insert_parts(cursor):
    # Car_id is 0 because these are services ????
    services = [
        "Brake Repair",
        "Oil Change",
        "Wiper",
        "General Checkup",
        "Tire Replacement",
        "Battery Replacement",
        "Coolant Check",
        "Wheel Balance",
    ]
    for i in services:
        part_id = str(uuid.uuid4())
        name = i
        price = random.randint(50, 200)
        row = {"part_id": part_id, "car_id": 0, "name": name, "price": price}
        print(row)
        cursor.execute("INSERT INTO part VALUES(:part_id,:car_id,:name,:price)", row)

    # Give each car a different Headlight
    cursor.execute("SELECT car_id from car where car_id != 0;")
    results = cursor.fetchall()
    opt = ["Halogen", "LED", "Projector"]
    for i in results:
        part_id = str(uuid.uuid4())
        name = random.choice(opt) + "-Headlight"
        price = random.randint(50, 100)
        row = {"part_id": part_id, "car_id": i[0], "name": name, "price": price}
        cursor.execute("INSERT INTO part VALUES(:part_id,:car_id,:name,:price)", row)

    return


if __name__ == "__main__":
    db_backup()

    with sqlite3.connect(DB_PATH) as conn:
        # Uncomment to turn on logging
        # conn.set_trace_callback(print)
        conn.set_trace_callback(None)
        cursor = conn.cursor()

        db_create_tables(cursor)
        db_insert_customer(cursor)
        db_insert_cars(cursor)
        db_insert_parts(cursor)
