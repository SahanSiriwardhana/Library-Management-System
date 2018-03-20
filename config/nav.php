<nav class="navbar fixed-top navbar-toggleable-md w3-light-gray w3-card" style="height:50px">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand " href="#">Library Management System</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#"> </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-bell"></span> 
                        
                        
                    </a>
                    <ul class="dropdown-menu w3-card-4" style="overflow-y: scroll;
overflow-x: hidden;
max-height: 260px;">

	<?php			for($i=0;$i<1;$i++){  ?>
                        <li>
                            <div class="navbar-login" style="">
                                <div class="row">
                                    
                                    <div class="col-lg-12">
                                        <p class="text-left"><strong></strong></p>
                                        <p class="text-left small"></p><p></p>
                                       
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <?php }?>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong><?php echo $uname;?></strong>
                        
                    </a>
                    <ul class="dropdown-menu w3-card-4">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                      <a href="Upload_profilepic.php">  <img src="<?php echo'data:image/jpeg;base64,' . $image1 . '' ?>" class="w3-circle w3-centered icon-size" onMouseOver="this.style.color='black'"/></a>
                                            
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong><?php echo $fname1." ".$lname1;?></strong></p>
                                        <p class="text-left small"><?php echo $email1;?></p>
                                        <p class="text-left">
                                            <a href="#" class="w3-link" onClick="window.location.href='Edit_profile.php'"><i class="fa fa-user"></i> My Account</a><br/>
                                             <a href="#" class="w3-link" onClick="window.location.href='Password_change_manual.php'"><i class="fa fa-key"> </i> My Password</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <button onClick="window.location.href='logout.php'" class="w3-btn w3-red btn-block">Sign out</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                
                
                
            </ul>
            </div>
        </nav>