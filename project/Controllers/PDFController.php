<?php 

require_once '../../Controllers/HolidayController.php';
require_once '../../Controllers/EmployeeController.php';

class PDFController 
{
    
    protected $EmployeeController;
    protected $HolidayController;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection

 
   public function EmployeePDF() {
  
        $EmployeeController = new EmployeeController;
        
       return $EmployeeController->getPDF();
       
    }

    public function EmployeeHeader() {
        $EmployeeController = new EmployeeController;
                return $EmployeeController->PDFHeader(); 
    }

    public function HolidayPDF() {
        $HolidayController = new HolidayController;
        return $HolidayController->getPDF();
    }

    public function HolidayHeader() {
        $HolidayController = new HolidayController;
       return $HolidayController->PDFHeader();
    }
   }
 



?>