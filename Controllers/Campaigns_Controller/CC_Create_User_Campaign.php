<?php

if (isset($_POST['create_campaign'])) {
    // ================== [ Classes ] ===================
    include '../../Classes/Response.php';
    include '../../Classes/Session.php';
    include '../../Classes/Campaigns.php';
    include '../../Classes/Checkers.php';
    $response = new Response();
    $session = new Session();
    $checkers = new Checkers();
    // ==================================================


    // =========== [ Check If User Is Logged ] ==========
    $isLogged = $session->check_logged();
    if (!$isLogged) $response->return_response("UNAUTHORIZED");
    // ==================================================


    // =================== [ Check Data ] =======================
    $name = strip_tags($_POST["name"]);
    $target = strip_tags($_POST["target"]);
    $start_date = strip_tags($_POST["start_date"]);
    $end_date = strip_tags($_POST["end_date"]);
    $description = strip_tags($_POST["description"]);

    // Check name
    if (empty($name)) $response->return_response("CAMPAIGN_NAME_CAN_NOT_BE_EMPTY");

    // Check target
    if (empty($target)) $target = 0;

    // Check start date
    if (!$checkers->check_valid_date($start_date)) $response->return_response("PLEASE_ENTER_A_VALID_DATE");

    // Check end date
    if (!$checkers->check_valid_date($end_date)) $response->return_response("PLEASE_ENTER_A_VALID_DATE");
    // ==========================================================


    // ================ [ Handle Request ] ==============
    $session_user_id = $session->get_session_userid();

    $campaigns = new Campaigns($session_user_id);

    $campaigns->set_data("name", $name);
    $campaigns->set_data("target", $target);
    $campaigns->set_data("start_date", $start_date);
    $campaigns->set_data("end_date", $end_date);
    $campaigns->set_data("description", $description);

    $created_campaign = $campaigns->create_user_campaign();
    if ($created_campaign) $response->return_response("CAMPAIGN_HAS_BEEN_CREATED");
    else $response->return_response("ERROR_WHILE_CREATING_CAMPAIGN");
    // ==================================================
}
