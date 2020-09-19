<body>
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 mt-4">
            <h1 style="text-align: center">Data User</h1>
            <p style="text-align: center"><?php echo "Tanggal: ".date('d-m-Y'); ?></p>
            <br><br>
            <div class="table-responsive mb-4">
            <table id="example" border="1px" cellspacing="0" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                    <tr>
                  <td>Id_menu</td>
                  <td>Nama_menu</td>
                  <td>Kategori</td>
                  <td>Harga/pcs</td>
                  <td>Stok</td>
                  <td>Status Menu</td>
                  <td>Gambar</td>
                  
                </tr>
              </thead>
              <tbody>
              <?php
              if ($c_menu>0){
                foreach ($menu as $datas){
              ?>
               <tr>
                  <td><?php echo $datas->id_menu;?></td>
                  <td><?php echo $datas->nama_menu;?></td>
                  <td><?php echo $datas->kategori?></td>
                  <td><?php echo $datas->harga?></td>
                  <td><?php echo $datas->stok?></td>
                  <td><?php echo $datas->status_menu?></td>
                  <td><img style="width :100px" src="<?php echo base_url('assets/image_menu/'.$datas->image)?>" alt=""></td>
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
            </table>            
            </div>
        </div>
      </div>
      <!-- <a href="<?php echo site_url('sistem/cetak_pdf')?>">Download</a> -->
      </div>
</body>