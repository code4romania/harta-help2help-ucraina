// const colors = require("tailwindcss/colors");

module.exports = {
    content: [
        'app/**/*.php',
        'resources/**/*.blade.php',
        'resources/**/*.js',
        'vendor/filament/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: '1rem',
                sm: '1.5rem',
                lg: '2rem',
            },
        },
        extend: {
            fontFamily: {
                sans: ['Source Sans Pro', 'sans-serif'],
            },
            colors: {
                'blue1': '#7CC1DF',
                'blue2': '#9ACEE4',
                'blue3': '#B8DBEA',
                'orange1': '#EBBB3F',
                'orange2': '#EDC96C',
                'orange3': '#F0D89A',
                'yellow1': '#E9D758',
                'header': '#FBF9F4',
                'gray1': '#6B7280',
                'gray2': '#FBF9F4',
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
