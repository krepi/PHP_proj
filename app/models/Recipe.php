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
        recipe.id as recipeId,
        users.id as userId,
        recipe.created_at as recipeCreated,
        users.created_at as userCreated
         FROM posts
         INNER JOIN users
         ON posts.user_id = users.id
         ORDER BY posts.created_at DESC
         ');

        $results = $this->db->resultSet();

        return $results;
    }
}