<div id="layoutSidenav_content">
        <main>        
            <div class="container-fluid px-4">      
              <h3 class="mt-4"><?php echo $title ?></h3>
                <?php echo $this->session->flashdata('msg');?>
                <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>Data Penjemputan
                </div>
                <div class="card-body">
                  <table id="datatablesSimple">
                  <thead>
                    <tr>
                      <th>Nama Masyarakat</th>
                      <th>Alamat</th>
                      <th>Nomor HP Masyarakat</th>
                      <th>Nama Sampah</th>
                      <th>Berat Sampah</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($riwayatjemputan as $rjp) : ?>
                      <tr>
                        <td><?=$rjp->masyarakat_nama?></td>
                        <td><?=$rjp->masyarakat_alamat?></td>
                        <td><?=$rjp->masyarakat_nomorhp?></td>
                        <td><?=$rjp->sampah_nama?></td>
                        <td><?=$rjp->pemesanan_beratsampah?> Kg</td>
                        <td><?=$rjp->pemesanan_tanggal?></td>
                        <td>
                            <center>
                                <a class="btn btn-success btn-sm text-white" href="<?= base_url('pengepul/penjemputan/printpenjemputan/'.$rjp->penjemputan_id)?>" target="_BLANK">Cetak</a>
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