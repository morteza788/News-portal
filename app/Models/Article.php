<?php


namespace App\Models;

use System\Database\Model;

class Article
{
    public static function all()
    {
        $db = new Model();
        $sql = $db->select("SELECT *FROM `articles` ORDER BY `id` ASC");
        return $sql;
    }

    public static function insert($value)
    {
        $db = new Model();
         $sql = $db->insert('articles',array_keys($value) , $value);
         return $sql;
    }

    public static function find($id)
    {
        $db = new Model();
        $sql = $db->select("SELECT * FROM `articles` WHERE `id` = ? ;", [$id])->fetch();
        return $sql;

    }

    public static function update($values, $id)
    {
        $db = new Model();
        $sql = $db->update('articles',$id,array_keys($values),$values);
        return $sql;
    }

    public static function delete($id)
    {
        $db = new Model();
        $sql = $db->delete('articles', $id);
        return $sql;
    }
}