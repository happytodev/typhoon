const mix = require('laravel-mix')
 
mix.postCss('resources/css/filament.css', 'public/css', [
    require('tailwindcss'), 
])