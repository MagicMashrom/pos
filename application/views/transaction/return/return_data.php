 <!-- Content Header (Page header) -->
 <section class="content-header">
      <h1>Stock Return
            <small>Barang Return</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Transcation</li>
        <li class="active">Stock Return</li>
      </ol>
</section>

<!-- Main content -->
<section class="content">
<?php $this->view('messages')?>
    <div class="box">
        <div class="box-header ">
             <h3 class="box-title">Stock Return</h3>
            <div class="pull-right">
                <a href="<?=site_url("stock/return/add")?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"> </i> Add Stock Return
                  </a>
            </div>
         </div>
         
        <!-- /.box-header -->
        <div class="box-body table-respnsive">
            <table class="table table-bordered" id="table1">
               <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th>Barcode</th>
                        <th>Produck Item</th>
                        <th>Qty</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                  foreach ($row as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data->barcode?></td>
                        <td><?=$data->item_name?></td>
                        <td class="text-right"><?=$data->qty?></td>
                        <td class="text-center"><?=indo_date($data->date)?></td>
                        <td class="text-center">
                            <a href="" id="set_dtl" class="btn btn-default btn-xs" 
                                data-toggle="modal" data-target="#modal-detail" 
                                data-barcode="<?=$data->barcode?>"
                                data-itemname="<?=$data->item_name?>"
                                data-detail="<?=$data->detail?>"
                                data-suppliername="<?=$data->supplier_name?>"
                                data-qty="<?=$data->qty?>"
                                data-date="<?=indo_date($data->date)?>">
                                <i class="fa fa-eye"></i> Details
                            </a>
                            <a href="<?=site_url('stock/return/del/'.$data->stock_id.'/'.$data->item_id)?>" onclick="return confirm('yakin hapus data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete
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



<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-tittle">Stock Return Detail</h4>
            </div>
            <div class="modal-body table-responsive">
               <table class="table table-responsive">
                    <tbody>
                        <tr>
                            <th style="">Barcode</th>
                            <td><span id="barcode"></span></td>
                        </tr>
                        <tr>
                            <th style="">Item Name</th>
                            <td><span id="item_name"></span></td>
                        </tr>
                        <tr>
                            <th style="">Detail</th>
                            <td><span id="detail"></span></td>
                        </tr>
                        <tr>
                            <th style="">Supplier Name</th>
                            <td><span id="supplier_name"></span></td>
                        </tr>
                        <tr>
                            <th style="">Qty</th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th style="">Date</th>
                            <td><span id="date"></span></td>
                        </tr>
                    </tbody>
               </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $(document).on('click', '#set_dtl', function() {
        var barcode = $(this).data('barcode');
        var itemname = $(this).data('itemname');
        var detail = $(this).data('detail');
        var suppliername = $(this).data('suppliername');
        var qty = $(this).data('qty');
        var date = $(this).data('date');
        $('#barcode').text(barcode);
        $('#item_name').text(itemname);
        $('#detail').text(detail);
        $('#supplier_name').text(suppliername);
        $('#qty').text(qty);
        $('#date').text(date)
        $('#detail').text(detail);
    })
})
</script>