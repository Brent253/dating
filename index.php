<?php
/*
    Name: Brent Taylor
    04/09/2017
    URL: http://btaylor.greenrivertech.net/IT328/dating/
    My Dating Website.
*/
    
    //Require autoload
    require_once('vendor/autoload.php');
    //Start session
    session_start();
    
    //Create an instance of the Base class
    $f3 = Base::instance();
    
    //Set debug level
    $f3->set('DEBUG', 3);

    //Instantiate the database class
    $datingDB = new DatingDB();
   
    
    //Define a default route
    $f3->route('GET /', function() {
                $view = new View;
                echo $view->render('pages/home.html');
            }
    );
    

    //Path to admin page requires $f3 parameter pass or it will give a set error out
     $f3->route('GET /admin',
                function($f3) {
             //Get all members from the database
           $members = $GLOBALS['datingDB']->allMembers();
  
            //Assign the members to an f3 variable
             $f3->set('members', $members);
        
        
                $view = new View;
                echo $view->render('pages/admin.php');
            }
    );
    
    //Route to personal info form
    $f3->route('GET /personalinfo',
                function() {
                    $view = new View;
                    echo $view->render('pages/personalinfo.html');
           });

    //Route to profile form
    $f3->route('POST /profile',
                function() {
                    /*
                     * Create membership object depending on whether "Premium
                     * Membership" option has been selected or not.
                     */
                    if (isset($_POST['premium-member'])) {
                        $member = new PremiumMember();
                    } else {
                        $member = new Member();
                    }
                    
                    //Set member object's properties
                    $member->setFirstName($_POST['firstname']);
                    $member->setLastName($_POST['lastname']);
                    $member->setAge($_POST['age']);
                    $member->setGender($_POST['gender']);
                    $member->setPhone($_POST['phone']);
                    
                    //Store updated member object into session
                    $_SESSION['member'] = $member;
                     
                     //Create new view and render profile page
                     $view = new View;
                     echo $view->render('./pages/profile.html');
            });
    
    /*
     *  Route to interests form if premium member. Route to profile
     *  summary otherwise.
     */
    $f3->route('POST /member',
                function($f3) {
                    
                    //Retrieve member object from session variable
                    $member = $_SESSION['member'];
                    
                    //Set member object properties
                    $member->setEmail($_POST['email']);
                    $member->setState($_POST['state']);
                    $member->setSeeking($_POST['seeking']);
                    $member->setBio($_POST['biography']);
                    
                    /*
                     * Create new view. If premium member, render the Interests form.
                     * If not, render the profile page.
                     */
                    $view = new View;
                    if (get_class($member) == PremiumMember) {
                        //Store updated member object back into session
                        $_SESSION['member'] = $member;   
                        echo $view->render('pages/interests.html');  
                    } else {
                        echo $view->render('pages/profile_summary.php');
                    }
                });
    
    //Route to profile summary
    $f3->route('POST /profile_summary',
                function($f3) {
           
                    //Retrieve the member object
                    $member = $_SESSION['member'];
                    
                    //Set premium member arrays
                    $member->setInDoorInterests($_POST['indoor_interests']);
                    $member->setOutDoorInterests($_POST['outdoor_interests']);
                        
                        //set fields for table
                        $f3->set('fname', $member->getFirstName());
                        $f3->set('lname', $member->getLastName());
                        $f3->set('age', $member->getAge());
                        $f3->set('gender', $member->getGender());
                        $f3->set('phone', $member->getPhone());
                        $f3->set('email', $member->getEmail());
                        $f3->set('state', $member->getState());
                        $f3->set('seeking', $member->getSeeking());
                        $f3->set('bio', $member->getBio());
                        if($member instanceof PremiumMember){
                            $f3->set('isPremium', 'true');
                            $f3->set('indoorInterests', $member->getInDoorInterests());
                            $f3->set('outdoorInterests', $member->getOutDoorInterests());
                            $indoorinterests = implode(", ", $member->getInDoorInterests());
                            $outdoorinterests = implode(", ", $member->getOutDoorInterests());
                            $allinterests = $indoorinterests . ", " . $outdoorinterests;
                            $members = $GLOBALS['datingDB'];
                            $members->addMember($member->getFirstName(), $member->getLastName(), $member->getAge(),
                                                  $member->getGender(), $member->getPhone(), $member->getEmail(),
                                                  $member->getState(), $member->getSeeking(), $member->getBio(),
                                                  '1', '',  $allinterests);
                        }
                        
                            else{
                            $f3->set('indoorInterests', "");
                            $f3->set('outdoorInterests', "");
                            $members = $GLOBALS['datingDB'];
                            $members->addMember($member->getFirstName(), $member->getLastName(), $member->getAge(),
                                                  $member->getGender(), $member->getPhone(), $member->getEmail(),
                                                  $member->getState(), $member->getSeeking(), $member->getBio(),
                                                  '0', '',  '');                            
                        }

                      
                    //Create new view and render profile summary page
                    $view = new View;
                    echo $view->render('pages/profile_summary.php');
                });

    //Run fat free
    $f3->run();