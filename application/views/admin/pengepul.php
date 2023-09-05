<div id="layoutSidenav_content">
        <main>        
            <div class="container-fluid px-4">      
              <h3 class="mt-4"><?php echo $title ?></h3>
                <a class="btn btn-success btn-sm mb-3" href="<?php echo base_url('admin/pengepul/tambahpengepul')?>">+ Tambah Data Pengepul</a>
                <?php echo $this->session->flashdata('msg');?>
                <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>Data Pengepul
                </div>
                <div class="card-body">
                  <table id="datatablesSimple">
                  <thead>
                    <tr>
                      <th>Kode Pengepul</th>
                      <th>Nama Pengepul</th>
                      <th>Alamat Pengepul</th>
                      <th>Nomor HP Pengepul</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1;
                    foreach($pengepul as $pp) : ?>
                    <tr>
                      <td><?=$pp->pengepul_id?></td>
                      <td><?=$pp->pengepul_nama?></td>
                      <td><?=$pp->pengepul_alamat?></td>
                      <td><?=$pp->pengepul_nomorhp?></td>
                      <td>
                        <center>
                          <a class="btn btn-warning btn-sm text-white my-2" href="<?= base_url('admin/pengepul/updatepengepul/'.$pp->pengepul_id)?>">Edit Pengepul</a>
                          <a class="btn btn-primary btn-sm text-white my-2" href="<?= base_url('admin/pengepul/updatepasswordpengepul/'.$pp->pengepul_id)?>">Ganti Password</a>
                          <a onclick="return confirm('Yakin akan menghapus data ?')" class="btn btn-danger btn-sm" href="<?= base_url('admin/pengepul/hapuspengepul/'.$pp->pengepul_id)?>">Hapus</a>
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