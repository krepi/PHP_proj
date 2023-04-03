<?php
// class responsible for sets of recipes for particular user
class Set
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getRecipes()
    {
        $this->db->query('SELECT *, 
        sets.id as setId,
        users.id as userId,
        set.created_at as setCreated,
        users.created_at as userCreated
         FROM posts
         INNER JOIN users
         ON sets.user_id = users.id
         ORDER BY sets.created_at DESC
         ');

        $results = $this->db->resultSet();

        return $results;
    }
}