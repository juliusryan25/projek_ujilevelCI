<body>
<div class="col-lg-7" style="margin-top:5%">

<!-- Project Card Example -->
<div class="card shadow mb-4 border-left-primary">
  <div class="card-header py-3">
    <h3 class="m-0 font-weight-bold text-primary">User Details</h3>
  </div>
  <div class="card-body">
 <div class="row">
      <div class="col-5">
      <div class="card mb-3" style="width: 100%;">
      <div class="row no-gutters">
         
      <img src="<?php echo base_url().'assets/image/'.$this->session->userdata('image'); ?>" class="card-img" alt="...">
          </div>
      </div>
      </div>

      <div class="col-7">
      <center>
                    <!-- DI ISI NAMA PEGAWAI YANG LOGIN -->
                    <h2 class="card-title"><?php echo $this->session->userdata('usernama'); ?></h2>
                    <p class="card-text">Status : <?php echo $this->session->userdata('level'); ?></p>
                   
                    <p class="card-text"><small class="text-muted">Login Succes</small></p>
                    <a href="<?php echo site_url('admin/logout'); ?>"><button type="button" class="btn btn-outline-primary">Logout</button></a>
                    </center> 
      </div>
</div>
</body> 