<?php

require_once 'DBConnection.php';

class Categories
{
    public $user_id;
    public $category_type;
    public $table_name;

    function __construct($id, $type) {
        $this->user_id = $id;
        $this->category_type = $type; // income / expense
    }

    // Get user categories
    function get_user_categories() {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $this->gen_table_name(); // Generate table name
        $table = $this->table_name;

        $stmt = $conn->prepare("SELECT * FROM $table WHERE user_id = ? ORDER BY id DESC");
        $stmt->bind_param("s", $this->user_id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data;
    }

    // Generate table name based on category type name
    function gen_table_name() {
        if ($this->category_type==="income") $this->table_name = "income_categories";
        else if ($this->category_type==="expense") $this->table_name = "expense_categories";
        else $this->table_name = NULL;
    }

    // Create new user category
    function create_user_category($category_name) {
        $generators = new Generators();
        $db = new DbConnection();
        $conn = $db->db_connect();

        // Generate table name
        $this->gen_table_name();
        $table = $this->table_name;

        // Generate new key
        $key = $generators->generate_table_id("id", $table);

        $stmt = $conn->prepare("INSERT INTO `$table` (`id`, `user_id`, `name`) VALUES (?, ?, ?);");
        $stmt->bind_param("sss", $key, $this->user_id, $category_name);
        $stmt->execute();
        $success = mysqli_affected_rows($conn);
        if ($success>0) return true;
        else return false;
    }

    // Get specific category info
    function get_user_category_info($category_id) {
        $db = new DbConnection();
        $conn = $db->db_connect();

        // Generate table name
        $this->gen_table_name();
        $table = $this->table_name;

        $stmt = $conn->prepare("SELECT * FROM $table WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ss", $category_id, $this->user_id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $success = mysqli_affected_rows($conn);
        if ($success>0) return $data[0];
        else return false;
    }

    // Get specific category info
    function get_info($category_id) {
        $db = new DbConnection();
        $conn = $db->db_connect();

        // Generate table name
        $this->gen_table_name();
        $table = $this->table_name;

        $stmt = $conn->prepare("SELECT * FROM $table WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ss", $category_id, $this->user_id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else return $data[0];
    }

    // Edit user category
    function edit_user_category($category_id, $category_name) {
        $db = new DbConnection();
        $conn = $db->db_connect();

        // Generate table name
        $this->gen_table_name();
        $table = $this->table_name;

        $stmt = $conn->prepare("UPDATE `$table` SET `name` = ? WHERE id = ? AND user_id = ?");
        $stmt->bind_param("sss", $category_name, $category_id, $this->user_id);
        $stmt->execute();
        $success = mysqli_affected_rows($conn);
        if ($success>0) return true;
        else return false;
    }
}
