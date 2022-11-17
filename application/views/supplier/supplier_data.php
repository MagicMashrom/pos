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
<?php $this->view('messages')?>
    <div class="box">
        <div class="box-header ">
             <h3 class="box-title">Data Supplier</h3>
            <div class="pull-right">
                <a href="<?=site_url("supplier/add")?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"> </i> Create
                  </a>
            </div>
         </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table table-bordered" id="table1">
               <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th>Name Perusahaan</th>
                        <th>Phone Perusahaan</th>
                        <th>Address</th>
                        <th>Nama Sales</th>
                        <th>Phone Sales</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                </tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td> <?= $no++ ?></td> 
                        <td> <?= $data->name_perusahaan ?> </td>
                        <td> <?= $data->phone_perusahaan ?> </td>
                        <td> <?= $data->address ?> </td>
                        <td> <?= $data->name_sales  ?> </td>
                        <td> <?= $data->phone_sales ?> </td>
                        <td> <?= $data->description ?> </td>
                        <!-- == 1  ? "Admin" : "Kasir" -->
                        <td class="text-center" width="160px">
                                <a href="<?=site_url('supplier/edit/'.$data->supplier_id)?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"> </i> Update
                                </a>
                                <a href="<?=site_url('supplier/del/'.$data->supplier_id)?>"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-xs">
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