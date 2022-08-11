<?php
    class Autor{

        // Connection
        private $conn;

        // Table
        private $db_table = "Autor";

        // Columns
        public $id_Autor;
        public $Nombres;
        public $ApellidoP;
        public $ApellidoM;
      

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getAutor(){
            $sqlQuery = "SELECT id_Autor, Nombres, ApellidoP, ApellidoM FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createAutor(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        Nombres = :Nombres, 
                        ApellidoP = :ApellidoP, 
                        ApellidoM = :ApellidoM";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->Nombres=htmlspecialchars(strip_tags($this->Nombres));
            $this->ApellidoP=htmlspecialchars(strip_tags($this->ApellidoP));
            $this->ApellidoM=htmlspecialchars(strip_tags($this->ApellidoM));
   
        
            // bind data
            $stmt->bindParam(":Nombres", $this->Nombres);
            $stmt->bindParam(":ApellidoP", $this->ApellidoP);
            $stmt->bindParam(":ApellidoM", $this->ApellidoM);
    
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }


        public function getSingleAutor(){
            $sqlQuery = "SELECT
                        id_Autor,
                        Nombres,
                        ApellidoP, 
                        ApellidoM
                      FROM
                        ". $this->db_table ."
                    WHERE 
                    id_Autor = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id_Autor);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC); //AQUI
            
            $this->Nombres = $dataRow['Nombres'];
            $this->ApellidoP = $dataRow['ApellidoP'];
            $this->ApellidoM = $dataRow['ApellidoM'];
            
        }        

        // UPDATE
        public function updateAutor(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                    Nombres = :Nombres, 
                    ApellidoP = :ApellidoP, 
                    ApellidoM = :ApellidoM
                        
                    WHERE 
                    id_Autor = :id_Autor";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->Nombres=htmlspecialchars(strip_tags($this->Nombres));
            $this->ApellidoP=htmlspecialchars(strip_tags($this->ApellidoP));
            $this->ApellidoM=htmlspecialchars(strip_tags($this->ApellidoM));
        
            $this->id_Autor =htmlspecialchars(strip_tags($this->id_Autor ));
        
            // bind data
            $stmt->bindParam(":Nombres", $this->Nombres);
            $stmt->bindParam(":ApellidoP", $this->ApellidoP);
            $stmt->bindParam(":ApellidoM", $this->ApellidoM);
            $stmt->bindParam(":id_Autor", $this->id_Autor);
         
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteAutor(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id_Autor = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id_Autor=htmlspecialchars(strip_tags($this->id_Autor));
        
            $stmt->bindParam(1, $this->id_Autor);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>
