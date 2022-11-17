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
             <h3 class="box-title">Data Customer</h3>
            <div class="pull-right">
                <a href="<?=site_url("customer/add")?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"> </i> Create
                  </a>
            </div>
         </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table table-bordered" id="table1">
               <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th>Name </th>
                        <th>Jenis Kelamin</th>
                        <th>Phone </th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                </tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td> <?= $no++ ?></td> 
                        <td> <?= $data->name ?> </td>
                        <td> <?= $data->gender ?> </td>
                        <td> <?= $data->phone ?> </td>
                        <td> <?= $data->address ?> </td>
                        <!-- == 1  ? "Admin" : "Kasir" -->
                        <td class="text-center" width="160px">
                                <a href="<?=site_url('customer/edit/'.$data->customer_id)?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"> </i> Update
                                </a>
                                <a href="<?=site_url('customer/del/'.$data->customer_id)?>"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"> </i> Delete
                                </a>
                                
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