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
                      <th>Nomor HP Masyarakat</th>
                      <th>Nama Sampah</th>
                      <th>Berat Sampah</th>
                      <th>Tanggal</th>
                      <th>Pengepul</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($penjemputan as $pjp) : ?>
                      <tr>
                        <td><?=$pjp->masyarakat_nomorhp?></td>
                        <td><?=$pjp->sampah_nama?></td>
                        <td><?=$pjp->pemesanan_beratsampah?> Kg</td>
                        <td><?=$pjp->pemesanan_tanggal?></td>
                        <td><?=$pjp->penjemputan_pengepul?></td>
                        <td><?=$pjp->penjemputan_status?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                  </table>
                  </div>
                </div>
            </div>
        </main>