<!DOCTYPE html>
<html lang="en">

<?php
require_once __DIR__ . '/src/helpers.php';
$user = currentUser();
$pageTitle = 'Наше Кино - Главная';
include_once __DIR__ . '/components/head.php';
include_once __DIR__ . '/components/menumain.php';?>

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

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="main-banner">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <h6>Добро пожаловать в рекомендательный сервис <br><b>
                      <h5>Наше Кино</h5>
                    </b></h6>
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
                  <li>
                    <h4>Нежданный гость</h4><span>Военная мелодрама</span>
                  </li>
                  <li>
                    <h4>Дата просмотра</h4><span>05/01/2024</span>
                  </li>
                  <!-- Duration - Длительность (MAIN TABLE) -->
                  <li>
                    <h4>Длительность</h4><span>1:36:50 </span>
                  </li>
                  <li>
                    <h4>Статус</h4><span>Просмотрено</span>
                  </li>
                  <li>
                    <div class="main-border-button border-no-active"><a href="#">Понравилось</a></div>
                  </li>
                </ul>
              </div>
              <div class="item last-item">
                <ul>
                  <li><img src="assets/images/game-03.jpg" alt="" class="templatemo-item"></li>
                  <li>
                    <h4>Не хочу быть взрослым</h4><span>Комедия</span>
                  </li>
                  <li>
                    <h4>Дата просмотра</h4><span>12/12/2024</span>
                  </li>
                  <li>
                    <h4>Длительность</h4><span>1:18:23</span>
                  </li>
                  <li>
                    <h4>Статус</h4><span>Надо просмотреть</span>
                  </li>
                  <li>
                    <div class="main-border-button border-active"><a href="#">Просмотрено</a></div>
                  </li>
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

</body>

</html>