<body>
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 mt-4">
            <h1 style="text-align: center">Invoice</h1>
            <p style="text-align: center"><?php echo "Tanggal: ".date('d-m-Y'); ?></p>
            <br><br>
            <div class="table-responsive mb-4">
            <table id="example" border="1px" cellspacing="0" class="table table-striped table-bordered" style="width: 100%">
          
                    <tr>
               
                  <td>Id_Transaksi</td>
                  <td>Id_User</td>
                  <td>Id_Order</td>               
                  <td>Tanggal_Transaksi</td>
                  <td>Total_Bayar</td>
                  <td>Kembalian</td>
                  <td>Status_Transaksi</td>
                
                </tr>
   
              <?php
              if ($c_transaksi>0){
                foreach ($print_transaksi as $datas){
              ?>
               <tr>
               <td><?php echo $datas->id_transaksi;?></td>
                  <td><?php echo $datas->id_user;?></td>
                  <td><?php echo $datas->id_order?></td>
                  <td><?php echo $datas->tanggal?></td>
                  <td><?php echo $datas->total_bayar?></td>
                  <td><?php echo $datas->kembalian?></td>
                  <td><?php echo $datas->status_transaksi?></td>          
                  
                </tr>
                <?php }
                } 
            ?>
            </table>            
            </div>
        </div>
      </div>
      <!-- <a href="<?php echo site_url('sistem/cetak_pdf')?>">Download</a> -->
      </div>
</body>