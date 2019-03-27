<?php

class User_model extends CI_Model
{
    public function showAll()
    {
        $query = $this->db->get('users');
        $this->db->order_by('id', 'DESC');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function show($id)
    {
        $query = $this->db->get_where('users', array('id' => $id));
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function addUser($data)
    {
        return $this->db->insert('users', $data);
    }

    public function updateUser($id, $field)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function searchUser($match)
    {
        $field = array('firstname', 'lastname', 'gender', 'birthday', 'email', 'contact', 'address');
        $this->db->like('concat(' . implode(',', $field) . ')', $match);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}

?>