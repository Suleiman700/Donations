<?php
include_once "../../Config/Master_Include.php";
?>

<!doctype html>
<html lang="en">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title><?php echo $app->get_word("income_categories"); ?></title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="../../assets/css/style.css" rel="stylesheet" />
    <link href="../../assets/css/dark-style.css" rel="stylesheet" />
    <link href="../../assets/css/transparent-style.css" rel="stylesheet">
    <link href="../../assets/css/skin-modes.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="../../assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="../../assets/colors/color1.css" />
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
                        <h1 class="page-title"><?php echo $app->get_word("income_categories"); ?></h1>
                        <div>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $app->public_dir; ?>dashboard/index.php"><?php echo $app->get_word("dashboard"); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $app->get_word("income_categories"); ?></li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <div class="row d-flex justify-content-end">
                        <div class="col-xl-3 col-lg-12">
                            <a class="modal-effect btn btn-primary btn-block float-end my-2" data-bs-effect="effect-sign" data-bs-toggle="modal" href="#addModal"><i class="fa fa-plus-square me-2"></i><?php echo $app->get_word("new_category"); ?></a>
                        </div>
                    </div>

                    <!-- ROW OPEN -->
                    <div class="row row-cards">
                        <div class="col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-header border-bottom-0 p-4">
                                </div>
                                <div class="e-table px-5 pb-5">
                                    <div class="table-responsive table-lg">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom" id="myTable">
                                                <thead>
                                                <tr>
                                                    <th class="border-bottom-0">#</th>
                                                    <th class="border-bottom-0">Name</th>
                                                    <th class="border-bottom-0">Options</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- COL-END -->
                    </div>
                    <!-- ROW CLOSED -->
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!--app-content closed-->
    </div>

    <!-- Sidebar-right -->
    <?php include_once "../../Components/Sidebar_Right.php"; ?>
    <!--/Sidebar-right-->

    <!-- Country-selector modal-->
    <?php include_once "../../Components/Language_Selector.php"; ?>
    <!-- Country-selector modal-->

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 text-center">
                    Copyright © 2022 <a href="javascript:void(0)">Sash</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0)"> Spruko </a> All rights reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER CLOSED -->
</div>

<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- JQUERY JS -->
<script src="../../assets/js/jquery.min.js"></script>


<!-- BOOTSTRAP JS -->
<script src="../../assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SPARKLINE JS-->
<script src="../../assets/js/jquery.sparkline.min.js"></script>

<!-- CHART-CIRCLE JS-->
<script src="../../assets/js/circle-progress.min.js"></script>

<!-- C3 CHART JS -->
<script src="../../assets/plugins/charts-c3/d3.v5.min.js"></script>
<script src="../../assets/plugins/charts-c3/c3-chart.js"></script>

<!-- INPUT MASK JS-->
<script src="../../assets/plugins/input-mask/jquery.mask.min.js"></script>

<!-- SIDE-MENU JS -->
<script src="../../assets/plugins/sidemenu/sidemenu.js"></script>

<!-- SIDEBAR JS -->
<script src="../../assets/plugins/sidebar/sidebar.js"></script>

<!-- Select2 JS-->
<script src="../../assets/plugins/select2/select2.full.min.js"></script>
<script src="../../assets/js/select2.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="../../assets/plugins/p-scroll/perfect-scrollbar.js"></script>
<script src="../../assets/plugins/p-scroll/pscroll.js"></script>
<script src="../../assets/plugins/p-scroll/pscroll-1.js"></script>

<!-- Color Theme js -->
<script src="../../assets/js/themeColors.js"></script>

<!-- Sticky js -->
<script src="../../assets/js/sticky.js"></script>

<!-- CUSTOM JS -->
<script src="../../assets/js/custom.js"></script>

<!-- WEBSITE THEME -->
<script type="module" src="../../Scripts/website_theme.js"></script>

<script type="module" src="../../Scripts/IncomeCategories_SCRIPTS/job.js"></script>

<?php include_once "../../Modals/Error_Modal.php"; ?>


<!-- NEW CATEGORY MODAL -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"><?php echo $app->get_word("new_category"); ?></h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-dismissible fade show" role="alert" id="alert" style="display:none"></div>
                <div class="form-group">
                    <label for="name" class="form-label" dir="<?php echo $app->layout_dir; ?>"><?php echo $app->get_word("category_name"); ?> <code>*</code></label>
                    <input type="text" class="form-control" id="name" placeholder="<?php echo $app->get_word("category_name"); ?>" dir="auto">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="add"><i class="fa fa-plus-square me-2"></i><?php echo $app->get_word("add"); ?></button>
                <button class="btn btn-light" data-bs-dismiss="modal"><?php echo $app->get_word("close"); ?></button>
            </div>
        </div>
    </div>
</div>

<!-- EDIT CATEGORY MODAL -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"><?php echo $app->get_word("edit_category"); ?></h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-dismissible fade show" role="alert" id="alert" style="display:none"></div>
                <div class="form-group">
                    <label for="name" class="form-label" dir="<?php echo $app->layout_dir; ?>"><?php echo $app->get_word("category_name"); ?> <code>*</code></label>
                    <input type="text" class="form-control" id="name" placeholder="<?php echo $app->get_word("category_name"); ?>" dir="auto">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="save"><i class="fa fa-check me-2"></i><?php echo $app->get_word("save"); ?></button>
                <button class="btn btn-light" data-bs-dismiss="modal"><?php echo $app->get_word("close"); ?></button>
            </div>
        </div>
    </div>
</div>

<!-- DATA TABLE JS-->
<script src="../../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>


</body>

</html>
