<?php

class RecipeApi extends Controller
{
    private $url = 'https://api.spoonacular.com/recipes/complexSearch';
    private $apiKey = API_KEY;
    private $query ;
    private $number ;
    private $responce;
    private array $data;

    public function __construct($query, $number)
    {
        $this->query = $query;
        $this->number = $number;
        $url = $this->url . '?apiKey=' . $this->apiKey . '&query=' . $this->query . '&number=' . $this->number;
        var_dump($url);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $this->responce = curl_exec($curl);
        curl_close($curl);
        $this->data = json_decode($this->responce, true);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }




}