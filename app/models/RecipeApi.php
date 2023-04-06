<?php

class RecipeApi
{
    private $url = 'https://api.spoonacular.com/recipes/complexSearch';
    private $apiKey = API_KEY;
    private $query ;
    private $number = 3 ;
    private $responce;
    private array $data;




    public function __construct()
    {

    }


    public function url(){
        $url = $this->url . '?apiKey=' . $this->apiKey . '&query=' . $this->query . '&number=' . $this->number;
        var_dump($url);
        return $url;
    }


    /**
     * @return array
     */
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