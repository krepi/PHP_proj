<?php

class Api
{
    private $url = API_URL;
    private $apiKey = API_KEY;
    private $funct;
    private $query  ;
    private $number=9 ;
    private $responce;
    private array $data;



// set search function to complexSearch
    public function complexSearch($query)
    {
        $this->query = $query;
        $this->funct = 'complexSearch';
    }
    public function randomSearch()
    {
        $this->funct = 'random';
    }

    public function singleSearch($id){
        $this->funct = $id.'/information';
    }


    //create url for Api request
    public function url()
    {
        $url = $this->url . $this->funct . '?apiKey=' . $this->apiKey  . '&query=' . $this->query . '&number=' . $this->number;
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