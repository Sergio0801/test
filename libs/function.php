<?php
$host = 'localhost';
$dbname = 'protest14';
$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", 'root', '');
if (isset($_POST['area'])) {
    $data = trim($_POST['area']);
    if ($data == "Київська область") {
        $select = "SELECT `ter_name`, `ter_id` FROM `t_koatuu_tree` WHERE (`ter_type_id`=1 and `reg_id` = (SELECT `reg_id` FROM `t_koatuu_tree` where `ter_name` in('$data')))  or (`ter_type_id`=0 and `reg_id` =80)";

    } elseif ($data == "Автономна Республіка Крим") {
        $select = "SELECT `ter_name`, `ter_id` FROM `t_koatuu_tree` WHERE (`ter_type_id`=1 and `reg_id` = (SELECT `reg_id` FROM `t_koatuu_tree` where `ter_name` in('$data')))  or (`ter_type_id`=0 and `reg_id` =85)";

    } else {
        $select = "SELECT `ter_name`, `ter_id` FROM `t_koatuu_tree` WHERE `ter_type_id`=1 and `reg_id` = (SELECT `reg_id` FROM `t_koatuu_tree` where `ter_name` in('$data'))";
    }

    $sth = $db->query($select);
    while ($res = $sth->fetch()) {
        $mas[] = "<option value='{$res['ter_id']}'>" . $res['ter_name'] . "</option>";
    }
} elseif (isset($_POST['city'])) {
    $data = trim($_POST['city']);
    $select = "SELECT `ter_name` FROM `t_koatuu_tree` WHERE `ter_type_id`=3 and `ter_pid` = $data ";
    $sth = $db->query($select);
    while ($res = $sth->fetch()) {
        $mas[] = "<option value='{$res['ter_name']}'>" . $res['ter_name'] . "</option>";
    }
}
echo json_encode($mas);
