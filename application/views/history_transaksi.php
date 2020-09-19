<main role="main" class="container-fluid" >
<div class="row">
    <div class="col-md-3"><h3>Data Transaction</h3></div>
    <div class="col-md-7"></div>
    <div class="col-2"><a href="<?php echo site_url('kasir/indexkasir/crudtransaksi'); ?>"> <button  class=" btn btn-primary btn-sm " style="width: 70%;" ><i class="fas fa-arrow-left"></i> Kembali </button></a></div>
    <div class="col-sm-12 mt-2">
            <div class="table-responsive mb-4 mt-4">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
               
                  <td>Id_Transaksi</td>
                  <td>Id_User</td>
                  <td>Id_Order</td>               
                  <td>Tanggal_Transaksi</td>
                  <td>Total_Bayar</td>
                  <td>Kembalian</td>
                  <td>Status_Transaksi</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
              <?php
              if ($c_history>0){
                foreach ($history as $datas){
              ?>
               <tr>
                  <td><?php echo $datas->id_transaksi;?></td>
                  <td><?php echo $datas->id_user;?></td>
                  <td><?php echo $datas->id_order?></td>
                  <td><?php echo $datas->tanggal?></td>
                  <td><?php echo $datas->total_bayar?></td>
                  <td><?php echo $datas->kembalian?></td>
                  <td> 
                      <?php
                    if ($datas->status_transaksi=="Dibayar") {
                      echo ' <div class="card border-success" style="max-width: 18rem;">
                   
                      <div class="card-body text-success">
                        <h6 class="card-text  text-center">  Dibayar </h6>                      
                      </div>
                    </div>';
                    }
                  ?>
                  </td>              
                  <td>
                  <div class="col-12">
                    <a href="<?php echo site_url('kasir/struk_pdf/'.$datas->id_transaksi); ?>" class="btn btn-warning mt-2" style="width: 100%;"><i class="fas fa-file-download"></i> Print</a>
            
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