                    
                    
                    
<div class="row">
    <div class="col-md-9">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th width="15%">Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="cart-table">
                <?php $no = 1;
                $TotalBayar = 0;
                $item_id;
                foreach($row->result() as $key => $data) { ?>
                <tr>
                    <td> <?= $no++ ?></td> 
                    <td> <?= $data->kode_barang ?> </td>
                    <td> <?= $data->nama_barang ?> </td>
                    <td> <?= $data->jumlah ?> </td>
                    <td> <?= indoCurrency($data->total) ?> </td>
                    <!-- == 1  ? "Admin" : "Kasir" -->
                    <td class="text-center" width="160px">
                        <a href="<?= site_url('penjualan/TambahJumlah/'.$data->id)?>" class="btn btn-info btn-sm">
                            <i class="fa fa-plus"> </i>
                        </a>
                        <a href="<?= site_url('penjualan/KurangiJumlah/'.$data->id)?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-minus"> </i>
                        </a>
                        <a href="<?= site_url('penjualan/HapusBarang/'.$data->id.'/'.$data->kode_barang)?>"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"> </i>
                        </a>
                                                
                    </td>
                </tr>
                <?php 
                // $TotalByar = $totalbayar + $data->total;
                $TotalBayar += $data->total;
                } ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
    <form action="" method="post">
        <div class="form-group">
            <input type="hidden" name="kode_penjualan" id="kode_penjualan" value="<?= $this->uri->segment(3)?>">
            <input type="text" name="total_bayar" id="total_bayar" placeholder="Total Bayar" class="form-control" value="<?= $TotalBayar?> " readonly>
        </div>
        <div class="form-group">
            <input type="text" name="bayar" id="bayar" onkeyup="sum()" placeholder="Bayar" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="text" name="kembalian" id="kembalian" placeholder="Kembalian" readonly class="form-control">
        </div>
           <button  type="button" class="btn btn-block btn-info" id="btn_transaksi"><i class="fa fa-shopping-cart"></i> Payment </button>
    </form>
    </div>
</div>

<script>
    function sum() {
        let total_bayar = document.getElementById('total_bayar').value;
        let bayar = document.getElementById('bayar').value;
        let kembalian = document.getElementById('kembalian');

        kembalian.value = parseInt(bayar) - parseInt(total_bayar);
    }

    $(document).on('click', '#btn_transaksi', function() {
        let kode_penjualan = $('#kode_penjualan').val();
        let total_bayar = $('#total_bayar').val();
        let bayar = $('#bayar').val();
        let kembalian = $('#kembalian').val();
        if(bayar == '') {
            alert('Bayar Masih Kosong!');
            $('#bayar').focus();
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('penjualan/SimpanDetailPenjualan') ?>',
                dataType: 'json',
                data: {
                    'kode_penjualan': kode_penjualan,
                    'total_bayar': total_bayar,
                    'bayar': bayar,
                    'kembalian': kembalian,
                },
                success: function(result) {
                    if(result.success == true) {
                        alert('proses transaksi berhasil disimpan');
                        window.open('<?php echo site_url('penjualan/struk/'.$this->uri->segment(3)) ?>', '_blank');
                    }
                    window.location.href = '<?= site_url('penjualan/index/'.GetKodePenjualan())?>';
                }
            })
        }
    })

</script>

