<?php

if (isset($_POST['set_language'])) {
    // ================== [ Classes ] ===================
    include '../../Classes/Response.php';
    include '../../Classes/Language.php';
    include '../../Classes/Session.php';
    $response = new Response();
    $language = new Language();
    $session = new Session();
    // ==================================================


    // =========== [ Check If Valid Language ] ==========
    $language_code = strip_tags($_POST['set_language']);
    $allowed_languages_codes = (array) $language->get_all_langs_codes();

    if (!in_array($language_code, $allowed_languages_codes)) {
        $response->return_response("LANGUAGE_CODE_NOT_FOUND");
    }
    // ==================================================


    // ================ [ Handle Request ] ==============
    // Set session
    $session->set_language($language_code);

    $response->return_data("SUCCESS");
    // ==================================================
}
