<?php

class User {

    public $user_id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;


    public static function instantiation($found_user) {
        $the_object = new self;

        $the_object->user_id = $found_user['user_id'];
        $the_object->username = $found_user['username'];
        $the_object->password = $found_user['password'];
        $the_object->first_name = $found_user['first_name'];
        $the_object->last_name = $found_user['last_name'];

        return $the_object;
    }

    public static function find_all_users() {
        return self::find_this_query("SELECT * FROM users");
    }

    public static function find_user_by_id($user_id) {
        global $database;
        $find_user_by_id = self::find_this_query("SELECT * FROM users WHERE user_id = $user_id LIMIT 1");
        $found_user = mysqli_fetch_assoc($find_user_by_id);
        return $found_user;
    }

    public static function find_this_query($sql) {
        global $database;
        $result_set = $database->query($sql);

        return $result_set;

    }




}




?>