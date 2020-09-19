<body>
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 mt-4">
            <h1 style="text-align: center">Detail Order</h1>
            <p style="text-align: center"><?php echo "Tanggal: ".date('d-m-Y'); ?></p>
            <br><br>
            <div class="table-responsive mb-4">
            <table id="example" border="1px" cellspacing="0" class="table table-striped table-bordered" style="width: 100%">
          
                <tr>
               
                  <td>Id_order</td>
                  <td>tanggal_order</td>
                  <td>Id_user</td>
                  <td>keterangan</td>
                  <td>Status_order</td>
                  <td>kategori</td>
                  <td>id_menu</td>
                  <td>Jumlah</td>
                  <td>Total</td>
                 
                
                </tr>
   
              <?php
              if ($c_order>0){
                foreach ($order as $datas){
              ?>
               <tr>
               <td><?php echo $datas->id_order;?></td>
                  <td><?php echo $datas->tanggal_order;?></td>
                  <td><?php echo $datas->id_user?></td>
                  <td><?php echo $datas->keterangan?></td>
                  <td><?php echo $datas->status_order?></td>
                  <td><?php echo $datas->kategori?></td>
                  <td><?php echo $datas->id_menu?></td>
                  <td><?php echo $datas->jumlah?></td>
                  <td><?php echo $datas->total_harga?></td>        
                  
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