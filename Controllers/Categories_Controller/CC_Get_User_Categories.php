<?php

if (isset($_POST['category_type'])) {
    // ================== [ Classes ] ===================
    include '../../Classes/Response.php';
    include '../../Classes/Session.php';
    include '../../Classes/Categories.php';
    $response = new Response();
    $session = new Session();
    // ==================================================


    // =========== [ Check If User Is Logged ] ==========
    $isLogged = $session->check_logged();
    if (!$isLogged) $response->return_response("UNAUTHORIZED");
    // ==================================================


    // ================= [ Check Data ] =================
    $category_type = strip_tags($_POST['category_type']);
    $allowed_types = array("income", "expense");

    if (!in_array($category_type, $allowed_types)) {
        $response->return_response("WRONG_CATEGORY_TYPE");
    }
    // ==================================================


    // ================ [ Handle Request ] ==============
    $session_user_id = $session->get_session_userid();

    $categories = new Categories($session_user_id, $category_type);
    $user_categories = $categories->get_user_categories();

    $response->return_data($user_categories);
    // ==================================================
}
