<?php

class Dokter extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Dokter_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    
    // public function index(){
    //     $this->load->view('templates/header_index.php');
    //     $this->load->view('index.php');
    //     $this->load->view('templates/footer_index.php');
    // }
	
    public function landing_dokter(){
        $data['title'] = "Telkomedika - Masuk ke Dokter";
        $this->load->view('templates/header_login',$data);
        $this->load->view('login_dokter');
        $this->load->view('templates/footer_login');
    }

    public function home(){
        $data['title'] = "Telkomedika - Beranda Dokter";
        $this->load->view('templates/header_dokter.php',$data);
        $this->load->view('home_dokter.php');
        $this->load->view('templates/footer_home');
    }

    public function login_dokter(){
        $cek = $this->Dokter_model->login_check();
        if ($cek > 0) {
            $login = [
                "username" => $this->input->post('username',true)
                // "email" => $this->input->post('email',true)
            ];
            $this->session->set_userdata("login", $login);
            redirect("dokter/home");
        } else {
            $this->session->set_flashdata('success', 'Username atau Password salah. Periksa kembali');
            redirect("dokter/landing_dokter");
        }
    }

    public function do_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->Dokter_model->read($username, $password);

        if (count($result) != 0){
            $sessionarray = array(
                "id_dokter" => $result->id_dokter,
                "nama_dokter" => $result->nama_dokter,
                "username" => $result->username,
                "password" => $result->password,
                "jadwal_awal" => $result->jadwal_awal,
                "jadwal_akhir" => $result->jadwal_akhir,
            );
            $this->session->set_userdata('datauser', $sessionarray);
            redirect("dokter/home");
        }else{
            $this->session->set_flashdata('success', "Username atau Password salah!");
            redirect("dokter/landing_dokter");
        }
    }

    public function CekJadwalPraktek(){
        $data['title'] = 'Telkomedika - Jadwal Praktek';
        $username = $this->session->datauser['username'];
        $data_dokter['data'] = $this->Dokter_model->GetDokterByUsername($username);
        $this->load->view('templates/header_dokter',$data);
        $this->load->view('jadwal_dokter',$data_dokter);
        $this->load->view('templates/footer_home.php');
    }

    public function ubahJadwal(){
        $data['title'] = 'Form Ubah Jadwal Praktek';

        $id = $this->session->datauser['id_dokter'];
        if(!isset($id)) redirect('dokter/home');
        $this->form_validation->set_rules("jadwal_awal","Jadwal Praktek Awal","required");
        $this->form_validation->set_rules("jadwal_akhir","Jadwal Praktek Akhir","required");

        $data['dokter'] = $this->Dokter_model->GetDokterById($id);
        if ($this->form_validation->run()){
            $this->Dokter_model->ubahJadwalPraktek($id);
            $this->session->set_flashdata('success', 'Diubah');
            redirect('dokter/CekJadwalPraktek');
        }else{
            $this->load->view('templates/header_dokter',$data);
            $this->load->view('ubah_jadwal',$data);
            $this->load->view('templates/footer_home');
        }
    }

    public function logout(){
        $this->session->unset_userdata('datauser');
        $this->session->sess_destroy();
        redirect('index/utama');
    }
}
