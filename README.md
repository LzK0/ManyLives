# ManyLives
A blog made with Laravel.

**Imports:**

--

***TAILWIND:***

[terminal] <br>
npm install -D tailwindcss postcss autoprefixer <br>
npx tailwindcss init -p

[tailwind.config.js] -
content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],

[app.css] <br>
@tailwind base;<br>
@tailwind components;<br>
@tailwind utilities;<br>

[terminal] - 
npm run dev

[any page] - 
@vite('resources/css/app.css')

--

***LARAVEL PT-BR***

[terminal] <br>
php artisan lang:publish<br>
composer require lucascudo/laravel-pt-br-localization --dev<br>
php artisan vendor:publish --tag=laravel-pt-br-localization<br>

laravel 11 or + [.env / line 8]<br>
APP_LOCALE=pt_BR<br>

laravel - [config/app.php / line 85]<br>
'locale' => 'pt_BR'

--

***PAGINATOR***

[terminal]<br>
composer require laravel/jetstream<br>
php artisan jetstream:install livewire

--

***PAGINATOR STYLE***

[terminal] - 
php artisan vendor:publish --tag=laravel-pagination

--









