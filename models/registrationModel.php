<?php

class RegistrationModel extends Model
{
    public $mas = array();

    function __construct()
    {
        parent::__construct();
        $this->mas = $_POST;
        var_dump($this->mas);
    }

    function signUp()
    {
        $name = trim($this->mas['name']);
        $name = strip_tags($this->mas['name']);
        $email = trim($this->mas['email']);
        $email = strip_tags($this->mas['email']);
        $select = "SELECT * FROM `registry_people` WHERE `email` in('$email')";
        $res = $this->db->query($select);
        $row = $res->fetch();
        if ($row == false) {
            $select = "SELECT `ter_name` FROM `t_koatuu_tree` WHERE `ter_id`=?";
            $res = $this->db->prepare($select);
            $ci = $this->mas['city'];
            $res->execute(array($ci));
            $row = $res->fetch();
            $city = $row['ter_name'];
            $sel2 = "SELECT `ter_name` FROM `t_koatuu_tree` WHERE `ter_id`=?";
            $res = $this->db->prepare($sel2);
            $ar = $this->mas['area'];
            $res->execute(array($ar));
            $row = $res->fetch();
            $area = $row['ter_name'];
            $sel3 = "SELECT `ter_name` FROM `t_koatuu_tree` WHERE `ter_id`=?";
            $res = $this->db->prepare($sel3);
            $dis = $this->mas['district'];
            $res->execute(array($dis));
            $row = $res->fetch();
            $district = $row['ter_name'];
            $territory = "$area, " . "$city, " . "$district";
            $insert = "INSERT INTO `registry_people`(`name`, `email`, `territory`) VALUES (?, ?, ?)";
            $res = $this->db->prepare($insert);
            $res->execute(array($name, $email, $territory));
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