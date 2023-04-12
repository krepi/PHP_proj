<?php

class Api
{
    private $url = 'https://api.spoonacular.com/recipes/';

    private $funct = 'complexSearch';
    private $apiKey = API_KEY;
    private $query ;
    private $number ;
    private $responce;
    private array $data;


    public function url(){
        $url = $this->url. $this->funct . '?apiKey=' . $this->apiKey . '&query=' . $this->query . '&number=' . $this->number;
        return $url;
    }

}