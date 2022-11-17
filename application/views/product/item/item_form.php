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
             <h3 class="box-title"><?=ucfirst($page)?> item</h3>
            <div class="pull-right">
                <a href="<?=site_url("item")?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"> </i> Backs
                  </a>
            </div>
         </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php echo form_open_multipart('item/process') ?>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$row->item_id?>">
                            <label for="">Barcode *</label>
                            <input type="text" name="barcode" value="<?=$row->barcode?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="product_name">Product Name *</label>
                            <input type="text" name="product_name" id="product_name" value="<?=$row->name?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Unit *</label>
                            <?php echo form_dropdown('unit', $unit, $selectedunit, 
                            ['class' => 'form-control', 'required' => 'required']) ?>
                        </div>
                        <div class="form-group">
                            <label for="">Price *</label>
                            <input type="number" name="price" value="<?=$row->price?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Image *</label>
                            <?php if($page == 'edit') { 
                                if($row->image != null) { ?>
                                    <div style="margin-bottom:5px">
                                        <img src="<?=base_url('uploads/product/'.$row->image)?>" alt="" style="width:70%">
                                    </div>
                                <?php
                                }
                            } ?>
                            <input type="file" name="image" value="" class="form-control">
                            <small>(Biarkan kosong jika tidak <?=$page == 'edit' ? 'diganti' : 'ada'?>)</small>
                        </div>
                        <div class="form-group">
                            <button type="sumbit" name="<?=$page?>" class="btn btn-success btn-flat">Save</button>
                            <button type="reset" class="btn btn-warning btn-flat">Reset</button>
                        </div>
                    <?php echo form_close() ?>
                </div>
            </div>
         </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->