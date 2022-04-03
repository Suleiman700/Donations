<?php

if (isset($_POST['name'])) {
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
    $category_name = strip_tags($_POST['name']);
    $type = strip_tags($_POST['type']);

    // Check name
    if (empty($category_name)) $response->return_response("CATEGORY_NAME_CAN_NOT_BE_EMPTY");

    // Check category type
    $allowed_types = array("income", "expense");
    if (!in_array($type, $allowed_types)) $response->return_response("ERROR_WHILE_CREATING_CATEGORY");
    // ==================================================


    // ================ [ Handle Request ] ==============
    $session_user_id = $session->get_session_userid();

    $categories = new Categories($session_user_id, $type);
    $result = $categories->create_user_category($category_name);

    if ($result) $response->return_response("CATEGORY_HAS_BEEN_CREATED");
    else $response->return_response("ERROR_WHILE_CREATING_CATEGORY");
    // ==================================================
}
