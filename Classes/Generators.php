<?php

require_once 'DBConnection.php';

class Generators
{
    // Generate new table key
    function generate_table_id($key, $table) {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT max($key) AS data FROM $table");
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $last_used_key = $data[0]["data"];
        if (!$last_used_key) return 1;
        else return $last_used_key+1;
    }
}
