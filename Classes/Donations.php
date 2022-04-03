<?php

require_once 'DBConnection.php';

class Donations
{
    public $added_By;
    public $donation_id;

    function __construct($id) {
        $this->added_by = $id;
    }

    // Get all donations
    function get_all_donations() {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT * FROM donations ORDER BY id DESC");
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data;
    }

    // Get only user donations
    function get_self_donations() {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT * FROM donations WHERE added_by = ? ORDER BY id DESC");
        $stmt->bind_param("s", $this->added_by);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data;
    }

    // Check if donation exist
    function check_exist() {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM donations WHERE id = ?");
        $stmt->bind_param("s", $this->donation_id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data[0]["count"];
    }

    // Get donation added_by
    function get_added_by() {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT added_by AS data FROM donations WHERE id = ?");
        $stmt->bind_param("s", $this->donation_id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data[0]["data"];
    }

    // Set campaign id
    function set_id($value) {
        $this->donation_id = $value;
    }

    function get_data($col) {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT $col AS data FROM donations WHERE id = ?");
        $stmt->bind_param("s", $this->donation_id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data[0]["data"];
    }
}
