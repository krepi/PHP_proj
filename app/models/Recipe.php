<?php

class Recipe
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getRecipes()
    {
        $this->db->query('SELECT *, 
        recipes.id as recipeId,
        users.id as userId,
        recipe.created_at as recipeCreated,
        users.created_at as userCreated
         FROM posts
         INNER JOIN users
         ON recipes.user_id = users.id
         ORDER BY recipes.created_at DESC
         ');

        $results = $this->db->resultSet();

        return $results;
    }
    public function addRecipe($data)
    {
        $this->db->query('INSERT INTO recipes_fav (user_id,recipe_id, recipe_title, recipe_img) 
                              VALUES (:user_id, :recipe_id, :recipe_title, :recipe_img)');
        //bind values
        $this->db->bind(':recipe_id', $data['recipe_id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':recipe_title', $data['recipe_title']);
        $this->db->bind(':recipe_img', $data['recipe_img']);
//        $this->db->bind(':body', $data['body']);

        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findRecipeById($recipe_id, $user_id)
    {
        $this->db->query('SELECT * FROM recipes_fav WHERE recipe_id = :recipe_id AND user_id = :user_id');
        //bind value
        $this->db->bind(':recipe_id', $recipe_id);
        $this->db->bind(':user_id', $user_id);

        $row = $this->db->single();

        // check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function getRecipeById($recipe_id)
    {
        $this->db->query('SELECT * FROM recipes_fav WHERE recipe_id = :recipe_id');
        //bind value
        $this->db->bind(':recipe_id', $recipe_id);

        $row = $this->db->single();

        return $row;
    }

    public function deleteRecipeByID($recipe_id)
    {
        $this->db->query('DELETE  FROM recipes_fav WHERE recipe_id = :recipe_id');
        //bind value
        $this->db->bind(':recipe_id', $recipe_id);
        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserRecipes($user_id)
    {
        $this->db->query('SELECT * FROM recipes_fav WHERE user_id = :user_id  
         ORDER BY recipes_fav.created_at DESC
         ');
        $this->db->bind(':user_id', $user_id);
        $results = $this->db->resultSet();
        foreach ( $results as $result) {
            $array[]= (array)$result;
        }
        return $array;
    }

}