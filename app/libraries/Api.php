<?php

class Api
{
    private $url = API_URL;

    private $funct = 'complexSearch';
    private $apiKey = API_KEY;
    private $query = 'pasta' ;
    private $number= 3 ;
    private $responce;
    private array $data;


    public function url(){
        $url = $this->url. $this->funct . '?apiKey=' . $this->apiKey . '&query=' . $this->query . '&number=' . $this->number;
        var_dump($url);
        return $url;
    }

}