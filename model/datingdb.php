<?php
/* CREATE TABLE members
(
    member_id int PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(50),
    lname VARCHAR(50),
    age int,
    gender VARCHAR(6),
    phone VARCHAR(20),
    email VARCHAR(50),
    state VARCHAR(50),
    seeking VARCHAR(6),
    bio VARCHAR(500),
    premium tinyint,
    image VARCHAR(100),
    interests VARCHAR(100)
) */
    
    //CONNECT to DB
    class DatingDB
    {
        private $_pdo;
        
        function __construct()
        {
            //Require configuration file
            require_once '/home/btaylor/datingconfig.php';
            
            try {
                //Establish database connection
                $this->_pdo = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                
                //Keep the connection open for reuse to improve performance
                $this->_pdo->setAttribute( PDO::ATTR_PERSISTENT, true);
                
                //Throw an exception whenever a database error occurs
                $this->_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch (PDOException $e) {
                die( "Error!: " . $e->getMessage());
            }
        }
        
         
       
        //When a user completes their profile, you will add a row to the members table.
        function addMember($fname, $lname, $age, $gender, $phone, $email, $state,
                           $seeking, $bio, $premium, $image, $interests)
        {
            $insert = 'INSERT INTO members (fname, lname, age, gender, phone, email,
            state, seeking, bio, premium, image, interests) VALUES (:fname, :lname, :age, :gender, :phone, :email, :state,
            :seeking, :bio, :premium, :image, :interests)';
            
            //Use a Prepared Statement and bound parameters.
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':fname', $fname, PDO::PARAM_STR);
            $statement->bindValue(':lname', $lname, PDO::PARAM_STR);
            $statement->bindValue(':age', $age, PDO::PARAM_STR);
            $statement->bindValue(':gender', $gender, PDO::PARAM_STR);
            $statement->bindValue(':phone', $phone, PDO::PARAM_STR);
            $statement->bindValue(':email', $email, PDO::PARAM_STR);
            $statement->bindValue(':state', $state, PDO::PARAM_STR);
            $statement->bindValue(':seeking', $seeking, PDO::PARAM_STR);
            $statement->bindValue(':bio', $bio, PDO::PARAM_STR);
            $statement->bindValue(':premium', $premium, PDO::PARAM_STR);
            $statement->bindValue(':image', $image, PDO::PARAM_STR);
            $statement->bindValue(':interests', $interests, PDO::PARAM_STR);
            
            //Execute statement after binding values
            $statement->execute();
            
            //Return ID of inserted row
            return $this->_pdo->lastInsertId();
        }
         
        //READ
        /**
         * Returns all pets in the database collection.
         *
         * @access public
         *
         * @return an associative array of pets indexed by id
         */
        function allMembers()
        {
            $select = 'SELECT member_id, fname, lname, age, gender, phone, email, state,
            seeking, bio, premium, image, interests FROM members';
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each member id to a row of data for that member
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['member_id']] = $row;
            }
             
            return $resultsArray;
        }
         
        /**
         * Returns a pet that has the given id.
         *
         * @access public
         * @param int $id the id of the pet
         *
         * @return an associative array of pet attributes, or false if
         * the pet was not found
         */
        function memberById($id)
        {
            $select = 'SELECT member_id, fname, lname, age, gender, phone, email, state,
            seeking, bio, premium, image, interests FROM members WHERE id=:member_id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':member_id', $id, PDO::PARAM_INT);
            $statement->execute();
             
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
         
        /**
         * Returns true if the name is used by a pet in the database.
         *
         * @access public
         * @param string $name the name of the pet to look for
         *
         * @return true if the name already exists, otherwise false
         */   
        function memberNameExists($fname)
        {            
            $select = 'SELECT member_id, fname, lname, age, gender, phone, email, state,
            seeking, bio, premium, image, interests FROM members WHERE fname=:fname';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':fname', $fname, PDO::PARAM_STR);
            $statement->execute();
             
            $row = $statement->fetch(PDO::FETCH_ASSOC);
             
            return !empty($row);
        }
         
        //UPDATE
      
         /**
         * Updates the attributes for a pet in the database.
         *
         * @access public
         * @param int $id the id of the pet
         * @param string $name the name of the pet
         * @param string $type the type of pet (giraffe, turtle, bear, ...)
         * @param string $color the color of the animal
         */  
    /*    function updatePet($id, $name, $type, $color)
        {          
            $update = 'UPDATE pets SET name=:name, type=:type, color=:color
                                   WHERE id=:id';
             
            $statement = $this->_pdo->prepare($update);
            $statement->bindValue(':name', $name, PDO::PARAM_STR);
            $statement->bindValue(':type', $type, PDO::PARAM_STR);
            $statement->bindValue(':color', $color, PDO::PARAM_STR);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
             
            $statement->execute();
        }
         
        //DELETE
         
        /**
         * Deletes the pet associated with the input id.
         *
         * @access public
         * @param int $id the id of the pet
         *
         * @return true if the delete was successful, otherwise false
         */
      /*  function deletePet($id)
        {        
            $delete = 'DELETE FROM pets WHERE id=:id';
             
            $statement = $this->_pdo->prepare($delete);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
             
            return $statement->execute();
        } */
    }