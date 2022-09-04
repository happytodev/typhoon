const colors = require('tailwindcss/colors') 

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./src/**/*.php",
        "typhoon::*",
        "./app/View/Components/**/*.php",
        "./app/Filament/Resources/**/*.php",
        "./vendor/happytodev/filament-comments/resources/**/*.blade.php",
        "./vendor/happytodev/filament-social-networks/resources/**/*.blade.php",
        "./vendor/happytodev/filament-tailwind-color-picker/src/Forms/Components/**/*.php",
        "./vendor/happytodev/filament-tailwind-color-picker/resources/**/*.blade.php",
        "./vendor/martin-ro/filament-charcount-field/resources/**/*.blade.php",
        "./content/**/*.md",
        "./content/**/*.json",
        "./vendor/filament/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: { 
                danger: colors.rose,
                primary: colors.purple,
                success: colors.green,
                warning: colors.yellow,
            }, 
            height: {
                'screen-1/10': '10vh',
                'screen-1/6': '17vh',
                'screen-1/5': '20vh',
                'screen-1/4': '25vh',
                'screen-1/3': '33vh',
                'screen-1/2': '50vh'
            },    
            minHeight: {
                'screen-1/10': '10vh',
                'screen-1/6': '17vh',
                'screen-1/5': '20vh',
                'screen-1/4': '25vh',
                'screen-1/3': '33vh',
                'screen-1/2': '50vh'
            },    
            maxHeight: {
                'screen-1/10': '10vh',
                'screen-1/6': '17vh',
                'screen-1/5': '20vh',
                'screen-1/4': '25vh',
                'screen-1/3': '33vh',
                'screen-1/2': '50vh'
            },    
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
    safelist: [
    ],
};
