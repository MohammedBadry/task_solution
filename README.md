
This is the task solution as i tried to understand the business requirements that was having some conflict to be cleared for me.

The solution has the following:

1- (POST) [/register] API: this api does the following: 

    a- Registers first_name, last_name, email, phone, password in users table 

    b- Retrives the latitude, longitude from google geo API and caches them into redis db 
    
    c- Registers rest data in clients table d- Return the response from RegisterResource class

2- (GET) [/account] API: 

    a- This API retrieves the data from clients table as the required payload

3- Test register and account API's


<b>Installation Guide: </b>

1- Clone the reop

2- Run composer install

3- In .env file:

    a- change database connection details with yours

    b- change this line: CACHE_DRIVER=file to CACHE_DRIVER=redis

    c- add this line: REDIS_CLIENT=predis

4- run: php artisan migrate


<b>API's reference:</b>

1- 127.0.0.1:8000/api/v1/register (Of the type POST)

1- 127.0.0.1:8000/api/v1/account (Of the type GET)


*Note:

The main directory contains the postman collection for the API's
