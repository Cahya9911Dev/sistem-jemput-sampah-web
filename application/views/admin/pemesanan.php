<div id="layoutSidenav_content">
        <main>        
            <div class="container-fluid px-4">      
              <h3 class="mt-4"><?php echo $title ?></h3>
                <?php echo $this->session->flashdata('msg');?>
                <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>Data Pemesanan
                </div>
                <div class="card-body">
                  <table id="datatablesSimple">
                  <thead>
                    <tr>
                      <th>Nama Masyarakat</th>
                      <th>Nomor HP Masyarakat</th>
                      <th>Alamat Masyarakat</th>
                      <th>Nama Sampah</th>
                      <th>Berat Sampah</th>
                      <th>Gambar Sampah</th>
                      <th>Tanggal Pemesanan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1; foreach($pemesanan as $pmsn) : ?>
                    <tr>
                      <td><?=$pmsn->masyarakat_nama?></td>
                      <td><?=$pmsn->masyarakat_nomorhp?></td>
                      <td><?=$pmsn->masyarakat_alamat?></td>
                      <td><?=$pmsn->sampah_nama?></td>
                      <td><?=$pmsn->pemesanan_beratsampah?> Kg</td>
                      <td><img src="<?= base_url('image/'.$pmsn->pemesanan_foto)?> " width="120px" alt=""></td>
                      <td><?=$pmsn->pemesanan_tanggal?></td>
                      <td>
                        <center>
                        <a class="btn btn-success btn-sm text-white" href="<?= base_url('admin/pemesanan/prosespemesanan/'.$pmsn->pemesanan_id)?>">Proses Pemesanan</a>
                        </center>
                      </td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                  </table>
                  </div>
                </div>
            </div>
        </main>