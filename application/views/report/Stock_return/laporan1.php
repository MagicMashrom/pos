<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stock Return</title>
    <style>
        body {
            font-family: calibri;
        }
    </style>
</head>
<body onload="window.print()">
    <h3 align="center">Laporan Stock Return Dari Tanggal <?= $tgl_awal ?> Sampai Tanggal <?= $tgl_akhir ?></h3>
    <table border="1" width="100%" cellpadding="6" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Qty</th>
            <th>Type</th>
            <th>Detail</th>
            <th>Supplier</th>
        </tr>
        <?php $no = 1;
        foreach ($rows as $row) 

        { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row->barcode ?></td>
                <td><?= $row->item_name ?></td>
                <td><?= $row->qty?></td>
                <td><?= "Return"; ?></td>
                <td><?= $row->detail ?></td>
                <td><?= $row->supplier_name?></td>
            </tr>
        <?php  
        } 
        ?>
    </table>
</body>
</html>