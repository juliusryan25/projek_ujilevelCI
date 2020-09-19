<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class owner extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('modeladmin');
    }

    public function indexowner()
	{
		// if ($this->session->userdata('status_log')!= 'Online' && $this->session->userdata('level') != '') {
		// 	// redirect('sistem/login');               
		// 	// header("Location:".base_url().'sistem/indexkasir/home/'.$this->session->userdata('usernama'));
		// 	echo "<script>alert('Access Denied');history.go(-1);</script>";}
		// elseif ($this->session->userdata('status_log')== 'Online' && $this->session->userdata('level') != '1'){
		// 	// redirect('sistem/logout');                
		// 	// header("Location:".base_url().'sistem/indexkasir/home/'.$this->session->userdata('usernama'));
		// 	echo "<script>alert('Access Denied');history.go(-1);</script>";
		// }
		
        $data['jumlah_harian'] = $this->modeladmin->get_totalorder();
        $data['transaksi_harian'] = $this->modeladmin->get_transaksi_harian();
		$this->load->view('indexowner',$data);
	}

	public function dashboardowner()
	{
		$this->load->view('dashboardowner');
		
    }
    
    public function cetak_pdf_transaksi(){
		ob_start();

		//butuh view untuk load tablenya
		$data['c_transaksi']= $this->modeladmin->count_transaksi_owner();
		$data['transaksi']= $this->modeladmin->get_transaksi_owner();
		$this->load->view('pdf_datatransaksiowner_preview',$data);

		$html = ob_get_contents();
		ob_end_clean();

		//folder asset
		require'./assets/html2pdf/autoload.php';

		$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
		$pdf->WriteHTML($html);

		//Nama File
		$pdf->Output('Data_User_'.date('d-m-Y').'.pdf','D');

	}
	public function cetak_excel_transaksi(){
		header('Content-Type: application / vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Data_User.xls"');
		//namafilenya//
		header('Cache-Control: max-age=0');

		$data['c_transaksi']= $this->modeladmin->count_transaksi_owner();
		$data['transaksi']= $this->modeladmin->get_transaksi_owner();
		$this->load->view('pdf_datatransaksiowner_preview',$data);

    }
    
    public function cetak_pdf_order(){
		ob_start();

		//butuh view untuk load tablenya
		$data['c_order']= $this->modeladmin->count_order_owner();
		$data['order']= $this->modeladmin->get_order_owner();
		$this->load->view('pdf_dataorderowner_preview',$data);

		$html = ob_get_contents();
		ob_end_clean();

		//folder asset
		require'./assets/html2pdf/autoload.php';

		$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
		$pdf->WriteHTML($html);

		//Nama File
		$pdf->Output('Data_User_'.date('d-m-Y').'.pdf','D');

	}
	public function cetak_excel_order(){
		header('Content-Type: application / vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Data_User.xls"');
		//namafilenya//
		header('Cache-Control: max-age=0');

		$data['c_order']= $this->modeladmin->count_order_owner();
		$data['order']= $this->modeladmin->get_order_owner();
		$this->load->view('pdf_dataorderowner_preview',$data);

	}

}
?>