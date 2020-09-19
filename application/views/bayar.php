<div class="row"></div>
<div class="col-3"></div>
<div class="col-6"><div class="card">
    <div class="card-header bg-primary" style="color:white">
        <h4 style="margin-top:10px">Purchase</h4>
  </div>
  <div class="card-body">
  <form action="<?php echo site_url('kasir/aksi_transaksi');?>" method="post" enctype="multipart/form-data">
  <?php
      foreach($data_edit_order as $e):?>
      <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>"> 
      <input type="hidden" name="id_order" value="<?php echo $e->id_order;?>"> 
     
        
        <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
            <label class="input-group-text" style="width:100px;" id="inputGroup-sizing-sm" for="inputGroupSelect01">Tanggal Bayar</label>
        </div>
        <input type="date"  name='tanggal'   id="tanggal_bayar"  class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
            <label class="input-group-text" style="width:100px;" id="inputGroup-sizing-sm" for="inputGroupSelect01">Total Harga</label>
        </div>
        <input type="number" name='total_harga' id="total" readonly   value="<?php echo $e->total_harga;?>"  class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
            <label class="input-group-text" style="width:100px;" id="inputGroup-sizing-sm" for="inputGroupSelect01">Bayar</label>
        </div>
        <input type="number" name='bayar'  id="bayar"  class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-1">
        <div class="input-group-prepend">
            <label class="input-group-text" style="width:100px;" id="inputGroup-sizing-sm" for="inputGroupSelect01">Kembalian</label>
        </div>
        <input type="text"  name='kembalian' id="kembalian"  readonly  onkeyup="kembali()" class="form-control " " aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
        </div>
      <div class="modal-footer">      
        <button type="submit" class="btn btn-primary">Save</button>
     
       <?php endforeach ?>
    </form>
    <a href="<?php echo site_url('kasir/indexkasir/crudtransaksi'); ?>"><button  class="btn btn-danger"> Cancel</button></a>
  </div></div> </div>
</div>
</div>
</div>
</div>
</div>
<script >
          function kembali(){
                          var total1= document.getElementById("total").value;
                          var bayar = document.getElementById("bayar").value;
                          var kembali = bayar-total1;

                        document.getElementById("kembalian").value = kembali;
                      };
      </script>


