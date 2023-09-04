<?php
namespace Marzhochi\Bpjs\Antrean;

use Marzhochi\Bpjs\BpjsService;

class Jadwaldokter extends BpjsService
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

        self::$_instance = new Jadwaldokter($configuration);

        return self::$_instance;
    }

    public function getJadwal($kd_poli = null, $tanggal = null)
    {
        $response = $this->get('jadwaldokter/kodepoli/'.$kd_poli.'/tanggal'.'/'.$tanggal);
        return json_decode($response,true);
    }
    public function update($data = [])
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->post('jadwaldokter/updatejadwaldokter', $data, $header);
        return json_decode($response,true);
    }
}