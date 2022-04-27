<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Caps_model extends CI_Model
{
    public function timeStamp()
    {
        date_default_timezone_set('Asia/Jakarta');
        $funct = time();
        $time = "%Y-%m-%d %H:%i:%s";
        return  mdate($time, $funct);
    }

    public function caps()
    {
        return $this->db->get('cap')->result_array();
    }

    public function cap($id_cap)
    {
        return $this->db->get_where('cap', ['id_cap' => $id_cap])->row_array();
    }

    public function cap_in_out($order, $tbl)
    {
        $this->db->order_by($order, 'DESC');
        $this->db->limit(5);
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->join('cap', 'cap.id_cap = ' . $tbl . '.id_cap', 'left');
        return $this->db->get()->result_array();
    }

    public function save($id_cap)
    {
        $data = [
            'nama_cap' => $this->input->post('nama_cap', true),
            'warna' =>  $this->input->post('warna', true),
            'stok_awal_terbaru' => $this->input->post('stok_awal_terbaru', true),
            'update_stok_awal' => $this->timeStamp()
        ];
        if ($id_cap == 0) {
            $this->db->insert('cap', $data);
        } else {
            $this->db->where('id_cap', $id_cap);
            $this->db->update('cap', $data);
        }
    }

    public function tbl_in_out($id_cap, $in_out, $tbl)
    {
        $this->db->order_by($in_out, 'DESC');
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->where('id_cap', $id_cap);
        return $this->db->get()->result_array();
    }

    public function save_in_out($id_cap, $method, $id_order)
    {
        if ($method == 'cap_masuk') {
            $total = $this->input->post('stok_awal') + $this->input->post('cap_masuk');
            $cap_in_out = [
                'id_cap' => $id_cap,
                'stok_awal' => $this->input->post('stok_awal', true),
                'real_stock' => $this->input->post('real_stock', true),
                $method => $this->input->post($method, true),
                'total' => $total,
                'catatan' => $this->input->post('catatan')
            ];
            $this->db->insert($method, $cap_in_out);

            $cap = [
                'stok_awal_terbaru' => $total,
                'update_stok_awal' => $this->timeStamp()
            ];
            $this->db->where('id_cap', $id_cap);
            $this->db->update('cap', $cap);
        } else {
            $total = $this->input->post('stok_awal') - $this->input->post('cap_keluar');
            $real_stock = $this->input->post('real_stock') - $this->input->post('cap_keluar');
            $cap_in_out = [
                'id_cap' => $id_cap,
                'id_order' => $id_order,
                'stok_awal' => $this->input->post('stok_awal', true),
                'real_stock' => $real_stock,
                $method => $this->input->post($method, true),
                'total' => $total,
                'catatan' => $this->input->post('catatan')
            ];
            $this->db->insert($method, $cap_in_out);

            $order = [
                'status' => 'Selesai'
            ];
            $this->db->where('id_order', $id_order);
            $this->db->update('order', $order);

            $cap = [
                'stok_awal_terbaru' => $total,
                'real_stock_terbaru' => $real_stock,
                'update_stok_awal' => $this->timeStamp()
            ];
            $this->db->where('id_cap', $id_cap);
            $this->db->update('cap', $cap);
        }
    }

    public function save_out($id_cap)
    {
        $total = $this->input->post('stok_awal') - $this->input->post('cap_keluar');
        $cap_in = [
            'id_cap' => $id_cap,
            'stok_awal' => $this->input->post('stok_awal', true),
            'real_stock' => $this->input->post('real_stock', true),
            'cap_keluar' => $this->input->post('cap_keluar', true),
            'total' => $total,
            'catatan' => $this->input->post('catatan')
        ];
        $this->db->insert('cap_keluar', $cap_in);

        $cap = [
            'stok_awal_terbaru' => $total,
            'update_stok_awal' => $this->timeStamp()
        ];
        $this->db->where('id_cap', $id_cap);
        $this->db->update('cap', $cap);
    }

    public function real_stock($id_cap)
    {
        $cap = [
            'real_stock_terbaru' => $this->input->post('real_stock_terbaru', true),
            'update_real_stock' => $this->timeStamp()
        ];
        $this->db->where('id_cap', $id_cap);
        $this->db->update('cap', $cap);
    }
}
