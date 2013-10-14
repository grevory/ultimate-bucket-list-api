<?php
class User_model extends CI_Model {

    public $name   = '';
    public $email = '';
    public $password = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_users_and_passwords()
    {
        $query = $this->db->get('users');

        $users = array();
        foreach($query->result() as $user)
        {
            $users[$user->email] = $user->password;
        }
        return $users;
    }

    function get($id)
    {
        $key = $this->get_key($id);

        $this->db->select('name, email, password');
        $this->db->where($key, $id);
        $query = $this->db->get('users');

        if ($query->num_rows() === 1) {
            $user = $query->result_array();
            $this->_set_user($user[0]);
            return $user[0];
        }

        return NULL;
    }

    private function _set_user($user=false) {
        if (!count($user))
        {
            return FALSE;
        }

        $this->name = $user['name'];
        $this->email = $user['email'];
        $this->password = $user['password'];

        return $user;
    }

    // function insert_entry()
    // {
    //     $this->title   = $_POST['title']; // please read the below note
    //     $this->content = $_POST['content'];
    //     $this->date    = time();

    //     $this->db->insert('entries', $this);
    // }

    // function update_entry()
    // {
    //     $this->title   = $_POST['title'];
    //     $this->content = $_POST['content'];
    //     $this->date    = time();

    //     $this->db->update('entries', $this, array('id' => $_POST['id']));
    // }

}