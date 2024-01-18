<!DOCTYPE html>
<html lang="en">

<?php
require_once __DIR__ . '/src/helpers.php';
$user = currentUser();
$pageTitle = 'Наше Кино - Главная';
include_once __DIR__ . '/components/head.php';
include_once __DIR__ . '/components/menumain.php';
require_once __DIR__ . '/src/filminfo.php';

// Получаем данные о фильме
$filmDetails = getNFilms(4);
// var_dump($filmDetails);
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

          <!-- ***** Banner Start ***** -->
          <div class="main-banner">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <h6>Добро пожаловать в сервис популяризации отечественного кино <br><b>
                      <h5>Наше Кино</h5>
                    </b></h6>
                  <h4><em>Начните </em>свое знакомство<br>здесь</h4>
                  <div class="main-button">
                    <a href="browse.php">Вперёд</a>
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
                  <h4><em>Стоит</em> посмотреть</h4>
                </div>
                <div class="row">
                  <?php for ($i = 0; $i <= 3; $i++): ?>
                    <div class="col-lg-3 col-sm-6">
                      <div class="item" style="height: 580px;">
                        <?php
                        $filmName = $filmDetails[$i]['CommonName'] . " " . $filmDetails[$i]['Year'];
                        $filmData = getFilmDataFromAPI($filmName);

                        // Check if the posterUrlPreview exists before using it
                        $posterUrl = isset($filmData['films'][0]['posterUrlPreview']) ? $filmData['films'][0]['posterUrlPreview'] : 'assets/images/no-poster1.jpg';
                        ?>
                        <a href="details.php?film_name=<?php echo $filmDetails[$i]['CommonName']; ?>">
                          <img src="<?php echo $posterUrl; ?>" alt="">
                        </a>
                        <!-- Нежданный гость - CommonName (Название) Военная мелодрама - Filmino (Сведение о фильме) -->
                        <h4 style="width: 150px;">
                          <?php echo $filmDetails[$i]['CommonName']; ?><br><span>
                            <?php echo $filmDetails[$i]['Filmino']; ?>
                          </span>
                        </h4>
                        <ul>
                          <!-- 1972 - Year (Год выпуска)-->
                          <li><i class="fa fa-star"></i>
                            <?php echo $filmDetails[$i]['Year']; ?>
                          </li>
                          <!-- 12+ - AgeRestrictions (Возрастные ограничения)-->
                          <li><i class="fa fa-download"></i>
                            <?php echo $filmDetails[$i]['AgeRestrictions']; ?>
                          </li>
                        </ul>
                      </div>
                    </div>
                  <?php endfor; ?>

                  <div class="col-lg-12">
                    <div class="main-button">
                      <a href="streams.php">Больше фильмов</a>
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