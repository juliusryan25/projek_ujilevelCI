<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kasir extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('modeladmin');
    }

    public function indexkasir()
	{
		if ($this->session->userdata('status_log')!= 'Online' && $this->session->userdata('level') != '') {
			// redirect('sistem/login');               
			// header("Location:".base_url().'sistem/indexkasir/home/'.$this->session->userdata('usernama'));
			echo "<script>alert('Access Denied');history.go(-1);</script>";
		}elseif ($this->session->userdata('status_log')== 'Online' && $this->session->userdata('level') != '2') {
			// redirect('sistem/logout');                
			// header("Location:".base_url().'sistem/indexkasir/home/'.$this->session->userdata('usernama'));
			echo "<script>alert('Access Denied');history.go(-1);</script>";
		}
		
		$data['transaksi'] = $this->modeladmin->get_transaksi();
		$data['c_transaksi'] = $this->modeladmin->count_transaksi();
		$data['history'] = $this->modeladmin->get_history();
		$data['c_history'] = $this->modeladmin->count_history();
		$this->load->view('indexkasir',$data);
    }
    public function dashboarkasir()
	{
	
		$this->load->view('dashboardkasir');
		
    }
     ///Logout///
	 public function logout(){

		$log_stat="Offline";
		$this->modeladmin->update_login($log_stat,$this->session->userdata('usernama'));
		$this->session->sess_destroy();
		redirect(base_url().'admin/login');

	}

		////transaksi////
		public function crudtransaksi()
		{
			
			$this->load->view('crudtransaksi',$data);
		}
		public function aksi_transaksi(){
			$this->modeladmin->transaksi_db();
		}

		public function order_transaksi($id){
			$data['transaksi'] = $this->modeladmin->get_transaksi();
			$data['c_transaksi'] = $this->modeladmin->count_transaksi();
			$data['data_edit_transaksi'] = $this->modeladmin->get_data_order_transaksi($id);
			$this->load->view('indexkasir',$data);
		}
		public function bayar($id){
			$data['transaksi'] = $this->modeladmin->get_transaksi();
			$data['c_transaksi'] = $this->modeladmin->count_transaksi();
			$data['data_edit_order'] = $this->modeladmin->get_data_transaksi($id);
			$this->load->view('indexkasir',$data);
		}

		public function history_transaksi()
		{
			$this->load->view('history_transaksi',$data);
		}
		public function struk_pdf($id){
			ob_start();
	
			//butuh view untuk load tablenya
			$data['c_transaksi']= $this->modeladmin->count_history();
			$data['print_transaksi']= $this->modeladmin->get_data_print($id);
			$this->load->view('pdf_struk_preview',$data);
	
			$html = ob_get_contents();
			ob_end_clean();
	
			//folder asset
			require'./assets/html2pdf/autoload.php';
	
			$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
			$pdf->WriteHTML($html);
	
			//Nama File
			$pdf->Output('Struk_'.date('d-m-Y').'.pdf','D');
	
		}
}
?>