<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?=$title?></h3>
            <br>
            <div class="row">

            <!-- row kedua  -->
            <div class="col-lg-7" id="tanggalfilter">
                <div class="card">
                    <div class="card-header">
                    Pilih Data Laporan Penjemputan Sampah
                    </div>
                    <form action="<?=base_url('admin/laporan/filter')?>" method="POST" target="_blank">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-2">
                                        <label for="select" class=" form-control-label">Dari tanggal</label>
                                </div>
                                <div class="col col-md-4">
                                        <input name="tanggalawal" value="" type="date"  class="form-control"  placeholder="Inputkan Tanggal" id="tanggalawal" required="">
                                </div>
                                <div class="col col-md-2">
                                        <label for="select" class=" form-control-label">Sampai tanggal</label>
                                </div>
                                <div class="col col-md-4">
                                        <input name="tanggalakhir" value="" type="date"  class="form-control"  placeholder="Inputkan Tanggal" id="tanggalakhir" required="">
                                </div>

                                <div class="col col-md-2">
                                        <label for="select" class=" form-control-label">Pengepul</label>
                                </div>
                                <div class="col col-md-4">
                                        <div class="form-group">
                                          <select class="form-control" name="pengepul" id="pengepul">
                                            <option value="">Semua Pengepul</option>
                                            <?php foreach($pengepul as $pgpl) : ?>
                                            <option value="<?php echo $pgpl->pengepul_id ?>"><?php echo $pgpl->pengepul_id ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                        </div>
                                </div>

                                <div class="col col-md-2">
                                        <label for="select" class=" form-control-label">Sampah</label>
                                </div>
                                <div class="col col-md-4">
                                        <div class="form-group">
                                          <select class="form-control" name="jenis_sampah" id="jenis_sampah">
                                            <option value="">Semua Sampah</option>
                                            <?php foreach($jenis_sampah as $js) : ?>
                                            <option value="<?php echo $js->sampah_nama ?>"><?php echo $js->sampah_nama ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                        </div>
                                </div>

                                <small class="help-block form-text"></small>
                            </div>

                        </div>
                        <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</script>