<?php

if (isset($_POST['getCampaigns'])) {
    // ================== [ Classes ] ===================
    include '../../Classes/Response.php';
    include '../../Classes/Session.php';
    include '../../Classes/Campaigns.php';
    $response = new Response();
    $session = new Session();
    // ==================================================


    // =========== [ Check If User Is Logged ] ==========
    $isLogged = $session->check_logged();
    if (!$isLogged) $response->return_response("UNAUTHORIZED");
    // ==================================================


    // ================ [ Handle Request ] ==============
    $session_user_id = $session->get_session_userid();

    $campaigns = new Campaigns($session_user_id);
    $user_campaigns = $campaigns->get_user_campaigns();

    $response->return_data($user_campaigns);
    // ==================================================
}
