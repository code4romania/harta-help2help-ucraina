// const colors = require("tailwindcss/colors");

module.exports = {
    content: [
        'app/**/*.php',
        'resources/**/*.blade.php',
        'resources/**/*.js',
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
                blue: {
                    1: '#7CC1DF',
                    2: '#9ACEE4',
                    3: '#B8DBEA',
                },
                orange: {
                    1: '#EBBB3F',
                    2: '#EDC96C',
                    3: '#F0D89A',
                },
                yellow: {
                    1: '#E9D758',
                },
                gray: {
                    1: '#6B7280',
                    2: '#FBF9F4',
                }
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
