# Slim Framework 3 Rest API

## Install the Application

Run this command from the directory in which you want to install your application.
* composer install

* Point your virtual host document root to your application's `public/` directory.
* Ensure `logs/` is web writeable.
* Execute database.sql file (MySQL)

## Use API:

# Get all customer
Method: GET
URL: '/api/customers'

# Get single customer
Method: get
URL: '/api/customer/{id}'

# Add customer
Method: post
URL: '/api/customer/add'
params: name, email, phone

# Update customer
Method: post
URL: '/api/customer/update/{id}
params: name, email, phone


# Delete customer
Method: delete
URL: '/api/customer/delete/{id}'