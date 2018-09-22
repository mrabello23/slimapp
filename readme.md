# Slim Framework 3 Rest API

## Install the Application

Run this command from the directory in which you want to install your application.
* composer install

* Point your virtual host document root to your application's `public/` directory.
* Ensure `logs/` is web writeable.
* Execute database.sql file (MySQL)

## Use API:

# Get all customer
Method: GET <br/>
URL: '/api/customers' <br/>

# Get single customer
Method: get <br/>
URL: '/api/customer/{id}' <br/>

# Add customer
Method: post <br/>
URL: '/api/customer/add' <br/>
params: name, email, phone <br/>

# Update customer
Method: post <br/>
URL: '/api/customer/update/{id} <br/>
params: name, email, phone <br/>


# Delete customer
Method: delete <br/>
URL: '/api/customer/delete/{id}' <br/>