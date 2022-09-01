const colors = require('tailwindcss/colors') 

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./src/**/*.php",
        "typhoon::*",
        "./app/View/Components/**/*.php",
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
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
    safelist: [
    ],
};
