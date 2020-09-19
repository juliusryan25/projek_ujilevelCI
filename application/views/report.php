<main role="main" class="container-fluid" style="margin-top: 10%;">
<center><div class="col-xl-6">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body" style="width:100%">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                     <h2>Print Report</h2>
                     <div class="input-group">
                        <select class="custom-select" id="table">
                            <option selected>Choose Table</option>
                            <option value="1">Transaction</option>
                            <option value="2">Order</option>
                      
                        </select>

                        <select class="custom-select" id="type">
                            <option selected>Choose Type</option>
                            <option value="1">PDF</option>
                            <option value="2">EXCEL</option>
                      
                        </select>
                        <div class="input-group-append">
                           <button class="btn btn-warning"  onclick="hasil()" type="button"><i class="fas fa-file-download"></i></button>
                        </div>
                        </div>
                    </div>             
                  </div>
                </div>
              </div>

           
            </div></center>

            <script>
                 function hasil() {
                    var pilihan= document.getElementById("table").value;
                    var pilihan2= document.getElementById("type").value;
                        
                    if(pilihan=="1" && pilihan2=="1") {
                        window.location.assign("<?php echo base_url();?>/owner/cetak_pdf_transaksi");
                    }   
                    else if(pilihan=="1" && pilihan2=="2") {
                        window.location.assign("<?php echo base_url();?>/owner/cetak_excel_transaksi");
                    }
                    else if(pilihan=="2" && pilihan2=="1") {
                        window.location.assign("<?php echo base_url();?>/owner/cetak_pdf_order");
                    }
                    else if(pilihan=="2" && pilihan2=="2") {
                        window.location.assign("<?php echo base_url();?>/owner/cetak_excel_order");
                    };
                 };
                
            </script>
</main>