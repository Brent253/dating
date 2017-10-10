<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <title>Admin form</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
         
        <!-- bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
         
        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="">
    </head>
     
    <body>
    <!--NavBar-->
    <nav class="navbar navbar-default">
    <a class="navbar-brand" href="http://btaylor.greenrivertech.net/IT328/dating/">My Dating Website</a>
    <a class="navbar-brand" href="http://btaylor.greenrivertech.net/IT328/dating/admin">Admin</a>
    </nav>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Our Members
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <th>Member ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>State</th>
                                    <th>Seeking</th>
                                    <th>Bio</th>
                                    <th>Premium</th>
                                    <th>Interests</th>
                                 
                                </thead>
                                <tbody>
                                    <?php
                                        //Display all members
                                        foreach ($members as $member) {
                                            $id = $member['member_id'];
                                            $fname = $member['fname'];
                                            $lname = $member['lname'];
                                            $age = $member['age'];
                                            $gender = $member['gender'];
                                            $phone = $member['phone'];
                                            $email = $member['email'];
                                            $state = $member['state'];
                                            $seeking = $member['seeking'];
                                            $bio = $member['bio'];
                                            $premium = $member['premium'];
                                            $interests = $member['interests'];
                                         
                                            //Echo table headings
                                            echo "<tr><td>$id</td>
                                                            <td>$fname</td>
                                                            <td>$lname</td>
                                                            <td>$age</td>
                                                            <td>$gender</td>
                                                            <td>$phone</td>
                                                            <td>$email</td>
                                                            <td>$state</td>
                                                            <td>$seeking</td>
                                                            <td>$bio</td>
                                                            <td>$premium</td>
                                                            <td>$interests</td>
                                                      </tr>";

                                        }
                                        
                                        
                                        
                                    ?>
                                        
                                </tbody>
                            </table>
                            
                          
                        </div> <!-- end panel-body -->
                                            
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>