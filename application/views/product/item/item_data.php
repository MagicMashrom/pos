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
             <h3 class="box-title">Data Product Items</h3>
            <div class="pull-right">
                <a href="<?=site_url("item/add")?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"> </i> Create Product Item
                  </a>
            </div>
         </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table table-bordered" id="table1">
               <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th>Barcode</th>
                        <th>Name</th>
                        <th>Unit</th
                        ><th>Price</th>
                        <th>Stocks</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                </tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td style="width:5%;"> <?= $no++ ?></td> 
                        <td> 
                            <?= $data->barcode?><br>
                            <a href="<?=site_url('item/barcode_qrcode/'.$data->item_id)?>" class="btn btn-default btn-xs">
                               Generate <i class="fa fa-barcode"> </i>
                            </a>
                        </td>
                        <td> <?= $data->name ?> </td>
                        <td> <?= $data->unit_name ?> </td>
                        <td> <?= indoCurrency($data->price) ?> </td>
                        <td> <?= $data->stock ?> </td>
                        <td>
                            <?php if($data->image != null) { ?>
                            <img src="<?=base_url('uploads/product/'.$data->image)?>" alt="" style="width:100px">
                            <?php } ?>
                        </td> 
                      
                        <!-- == 1  ? "Admin" : "Kasir" -->
                        <td class="text-center" width="160px">
                                <a href="<?=site_url('item/edit/'.$data->item_id)?> " class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"> </i> Update
                                </a>
                                <a href="<?=site_url('item/del/'.$data->item_id)?>"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-xs">
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
<!-- <script>
  $(document).ready(function(){
    $('#table1').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?=site_url('item/get_ajax')?>",
            "type": "POST"
        },
        "columnDefs": [
            {
                "targets": [5, 6],
                "className": 'text-right'
            },
            {
                "targets": [7, -1],
                "className": 'text-center'
            },
            {
                "targets": [0, 7, -1],
                "orderable": false
            },
        ],
        "order": []
    })
  })
</script> -->