<?php

class Index_model extends Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $select = "SELECT `ter_name` FROM `t_koatuu_tree` WHERE ter_type_id=0 and `ter_name` not in('м.Київ', 'м.Севастополь')";
        $sth = $this->db->query($select);
        //$numb = $sth->rowCount();
        //$res = $sth->fetchAll();
        //$res['numb'] = $numb;
        while ($res = $sth->fetch()) {
            $data .= "<option value='{$res['ter_name']}'>" . $res['ter_name'] . "</option>";
        }
        return $data;
    }
}