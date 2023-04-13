<?php

class RecipeApi extends Api
{
//    private $url = 'https://api.spoonacular.com/recipes/complexSearch';
//    private $apiKey = API_KEY;
//    private $query ;
//    private $number = 3 ;
//    private $responce;
//    private array $data;




    public function __construct()
    {

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