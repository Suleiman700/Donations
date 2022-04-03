<?php

if(!isset($_SESSION)) session_start();

class Session
{
    public $session_islogged = "CarTravelHistory_IsLogged";
    public $session_userid = "CarTravelHistory_UserID";
    public $session_username = "CarTravelHistory_Username";
    public $session_language = "CarTravelHistory_Language";

    // Set session
    function set_session($user_id, $username) {
        $_SESSION[$this->session_islogged] = true;
        $_SESSION[$this->session_userid] = $user_id;
        $_SESSION[$this->session_username] = $username;
    }

    // Unset session
    function unset_session() {
        unset($_SESSION[$this->session_islogged]);
        unset($_SESSION[$this->session_userid]);
        unset($_SESSION[$this->session_username]);
    }

    // Check if user is logged
    function check_logged() {
        if (isset($_SESSION[$this->session_islogged])) return $_SESSION[$this->session_islogged];
        else return false;
    }

    // Get user id from session
    function get_session_userid() {
        return $_SESSION[$this->session_userid];
    }

    // Get user username from session
    function get_session_username() {
        return $_SESSION[$this->session_username];
    }

    // Redirect logged in users to the dashboard
    function redirect_logged_to_dashboard() {
        $is_logged = $this->check_logged();
        if ($is_logged) exit(header("Location: ../dashboard/index.php"));
    }

    // Redirect non logged in users to the login page
    function redirect_non_logged_to_dashboard() {
        $is_logged = $this->check_logged();
        if (!$is_logged) exit(header("Location: ../auth/login.php"));
    }

    // Set session language
    function set_language($language_code) {
        $_SESSION[$this->session_language] = $language_code;
    }

    // Get session language
    function get_language() {
        return $_SESSION[$this->session_language];
    }
}
