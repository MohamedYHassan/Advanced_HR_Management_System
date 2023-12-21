<?php 

require_once '../../Models/holiday.php';
require_once '../../Controllers/DBController.php';
require_once '../../Controllers/PDF.php';
class HolidayController implements PDF
{
    protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
    
    public function addHoliday(Holiday $holiday)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $name = $holiday->getName();
            $date = $holiday->getDate();
            $AdminID = $_SESSION["Id"];
            $query="INSERT INTO `holidays` (`Id`, `Name`, `Date`, `Admin_Id`) VALUES (NULL, '$name', '$date', '$AdminID') ";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }


    public function getHoliday()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="SELECT Id,Name,Date FROM `holidays`";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function getHolidayOverview() {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
           $query="SELECT Id,Name,Date FROM `holidays` LIMIT 4";
           return $this->db->select($query);
        }
        else
        {
           echo "Error in Database Connection";
           return false; 
        }
    }

    public function deleteHoliday($id) {
      $this->db = new DBController;
      if($this->db->openConnection()) {
         $query = "delete from `holidays` where Id=$id";
         return $this->db->delete($query);
      }
      else {
         echo "Error in Database Connection";
            return false; 
      }


    }


    public function updateHoliday(Holiday $holiday) {
      $this->db = new DBController;
     if($this->db->openConnection()) {
        $id=$holiday->getID();
        $name = $holiday->getName();
        $date = $holiday->getDate();
        
       
 
 
        $query = "UPDATE `holidays` SET `Name` = '$name', `Date` = '$date' WHERE `holidays`.`Id` = $id ";
       
         $this->db->update($query);
         return true;
     }
     else
     {
        echo "Error in Database Connection";
        return false; 
     }
     
 }


 public function getPDF() {
   $this->db=new DBController;
   if($this->db->openConnection())
   {
      $query="select `Id`,`Name`,`Date` from holidays";
      return $this->db->select($query);
   }
   else
   {
      echo "Error in Database Connection";
      return false; 
   }
}

public function PDFHeader() {
   $this->db= new DBController;
   if($this->db->openConnection()) {
      $query = "SHOW columns FROM holidays WHERE field != 'Admin_Id' ";
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