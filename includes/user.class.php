<?php

// If it's going to need the database, then it's
// probably smart to require it before we start.
require_once(LIB_PATH . DS . 'database.class.php');

class User extends DatabaseObject
{
    protected static $table_name = "users";
    protected static $column_name = "username";
    protected static $db_fields = array('id', 'username', 'hashed_password');

    public $id;
    public $username;
    public $password;
    public $hashed_password;
}
