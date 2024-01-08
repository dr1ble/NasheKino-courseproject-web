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
                <a href="<?php echo $profileUrl; ?>">Профиль<img src="<?php echo $user ? $user['avatar'] : 'assets/images/profile-header.jpg'; ?>" alt="Аватар профиля"></a>
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
