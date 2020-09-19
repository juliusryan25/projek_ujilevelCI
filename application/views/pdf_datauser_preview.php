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
                  <td>Id_User</td>
                  <td>Username</td>
                  <td>Password</td>
                  <td>Nama_User</td>
                  <td>Id_Level</td>
                  <td>Images</td>
                 
                </tr>
              </thead>
              <tbody>
              <?php
              if ($c_user>0){
                foreach ($user as $datas){
              ?>
               <tr>
                  <td><?php echo $datas->id_user;?></td>
                  <td><?php echo $datas->username;?></td>
                  <td><?php echo $datas->password?></td>
                  <td><?php echo $datas->nama_user?></td>
                  <td><?php echo $datas->id_level?></td>
                  <td><img style="width :100px" src="<?php echo base_url('assets/image/'.$datas->image)?>" alt=""></td>
                  <!-- <td>
                  
                 </td> -->
                  
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