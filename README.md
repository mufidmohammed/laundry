# Laundry management system

Laundry is a laundry management system that helps in keeping track of all the daily activities in a laundry shop.

## Requirements
* Php 8.1 and above
* Composer 
* This project is running in laravel 9 so you may want to check out the official requirements [here](https://laravel.com/docs/9.x/upgrade#updating-dependencies)

## Installation
* Clone the repository by running the following command in your comamand line below (Or you can dowload zip file from github)
```shell
git clone https://github.com/mufidmohammed/laundry ./laundry
 ```
* Head to the project's directory
```shell
cd laundry
 ```
* Install composer dependancies
```shell
composer install
```
* Copy .env.example file into .env file and configure based on your environment
```shell
cp .env.example .env
```
* Generate encryption key
```shell
php artisan key:generate
```
* Migrate the database
```shell
php artisan migrate
```
* Seed database 
```shell
php artisan db:seed
```
* Set application logo by adding it in the public img folder and edit the .env logo path appropriately
* Store favicon in path public/favicons/, the file should be called favicon.ico
* For development or testing purposes, you can use the laravel built in server by running 
```shell
php artisan serve
```
If you are running on production, visit your domain to verify it is working 

After running the above commands, you should be able to access the application at http::/localhost or your designated domain name depending on configuration.

## Setup
Login details
* Email: admin@test.com
* Password: test1234

## Usage
* Manage employees
* Manage customers
* Manage laundry
* Manage transactions
* Manage expenditure
