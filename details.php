<!DOCTYPE html>
<html lang="en">

<?php
require_once __DIR__ . '/src/helpers.php';
require_once __DIR__ . '/src/filminfo.php';

$user = currentUser();
$filmName = isset($_GET['film_name']) ? $_GET['film_name'] : '';

// Получаем данные о фильме
$filmDetails = getFilmDetails($filmName);
$filmName .= " " . $filmDetails['Year'];
$filmData = getFilmDataFromAPI($filmName);
$firstData = $filmData['films'][0];

$pageTitle = 'Наше Кино - ' . $filmDetails['CommonName'];
include_once __DIR__ . '/components/head.php';
include_once __DIR__ . '/components/menumain.php';
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


          <!-- ***** Featured Start ***** -->
          <div class="row">
            <div class="col-lg-12">

              <div class="feature-banner header-text">
                <div class="col-lg-12">
                  <h1>
                    Подробнее о фильме
                    <br><span style="color: #e75e8d; ">
                      <?php echo $filmDetails['CommonName'] ?>
                    </span>
                  </h1>
                </div>
                <br>
                <div class="row">
                  <?php if (!empty($filmData['films'])): ?>
                    <div class="col-lg-4 offset-lg-4"">
                      <img src=" <?php echo $filmData['films'][0]['posterUrlPreview'] ?>" alt=""
                      style="border-radius: 23px;">
                    </div>
                    <!-- <div class="col-lg-4">
                      <div class="thumb">
                        <img src="<?php echo $filmData['films'][0]['posterUrl'] ?>" alt="" style="border-radius: 23px;">
                          <a href="https://www.youtube.com/watch?v=r1b03uKWk_M" target="_blank"><i
                              class="fa fa-play"></i></a>
                        </div>
                      </div> -->
                  <?php else: ?>
                    <div class="col-lg-12">
                      <p>Информации о постере нет.</p>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Featured End ***** -->

          <!-- ***** Details Start ***** -->
          <br>
          <div class="game-details">
            <div class="row">

              <div class="col-lg-12">
                <div class="content">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="left-info">
                        <div class="left">
                          <h4>
                            <?php echo $filmDetails['CommonName'] ?>
                          </h4>
                          <span>
                            <?php echo $filmDetails['Filmino'] ?>
                            <br>рейтинг: <?php echo $firstData['rating'] ?>
                          </span>
                          
                        </div>
                        <ul>
                          <li><i class="fa fa-star"></i>
                            <?php echo $filmDetails['Year'] ?>
                          </li>
                          <li><i class="fa fa-download"></i>
                            <?php echo $filmDetails['AgeRestrictions'] ?>
                          </li>
                          <li><i class="fa fa-download"></i>
                            Голосов: <?php echo $firstData['ratingVoteCount'] ?>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="right-info">
                        <ul>
                          <li>Студия <span class="info">
                              <?php echo $filmDetails['FilmStudio'] ?>
                            </span></li>
                          <li>Серии <span class="info">
                              <?php echo $filmDetails['SeriesAmount'] ?>
                            </span></li>
                          <li>Минуты <span class="info">
                              <?php echo $filmDetails['Duration'] ?>
                            </span></li>
                          <li>Тип фильма <span class="info">
                              <?php echo $filmDetails['IsColor'] ?>
                            </span></li>
                        </ul>
                      </div>
                    </div>
                    <!-- <div class="col-lg-4">
                      <img src="assets/images/details-01.jpg" alt="" style="border-radius: 23px; margin-bottom: 30px;">
                    </div>
                    <div class="col-lg-4">
                      <img src="assets/images/details-02.jpg" alt="" style="border-radius: 23px; margin-bottom: 30px;">
                    </div>
                    <div class="col-lg-4">
                      <img src="assets/images/details-03.jpg" alt="" style="border-radius: 23px; margin-bottom: 30px;">
                    </div> -->
                    <div class="col-lg-12">
                      <?php if (!empty($filmData['films'])): ?>
                        <p>
                          <?php echo $firstData['description'] ?>
                        </p>
                      </div>
                      <div class="col-lg-12 d-flex justify-content-center">
                        <div class="main-button">
                          <br>
                          <a href="#">Перейти к викторине по фильму</a>
                        </div>
                      </div>
                    <?php else: ?>
                      <div class="col-lg-12">
                        <p>Информации об описании фильма нет.</p>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Details End ***** -->

          <!-- ***** Other Start ***** -->
          <div class="other-games">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4><em>Похожие</em> Фильмы</h4>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item">
                  <img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                  <h4>Dota 2</h4><span>Sandbox</span>
                  <ul>
                    <li><i class="fa fa-star"></i> 4.8</li>
                    <li><i class="fa fa-download"></i> 2.3M</li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item">
                  <img src="assets/images/game-02.jpg" alt="" class="templatemo-item">
                  <h4>Dota 2</h4><span>Sandbox</span>
                  <ul>
                    <li><i class="fa fa-star"></i> 4.8</li>
                    <li><i class="fa fa-download"></i> 2.3M</li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item">
                  <img src="assets/images/game-03.jpg" alt="" class="templatemo-item">
                  <h4>Dota 2</h4><span>Sandbox</span>
                  <ul>
                    <li><i class="fa fa-star"></i> 4.8</li>
                    <li><i class="fa fa-download"></i> 2.3M</li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item">
                  <img src="assets/images/game-02.jpg" alt="" class="templatemo-item">
                  <h4>Dota 2</h4><span>Sandbox</span>
                  <ul>
                    <li><i class="fa fa-star"></i> 4.8</li>
                    <li><i class="fa fa-download"></i> 2.3M</li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item">
                  <img src="assets/images/game-03.jpg" alt="" class="templatemo-item">
                  <h4>Dota 2</h4><span>Sandbox</span>
                  <ul>
                    <li><i class="fa fa-star"></i> 4.8</li>
                    <li><i class="fa fa-download"></i> 2.3M</li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item">
                  <img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                  <h4>Dota 2</h4><span>Sandbox</span>
                  <ul>
                    <li><i class="fa fa-star"></i> 4.8</li>
                    <li><i class="fa fa-download"></i> 2.3M</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Other End ***** -->

        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Копирайт © 2024 Наше кино. <br>Все права зарезервированы.</p>
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