<?php

/*
Template Name: Шаблон страницы Медиапланер вход
Template Post Type: post, page, product
*/


?>
<?php get_template_part('templates/head'); ?>

<body>
    <div class="pageWrapper">
        
        <?php get_template_part('templates/top-panel'); ?>
        <?php get_template_part('templates/header'); ?>
        <main class="pageMediaplaner">

            <div class="container">
				<div class="authMediaplanner radius_1 greyBg pad40">
					<div class="title">Авторизуйтесь в системе Медиапланер</div>
					<div class="desc">с помощью Яндекс Аккаунта</div>
					<a href="/mediaplanner/" class="btn btn__order radius_1">Войти с помощью Яндекс
						<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round" stroke-linejoin="round">
							</path>
						</svg>
					</a>
				</div>
            </div>

        </main>

        <?php get_template_part('templates/footer-main'); ?>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!--Slick Slider-->
    <script src="<?php echo get_template_directory_uri() ?>/new-site/assets/lib/slick/slick.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/new-site/assets/lib/slick/slick.js"></script>

    <script src="<?php echo get_template_directory_uri() ?>/new-site/assets/js/script.js"></script>
</body>
</html>
