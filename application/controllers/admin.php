<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('modeladmin');
	}

	public function login(){
		if($this->session->userdata('status_log')=='Online'){
		    redirect('admin/indexif');
		}

		$judul['title'] = "Login";
		$this->load->view('login',$judul);
	}

	public function aksi_login(){
		$usernames = $this -> input->post('username');
		$passwords = $this -> input->post('password');

		$where = array (
			'username' => $usernames,
			'password' => $passwords
		);
		$cek = $this ->modeladmin->cek_login("tb_user",$where)->num_rows();

		if ($cek > 0) {
			$log_stat = 'Online';
			$this -> modeladmin ->update_login($log_stat,$usernames);

			$data = $this->modeladmin->cek_login("tb_user",$where)->result();

			foreach($data as $datas){
				$data_session = array(
					'id_user' => $datas->id_user,
					'usernama' => $datas->username, 
					'password' => $datas->password, 
					'nama' => $datas->nama_user,
					'level' => $datas->id_level, 
					'image' => $datas->image, 
					'status_log' => $datas->status_login, 
				);
			}

			$this->session->set_userdata($data_session);
				if ($this->session->userdata('status_log') == 'Online') {
					redirect('admin/indexif');
					
				}else{
					$this->session->sess_destroy();
					redirect(base_url().'admin/login');
				}
   
		}
		else {
			echo "<script>alert('Username atau Password salah!');history.go(-1);</script>";
			$this->session->sess_destroy();
		   
		}
		
	}
	public function indexif(){
		if ($this->session->userdata('status_log')!= 'Online') {
			redirect('admin/login');
		}else if($this->session->userdata('status_log')== 'Online'  && $this->session->userdata('level') == '1'){
			redirect('admin/indexadmin/dashboard/'.$this->session->userdata('usernama'));
		}
		else if($this->session->userdata('status_log')== 'Online'  && $this->session->userdata('level') == '2'){
			redirect('kasir/indexkasir/dashboardkasir/'.$this->session->userdata('usernama'));
		}
		else if($this->session->userdata('status_log')== 'Online'  && $this->session->userdata('level') == '3'){
			redirect('waiter/indexwaiter/dashboardwaiter/'.$this->session->userdata('usernama'));
		}
		else if($this->session->userdata('status_log')== 'Online'  && $this->session->userdata('level') == '4'){
			redirect('owner/indexowner/dashboardowner/'.$this->session->userdata('usernama'));
		}
		
	}

	 ///Logout///
	 public function logout(){

		$log_stat="Offline";
		$this->modeladmin->update_login($log_stat,$this->session->userdata('usernama'));
		$this->session->sess_destroy();
		redirect(base_url().'admin/login');

	}


	public function indexadmin()
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
		
		$data['user'] = $this->modeladmin->get_user();
		$data['c_user'] = $this->modeladmin->count_user();
		$data['menu'] = $this->modeladmin->get_menu();
		$data['c_menu'] = $this->modeladmin->count_menu();
		$data['level'] = $this->modeladmin->get_db_level();
		$data['transaksi'] = $this->modeladmin->get_transaksi();
		$data['c_transaksi'] = $this->modeladmin->count_transaksi();
		$this->load->view('indexadmin',$data);
	}

	public function dashboardadmin()
	{
		$this->load->view('dashboardadmin');
		
	}

	////user////
	public function cruduser()
	{
		$this->load->view('cruduser');
	}
	public function simpan_data_user(){
		$this->modeladmin->simpan_user();
	}
	public function delete_data_user($id){
		$this->modeladmin->delete_user_db($id);
		header("Location:".base_url().'admin/indexadmin/cruduser');
	}

	public function edit_data_user($id){
		$data['user'] = $this->modeladmin->get_user();
		$data['c_user'] = $this->modeladmin->count_user();
		$data['data_edit_user'] = $this->modeladmin->get_data_edit_user($id);
		$this->load->view('indexadmin',$data);
	}
	
	public function aksi_edit_user(){
		$this->modeladmin->edit_user_db();
	}

	public function cetak_pdf(){
		ob_start();

		//butuh view untuk load tablenya
		$data['c_user']= $this->modeladmin->count_user();
		$data['user']= $this->modeladmin->get_user();
		$this->load->view('pdf_datauser_preview',$data);

		$html = ob_get_contents();
		ob_end_clean();

		//folder asset
		require'./assets/html2pdf/autoload.php';

		$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
		$pdf->WriteHTML($html);

		//Nama File
		$pdf->Output('Data_User_'.date('d-m-Y').'.pdf','D');

	}
	public function cetak_excel(){
		header('Content-Type: application / vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Data_User.xls"');
		//namafilenya//
		header('Cache-Control: max-age=0');

		$data['c_user']= $this->modeladmin->count_user();
		$data['user']=$this->modeladmin->get_user();
		$this->load->view('pdf_datauser_preview',$data);

	}

	////menu////
	public function crudmenu()
	{
		$this->load->view('crudmenu');
	}
	public function simpan_data_menu(){
		$this->modeladmin->simpan_menu();
	}
	public function delete_data_menu($id){
		$this->modeladmin->delete_menu_db($id);
		header("Location:".base_url().'admin/indexadmin/crudmenu');
	}

	public function edit_data_menu($id){
		$data['menu'] = $this->modeladmin->get_menu();
		$data['c_menu'] = $this->modeladmin->count_menu();
		$data['data_edit_menu'] = $this->modeladmin->get_data_edit_menu($id);
		$this->load->view('indexadmin',$data);
	}
	
	public function aksi_edit_menu(){
		$this->modeladmin->edit_menu_db();
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


}
