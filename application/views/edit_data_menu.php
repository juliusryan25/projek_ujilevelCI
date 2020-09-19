<div class="row"></div>
<div class="col-3"></div>
<div class="col-6"><div class="card">
    <div class="card-header bg-primary" style="color:white">
        <h4 style="margin-top:10px">Edit User</h4>
  </div>
  <div class="card-body">
  <form action="<?php echo site_url('admin/aksi_edit_menu');?>" method="post" enctype="multipart/form-data">
  <?php
      foreach($data_edit_menu as $e):?>
      <input type="hidden" name="id_menu" value="<?php echo $e->id_menu;?>"> 
            <div class="input-group input-group-sm mb-1">
            <div class="input-group-prepend">
                <span class="input-group-text"  style="width:90px;" id="inputGroup-sizing-sm">Nama Menu</span>
            </div>
            <input type="text" name='nama_menu' value="<?php echo $e->nama_menu;?>" id ="nama_menu" class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>       
       
        <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
            <label class="input-group-text" style="width:90px;" id="inputGroup-sizing-sm" for="inputGroupSelect01">Kategori</label>
        </div>
        <select class="custom-select " name='kategori'  id="kategori">
            <option selected value="<?php echo $e->kategori;?>" ><?php echo $e->kategori;?></option>
            <option value="makanan">Makanan</option>
            <option value="minuman">Minuman</option>
            <option value="alat">Alat</option>
        </select>
        </div>
        
        <div class="input-group input-group-sm mb-1">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:90px;" id="inputGroup-sizing-sm">Harga</span>
            </div>
            <input type="text" name='harga'id="harga" value="<?php echo $e->harga;?>" class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            
        </div>
       
        <div class="input-group input-group-sm mb-1">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:90px;" id="inputGroup-sizing-sm">Stok</span>
            </div>
            <input type="text" name='stok' id="stok" value="<?php echo $e->stok;?>" class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            
        </div>

        <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
            <label class="input-group-text" style="width:90px;" id="inputGroup-sizing-sm" for="inputGroupSelect01">Status Menu</label>
        </div>
        <select class="custom-select " name='status_menu'  id="status_menu">
            <option selected value="<?php echo $e->status_menu;?>"><?php echo $e->status_menu;?></option>
            <option value="Tersedia">Tersedia</option>
            <option value="Habis">Habis</option>
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
    <a href="<?php echo site_url('admin/indexadmin/crudmenu'); ?>"><button  class="btn btn-danger"> Cancel</button></a>
  </div></div> </div>
</div></div>
     
  </div>
</div>
    </div>