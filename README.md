# Common Library

A library that provides support for

- Command Bus
- Database Client
- Events
- Messaging

## Start the project

    $ composer create-project malotor/skeleton my_project dev-master
    $ cd my_project
    $ docker-compose build
    $ docker-compose run --rm composer install
    
## Run the tests

    $ docker-compose run --rm phpunit