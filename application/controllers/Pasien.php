<?php

class Pasien extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Pasien_model');
        $this->load->model('Dokter_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    
    // public function index(){
    //     $this->load->view('templates/header_index.php');
    //     $this->load->view('index.php');
    //     $this->load->view('templates/footer_index.php');
    // }
    
    public $data = array(
        "nama_pasien" => "Ari Wilyan",
    );

    public function landing_pasien(){
        $data['title'] = "Telkomedika - Masuk ke Pasien";
        $this->load->view('templates/header_login',$data);
        $this->load->view('login_pasien');
        $this->load->view('templates/footer_login');
    }

    public function home(){
        $data['title'] = 'Telkomedika - Beranda Pasien';
        $this->load->view('templates/header_home.php',$data);
        $this->load->view('home_pasien.php');
        $this->load->view('templates/footer_index.php');
    }

    public function login_pasien(){
        $cek = $this->Pasien_model->login_check();
        if ($cek > 0) {
            $login = [
                "username" => $this->input->post('username',true),
                // "email" => $this->input->post('email',true)
            ];
            $this->session->set_userdata("login", $login);
            redirect("pasien/home");
        } else {
            $this->session->set_flashdata('success', 'Username atau Password salah. Periksa kembali');
            redirect("pasien/landing_pasien");
        }
    }

    public function do_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->Pasien_model->read($username, $password);

        if (count($result) != 0){
            $sessionarray = array(
                "id_pasien" => $result->id_pasien,
                "nama_pasien" => $result->nama_pasien,
                "birthday" => $result->birthday,
                "email" => $result->email,
                "username" => $result->username,
                "password" => $result->password,
                "alamat" => $result->alamat,
                "no_telepon" => $result->no_telepon,
                "jenis_kelamin" => $result->jenis_kelamin
            );
            $this->session->set_userdata('datauser', $sessionarray);
            redirect("pasien/home");
        }else{
            $this->session->set_flashdata('success', "Username atau Password salah!");
            redirect("pasien/landing_pasien");
        }
    }

    public function register_pasien(){
        $this->form_validation->set_rules('nama_pasien','Nama Lengkap', 'required');
        $this->form_validation->set_rules('email_pasien','Email', 'required');
        $this->form_validation->set_rules('username_pasien','Username', 'required');
        $this->form_validation->set_rules('password_pasien','Password', 'required');
        $this->form_validation->set_rules('alamat_pasien','Alamat', 'required');
        $this->form_validation->set_rules('notelepon_pasien','No Telepon', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['title'] = "Telkomedika - Registrasi Pasien";
            $this->load->view('templates/header_login',$data);
            $this->load->view('register_pasien');
            $this->load->view('templates/footer_login');
            $this->session->set_flashdata('flashregister', 'Tolong isi semua komponen registrasi. Terima kasih');
        } else {
            $e = $this->Pasien_model->cekUsername($this->input->post('username_pasien', true));
            $f = $this->Pasien_model->cekEmail($this->input->post('email_pasien', true));
            if ($e > 0 or $f > 0) {
                $this->session->set_flashdata('flashregister', 'Email atau Username sudah terdaftar, silahkan login');
                redirect('pasien/register_pasien');
            }
            // $login = [
            //     "username" => $this->input->post('username_pasien',true),
            //     "email" => $this->input->post('email_pasien',true),
            //     "password" => $this->input->post('password_pasien',true)
            // ];
            // $this->session->set_userdata('login', $login);
            $this->session->set_flashdata('newregister', 'Pasien baru Ditambahkan');
            $this->Pasien_model->tambahPasien();
            redirect('pasien/landing_pasien');
        }
    }

    public function LihatJadwalPraktekDokter(){
        $data['title'] = 'Telkomedika - Jadwal Praktek Dokter';
        $data_dokter = $this->Dokter_model->GetAllDokter();
        $this->load->view('templates/header_home',$data);
        // $this->load->view('lihat_jadwal_pasien', $data_dokter);
        $this->load->view('lihat_jadwal_pasien',['data'=>$data_dokter]);
        $this->load->view('templates/footer_home.php');
    }

    public function PilihJadwalPeriksa(){
        $data['title'] = 'Telkomedika - Pilih Jadwal Periksa';
        $data_dokter = $this->Dokter_model->GetAllDokter();
        $this->load->view('templates/header_home',$data);
        $this->load->view('jadwal_pasien',['data'=>$data_dokter]);
        $this->load->view('templates/footer_index.php');
    }

    public function tambahJadwalPeriksa(){
        $this->form_validation->set_rules("nama","Nama Pasien","required");
        $this->form_validation->set_rules("dokter","Pilih Dokter","required");
        $this->form_validation->set_rules("tgl","Tanggal Periksa","required");
        $this->form_validation->set_rules("keluhan_pasien","Keluhan","required");

        // $id_pasien = $this->session->datauser['id_pasien'];
        // $id_dokter = $this->db->get_where('dokter',['id_dokter' => $this->input->post('dokter')])->row();

        if($this->form_validation->run()){
            $this->Pasien_model->jadwalPeriksa();
            $this->session->set_flashdata('success', "Ditambahkan");
            redirect('pasien/home');
        }
        redirect('pasien/PilihJadwalPeriksa');
    }

    public function logout(){
        $this->session->unset_userdata('datauser');
        $this->session->sess_destroy();
        redirect('index/utama');
    }
}
