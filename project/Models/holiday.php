<?php 
class Holiday {
protected $id;
protected $name;
protected $date;




public function getID() {
    return $this->id;
}


public function getName() {
    return $this->name;
}

public function getDate() {
    return $this->date;
}



public function setName($name) {
    $this->name = $name;
}

public function setDate($date) {
    $this->date = $date;
}

public function setID($id) {
    $this->id = $id;
}








}






?>