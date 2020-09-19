<div class="row"></div>
<div class="col-3"></div>
<div class="col-6"><div class="card">
    <div class="card-header bg-primary" style="color:white">
        <h4 style="margin-top:10px">Edit User</h4>
  </div>
  <div class="card-body">
  <form action="<?php echo site_url('admin/aksi_edit_user');?>" method="post" enctype="multipart/form-data">
  <?php
      foreach($data_edit_user as $e):?>
                         <input type="hidden" name="id_user" value="<?php echo $e->id_user;?>"> 
        <div class="input-group input-group-sm mb-1">
            <div class="input-group-prepend">
                <span class="input-group-text"  style="width:90px;" id="inputGroup-sizing-sm">Username</span>
            </div>
            <input type="text" name='username' id ="username" class="form-control " value="<?php echo $e->username;?>" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
        
        <div class="input-group input-group-sm mb-1">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:90px;" id="inputGroup-sizing-sm">Password</span>
            </div>
            <input type="text" name='password'id="password"  class="form-control " value="<?php echo $e->password;?>" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            
        </div>
       
        <div class="input-group input-group-sm mb-1">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:90px;" id="inputGroup-sizing-sm">Nama User</span>
            </div>
            <input type="text" name='nama_user' class="form-control" value="<?php echo $e->nama_user;?>"  aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            
        </div>
     
        <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
            <label class="input-group-text" style="width:90px;" id="inputGroup-sizing-sm" for="inputGroupSelect01">User Level</label>
        </div>
        <select class="custom-select " name='id_level'  id="level">
            <option selected="selected" value="<?php echo $e->id_level;?>"><?php echo $e->id_level;?></option>
            <option value="1">(1)Admin</option>
            <option value="2">(2)Kasir</option>
            <option value="3">(3)Owner</option>
        </select>
        </div>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" style="width:90px;" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" value="<?php echo $e->image;?>" name="gambar" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>
        </div>
      
        </div>
      <div class="modal-footer">      
        <button type="submit" class="btn btn-primary">Save</button>
     
       <?php endforeach ?>
    </form>
    <a href="<?php echo site_url('admin/indexadmin/cruduser'); ?>"><button  class="btn btn-danger"> Cancel</button></a>
  </div></div> </div>
</div></div>
     
  </div>
</div>
    </div>