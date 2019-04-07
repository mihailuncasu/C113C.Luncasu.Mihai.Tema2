<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap & CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="<?= auto_version(ASSETS_URL . 'css/register.css'); ?>" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>Register | <?= webPageTitle ?></title>
    </head>


    <body>
        <div class="container">
            <img class="logo-container" src="<?= LOGO_IMAGES ?>0.png" alt="Logo" onclick="goHome('<?= ROOT_URL ?>')">
            <div class="myContainer-register">
                <div class="register-form">
                    <form id="register-form">
                        <h3>Inregistrare</h3>
                        <div class="form-group myFormGroup">
                            <label for="firstname">Nume:</label>
                            <input type="firstname" class="form-control" id="firstname" placeholder="Introduceti numele">
                        </div>
                        <div class="form-group myFormGroup">
                            <label for="lastname">Prenume:</label>
                            <input type="lastname" class="form-control" id="lastname" placeholder="Introduceti numele">
                        </div>
                        <div class="form-group myFormGroup">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Introduceti email-ul">
                        </div>
                        <div class="form-group myFormGroup">
                            <label for="pwd">Parola:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Introduceti parola">
                        </div>
                        <div class="form-group myFormGroup">
                            <label for="pwd_re">Parola:</label>
                            <input type="password" class="form-control" id="pwd_re" placeholder="Introduceti aceeasi parola">
                        </div>
                        <button type="submit" class="btn btn-default">Inregistrare</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?php echo auto_version(ASSETS_URL . '/js/register.js'); ?>"></script>
    </body>  
</html>