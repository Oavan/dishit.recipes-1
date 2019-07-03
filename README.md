# ICS499 Project - dishit.recipes
To build: 
1. Create an empty database in MySQL and populate the tables according the sql script under config/db_setup.sql
2. Configure the dsn under dishit.recipes/model/connect_db.php to point to the correct host and database you configured. Also update with an appropriate username and password to connect
3. Place contents of dishit.recipes/* in your webroot (or folder of choice) and navigate to http://\<host\>/index.php

This application has been tested using XAMPP 7.3.6 on Windows and current versions of LAMP available in Ubuntu 18.04 LTS.
