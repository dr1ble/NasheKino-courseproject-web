<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> -->

    <title>Наше кино - Главная</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">

    <!-- Additional CSS Files -->
    <!-- <link rel="stylesheet" href="assets/css/fontawesome.css"> -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Search End ***** -->
                    <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="Поиск фильма" id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <!-- ***** Search End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.html" class="active">Главная</a></li>
                        <li><a href="browse.html">Обзор</a></li>
                        <li><a href="details.html">Детали</a></li>
                        <li><a href="streams.html">Фильмы</a></li>
                        <!-- <li><a href="profile.html">Профиль<img src="assets/images/profile-header.jpg" alt=""></a></li> -->
                        <li id="profileTab" class="profile-menu">
                          <a href="profile.html">Профиль<img src="assets/images/profile-header.jpg" alt=""></a>
                          <div id="profileDropdown" class="profile-dropdown">
                              <a href="login.php">Авторизация</a>
                              <a href="register.php">Регистрация</a>
                          </div>
                      </li>
                        <!-- <li class="profile-menu">
                          <a href="profile.html">Профиль</a>
                          <div class="profile-dropdown">
                              <a href="login.html">Авторизация</a>
                              <a href="register.html">Регистрация</a>
                          </div>
                      </li> -->
                    </ul> 
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="main-banner">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <h6>Добро пожаловать в рекомендательный сервис <br><b><h5>Наше Кино</h5></b></h6>
                  <h4><em>Начните </em>свое знакомство с русским кино здесь</h4>
                  <div class="main-button">
                    <a href="browse.html">Вперёд</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

          <!-- ***** Most Popular Start ***** -->
          <div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4><em>Популярно</em> сейчас</h4>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/popular-film-01.jpg" alt="">
                      <!-- Нежданный гость - CommonName (Название) Военная мелодрама - Filmino (Сведение о фильме) -->
                      <h4>Нежданный гость<br><span>Военная мелодрама</span></h4>
                      <ul>
                        <!-- 1972 - Year (Год выпуска)-->
                        <li><i class="fa fa-star"></i> 1972</li>
                        <!-- 12+ - AgeRestrictions (Возрастные ограничения)-->
                        <li><i class="fa fa-download"></i>12+</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/popular-film-02.jpg" alt="">
                      <!-- Нежданный гость - CommonName (Название) Военная мелодрама - Filmino (Сведение о фильме) -->
                      <h4>Не хочу быть взрослым<br><span>Комедия</span></h4>
                      <ul>
                        <!-- 1972 - Year (Год выпуска)-->
                        <li><i class="fa fa-star"></i> 1982</li>
                        <!-- 12+ - AgeRestrictions (Возрастные ограничения)-->
                        <li><i class="fa fa-download"></i>12+</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/popular-film-03.jpg" alt="">
                      <!-- Нежданный гость - CommonName (Название) Военная мелодрама - Filmino (Сведение о фильме) -->
                      <h4>Падение Кондора<br><span>Драма</span></h4>
                      <ul>
                        <!-- 1972 - Year (Год выпуска)-->
                        <li><i class="fa fa-star"></i>1982</li>
                        <!-- 12+ - AgeRestrictions (Возрастные ограничения)-->
                        <li><i class="fa fa-download"></i>16+</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/popular-film-04.jpg" alt="">
                      <!-- Нежданный гость - CommonName (Название) Военная мелодрама - Filmino (Сведение о фильме) -->
                      <h4>Сержант Фетисов<br><span>Документальный</span></h4>
                      <ul>
                        <!-- 1972 - Year (Год выпуска)-->
                        <li><i class="fa fa-star"></i> 1961</li>
                        <!-- 12+ - AgeRestrictions (Возрастные ограничения)-->
                        <li><i class="fa fa-download"></i>12+</li>
                      </ul>
                    </div>
                  </div>
                  <!-- <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/popular-02.jpg" alt="">
                      <h4>PubG<br><span>Battle S</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/popular-03.jpg" alt="">
                      <h4>Dota2<br><span>Steam-X</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/popular-04.jpg" alt="">
                      <h4>CS-GO<br><span>Legendary</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                  </div> -->
                  <!-- <div class="col-lg-6">
                    <div class="item">
                      <div class="row">
                        <div class="col-lg-6 col-sm-6">
                          <div class="item inner-item">
                            <img src="assets/images/popular-05.jpg" alt="">
                            <h4>Mini Craft<br><span>Legendary</span></h4>
                            <ul>
                              <li><i class="fa fa-star"></i> 4.8</li>
                              <li><i class="fa fa-download"></i> 2.3M</li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                          <div class="item">
                            <img src="assets/images/popular-06.jpg" alt="">
                            <h4>Eagles Fly<br><span>Matrix Games</span></h4>
                            <ul>
                              <li><i class="fa fa-star"></i> 4.8</li>
                              <li><i class="fa fa-download"></i> 2.3M</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/popular-07.jpg" alt="">
                      <h4>Warface<br><span>Max 3D</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/popular-08.jpg" alt="">
                      <h4>Warcraft<br><span>Legend</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                  </div> -->
                  <div class="col-lg-12">
                    <div class="main-button">
                      <a href="browse.html">Подробнее</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Most Popular End ***** -->

          <!-- ***** Gaming Library Start ***** -->
          <div class="gaming-library">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4><em>Ваша</em> фильмотека</h4>
              </div>
              <div class="item">
                <ul>
                  <li><img src="assets/images/game-01.jpg" alt="" class="templatemo-item"></li>
                  <li><h4>Нежданный гость</h4><span>Военная мелодрама</span></li>
                  <li><h4>Дата просмотра</h4><span>05/01/2024</span></li>
                  <!-- Duration - Длительность (MAIN TABLE) -->
                  <li><h4>Длительность</h4><span>1:36:50 </span></li>
                  <li><h4>Статус</h4><span>Просмотрено</span></li>
                  <li><div class="main-border-button border-no-active"><a href="#">Понравилось</a></div></li>
                </ul>
              </div>
              <div class="item last-item">
                <ul>
                  <li><img src="assets/images/game-03.jpg" alt="" class="templatemo-item"></li>
                  <li><h4>Не хочу быть взрослым</h4><span>Комедия</span></li>
                  <li><h4>Дата просмотра</h4><span>12/12/2024</span></li>
                  <li><h4>Длительность</h4><span>1:18:23</span></li>
                  <li><h4>Статус</h4><span>Надо просмотреть</span></li>
                  <li><div class="main-border-button border-active"><a href="#">Просмотрено</a></div></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="main-button">
                <a href="profile.html">К фильмотетке</a>
              </div>
            </div>
          </div>
          <!-- ***** Gaming Library End ***** -->
        </div>
      </div>
    </div>
  </div>
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Копирайт © 2024 Наше кино. 
          <br>Все права зарезирвированы. 

        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    $(document).ready(function () {
        // Проверьте статус аутентификации пользователя (вам нужно реализовать эту логику)
        var isAuthenticated = false;  // Замените на вашу фактическую проверку аутентификации

        // Если пользователь не аутентифицирован, покажите выпадающий список при наведении
        if (!isAuthenticated) {
            $("#profileTab").hover(
                function () {
                    $("#profileDropdown").slideDown('fast');
                },
                function () {
                    $("#profileDropdown").stop().slideUp('fast');
                }
            );
        }
    });
</script>
  </body>

</html>