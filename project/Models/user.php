<?php 

class User
{
    protected $id;
    protected $name;
    protected $email;
    protected $username;
    protected $password;
    protected $birthdate;
    protected $gender;
    protected $address;
    protected $mobile;
    protected $position;
    protected $salary;
    protected $roleid;

    public function __construct()
    {
        
    }

    public function setID($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setbirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function setRoleID($RoleID) {
        $this->roleid = $RoleID;
    }

    public function getID() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getMobile() {
        return $this->Mobile;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function getRoleID() {
        return $this->roleid;
    }

    public function mobileToString() {
        return $this->mobile."";
    }
}

?>