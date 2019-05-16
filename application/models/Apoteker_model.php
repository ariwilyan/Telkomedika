<?php
class Apoteker_model extends CI_Model
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
        $que = $this->db->get("apoteker");
        return $que->num_rows();
    }

    public function read($username, $password){
        $query = $this->db->query("SELECT * FROM apoteker WHERE username = '$username' AND password='$password'");
        if ($query->num_rows() != 0){
            return $query->row();
        }else{
            return array();
        }
    }

    public function tambahObat()
    {
        $config['upload_path']          =  './assets/gambar/'; //isi dengan nama folder tempat menyimpan gambar
        $config['allowed_types']        =  'gif|jpg|png|jpeg'; //isi dengan format/tipe gambar yang diterima
        
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto'))
        {
            $data=[
                "nama_obat" => $this->input->post('nama',true),
                "jenis_obat" => $this->input->post('jenis', true),
                "harga_obat" => $this->input->post('harga',true),
                "stok_obat" => $this->input->post('stok', true)
            ];
            $this->db->insert('obat',$data);
        }
        else
        {
            $data=[
                "nama_obat" => $this->input->post('nama',true),
                "jenis_obat" => $this->input->post('jenis', true),
                "gambar_obat" => $this->upload->data('file_name'),
                "harga_obat" => $this->input->post('harga',true),
                "stok_obat" => $this->input->post('stok', true)
            ];
            $this->db->insert('obat',$data);
        }
        redirect('apoteker/cekDaftarObat');
    }

    public function GetAllItem(){
        $data_obat = $this->db->get('obat');
        return $data_obat->result_array();
    }

    public function GetItemById($id_obat){
        $que = $this->db->query("SELECT * FROM obat WHERE id_obat = $id_obat");
        return $que->result_array();
    }

    public function ubahObat($id)
    {
        $config['upload_path']          =  './assets/gambar/'; //isi dengan nama folder tempat menyimpan gambar
        $config['allowed_types']        =  'gif|jpg|png|jpeg'; //isi dengan format/tipe gambar yang diterima
        
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto'))
        {
            $data=[
                "nama_obat" => $this->input->post('nama',true),
                "jenis_obat" => $this->input->post('jenis', true),
                "harga_obat" => $this->input->post('harga',true),
                "stok_obat" => $this->input->post('stok', true)
            ];
            $this->db->where('id_obat',$id);
            $this->db->update('obat',$data);
        }
        else
        {
            $data=[
                "nama_obat" => $this->input->post('nama',true),
                "jenis_obat" => $this->input->post('jenis', true),
                "gambar_obat" => $this->upload->data('file_name'),
                "harga_obat" => $this->input->post('harga',true),
                "stok_obat" => $this->input->post('stok', true)
            ];
            $this->db->where('id_obat',$id);
            $this->db->update('obat',$data);
            if ($this->input->post('foto_lama')!="default_gambar.png") {
                unlink('assets/gambar/'.$this->input->post('foto_lama'));    
            }
        }
        redirect('apoteker/cekDaftarObat');
    }

    public function hapusObat($id,$file){
        $this->db->where('id_obat',$id);
        $this->db->delete('obat');
        if ($file != "default_gambar.png"){
            unlink('assets/gambar/'.$file);
        }
    }
}
?>