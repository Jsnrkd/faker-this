Fake-this is a boilerplate for the PHP [Faker](https://github.com/fzaninotto/Faker) library for anonymizing your production dataset to be distributed and used for testing.  It is discussed further at [Chef-gm](http://jsnrkd.github.io/chef-gm).

Note: Backup your data before running!

####Dependencies

- git
- php
- composer
- mysql client

# How to use

Setup

    $ git clone https://github.com/Jsnrkd/faker-this
    $ cd faker-this
    $ composer install

Code your logic

    $ nano fake.php

Anonymize

    $ php fake.php <host> <mysql_user> <password> <dbPrefix>

Distribute 

    $ mysqldump -u [user] -p[password] --all-databases | gzip > fake_data.sql.gz

Import

    $ gunzip < fake_data.sql.gz | mysql -u [user] -p[password]

Keep configured project for later

    $ rm -R .git
    $ git init
    $ git add --all
    $ git commit -am 'Initial commit of faker utility.'

*Push remotely if desired.*	