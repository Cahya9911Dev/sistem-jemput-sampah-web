<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">      
              <h3 class="mt-4"><?php echo $title ?></h3>
                <br>
                <?php echo $this->session->flashdata('msg');?>
            </div>
            
            <div class="card mb-4 ms-4" style="width: 65%;">
                <div class="card-header">
                    Tambah Data Sampah
                </div>

                <div class="card-body">
                <?php foreach ($kategori as $ks) : ?>
                    <form method="POST" action="<?=base_url('admin/sampah/tambahsampahaksi')?>">
                        <input type="hidden" class="form-control" name="sampah_kategori" value="<?= $ks->kategori_id ?>" required>
                        <div class="form-group">
                            <label>Kode Kategori Sampah</label>
                            <input type="text" class="form-control" name="kategori_id" placeholder="Kode Kategori Sampah"
                            value="<?=$ks->kategori_id ?>" required disabled>
                        </div>
                <?php endforeach;?>
                        <div class="form-group">
                            <label>Kode Sampah</label>
                            <input type="text" class="form-control" name="sampah_id" placeholder="Kode Sampah" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Sampah</label>
                            <input type="text" class="form-control" name="sampah_nama" placeholder="Nama Sampah" required>
                        </div>
                        <div class="form-group">
                            <label>Harga Sampah</label>
                            <input type="number" class="form-control" name="sampah_harga" placeholder="Harga Sampah" required>
                        </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?=base_url('admin/kategorisampah')?>" class="btn btn-danger text-white">Batal</a>
                    </form>
            </div>
        </main>