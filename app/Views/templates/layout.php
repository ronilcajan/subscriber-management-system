<!DOCTYPE html>
<html lang="en">

<head>
<?= $this->include('templates/header.php') ?>
</head>

<body class="mini-sidebar">
    <!-- ===== Main-Wrapper ===== -->
    <div id="wrapper">
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <!-- ===== Top-Navigation ===== -->
        <?= $this->include('templates/top_navbar.php') ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?= $this->include('templates/side_navbar.php') ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- ===== Page-Content ===== -->
        <div class="page-wrapper">
            <!-- ===== Page-Container ===== -->
            <?= $this->renderSection('content') ?>
            <!-- ===== Page-Container-End ===== -->
            <footer class="footer t-a-c">
                © <?= date('Y') ?> Subscriber Management System
            </footer>
        </div>
        <!-- ===== Page-Content-End ===== -->
    </div>
    <!-- ===== Main-Wrapper-End ===== -->
    <!-- ==============================
        Footer
    =============================== -->
    <?= $this->include('templates/footer.php') ?>
</body>

</html>
