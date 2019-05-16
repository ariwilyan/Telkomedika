<?php

class Apoteker extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Apoteker_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    
    // public function index(){
    //     $this->load->view('templates/header_index.php');
    //     $this->load->view('index.php');
    //     $this->load->view('templates/footer_index.php');
    // }
	
    public function landing_apoteker(){
        $data['title'] = "Telkomedika - Masuk ke Apoteker";
        $this->load->view('templates/header_login',$data);
        $this->load->view('login_apoteker');
        $this->load->view('templates/footer_login');
    }

    public function home(){
        $data['title'] = "Telkomedika - Beranda Apoteker";
        $this->load->view('templates/header_apoteker.php',$data);
        $this->load->view('home_apoteker.php');
        $this->load->view('templates/footer_home');
    }

    public function login_apoteker(){
        $cek = $this->Apoteker_model->login_check();
        if ($cek > 0) {
            $login = [
                "username" => $this->input->post('username',true)
                // "email" => $this->input->post('email',true)
            ];
            $this->session->set_userdata("login", $login);
            redirect("apoteker/home");
        } else {
            $this->session->set_flashdata('success', 'Username atau Password salah. Periksa kembali');
            redirect("apoteker/landing_apoteker");
        }
    }

    public function do_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->Apoteker_model->read($username, $password);

        if (count($result) != 0){
            $sessionarray = array(
                "id_apoteker" => $result->id_apoteker,
                "nama_apoteker" => $result->nama_apoteker,
                "jenis_kelamin" => $result->jenis_kelamin,
                "username" => $result->username,
                "password" => $result->password
            );
            $this->session->set_userdata('datauser', $sessionarray);
            redirect("apoteker/home");
        }else{
            $this->session->set_flashdata('success', "Username atau Password salah!");
            redirect("apoteker/landing_apoteker");
        }
    }

    public function cekDaftarObat(){
        $data['title'] = 'Telkomedika - Daftar Obat';
        $data_obat = $this->Apoteker_model->GetAllItem();
        $this->load->view('templates/header_apoteker', $data);
        $this->load->view('lihat_obat',['data' => $data_obat]);
        $this->load->view('templates/footer_index');
    }

    public function do_upload()
    {

        $config['upload_path']          =  './assets/gambar/'; //isi dengan nama folder tempat menyimpan gambar
        $config['allowed_types']        =  'gif|jpg|png'; //isi dengan format/tipe gambar yang diterima

        $this->load->library('upload', $config);

        //lengkapi kondisi berikut
        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('V_Upload_form', $error);        
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('V_Upload_success', $data);
        }
    }

    public function tambahObat()
	{
        $data['title'] = "Form Tambah Data Obat";

        $this->form_validation->set_rules("nama","Nama Obat","required");
        $this->form_validation->set_rules("jenis","Jenis Obat","required");
        $this->form_validation->set_rules("foto","Gambar Obat");
        $this->form_validation->set_rules("harga","Harga Obat","required");
        $this->form_validation->set_rules("stok","Stok Obat","required");

        if ($this->form_validation->run()){
            $this->session->set_flashdata('berhasil', 'Ditambahkan');
            $this->Apoteker_model->tambahObat();
            redirect('apoteker/cekDaftarObat');
        }
        else{
            $data_obat['data'] = $this->Apoteker_model->GetAllItem();
            $this->load->view('templates/header_apoteker',$data);
            $this->load->view('tambah_obat',$data_obat);
            $this->load->view('templates/footer_index');
        }
    }

    public function ubahObat($id){
        $data['title'] = "Form Ubah Data Obat";
        $this->form_validation->set_rules("nama","Nama Obat","required");
        $this->form_validation->set_rules("jenis","Jenis Obat","required");
        $this->form_validation->set_rules("foto","Gambar Obat");
        $this->form_validation->set_rules("harga","Harga Obat","required");
        $this->form_validation->set_rules("stok","Stok Obat","required");

        $data['item'] = $this->Apoteker_model->getItemById($id);
        if ($this->form_validation->run()){
            $this->session->set_flashdata('berhasil', 'Diubah');
            $this->Apoteker_model->ubahObat($this->input->post('id',true));
            redirect('apoteker/cekDaftarObat');
        }
        else{
            // $data['obat'] = $this->Apoteker_model->GetAllItem();
            $this->load->view('templates/header_apoteker',$data);
            $this->load->view('ubah_obat',$data);
            $this->load->view('templates/footer_index');
        }
    }

    public function hapusObat($id){
        $this->Apoteker_model->hapusObat($id, $this->input->get('foto',true));
        $this->session->set_flashdata('hapus', 'Dihapus');
        redirect('apoteker/cekDaftarObat');
    }

    public function logout(){
        $this->session->unset_userdata('datauser');
        $this->session->sess_destroy();
        redirect('index/utama');
    }
}