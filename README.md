## About The Project

The following project is a simple crm application made in laravel using boostrab, laravel blade and jquery, its a management system which allows authenticated users to add, delete, update and get clietns (CRUD).  

## Migrations

Run php artisan migrate to create all the tables that are used for the current project, tables (clients,roles,role_users,telephones,users,.e.t.c)

## Database Seeding

Some dummy data were created in order to make it easier for you to use the application simply run php artisan db:seed

## Birthday Email

For the email a new mail has been created allong with a new blade file (emails.happy_birthday.blade.php) using mailables, The current email is scheduled to run daily, for the purpose of the email a testing account has been created in https://mailtrap.io/ and the MAIL_ enviromental variables were changed according my mailtrap testing account

To simply test the email run 'php artisan email:daily'
To simply schedult the email run 'php artisan schedule:run'

## PHP Unit Testing

I have created some test cases in order to test my application, all the test cases can be found in tests/Feature/ClientsTest.php
Also some Fake Factories have been created 'ClientsFactory.php'
In order to run the test run php artisan test

## General Info

The project use server side functionality for the pagination, ajax is used for deleting, updating and creating a new user in the database, for creating my project i used xampp server and laravel 7
