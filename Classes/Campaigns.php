<?php

require_once 'DBConnection.php';

class Campaigns
{
    public $user_id;
    public $name;
    public $target;
    public $start_date;
    public $end_date;
    public $description;
    public $campaign_id;

    function __construct($id) {
        $this->user_id = $id;
    }

    // Get user campaigns
    function get_user_campaigns() {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT * FROM campaigns WHERE user_id = ? ORDER BY id DESC");
        $stmt->bind_param("s", $this->user_id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data;
    }

    // Create new user campaign
    function create_user_campaign() {
        require_once 'Generators.php';
        $generators = new Generators();
        $db = new DbConnection();
        $conn = $db->db_connect();

        // Generate new key
        $key = $generators->generate_table_id("id", "campaigns");

        $stmt = $conn->prepare("INSERT INTO `campaigns` (`id`, `user_id`, `name`, `goal`, `start_date`, `end_date`, `description`) VALUES (?, ?, ?, ?, ?, ? ,?);");
        $stmt->bind_param("sssssss", $key, $this->user_id, $this->name, $this->target, $this->start_date, $this->end_date, $this->description);
        $stmt->execute();
        $success = mysqli_affected_rows($conn);
        if ($success>0) return true;
        else return false;
    }

    // Edit new user campaign
    function edit_user_campaign() {
        require_once 'Generators.php';
        $generators = new Generators();
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("UPDATE `campaigns` SET `name` = ?, `target` = ?, `start_date` = ?, `end_date` = ?, `description` = ? WHERE id = ? AND user_id = ?");
        $stmt->bind_param("sssssss", $this->name, $this->target, $this->start_date, $this->end_date, $this->description, $this->campaign_id, $this->user_id);
        $stmt->execute();
        $success = mysqli_affected_rows($conn);
        if ($success>0) return true;
        else return false;
    }

    // Check if campaign_id exist
    function campaign_exist() {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM campaigns WHERE id = ?");
        $stmt->bind_param("s", $this->campaign_id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data[0]["count"];
    }

    // Check if campaign_id belongs to user_id
    function get_campaign_owner() {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT user_id AS owner_id FROM campaigns WHERE id = ?");
        $stmt->bind_param("s", $this->campaign_id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data[0]["owner_id"];
    }

    // Get campaign data based on column
    function get_data($col) {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT $col AS data FROM campaigns WHERE id = ?");
        $stmt->bind_param("s", $this->campaign_id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data[0]["data"];
    }

    // Set campaign data
    function set_data($opt, $value) {
        switch ($opt) {
            case "name":
                $this->name = $value;
                break;
            case "target":
                $this->target = $value;
                break;
            case "start_date":
                $this->start_date = date('Y-m-d', strtotime($value));
                break;
            case "end_date":
                $this->end_date = date('Y-m-d', strtotime($value));
                break;
            case "description":
                $this->description = $value;
        }
    }

    // Set campaign id
    function set_campaign_id($value) {
        $this->campaign_id = $value;
    }
}
