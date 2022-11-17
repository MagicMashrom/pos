 <!-- Content Header (Page header) -->
 <section class="content-header">
      <h1>Users
            <small>Pengguna</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header ">
             <h3 class="box-title">Add Users</h3>
            <div class="pull-right">
                <a href="<?=site_url("user")?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"> </i> Backs
                  </a>
            </div>
         </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post">
                        <div class="form-group <?= form_error('fullname') ? 'has-error' : null ?>">
                            <label for="">Name *</label>
                            <?= form_error('fullname') ?>
                            <input type="text" name="fullname" value="" class="form-control" required>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                            <label for="">Username *</label>
                            <?= form_error('username') ?>
                            <input type="text" name="username" value="<?=set_value('username')?>" class="form-control" required>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <label for="">Password *</label>
                            <?= form_error('password') ?>
                            <input type="password" name="password" value="<?=set_value('password')?>" class="form-control" required>
                        </div>
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                            <label for="">Password Confirmation *</label>
                            <?= form_error('passconf') ?>
                            <input type="password" name="passconf" value="<?=set_value('passconf')?>" class="form-control">
                        </div>
                        <div class="form-group <?= form_error('address') ? 'has-error' : null ?>" required>
                            <label for="">Address *</label>
                            <?= form_error('address') ?>
                            <textarea name="address"  class="form-control"><?=set_value('address')?></textarea>
                        </div>
                        <div class="form-group <?= form_error('level') ? 'has-error' : null ?>" required>
                            <label for="">Level *</label> 
                            <?= form_error('level') ?>
                            <select name="level"  class="form-control">
                                <option value="">- Pilih</option>
                                <option value="1" <?=set_value('level') == 1 ? "selected" : null?> >- Admin</option>
                                <option value="2" <?=set_value('level') == 2 ? "selected" : null?>>- Kasir</option>
                                <option value="3" <?=set_value('level') == 3 ? "selected" : null?>>- Inventori</option>
                                <option value="4" <?=set_value('level') == 4 ? "selected" : null?>>- Report</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="sumbit" class="btn btn-success btn-flat">Save</button>
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