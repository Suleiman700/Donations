<?php
    include '../../Classes/Session.php';
    include '../../Classes/Application.php';
//    include '../../Classes/Language.php';


    // ========================== [ Session ] ===================
    $session = new Session();
    $master_username = $session->get_session_username(); // Get session username
    $master_userid = $session->get_session_userid(); // Get session userid
    $session->redirect_non_logged_to_dashboard(); // Redirect non logged in users to the login page
    // ==========================================================


    // ========================== [ Language ] ==========================
    $session_lang_code = $session->get_language(); // Get session language
    if (empty($session_lang_code)) $session->set_language("en"); // Set default language if not found
    // ==========================================================


    // ========================== [ Application Settings ] ==========================
    $app = new Application();
    $lang = new Language();
    $app->base_url = 'http://localhost/PHP/crm/';
    $app->public_dir = 'http://localhost/PHP/crm/public/';

    if (empty($app->default_lang)) $session->set_language("en");
    $app->default_lang = $session_lang_code;
    $app->default_lang_name = $lang->get_lang_name($session_lang_code);
    $app->layout_dir = $lang->get_lang_dir($session_lang_code);
    // ==========================================================
