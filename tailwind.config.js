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
                'white': '#FFFFFF',
                'header': '#FBF9F4',
                'gray1': '#6B7280',
                'gray2': '#fbf9f4b3',
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
