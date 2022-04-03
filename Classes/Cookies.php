<?php

class Cookies
{
    public $cookie_language = "CarTravelCookies_Language";

    // Unset cookie
    function unset_cookie() {
        unset($_COOKIE["CarTravelCookies_Language"]);
    }

    // Set language cookie
    function set_cookie_language($language) {
        $this->unset_cookie();;
        setcookie("CarTravelCookies_Language", $language, time()+30*24*60*60);

        echo "<pre>";
        print_r($_COOKIE);
        echo "</pre>";
    }

    // Get language cookie
    function get_cookie_language() {
        $cookie_value = $_COOKIE["CarTravelCookies_Language"];
        if ($cookie_value) return $cookie_value;
        else return false;
    }
}
