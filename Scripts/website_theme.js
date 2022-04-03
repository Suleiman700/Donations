import Cookies from './Cookies.js';
const cookies = new Cookies()

const $dark_theme_btn = $("#set_dark_theme")
const $light_theme_btn = $("#set_light_theme")

// Set dark theme
$dark_theme_btn.on("click", () => {
    cookies.setCookies("theme", "dark-mode", "30")
})

// Set light theme
$light_theme_btn.on("click", () => {
    cookies.setCookies("theme", "light-mode", "30")
})

// Get theme color from cookies
$(document).ready(function() {
    const theme_color = cookies.getCookies("theme")
    $(document.body).addClass(theme_color)
});
