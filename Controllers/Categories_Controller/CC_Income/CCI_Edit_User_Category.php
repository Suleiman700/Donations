<?php

if (isset($_POST['category_id']) && isset($_POST['category_name'])) {
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
    $category_name = strip_tags($_POST['category_name']);

    if (empty($category_id) || !is_numeric($category_id)) $response->return_response("CATEGORY_NOT_FOUND");
    else if (empty($category_name)) $response->return_response("CATEGORY_NAME_CAN_NOT_BE_EMPTY");
    // ==================================================


    // ================ [ Handle Request ] ==============
    $session_user_id = $session->get_session_userid();

    $categories = new Categories($session_user_id, "income");

    // Check if category name has changed
    $orig_cat_data = $categories->get_info($category_id);
    $orig_cat_name = $orig_cat_data["name"];
    if ($orig_cat_name===$category_name) $response->return_response("NO_CHANGES_HAS_BEEN_MADE");

    $result = $categories->edit_user_category($category_id, $category_name);
    if ($result) $response->return_response("CATEGORY_NAME_HAS_BEEN_UPDATED");
    else $response->return_response("ERROR_WHILE_UPDATING_CATEGORY");
    // ==================================================
}
