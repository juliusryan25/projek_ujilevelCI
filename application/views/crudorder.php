<main role="main" class="container-fluid" >
<div class="row">
    <div class="col-md-2"><h3>Order</h3></div>
    <div class="col-md-8"></div>
    <div class="col-2"><a href="<?php echo site_url('waiter/indexwaiter/data_order'); ?>"> <button  class=" btn btn-primary btn-sm " style="width: 70%;" > <i class="fas fa-shopping-cart"></i> Data_Order</button></a></div>
    <div class="col-sm-12 mt-2">
            <div class="table-responsive mb-4 mt-4">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <!-- <td>Id_menu</td> -->
                  <td>Nama_menu</td>
                  <td>Kategori</td>
                  <td>Harga/pcs</td>
                  <td>Stok</td>
                  <td>Status Menu</td>
                  <td>Gambar</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
              <?php
              if ($c_menu>0){
                foreach ($menu as $datas){
              ?>
               <tr>
                  <!-- <td><?php echo $datas->id_menu;?></td> -->
                  <td><?php echo $datas->nama_menu;?></td>
                  <td><?php echo $datas->kategori?></td>
                  <td><?php echo $datas->harga?></td>
                  <td><?php echo $datas->stok?></td>
                  <td><?php echo $datas->status_menu?></td>
                  <td style="height:100px"><img style="width :100px" src="<?php echo base_url('assets/image_menu/'.$datas->image)?>" alt=""></td>
                  <!-- <td>
                  
                 </td> -->
                  
                
                  <td >
                  <div class="col-12">
                   <a href="<?php echo site_url('waiter/order_menu/'.$datas->id_menu); ?>"> <button  class=" btn btn-primary btn-sm " style="width: 100%;margin-top:30%" ><i class="fas fa-shopping-cart"></i> Order  </button></a>
                    </div>
                
                  </td>
                </tr>
                <?php }
                } else {
                  ?>
                  <tr>
                    <td colspan="8"><center> Data user kosong!</center></td>
                  </tr> 
                  <?php
                }
                  ?>
              </tbody>
          </div>
        </div>
        </div>

</main>    