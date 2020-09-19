<div class="row"></div>
<div class="col-3"></div>
<div class="col-6"><div class="card">
    <div class="card-header bg-primary" style="color:white">
        <h4 style="margin-top:10px">Order</h4>
  </div>
  <div class="card-body">
  <form action="<?php echo site_url('waiter/aksi_order');?>" method="post" enctype="multipart/form-data">
  <?php
      foreach($data_edit_menu as $e):?>
      <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>"> 
      <input type="hidden" name="id_menu" value="<?php echo $e->id_menu;?>"> 
      <input type="hidden" name="status_order" value="Diproses" ?>
            <div class="input-group input-group-sm mb-1">
            <div class="input-group-prepend">
                <span class="input-group-text"  style="width:90px;" id="inputGroup-sizing-sm">Nama Menu</span>
            </div>
            <input type="text" name='nama_menu' readonly value="<?php echo $e->nama_menu;?>" id ="nama_menu" class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>       
       
        <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
            <label class="input-group-text" style="width:90px;" id="inputGroup-sizing-sm" for="inputGroupSelect01">Kategori</label>
        </div>
        <input type="text" name='kategori' readonly id="kategori" value="<?php echo $e->kategori;?>" class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
        
        <div class="input-group input-group-sm mb-1">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:90px;" id="inputGroup-sizing-sm">Harga/Pcs</span>
            </div>
            <input type="text" name='harga'id="harga" readonly value="<?php echo $e->harga;?>" class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            
        </div>
       
        <div class="input-group input-group-sm mb-1">
            <div class="input-group-prepend">
                <span class="input-group-text" style="width:90px;" id="inputGroup-sizing-sm">Stok</span>
            </div>
            <input type="text" name='stok' readonly id="stok" value="<?php echo $e->stok;?>" class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            
        </div>

        <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
            <label class="input-group-text" style="width:90px;" id="inputGroup-sizing-sm" for="inputGroupSelect01">Status_menu</label>
        </div>
        <input type="text" name='status_menu' readonly id="status_menu" value="<?php echo $e->status_menu;?>" class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
            <label class="input-group-text" style="width:100px;" id="inputGroup-sizing-sm" for="inputGroupSelect01">Tanggal Order</label>
        </div>
        <input type="date"  name='tanggal'   id="tanggal"  class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
            <label class="input-group-text" style="width:100px;" id="inputGroup-sizing-sm" for="inputGroupSelect01">Keterangan</label>
        </div>
        <textarea name="keterangan" id="keterangan" cols="50.9" rows="4"></textarea>
        </div>

        <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
            <label class="input-group-text" style="width:100px;" id="inputGroup-sizing-sm" for="inputGroupSelect01">Jumlah Order</label>
        </div>
        <input type="number" name='jumlah'  id="jumlah"  class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
            <label class="input-group-text" style="width:100px;" id="inputGroup-sizing-sm" for="inputGroupSelect01">Total Harga</label>
        </div>
        <input type="number" readonly name='total_harga' readonly  id="total_harga"  onkeyup="total()" class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
     
        </div>
      <div class="modal-footer">      
        <button type="submit" class="btn btn-primary">Save</button>
     
       <?php endforeach ?>
    </form>
    <a href="<?php echo site_url('waiter/indexwaiter/crudorder'); ?>"><button  class="btn btn-danger"> Cancel</button></a>
  </div></div> </div>
</div>
</div>
</div>
</div>
</div>
<script>
     function total() {
                    var total= document.getElementById("jumlah").value;
                    var harga = document.getElementById("harga").value;
                    var total_harga = (harga) * (total);

                   document.getElementById("total_harga").value = total_harga;
                 };
</script>

