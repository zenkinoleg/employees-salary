Employees Salary
===


## Description
Laravel based solution presents how to have agile and expandable system of bonuses and deductions to calculate employee's salary.

Application releases a Strategy Pattern what makes such system possible and yet simple.

Check out second commit to see an example of extending the system with adding extra deduction 'Smoker' and extra plan 'Taxes Only'.


## Live Demo
[freedb.online:81](http:/freedb.online:81/)


## Install

#### Clone project
```console
git clone https://github.com/zenkinoleg/employees-salary.git .
```

#### Install dependencies
```console
composer install
```

#### Set up MySQL creditionals in .env file
```console
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employees
DB_USERNAME=employees
DB_PASSWORD=employees
```

#### Run database migration
```console
php artisan migrate
```

#### Run database seeder
```console
php artisan db:seed
```

#### Execute tests
```console
./vendor/bin/phpunit
```

### Use frontend to play with it

#
#
#
#
#
#
#

2019 &copy; Zenkin Oleg. All Rights Reserved.
 