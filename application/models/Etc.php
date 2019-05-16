<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Etc
 *
 * @author lauwba
 */
class Etc extends CI_Model{
    //put your code here
    public function rp($angka) {
        $rupiah = number_format($angka, 0, ',', '.');
        return 'Rp ' . $rupiah;
    }
    public function rps($angka) {
        $rupiah = number_format($angka, 0, ',', '.');
        return $rupiah;
    }
    function data(){
        $query = $this->db->query("Select * from buyer where id_buyer='B-140818-1'");
        $data = $query->row();
        $buy = $data->nm_buyer;
        return $buy;
    }
    function bulan($tgl) {
        $bulan = substr($tgl, 5, 2);
        Switch ($bulan) {
            case 1 : $bulan = "Januari";
                Break;
            case 2 : $bulan = "Februari";
                Break;
            case 3 : $bulan = "Maret";
                Break;
            case 4 : $bulan = "April";
                Break;
            case 5 : $bulan = "Mei";
                Break;
            case 6 : $bulan = "Juni";
                Break;
            case 7 : $bulan = "Juli";
                Break;
            case 8 : $bulan = "Agustus";
                Break;
            case 9 : $bulan = "September";
                Break;
            case 10 : $bulan = "Oktober";
                Break;
            case 11 : $bulan = "November";
                Break;
            case 12 : $bulan = "Desember";
                Break;
        }
        return $bulan;
    }

    function tgl($tgl) {
        $hari = substr($tgl, 8, 2);
        $tahun = substr($tgl, 0, 4);
        $nama_bulan = $this->bulan($tgl);
        $tgl_oke = $hari . ' ' . $nama_bulan . ' ' . $tahun;
        return $tgl_oke;
    }
    function admin(){
        $query = $this->db->query("SELECT * FROM biaya where tipe='admin'");
        $data = $query->row();
        return $data->prosen;
    }
    
}
