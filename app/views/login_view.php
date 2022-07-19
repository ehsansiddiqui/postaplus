<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Postaplus Admin</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url(); ?>assets/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
<!--                <div class="login-logo"></div>-->
                <div class="login-body">        
                    <?php if(@$msg){?>
                     <div class="login-title"><span style="color:red;"><?php echo @$msg ?></span></div>
                    <?php } ?>
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    
                    <form action="<?php echo site_url('login/varify') ?>" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="user" class="form-control" placeholder="Username" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="pass" class="form-control" placeholder="Password" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
<!--                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>-->
                        </div>
                        <div class="col-md-6">
                         <input type="submit"  name="submit" class="btn btn-info btn-block" value="Log In" />
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; <?=date('Y')?> Postaplus (Version 0.1)
                    </div>
<!--                    <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>-->
                </div>
            </div>
            
        </div>
        
    </body>
</html>