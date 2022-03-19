<?php

namespace Projects\Models;

use Projects\Db\Db;

class Processing
{

    public static function add_data($line)
    {
        $mysql = "INSERT INTO todo_work14_16_oop_mvc (title) VALUES ( :string );";

        $db = Db::singleton_connection();

        $effect = $db->query($mysql, [':string' => $line]);
        return $effect;
    }

    public static function data_output()
    {
        $mysql = "SELECT * FROM todo_work14_16_oop_mvc ORDER BY id DESC ;";

        $db = Db::singleton_connection();

        $effect = $db->query($mysql, []);

        return $effect;
    }

    public static function delete_data($id)
    {
        $mysql = "DELETE FROM todo_work14_16_oop_mvc WHERE id = :id";

        $db = Db::singleton_connection();

        $effect = $db->query($mysql, [':id' => $id]);

        return $effect;
    }
}
