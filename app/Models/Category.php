<?php


namespace App\Models;

use System\Database\Model;



class Category{

    public static function all()
    {
        $db = new Model();
        $sql = $db->select("SELECT *FROM `categories` ORDER BY `id` DESC ;");
        return $sql;
    }


    public static function find($id)
    {
        $db = new Model();
        $sql = $db->select("SELECT * FROM `categories` WHERE `id` = ? ;", [$id])->fetch();
        return $sql;

    }

    public static function create()
    {
        $db = new Model();
        $sql = $db->select("SELECT * FROM `categories` WHERE `parent_id` IS NULL ; ");
        return $sql;
    }

    public static function insert($values)
    {
        $db = new Model();
        $sql = $db->insert('categories',array_keys(array_filter($values)) , array_filter($values));
        return $sql;
    }


    public static function update($values, $id)
    {
        $db = new Model();
        $sql = $db->update('categories',$id,array_keys($values),$values);
        return $sql;
    }

    public static function delete($id)
    {
        $db = new Model();
        $sql = $db->delete('categories', $id);
        return $sql;
    }


}