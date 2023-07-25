<?php
require_once('config.php');
class DB
{
    public $conn;
    public function __construct() // Tu dong kich hoat database
    {
        $this->connection();
    }
    public function connection()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die("<h3>KẾT NỐI CSDL LỖI<h3>" . $this->conn->connect_error);
        } else {
            // echo "KẾT NỐI THÀNH CÔNG";
        }
    }
    //Chuan hoa chuoi dua vao
    function escape_string($str)
    {
        return $this->conn->real_escape_string($str);
    }
    //query function
    function query($sql)
    {
        return $this->conn->query($sql);
    }

    //Insert du lieu
    function insert($table, $data)
    {
        //INSERT INTO table_name(comumn1,column2,column3,...)
        // VALUES(value1,value2,value3...)
        foreach ($data as $key => $value) {
            $list_field[] = "`{$key}`";
            $list_value[] = "'{$this->escape_string($value)}'";
        }
        $list_field = implode(',', $list_field);
        $list_value = implode(',', $list_value);
        $sql = "INSERT INTO {$table} ({$list_field}) VALUES ({$list_value})";

        if ($this->query($sql) == true) {
            return $this->conn->insert_id;
        } else {
            echo "Loi " . $this->conn->error;
        }
        // echo $sql;
    }
    //Select du lieu
    //SELECT 
    //SELECT comlumn1, column2....
    //FROM table_name WHERE ...
    function get($table, $field = array(), $where = "")
    {
        $field = !empty($field) ? implode(',', $field) : "*";
        $where = !empty($where) ? "WHERE {$where}" : "";
        $sql = "SELECT {$field} 
        FROM {$table} {$where}";
        // echo $sql;
        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            if (count($data) > 1) {
                return $data;
            }else{
                return $data[0];
            }
        } else {
            echo "Khong tim thay ban ghi";
        }
    }

    //UPDATE DATA
    // UPDATE table_name
    // SET column1 = value1, column2 = value2,... 
    // WHERE condition
    function update($table,$data = array(), $where = ''){
        $data_insert = array();
        foreach($data as $k =>$v){
            $data_insert[] = "`{$k}` = '{$v}'";
        }
        $data_insert = implode(',',$data_insert);
        $where = !empty($where) ? "WHERE {$where}" : "";
        $sql = "UPDATE {$table} SET {$data_insert} {$where}";
        if($this->query($sql)==TRUE){
            echo "Cap nhat thanh cong";
        }else{
            echo $this->conn->error;
        }

    }

    //Xoa du lieu
    // DELETE FROM table_name WHERE condition
    function delete($table, $where = ""){
        $where = !empty($where)? "WHERE {$where}":"";
        $sql = "DELETE FROM {$table} {$where}";
        // echo $sql;
        if($this->query($sql) == TRUE){
            echo "Da xoa thanh cong ban ghi";
        }else{
            echo "Loi: ".$this->conn->error;
        }
    }


}




$db = new DB;
$data = array(
    'username' => 'thuha19',
    'password' => md5('thuha!@#')
);
// $db->insert('users', $data);

// $users = $db->get('users', ['username', 'password'], 'id>4');
// $db->update('users',$data,'id = 6');
// echo '<pre>';
// print_r($users);
// echo '<pre/>';

// $db->delete('users','id=6');