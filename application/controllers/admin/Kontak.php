<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
        $this->load->helper(array('form', 'url'));
		$this->load->library('upload');
		$role = $this->session->userdata('role');
		if ($role != 'Administrator') {
			echo "<script> alert('Anda tidak mempunyai akses untuk membuka halaman ini !') ; window.location.href='../admin'; </script>";
		}
	}	

	// List all your items
	public function index( $offset = 0 )
	{
		$data['k'] = $this->db->get('tb_kontak')->row_array();
		$this->load->view('admin/v_kontak',$data);
	}


	//Update one item
	public function update()
	{	
		$foto       = $_FILES['file']['name'];
		$data = [
             	'alamat'	=> $this->input->post('alamat'),
            	'email'		=> $this->input->post('email'),  
            	'nomer'		=> $this->input->post('nomer'),
        ];
        $config['allowed_types'] = 'jpg|png|gif|jfif';
        $config['max_size'] = '4096';
        $config['upload_path'] = './uploads/images/';
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $gambarLama = $this->input->post('file_old');
            if ($gambarLama != 'default.jpg') {
                unlink(FCPATH . '/uploads/images/' . $gambarLama);
            }
            $gambarBaru = $this->upload->data('file_name');
            $this->db->set('file', $gambarBaru);
        } else {
            // echo $this->upload->display_errors();
        }
        $this->db->where('id',1);
        $this->db->update('tb_kontak',$data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success">Berhasil Memperbahrui Kontak !</div>');
        redirect(base_url('admin/kontak'));
       }

}

/* End of file Kontak.php */
/* Location: ./application/controllers/admin/Kontak.php */
