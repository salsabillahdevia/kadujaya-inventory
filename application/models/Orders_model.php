<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders_model extends CI_Model
{
    public function timeStamp()
    {
        date_default_timezone_set('Asia/Jakarta');
        $funct = time();
        $time = "%Y-%m-%d %H:%i:%s";
        return  mdate($time, $funct);
    }

    public function order($id_order)
    {
        return $this->db->get_where('order', ['id_order' => $id_order])->row_array();
    }

    public function orderAll()
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('cap', 'cap.id_cap = order.id_cap', 'left');
        return $this->db->get()->result_array();
    }

    public function orders($where, $val)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('cap', 'cap.id_cap = order.id_cap', 'left');
        $this->db->where($where, $val);
        return $this->db->get()->result_array();
    }

    public function orderData()
    {
        $this->db->limit('20');
        $this->db->order_by('id_order', 'DESC');
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('cap', 'cap.id_cap = order.id_cap', 'left');
        return $this->db->get()->result_array();
    }

    // kalo ada id ordernya itu buat gudang update real stock
    public function order_cap($id_cap, $id_order)
    {
        if ($id_order == 0) {
            $data = [
                'id_cap' => $id_cap,
                'jumlah_order' =>  $this->input->post('jumlah_order', true),
                'catatan' => $this->input->post('catatan', true),
            ];
            $this->db->insert('order', $data);
        } else {
            $cap = [
                'real_stock_terbaru' => $this->input->post('real_stock_terbaru', true),
                'update_real_stock' =>  $this->timeStamp()
            ];
            $this->db->where('id_cap', $id_cap);
            $this->db->update('cap', $cap);

            $order = [
                'status' => $this->input->post('status', true),
            ];
            $this->db->where('id_order', $id_order);
            $this->db->update('order', $order);
        }
    }
    public function order_gudang($id_order, $id_cap)
    {
        $cap = [
            'real_stock_terbaru' => $this->input->post('real_stock_terbaru', true),
            'update_real_stock' => $this->timeStamp()
        ];
        $this->db->where('id_cap', $id_cap);
        $this->db->update('cap', $cap);

        $order = [
            'catatan' => $this->input->post('catatan', true),
            'status' => 'Diupdate'
        ];
        $this->db->where('id_order', $id_order);
        $this->db->update('order', $order);
    }
}
