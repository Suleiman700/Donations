<?php

require_once 'DBConnection.php';

class Users
{
    public $user_id;

    function __construct($id) {
        $this->user_id = $id;
    }

    // Get user data by specific column
    function get_data($col) {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT `$col` AS data FROM users WHERE id = ?");
        $stmt->bind_param("s", $this->user_id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data[0]["data"];
    }
}
