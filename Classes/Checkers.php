<?php

class Checkers
{
    public $value;
    public $min_pass_len = 8; // Minimum password length

    // Methods
    function set_value($value) {
        $this->value = $value;
    }

    // Check email
    function check_email() {
        $email = $this->value;
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Check password
    function check_password() {
        /*$password = $this->value;
        $length = $this->min_pass_len;

        if (strlen($password) < $length) return false;
        else return true;*/
    }

    // Check if a valid date
    function check_valid_date($date, $format = 'd-m-Y') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    // Check url parameter
    function check_url_param($param) {
        $valid = true;

        if (!isset($param)) $valid = false;
        else if (empty($param)) $valid = false;
        else if (!is_numeric($param)) $valid = false;

        return $valid;
    }
}
