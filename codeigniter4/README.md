# CodeIgniter 4

## Installation & updates
0. create a database named `akademik`
1. Clone the repository, go to the codeigniter4 folder
2. Run `composer install` to install dependencies
3. Copy `.env.example` to `.env`
5. Run `php spark migrate:refresh` to run migrations
6. Run `php spark db:seed Admin` to seed the database
  username: `admin`
  password: `password`
7. Run `php spark serve` to start the development server
