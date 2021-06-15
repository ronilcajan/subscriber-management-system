<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <?php $db = db_connect();
    $query = $db->query("SELECT `icon`,`name` FROM system_info WHERE id=1");
    $result = $query->getRow();
    ?>
    <link rel="icon" type="image/png" sizes="32x32" href="<?= empty($result->icon) ? site_url().'images/logo-transparent.png' : site_url('uploads/').$result->icon ?>">
    <title>Authentication | <?= empty($result->name) ? 'Waga Network Solutions' : $result->name ?></title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="<?= site_url() ?>/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <!-- ===== Animation CSS ===== -->
    <link href="<?= site_url() ?>/assets/css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="<?= site_url() ?>/assets/css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="<?= site_url() ?>/assets/css/colors/default.css" id="theme" rel="stylesheet">
    <style>
        li{
            list-style: none;
            width: 100%;
            text-align: left;
        }
        ul{
            padding-left: 0;
            margin-bottom: 0;
        }
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
        }
    </style>
</head>
<body class="mini-sidebar">
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
	<?= $this->renderSection('main') ?>
</body>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?= site_url() ?>/plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
<script src="<?= site_url() ?>/assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?= site_url() ?>/assets/js/sidebarmenu.js"></script>
<!--slimscroll JavaScript -->
<script src="<?= site_url() ?>/assets/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?= site_url() ?>/assets/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?= site_url() ?>/assets/js/custom.js"></script>
<!--Style Switcher -->
<script src="<?= site_url() ?>/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
<script>
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }
    });
</script>
</body>
</html>
