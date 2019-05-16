<?php
class Dokter_model extends CI_Model
{
    public function login_check()
    {
        $data = [
            "username" => $this->input->post('username',true),
            // "email" => $this->input->post('email',true),
            "password" => $this->input->post('password', true)
        ];
        $this->db->where('username', $data["username"]);
        // $this->db->where('email', $data["email"]);
        $this->db->where('password', $data["password"]);
        $que = $this->db->get("dokter");
        return $que->num_rows();
    }

    public function read($username, $password){
        $query = $this->db->query("SELECT * FROM dokter WHERE username = '$username' AND password='$password'");
        if ($query->num_rows() != 0){
            return $query->row();
        }else{
            return array();
        }
    }

    public function GetAllDokter(){
        $data = $this->db->get('dokter');
        return $data->result_array();
    }

    public function GetDokterById($id){
        $this->db->select('nama_dokter, username, jadwal_awal, jadwal_akhir');
        $this->db->from('dokter');
        $this->db->where('id_dokter', $id);
        return $this->db->get()->result_array();
    }

    public function GetDokterByUsername($username){
        $this->db->select('nama_dokter, jadwal_awal, jadwal_akhir');
        $this->db->from('dokter');
        $this->db->where('username', $username);
        return $this->db->get()->result_array();
    }

    public function ubahJadwalPraktek($id){
        $data = [
            "jadwal_awal" => $this->input->post('jadwal_awal',true),
            "jadwal_akhir" => $this->input->post('jadwal_akhir',true),
        ];
        $this->db->where('id_dokter', $id);
        $this->db->update('dokter', $data);
    }
}
?>