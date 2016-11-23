#! /usr/bin/python3
import sqlite3

def dict_factory(cursor, row):
    d = {}
    for idx, col in enumerate(cursor.description):
        d[col[0]] = row[idx]
    return d

sqlite_db="db/survey.db"
email_db=sqlite3.connect(sqlite_db)
email_db.row_factory = dict_factory
c = email_db.cursor()
try:
    c.execute("SELECT * From survey")
    response_list = c.fetchall()
    for e in response_list:
        print(str(e['num_domains']).ljust(5)+str(e['shark']).ljust(5)+e['host'])
    print("Total :"+str(len(response_list)))
except:
    print("Error")