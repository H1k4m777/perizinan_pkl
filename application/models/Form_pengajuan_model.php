<?php
class Form_pengajuan_model extends CI_Model
{
    public function tambah_data($data)
    {
        $this->db->insert('form_pengajuan', $data);
    }
}
