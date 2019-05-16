<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ongkir_m
 *
 * @author windows8.1
 */
class Ongkir_m extends CI_Model {

    //put your code here
    function provinsi_m() {
        $dc = $this->rajaongkir->province();
        $d = json_decode($dc, TRUE);
        $data = $d['rajaongkir']['results'];
        return $data;
    }

    function kota_m($id) {
        $dc = $this->rajaongkir->city($id);
        $d = json_decode($dc, TRUE);
        $data = $d['rajaongkir']['results'];
        return $data;
    }
   function ongkos_db($id, $w, $kota_sell, $k) {
        $dc = $this->rajaongkir->cost($kota_sell, $id, $w, $k);
        $d = json_decode($dc, TRUE);
        $result = $d['rajaongkir']['results'];
        return $result;
    }
}
