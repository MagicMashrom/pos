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
                <a href="<?=site_url('dashboard')?>" class="btn btn-primary btn-flat">
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
                            <label for="">Name </label>
                            <?= form_error('fullname') ?>
                            <input type="hidden" name="user_id" value="<?=$this->fungsi->user_login()->user_id?>">
                            <input type="text" name="fullname" value="<?= $this->fungsi->user_login()->name ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                            <label for="">Username </label>
                            <?= form_error('username') ?>
                            <input type="text" name="username" value="<?=$this->fungsi->user_login()->username?>" class="form-control" readonly>
                        </div>
                        <!-- <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <label for="">Password *</label>
                            <?= form_error('password') ?>
                            <input type="password" name="password" value="<?=set_value('password')?>" class="form-control">
                        </div>
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                            <label for="">Password Confirmation *</label>
                            <?= form_error('passconf') ?>
                            <input type="password" name="passconf" value="<?=set_value('passconf')?>" class="form-control">
                        </div> -->
                        <div class="form-group <?= form_error('address') ? 'has-error' : null ?>">
                            <label for="">Address </label>
                            <?= form_error('address') ?>
                            <textarea name="address" readonly class="form-control"><?=$this->fungsi->user_login()->address?></textarea>
                        </div>
                        <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                            <label for="">Level </label> 
                            <?= form_error('level') ?>
                            <!-- <input type="text" name="level" value="<?=$this->fungsi->user_login()->level?>" class="form-control" readonly> -->
                            <select name="level"  class="form-control" readonly>
                            <?php $level = $this->fungsi->user_login()->level ?>
                                <option value="1" <?=$level == 1 ? "selected" : "disabled"?> >- Admin</option>
                                <option value="2" <?=$level == 2 ? "selected" : "disabled"?> >- Kasir</option>
                                <option value="3" <?=$level == 3 ? "selected" : "disabled"?> >- Inventori</option>
                                <option value="4" <?=$level == 4 ? "selected" : "disabled"?>>- Report</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <form action="<?=site_url('user/del')?>" method="post">
                            <a href="<?=site_url('user/ubah_password/'.$this->fungsi->user_login()->user_id)?>" class="btn btn-warning btn-flat">
                                <i class="fa fa-pencil"> </i> Ubah Password
                            </a>
                        </form>
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