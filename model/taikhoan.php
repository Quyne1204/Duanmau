<?php
    function tk_insert($username,$password,$email){
        $sql = "insert into user values(null,'$username','$password','','$email','2','','','')";
        pdo_execute($sql);
    }

    function user_insert($username,$password,$email,$name,$name_img,$vaitro,$diachi,$sdt){
        $sql = "insert into user values(null,'$username','$password','$name','$email','$vaitro','$name_img','$diachi','$sdt')";
        pdo_execute($sql);
    }

    function tk_login($username,$password){
        $sql = "select * from user where username='$username' and password='$password'";
        $tk = pdo_query_one($sql);
        return $tk;
    }

    function user_all($kyw="", $vaitro=0){
        $sql = "select * from user where 1";
        if($kyw!=""){
            $sql.=" and username like '%".$kyw."%'";
        }if($vaitro>0){
            $sql.=" and vaitro ='".$vaitro."'";
        }
        $sql.=" order by id_user desc";
        $list_user = pdo_query($sql);
        return $list_user;
    }

    function tk_quenpass($email){
        $sql = "select * from user where email='$email'";
        $tk = pdo_query_one($sql);
        return $tk;
    }

    function tk_update($id_user,$username,$password,$name_img,$email,$name,$diachi,$sdt){
        if($name_img!=""){
            $sql_update = "update user set username='$username',sdt='$sdt', diachi='$diachi', password='$password', img='$name_img',
                email='$email',name='$name' where id_user=$id_user ";
        }else{
            $sql_update = "update user set username='$username',sdt='$sdt', diachi='$diachi', password='$password', 
                email='$email',name='$name' where id_user=$id_user ";
        }                    
        pdo_execute($sql_update);
    }
    /////////////////
    function  user_delete($id){
        $sql = "delete from user where id_user=".$id ;
        $use = pdo_query($sql);
        return $use;
    }
    function  user_one($id){
        $sql = "select * from user where id_user=".$id ;
        $user = pdo_query_one($sql);
        return $user;
    }
    function user_alll(){
        $sql = "select * from user order by id_user desc" ;
        $userall = pdo_query($sql);
        return $userall;
    }
    function user_update($id_user,$username,$password,$name_img,$email,$name,$vaitro,$diachi,$sdt){
        if($name_img!=""){
            $sql_update = "update user set username='$username',sdt='$sdt', diachi='$diachi', password='$password', img='$name_img',
                email='$email',name='$name',vaitro='$vaitro' where id_user=$id_user ";
        }else{
            $sql_update = "update user set username='$username',sdt='$sdt', diachi='$diachi', password='$password', 
                email='$email',name='$name',vaitro='$vaitro' where id_user=$id_user ";
        }                    
        pdo_execute($sql_update);
    }
?>