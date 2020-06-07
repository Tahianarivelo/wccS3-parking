<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            
            <div class="container">
                <?php if($page=="login"){?> 
                    <div class="signup-content">
                    <?php if(isset($error)){ ?> 
                        <h4 style="color:red;"><?php echo $error; ?></h4>
                    <?php } ?>
                    <form method="POST" action="<?php echo base_url(); ?>Back/login" id="signup-form" class="signup-form">
                        <h2 class="form-title">Laoginina</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="nom" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="mdp" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Hiditra"/>
                        </div>
                    </form>
                    <p class="loginhere">
                       Mbola tsy misy Kaonty ? <a href="<?php echo base_url(); ?>back/InscriptionPage" class="loginhere-link">Mamorona eto</a>
                    </p>
                </div>
               <?php }else{ ?>
               
                <div class="signup-content">
                <?php if(isset($error)){ ?> 
                    <h4 style="color:red;"><?php echo $error; ?></h4>
                <?php } ?>
                    <form method="POST" id="signup-form" action="<?php echo base_url(); ?>back/Inscription" class="signup-form">
                        <h2 class="form-title">Mamorona Kaonty</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="nom" id="name" placeholder="Anarana"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="mdp" id="password" placeholder="Teny Miafina"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="ConfirMdp" id="re_password" placeholder="Avereno ny teny  Miafina"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Foronina"/>
                        </div>
                    </form>
                    <p class="loginhere">
                       Efa manana Kaonty ? <a href="<?php echo base_url(); ?>back" class="loginhere-link">Laoginina eto</a>
                    </p>
                <?php } ?>
                
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="<?php echo base_url();?>assets/login/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/login/js/main.js"></script>
</body>
</html>