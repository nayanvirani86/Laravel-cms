# Getting Started

    Laravel App using custom code for - Content Management as well as Multiple Authentication and Role Based Access System. 

## Benefits
    - Custom coding allows you to edit the code as per your requirements
    - There are no Third-Party packages used so app will load fast
    - Role based access
    - Admin can create any role based on his role permission
    - Super Admin can manage all users and roles
    - Super Admin can manage all posts
    - Sub Admin can manage all posts and super admin can give permission for accessing posts
    


## Installation

Before you start, please check the official Laravel installation guide for server requirements . [Official Documentation](https://laravel.com/docs/8.x/installation)

Clone the repository

    git clone https://github.com/ittantatech/laravel-cms.git

Switch to the repo folder

    cd laravel-cms

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Generate a new application key
    
    php artisan key:generate

Run the database seeder (**After the database migration**)

    php artisan db:seed


Install all the dependencies using composer

    composer install



**TL;DR command list**

    git clone https://github.com/ittantatech/laravel-cms.git
    cd laravel-cms
    composer install
    cp .env.example .env
    php artisan key:generate
    
    
**Make sure you set the correct database connection information before running the migration** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database Seeding

**Populate the database with seed data with relationships which includes users, articles, comments, tags, favourites and follows. This can help you to quickly start testing the API or couple a frontend and start using it with ready content.**

Open the DefaultData and set the property values as per your requirement

    database/seeds/DefaultData.php

Run the database seeder and you are done

    php artisan db:seed

***Note*** : It is recommended to have a clean database before seeding. You can refresh your migration at any point to clean the database by running the following command

    php artisan migrate:refresh


## Environment Variables

- `.env` - Environment variables can be set in this file

***Note***: You can quickly set the database information and other variables in this file and have the application fully working.
