Fake-this is a simple utility wrapper of the the PHP [Faker](https://github.com/fzaninotto/Faker) project for anonymizing your production dataset to be distributed and used for testing.


# To use

    $ git clone https://github.com/Jsnrkd/faker-this
    $ cd faker-this
    $ composer install
    $ nano config.php
    $ php fake.php
    $ mysqldump -u [user] -p[password] --all-databases | gzip > fake_data.sql.gz

Distribute file then import

   $ gunzip < fake_data.sql.gz | mysql -u [user] -p[password]

Keep configured project for later

    $ rm -R .git
    $ git init
    $ git add --all
    $ git commit -am 'Initial commit of faker utility.'

Push remotely if desired.