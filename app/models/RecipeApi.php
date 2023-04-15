<?php

class RecipeApi extends Api
{


    public function getComplexData(): array
    {
        $this->complexSearch();
        return $this->getData();
    }

    public function getRecipeById($Id): array
    {
        // single data body
        return $this->getData();
    }

}