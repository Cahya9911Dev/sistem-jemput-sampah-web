<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Resik App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-5" style="background-color: #198754">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                E-Resik APP Sleman
            </a>
        </div>
    </nav>

    <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header" style="background-color: #198754;">
                                    <h2 class="row justify-content-center text-white">E-RESIK APP</h2>
                                    <h6 class="row justify-content-center text-white">Sistem Jemput Sampah Daur Ulang</h6>
                                    <h6 class="row justify-content-center text-white">Kabupaten Sleman</h6>
                                    </div>
                                    <div class="card-body">

                                        <?php echo $this->session->flashdata('msg');?>

                                        <form class="lpengepul" action="<?= base_url('loginpengepul'); ?>" method="POST">
                                        <form>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="pengepul_id" name="pengepul_nomorhp" type="text" placeholder="Nomor HP" required autofocus/>
                                                <label for="inputId">Nomor HP</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="pengepul_password" type="password" placeholder="Password" required/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-success py-2" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() ?>/assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() ?>/assets/js/datatables-simple-demo.js"></script>
</body>
</html>