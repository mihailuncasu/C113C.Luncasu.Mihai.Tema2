<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap & CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="<?= auto_version(ASSETS_URL . 'css/login.css'); ?>" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>Login | <?= webPageTitle ?></title>
    </head>


    <body>
        <div class="container">
            <img class="logo-container" src="<?= LOGO_IMAGES ?>0.png" onclick="goHome('<?= ROOT_URL ?>')" alt="Logo">
            <div class="myContainer-login">
                <div class="login-form-container">
                    <form id="login-form">
                        <h3>Intrati in cont</h3>
                        <div class="form-group myFormGroup" id="email-input">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="login-form-email" placeholder="Introduceti email-ul">
                            <label id="email-error" style="color: red; margin-top: 3%" class="hidden-content"> </label>
                            <label id="email-msg" style="margin-bottom: 3%; margin-top: 3%" class="hidden-content"> </label>
                            <button class="btn btn-info" id="myGo-button">Go!</button>
                        </div>
                        <div id="login-hidden-div" class="hidden-content">
                            <div class="form-group myFormGroup">
                                <label for="pwd">Parola:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Introduceti parola">
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox">Remember me </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Intra in cont</button>
                            <input type="number" id="stage" value="0" style="display: none" />
                        </div>
                        <div id="register-hidden-div" class="hidden-content">
                            <button onclick="userOption('register', '<?= ROOT_URL ?>')" class="myButton-login btn btn-success">Inregistreaza-te</button>
                            <button onclick="userOption('home', '<?= ROOT_URL ?>')" class="myButton-login btn btn-info">Intoarce-te pe pagina principala</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?php echo auto_version(ASSETS_URL . '/js/login.js'); ?>"></script>
    </body>  
</html>