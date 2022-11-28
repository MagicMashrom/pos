<form action=" <?= site_url('penjualan/SimpanBarang') ?> " class="formsb" method="post">
    <input type="hidden" class="arahpost" value="penjualan/SimpanBarang" />

    <div class="col-md-2">
        <div class="from-group">
            <input type="text" name="kode_penjualan" placeholder="Kode Penjualan" class="form-control" value="<?= $this->uri->segment(3) ?>" readonly>
        </div>
    </div>
    <div class="col-md-2">
        <div class="from-group">
            <input type="date" name="date" value="<?= date('Y-m-d') ?>" class="form-control" required readonly>
        </div>
    </div>
    <div class="col-md-2">
        <div class="from-group">
            <input type="text" name="kode_barang" id="kode_barang" placeholder="Kode Barang" class="form-control scanbarcode" required>

        </div>
    </div>
    <div class="col-md-2">
        <div class="from-group">
            <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari Barang...</button>
        </div>
    </div>
</form>