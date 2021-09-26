<?php

// If it's going to need the database, then it's
// probably smart to require it before we start.
require_once(LIB_PATH . DS . 'database.class.php');

class DatabaseObject
{
    // Database Methods
    // Методы базы данных

    public static function isUnique($obj)
    {
        global $database;
        $sql = "SELECT * FROM " . static::$table_name;
        $sql .= " WHERE " . static::$column_name . "='$obj'";
        $result = mysqli_query($database->connection, $sql);
        $count = mysqli_num_rows($result);
        mysqli_free_result($result);
        return $count === 0;
    }

    public static function findAll()
    {
        return static::findBySql("SELECT * FROM " . static::$table_name);
    }

    public static function findById($id = 0)
    {
        $result_array = static::findBySql("SELECT * FROM " . static::$table_name . " WHERE id={$id} LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function findBySql($sql = "")
    {
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();
        while ($row = $database->fetchArray($result_set)) {
            $object_array[] = static::instantiate($row);
        }
        return $object_array;
    }

    public static function countAll()
    {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . static::$table_name;
        $result_set = $database->query($sql);
        $row = $database->fetchArray($result_set);
        return array_shift($row);
    }

    private static function instantiate($record)
    {
    // Could check that $record exists and is an array
        $class_name = get_called_class();
        $object = new $class_name();
        foreach ($record as $attribute => $value) {
            if ($object->hasAttribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    private function hasAttribute($attribute)
    {
        // We don't care about the value, we just want to know if the key exists, and return true or false
        // Нам неважно значение, просто хотим знать есть ли ключ, и возвращаем истину или ложь
        return array_key_exists($attribute, $this->attributes());
    }

    protected function attributes()
    {
        // return an array of attribute names and their values
        // возвращаем массив имён аттрибутов и их значений
        $attributes = array();
        foreach (static::$db_fields as $field) {
            if (property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }

    protected function sanitizedAttributes()
    {
        global $database;
        $clean_attributes = array();
        // sanitize the values before submitting, but does not alter the actual value of each attribute
        // очищаем значения перед отправкой, но не изменяем само значение каждого аттрибута
        foreach ($this->attributes() as $key => $value) {
            $clean_attributes[$key] = $database->escapeValue($value);
        }
        return $clean_attributes;
    }

    public function save()
    {
        // A new record won't have an id yet.
        // У новой записи не будет id
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create()
    {
        global $database;
        // Don't forget about single-quotes around values and escaping all values to prevent SQL injection
        // Не забываем про одиночные кавычки вокруг значений и эскейпим их для предотвращения SQL иньекции

        $attributes = $this->sanitizedAttributes();
        $sql = "INSERT INTO " . static::$table_name . " (";
        $sql .= join(", ", array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";

        if ($database->query($sql)) {
            $this->id = $database->insertId();
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        global $database;
        // Don't forget about single-quotes around values and escaping all values to prevent SQL injection
        // Не забываем про одиночные кавычки вокруг значений и эскейпим их для предотвращения SQL иньекции

        $attributes = $this->sanitizedAttributes();
        $attribute_pairs = array();
        foreach ($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .= " WHERE id=" . $database->escapeValue($this->id);
        $database->query($sql);
        return ($database->affectedRows() == 1) ? true : false;
    }

    public function delete()
    {
        global $database;
        // Don't forget to escape values to prevent SQL injection and use LIMIT 1
        // Не забываем эскейпить значения для предотвращения SQL иньекции и используем LIMIT 1

        $sql = "DELETE FROM " . static::$table_name;
        $sql .= " WHERE id=" . $database->escapeValue($this->id);
        $sql .= " LIMIT 1";
        $database->query($sql);
        return ($database->affectedRows() == 1) ? true : false;
    }
}
