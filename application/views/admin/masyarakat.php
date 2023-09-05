<div id="layoutSidenav_content">
        <main>        
            <div class="container-fluid px-4">      
              <h3 class="mt-4"><?php echo $title ?></h3>
                <?php echo $this->session->flashdata('msg');?>
                <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>Data Masyarakat
                </div>
                <div class="card-body">
                  <table id="datatablesSimple">
                  <thead>
                    <tr>
                      <th>Nama Masyarakat</th>
                      <th>Alamat Masyarakat</th>
                      <th>Nomor HP Masyarakat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1;
                    foreach($masyarakat as $ms) : ?>
                    <tr>
                      <td><?=$ms->masyarakat_nama?></td>
                      <td><?=$ms->masyarakat_alamat?></td>
                      <td><?=$ms->masyarakat_nomorhp?></td>
                      <td>
                        <center>
                          <a class="btn btn-warning btn-sm text-white" href="<?= base_url('admin/masyarakat/updatemasyarakat/'.$ms->masyarakat_nomorhp)?>">Edit Masyarakat</a>
                          <a class="btn btn-primary btn-sm text-white my-2" href="<?= base_url('admin/masyarakat/updatepasswordmasyarakat/'.$ms->masyarakat_nomorhp)?>">Ganti Password</a>
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