<div id="layoutSidenav_content">
        <main>        
            <div class="container-fluid px-4">      
              <h3 class="mt-4"><?php echo $title ?></h3>
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
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                  </table>
                  </div>
                </div>
            </div>
        </main>