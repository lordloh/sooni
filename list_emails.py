#! /usr/bin/python3
import sqlite3

def dict_factory(cursor, row):
    d = {}
    for idx, col in enumerate(cursor.description):
        d[col[0]] = row[idx]
    return d

sqlite_db="db/sooni.db"
email_db=sqlite3.connect(sqlite_db)
email_db.row_factory = dict_factory
c = email_db.cursor()
try:
    c.execute("SELECT * From email")
    email_list = c.fetchall()
    for e in email_list:
        print(e['email'].ljust(50)+e['date'])
    print("Total :"+str(len(email_list)))
except:
    print("Error")