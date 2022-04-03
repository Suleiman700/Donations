<?php

require_once 'DBConnection.php';

class Cars
{
    function __construct() {}

    // Count user cars
    function count_user_cars() {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $session = new Session();
        $user_id = $session->get_session_username();

        $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM cars WHERE user_id = ?");
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data[0]['count'];
    }
}
