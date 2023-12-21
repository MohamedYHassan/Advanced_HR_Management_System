<?php 

require_once '../../Models/email.php';
require_once '../../Controllers/DBController.php';
class EmailController 
{
    protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
    
    public function addEmail(Email $email)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            
            
            $message = $email->getMessage();
            $senderEmail = $email->getSenderEmail();
            $receiverEmail = $email->getReceiverEmail();
            $subject = $email->getSubject();
            


            $query="INSERT INTO `e-mail`(`Email_Id`, `Message`, `Sender_Email`, `Receiver_Email`, `Subject`) VALUES (NULL,'$message','$senderEmail','$receiverEmail','$subject')";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getEmail()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
             $receiver = $_SESSION["email"];
             
            $query="SELECT * FROM `e-mail`  WHERE `Receiver_Email` = '$receiver' ";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function getEmailOverview()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
             $receiver = $_SESSION["email"];
             
            $query="SELECT * FROM `e-mail`  WHERE `Receiver_Email` = '$receiver' LIMIT 3 ";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }


    public function deleteEmail($id) {
        $this->db = new DBController;
        if($this->db->openConnection()) {
           $query = "DELETE FROM `e-mail` WHERE `Email_Id`=$id";
           return $this->db->delete($query);
        }
        else {
           echo "Error in Database Connection";
              return false; 
        }
  
  
      }

 

}

?>