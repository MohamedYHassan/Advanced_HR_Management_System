<?php 
class Email {
    protected $emailID;
    protected $message;
    protected $senderEmail;
    protected $receiverEmail;
    protected $subject;


    public function getEmailID() {
        return $this->emailID;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getSenderEmail() {
        return $this->senderEmail;
    }

    public function getReceiverEmail() {
        return $this->receiverEmail;
    }

    public function getSubject() {
        return $this->subject;
    }


    public function setEmailID($id) {
        $this->emailID = $id;
    }

    public function setMessage($msg) {
        $this->message = $msg;
    }

    public function setSenderEmail($email) {
        $this->senderEmail = $email;
    }

    public function setReceiverEmail($email) {
        $this->receiverEmail = $email;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
    }



}





?> 