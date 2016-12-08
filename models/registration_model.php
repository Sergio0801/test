<?php

class Registration_model extends Model
{
    public $mas = array();

    function __construct()
    {
        parent::__construct();
        $this->mas = $_POST;

    }

    function registr()
    {
        $name = trim($this->mas['name']);
        $email = $this->mas['email'];
        $select = "SELECT * FROM `registry_people` WHERE `email` in('$email')";
        $res = $this->db->query($select);
        $row = $res->fetch();
        if ($row == false) {
            $select = "SELECT `ter_name` FROM `t_koatuu_tree` WHERE `ter_id`='{$this->mas['city']}'";
            $res = $this->db->query($select);
            $row = $res->fetch();
            $city = $row['ter_name'];
            $territory = "{$this->mas['area']}, " . "$city, " . "{$this->mas['district']}";
            $insert = "INSERT INTO `registry_people`(`name`, `email`, `territory`) VALUES ('$name', '$email', '$territory')";
            $res = $this->db->exec($insert);
            if ($res === false) {
                echo "Ошибка записи в бд";
            } else
                $text = "Вы успешно зарегистрированы";
            return $text;
        } else {
            $card = "<h2>Карточка пользователя:</h2><br/><b>ФИО:</b> {$row['name']}<br/><b>Email: </b> {$row['email']}<br/><b>Адрес: </b>{$row['territory']}";
            return $card;
        }

    }
}