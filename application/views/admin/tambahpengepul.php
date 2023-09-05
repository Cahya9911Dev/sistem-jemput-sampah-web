<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">      
              <h3 class="mt-4"><?php echo $title ?></h3>
                <br>
                <?php echo $this->session->flashdata('msg');?>
            </div>
            
            <div class="card mb-4 ms-4" style="width: 65%;">
                <div class="card-header">
                    Tambah Data Pengepul
                </div>

                <div class="card-body">
                    <form method="POST" action="<?=base_url('admin/pengepul/tambahpengepulaksi')?>">
                        <div class="form-group">
                            <label>Kode Pengepul</label>
                            <input type="text" class="form-control" name="pengepul_id" placeholder="Kode Pengepul" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Pengepul</label>
                            <input type="text" class="form-control" name="pengepul_nama" placeholder="Nama Pengepul" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat Pengepul</label>
                            <input type="text" class="form-control" name="pengepul_alamat" placeholder="Alamat Pengepul" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor HP Pengepul</label>
                            <input type="number" class="form-control" name="pengepul_nomorhp" placeholder="Nomor HP Pengepul" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pengepul_password" placeholder="Password" required>
                        </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?=base_url('admin/pengepul')?>" class="btn btn-danger text-white">Batal</a>
                    </form>
            </div>
        </main>