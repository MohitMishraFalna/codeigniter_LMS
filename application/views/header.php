<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" href="<?= base_url('static/bootstrap/css/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?= base_url('static/css/style.css');?>">
        <style>
            body{
                background: #f6f9ff;
            }
            .card{
                box-shadow: 0px 0 30px rgb(1 41 112 / 10%);
                border: none;
            }
            .card-header{
                background-color: #0b1e42;
                border-bottom:none;
            }
            h3, h4, h5{
                color: #f6f9ff;
                /* 87a6e3 */
            }
        </style>
    </head>
    <body class="cover" id="bodybg">
            <!-- if session is set so display the logout link otherwise display login. -->
            <?php if(!$this->session->userdata('logged_in')):?>
                <img src="<?php echo base_url('static/bootstrap/img/library3.jpeg');?>" class="loginimg">
            <?php endif; ?>
        <div class="container">
            <div></div>
            
            <?php if($this->session->userdata('logged_in')):?>
                <nav class="navbar navbar-expand-lg bg-dark">
            <?php else:?>                   
                <!-- <nav class="navbar navbar-expand-lg navbar-light navbackground"> -->
                <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <?php endif;?>      
                <div>
                    <!-- Retrieve data from database using session. -->
                    <?php if($this->session->userdata('logged_in')):?>
                        <!-- when user login his photo display as profile picture -->
                        <img src="<?php echo $this->session->userdata('user_img');?>" class="profileimage"> 
                    <?php endif;?>
                </div>
                <a class="navbar-brand nav-link text-white">LMS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto dropdawn">
                        <?php if($this->session->userdata('logged_in')):?>
                        <li class="nav-item"><a class="nav-link text-white" href="<?php echo base_url('/employee_panel/workbanch');?>">Home</a>
                        </li>
                        <!-- if session is set so display the logout link otherwise display login. -->
                        <li class="nav-item"><a href="#" class="nav-link text-white"><!--<i class="fas fa-user-cog" style='font-size: 25px; color:rgba(0,0,50,0.6);'></i>-->New Entry</a>
                            <ul class="navbar-nav menu">
                                <li><a href="<?php echo base_url('/book/Books'); ?>">Book</a></li>
                                <li><a href="<?php echo base_url('/book/Books/add_authorDetails'); ?>">Author</a></li>
                                <li><a href="<?php echo base_url('/book/Books/add_publisherDetails'); ?>">Publisher</a></li>
                            </ul>
                        </li>
                        <li class="float-left"><a href="#" class="nav-link text-white"><!--<i class="fas fa-user-cog" style='font-size: 25px; color:rgba(0,0,50,0.6);'></i>-->Update Entry</a>
                            <ul class="navbar-nav">
                                <li><a href="<?php echo base_url('/book/Books/editBookDetails'); ?>">Book</a></li>
                                <li><a href="<?php echo base_url('/book/Books/edit_authorDetails'); ?>">Author</a></li>
                                <li><a href="<?php echo base_url('/book/Books/edit_publisherDetails'); ?>">Publisher</a></li>
                            </ul>
                        </li>
                    </ul>
                        <div class="nav-item float-right">
                            <ul class="navbar-nav dropdawn">
                                <li><a href="#" class="nav-link"><i class="fas fa-user-cog text-success"></i></a>
                                    <ul class="nav-item">
                                        <li><a href="<?php echo base_url('/LMS_Login/login/userLogout'); ?>">Logout</a></li>
                                        <li><a href="<?php echo base_url('/LMS_Login/updateprofile/'); ?>">UpdateProfile</a></li>
                                        <li><a href="<?php echo base_url('/LMS_Login/updateprofile/updatepassword'); ?>">ChangePassword</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    <?php else:?>                        
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo base_url('/LMS_Register/registration'); ?>">Ragistration <span class="sr-only">(current)</span></a>
                        </li>
                        <div class="nav-item">
                            <a class="nav-link text-white" href="<?php echo base_url('/LMS_Login/login'); ?>">Login</a>
                        </div>                          
                        <div class="nav-item float-right">
                            <a class="nav-link text-white" href="<?php echo base_url('LMS_Login/login/newPasswordUpdate'); ?>">Forget Password</a>
                        </div>
                    <?php endif; ?>
                </div>
            </nav>