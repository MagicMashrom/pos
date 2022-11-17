 <!-- Content Header (Page header) -->
 <section class="content-header">
      <h1>Customer
            <small>Pelanggan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header ">
             <h3 class="box-title"><?=ucfirst($page)?> Customer</h3>
            <div class="pull-right">
                <a href="<?=site_url("customer")?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"> </i> Backs
                  </a>
            </div>
         </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('customer/process')?>" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$row->customer_id?>">
                            <label for="">Name *</label>
                            <input type="text" name="name" value="<?=$row->name?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin *</label>
                            <select name="gender" id="" class="form-control" required>
                                <option value="">Pilih</option>
                                <option value="L" <?=$row->gender == 'L' ? 'selected' : ''?>>Laki-Laki</option>
                                <option value="P" <?=$row->gender == 'P' ? 'selected' : ''?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Phone *</label>
                            <input type="number" name="phone" value="<?=$row->phone?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Address *</label>
                            <textarea name="addr"  class="form-control" required><?=$row->address?></textarea>
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