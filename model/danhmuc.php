<?php
require_once 'pdo.php';

function loai_insert($name){
    $sql = "insert into danhmuc(name) values('$name')";
    pdo_execute($sql);
}

function loai_update($id, $name){
    $sql = "update danhmuc set name='".$name."' where id_loai=".$id;
    pdo_execute($sql);
}

function loai_delete($id){
    $sql = "delete from danhmuc where id_loai=".$id ;
    pdo_execute($sql);
}

function loai_all(){
    $sql = "select * from danhmuc";
    $list_dm = pdo_query($sql);
    return $list_dm;
}

function loai_one($id){
    $sql = "select * from danhmuc where id_loai=".$id;
    $dm = pdo_query_one($sql);
    return $dm;
}






function loai_exist($ma_loai){
    $sql = "SELECT count(*) FROM loai WHERE ma_loai=?";
    return pdo_query_value($sql, $ma_loai) > 0;
}