<?php 

require_once '../../Models/leave.php';
require_once '../../Controllers/DBController.php';
class LeaveController
{
    protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
    
    public function addLeave(leave $leave)
{
    $this->db = new DBController;

    if ($this->db->openConnection()) {
        $employeeID = $_SESSION['Id'];

        

        // Proceed to add leave if the limit is not exceeded
        $Name = $leave->getName();
        $Reason = $leave->getReason();

        $query = "INSERT INTO `leaves` (`Leave_Id`, `Name`, `Reason`, `Status`, `Employee_Id`) VALUES (NULL, '$Name', '$Reason', 'Waiting', '$employeeID')";
        return $this->db->insert($query);
    } else {
        echo "Error in Database Connection";
        return false;
    }
}

    public function getLeavesAdmin()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="SELECT * FROM `leaves` WHERE `leaves`.`Status`='Waiting'";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function getLeavesAdminOverview() {
        $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="SELECT * FROM `leaves` WHERE `leaves`.`Status`='Waiting' LIMIT 3";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
        
    }

    public function getLeavesEmployee() {
        $this->db=new DBController;
         if($this->db->openConnection())
         {
            $id= $_SESSION['Id'];
            $query="SELECT * FROM `leaves` WHERE `leaves`.`Employee_Id`=$id";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }

    }

    public function getLeavesEmployeeOverview() {
      $this->db=new DBController;
      if($this->db->openConnection())
      {
         $id=$_SESSION['Id'];
         $query="SELECT * FROM `leaves` WHERE `leaves`.`Employee_Id`=$id LIMIT 3";
         return $this->db->select($query);
      }
      else
      {
         echo "Error in Database Connection";
         return false; 
      }
    }

   

    public function acceptLeave($id) {
      $this->db = new DBController;
      if($this->db->openConnection()) {
         $query = "UPDATE `leaves` SET `Status` = 'Accepted' WHERE `leaves`.`Leave_Id` = $id ";
         return $this->db->update($query);
      }
      else {
         echo "Error in Database Connection";
            return false; 
      }


    }

    public function declineLeave($id) {
        $this->db = new DBController;
        if($this->db->openConnection()) {
           $query = "UPDATE `leaves` SET `Status` = 'Declined' WHERE `leaves`.`Leave_Id` = $id";
           return $this->db->update($query);
        }
        else {
           echo "Error in Database Connection";
              return false; 
        }
  
  
      }

      public function getPendingLeavesCount($id) {
         $this->db = new DBController; // Instantiate DBController
         if($this->db->openConnection()) {
            $query = "SELECT *  FROM leaves WHERE Employee_Id = $id AND Status = 'Waiting'";
            return $this->db->select($query);
         }
         else {
            echo "Error in Database Connection";
              return false; 

         }
         
     }
}

?>