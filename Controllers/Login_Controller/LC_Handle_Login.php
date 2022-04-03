<?php

if (isset($_POST['email']) && isset($_POST['password'])) {
    // ================== [ Classes ] ===================
    include '../../Classes/Login.php';
    include '../../Classes/Checkers.php';
    include '../../Classes/Response.php';
    include '../../Classes/Session.php';
    $checkers = new Checkers();
    $response = new Response();
    $session = new Session();
    // ==================================================


    // ================= [ Check Data ] =================
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    // Check email
    $checkers->set_value($email);
    $valid = $checkers->check_email();
    if (!$valid) {
        $response->return_response("WRONG_EMAIL_ADDRESS_OR_PASSWORD");
    }

    // Check password
    if (empty($password)) {
        $response->return_response("PASSWORD_CAN_NOT_BE_EMPTY");
    }
    // ==================================================



    // ================ [ Handle Login ] ================
    $login = new Login($email, $password);

    // Check if email exist
    $email_found = $login->email_exist();
    if (!$email_found) {
        $response->return_response("WRONG_EMAIL_ADDRESS_OR_PASSWORD");
    }

    // Get user data
    $user_data = $login->get_user_data_by_email();
    if (!$user_data) {
        $response->return_response("WRONG_EMAIL_ADDRESS_OR_PASSWORD");
    }

    // Compare hashed password
    $valid = password_verify($password , $user_data["password"]);
    if (!$valid) {
        $response->return_response("WRONG_EMAIL_ADDRESS_OR_PASSWORD");
    }

    // Complete login
    $session->set_session($user_data["id"], $user_data["username"]);
    $response->return_response("SUCCESS");
    // ==================================================
}

