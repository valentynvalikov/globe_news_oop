<?php

// If it's going to need the database, then it's
// probably smart to require it before we start.
require_once(LIB_PATH . DS . 'database.class.php');

class Ad extends DatabaseObject
{
    protected static $table_name = "pages";
    protected static $column_name = "title";
    protected static $db_fields = array('id', 'title', 'description', 'author', 'created_at');
    public $id;
    public $title;
    public $description;
    public $author;
    public $created_at;
}
