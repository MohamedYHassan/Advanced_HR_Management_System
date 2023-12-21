<?php 

require_once '../../Models/user.php';
require_once '../../Controllers/DBController.php';
class AuthController
{
    protected $db;

    
    public function login(User $user)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $username = $user->getUsername();
            $password = $user->getPassword();
            $query="select * from user where Username='$username' and Password ='$password'";
            $result=$this->db->select($query);
            if($result===false)
            {
                echo "Error in Query";
                return false;
            }
            else
            {
                if(count($result)==0)
                {
                    session_start();
                    $_SESSION["errMsg"]="You have entered wrong username or password";
                    $this->db->closeConnection();
                    return false;
                }
                else
                {
                    session_start();
                    $_SESSION["Id"]=$result[0]["Id"];
                    $_SESSION["username"]=$result[0]["Username"];
                    $_SESSION["name"]=$result[0]["Name"];
                    $_SESSION["email"]=$result[0]["E-mail"];
                    $_SESSION["password"]=$result[0]["Password"];
                    $_SESSION["birthdate"]=$result[0]["Birth_date"];
                    $_SESSION["gender"]=$result[0]["Gender"];
                    $_SESSION["address"]=$result[0]["Address"];
                    $_SESSION["mobile"]=$result[0]["Mobile"];
                    $_SESSION["position"]=$result[0]["Position"];
                    $_SESSION["salary"]=$result[0]["Salary"];
                    if($result[0]["Role_Id"]==1)
                    {
                        $_SESSION["Role_Id"]="Admin";
                    }
                    else
                    {
                        $_SESSION["Role_Id"]="Employee";
                    }
                    $this->db->closeConnection();
                    return true;
                }
            }
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
   
    
}

?>