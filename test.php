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
                <input type="text" placeholder="Поиск фильма" id='searchText' name="searchKeyword"
                  onkeypress="handle" />
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
              <li id="profileTab" class="profile-menu">
                <a href="profile.html">Профиль<img src="assets/images/profile-header.jpg" alt=""></a>
                <div id="profileDropdown" class="profile-dropdown">
                  <a href="login.php">Авторизация</a>
                  <a href="register.php">Регистрация</a>
                </div>
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
  </header>
  <!-- ***** Header Area End ***** -->



  <!-- ВАРИАНТ С Динамическое СМЕНОЙ ПРИ НАВЕДЕНИИ -->
  <?php
require_once __DIR__ . '/../src/helpers.php';
if(is_authenticated()){
  $profileUrl = "profile.php";
}
else{
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
          <div class="search-input">
            <form id="search" action="#">
              <input type="text" placeholder="Поиск фильма" id='searchText' name="searchKeyword" onkeypress="handle" />
              <i class="fa fa-search"></i>
            </form>
          </div>
          <!-- ***** Search End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li><a href="index.php">Главная</a></li>
            <li><a href="browse.php">Обзор</a></li>
            <li><a href="details.php">Детали</a></li>
            <li><a href="streams.php">Фильмы</a></li>
            <li id="profileTab" class="profile-menu">
                <a href="<?php echo $profileUrl; ?>">Профиль<img src="assets/images/profile-header.jpg" alt=""></a>
                <div id="profileDropdown" class="profile-dropdown">
                  <a href="login.php">Авторизация</a>
                  <a href="register.php">Регистрация</a>
                </div>
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
</header>
<!-- ***** Header Area End ***** -->



<?php
require_once __DIR__ . '/../src/helpers.php';
if (is_authenticated()) {
    $profileUrl = "profile.php";
    $profileLabel = "Профиль";
    $logoutLabel = "Выход";
} else {
    $profileUrl = "login.php";
    $profileLabel = "Авторизация";
    $logoutLabel = "";
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

    // Определение элементов меню
    var $profileTab = $("#profileTab");
    var $profileDropdown = $("#profileDropdown");

    // Обработчик события наведения на кнопку профиля
    $profileTab.hover(
      function () {
        // Динамическое изменение содержимого меню
        $profileTab.find("a").text("<?php echo $profileLabel; ?>");
        $profileDropdown.html('<a href="/../src/actions/logout.php"><?php echo $logoutLabel; ?></a>');
        $profileDropdown.slideDown('fast');
      },
      function () {
        $profileDropdown.stop().slideUp('fast');
      }
    );

    // Обработчик события нажатия на кнопку профиля
    $profileTab.on("click", function () {
      // Динамическое определение URL в зависимости от статуса аутентификации
      window.location.href = "<?php echo $profileUrl; ?>";
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
          <div class="search-input">
            <form id="search" action="#">
              <input type="text" placeholder="Поиск фильма" id='searchText' name="searchKeyword" onkeypress="handle" />
              <i class="fa fa-search"></i>
            </form>
          </div>
          <!-- ***** Search End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li><a href="index.php">Главная</a></li>
            <li><a href="browse.php">Обзор</a></li>
            <li><a href="details.php">Детали</a></li>
            <li><a href="streams.php">Фильмы</a></li>
            <li id="profileTab" class="profile-menu">
                <a href="<?php echo $profileUrl; ?>"><?php echo $profileLabel; ?><img src="assets/images/profile-header.jpg" alt=""></a>
                <div id="profileDropdown" class="profile-dropdown">
                  <a href="login.php">Авторизация</a>
                  <a href="register.php">Регистрация</a>
                </div>
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
</header>
<!-- ***** Header Area End ***** -->
