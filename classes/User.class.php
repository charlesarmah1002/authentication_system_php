<?php

// include_once 'Config.class.php';

class User extends Config
{
    public function create_account($firstname, $lastname, $username, $email, $password)
    {
        $unique_id = rand(100000, 999999);

        $enc_pass = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(unique_id, firstname, lastname, username, email, password)
            VALUES($unique_id, '$firstname', '$lastname', '$username', '$email', '$enc_pass')";

        $query = $this->connect()->prepare($sql);
        $query->execute();
    }

    public function check_username($username)
    {
        $sql = "SELECT * FROM users WHERE username = '$username'";

        $query = $this->connect()->prepare($sql);
        $query->execute();

        if (!empty($query->fetchAll(PDO::FETCH_ASSOC))) {
            return false;
        } else {
            return true;
        }
    }

    public function check_email($email)
    {
        $sql = "SELECT * FROM users WHERE username = '$email'";

        $query = $this->connect()->prepare($sql);
        $query->execute();

        $results = $query->fetch(PDO::FETCH_ASSOC);

        if (!empty($results)) {
            return false;
        } else {
            return true;
        }
    }

    public function account_details($username)
    {
        $sql = "SELECT * FROM users WHERE username = '$username'";

        $query = $this->connect()->prepare($sql);
        $query->execute();

        $results = $query->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    public function log_in($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = '$username'";

        $query = $this->connect()->prepare($sql);
        $query->execute();

        $results = $query->fetch(PDO::FETCH_ASSOC);
        $enc_pass = $results['password'];

        if (password_verify($password, $enc_pass) === true) {
            $details = ['firstname' => $results['firstname'], 'lastname' => $results['lastname'], 'username' => $results['username'], 'role' => $results['role'], 'status' => $results['status'], 'user_id' => $results['unique_id'], 'state' => 'takeoff', 'email' => $results['email']];
        } else {
            $details = ['state' => 'grounded'];
        }
        return $details;
    }
}

// $user = new User;
// $user->create_account('Charles', 'Wesley', 'carlos2', 'charlesarmah@gmail.com', 'makemedance');
// var_dump($user->check_username('maker'));
// var_dump($user->account_details('maker'));
// var_dump($user->log_in('maker', 'makemedance'));