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
<?php $this->view('messages')?>
    <div class="box">
        <div class="box-header ">
             <h3 class="box-title">Data Users</h3>
            <div class="pull-right">
                <a href="<?=site_url("user/add")?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"> </i> Create
                  </a>
            </div>
            <br><br>
            <div class="pull-left">
            <strong>*Note :
                <p>
                    level 1 Admin <br>
                    level 2 Kasir <br>
                    level 3 Inventori <br>
                    level 4 Report 
                </p>
            </strong>
        </div>
         </div>
         
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table table-bordered" id="table1">
               <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                </tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td> <?= $no++ ?></td> 
                        <td> <?= $data->username ?> </td>
                        <td> <?= $data->name ?> </td>
                        <td> <?= $data->address ?> </td>
                        <td> <?= $data->level ?> </td>
                        <!-- == 1  ? "Admin" : "Kasir" -->
                        <td class="text-center" width="160px">
                            <form action="<?=site_url('user/del')?>" method="post">
                                <a href="<?=site_url('user/edit/'.$data->user_id)?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"> </i> Update
                                </a>
                                <input type="hidden" name="user_id" value="<?=$data->user_id?>">
                                <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"> </i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
         </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->