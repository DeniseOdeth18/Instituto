<?php
class Database {
   private $db_host = 'localhost';
   private $db_user = 'root';
   private $db_password = 'root';
   private $db_db = 'IBD';
   private $db_port = 8889;
   public $conn;

    public function getConnection(){

     
        $db_host = 'localhost';
        $db_user = 'root';
        $db_password = 'root';
        $db_db = 'IBD';
        $db_port = 8889;
       
      
      $conn = new mysqli(
          $db_host,
          $db_user,
          $db_password,
          $db_db,
          $db_port
        );
          
        if ($conn->connect_error) {
          echo 'Errno: '.$conn->connect_errno;
          echo '<br>';
          echo 'Error: '.$conn->connect_error;
          exit();
        }
      
        echo 'Success: A proper connection to MySQL was made.';
        echo '<br>';
        echo 'Host information: '.$conn->host_info;
        echo '<br>';
        echo 'Protocol version: '.$conn->protocol_version;
      
        $conn->close();
               

       
               
        }
       
    }

  
$conn = new Database();
$conn->getConnection();

Database::getConnection();

?>