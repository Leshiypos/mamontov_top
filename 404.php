<?php
/*
Template Name: Лид - магнит
Template Post Type: page
*/
?>

<?php get_template_part('templates/head'); ?>

<body>
    <div class="pageWrapper"> 
		<?php get_template_part('templates/top-panel-main'); ?>
        
		<main class="main">
<style>
  :root{
    --mt-black:#2B2B2B;          /* тёмный для текста */
    --mt-gray:#6B6B6B;           /* вторичный текст */
    --mt-bg:#ffffff;             /* фон */
    --mt-accent:#E54855;         /* красный акцент (подбери под свой) */
    --mt-accent-2:#F16672;       /* чуть светлее для градиента */
    --mt-radius:28px;
  }

  .mt-404{
    position:relative;
    min-height: calc(100dvh - 140px); /* с учётом хедера/футера темы */
    display:grid;
    align-items:center;
    background: var(--mt-bg);
    overflow:hidden;
  }

  .mt-404__container{
    width:min(1200px, 92%);
    margin-inline:auto;
    display:grid;
    grid-template-columns: 1.2fr 1fr;
    gap:64px;
    padding-block: clamp(48px, 6vw, 96px);
  }

  /* Текстовый блок */
  .mt-404__eyebrow{
    display:inline-block;
    font-size:14px;
    letter-spacing:.12em;
    text-transform:uppercase;
    color: var(--mt-accent);
    background: #ffecee;
    border-radius: 999px;
    padding: 8px 14px;
    margin-bottom:24px;
  }
  .mt-404__title{
    font-size: clamp(40px, 7vw, 92px);
    line-height: 1.02;
    font-weight:800;
    color: var(--mt-black);
    margin:0 0 20px 0;
  }
  .mt-404__desc{
    font-size: clamp(16px, 2.1vw, 20px);
    line-height:1.6;
    color: var(--mt-gray);
    max-width: 46ch;
    margin: 0 0 28px 0;
  }

  /* Поиск + кнопки */
  .mt-404__search{
    display:flex;
    gap:10px;
    align-items:center;
    margin: 18px 0 26px 0;
  }
  .mt-404__search input[type="search"]{
    flex:1 1 auto;
    font-size:16px;
    padding:16px 18px;
    border:1px solid #E6E6E6;
    border-radius: var(--mt-radius);
    outline:none;
  }
  .mt-404__search button{
    padding:16px 20px;
    border-radius: var(--mt-radius);
    border: none;
    background: var(--mt-black);
    color:#fff;
    font-weight:600;
    cursor:pointer;
  }
  .mt-404__search button:hover{
		background-color: rgb(185, 50, 64);
  }

  .mt-404__actions{
    display:flex;
    flex-wrap:wrap;
    gap:12px;
  }
  .mt-404__btn{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:14px 20px;
    border-radius: var(--mt-radius);
    text-decoration:none;
    font-weight:600;
    transition: transform .2s ease, box-shadow .2s ease, background .2s ease, color .2s ease;
    will-change: transform;
  }
  .mt-404__btn:hover{
	color:#fff;
	background-color: rgb(185, 50, 64);

  }
  .mt-404__btn--primary{
    background: var(--mt-accent);
    color:#fff;
    box-shadow: 0 14px 30px rgba(229,72,85,.25);
  }

  .mt-404__btn--ghost{
    background: #F5F5F5;
    color:#111;
  }
 

  /* Декоративный круг справа */
  .mt-404__art{
    position:relative;
    min-height: 440px;
    display:grid;
    place-items:center;
  }
  .mt-404__ball{
    width: clamp(240px, 42vw, 520px);
    aspect-ratio:1/1;
    border-radius:50%;
    background: radial-gradient(120% 120% at 65% 35%, var(--mt-accent-2) 0%, var(--mt-accent) 48%, #D83B48 100%);
    position:relative;
    filter: drop-shadow(0 24px 80px rgba(229,72,85,.35));
    animation: float 6s ease-in-out infinite;
  }
  .mt-404__ball::after{
    /* блик */
    content:"";
    position:absolute;
    width:40%;
    height:40%;
    left:18%;
    top:16%;
    border-radius:50%;
    background: radial-gradient(70% 70% at 50% 50%, rgba(255,255,255,.55) 0%, rgba(255,255,255,0) 70%);
    filter: blur(6px);
  }
  @keyframes float{
    0%   { transform: translateY(0); }
    50%  { transform: translateY(-10px); }
    100% { transform: translateY(0); }
  }

  /* Мелкие детали */
  .mt-404__hint{
    font-size:14px; color:#9a9a9a; margin-top:10px;
  }

  /* Адаптив */
  @media (max-width: 980px){
    .mt-404__container{ grid-template-columns: 1fr; gap:36px; }
    .mt-404__desc{ max-width: none; }
    .mt-404__art{ order: -1; min-height: 320px; }
  }
</style>

  <div class="mt-404__container">
    <!-- Иллюстрация / круг -->
    <div class="mt-404__art" aria-hidden="true">
      <div class="mt-404__ball"></div>
    </div>

    <!-- Контент -->
    <div class="mt-404__content">
      <span class="mt-404__eyebrow">Ошибка 404</span>
      <h1 class="mt-404__title">Страница<br/>не найдена</h1>
      <p class="mt-404__desc">
        Возможно, ссылка устарела или в адресе опечатка. Попробуйте найти нужную информацию через поиск
        или перейдите на другие разделы сайта.
      </p>

      <!-- Поиск -->
      <form class="mt-404__search" role="search" method="get" action="<?php echo esc_url( home_url('/') ); ?>">
        <label class="screen-reader-text" for="mt-404-search">Поиск по сайту</label>
        <input id="mt-404-search" type="search" name="s" placeholder="Что ищем?">
        <button type="submit" aria-label="Искать">Найти</button>
      </form>

      <!-- Действия -->
      <div class="mt-404__actions">
        <a class="mt-404__btn mt-404__btn--primary" href="<?php echo esc_url( home_url('/') ); ?>">
          На главную →
        </a>
        <a class="mt-404__btn mt-404__btn--ghost" href="<?php echo esc_url( home_url('/uslugi/') ); ?>">
          Услуги
        </a>
        <a class="mt-404__btn mt-404__btn--ghost" href="<?php echo esc_url( home_url('/blog/') ); ?>">
          Блог
        </a>
        <a class="mt-404__btn mt-404__btn--ghost" href="tel:+74996476034">
          +7 (499) 647-60-34
        </a>
      </div>

      <div class="mt-404__hint">Если проблема повторяется — напишите нам через форму обратной связи.</div>
    </div>
  </div>


		</main>

		<?php get_footer(); ?>
