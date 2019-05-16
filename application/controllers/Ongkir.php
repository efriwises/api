<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ongkir
 *
 * @author windows8.1
 */
class Ongkir extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->library('rajaongkir');
    }

    function kota($id) {
        $city = $this->Ongkir_m->kota_m($id);
        $data = "<option value=''> --- Please Select --- </option>";
        foreach ($city as $pro) {
            $data .= "<option value='" . $pro['city_id'] . "' data-city='"
                    . $pro['city_name'] . "'>"
                    . $pro['city_name'] . "</option>";
        }
        echo $data;
    }

    function ongkos($id) {
        $berat = 1000;
        $kota_asal = 501; //jogja
        $kurir = 'jne';

        $costs = $this->Ongkir_m->ongkos_db($id, $berat, $kota_asal, $kurir);
        $data = '<option value="">--Pilih Ongkos Kirim--</option>';
        foreach ($costs as $cost) {
            foreach ($cost['costs'] as $r) {
                foreach ($r['cost'] as $c) {
                    $data .= "<option value='" . $c['value'] . "' 
                        data-etd='" . $c['etd'] . "'
                        data-service='" . $cost['name'] . " " . $r['service'] . "'>"
                            . $this->Etc->rp($c['value']) . " "
                            . $cost['name'] . $r['service'] . "
                            (Estimasi Pengiriman " . $c['etd'] . " hari)
                        </option>";
                }
            }
        }
        echo $data;
    }

}
