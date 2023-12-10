# Tech Challenge for Full Stack Developer position (PHP/Laravel e VueJS)

The project consists of a CRUD patient registration application.

## Project configuration

### Backend

- Copy the `.env.example` file to the `.env` file.
- Open a terminal in the 'php-laravel' folder and run the command `./vendor/bin/sail up`.
- Open a terminal in the 'php-laravel' folder and run the migrations with the command `bash vendor/bin/sail artisan migrate`.
- Optional: run `bash vendor/bin/sail artisan db:seed` to populate the database.
- Backend should be running at http://localhost:8081.

### Frontend

- Copy the `.env.example` file to the `.env` file.
- Open a terminal in the 'front-vuejs' folder and run the `npm install` command (node ​​version: v17.9.1).
- Run the `npm run dev` command.
- Frontend must be running at http://localhost:5173.

## How to use

- To use the endpoints only in the backend, use the file with the endpoints configured in a postman collection at the root of the project.
- To use endpoints in the frontend, follow the flow defined in the images in the 'images' folder.
