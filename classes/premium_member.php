<?php

    
/**
 *  The Premium Member class
 */
    class PremiumMember extends Member
    {
        //Fields
        private $_inDoorInterests;
        private $_outDoorInterests;
        
        function setInDoorInterests($_inDoorInterests)
        {
          
            $this->_inDoorInterests = $_inDoorInterests;
        }
        
        function getInDoorInterests()
        {
            return $this->_inDoorInterests;
        }
        
        function setOutDoorInterests($_outDoorInterests)
        {
            $this->_outDoorInterests = $_outDoorInterests;
        }
         
        function getOutDoorInterests()
        {
            return $this->_outDoorInterests;
        }
    }