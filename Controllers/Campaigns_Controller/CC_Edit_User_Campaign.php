<?php

if (isset($_POST['edit_campaign'])) {
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
    $id = strip_tags($_POST["id"]);
    $name = strip_tags($_POST["name"]);
    $target = strip_tags($_POST["target"]);
    $start_date = strip_tags($_POST["start_date"]);
    $end_date = strip_tags($_POST["end_date"]);
    $description = strip_tags($_POST["description"]);

    // Check id
    if (!$checkers->check_url_param($id)) $response->return_response("SORRY_THIS_CAMPAIGN_DOES_NOT_EXIST");

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
    $campaigns->set_campaign_id($id);

    // Check if campaign_id exist
    if (!$campaigns->campaign_exist()) $response->return_response("SORRY_THIS_CAMPAIGN_DOES_NOT_EXIST");

    // Check if campaign_id is owned by the user
    $campaign_owner = $campaigns->get_campaign_owner();
    if ($campaign_owner !== $session_user_id) $response->return_response("SORRY_YOU_DONT_OWN_THIS_CAMPAIGN");

    // Set data
    $campaigns->set_data("name", $name);
    $campaigns->set_data("target", $target);
    $campaigns->set_data("start_date", $start_date);
    $campaigns->set_data("end_date", $end_date);
    $campaigns->set_data("description", $description);

    // Update campaign
    $edited_campaign = $campaigns->edit_user_campaign();

    if ($edited_campaign) $response->return_response("CAMPAIGN_HAS_BEEN_UPDATED");
    else $response->return_response("NO_CHANGES_HAS_BEEN_MADE");
    // ==================================================
}
