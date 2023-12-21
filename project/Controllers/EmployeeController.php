<?php 

require_once '../../Models/employee.php';
require_once '../../Controllers/DBController.php';
require_once '../../Controllers/PDF.php';
class EmployeeController implements PDF
{
    protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
    
    public function addEmployee(employee $employee)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            
            $Name=$employee->getName();
            $Email=$employee->getEmail();
            $Username=$employee->getUsername();
            $Password=$employee->getPassword();
            $Birthdate=$employee->getBirthdate();
            $Gender=$employee->getGender();
            $Address=$employee->getAddress();
            $Mobile = $employee->mobileToString();
            $Position=$employee->getPosition();
            $Salary=$employee->getSalary();
            


            $query = "INSERT INTO `user` (`Id`, `Name`, `E-mail`, `Username`, `Password`, `Birth_date`, `Gender`, `Address`, `Mobile`, `Position`, `Salary`, `Role_Id`) VALUES (NULL,'$Name','$Email','$Username','$Password','$Birthdate','$Gender','$Address','$Mobile','$Position','$Salary','2')";

            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getEmployee()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from user where Role_Id=2";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function getPayroll() 
    {
      $this->db=new DBController;
      if($this->db->openConnection())
      {
         $query="SELECT * FROM `user` where Role_Id=2 ORDER BY `Salary`  DESC";
         return $this->db->select($query);
      }
      else
      {
         echo "Error in Database Connection";
         return false; 
      }
 }

 public function getPayrollOverview() {
   $this->db=new DBController;
   if($this->db->openConnection())
   {
      $query="SELECT * FROM `user` where Role_Id=2 ORDER BY `Salary`  DESC LIMIT 4 ";
      return $this->db->select($query);
   }
   else
   {
      echo "Error in Database Connection";
      return false; 
   }
 }


    public function getEmp($id) {
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

    public function deleteEmployee($id) {
      $this->db = new DBController;
      if($this->db->openConnection()) {
         $query = "delete from user where Id=$id";
         return $this->db->delete($query);
      }
      else {
         echo "Error in Database Connection";
            return false; 
      }


    }

    public function updateEmployee(employee $employee) {
     $this->db = new DBController;
    if($this->db->openConnection()) {
      $Id=$employee->getID();
      $Name=$employee->getName();
      $Email=$employee->getEmail();
      $Username=$employee->getUsername();
      $Password=$employee->getPassword();
      $Birthdate=$employee->getBirthdate();
      $Gender=$employee->getGender();
      $Address=$employee->getAddress();
      $Mobile = $employee->mobileToString();
      $Position=$employee->getPosition();
      $Salary=$employee->getSalary();


       $query = "UPDATE `user` SET `Id`='$Id',`Name`='$Name',`E-mail`='$Email',`Username`='$Username',`Password`='$Password',`Birth_date`='$Birthdate',`Gender`='$Gender',`Address`='$Address',`Mobile`='$Mobile',`Position`='$Position',`Salary`='$Salary',`Role_Id`='2' WHERE Id=$Id";
      
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
      $query="select `Id`,`Name`,`Position`,`Salary` from user where Role_Id=2";
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
      $query = "SHOW columns FROM user WHERE field != 'E-mail' and field != 'Username' and field != 'Password' and field != 'Birth_date' and field != 'Gender' and field != 'Address' and field != 'Mobile' and field != 'Role_Id' ";
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