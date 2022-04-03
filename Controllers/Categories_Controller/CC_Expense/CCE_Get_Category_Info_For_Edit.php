<?php

if (isset($_POST['category_id'])) {
    // ================== [ Classes ] ===================
    include '../../../Classes/Response.php';
    include '../../../Classes/Session.php';
    include '../../../Classes/Categories.php';
    include '../../../Classes/Generators.php';
    $response = new Response();
    $session = new Session();
    $generators = new Generators();
    // ==================================================


    // =========== [ Check If User Is Logged ] ==========
    $isLogged = $session->check_logged();
    if (!$isLogged) $response->return_response("UNAUTHORIZED");
    // ==================================================


    // ================= [ Check Data ] =================
    $category_id = strip_tags($_POST['category_id']);
    if (empty($category_id) || !is_numeric($category_id)) $response->return_response("CATEGORY_NOT_FOUND");
    // ==================================================


    // ================ [ Handle Request ] ==============
    $session_user_id = $session->get_session_userid();

    $categories = new Categories($session_user_id, "income");
    $result = $categories->get_user_category_info($category_id);

    if ($result) $response->return_data($result);
    else $response->return_response("CATEGORY_NOT_FOUND");
    // ==================================================
}
