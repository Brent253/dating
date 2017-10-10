<!--
    Name: Brent Taylor
    04/09/2017
    URL: http://btaylor.greenrivertech.net/IT328/dating/
    My Dating Website.
-->
<?php
    //Get member object
    $member = $_SESSION['member'];
    
    //Store properties to variables
    $fname = $member->getFirstName();
    $lname = $member->getLastName();
    $name = $fname . ' ' . $lname;
    $age = $member->getAge();
    $gender = $member->getGender();
    $phone = $member->getPhone();
    $email = $member->getEmail();
    $state = $member->getState();
    $seeking = $member->getSeeking();
    $bio = $member->getBio();
    
	 //Initialize interests arrays
      $indoorInterests = "";
      $outdoorInterests = "";
    
    //Retrieve interests if premium
    if (get_class($member) == PremiumMember) {
        $indoorInterestArray = $member->getInDoorInterests();
        $outdoorInterestArray = $member->getOutDoorInterests();

        //Check if indoor interests isnt empty
        if (!empty($indoorInterestArray)) {
            //Concatenate array into string variable
            foreach ($indoorInterestArray as $indoors)
            {
                $indoorInterests .= $indoors . " ";
            }
        }
        
        //Check if outdoor interests is not empty
        if (!empty($outdoorInterestArray)) {
            //Concatenate array into string variable variable
            foreach ($outdoorInterestArray as $outdoors)
            {
                $outdoorInterests .= $outdoors . " ";
            }
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <title>Contact Page</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/styles.css" type="text/css">
         
        <!-- bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
         
        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
       
    </head>
     
    <body>
   <!--NavBar-->
    <nav class="navbar navbar-default">
    <a class="navbar-brand" href="http://btaylor.greenrivertech.net/IT328/dating/">My Dating Website</a>
    <a class="navbar-brand" href="http://btaylor.greenrivertech.net/IT328/dating/admin">Admin</a>
    </nav>
         
       
        <div class="container" id="contained">
			<br/>
            <div class="row">
                       <div class="col-md-6">
                                <ul id="summary" class="list-group">
                                    <li class="list-group-item">Name: <?php echo $name; ?></li>
                                    <li class="list-group-item">Gender: <?php echo $gender; ?></li>
                                    <li class="list-group-item">Age: <?php echo $age; ?></li>
                                    <li class="list-group-item">Phone: <?php echo $phone; ?></li>
                                    <li class="list-group-item">Email: <?php echo $email; ?></li>
                                    <li class="list-group-item">State: <?php echo $state; ?></li>
                                    <li class="list-group-item">Seeking: <?php echo $seeking; ?></li>
                                    <?php
                                        if (get_class($member) == PremiumMember) {
                                            echo "<li class='list-group-item'>Interests: {$indoorInterests} {$outdoorInterests}</li>";
                                        }
                                    ?>
                                </ul>
                             <!--End profile summary-->
				
		
                        
							<br>
                          <div class="col-xs-2 col-xs-offset-8">
                            <div class="pull-right">
                        <button type="button" class="btn btn-primary">Contact Me! </button>
                          </div>
                    </div>
						  
						  
            </div>
      
				
						<div class="col-sm-3">
			<!-- Profile Picture-->
			
			<img src="images/user.png" class="img-responsive center-block img-rounded" alt="profile picture" >
		
			<!-- Bio paragraph -->
			<div class="lead">
				<center>Biography</center>
			</div>
			<div class="text-center">
				<?=$bio?>
			</div>
		</div>
			</div>
		</div>
    </body>
</html>