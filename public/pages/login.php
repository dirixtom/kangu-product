<?php
session_start();
require_once("../php-assets/class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
    $login->redirect('advert-overview.php');
}

if(isset($_POST['login-button']))
{
    $user_email = strip_tags($_POST['user-email']);
    $user_password = strip_tags($_POST['user-password']);
        
    if($login->doLogin($user_email, $user_password))
    {
        $login->redirect('advert-overview.php');
    }
    else
    {
        $error[] = "Je inloggegevens zijn niet correct.";
    }   
}
?>
<!doctype html>
<html class="no-js" lang="nl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Aanmelden</title>
        <link rel="stylesheet" href="../css/minimum-viable-product.min.css">
    </head>

    <body>
        <div class="full-width full-width-login">
            <div class="half-height-gradient"></div>
                <div class="row">
                    <div class="large-4 medium-6 small-12 small-centered columns login-input-panel">
                        <form method="post" data-abide novalidate>
                            <div class="row">
                                <div class="large-12 text-center columns">
                                    <h1 class="login-header">Aanmelden</h1>
                                    <hr class="blue-horizontal-line"></hr>

                                    <div class="large-12 columns">
                                        <input type="email" placeholder="jouw e-mail adres" name="user-email" required>
                                        <div class="form-error">Dit is geen geldig e-mail adres.</div>
                                    </div>

                                    <div class="large-12 columns">
                                        <input type="password" placeholder="jouw wachtwoord" name="user-password" 
                                               pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z]).*$" required>
                                        <div class="form-error">Dit is geen geldig wachtwoord.</div>
                                    </div>

                                    <div class="large-12 columns">
                                        <?php 
                                            if(isset($error)) { 
                                                foreach($error as $error) { ?>
                                                    <div class="large-12 columns error-callout">
                                                        <?php echo $error; ?>
                                                    </div>
                                        <?php   }
                                            } ?>

                                        <input type="submit" class="login-account-button" value="Aanmelden" name="login-button">
                                        <a href="password-reset-mail.php" class="forgot-password-link">Wachtwoord vergeten?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="../js/minimum-viable-product.min.js"></script>
        <script src="https://use.typekit.net/vnw3zje.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
    </body>
</html>