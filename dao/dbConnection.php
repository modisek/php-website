
<?php
class dbConnection{
    
    private $server = "mysql:host=localhost;dbname=prddev";
    private     $user   = "root";
    private     $pass   = "";
    protected   $con;

    private $opt = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );

    
    //open a connection to the server
    public function openConn(){
        try{
            $this-> con = new PDO($this->server, $this->user, $this->pass, $this->opt);
            return $this->con;
        }catch(PDOException $e){
            echo "problem with connection";
        }
    }

    //close the connection to the server
    public function closeConn(){
        $this->con = null;
    }
}
?>