# Laravel JWT API for User Authentication and Post Management

This project is a simple API built with Laravel that uses JWT (JSON Web Token) for user authentication. Authenticated users can create, view, and delete posts. The API ensures that only the creators of a post can delete their own posts.

## Features

- User registration and login with JWT authentication.
- Protected routes for creating and deleting posts.
- Users can only delete their own posts.
- Fetch all posts.
  
## Prerequisites

Before you begin, ensure you have met the following requirements:

- **PHP**: 7.4 or higher
- **Composer**: Latest version
- **Laravel**: 8.x or higher
- **MySQL**: 5.7+ or PostgreSQL

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/lordwill1/blogapi.git
   cd blogapi
   ```

2. **Install Dependencies**

   Run the following command to install all the dependencies:

   ```bash
   composer install
   ```

3. **Copy `.env` File**

   Copy the example environment file and create a new `.env` file:

   ```bash
   cp .env.example .env
   ```

4. **Generate Application Key**

   Run the following command to generate a new application key:

   ```bash
   php artisan key:generate
   ```

5. **Set Up Database**

   - Open the `.env` file and update the database configuration section with your database credentials:

     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_database_user
     DB_PASSWORD=your_database_password
     ```

   - Run the migrations to create the required tables:

     ```bash
     php artisan migrate
     ```

6. **Install JWT Package**

   Install the Laravel JWT package:

   ```bash
   composer require tymon/jwt-auth
   ```

7. **Publish JWT Configuration**

   Publish the JWT configuration file:

   ```bash
   php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
   ```

8. **Generate JWT Secret Key**

   Generate the secret key for JWT:

   ```bash
   php artisan jwt:secret
   ```

## Usage

### Starting the Server

To start the development server, run:

```bash
php artisan serve
```

The application will be accessible at `http://127.0.0.1:8000`.

### API Endpoints

To see all end points

```bash
php artisan route:list
```

#### Authentication

- **Register**

  ```
  POST /api/register
  ```

  **Request Body:**
  
  ```json
  {
      "name": "John Doe",
      "email": "johndoe@example.com",
      "password": "password",
      "password_confirmation": "password"
  }
  ```

  **Response:**

  ```json
  {
      "user": { ... },
      "token": "jwt-token-here"
  }
  ```

- **Login**

  ```
  POST /api/login
  ```

  **Request Body:**
  
  ```json
  {
      "email": "johndoe@example.com",
      "password": "password"
  }
  ```

  **Response:**

  ```json
  {
      "token": "jwt-token-here"
  }
  ```

- **Logout**

  ```
  POST /api/logout
  ```

  **Request Header:**

  ```http
  Authorization: Bearer jwt-token-here
  ```

  **Response:**

  ```json
  {
      "message": "Successfully logged out"
  }
  ```

#### Post Management

- **Create Post**

  ```
  POST /api/posts
  ```

  **Request Header:**

  ```http
  Authorization: Bearer jwt-token-here
  ```

  **Request Body:**

  ```json
  {
      "title": "My First Post",
      "content": "This is the content of my first post."
  }
  ```

  **Response:**

  ```json
  {
      "id": 1,
      "title": "My First Post",
      "content": "This is the content of my first post.",
      "user_id": 1,
      "created_at": "2024-08-12T10:00:00.000000Z",
      "updated_at": "2024-08-12T10:00:00.000000Z"
  }
  ```

- **View All Posts**

  ```
  GET /api/posts
  ```

  **Response:**

  ```json
  [
      {
          "id": 1,
          "title": "My First Post",
          "content": "This is the content of my first post.",
          "user_id": 1,
          "created_at": "2024-08-12T10:00:00.000000Z",
          "updated_at": "2024-08-12T10:00:00.000000Z"
      },
      ...
  ]
  ```

- **Delete Post**

  ```
  DELETE /api/posts/{id}
  ```

  **Request Header:**

  ```http
  Authorization: Bearer jwt-token-here
  ```

  **Response:**

  ```json
  {
      "message": "Post deleted successfully"
  }
  ```

## Testing with Postman

1. **Register a New User**: Use the `/api/register` endpoint to create a new user.
2. **Login**: Use the `/api/login` endpoint to authenticate and receive a JWT token.
3. **Set Authorization Header**: For subsequent requests, include the JWT token in the `Authorization` header as `Bearer jwt-token-here`.
4. **Create a Post**: Use the `/api/posts` endpoint to create a new post.
5. **View Posts**: Use the `/api/viewposts` endpoint to fetch all posts.
6. **Delete a Post**: Use the `/api/posts/{id}` endpoint to delete a post.

## Troubleshooting

### Common Errors

- **404 Not Found for `/api/register`:** Ensure that your API routes are prefixed with `/api` and that your server is running at the correct URL (`http://127.0.0.1:8000`).
- **"Method `index` does not exist"**: Ensure that the `index` method is defined in `PostController`.
- **"Add `[attribute]` to fillable property"**: Ensure that you have added the required attributes to the `$fillable` property in your model.
- **"Route [login] not defined"**: Ensure that your authentication routes are correctly defined in `api.php`.

## License

This project is licensed
---

This `README.md` file provides all the necessary information to understand, install, and use the Laravel JWT API project, as well as to troubleshoot common issues.