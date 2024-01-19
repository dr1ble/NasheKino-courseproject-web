<?php
require_once __DIR__ . '/../src/helpers.php';
if (is_authenticated()) {
  $profileUrl = "profile.php";
} else {
  $profileUrl = "login.php";
}
?>

<!-- ***** Header Area Start ***** -->
<script src="vendor/jquery/jquery.min.js"></script>

<script>
  $(document).ready(function () {

    var currentPage = window.location.pathname.split("/").pop();

    // Добавление класса "active" к соответствующему элементу меню
    $(".nav a").each(function () {
      var href = $(this).attr("href");
      if (currentPage === href) {
        $(this).addClass("active");
      }
    });

    // Обработчик события нажатия на кнопку профиля
    $("#profileTab").on("click", function () {
      // Динамическое определение URL в зависимости от статуса аутентификации
      window.location.href = "<?php echo $profileUrl; ?>";
    });
  });
</script>
<script>
  $(document).ready(function () {
    function loadFilmCards(query) {
      $.ajax({
        url: "search.php",
        method: "POST",
        data: { query: query },
        success: function (data) {
          $('#filmCards').html(data);
        }
      });
    }

    $('#film').keyup(function () {
      var query = $(this).val();
      if (query != '') {
        $('#filmList').fadeIn();
        loadFilmCards(query);
      } else {
        $('#filmList').fadeOut();
        loadFilmCards('');
      }
    });

    $(document).on('mouseover', '.film-card', function () {
      $(this).css('background-color', '#a2bfcc');
    });

    $(document).on('mouseout', '.film-card', function () {
      $(this).css('background-color', '');
    });

    $(document).on('click', '.film-card', function () {
      var filmname = $(this).text();
      window.location.href = 'details.php?film_name=' + encodeURIComponent(filmname);
    });
  });
</script>
<!-- ***** Header Area Start ***** -->

<header class="header-area header-sticky">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <!-- ***** Logo Start ***** -->
          <a href="index.php" class="logo">
            <img src="assets/images/logo.png" alt="">
          </a>
          <!-- ***** Logo End ***** -->
          <!-- ***** Search End ***** -->
          <!-- <div class="search-input">
            <form id="search" action="#">
              <input type="text" placeholder="Поиск фильма" id='searchText' name="searchKeyword" onkeypress="handle" />
              <i class="fa fa-search"></i>
            </form>
          </div> -->
          <div class="content">
            <div class="card mt-5 search-input d-none d-sm-block">
              <input type="text" name="film" id="film" class="form-control mt-2" placeholder="Поиск фильма" />
              <div id="filmList"></div>
            </div>
            <div id="filmCards">

            </div>
          </div>
          <!-- ***** Search End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li><a href="index.php">Главная</a></li>
            <li><a href="browse.php">Обзор</a></li>
            <li><a href="streams.php">Фильмы</a></li>
            <li><a href="quizes.php">Викторины</a></li>
            <li>
              <a href="<?php echo $profileUrl; ?>">Профиль<img
                  src="<?php echo $user ? $user['avatar'] : 'assets/images/profile-header.jpg'; ?>"
                  alt="Аватар профиля"></a>
            </li>
          </ul>
          <a class='menu-trigger'>
            <span>Menu</span>
          </a>
          <!-- ***** Menu End ***** -->
        </nav>
      </div>
    </div>
  </div>
  <style>
    .film-card {
      background-color: #fff;
      margin-top: 1px;
      border: 1px solid #ddd;
      border-radius: 2px;
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
      font-size: 12px;
      width: 350px;
      /* Фиксированная ширина карточки */
    }

    .film-card:hover {
      background-color: #ff414e !important;
      color: #fff;
    }

    .card.mt-5.search-input {
      color: #fff;
      background-color: #1f2122 !important;
      width: 350px;
      border: none;
      border-radius: 23px;
      margin-bottom: 5px;
      /* Фиксированная ширина поисковой строки */
    }

    .card.mt-5.search-input input.form-control {
      background-color: #27292a;
      height: 46px;
      border-radius: 23px;
      border: none;
      color: #ffffff;
      font-size: 14px;
      padding: 0px 30px;
      width: 100%;
      outline: none;
      /* Заполнение всей доступной ширины контейнера */
    }

    .card.mt-5.search-input i.fa-search {
      position: absolute;
      color: #666;
      left: 20px;
      top: 16px;
      width: 18px;
      height: 18px;
      font-size: 25px;
    }

    .card.mt-5.search-input input.form-control:focus {
      outline: none;
      box-shadow: 0 0 10px #ff414e;
    }

    .film-cards-container {
      margin-top: 5px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      /* Равномерное распределение карточек по контейнеру */
      margin-top: 10px;
      /* Дополнительный отступ между поиском и карточками */
    }

    .mt-5 {
      margin-top: -6px !important;
    }

    /* Стили для мобильных устройств с максимальной шириной 992px */
    @media (max-width: 992px) {
      .header-area {
        background-color: #f7f7f7;
        padding: 0 15px;
        height: 80px;
        box-shadow: none;
        text-align: center;
      }
    }

    .card-body {
      flex: 0;
      padding: 0;
    }

    .no-film {
      margin-top: 1px;
      background-color: #f7f7f7;
      font-size: 12px;
      color: black;
    }
  </style>

</header>

<!-- ***** Header Area End ***** -->