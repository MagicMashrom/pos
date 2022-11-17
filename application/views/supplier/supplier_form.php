 <!-- Content Header (Page header) -->
 <section class="content-header">
      <h1>Supplier
            <small>Pemasok Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header ">
             <h3 class="box-title"><?=ucfirst($page)?> Supplier</h3>
            <div class="pull-right">
                <a href="<?=site_url("supplier")?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"> </i> Backs
                  </a>
            </div>
         </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('supplier/process')?>" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$row->supplier_id?>">
                            <label for="">Name Perusahaan*</label>
                            <input type="text" name="name_p" value="<?=$row->name_perusahaan?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Phone Perusahaan*</label>
                            <input type="number" name="phone_p" value="<?=$row->phone_perusahaan?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Address Perusahaan*</label>
                            <textarea name="addr"  class="form-control" required><?=$row->address?></textarea>
                        </div>
                        <div class="form-group">
                            <label for=""> Name Sales*</label>
                            <input type="text" name="name_s" value="<?=$row->name_sales?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for=""> Phone Sales*</label>
                            <input type="number" name="phone_s" value="<?=$row->phone_sales?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea type="text" name="desc" class="form-control"><?=$row->description?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="sumbit" name="<?=$page?>" class="btn btn-success btn-flat">Save</button>
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