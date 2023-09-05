<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <body onload="window.print()">
        <div>
            
    <div id="content-wrapper"  style="margin-top:50px">

        <div class="container-fluid">
        <!-- DataTables Example -->
          <div class="card mb-3" id="cardbayar">
            <div class="card-header">
              <center>
                <b>
                    <h2>E-Resik APP Sleman</h2>
                    <h3><?php echo $title ?> <br></h3>
                    <h4><?php echo $subtitle ?> <br></h4>
                </b>
              </center>
            </div>
            <div class="card-body card-block">
         
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tabelbayar" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Penjemputan</th>
                      <th>Kode Pengepul</th>
                      <th>Nama Pemesan</th>
                      <th>Alamat Pemesan</th>
                      <th>Nama Sampah</th>
                      <th>Berat Sampah</th>
                    </tr>
                  </thead>
                  <tbody
                    <?php 
                    $no=1; 
                    $total_sampah = 0;
                    foreach ($datafilter as $row): ?>
                    
					<tr>
						<td><?php echo $no++; ?></td>
                        <td><?php echo $row->pemesanan_tanggal; ?></td>
						<td><?php echo $row->penjemputan_pengepul; ?></td>
						<td><?php echo $row->masyarakat_nama; ?></td>
                        <td><?php echo $row->masyarakat_alamat; ?></td>
						<td><?php echo $row->sampah_nama; ?></td>
                        <td><?php echo $row->pemesanan_beratsampah; ?> Kg</td>
					</tr>
                    
                    <?php 
                    $total_sampah += $row->pemesanan_beratsampah;
                    endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                        <th style='text-align:center'; colspan='6'><b>Total Sampah</b></th>
                        <th><?php echo $total_sampah;?> Kg</th>
                    </tr>

                  </tfoot>
                </table>
              </div>
            </div>

            <div class="card-body card-block">
            <div class="row form-group">
                <div id="form-tanggal" class="col col-md-9"><label for="select" class=" form-control-label"></label></div>
                <div id="form-tanggal" class="col col-md-3"><label for="select" class=" form-control-label">Sleman, <?php echo date('d M Y')?></label></div>
                
            </div>
            <div class="row form-group">
                <div id="form-tanggal" class="col col-md-9"><label for="select" class=" form-control-label"></label></div>
                <div id="form-tanggal" class="col col-md-3"><label for="select" class=" form-control-label"></label></div>
                
            </div>
            <br><br><br>
            <div class="row form-group">
                <div id="form-tanggal" class="col col-md-9"><label for="select" class=" form-control-label"></label></div>
                <div id="form-tanggal" class="col col-md-3"><label for="select" class=" form-control-label">E-Resik APP Sleman</label></div>
                
            </div>
            </div>
          </div>
        </div>
        </div>
    
    </body>
    
</html>
