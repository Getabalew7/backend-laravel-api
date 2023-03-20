
# Running a Laravel Back End API

This guide will explain how to run a Laravel back end API on your local machine. The following steps will walk you through the process of setting up and running your API with Laravel:

## Prerequisites 

Before getting started with running the API, you will need the following installed on your local machine:

* [PHP](https://www.php.net/downloads.php) (version 7.2 or higher)
* [Composer](https://getcomposer.org/)
* [MySQL](https://www.mysql.com/downloads/)

## Step 1: Setting up the Development Environment

Once you have the prerequisites installed, you will need to create an environment for your API. To do this, you will need to create a new project directory. This directory will house all of the files needed to run your API.

Navigate to the directory where you want to create your project, then run the command `composer create-project laravel/laravel projectname` to create a new project in the directory.

Once the project is created, you'll need to  setting up the environment. Navigate to the project directory and run the command `php artisan key:generate`. This command will generate an encryption key for your project.

## Step 2: Setting up the Database

Next, you will need to create a database for your API. To do this, you will need to create a new database in MySQL. Once the database is created, you will need to update the `.env` file in the root of your project.

In the `.env` file, you will need to update the database configuration. Under the `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` keys, you will need to enter the appropriate values for your database.

## Step 3: Running the API

Once you have the environment and database set up, you are ready to run your API. To do this, you will need to run the command `php artisan serve`. This command will start the development server for your API.

Once the server is running, navigate to the URL provided in the command's output. This will open the API in your web browser.
