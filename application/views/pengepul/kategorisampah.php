<div id="layoutSidenav_content">
        <main>        
            <div class="container-fluid px-4">      
              <h3 class="mt-4"><?php echo $title ?></h3>
                <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>Kategori Sampah
                </div>
                <div class="card-body">
                  <table id="datatablesSimple">
                  <thead>
                    <tr>
                      <th>Kode Kategori Sampah</th>
                      <th>Kategori Sampah</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1;
                    foreach($kategori as $ks) : ?>
                    <tr>
                      <td><?=$ks->kategori_id?></td>
                      <td><?=$ks->kategori_nama?></td>
                      <td>
                        <center>
                          <?= anchor('pengepul/sampah/detailsampah/'.$ks->kategori_id,'<div class="btn btn-primary btn-sm my-1">Daftar Sampah</div>') ?>
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