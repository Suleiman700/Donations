<?php

if (isset($_POST['get_donations'])) {
    // ================== [ Classes ] ===================
    include '../../Classes/Response.php';
    include '../../Classes/Session.php';
    include '../../Classes/Campaigns.php';
    include '../../Classes/Donations.php';
    include '../../Classes/Permissions.php';
    include '../../Classes/Users.php';
    $response = new Response();
    $session = new Session();
    // ==================================================


    // =========== [ Check If User Is Logged ] ==========
    $isLogged = $session->check_logged();
    if (!$isLogged) $response->return_response("UNAUTHORIZED");
    // ==================================================


    // ================ [ Handle Request ] ==============
    $session_user_id = $session->get_session_userid();
    $donations = new Donations($session_user_id);
    $perm = new Permissions($session_user_id);

    // Check if user can see all donations
    $can_see_all = $perm->get_perm("see_all_donations");

    $data = array();
    if ($can_see_all) $data = $donations->get_all_donations();
    else $data = $donations->get_self_donations();

    // Get campaign info
    foreach ($data as $index => $donation) {
        $campaigns = new Campaigns("");
        $campaigns->set_campaign_id($donation["campaign"]);
        $data[$index]["campaign"] = $campaigns->get_data("name");
    }

    // Get received_by info
    foreach ($data as $index => $donation) {
        $users = new Users($donation["received_by"]);
        $data[$index]["received_by"] = $users->get_data("username");
    }

    $response->return_data($data);
    // ==================================================
}
