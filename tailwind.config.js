// const colors = require("tailwindcss/colors");

module.exports = {
    content: [
        "app/**/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/filament/**/*.blade.php",
    ],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                'blue1': '#7CC1DF',
                'blue2': '#9ACEE4',
                'blue3': '#B8DBEA',
                'orange1': '#EBBB3F',
                'orange2': '#EDC96C',
                'orange3': '#F0D89A',
                'yellow1': '#E9D758',
                'header': '#FBF9F4',
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
