<?php

class Users_model extends CI_Model {

    public function get_users(): array
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function get_user(int $id): object
    {
        $query = $this->db->get_where('users', ['id' => $id]);
        return $query->result()[0];
    }

    public function create(array $user): void
    {
        $this->db->insert('users', $user);
    }

    public function update($user)
    {
        $this->db->update('users', [
                'name' => $user['name'],
                'email' => $user['email'],
                'age' => $user['age'],
                'memo' => $user['memo']
            ],
            ['id' => $user['id']]
        );
    }

    public function delete(int $id)
    {
        $this->db->delete('users', ['id' => $id]);
    }
}