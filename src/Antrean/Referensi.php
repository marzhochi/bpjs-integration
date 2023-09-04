<?php
namespace Marzhochi\Bpjs\Antrean;

use Marzhochi\Bpjs\BpjsService;

class Referensi extends BpjsService
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

        self::$_instance = new Referensi($configuration);

        return self::$_instance;
    }

    public function referensiPoli()
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->get('ref/poli');
        
        return json_decode($response,true);
    }
    public function referensiDokter()
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->get('ref/dokter');
        
        return json_decode($response,true);
    }
    public function referensiPoliFinger()
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->get('ref/poli/fp');
        
        return json_decode($response,true);
    }
   
}