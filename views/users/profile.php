<link type="text/css" rel="stylesheet" href="<?= auto_version(ASSETS_URL . 'css/profile.css'); ?>" />
<div class="container">

    <div class="profileData-center">
        <h3>Editare profil</h3>
    </div>
    <div class="myContainer-profile">
        <div class="register-form">
            <form action="<?= ROOT_URL . 'users/profile' ?>" id="register-form" method="post">
                <div class="form-group profileData-center">
                    <label for="email">Adresa de email curenta:</label>
                    <input class="form-control" value="<?= $viewData['user']->email ?>" readonly>
                </div>
                <div class="form-group profileData-center">
                    <label for="pwd">Introduceti parola:</label>
                    <input name="password" type="password" class="form-control" id="pwd" placeholder="Introduceti vechea parola" required>
                </div>
                <div class="form-group myFormGroup-profile">
                    <div class="profileData profileData-left">
                        <label for="firstname">Nume curent:</label>
                        <input class="form-control" value="<?= $viewData['user']->firstName ?>" readonly>
                    </div>
                    <div class="profileData profileData-right">
                        <label for="firstname">Nume:</label>
                        <input name="first_name" type="text" class="form-control" id="firstname" placeholder="Introduceti numele nou" pattern="[A-Za-z]{3-10}" title="Numele poate sa aiba intre 3 si 10 litere!">
                    </div>
                </div>
                <div class="form-group myFormGroup-profile">
                    <div class="profileData profileData-left">
                        <label for="firstname">Prenume curent:</label>
                        <input class="form-control" value="<?= $viewData['user']->lastName ?>" readonly>
                    </div>
                    <div class="profileData profileData-right">
                        <label for="lastname">Prenume:</label>
                        <input name="last_name" type="text" class="form-control" id="lastname" placeholder="Introduceti prenumele nou" pattern="[A-Za-z]{3-10}" title="Prenumele poate sa aiba intre 3 si 10 litere!">
                    </div>
                </div>
                <div class="form-group myFormGroup-profile">
                    <div class="profileData profileData-left">
                        <label for="new_pwd">Noua parola:</label>
                        <input name="new_password" type="password" class="form-control" id="new_pwd" placeholder="Introduceti noua parola" minlength="6" title="Parola trebuie sa aiba minim 6 caractere!">
                    </div>
                    <div class="profileData profileData-right">
                        <label for="new_pwd_re">Reintroduceti noua parola:</label>
                        <input name="new_password_repeat" type="password" class="form-control" id="new_pwd_re" placeholder="Introduceti aceeasi parola">
                    </div>
                </div>
                <div class="form-group profileData-center">
                    <button type="submit" class="btn btn-success">Modifica datele</button>
                </div>
            </form>
            <?php 
                if (isset($viewData['error'])) {
                    $msg = implode(".", $viewData['msg']);
                } else {
                    $msg = isset($viewData['msg_success']) ? $viewData['msg_success'] : '';
                }
                ?>
                </br>
                <p class="myError"><?= $msg ?></p>
        </div>
    </div>
</div>

<script src="<?php echo auto_version(ASSETS_URL . '/js/profile.js'); ?>"></script>