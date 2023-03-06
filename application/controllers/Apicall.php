<?php

class Apicall extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $thirukural_data = $this->getThirukural();
        $this->load->view('apicall', array('thirukural_data' => $thirukural_data));
    }

    private function getThirukural()
    {
        $num = rand(1, 1330);
        $url = 'https://api-thirukkural.vercel.app/api?num=' . $num;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        $result = curl_exec($curl);
        $result = json_decode($result, true);
        $data['no'] = $result['number'];
        $data['paal'] = $result['sect_tam'];
        $data['tam_exp'] = $result['tam_exp'];
        $data['line1'] = $result['line1'];
        $data['line2'] = $result['line2'];
        return $data;
    }
}
