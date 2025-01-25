# Event Archives

## Requirements

- **PHP**: Ensure you have PHP^8 installed on your computer. You must enable the GD extension in your `php.ini` file to utilize functionalities related to image processing. Add or uncomment the following line:

```bash
extension=gd
```


- **Composer**
- **npm**

## Client

The front-end of the application features:

- **Event Listing**: Browse through a list of events.
- **Search Functionality**: Users can search for events by title or type.
- **Event Details**: Click on an event to view detailed information including the event name, year, type, and associated images.

## Admin Panel

Access to the admin panel requires authentication:

- **Default Login Credentials**
- **Email**: admin@example.com
- **Password**: admin

### Features

- **User Management**: Admin can view a paginated list of users (15 per page), with the ability to create, edit, and delete users.
- **Event Management**: Admin can create, edit, and delete events, as well as add related files (archives).

## Setup and Installation

Copy ```.env.example``` to ```.env```

In the folder of the project run
```bash
npm ci
```

after verifying the packages are downloaded run

```bash
composer install
```

## Run the project

To run the project locally use

```bash
composer run dev
```

This will run your local laravel server and your vite
