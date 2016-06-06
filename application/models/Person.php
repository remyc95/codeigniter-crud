<?php

class Person extends MY_Model {
    
    const DB_TABLE = 'PERSON';
    const DB_TABLE_PK = 'person_id';
    
    /**
     * Person unique identifier.
     * @var int 
     */
    public $person_id;
    
    /**
     * Person first name.
     * @var string
     */
    public $firstname;
    
    /**
     * Person last name.
     * @var string
     */
    public $lastname;
    
    /**
     * Person email address.
     * @var string 
     */
    public $email;
    
    /**
     * Person birth date.
     * @var string 
     */
    public $birthdate;
    
}

?>