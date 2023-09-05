<div id="layoutSidenav_content">
        <main>        
            <div class="container-fluid px-4">      
              <h3 class="mt-4"><?php echo $title ?></h3>
                <?php foreach($kategori as $ks) : ?>
                <a class="btn btn-success btn-sm mb-3" href="<?php echo base_url('admin/sampah/tambahsampah/'.$ks->kategori_id)?>">+ Tambah Data Sampah</a>
                <?php endforeach ?>
                <?php echo $this->session->flashdata('msg');?>
                <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>Jenis Sampah
                </div>
                <div class="card-body">
                  <table id="datatablesSimple">
                  <thead>
                    <tr>
                      <th>Kode Sampah</th>
                      <th>Kategori Sampah</th>
                      <th>Nama Sampah</th>
                      <th>Harga Sampah</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1;
                    foreach($tampilsampah as $ts) : ?>
                    <tr>
                        <td><?= $ts['sampah_id']; ?></td>
                        <td><?= $ts['kategori_nama']; ?></td>
                        <td><?= $ts['sampah_nama']; ?></td>
                        <td><?= $ts['sampah_harga']; ?></td>
                        <td>
                        <center>
                          <a class="btn btn-warning btn-sm text-white my-1" href="<?= base_url('admin/sampah/updatesampah/'.$ts['sampah_id'])?>">Edit Sampah</a>
                          <a class="btn btn-info btn-sm text-white my-1" href="<?= base_url('admin/sampah/updatehargasampah/'.$ts['sampah_id'])?>">Edit Harga Sampah</a>
                          <a onclick="return confirm('Yakin akan menghapus data ?')" class="btn btn-danger btn-sm my-1" href="<?= base_url('admin/sampah/hapussampah/'.$ts['sampah_id'])?>">Hapus</a>
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