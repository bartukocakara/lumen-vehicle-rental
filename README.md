# Rent a car api
  <img src="/api-swagger.png" alt="Alt text" title="Borholding Api Png" width="900">

| No. | Topic                   |
| --- | ------------------------|
| 1   | [**Purpose**](#Purpose) |
| 2   | [**Dependencies**](#Dependencies)|
| 3   | [**Setup**](#Setup)|
| 4   | [**Contacts**](#Contacts)|

### Purpose
- By using this application user can track all reservations, income, etc...

### Dependencies
| Package  | Version | 
| :------:|  :-----------:|
| php   | > 8.0 | 
| laravel/lumen-framework   | > 9.0 | 
| tymon/jwt-auth   | ^1.0  | 
| darkaonline/swagger-lume   | ^9.0 |

### Design Pattern
```
Controller => Service => Repository
```
### Setup

### Copy Env
```
cp .env.example .env
```
### Install required packages
```
composer install
```
### https://github.com/DarkaOnLine/SwaggerLume
```
php artisan swagger-lume:generate
```
#### App url http://borholding-api/api/v1/documentation

### Db migrate 
```
php artisan migrate --seed
```
### Db migrate partialy
```
php artisan migrate --path='./database/migrations/2022_09_23_222513_create_reservations_table.php' (Nothing to migrate. = Clear migrations table)
```
### Unit Test All
```
vendor/bin/phpunit
```
### !!!Testler çalışmıyor TestCase not found hatası alıyorum stackoverflowda da sebebini bulamadım.Ama methodlar olması gerektiği gibi. 
### Unit Test Filter
```
#Auth
vendor/bin/phpunit --filter test_login
vendor/bin/phpunit --filter test_register

#Transactions
vendor/bin/phpunit --filter test_reservation_create
vendor/bin/phpunit --filter test_reservation_list
vendor/bin/phpunit --filter test_reservation_show
vendor/bin/phpunit --filter test_reservation_update
vendor/bin/phpunit --filter test_reservation_delete
```

### Contacts
| Developer  | Phone Info |  Mail address |
| :------:|  :-----------:| :-----------:|
| bartu kocakara   | +90 530 910 11 93  | kocakarabartu@gmail.com | 
| ...   | ... | ... |

<br/>
<div align="right">
    <b><a href="#">↥ back to top</a></b>
</div>
<br/>
