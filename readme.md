clone the repository and make

docker-compose up -d

composer install

you have two options to see the result

the first one is through the browser at this link
http://localhost:8741/api/auction/winner

the second one by running console command |
make winner
OR
php bin/console auction:winner

Run unit test

make unit-tests