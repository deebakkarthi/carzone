CREATE TABLE customer(
        username TEXT PRIMARY KEY,
        firstname TEXT,
        middlename TEXT,
        lastname TEXT,
        salt TEXT,
        hash TEXT,
        email TEXT,
        phone_number TEXT,
);

CREATE TABLE address(
        username TEXT,
        door_no TEXT,
        street TEXT,
        city TEXT,
        PIN TEXT,
        PRIMARY KEY(username,door_no,street,city,PIN),
        FOREIGN KEY username REFERENCES customer(username)
);

CREATE TABLE card(
        card_no INTEGER PRIMARY KEY,
        name TEXT,
        -- 11/24 on a card means 30/11/24
        -- which can be represented as a timestamp
        expiry INTEGER
);

CREATE TABLE payment(
        username TEXT,
        card_no INTEGER,
        PRIMARY KEY(username,card_no),
        FOREIGN KEY(username) REFERENCES customer(username),
        FOREIGN KEY(card_no) REFERENCES card(card_no)
);

CREATE TABLE car(
        car_id TEXT PRIMARY KEY,
        make TEXT,
        model TEXT,
);

CREATE TABLE cars_owned (
        username TEXT,
        car_id TEXT,
        PRIMARY KEY (username, car_id),
        FOREIGN KEY(username) REFERENCES customer(username),
        FOREIGN KEY(car_id) REFERENCES car(car_id));

CREATE TABLE part(
        part_id TEXT PRIMARY KEY,
        car_id TEXT,
        name TEXT,
        price FLOAT
);

CREATE TABLE service(
        service_id TEXT PRIMARY KEY,
        username TEXT,
        -- date is an INTEGER because sqlite3 doesn't have a DATE datatype.
        -- Instead it uses UNIX-like timestamps where date is represented as
        -- number of seconds from Jan 1 1970(UNIX epoch)
        date INTEGER,
        rating INTEGER,
        comment TEXT,
        FOREIGN KEY username REFERENCES customer(username)
);

CREATE TABLE services_done(
        service_id TEXT,
        part_id TEXT,
        quantity INTEGER,
        PRIMARY KEY (service_id, part_id),
        FOREIGN KEY(part_id) REFERENCES part(part_id),
        FOREIGN KEY(service_id) REFERENCES service(service_id)
);
