<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">      
              <h3 class="mt-4"><?php echo $title ?></h3>
                <br>
            </div>
            
            <div class="card mb-4 ms-4" style="width: 65%;">
                <div class="card-header">
                    Proses Data Pemesanan
                </div>

                <div class="card-body">
                <?php foreach ($pemesanan as $pmsn) : ?>
                    <form method="POST" action="<?=base_url('admin/pemesanan/prosespemesananaksi')?>">
                        <input type="hidden" class="form-control" name="pemesanan_id" value="<?= $pmsn->pemesanan_id ?>" required>
                        <div class="form-group">
                            <label>Id Pemesanan</label>
                            <input type="text" class="form-control" name="pemesanan_id" placeholder="Id Pemesanan"
                            value="<?=$pmsn->pemesanan_id ?>" required disabled>
                        </div>
                <?php endforeach;?>
                        <div class="form-group">
                            <label>Pengepul</label>
                            <select name="pengepul_id" class="form-control" required>
                                <option value="">--- Pilih Pengepul ---</option>
                                <?php foreach($pengepul as $pp) : ?>
                                    <option value="<?php echo $pp->pengepul_id ?>">
                                    <?php echo $pp->pengepul_id?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
            </div>
        </main>