<?php 
class Leave {
    protected $id;
    protected $name;
    protected $reason;
    protected $status;
    protected $employeeID;

    public function getID() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getReason() {
        return $this->reason;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getEmployeeID() {
        return $this->employeeID;
    }

    public function setID($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setReason($reason) {
        $this->reason = $reason;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setEmployeeID($employeeID) {
        $this->employeeID = $employeeID;
    }


}





?>