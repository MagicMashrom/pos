 <!-- Content Header (Page header) -->
 <section class="content-header">
     <h1>Stock In
         <small>Barang Masuk</small>
     </h1>
     <ol class="breadcrumb">
         <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li>Transcation</li>
         <li class="active">Stock In</li>
     </ol>
 </section>

 <!-- Main content -->
 <section class="content">
     <div class="box">
         <div class="box-header ">
             <h3 class="box-title"> Add Stock In</h3>
             <div class="pull-right">
                 <a href="<?= site_url("stock/in") ?>" class="btn btn-primary btn-flat">
                     <i class="fa fa-undo"> </i> Backs
                 </a>
             </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
             <div class="row">
                 <div class="col-md-4 col-md-offset-4">
                     <form action="<?= site_url('stock/process') ?>" class="formsb" method="post">
                         <input type="hidden" class="arahpost" value="stock/in/add" />

                         <div class="form-group">
                             <label for="">Date *</label>
                             <input type="date" name="date" value="<?= date('Y-m-d') ?>" class="form-control" required>
                         </div>
                         <div>
                             <label for="barcode">Barcode *</label>
                         </div>
                         <div class="form-group input-group">
                             <input type="text" name="barcode" value="<?php echo $inputan['barcode']; ?>" id="barcode" class="form-control scanbarcode" required autofocus>
                         </div>
                         <div class="form-group">
                             <label for="item_name">Item Name *</label>
                             <input type="hidden" name="item_id" value="<?php echo $item->item_id; ?>">
                             <input type="text" name="item_name" value="<?php echo $item->name; ?>" id="item_name" class="form-control" readonly>
                         </div>
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-md-8">
                                     <label for="unit_name">Item Unit</label>
                                     <input type="text" name="unit_name" id="unit_name" value="<?php echo $item->unit_name; ?>" class="form-control" readonly>
                                 </div>

                                 <div class="col-md-4">
                                     <label for="stock">Initial Stock</label>
                                     <input type="text" name="stock" id="stock" value="<?php echo $item->stock; ?>" class="form-control" readonly>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <label for="">Detail *</label>
                             <input type="text" name="detail" id="detail" placeholder="Kulakan / tambahan / etc" class="form-control">
                         </div>
                         <div class="form-group">
                             <label for="">Supplier </label>
                             <select name="supplier" id="" class="form-control">
                                 <option value="">- Pilih - </option>
                                 <?php foreach ($supplier as $i => $data) {
                                        echo '<option value="' . $data->supplier_id . '">' . $data->name_perusahaan . '</option>';
                                    } ?>
                             </select>
                         </div>
                         <div class="form-group">
                             <label for="">Qty *</label>
                             <input type="text" name="qty" required class="form-control">
                         </div>
                         <div class="form-group">
                             <button type="sumbit" name="in_add" class="btn btn-success btn-flat">Save</button>
                             <button type="reset" class="btn btn-warning btn-flat">Reset</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <!-- /.box-body -->
     </div>
     <!-- /.box -->
 </section>
 <!-- /.content -->