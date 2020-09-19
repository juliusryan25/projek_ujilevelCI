<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class waiter extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('modeladmin');
    }

    public function indexwaiter()
	{
		if ($this->session->userdata('status_log')!= 'Online' && $this->session->userdata('level') != '') {
			// redirect('sistem/login');               
			// header("Location:".base_url().'sistem/indexkasir/home/'.$this->session->userdata('usernama'));
			echo "<script>alert('Access Denied');history.go(-1);</script>";
		}else if ($this->session->userdata('status_log')== 'Online' && $this->session->userdata('level') != '3') {
			// redirect('sistem/logout');                
			// header("Location:".base_url().'sistem/indexkasir/home/'.$this->session->userdata('usernama'));
			echo "<script>alert('Access Denied');history.go(-1);</script>";
        }
       
		
		$data['user'] = $this->modeladmin->get_user();
		$data['c_user'] = $this->modeladmin->count_user();
		$data['menu'] = $this->modeladmin->get_menu();
		$data['c_menu'] = $this->modeladmin->count_menu();
		$data['level'] = $this->modeladmin->get_db_level();
		$data['transaksi'] = $this->modeladmin->get_transaksi_waiter();
		$data['c_transaksi'] = $this->modeladmin->count_transaksi_waiter();
		$this->load->view('indexwaiter',$data);
    }
    public function dashboardwaiter()
	{
		$this->load->view('dashboardwaiter');
		
    }
    
    ////menu////
	public function crudmenu()
	{
		$this->load->view('crudmenu');
	}
	public function simpan_data_menu_waiter(){
		$this->modeladmin->simpan_menu_waiter();
	}
	public function delete_data_menu_waiter($id){
		$this->modeladmin->delete_menu_db($id);
		header("Location:".base_url().'waiter/indexwaiter/crudmenu');
	}

	public function edit_data_menu_waiter($id){
		$data['menu'] = $this->modeladmin->get_menu();
		$data['c_menu'] = $this->modeladmin->count_menu();
		$data['data_edit_menu'] = $this->modeladmin->get_data_edit_menu($id);
		$this->load->view('indexwaiter',$data);
	}
	
	public function aksi_edit_menu_waiter(){
		$this->modeladmin->edit_menu_waiter_db();
	}

	public function cetak_pdf_menu(){
		ob_start();

		//butuh view untuk load tablenya
		$data['c_menu']= $this->modeladmin->count_menu();
		$data['menu']= $this->modeladmin->get_menu();
		$this->load->view('pdf_datamenu_preview',$data);

		$html = ob_get_contents();
		ob_end_clean();

		//folder asset
		require'./assets/html2pdf/autoload.php';

		$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
		$pdf->WriteHTML($html);

		//Nama File
		$pdf->Output('Data_menu_'.date('d-m-Y').'.pdf','D');

	}
	public function cetak_excel_menu(){
		header('Content-Type: application / vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Data_menu.xls"');
		//namafilenya//
		header('Cache-Control: max-age=0');

		$data['c_menu']= $this->modeladmin->count_menu();
		$data['menu']=$this->modeladmin->get_menu();
		$this->load->view('pdf_datamenu_preview',$data);

	}

	////ORDER////
	public function crudorder()
	{
		$this->load->view('crudorder');
	}
	public function order_menu($id){
		$data['menu'] = $this->modeladmin->get_menu();
		$data['c_menu'] = $this->modeladmin->count_menu();
		$data['data_edit_menu'] = $this->modeladmin->get_data_order_menu($id);
		$this->load->view('indexwaiter',$data);
	}
	
	public function aksi_order(){
		$this->modeladmin->order_db();
    }

    public function data_order_pdf($id){
        ob_start();

        //butuh view untuk load tablenya
        $data['c_order']= $this->modeladmin->count_order();
        $data['print_order']= $this->modeladmin->get_data_order_print($id);
        $this->load->view('pdf_order_preview',$data);

        $html = ob_get_contents();
        ob_end_clean();

        //folder asset
        require'./assets/html2pdf/autoload.php';

        $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
        $pdf->WriteHTML($html);

        //Nama File
        $pdf->Output('Detail_Order_'.date('d-m-Y').'.pdf','D');

    }

}
?>