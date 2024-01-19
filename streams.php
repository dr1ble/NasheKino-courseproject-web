<!DOCTYPE html>
<html lang="en">

<?php

$pageTitle = 'Наше Кино - Фильмы';
require_once __DIR__ . '/src/helpers.php';
require_once __DIR__ . '/src/filminfo.php';
$user = currentUser();
include_once __DIR__ . '/components/head.php';
include_once __DIR__ . '/components/menumain.php';
require_once "src/config.php";


$sql = "SELECT name FROM filmino ORDER BY RAND()";
$result = $conn->query($sql);

$categories = array();


if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $categories[] = $row['name'];
  }

  $filmDetails = getNFilms(10);
  $allFilms = getAllFilms();
  // $topFilmsArray = getPopularFilmsArray(4, $filmDetails);
  // debug($topFilmsArray);

}


?>

<body>
  <style>
    .custom-link {
      text-decoration: none !important;
      /* Remove underline */
      color: inherit !important;
      /* Inherit text color */
      /* Add any other custom styles as needed */
    }

    h6 a {
      color: inherit;
      /* Наследование цвета текста */
      text-decoration: none;
      /* Убираем стандартное подчеркивание */
      transition: color 0.3s;
      /* Плавное изменение цвета при наведении */
      color: #fff !important;
    }

    h6 a:hover {
      color: #ff414e !important;
      /* Цвет при наведении */
    }

    .item {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      margin-bottom: 20px;
      /* Регулируйте расстояние между блоками */
    }

    .thumb {
      position: relative;
      overflow: hidden;
      width: 100%;
      height: 0;
      padding-bottom: 150%;
      /* Это обеспечивает соотношение сторон 2:3, регулируйте по необходимости */
    }

    .thumb img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      /* Сохраняет пропорции изображения и обрезает его, чтобы оно полностью заполняло блок .thumb */
    }

    .hover-effect {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(0, 0, 0, 0.7);
      /* Непрозрачный фон для hover-effect */
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .thumb:hover .hover-effect {
      opacity: 1;
    }

    h6 {
      color: white;
      /* Цвет текста в hover-effect */
    }

    h4 {
      margin-top: 10px;
      /* Регулируйте расстояние между изображением и заголовком */
    }

    .item {
      cursor: pointer;
    }
  </style>

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

          <!-- ***** Featured Games Start ***** -->
          <div class="row d-flex align-items-stretch">
            <div class="col-lg-12">
              <div class="featured-games header-text">
                <div class="heading-section">
                  <h4>Подборка фильмов</h4>
                </div>
                <div class="owl-features owl-carousel">
                  <?php for ($i = 0; $i <= 9; $i++): ?>
                    <div class="item" onclick="redirectToDetails('<?php echo $filmDetails[$i]['CommonName']; ?>')">
                      <?php
                      // Получение данных о фильме из API
                      $filmName = $filmDetails[$i]['CommonName'] . " " . $filmDetails[$i]['Year'];
                      $filmData = getFilmDataFromAPI($filmName);

                      // Проверка существования URL постера перед использованием
                      $posterUrl = isset($filmData['films'][0]['posterUrlPreview']) ? $filmData['films'][0]['posterUrlPreview'] : 'assets/images/no-poster1.jpg';
                      ?>

                      <div class="thumb">
                        <img src="<?php echo $posterUrl; ?>" alt="">
                        <div class="hover-effect">
                          <h6>
                            <?php
                            $rating = isset($filmData['films'][0]['rating']) ? $filmData['films'][0]['rating'] : 'Нет данных';
                            $ratingVoteCount = isset($filmData['films'][0]['ratingVoteCount']) ? $filmData['films'][0]['ratingVoteCount'] : 'Нет данных'; ?>
                            Рейтинг(КП):
                            <?php echo $rating; ?> <br>Голосов:
                            <?php echo $ratingVoteCount; ?>
                          </h6>
                        </div>
                      </div>
                      <h4>
                        <?php echo $filmDetails[$i]['CommonName']; ?><br><span>
                          <?php echo $filmDetails[$i]['Filmino']; ?><br>
                          <?php echo $filmDetails[$i]['Year']; ?><br>
                          <?php echo $filmDetails[$i]['AgeRestrictions']; ?><br>
                        </span>
                      </h4>
                    </div>
                  <?php endfor; ?>

                </div>

              </div>

            </div>

            <!-- <div class="col-lg-12">
              <div class="main-button" style="text-align: center;">
                <a href="profile.html">К фильмотетке</a>
              </div>
            </div>
          </div> -->
            <!-- ***** Featured Games End ***** -->

            <!-- ***** Live Stream Start ***** -->
            <div class="live-stream">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4><em></em>Список всех фильмов</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <label for="filterCategory">
                    <h3>Фильтрация по категории:</h3>
                  </label>
                  <select id="filterCategory">
                    <option value="">Все категории</option>
                    <?php foreach ($categories as $category): ?>
                      <option value="<?php echo $category; ?>">
                        <?php echo $category; ?>
                      </option>

                    <?php endforeach; ?>
                  </select>

                  <ul id="filmList">
                    <br>
                    <?php foreach ($allFilms as $film): ?>
                      <li class="film-group">
                        <h4><a href="details.php?film_name=<?php echo urlencode($film['CommonName']); ?>">

                            <?php echo $film['CommonName'] . ' ' . $film['Year']; ?>
                          </a></h4>
                        <ul class="film-details">
                          <li style="color: white">

                            <?php echo $film['Filmino'] . ', ' . $film['FilmStudio'] . ', ' . $film['Duration'] . ' минут' . ', ' . $film['AgeRestrictions']; ?>
                          </li>
                          <!-- Добавьте дополнительные поля, если необходимо -->
                        </ul>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                  <br>
                  <div class="main-button text-center">]
                    <a class="" id="showMoreBtn">Показать еще</a>
                  </div>
                </div>
              </div>
            </div>
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
              <br>Все права защищены.

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
        var visibleFilms = 25; // начальное количество отображаемых фильмов
        var films = $(".film-group"); // все фильмы

        // Скрыть все фильмы, начиная с индекса visibleFilms
        films.slice(visibleFilms).hide();

        // Функция обработки нажатия на кнопку "Показать еще"
        $("#showMoreBtn").click(function () {
          visibleFilms += 15; // увеличиваем количество отображаемых фильмов на 15
          films.hide().slice(0, visibleFilms).show(); // отображаем фильмы до нового значения visibleFilms
          if (visibleFilms >= films.length) {
            $("#showMoreBtn").hide(); // скрываем кнопку, если все фильмы отображены
          }
        });

        // Функция для фильтрации фильмов по категориям
        $("#filterCategory").change(function () {
          var selectedCategory = $(this).val();
          var visibleFilmsInCategory = films.filter(":contains('" + selectedCategory + "')").length;
          var totalVisibleFilms = Math.min(visibleFilmsInCategory, visibleFilms);

          films.hide().filter(":contains('" + selectedCategory + "')").slice(0, totalVisibleFilms).show();

          if (visibleFilmsInCategory <= visibleFilms) {
            $("#showMoreBtn").hide(); // скрываем кнопку, если в категории мало фильмов
          } else {
            $("#showMoreBtn").show(); // показываем кнопку, если в категории есть еще фильмы
          }
        });
      });
    </script>
    <script>
      function redirectToDetails(filmName) {
        window.location.href = 'details.php?film_name=' + encodeURIComponent(filmName);
      }
    </script>

</body>

</html>