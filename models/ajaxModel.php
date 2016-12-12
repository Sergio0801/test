<?php

class AjaxModel extends Model
{
    public $data;

    function __construct()
    {
        parent::__construct();
        $this->data = strip_tags($_POST['data']);
    }

    public function getCity()
    {
        $select = "SELECT `ter_name`, `ter_id`, `ter_type_id` FROM `t_koatuu_tree` WHERE (`ter_type_id`=1 or `ter_type_id`=2) AND `reg_id`=(SELECT `reg_id` FROM `t_koatuu_tree` WHERE `ter_id`=?)";
        $sth = $this->db->prepare($select);
        $sth->execute(array($this->data));
        $mas = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $mas;
    }

    public function getDistrict()
    {
        $select = "SELECT `ter_name`, `ter_id` FROM `t_koatuu_tree` WHERE `ter_type_id`=3 and `ter_pid` = ?";
        $sth = $this->db->prepare($select);
        $sth->execute(array($this->data));
        while ($res = $sth->fetch()) {
            $mas[] = "<option value='{$res['ter_id']}'>" . $res['ter_name'] . "</option>";
        }
        return $mas;
    }
}