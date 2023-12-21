<?php 

require_once '../../Models/employee.php';
require_once '../../Controllers/DBController.php';
class UserController
{
    protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
    
    
    

   

 


    public function getUser($id) {
       $this->db= new DBController;
       if($this->db->openConnection()) {
          $query = "select * from user where Id='$id'";
          return $this->db->select($query);
       }
       else
         {
            echo "Error in Database Connection";
            return false; 
         }
       
    }

   

  
}

?>