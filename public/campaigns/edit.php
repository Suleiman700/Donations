<?php
include_once "../../Config/Master_Include.php";
include '../../Classes/Campaigns.php';
include '../../Classes/Checkers.php';
$session = new Session();
$checkers = new Checkers();


function kick(){
    exit(header("location: ./list.php"));
}

// Check url param
if (isset($_GET["id"])) {
    if (!$checkers->check_url_param($_GET["id"])) kick();
} else kick();

// Check if valid campaign
$session_user_id = $session->get_session_userid();
$campaigns = new Campaigns($session_user_id);
$campaigns->set_campaign_id($_GET["id"]);

// Check if campaign_id exist
if (!$campaigns->campaign_exist()) kick();

// Check if campaign_id is owned by the user
$campaign_owner = $campaigns->get_campaign_owner();
if ($campaign_owner !== $session_user_id) kick();

// Get campaign data
$id = $_GET["id"];
$name = $campaigns->get_data("name");
$target = $campaigns->get_data("target");
$start_date = date('d-m-Y', strtotime($campaigns->get_data("start_date")));
$end_date = date('d-m-Y', strtotime($campaigns->get_data("end_date")));
$description = $campaigns->get_data("description");
?>

<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
          content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/brand/favicon.ico"/>

    <!-- TITLE -->
    <title><?php echo $app->get_word("edit_campaign"); ?></title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- STYLE CSS -->
    <link href="../../assets/css/style.css" rel="stylesheet"/>
    <link href="../../assets/css/dark-style.css" rel="stylesheet"/>
    <link href="../../assets/css/transparent-style.css" rel="stylesheet">
    <link href="../../assets/css/skin-modes.css" rel="stylesheet"/>

    <!--- FONT-ICONS CSS -->
    <link href="../../assets/css/icons.css" rel="stylesheet"/>

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="../../assets/colors/color1.css"/>

</head>

<body class="app sidebar-mini <?php echo $app->layout_dir; ?>">

<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <img src="../../assets/images/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- /GLOBAL-LOADER -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">

        <!-- app-Header -->
        <?php include_once "../../Components/Header.php"; ?>
        <!-- /app-Header -->

        <!--APP-SIDEBAR-->
        <?php include_once "../../Components/Sidebar.php"; ?>
        <!--/APP-SIDEBAR-->

        <!--app-content open-->
        <div class="main-content app-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container container-fluid">

                    <!-- PAGE-HEADER -->
                    <div class="page-header">
                        <h1 class="page-title"><?php echo $app->get_word("edit_campaign"); ?></h1>
                        <div>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                            href="<?php echo $app->public_dir; ?>dashboard/index.php"><?php echo $app->get_word("dashboard"); ?></a>
                                </li>
                                <li class="breadcrumb-item"><a
                                            href="./list.php"><?php echo $app->get_word("campaigns_list"); ?></a></li>
                                <li class="breadcrumb-item active"
                                    aria-current="page"><?php echo $app->get_word("edit_campaign"); ?></li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <div class="row d-flex justify-content-end">
                        <div class="col-xl-3 col-lg-12">
                            <a class="btn btn-primary btn-block float-end my-2" href="./list.php"><i
                                        class="fa fa-list me-2"></i><?php echo $app->get_word("campaigns_list"); ?></a>
                        </div>
                    </div>

                    <div class="row row-cards">
                        <div class="col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><?php echo $app->get_word("edit_campaign"); ?></h3>
                                </div>
                                <div class="card-body">
                                    <div class="alert text-center" role="alert" id="alert" style="display: none"></div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="name"><?php echo $app->get_word("name"); ?> <code>*</code></label>
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-info tx-16 lh-0 op-6"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="name" value="<?php echo $name; ?>" placeholder="<?php echo $app->get_word("campaign_name"); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="target"><?php echo $app->get_word("target"); ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-money tx-16 lh-0 op-6"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="target" value="<?php echo $target; ?>" placeholder="<?php echo $app->get_word("campaign_target"); ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="start_date"><?php echo $app->get_word("start_date"); ?>
                                                    <code>*</code></label>
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                    </div>
                                                    <input class="form-control fc-datepicker" id="start_date" value="<?php echo $start_date; ?>" placeholder="DD-MM-YYYY" type="text" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="end_date"><?php echo $app->get_word("end_date"); ?>
                                                    <code>*</code></label>
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                    </div>
                                                    <input class="form-control fc-datepicker" id="end_date" value="<?php echo $end_date; ?>" placeholder="DD-MM-YYYY" type="text" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description"><?php echo $app->get_word("description"); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <i class="fa fa-pencil tx-16 lh-0 op-6"></i>
                                            </div>
                                            <input type="email" class="form-control" id="description" value="<?php echo $description; ?>" dir="auto">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-success my-1" id="edit"><i class="fa fa-save"></i> <?php echo $app->get_word("save"); ?></button>
                                    <a href="./list.php" class="btn btn-danger my-1"><i class="fa fa-times"></i> <?php echo $app->get_word("cancel"); ?></a>
                                    <button class="btn btn-outline-danger my-1" id="delete"><i class="fa fa-trash"></i> <?php echo $app->get_word("delete"); ?></button>
                                </div>
                            </div>
                        </div>
                        <!-- COL-END -->
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->

            </div>
        </div>
        <!--app-content closed-->
    </div>
    <input type="hidden" value="<?php echo $id; ?>" id="id">

    <!-- Sidebar-right -->
    <?php include_once "../../Components/Sidebar_Right.php"; ?>
    <!--/Sidebar-right-->

    <!-- Country-selector modal-->
    <?php include_once "../../Components/Language_Selector.php"; ?>
    <!-- Country-selector modal-->

    <!-- FOOTER -->
    <?php include_once "../../Components/Footer.php"; ?>
    <!-- FOOTER CLOSED -->
</div>

<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- JQUERY JS -->
<script src="../../assets/js/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="../../assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SIDE-MENU JS-->
<script src="../../assets/plugins/sidemenu/sidemenu.js"></script>

<!-- SIDEBAR JS -->
<script src="../../assets/plugins/sidebar/sidebar.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="../../assets/plugins/p-scroll/perfect-scrollbar.js"></script>
<script src="../../assets/plugins/p-scroll/pscroll.js"></script>
<script src="../../assets/plugins/p-scroll/pscroll-1.js"></script>


<!-- INTERNAL Bootstrap-Datepicker js-->
<script src="../../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- TIMEPICKER JS -->
<script src="../../assets/plugins/time-picker/jquery.timepicker.js"></script>
<script src="../../assets/plugins/time-picker/toggles.min.js"></script>


<!-- DATEPICKER JS -->
<script src="../../assets/plugins/date-picker/date-picker.js"></script>
<script src="../../assets/plugins/date-picker/jquery-ui.js"></script>
<script src="../../assets/plugins/input-mask/jquery.maskedinput.js"></script>


<!-- Color Theme js -->
<script src="../../assets/js/themeColors.js"></script>

<!-- Sticky js -->
<script src="../../assets/js/sticky.js"></script>

<!-- CUSTOM JS -->
<script src="../../assets/js/custom.js"></script>

<script type="module" src="../../Scripts/Campaigns/Campaign_Edit_Job.js"></script>

<!-- WEBSITE THEME -->
<script type="module" src="../../Scripts/website_theme.js"></script>

<script>
    // DATEPICKER
    $('.fc-datepicker').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        dateFormat: 'dd-mm-yy'
    });
</script>
</body>

</html>
