<?php
class User{
    private $username;
    private $password;
    private $db_username = "unitop";
    private $db_password = "unitop!@#";

    public function setInfo($username, $password){
        //Nhap gia tri cho $username, $password
        $this->username = $username;
        $this->password = $password;
    }
    function checkLogin(){
        //Kiem tra thong tin nhap vao voi thong tin cua $db_username va $db_password
        /**
         * Neu khop thong tin: Xuat len man hinh "Xin chao! unitop"
         * Nguoc lai: Xuat len ma hinh user khong ton tai
         */
        if(!empty($this->username) && ($this->username == $this->db_username) && !empty($this->password) && ($this->password == $this->db_password)){
            echo "Xin chao ".$this->db_username."!!";
        }else{
            echo "Ten nguoi dung khong hop le";
        }
    }
}

$u = new User();
$u->setInfo("unitop","unitop!@#");
$u->checkLogin();