 <!-- Content Header (Page header) -->
 <section class="content-header">
      <h1>Items
            <small>Data Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
</section>


<!-- Main content -->
<section class="content">
<?php $this->view('messages')?>
    <div class="box">
        <div class="box-header ">
             <h3 class="box-title">Barcode Generator</h3>
            <div class="pull-right">
                <a href="<?=site_url("item")?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"> </i> Backs
                  </a>
            </div>
         </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php
                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';
            ?>
            <br>
            <?=$row->barcode?>
            <br>
            <a href="<?=site_url('item/barcode_print/'.$row->item_id)?>" target="_blank" class="btn btn-default btn-xs">
                <i class="fa fa-print"> </i> Print
            </a>
         </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->