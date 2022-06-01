module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
    extend: {
        colors: {
            'backdrop': 'rgba(30, 58, 138, 0.5)',
        }
    },
  },
  plugins: [require('@tailwindcss/forms')],
}
