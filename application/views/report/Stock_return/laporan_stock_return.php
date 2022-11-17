 <!-- Content Header (Page header) -->
 <section class="content-header">
      
      </section>
 <section class="content-header">
      <h1>Laporan
            <small>Stock Return</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Report</li>
        <li class="active">Stock Return</li>
      </ol>
</section>
<section class="content" style="margin-top:20px;">
<?php $this->view('messages')?>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body table-responsive">
                    <form action="" method="POST" target="_blank">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tgl_awal">Tanggal Awal</label>
                                <input type="date" name="tgl_awal" id="tgl_awal" class="form-control" >
                                <?= form_error('tgl_awal', '<span class="text-danger small pl-3">', '</span>') ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tgl_akhir">Tanggal Akhir</label>
                                <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control">
                                <?= form_error('tgl_akhir', '<span class="text-danger small pl-3">', '</span>') ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" style="margin-top:25px;">
                                <button type="submit" class="btn btn-info"><i class="fa fa-print"></i>  Cetak Laporan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</section>