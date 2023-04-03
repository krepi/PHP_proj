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
        $this->db->query('INSERT INTO recipes (title, user_id, body) VALUES (:title, :user_id, :body)');
        //bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);

        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}