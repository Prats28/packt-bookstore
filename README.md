<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Packt Book Store

This is a web application that serves as a functioning bookstore, built using Laravel 10, Vue 3, and Bootstrap 5. The project allows both administrators and customers to interact with the bookstore, perform CRUD operations on books, and search for books using various attributes.

## Table of Contents
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
  - [Admin](#admin)
  - [Customer](#customer)

## Features
- Admin can add, edit, and delete books.
- Customers can search and filter books by title, author, publication date, ISBN, and genre.
- Data is paginated for efficient browsing.
- Optional: Integration with Meilisearch for enhanced search performance.
- Authentication for admin access.

## Technologies Used
- Laravel 10
- Vue 3
- Bootstrap 5
- MySQL
- Meilisearch Search (optional)
-

## Getting Started

### Prerequisites
- PHP
- Composer
- Node.js and npm
- Database (MySQL or PostgreSQL)
- Meilisearch Search

### Installation
1. Clone this repository from GitHub.

2. Install PHP dependencies using Composer:
   shell
   composer install
   

3. Install JavaScript dependencies using npm:
   shell
   npm install
   

4. Create a copy of the `.env.example` file and name it `.env`. Update the database and other environment-specific configurations.

5. Generate an application key:
   shell
   php artisan key:generate
   

6. Migrate and seed the database:
   shell
   php artisan migrate --seed
   

7. set up the necessary configurations in the `.env` file for meilisearch.

## Configuration

### Database
- Configure your database connection in the `.env` file. Use either MySQL or PostgreSQL as specified.

### Elastic Search (optional)
- Configure the Meilisearch connection in the `.env` file.
      SCOUT_DRIVER=meilisearch
      MEILISEARCH_HOST=http://127.0.0.1:7700
      MEILISEARCH_KEY=masterKey

## Usage

### Admin
- Access the admin panel by logging in with your admin credentials.
- Here you can add, edit, and delete books.

### Customer
- Use the search and filter functionality to find books based on attributes like title, author, publication date, ISBN, and genre.
- Paginated results are displayed for easy navigation.