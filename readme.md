# Catalogue Application
<!-- ABOUT THE PROJECT -->
## About The Project
The application is used by the customer to list their products for approval, and based on some
criteria the products list will get approved or rejected.
### Built With Laravel
* [Laravel](https://laravel.com/) - Creating Rest End Point
* [MySQL](https://www.mysql.com/) - Database

<br>
<hr>

<!-- GETTING STARTED -->
## Getting Started
### Prerequisites
1. PHP
2. Laravel
3. Composer
4. MySQL

### Database Schema
1. Users - 
    - id (string)- auto generated unique identifier for user
    - name (string) - name of the user
    - google_id (string) - google id, if logged in using google
    - email (string) - email of the user (unique)
    - password (string) - hashed password of the user
2. Products - 
    - id (string)- auto generated unique identifier for product
    - name (string) - name of the product
    - mrp (integer) - price of the product
    - size (string) - email of the user (unique)
    - color (string) - hashed password of the user
    - dimensions (string) - dimension of the product in foemat -> (Length,Width,Height,Weight)
    - images (integer) - name of the images as saved locally
    - user_id (string) - id of the user who is uploading the product (foregin key)
    - status (boolean) - store if product is approved or rejected based on some criteria

### Server - steps to start server side
1. run command ** npm install** to install required modules
2. edit **.env** file based on your databse setup.
3. update **services.php -> google** data in *config* dir as per your google credentials.
4. to migrate databases table use command **php artisan migrate**
5. to start server use command **php artisan serve**
6. Now you can access client side at port : 8000


***Have a Good Day!***
