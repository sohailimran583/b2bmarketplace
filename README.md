PHP 8.1.6
Composer version 2.5.5
Node    v20.2.0
npm -  v9.6.6

Installation
> composer install or composer update
> Set up .env file
> php artisan key:generate
> php artisan migrate:fresh --seed    or  php artisan migrate
 
Must run this command =>  php artisan db:seed

php artisan serve

           Admin
            'email => admin@gmail.com
            password =>  admin123
            User
            email => user@gmail.com
            password => admin123
            
             email => user1@gmail.com
            password => admin123

          email => user2@gmail.com  
            password => admin123
           

PAYPAL_SANDBOX_CLIENT_ID=ARx7Cn29jn30mZ1sFPAb_avooGkpkwHDYjxvoiWArz-3tZeb7onZ9OMKHSUPUBRTG05NLy2bcx2RnLLk
PAYPAL_SANDBOX_CLIENT_SECRET=EGFvkaiJ8-9IvQniAyKQ8kOY8_Nga-qaUs8ShoRuO7Ly3mj9CR5XhUeY5DtgIPSjBXOW1HV2F4eMAaTp
PAYPAL_CURRENCY=USD