<link rel="stylesheet" href="<?= ASSETS_URL ?>/css/side.css">
<div class="col-sm-2 sidenav">
    <?php
    foreach ($this->menuItems as $menuItem) :
        if ($menuItem['category'] == 'nav-side') :
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