<?php

class Api
{
    private $url = API_URL;
    private $apiKey = API_KEY;
    private $funct;
    private $query  ;
    private $number=2 ;
    private $responce;
    private array $data;



// set search function to complexSearch
    public function complexSearch()
    {
        $this->funct = 'random';
    }
    public function randomSearch()
    {
        $this->funct = 'random';
    }
//create url for Api request
    public function url()
    {
        $url = $this->url . $this->funct . '?apiKey=' . $this->apiKey  . '&number=' . $this->number;
        var_dump($url);
        return $url;
    }
//'&query=' . $this->query
    // fetching datas from Api
    public function getData(): array
    {
        $curl = curl_init($this->url());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $this->responce = curl_exec($curl);
        curl_close($curl);
        $this->data = json_decode($this->responce, true);
        return $this->data;
    }

}