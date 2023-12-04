 
# How to run this project

 
## step One
```bash
composer install
```

## Step Two
```
composer require intervention/image
```
## Step Three

## Connection database 
```
DB_DATABASE=phone-book
```

## Step Four
```
php artisan migrate:fresh --seed
```

## Step Five
### admin login info
```
 Email: admin@gmail.com
 Password: admin@gmail.com

```

## Step Six
### open another terminal and run the below command for mail queue work 
```
php artisan queue:work
```

## Main Functionality
    1. Login with google api
    2. User online and offline check
    3. User banned 
    4. Role change
    5. User profile update
    6. Contact Crud
    7. Softdelets
    6. Mail body dynamic
    7. Send mail using queue
    8. Filter using favorite and status
    9. Search using name and email
    10.Laravel pagination

