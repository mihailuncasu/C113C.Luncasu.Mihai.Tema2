<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap & CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= ASSETS_URL ?>css/main.css">
        <title><?= webPageTitle ?></title>
    </head>

    <body>
        <!--HEADER-->        
        <div class="topnav" id="myTopnav">
            <div class="myLeftTopnav">
                <a class="navbar-brand" href="<?= ROOT_URL ?>"><?= webPageTitle ?></a>
                <?php
                foreach ($this->menuItems as $menuItem) :
                    if ($menuItem['category'] == 'nav-top') :
                        if ($menuItem['dropdown'] == 0) :
                            ?>
                            <a href="<?= $menuItem['link'] ?>"><?= $menuItem['name'] ?></a>
                        <?php else :
                            ?>
                            <div class="dropdown">
                                <button class="dropbtn">
                                    <?= $menuItem['name'] ?>
                                    <span class="caret"></span>
                                </button>
                                <div class="dropdown-content">
                                    <?php
                                    $dropdownItems = json_decode($menuItem['dropdown_items']);
                                    foreach ($dropdownItems as $dropdownItem) :
                                        ?>
                                        <a href="<?= $dropdownItem->{'href'} ?>"><?= $dropdownItem->{'description'} ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php
                        endif;
                    endif;
                    ?>
                <?php endforeach; ?>
            </div>
            <div class="myRightTopnav">
                <div class="dropdown">   
                    <button id="shopping-cart" class="dropbtn">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        Cosul meu
                        <span class="caret"></span>
                    </button>
                    <div id="cart" class="dropdown-content shopping-cart">
                        <!--Dynamically insert products here depending on the user session using ajax;-->
                        </br>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">
                        <span class="glyphicon glyphicon-home"></span>
                        Contul meu
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-content">
                        <a href="<?= ROOT_URL ?>users/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
                        <a href="<?= ROOT_URL ?>users/login"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                    </div>
                </div>
                <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myDropdownFunction()">&#9776;</a>
            </div>
        </div>
        <div class="container myContainer">
            <?php if ($sideNav) : ?>
                <?php require SIDE_BAR; ?>
            <?php endif; ?>
            <!--MAIN CONTENT-->
            <?php require $view; ?>
        </div>
        <!-- FOOTER -->
        <div class="spacer"/>
        <footer class="container-fluid">
            <p class="float-right"><a href="#">Back to top</a></p>
            <p>&copy; <?= webPageTitle ?> Inc. &middot; <a href="">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="<?= ASSETS_URL ?>/js/main.js"></script>
    </body>
</html>