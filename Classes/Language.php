<?php

require_once 'DBConnection.php';

class Language
{
    public $default_lang = null;

    function __construct() {}

    function get_default_lang() {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT value AS data from data WHERE str = ?");
        $str = "default_language";
        $stmt->bind_param("s", $str);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return "1";
        else return $data[0]['data'];
    }

    function get_word($lang, $word) {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT $lang AS data FROM dictionary WHERE word = ?");
        $stmt->bind_param("s", $word);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return "UNDEFINED";
        else return $data[0]['data'];
    }

    function get_words($lang, $words_arr) {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $words = array();

        foreach($words_arr as $word) {
            $stmt = $conn->prepare("SELECT $lang AS data FROM `dictionary` WHERE word = ?");
            $stmt->bind_param("s", $word);
            $stmt->execute();
            $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            $grabbed_world = "";
            if (empty($data)) $grabbed_world = "UNDEFINED";
            else $grabbed_world =  $data[0]['data'];

            $words[$word] = $grabbed_world;
        }

        return $words;
    }

    // Check if it is a valid language code
    function check_valid_lang_code($lang_code) {

    }

    // Get all languages codes
    function get_all_langs_codes() {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT lang_code from langauge");
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return false;
        else {
            // Extract languages codes into array
            $lang_codes = array();
            foreach ($data as $lang_data) $lang_codes[] = $lang_data["lang_code"];
            return $lang_codes;
        }
    }

    // Get language code direction
    function get_lang_dir($lang_code) {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT lang_dir AS data FROM langauge WHERE lang_code = ?");
        $stmt->bind_param("s", $lang_code);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return "ltr";
        else return $data[0]['data'];
    }

    // Get language code full name
    function get_lang_name($lang_code) {
        $db = new DbConnection();
        $conn = $db->db_connect();

        $stmt = $conn->prepare("SELECT lang_name AS data FROM langauge WHERE lang_code = ?");
        $stmt->bind_param("s", $lang_code);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) return "UNDEFINED";
        else return $data[0]['data'];
    }
}
