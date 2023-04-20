<?php

class RecipeApi extends Api
{


    public function getComplexData($query): array
    {
        $this->complexSearch($query);
        return $this->getData();
    }
    public function getRandomData(): array
    {
        $this->randomSearch();
        return $this->getData();
    }

    public function getSingleRecipe($id): array
    {
        // single data body
        $this->singleSearch($id);
        return $this->getData();
    }

}