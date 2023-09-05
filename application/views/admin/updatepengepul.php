<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">      
              <h3 class="mt-4"><?php echo $title ?></h3>
                <br>
                <?php echo $this->session->flashdata('msg');?>
            </div>
            
            <div class="card mb-4 ms-4" style="width: 65%;">
                <div class="card-header">
                    Update Data Pengepul
                </div>

                <div class="card-body">
                <?php foreach ($pengepul as $pp) : ?>
                    <form method="POST" action="<?=base_url('admin/pengepul/updatepengepulaksi')?>">
                    <input type="hidden" class="form-control" name="pengepul_id" value="<?= $pp->pengepul_id ?>" required>

                        <div class="form-group">
                            <label>Kode Pengepul</label>
                            <input type="text" class="form-control" name="pengepul_id" placeholder="Kode Pengepul"
                            value="<?=$pp->pengepul_id ?>" required disabled>
                        </div>
                        <div class="form-group">
                            <label>Nama Pengepul</label>
                            <input type="text" class="form-control" name="pengepul_nama" placeholder="Nama Pengepul" 
                            value="<?=$pp->pengepul_nama ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <label>Alamat Pengepul</label>
                            <input type="text" class="form-control" name="pengepul_alamat" placeholder="Alamat Pengepul" 
                            value="<?=$pp->pengepul_alamat ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor HP Pengepul</label>
                            <input type="number" class="form-control" name="pengepul_nomorhp" placeholder="Nomor HP Pengepul" 
                            value="<?=$pp->pengepul_nomorhp ?>" required>
                        </div>
                        <div class="form-group">
                            <i><label class="text-danger">*) Masukkan data baru pengepul untuk update data</label></i>
                        </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?=base_url('admin/pengepul')?>" class="btn btn-danger text-white">Batal</a>
                    </form>
                <?php endforeach;?>
            </div>
        </main>