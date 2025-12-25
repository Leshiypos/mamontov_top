<div class="topPanelWrap">
    <div class="topPanel shadow_1 radius_1">
        <a href="/" class="logo"><img src="<?php echo get_template_directory_uri() ?>/new-site/assets/img/logo.svg" alt=""></a>
        <div class="burger">
            <span></span><span></span>
        </div>
        <nav class="menu">
            <?  //wp_nav_menu();
            
            wp_nav_menu(
                array(
                    'walker'          => new Header_Walker_Nav_Menu,
                )
            );
            ?>
            <!--<ul>
                <li>
                    <a href="#">
                        Услуги
                        <img src="<?php echo get_template_directory_uri() ?>/new-site/assets/img/dropdown.svg" alt="">
                    </a>
                    <div class="dropdownWrap">
                        <ul class="dropdown">
                            <li><a href="#">Аудит сайтов</a></li>
                            <li><a href="#">По позициям </a></li>
                            <li><a href="#">Продвижение в Google </a></li>
                            <li><a href="#">Продвижение в Яндекс </a></li>
                            <li><a href="#">По темам </a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="#">Кейсы</a></li>
                <li><a href="#">Блог</a></li>
                <li><a href="#">Решения</a></li>
                <li><a href="#">Вакансии</a></li>
            </ul>       -->             
            <div class="city">
                <div class="icon"><img src="<?php echo get_template_directory_uri() ?>/new-site/assets/img/navigation.svg" alt=""></div>
                <a href="#">г. Москва</a>
            </div>
            <a href="tel:84996476034" class="phone">+7 (499) 647-60-34</a>
            <button class="btn callback btn_1">Заказать звонок <img src="<?php echo get_template_directory_uri() ?>/new-site/assets/img/callback.svg" alt=""></button>
        </nav>
        <div class="city">
            <div class="icon"><img src="<?php echo get_template_directory_uri() ?>/new-site/assets/img/navigation.svg" alt=""></div>
            <a href="#">г. Москва</a>
        </div>
        <a href="tel:84996476034" class="phone">+7 (499) 647-60-34</a>
        <a href="#sectionForm" class="btn callback btn_1">Заказать звонок <img src="<?php echo get_template_directory_uri() ?>/new-site/assets/img/callback.svg" alt=""></a>
    </div>
</div>