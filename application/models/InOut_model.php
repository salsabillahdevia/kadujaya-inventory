<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InOut_model extends CI_Model
{
    public function keluar($id_cap, $id_order)
    {
        $this->db->where('id_cap', $id_cap);
        $this->db->where('id_order', $id_order);
        return $this->db->get('cap_keluar')->row_array();
    }
}
