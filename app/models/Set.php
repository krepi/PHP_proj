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
    public function addSet($data)
    {
        $this->db->query('INSERT INTO sets (set_name, user_id, body) VALUES ( :set_name,:user_id, :body)');
        //bind values
        $this->db->bind(':set_name', $data['set_name']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);

        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getSetById($id)
    {
        $this->db->query('SELECT * FROM sets WHERE id = :id');
        //bind value
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;

    }
}