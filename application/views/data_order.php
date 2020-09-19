<main role="main" class="container-fluid" >
<div class="row">
    <div class="col-md-2"><h3>Data Order</h3></div>
    <div class="col-md-8"></div>
    <div class="col-2"><a href="<?php echo site_url('waiter/indexwaiter/crudorder'); ?>"> <button  class=" btn btn-primary btn-sm " style="width: 70%;" > <i class="fas fa-arrow-left"></i></i> Kembali</button></a></div>
    <div class="col-sm-12 mt-2">
            <div class="table-responsive mb-4 mt-4">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
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
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
              <?php
              if ($c_transaksi>0){
                foreach ($transaksi as $datas){
              ?>
               <tr>
                  <td><?php echo $datas->id_order;?></td>
                  <td><?php echo $datas->tanggal_order;?></td>
                  <td><?php echo $datas->id_user?></td>
                  <td><?php echo $datas->keterangan?></td>
                  <td> 
                      <?php
                    if ($datas->status_order=="Diproses") {
                      echo ' <div class="card border-danger" style="max-width: 18rem;">
                   
                      <div class="card-body text-danger">
                        <h6 class="card-text  text-center">  Diproses </h6>                      
                      </div>
                    </div>';
                    }
                    if ($datas->status_order=="Dibayar") {
                        echo ' <div class="card border-success" style="max-width: 18rem;">
                     
                        <div class="card-body text-success">
                          <h6 class="card-text  text-center">  Dibayar </h6>                      
                        </div>
                      </div>';
                      }
                  ?>
                  </td>
                  <td><?php echo $datas->kategori?></td>
                  <td><?php echo $datas->id_menu?></td>
                  <td><?php echo $datas->jumlah?></td>
                  <td><?php echo $datas->total_harga?></td>
                  <!-- <td>
                  
                 </td> -->
                  
                
                  <td >
                  <div class="col-12">
                  <a href="<?php echo site_url('waiter/data_order_pdf/'.$datas->id_order); ?>" class="btn btn-warning mt-2" style="width: 100%;"><i class="fas fa-file-download"></i> Print</a>
                    </div>
                
                  </td>
                </tr>
                <?php }
                } else {
                  ?>
                  <tr>
                    <td colspan="10"><center> Data order kosong!</center></td>
                  </tr> 
                  <?php
                }
                  ?>
              </tbody>
          </div>
        </div>
        </div>

</main>    