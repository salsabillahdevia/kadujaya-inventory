<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Export_model extends CI_Model
{
    public function export()
    {
        $data = $this->input->post('data');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        if ($data == 'masuk') {
            if ($bulan == "all") {
                $query = "SELECT warna,nama_cap, tgl_masuk,stok_awal,cap_masuk,total,real_stock,catatan 
                FROM cap_masuk 
                LEFT JOIN cap on cap_masuk.id_cap =cap.id_cap
				WHERE year(tgl_masuk) = $tahun";
                $masuk = $this->db->query($query)->result_array();
                $bulan = "Januari-Desember";
            } else {
                $query = "SELECT warna,nama_cap, tgl_masuk,stok_awal,cap_masuk,total,real_stock,catatan 
                FROM cap_masuk 
                LEFT JOIN cap on cap_masuk.id_cap =cap.id_cap 
				WHERE year(tgl_masuk) = $tahun
				AND month(tgl_masuk) = $bulan";
                $masuk = $this->db->query($query)->result_array();
            }
            // file name 
            $filename = 'Data Cap Masuk Bulan ' . $bulan . ' ' . $tahun . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // file creation 
            $file = fopen('php://output', 'w');
            $header = array("WARNA", "JENIS CAP", "TANGAL CAP MASUK", "STOK AWAL", "JUMLAH CAP MASUK", "TOTAL CAP", "REAL STOCK", "CATATAN");
            fputcsv($file, $header);
            foreach ($masuk as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit;
        } elseif ($data == 'keluar') {
            if ($bulan == "all") {
                $query = "SELECT warna,nama_cap, tgl_keluar,stok_awal,cap_keluar,total,real_stock,catatan 
                FROM cap_keluar
                LEFT JOIN cap on cap_keluar.id_cap =cap.id_cap
				WHERE year(tgl_keluar) = $tahun";
                $keluar = $this->db->query($query)->result_array();
                $bulan = "Januari-Desember";
            } else {
                $query = "SELECT warna,nama_cap,tgl_keluar,stok_awal,cap_keluar,total,real_stock,catatan 
                FROM cap_keluar
                LEFT JOIN cap on cap_keluar.id_cap =cap.id_cap 
				WHERE year(tgl_keluar) = $tahun
				AND month(tgl_keluar) = $bulan";
                $keluar = $this->db->query($query)->result_array();
            }
            // file name 
            $filename = 'Data Cap Keluar Bulan ' . $bulan . ' ' . $tahun . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // file creation 
            $file = fopen('php://output', 'w');
            $header = array("WARNA", "JENIS CAP", "TANGAL CAP KELUAR", "STOK AWAL", "JUMLAH CAP KELUAR", "TOTAL CAP", "REAL STOCK", "CATATAN");
            fputcsv($file, $header);
            foreach ($keluar as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit;
        } elseif ($data == 'jenis') {

            $query = "SELECT warna,nama_cap,stok_awal_terbaru,real_stock_terbaru,update_stok_awal,update_real_stock
            FROM cap";
            $cap = $this->db->query($query)->result_array();

            // file name 
            $filename = 'Data Cap.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // file creation 
            $file = fopen('php://output', 'w');
            $header = array("WARNA", "JENIS CAP", "STOK AWAL", "REAL STOCK", "UPDATE STOK AWAL", "UPDATE REAL STOCK");
            fputcsv($file, $header);
            foreach ($cap as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit;
        } elseif ($data == 'order') {
            if ($bulan == "all") {
                $query = "SELECT warna,nama_cap,tgl_order,jumlah_order,stok_awal_terbaru,real_stock_terbaru 
                FROM `order`
                LEFT JOIN cap on `order`.id_cap =cap.id_cap
				WHERE year(tgl_order) = $tahun";
                $order = $this->db->query($query)->result_array();
                $bulan = "Januari-Desember";
            } else {
                $kode_input = $tahun . $bulan;
                $query = "SELECT warna,nama_cap,tgl_order,jumlah_order,stok_awal_terbaru,real_stock_terbaru 
                FROM `order` 
                LEFT JOIN cap on `order`.id_cap =cap.id_cap 
				WHERE year(tgl_order) = $tahun
				AND month(tgl_order) = $bulan";
                $order = $this->db->query($query)->result_array();
            }
            // file name 
            $filename = 'Data Order Cap Bulan ' . $bulan . ' ' . $tahun . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // file creation 
            $file = fopen('php://output', 'w');
            $header = array("WARNA", "JENIS CAP", "TANGAL ORDER", "JUMLAH ORDER", "STOK AWAL", "REAL STOCK");
            fputcsv($file, $header);
            foreach ($order as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit;
        } else {
            $this->session->set_flashdata('gagal', 'gagal');
            redirect('export');
        }
    }
}
