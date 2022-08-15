module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./src/**/*.php",
        // "typhoon::*",
        "./vendor/happytodev/filament-comments/resources/**/*.blade.php",
        "./vendor/happytodev/filament-social-networks/resources/**/*.blade.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require("@tailwindcss/typography")
    ],
    safelist: [
    ],
};
