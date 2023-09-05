<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">      
              <h3 class="mt-4"><?php echo $title ?></h3>
                <br>
                <?php echo $this->session->flashdata('msg');?>
            </div>
            
            <div class="card mb-4 ms-4" style="width: 65%;">
                <div class="card-header">
                    Edit Kategori Sampah
                </div>

                <div class="card-body">
                <?php foreach ($kategori as $ks) : ?>
                    <form method="POST" action="<?=base_url('admin/kategorisampah/updatekategoriaksi')?>">
                        <input type="hidden" class="form-control" name="kategori_id" value="<?= $ks->kategori_id ?>" required>
                        <div class="form-group">
                            <label>Kode Kategori Sampah</label>
                            <input type="text" class="form-control" name="kategori_id" placeholder="Kode Kategori Sampah"
                            value="<?=$ks->kategori_id ?>" required disabled>
                        </div>
                        <div class="form-group">
                            <label>Kategori Sampah</label>
                            <input type="text" class="form-control" name="kategori_nama" placeholder="Kategori Sampah"
                            value="<?=$ks->kategori_nama ?>" required>
                        </div>
                        <div class="form-group">
                            <i><label class="text-danger">*) Masukkan nama baru kategori sampah untuk update data</label></i>
                        </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?=base_url('admin/kategorisampah')?>" class="btn btn-danger text-white">Batal</a>
                    </form>
                <?php endforeach;?>
            </div>
        </main>