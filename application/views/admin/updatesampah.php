<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">      
              <h3 class="mt-4"><?php echo $title ?></h3>
                <br>
                <?php echo $this->session->flashdata('msg');?>
            </div>
            
            <div class="card mb-4 ms-4" style="width: 65%;">
                <div class="card-header">
                    Edit Data Sampah
                </div>

                <div class="card-body">
                <?php foreach ($sampah as $sp) : ?>
                    <form method="POST" action="<?=base_url('admin/sampah/updatesampahaksi')?>">
                        <input type="hidden" class="form-control" name="sampah_id" value="<?= $sp->sampah_id ?>" required>
                        <div class="form-group">
                            <label>Kode Sampah</label>
                            <input type="text" class="form-control" name="sampah_id" placeholder="Kode Sampah"
                            value="<?=$sp->sampah_id ?>" required disabled>
                        </div>
                        <div class="form-group">
                            <label>Nama Sampah</label>
                            <input type="text" class="form-control" name="sampah_nama" placeholder="Nama Sampah"
                            value="<?=$sp->sampah_nama ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <i><label class="text-danger">*) Masukkan nama baru sampah untuk update data</label></i>
                        </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?=base_url('admin/kategorisampah')?>" class="btn btn-danger text-white">Batal</a>
                    </form>
                <?php endforeach;?>
            </div>
        </main>