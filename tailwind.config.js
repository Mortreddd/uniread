module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./resources/**/**/*.blade.php",
        "./resources/**/**/**/*.blade.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("flowbite/plugin")],
};
