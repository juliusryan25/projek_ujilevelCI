<main role="main" class="container-fluid" >
<div class="row">
    <div class="col-md-2"><h3>Crud User</h3></div>
    <div class="col-md-8"></div>
  
    <div class="col-md-2">  
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add" > <i class="far fa-address-card"></i> &nbsp<b>+</b></butttom>
    </div>

    <div class="col-sm-12 mt-4">
            <div class="table-responsive mb-4 mt-4">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <td>Id_User</td>
                  <td>Username</td>
                  <td>Password</td>
                  <td>Nama_User</td>
                  <td>Id_Level</td>
                  <td>Images</td>
                  <td>Action</td>
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
                  <td><?php foreach($level as $namalevel) : ?>
                        <?php if( $namalevel->id_level == $datas->id_level) { ?>
                          <?= $namalevel->nama_level; ?>
                        <?php } ?>
                      <?php endforeach; ?></td>
                  <td><img style="width :100px" src="<?php echo base_url('assets/image/'.$datas->image)?>" alt=""></td>
                  <!-- <td>
                  
                 </td> -->
                  
                
                  <td>
                  <div class="col-12">
                   <a href="<?php echo site_url('admin/edit_data_user/'.$datas->id_user); ?>"> <button  class=" btn btn-success btn-sm edit_data" style="width: 100%;" ><i class="fas fa-edit"></i>   </button></a>
                    </div>
                    <div class="col-12 mt-2" >
                  <button  data-toggle="modal" data-target="#exampleModal" class=" btn btn-danger btn-sm hapus_data" style="width: 100%;" ><i class="fas fa-trash"></i>   </button>
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

  <div class="col-12">
  <div class="col-md-6">
  <a href="<?php echo base_url();?>/admin/cetak_pdf" class="btn btn-warning"><i class="fas fa-file-download"></i> PDF</a>
  <a href="<?php echo base_url();?>/admin/cetak_excel" class="btn btn-success"><i class="fas fa-file-download"></i> EXCEL</a></div>
  </div>

    <!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo site_url('admin/simpan_data_user');?>" method="post" enctype="multipart/form-data">
      <div class="input-group input-group-sm mb-1">
            <div class="input-group-prepend">
                <span class="input-group-text"  style="width:90px;" id="inputGroup-sizing-sm">Username</span>
            </div>
            <input type="text" name='username' id ="username" class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
       
        <div class="input-group input-group-sm mb-1">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:90px;" id="inputGroup-sizing-sm">Password</span>
            </div>
            <input type="text" name='password'id="password" class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            
        </div>
       
        <div class="input-group input-group-sm mb-1">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:90px;" id="inputGroup-sizing-sm">Nama User</span>
            </div>
            <input type="text" name='nama' class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            
        </div>
       
        <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
            <label class="input-group-text" style="width:90px;" id="inputGroup-sizing-sm" for="inputGroupSelect01">User Level</label>
        </div>
        <select class="custom-select " name='level'  id="level">
            <option selected >Choose...</option>
            <option value="1">Admin</option>
            <option value="2">Kasir</option>
            <option value="3">Waiter</option>
            <option value="4">Owner</option>
        </select>
        </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" style="width:90px;" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="gambar" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>
        </div>
      
      

      <div class="modal-footer">

        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header " style="background:red;color:white">
                      <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body " style="text-align:center">
                   <center>  <img src="<?php echo base_url(); ?>assets/img/seru.png" style="width:150px" class="card-img" alt="..."></center><br>
                    Are You Sure ? .....
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <a href="<?php echo site_url('admin/delete_data_user/'.$datas->id_user); ?>"> <button type="button" class="btn btn-primary">Yes</button></a>
                    </div>
                  </div>
                </div>
              </div>


</main>    