# Image Gallery

Image gallery based on PHP Framework Laravel 8.
<br>
Using Bootstrap, jQuery, Fine Uploader, Intervention Image.  

There are two pages:
* Page which allows multiple upload of images with adding 
  titles and tags (multiple tags per image)
*  Another page - gallery, shows all images with pagination and 
  filters by multiple tags. 


Upload image logic is in `/app/Http/Controllers/ImageController.php` file.
<br>
Routing: `/routes/web.php`.
<br>
Front-end part in `/resources/js/app.js`


## Setup

Copy `.env.example` to `.env`.
<br>
Configure your DB settings
<p>
Use command <b>composer install</b> to install all dependencies
in the local vendor folder.
<br>
Use command <b>npm install</b> to install all dependencies in the 
local node_modules folder.
<br>
Use command <b>npm run dev</b> to compile all assets.
</p>
<p>
Use command <b>php artisan migrate</b> to run all migrations.
</p>
<p>
Finally use command <b>php artisan serve</b> to run the project.
</p>