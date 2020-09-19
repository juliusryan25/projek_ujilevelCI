<body>
<div class="row">
<div class="col-3"></div>
<div class="col-6" style="margin-top:1%">

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
</div>
</div>
</div>
<div class="col-3 "></div>
<div class="col-3"></div>
<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Order (Day)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_harian;?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaction (Day)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $transaksi_harian;?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                  
                    </div>
                  </div>
                </div>
              </div>
            </div>
<div class="col-3"></div>
<div class="col-12"></div>
</div>
</body>