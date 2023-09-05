<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <style type="text/css">
        body{
            height:105mm; 
            width:150mm; 
            margin-left:auto; 
            margin-right:auto; 
            font-family: Arial;
            color: black;
        }
    </style>
</head>
<body>
    <center>
        <h2 style="margin-top: 40px;">E-Resik APP Sleman</h2>
        <h4>Laporan Transaksi Jemput Sampah</h4>
        <hr style="width: 75%; border-width: 4px; color: black;">
    </center>
    <?php foreach ($printpenjemputan as $ptpj) : ?>
    <table style="width: 60%; margin-left: 15%;">
        <tr height="40px">
            <td width="10%">Kode Pemesanan</td>
            <td width="2%">:</td>
            <td width="25%"><?=$ptpj->pemesanan_id?></td>
        </tr>
        <tr height="40px">
            <td>Nama Pemesan</td>
            <td>:</td>
            <td><?=$ptpj->masyarakat_nama?></td>
        </tr>
        <tr height="40px">
            <td>Alamat Pemesan</td>
            <td>:</td>
            <td><?=$ptpj->masyarakat_alamat?></td>
        </tr>
        <tr height="40px">
            <td>Nomor Hp Pemesan</td>
            <td>:</td>
            <td><?=$ptpj->masyarakat_nomorhp?></td>
        </tr>
        <tr height="40px">
            <td>Jenis Sampah</td>
            <td>:</td>
            <td><?=$ptpj->sampah_nama?></td>
        </tr>
        <tr height="40px">
            <td>Berat Sampah</td>
            <td>:</td>
            <td><?=$ptpj->pemesanan_beratsampah?> Kg</td>
        </tr>
        <tr height="40px">
            <td>Kode Pengepul</td>
            <td>:</td>
            <td><?=$ptpj->penjemputan_pengepul?></td>
        </tr>
        <tr height="40px">
            <td>Waktu Penjemputan</td>
            <td>:</td>
            <td><?=$ptpj->pemesanan_tanggal?></td>
        </tr>
    </table>
    <?php endforeach;?>

    <center>
        <hr style="width: 75%; border-width: 4px; color: black;">
    </center>

    <script>
		window.print();
	</script>
</body>
</html>

