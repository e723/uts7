<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class controllerAuthorized extends CI_Controller {

 function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
 
    }
	
	
	/*==============================================================================================================*/
		
	 public function index(){
	   if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
		 	/*$data['username'] = $session_data['username'];
		     $this->load->view('viewAuthorized', $data);*/
			
			/* ## Filter user menggunakan username */
			if($session_data['username']=='admin'){

		 	$crud = new grocery_CRUD();
			/*$crud->set_theme('datatables');*/
			$crud->set_table('tbl_mhs');
			$crud->set_subject('Data Mahasiswa');
			$crud->unset_columns('id_mhs');
				 			
				//DATA PENAMAAN ALIAS TABLE
		   	$crud->display_as('nama_mhs','Nama')
				 ->display_as('nim_mhs','NIM')
				 ->display_as('tempat_lahir','Tempat Lahir')
				 ->display_as('tanggal_lahir','Tanggal Lahir')
				 ->display_as('alamat_asal','Alamat Asal')
				 ->display_as('alamat_sekarang','Alamat Sekarang')
				 ->display_as('telp','Telp/HP')
				 ->display_as('email','Email')
				 ->display_as('kelas_mhs','Kelas')
				 ->display_as('dosen_wali','Dosen Wali')
				 ->display_as('jurusan','Jurusan')
				 ->display_as('fakultas','Fakultas');
			
			$crud->set_relation('kelas_mhs','tbl_kelas','nama_kelas')
				 ->set_relation('dosen_wali','tbl_dosen','nama_dosen')
				 ->set_relation('jurusan','tbl_jurusan','{nama_jur} -- {tingkatan}')
				 ->set_relation('fakultas','tbl_fakultas','nama_fakultas');
				 					 
			$crud->fields('nama_mhs','nim_mhs','tempat_lahir','tanggal_lahir','alamat_asal','alamat_sekarang',
						  'telp','email','dosen_wali','kelas_mhs','jurusan','fakultas') 
				 ->required_fields('fakultas','jurusan','dosen_wali','kelas_mhs','nama_mhs');
				 
		    $output = $crud->render();
		    $this->groceryOutput($output); 
			}//End if filter user
			else{
				//Jika bukan user admin
	     		redirect('controllerAuthorized/userPage', 'refresh');
			}
	   }
	   else{
	     //If no session, redirect to login page
	     redirect('controllerLogin', 'refresh');
	   }
	 }
	 
	 
	 public function dataKelas(){
	   if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
		 	/*$data['username'] = $session_data['username'];
		     $this->load->view('viewAuthorized', $data);*/
			
			/* ## Filter user menggunakan username */
			if($session_data['username']=='admin'){

		 	$crud = new grocery_CRUD();
			/*$crud->set_theme('datatables');*/
			$crud->set_table('tbl_kelas');
			$crud->set_subject('Data Kelas');
			$crud->unset_columns('id_kelas');
				 			
				//DATA PENAMAAN ALIAS TABLE
		   	$crud->display_as('nama_kelas','Deskripsi Kelas')
				 ->display_as('kode_kelas','Kode Kelas')
				 ->display_as('dosen_wali','Dosen Wali')
				 ->display_as('jurusan','Jurusan')
				 ->display_as('fakultas','Fakultas');
			
			$crud->set_relation('dosen_wali','tbl_dosen','nama_dosen')
				 ->set_relation('jurusan','tbl_jurusan','{nama_jur} -- {tingkatan}')
				 ->set_relation('fakultas','tbl_fakultas','nama_fakultas');
								 
			$crud->fields('nama_kelas','kode_kelas','dosen_wali','fakultas','jurusan') 
				 ->required_fields('nama_kelas','kode_kelas','dosen_wali','fakultas','jurusan');
				 
		    $output = $crud->render();
		    $this->groceryOutput($output); 
			}//End if filter user
			else{
				//Jika bukan user admin
	     		redirect('controllerAuthorized/userPage', 'refresh');
			}
	   }
	   else{
	     //If no session, redirect to login page
	     redirect('controllerLogin', 'refresh');
	   }
	 }
	
	 
	 public function dataDosen(){
	   if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
		 	/*$data['username'] = $session_data['username'];
		     $this->load->view('viewAuthorized', $data);*/
			
			/* ## Filter user menggunakan username */
			if($session_data['username']=='admin'){

		 	$crud = new grocery_CRUD();
			/*$crud->set_theme('datatables');*/
			$crud->set_table('tbl_dosen');
			$crud->set_subject('Data Dosen');
			$crud->unset_columns('id_dosen');
				 			
				//DATA PENAMAAN ALIAS TABLE
		   	$crud->display_as('nama_dosen','Nama Dosen')
				 ->display_as('nip_dosen','NIP Dosen')
				 ->display_as('jurusan','Jurusan');
			
			$crud->set_relation('jurusan','tbl_jurusan','{nama_jur} -- {tingkatan}');
								 
			$crud->fields('nama_dosen','nip_dosen','jurusan') 
				 ->required_fields('nama_dosen','nip_dosen','jurusan');
				 
		    $output = $crud->render();
		    $this->groceryOutput($output); 
			}//End if filter user
			else{
				//Jika bukan user admin
	     		redirect('controllerAuthorized/userPage', 'refresh');
			}
	   }
	   else{
	     //If no session, redirect to login page
	     redirect('controllerLogin', 'refresh');
	   }
	 }
	 
	 
	 public function dataJurusan(){
	   if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
		 	/*$data['username'] = $session_data['username'];
		     $this->load->view('viewAuthorized', $data);*/
			
			/* ## Filter user menggunakan username */
			if($session_data['username']=='admin'){

		 	$crud = new grocery_CRUD();
			/*$crud->set_theme('datatables');*/
			$crud->set_table('tbl_jurusan');
			$crud->set_subject('Data Jurusan');
			$crud->unset_columns('id_jur');
				 			
				//DATA PENAMAAN ALIAS TABLE
		   	$crud->display_as('nama_jur','Jurusan')
				 ->display_as('kode_jur','Kode Jurusan')
				 ->display_as('tingkatan','Tingkatan')
				 ->display_as('fakultas','Fakultas');
				 
			$crud->set_relation('fakultas','tbl_fakultas','nama_fakultas');
								 
			$crud->fields('nama_jur','kode_jur','tingkatan','fakultas') 
				 ->required_fields('nama_jur','kode_jur','tingkatan','fakultas');
				 
		    $output = $crud->render();
		    $this->groceryOutput($output); 
			}//End if filter user
			else{
				//Jika bukan user admin
	     		redirect('controllerAuthorized/userPage', 'refresh');
			}
	   }
	   else{
	     //If no session, redirect to login page
	     redirect('controllerLogin', 'refresh');
	   }
	 }
	 
	 
	 public function dataFakultas(){
	   if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
		 	/*$data['username'] = $session_data['username'];
		     $this->load->view('viewAuthorized', $data);*/
			
			/* ## Filter user menggunakan username */
			if($session_data['username']=='admin'){

		 	$crud = new grocery_CRUD();
			$crud->set_table('tbl_fakultas');
			$crud->set_subject('Data Fakultas');
			$crud->columns('id_fak','nama_fakultas');
				 			
				//DATA PENAMAAN ALIAS TABLE
		   	$crud->display_as('id_fak','Nomor')
				 ->display_as('nama_fakultas','Fakultas');
								 
			$crud->fields('nama_fakultas') 
				 ->required_fields('nama_fakultas');
				 
		    $output = $crud->render();
		    $this->groceryOutput($output); 
			}//End if filter user
			else{
				//Jika bukan user admin
	     		redirect('controllerAuthorized/userPage', 'refresh');
			}
	   }
	   else{
	     //If no session, redirect to login page
	     redirect('controllerLogin', 'refresh');
	   }
	 }
	 
	 
	 public function userPage(){
	   if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
		 	/*$data['username'] = $session_data['username'];
		     $this->load->view('viewAuthorized', $data);*/
			
			/* ## Filter user menggunakan username */
			if($session_data['username']=='user'){

		 	$crud = new grocery_CRUD();
			/*$crud->set_theme('datatables');*/
			$crud->set_table('tbl_mhs');
			$crud->set_subject('Data Mahasiswa');
			$crud->unset_columns('id_mhs');
			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_print();
			$crud->unset_export();
				 			
				//DATA PENAMAAN ALIAS TABLE
		   	$crud->display_as('nama_mhs','Nama')
				 ->display_as('nim_mhs','NIM')
				 ->display_as('tempat_lahir','Tempat Lahir')
				 ->display_as('tanggal_lahir','Tanggal Lahir')
				 ->display_as('alamat_asal','Alamat Asal')
				 ->display_as('alamat_sekarang','Alamat Sekarang')
				 ->display_as('telp','Telp/HP')
				 ->display_as('email','Email')
				 ->display_as('kelas_mhs','Kelas')
				 ->display_as('dosen_wali','Dosen Wali')
				 ->display_as('jurusan','Jurusan')
				 ->display_as('fakultas','Fakultas');
			
			$crud->set_relation('kelas_mhs','tbl_kelas','nama_kelas')
				 ->set_relation('dosen_wali','tbl_dosen','nama_dosen')
				 ->set_relation('jurusan','tbl_jurusan','{nama_jur} -- {tingkatan}')
				 ->set_relation('fakultas','tbl_fakultas','nama_fakultas');
				 					 
			$crud->fields('nama_mhs','nim_mhs','tempat_lahir','tanggal_lahir','alamat_asal','alamat_sekarang',
						  'telp','email','dosen_wali','kelas_mhs','jurusan','fakultas') 
				 ->required_fields('fakultas','jurusan','dosen_wali','kelas_mhs','nama_mhs');
				 
		    $output = $crud->render();
		    $this->groceryOutputUser($output); 
			}//End if filter user
			else{
				//Jika bukan user admin
	     		redirect('controllerAuthorized/noPrivilege', 'refresh');
			}
	   }
	   else{
	     //If no session, redirect to login page
	     redirect('controllerLogin', 'refresh');
	   }
	 }


	public function logout(){
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('controllerAuthorized', 'refresh');
 	}
 
	function groceryOutput($output = null){
        $this->load->view('viewAuthorized.php',$output);    
    }
	
	function groceryOutputUser($output = null){
        $this->load->view('viewUser.php',$output);    
    }
}

?>
