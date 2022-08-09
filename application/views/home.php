<?php defined('BASEPATH') or exit('No direct script access allowed') ?>

<!DOCTYPE html>
<html lang="pt-br">

<?php $this->load->view('includes/head.php')  ?>

<body class="  ">

    <?php $this->load->view('includes/header.php')  ?>

    <main class="main-content">
        <div class="position-relative iq-banner">
            <div class="iq-navbar-header" style="height: 80px;">
                <div class="iq-header-img">
                    <img src="../../assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-50 animated-scaleX">
                </div>
            </div> <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>

        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title"><?php echo $title ?></h4>
                            </div>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('includes/footer.php')  ?>
    </main>
    
</html>