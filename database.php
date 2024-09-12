<?php 
//connect to database

class Database{
    public $con;
    public function __CONSTRUCT($config,$username='root',$password='')
    {
        $dsn='mysql:'.http_build_query($config,'',';');

        $this->con=new PDO($dsn,$username,$password,[

        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    public function query($query,$param=[]){
        $stm= $this->con->prepare($query);
        $stm->execute($param);
        return $stm;
    }
}

