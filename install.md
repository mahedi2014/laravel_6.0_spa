https://github.com/eolant/laravel-vuetify-spa-starter

##Installation:
    Clone the repo
    Copy .env.example to .env
    Configure .env
    Run composer install
    Run php artisan key:generate
    Run php artisan jwt:secret
    Run php artisan migrate
    Run npm install
    Make sure storage/framework/cache, storage/framework/sessions, storage/framework/views directories exist. Run mkdir -p storage/framework/{sessions,views,cache}

##Usage:
    Run npm run watch for live reloading using BrowserSync
    Run npm run hot for hot reloading
    Run npm run prod for production buid
