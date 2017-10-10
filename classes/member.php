<?php

    class Member
    {
    
        //Fields
        protected $fname;
        protected $lname;
        protected $age;
        protected $gender;
        protected $phone;
        protected $email;
        protected $state;
        protected $seeking;
        protected $bio;
        
        //Constructor (parameterized constructor that holds default values)
        function __construct($fname="unknown", $lname="unknown",
            $age="unknown", $gender="unknown", $phone="unknown")
        {
            $this->fname = $fname;
            $this->lname = $lname;
            $this->age = $age;
            $this->gender = $gender;
            $this->phone = $phone;
        }
        
        //Setters and Getters
        function setFirstName($fname)
        {
            $this->fname = $fname;
        }

        function getFirstName()
        {
            return $this->fname;
        }
        
        function setLastName($lname)
        {
            $this->lname = $lname;
        }
    
        function getLastName()
        {
            return $this->lname;
        }
    
        function setAge($age)
        {
            //check if age is bypassed
            if($age < 0)
            {
                $age = 18;
            }
            $this->age = $age;
        }
        
        function getAge()
        {
            return $this->age;
        }
      
        function setGender($gender)
        {
       
            $this->gender = $gender;
        }
     
        function getGender()
        {
            return $this->gender;
        }
     
        function setPhone($phone)
        {
            $this->phone = $phone;
        }
        
        function getPhone()
        {
            return $this->phone;
        }
      
        function setEmail($email)
        {
            $this->email = $email;
        }

        function getEmail()
        {
            return $this->email;
        }
         
        function setState($state)
        {
            $this->state = $state;
        }
                
        function getState()
        {
            return $this->state;
        }
     
        function setSeeking($seeking)
        {
            $this->seeking = $seeking;
        }
    
        function getSeeking()
        {
            return $this->seeking;
        }
    
        function setBio($bio)
        {
            $this->bio = $bio;
        }
        
        function getBio()
        {
            return $this->bio;
        }
    }
    
    