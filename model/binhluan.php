<?php
require_once 'pdo.php';

function binh_luan_insert($noidung,$username,$id_pro,$date){
    $sql = "insert into binhluan values(null,'$noidung','$username','$id_pro','$date')";
    pdo_execute($sql);
}

function loai_cmt($id_pro){
    $sql = "select * from binhluan where id_pro=$id_pro order by id_cmt desc";
    $list_cmt = pdo_query($sql);
    return $list_cmt;
}
function cmt_all(){
    $sql = "select * from binhluan order by id_cmt desc";
    $list_cmt = pdo_query($sql);
    return $list_cmt;
}
function cmt_one($id){
    $sql = "select * from binhluan where id_cmt=$id";
    $cmt = pdo_query_one($sql);
    return $cmt;
}
function cmt_update($id_cmt,$username,$id_pro,$noidung,$date){
    $sql = "update binhluan set noidung='$noidung',username='$username',id_pro='$id_pro',ngaycmt='$date' where id_cmt=".$id_cmt;
    pdo_execute($sql);
}
function cmt_delete($id){
    $sql = "delete from binhluan where id_cmt=".$id ;
    pdo_execute($sql);
}

?>