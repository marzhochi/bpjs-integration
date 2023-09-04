<?php
namespace Marzhochi\Bpjs\Antrean;

use Marzhochi\Bpjs\BpjsService;

class Antrean extends BpjsService
{
    private static $_instance;

    public function __construct($configuration)
    {
        parent::__construct($configuration);
    }

    public static function getInstance($configuration)
    {
        if (isset(self::$_instance))
            return self::$_instance;

        self::$_instance = new Antrean($configuration);

        return self::$_instance;
    }

    public function getListTask($data = [])
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->post('antrean/getlisttask',$data);

        return json_decode($response,true);
    }
    public function addAntrean($data = [])
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->post('antrean/add', $data, $header);
        return json_decode($response,true);
    }
    public function addAntreanFarmasi($data = [])
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->post('antrean/farmasi/add', $data, $header);
        return json_decode($response,true);
    }
    public function cancelAntrean($data = [])
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->post('antrean/batal', $data, $header);
        return json_decode($response,true);
    }
    public function updateWaktu($data = [])
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->post('antrean/updatewaktu', $data, $header);
        return json_decode($response,true);
    }
    public function dashboardMonthly($month = null, $year = null,$time = null)
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->get('dashboard/waktutunggu/bulan/'.$month.'/tahun/'.$year.'/waktu/'.$time);

        return json_decode($response,true);
    }

    public function dashboardDaily($date = null,$time = null)
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->get('dashboard/waktutunggu/tanggal/'.$date.'/waktu/'.$time);

        return json_decode($response,true);
    }
    public function fingerValidation($param = null,$keyword = null)
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->get('ref/pasien/fp/identitas/'.$param.'/noidentitas/'.$keyword);

        return json_decode($response,true);
    }
}
