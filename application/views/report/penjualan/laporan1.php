<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: calibri;
        }
    </style>
</head>
<body onload="window.print()">
    <h3 align="center">Laporan Penjualan Dari Tanggal <?= $tgl_awal ?> Sampai Tanggal <?= $tgl_akhir ?></h3>
    <table border="1" width="100%" cellpadding="6" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
        <?php $no = 1;
        foreach ($rows as $row) 

        { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row->kode_barang ?></td>
                <td><?= $row->nama_barang ?></td>
                <td><?= "Rp. " . number_format($row->harga, 0,',', '.') ?></td>
                <td><?= $row->jumlah ?></td>
                <td><?= indoCurrency($row->total) ?></td>
            </tr>
        <?php 
         @$total_penjualan += $row->total;   
        } 
        ?>
        <tr>
            <td align="right" colspan="5"> <strong>Total Penjualan</strong> </td>
            <td> <strong> <?= indoCurrency($total_penjualan) ?> </strong> </td>
        </tr>
    </table>
</body>
</html>