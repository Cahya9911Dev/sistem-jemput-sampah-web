<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">      
              <h3 class="mt-4"><?php echo $title ?></h3>
                <br>
                <?php echo $this->session->flashdata('msg');?>
            </div>
            
            <div class="card mb-4 ms-4" style="width: 65%;">
                <div class="card-header">
                    Update Data Masyarakat
                </div>

                <div class="card-body">
                <?php foreach ($masyarakat as $ms) : ?>
                    <form method="POST" action="<?=base_url('admin/masyarakat/updatemasyarakataksi')?>">
                    <input type="hidden" class="form-control" name="masyarakat_nomorhp" value="<?= $ms->masyarakat_nomorhp ?>" required>
                    <input type="hidden" class="form-control" name="masyarakat_nama" value="<?= $ms->masyarakat_nama ?>" required>
                    <input type="hidden" class="form-control" name="masyarakat_alamat" value="<?= $ms->masyarakat_alamat ?>" required>
                        <div class="form-group">
                            <label>Nomor HP Masyarakat</label>
                            <input type="number" class="form-control" name="masyarakat_nomorhp" placeholder="Nomor HP Masyarakat" 
                            value="<?=$ms->masyarakat_nomorhp ?>" required disabled>
                        </div>
                        <div class="form-group">
                            <label>Nama Masyarakat</label>
                            <input type="text" class="form-control" name="masyarakat_namabaru" placeholder="Nama Masyarakat" 
                            value="<?=$ms->masyarakat_nama ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <label>Alamat Masyarakat</label>
                            <input type="text" class="form-control" name="masyarakat_alamatbaru" placeholder="Alamat Masyarakat" 
                            value="<?=$ms->masyarakat_alamat ?>" required>
                        </div>
                        <!-- <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="masyarakat_password" placeholder="Password" required>
                        </div> -->
                        <div class="form-group">
                            <i><label class="text-danger">*) Masukkan data baru masyarakat untuk update data</label></i>
                        </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?=base_url('admin/masyarakat')?>" class="btn btn-danger text-white">Batal</a>
                    </form>
                <?php endforeach;?>
            </div>
        </main>