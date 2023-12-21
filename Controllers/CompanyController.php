<?php 

require_once '../../Models/company.php';
require_once '../../Controllers/DBController.php';
class CompanyController 
{
    protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
    
    public function addCompany(company $company)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $company=company::getInstance();
            $tax_id = $company->getTaxIDNumber();
            $name = $company->getName();
            $location = $company->getLocation();
            $founding_Year = $company->getFoundingYear();
            $AdminID = $_SESSION["Id"];
            $query="insert into company values ('$tax_id','$name','$location','$founding_Year','$AdminID')";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
     
    public function getCompany()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from company";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function deleteCompany($id) {
      $this->db = new DBController;
      if($this->db->openConnection()) {
         $query = "delete from company where Tax_Id_Number=$id";
         return $this->db->delete($query);
      }
      else {
         echo "Error in Database Connection";
            return false; 
      }


    }


    public function updateCompany(company $company) {
      $this->db = new DBController;
     if($this->db->openConnection()) {
       $taxID=$company->getTaxIDNumber();
       $name=$company->getName();
       $location=$company->getLocation();
       $foundingYear=$company->getFoundingYear();
       
 
 
        $query = "UPDATE `company` SET `Tax_Id_Number`='$taxID',`Name`='$name',`Location`='$location',`Founding_Date`='$foundingYear' WHERE Tax_Id_Number=$taxID";
       
         $this->db->update($query);
         return true;
     }
     else
     {
        echo "Error in Database Connection";
        return false; 
     }
     
 }
   
    
    
}

?>