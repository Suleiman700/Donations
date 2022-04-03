<?php

require_once 'DBConnection.php';

class Permissions
{
    public $user_id;

    function __construct($id) {
        $this->user_id = $id;
    }

    function get_perm($perm) {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT `$perm` AS data FROM users_perm WHERE user_id = ?");
        $stmt->bind_param("s", $this->user_id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data[0]["data"];
    }
}
