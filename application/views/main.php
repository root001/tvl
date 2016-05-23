<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="public/img/favicon.png">
        <!-- favicon ends --->

        <!--- LOAD FILES --->
        <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <link rel="stylesheet" href="<?= base_url() ?>public/css/main.css">
        
        <?php if($_SERVER['HTTP_HOST'] == "localhost"): ?>
        <link rel="stylesheet" href="<?= base_url() ?>public/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/bootstrap/css/bootstrap-theme.min.css" media="screen">
        <link rel="stylesheet" href="<?= base_url() ?>public/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/font-awesome/css/font-awesome-animation.min.css">
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/bootstrap/js/bootstrap.min.js"></script>
        
        <?php else: ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.8/font-awesome-animation.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <?php endif; ?>
		
        <script src="<?= base_url() ?>public/js/main.js"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <!-- navbar -->
        <div class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <!-- Button for smallest screens -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=base_url()?>">
                        <img style="margin-top:-8px" src="" alt="Logo" class="img-responsive">
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="pageMenu">
                    <ul class="nav navbar-nav navbar-right" id="pageMenuUL">
                        <li>
                            <a href="<?=base_url('blog')?>">Blog</a>
                        </li>
                        <li class="<?= isset($pageTitle) && $pageTitle === 'FAQ' ? 'active' : '' ?>">
                            <a href="<?=base_url('about')?>">FAQ</a>
                        </li>
                        <li class="<?= isset($pageTitle) && $pageTitle === 'Contact us' ? 'active' : '' ?>">
                            <a href="<?=base_url('contact')?>">Contact Us</a>
                        </li>
                        <li class="dropdown" id="sessDet">
                            
                            <?php if(isset($_SESSION['vendor_id'])): ?>
                            
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user fa-lg"></i>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-menu-header text-center">
                                    <strong>Account</strong>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?=base_url('dashboard')?>">
                                        <i class="fa fa-user fa-fw"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url('messages')?>">
                                        <i class="fa fa-envelope fa-fw"></i>
                                        Messages
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?= site_url('logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                            </ul>
                            
                            <?php else: ?>
                            
                            <!--<a class="btn" href="#" id="logInMenuClk">SIGN IN / SIGN UP</a>-->
                            <button class="btn btn-primary btn-sm" id="logInMenuClk" style="margin-top:8px">SIGN IN / SIGN UP</button>
                            
                            <?php endif; ?>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div> 
        <!-- /.navbar -->
        
		<?= isset($pageContent) ? $pageContent : "" ?>
        
        <div class="container-fluid main-body">
            <div class="row" id="pageContent">
                
            </div>
        </div>
        
        
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sn-12 text-center">
                        Copyright &copy; TVL <?=date('Y')?>
                    </div>
                </div>
            </div>
        </div>
        
        <!--- LOGIN MODAL ---->
        <!---Signup and login Modal--->
        <div class="modal fade signLogModal" role='dialog' data-backdrop='static' id='signLogModal'>
            <div class="modal-dialog">
                <!---- Sign up div----->
                <div class="modal-content" id='signUpDiv'>
                    <div class="modal-header">
                        <button class="close closeLogInSignUpModal">&times;</button>
                        <h4 class="text-center">Sign Up</h4>
                        <div id='signupFMsg' class="text-center"></div>
                    </div>
                    <div class="modal-body">
                        <form id='signupForm' name="signupForm">
                            <div class="row">
                                <div class="col-md-6 form-group-sm">
                                    <label for='firstName' class="control-label">First Name</label>
                                    <input type="text" id='firstName' class="form-control" placeholder="First Name">
                                    <span class="help-block errMsg" id="firstNameErr"></span>
                                </div>
                                
                                <div class="col-md-6 form-group-sm">
                                    <label for='lastName' class="control-label">Last Name</label>
                                    <input type="text" id='lastName' class="form-control" placeholder="Last Name">
                                    <span class="help-block errMsg" id="lastNameErr"></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 form-group-sm">
                                    <label for='emailOrig' class="control-label">E-mail</label>
                                    <input type="email" id='emailOrig' class="form-control checkField" placeholder="E-mail">
                                    <span class="help-block errMsg" id="emailOrigErr"></span>
                                </div>
                                
                                <div class="col-md-6 form-group-sm">
                                    <label for='emailDup' class="control-label">Re-type E-mail</label>
                                    <input type="email" id='emailDup' class="form-control" placeholder="Re-type E-mail">
                                    <span class="help-block errMsg" id="emailDupErr"></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 form-group-sm">
                                    <label for='pwordOrig' class="control-label">Password</label>
                                    <input type="password" id='pwordOrig' class="form-control checkField" placeholder="Password">
                                    <span class="help-block errMsg" id="pwordOrigErr"></span>
                                </div>
                                <div class="col-md-6 form-group-sm">
                                    <label for='pwordDup' class="control-label">Re-type Password</label>
                                    <input type="password" id='pwordDup' class="form-control" placeholder="Re-type Password">
                                    <span class="help-block errMsg" id="pwordDupErr"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 pull-right">
                                    <button type='button' id='signupSubmit' class="btn btn-primary btn-sm">Sign Up</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="pull-left pointer">Have an account? <a id='loginClk'> Log in </a></div>
                    </div>
                </div>
                <!---- End of sign up div----->
                
                
                
                
                <!---- Log in div below----->
                <div class="modal-content hidden" id='logInDiv'>
                    <div class="modal-header">
                        <button class="close closeLogInSignUpModal">&times;</button>
                        <h4 class="text-center">Log In</h4>
                        <div id="logInFMsg" class="text-center errMsg"></div>
                    </div>
                    <div class="modal-body">
                        <form id='loginForm' name="loginForm">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for='email' class="control-label">E-mail</label>
                                    <input type="email" id='emailLogIn' class="form-control checkField" placeholder="E-mail">
                                    <span class="help-block errMsg" id="emailLogInErr"></span>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for='logInPassword' class="control-label">Password</label>
                                    <input type="password" id='logInPassword'class="form-control checkField" placeholder="Password">
                                    <span class="help-block errMsg" id="logInPasswordErr"></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-2">
                                    <button id='loginSubmit' class="btn btn-primary btn-sm">Log in</button>
                                </div>
                                
                                <div class="col-md-5" id="gSignInBtn"></div>
                                
                                <div class="col-md-5">
                                    <button class="btn btn-primary btn-sm pull-right" id="fbLogin">
                                        <i class="fa fa-facebook-official"></i> Sign in with Facebook
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="pull-left">Need an account? 
                            <a id='signUpClk' class="pointer"> Sign Up </a>
                        </div>
                    </div>
                </div>
                <!---- End of log in div----->
            </div>
        </div>
        <!---end of signup/login Modal-->
        <!-- END OF LOGIN MODAL -->
    </body>
</html>