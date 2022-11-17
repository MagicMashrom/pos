<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        .kotak {
            width: 30%;
        }
        .p1{
            margin-top: -20px;
            border-bottom: 1px dashed black;
        }
        .p2 {
            margin-top: -20px;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="kotak">
        <h2 align="center">TOKO ANEKA JAYA</h2>
        <p align="center" class="p1">Jln. Pahlawan No 1 Sawangan</p>

    <table border="0" width="100%">
        <tr>
            <th align="left" width="150">Kasir</th>
            <td> <?=$this->fungsi->user_login()->name?> </td>
        </tr>
        <tr>
            <th align="left">Kode Penjualan</th>
            <td> <?= $this->uri->segment(3) ?> </td>
        </tr>
        <tr>
            <th align="left">Tanggal</th>
            <td> <?= $tanggal_beli->tanggal ?> </td>
        </tr>
    </table>
    <h2>Detail Barang</h2>
    <table border="1" width="100%" cellpadding="6" cellspacing="0">
        <tr>
            <th align="left">Nama Barang</th>
            <th align="left">Harga</th>
            <th align="left">Qty</th>
            <th align="left">Total Harga</th>
        </tr>
        <?php foreach($penjualan as $sale) { ?>
        <tr>
            <td><?= $sale->nama_barang ?></td>
            <td><?= indoCurrency($sale->harga_jual)?></td>
            <td><?= $sale->jumlah ?></td>
            <td><?= indoCurrency($sale->harga_jual * $sale->jumlah)?></td>
        </tr>
        <?php } ?>

        <tr>
            <td colspan="3" align="right"> <strong>Total Harga</strong></td>
            <td><?= indoCurrency($detail_penjualan->total_bayar) ?></td>
        </tr>
        <tr>
            <td colspan="3" align="right"> <strong>Bayar</strong></td>
            <td><?= indoCurrency($detail_penjualan->bayar) ?></td>
        </tr>
        <tr>
            <td colspan="3" align="right"> <strong>Kembalian</strong></td>
            <td><?= indoCurrency($detail_penjualan->kembalian) ?></td>
        </tr>
    </table>
    <p align="center"> Terima Kasih Sudah Berbelanja Ditempat Kami</p>
    <p align="center" class="p2">-----------------------------------------------------</p>
    </div>
</body>
</html>