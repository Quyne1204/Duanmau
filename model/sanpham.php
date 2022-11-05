<?php
require_once 'pdo.php';

function sp_insert($name,$price,$name_img,$detail,$date,$sale,$loaihang){
    $sql = "insert into sanpham values(null,'$name','$price','$name_img','$detail','','$date','$sale','$loaihang')";
    pdo_execute($sql);
}

function sp_update($id_sp,$name,$price,$name_img,$detail,$date,$sale,$loaihang){
    if($name_img!=""){
        $sql_update = "update sanpham set name='$name', price='$price', img='$name_img',
            detail='$detail',date='$date',sale='$sale', id_dm='$loaihang' where id_sp=$id_sp ";
    }else{
        $sql_update = "update sanpham set name='$name', price='$price', 
            detail='$detail',date='$date',sale='$sale', id_dm='$loaihang' where id_sp=$id_sp ";
    }                    
    pdo_execute($sql_update);
}

function sp_delete($id){
    $sql = "delete from sanpham where id_sp=".$id ;
    $list_sp = pdo_query($sql);
}

function sp_all($kyw="", $id_loai=0){
    $sql = "select * from sanpham where 1";
    if($kyw!=""){
        $sql.=" and name like '%".$kyw."%' or id_sp like '%".$kyw."%'";
    }if($id_loai>0){
        $sql.=" and id_dm ='".$id_loai."'";
    }
    $sql.=" order by id_sp desc";
    $list_sp = pdo_query($sql);
    return $list_sp;
}
function sp_all_home(){
    $sql = "select * from sanpham where 1 order by id_sp desc limit 0,9";
    $list_sp = pdo_query($sql);
    return $list_sp;
}
function sp_top10(){
    $sql = "select * from sanpham order by luotxem desc limit 7";
    $list_sp = pdo_query($sql);
    return $list_sp;
}


function load_namedm($id){
    if($id>0){
        $sql = "select * from danhmuc where id_loai=".$id;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    }else{
        return "";
    }
}
function sp_one($id){
    $sql = "select * from sanpham where id_sp=".$id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function sp_cungloai($id,$id_dm){
    $sql = "select * from sanpham where id_dm=".$id_dm." AND id_sp<>".$id;
    $list_sp = pdo_query($sql);
    return $list_sp;
}






