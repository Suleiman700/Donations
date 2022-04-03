<?php

include '../../Classes/Session.php';
$session = new Session();
$session->unset_session(); // Unset session
exit(header("location: ./login.php"));
