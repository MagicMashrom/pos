 <!-- Content Header (Page header) -->
 <section class="content-header">
      
</section>
 <section class="content-header">
      <h1>Sales
            <small>Penjualan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Transcation</li>
        <li class="active">Sales</li>
      </ol>
</section>
<!-- Main content -->

<section class="content">
<?php $this->view('messages')?>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body table-responsive">
                    
                    <!-- view kode penjualan -->
                    <?php $this->view('view_kode_penjualan'); ?>
                    <!-- /view kode penjualan -->
                    
                    <!-- view cart penjualan -->
                    <?php $this->view('view_cart_penjualan'); ?>
                    <!-- /view cart penjualan -->
                    
                </div>
            </div>
        </div>
    </div>


</section>
<!-- /.content -->