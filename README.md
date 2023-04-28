# Multi-Auth Laravel Passport

This project is an example of how to implement multi-authentication in a Laravel application using Passport.

## Getting Started

### Installing

1. Clone this repository:

```
git clone https://github.com/michaelnabil230/multi-auth-laravel-passport.git
```

2. Install dependencies:

```
cd multi-auth-laravel-passport
git clone --single-branch --branch fix/provider-token-creation https://github.com/michaelnabil230/passport
composer install
```

3. Generate the application key:

```
php artisan key:generate
```

4. Migrate the database:

```
php artisan migrate
```

5. Install Passport:

```
php artisan passport:keys
php artisan passport:client --personal --provider=users
php artisan passport:client --personal --provider=admins
```

6. Seed the database:

```
php artisan db:seed
```

7. Start the development server:

```
php artisan serve
```

### Usage

#### Authentication

This project includes two types of authentication: `user` and `admin`.

##### User authentication

To authenticate as a user, use the credentials:

- Email: `user@example.com`
- Password: `password`

This will return an access token that you can use to authenticate future requests.

##### Admin authentication

To authenticate as an admin, use the credentials:

- Email: `admin@example.com`
- Password: `password`

This will return an access token that you can use to authenticate future requests.

## API Documentation

You can test the API endpoints using Postman. To do so, you will need to import the [Postman collection](./postman-collection.json) and set up the environment variables.

### Importing the Postman collection

1. Open Postman and click on the `Import` button in the top left corner.
2. In the `Import` dialog, and drop the file.
3. Click on the `Import` button to import the collection.

### Setting up the environment variables

1. In Postman, click on the gear icon in the top right corner to open the `Manage Environments` dialog.
2. Click on the `Add` button to create a new environment.
3. Enter a name for the environment (e.g. `Multi-Auth Laravel Passport`) and add the following variables:

```
adminAccessToken
userAccessToken
```

4. Click on the `Add` button to save the environment.

### Using the API endpoints

1. Select the `Multi-Auth Laravel Passport` environment from the dropdown menu in the top right corner.
2. Use the API endpoints in the Postman collection to test the application. You can use the environment variables to fill in the required values.
