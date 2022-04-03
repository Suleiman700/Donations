<?php

require_once 'DBConnection.php';

class Login
{
    public $email;
    public $password;

    function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    // Check if email exist
    function email_exist() {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $email = $this->email;

        $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data[0]['count'];
    }

    // Get user data by email
    function get_user_data_by_email() {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $email = $this->email;

        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data[0];
    }
}
