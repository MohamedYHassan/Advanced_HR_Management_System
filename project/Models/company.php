<?php
class company {
    protected $tax_Id_Number;
    protected $name;
    protected $location;
    protected $founding_Year;
    private static $instance = null;

    private function __construct()
    {
        
    }

    public function __clone() {
        trigger_error( "Cannot clone instance of Singleton pattern ...", E_USER_ERROR );
        }
        public function __wakeup() {
        trigger_error('Cannot deserialize instance of Singleton pattern ...', E_USER_ERROR );
        }
    
    
        public static function getInstance()
        {
        if( !is_object(self::$instance) )
            self::$instance = new self;
        return self::$instance;
        }

        public function getTaxIDNumber() {
            return $this->tax_Id_Number;
        }

        public function getName() {
            return $this->name;
        }

        public function getLocation() {
            return $this->location;
        }

        public function getFoundingYear() {
            return $this->founding_Year;
        }

        public function setTaxIDNumber($TaxID) {
            $this->tax_Id_Number = $TaxID;
        }

        public function setName($Name) {
            $this->name = $Name;
        }

        public function setLocation($location) {
            $this->location = $location;
        }

        public function setFoundingYear($FoundingYear) {
            $this->founding_Year = $FoundingYear;
        }


}





?>