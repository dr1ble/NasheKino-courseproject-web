<!DOCTYPE html>
<html lang="en">

<?php $pageTitle = 'Наше Кино - Обзор';
require_once __DIR__ . '/src/helpers.php';
$user = currentUser();
include_once __DIR__ . '/components/head.php';
include_once __DIR__ . '/components/menumain.php';
// debug(getFilmCountByCategory());

$categories = getFilmCountByCategory();
$labels = implode(',', array_map(function ($category) {
  return "'" . ucwords($category) . "'";
}, array_keys($categories)));
// var_dump($labels);

$values = implode(',', getFilmCountByCategory());
// echo $values;
?>

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

          <!-- ***** Start Stream Start ***** -->
          <div class="start-stream">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4>О приложении</h4>
                <h5>Наше Кино - клиенториентированное веб-приложение для популяризации отечественного кино из
                  Фильмофонда «Московское кино», основанное на <a
                    href="https://data.mos.ru/opendata/1148?pageSize=10&pageIndex=0">открытых данных портала
                    правительства Москвы.</a> Также для вывода подробной информации о фильмах использовались данные
                  сайта <a href="https://www.kinopoisk.ru/">Кинопоиск</a>.
                </h5>
                <br>
                <h4>Функциональные возможности</h4>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="item">
                    <!-- <div class="icon">
                      <img src="assets/images/service-01.jpg" alt="" style="max-width: 60px; border-radius: 50%;">
                    </div> -->
                    <h4>Фильмы</h4>
                    <p style="text-align: justify;">В приложении реализованы разные варианты ознакомления с фильмами:
                      динамически
                      формирующиеся
                      карточки (нажмите, чтобы перейти к подробному описанию) на главной странице и в разделе фильмы, а
                      также живой поиск среди всех фильмов датасета.
                      <br>** У фильмов, о которых мало информации могут быть некорректно сформированы карточки, а
                      именно
                      (постер, описание, данные о рейтинге КП).
                    </p>
                    <div class="main-button">
                      <a href="streams.php">К фильмам</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="item">
                    <!-- <div class="icon">
                      <img src="assets/images/service-02.jpg" alt="" style="max-width: 60px; border-radius: 50%;">
                    </div> -->
                    <h4>Викторины</h4>
                    <p style="text-align: justify;">Также реализована система викторин по фильмам с начислением баллов,
                      пользователь может
                      проходить викторины по просмотренным фильмам для оценки своих знаний. Найти их вы можете
                      либо в карточке фильма, если викторина существует, то будет сформирована кнопка перехода к
                      викторине, либо
                      через вкладку викторины. Для модераторов сайта создан необходимый функционал их создания
                      (необходимо авторизоваться через аккаунт модератора)</p>
                    <div class="main-button">
                      <a href="main.php">К викторинам</a>
                    </div>
                  </div>

                </div>
                <div class="col-lg-4">
                  <div class="item">
                    <!-- <div class="icon">
                      <img src="assets/images/service-03.jpg" alt="" style="max-width: 60px; border-radius: 50%;">
                    </div> -->
                    <h4>Профиль</h4>
                    <p style="text-align: justify;">Стоит отметить систему профилей. Только после регистрации и
                      авторизации начнёт хранится
                      информации о пройденных викторинах и баллах за них. В профиле пользователь может просмотреть
                      количество пройденных викторин, полученных баллов, а также роли аккаунта. В будущем
                      планируется расширение функционала профиля, а именно добавление отметок состояний фильмов
                      (Просмотренное, Понравившееся, Избранное)</p>
                    <div class="main-button">
                      <a href="profile.php">К профилю</a>
                    </div>
                  </div>

                </div>
                <div class="col-lg-12">
                  <div class="main-button">
                    <!-- <a href="profile.php">В профиль</a> -->
                  </div>
                </div>


              </div>
            </div>
          </div>
          <!-- ***** Start Stream End ***** -->


          <!-- ***** Featured Games Start ***** -->


          <div class="row">
            <div class="col-lg-12">
              <div class="heading-section text-center">
                <h4>О данных</h4>
              </div>
              <div>
                <canvas id="myChart"></canvas>
              </div>

            </div>
            <div class="col-lg-8">

              <div class="featured-games header-text">
                <div class="heading-section">
                  <h4><em></em> Фильмы</h4>
                </div>
                <div class="owl-features owl-carousel">
                  <div class="item">
                    <div class="thumb">
                      <img src="assets/images/featured-01.jpg" alt="">
                      <div class="hover-effect">
                        <h6>2.4K Streaming</h6>
                      </div>
                    </div>
                    <h4>CS-GO<br><span>249K Downloads</span></h4>
                    <ul>
                      <li><i class="fa fa-star"></i> 4.8</li>
                      <li><i class="fa fa-download"></i> 2.3M</li>
                    </ul>
                  </div>
                  <div class="item">
                    <div class="thumb">
                      <img src="assets/images/featured-02.jpg" alt="">
                      <div class="hover-effect">
                        <h6>2.4K Streaming</h6>
                      </div>
                    </div>
                    <h4>Gamezer<br><span>249K Downloads</span></h4>
                    <ul>
                      <li><i class="fa fa-star"></i> 4.8</li>
                      <li><i class="fa fa-download"></i> 2.3M</li>
                    </ul>
                  </div>
                  <div class="item">
                    <div class="thumb">
                      <img src="assets/images/featured-03.jpg" alt="">
                      <div class="hover-effect">
                        <h6>2.4K Streaming</h6>
                      </div>
                    </div>
                    <h4>Island Rusty<br><span>249K Downloads</span></h4>
                    <ul>
                      <li><i class="fa fa-star"></i> 4.8</li>
                      <li><i class="fa fa-download"></i> 2.3M</li>
                    </ul>
                  </div>
                  <div class="item">
                    <div class="thumb">
                      <img src="assets/images/featured-01.jpg" alt="">
                      <div class="hover-effect">
                        <h6>2.4K Streaming</h6>
                      </div>
                    </div>
                    <h4>CS-GO<br><span>249K Downloads</span></h4>
                    <ul>
                      <li><i class="fa fa-star"></i> 4.8</li>
                      <li><i class="fa fa-download"></i> 2.3M</li>
                    </ul>
                  </div>
                  <div class="item">
                    <div class="thumb">
                      <img src="assets/images/featured-02.jpg" alt="">
                      <div class="hover-effect">
                        <h6>2.4K Streaming</h6>
                      </div>
                    </div>
                    <h4>Gamezer<br><span>249K Downloads</span></h4>
                    <ul>
                      <li><i class="fa fa-star"></i> 4.8</li>
                      <li><i class="fa fa-download"></i> 2.3M</li>
                    </ul>
                  </div>
                  <div class="item">
                    <div class="thumb">
                      <img src="assets/images/featured-03.jpg" alt="">
                      <div class="hover-effect">
                        <h6>2.4K Streaming</h6>
                      </div>
                    </div>
                    <h4>Island Rusty<br><span>249K Downloads</span></h4>
                    <ul>
                      <li><i class="fa fa-star"></i> 4.8</li>
                      <li><i class="fa fa-download"></i> 2.3M</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="top-downloaded">
                <div class="heading-section">
                  <h4>Викторины</h4>
                </div>
                <ul>
                  <li>
                    <img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                    <h4>Fortnite</h4>
                    <h6>Sandbox</h6>
                    <span><i class="fa fa-star" style="color: yellow;"></i> 4.9</span>
                    <span><i class="fa fa-download" style="color: #ec6090;"></i> 2.2M</span>
                    <div class="download">
                      <a href="#"><i class="fa fa-download"></i></a>
                    </div>
                  </li>
                  <li>
                    <img src="assets/images/game-02.jpg" alt="" class="templatemo-item">
                    <h4>CS-GO</h4>
                    <h6>Legendary</h6>
                    <span><i class="fa fa-star" style="color: yellow;"></i> 4.9</span>
                    <span><i class="fa fa-download" style="color: #ec6090;"></i> 2.2M</span>
                    <div class="download">
                      <a href="#"><i class="fa fa-download"></i></a>
                    </div>
                  </li>
                  <li>
                    <img src="assets/images/game-03.jpg" alt="" class="templatemo-item">
                    <h4>PugG</h4>
                    <h6>Battle Royale</h6>
                    <span><i class="fa fa-star" style="color: yellow;"></i> 4.9</span>
                    <span><i class="fa fa-download" style="color: #ec6090;"></i> 2.2M</span>
                    <div class="download">
                      <a href="#"><i class="fa fa-download"></i></a>
                    </div>
                  </li>
                </ul>
                <div class="text-button">
                  <a href="profile.html">Просмотреть все</a>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Featured Games End *****

          <!-- ***** Live Stream Start ***** -->

          <!-- ***** Live Stream End ***** -->

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

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-autocolors"></script>

  <script>

    const autocolors = window['chartjs-plugin-autocolors'];
    Chart.register(autocolors);
    const labels = [<?= $labels ?>];
  

    const data = {
      labels: labels,
      datasets: [
        {
          label: 'Количество фильмов',
          // data: [11, 16, 7, 3, 14],
          
          borderColor: 'rgba(254, 98, 108, 0.437)',
          hoverOffset: 4,
          data: [<?= $values ?>],
        },
      ],
    };

    const config = {
      type: "pie",
      data: data,
      options: {
        indexAxis: 'x',
        plugins:
        {
          legend: {
            display: true,
            position: 'bottom'
          },
          title: {
            display: true,
            text: 'Количество фильмов в каждой категории'
          },
          autocolors: {
            mode: 'data'
          }
        }
      },
    };



    const MyChart = new Chart(
      document.getElementById('myChart'),
      config
    );

  </script>

</body>

</html>