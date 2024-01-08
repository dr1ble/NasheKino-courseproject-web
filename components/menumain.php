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
            <li <?php echo (basename($_SERVER['PHP_SELF']) === 'index.php') ? 'class="active"' : ''; ?>><a href="index.php">Главная</a></li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) === 'browse.php') ? 'class="active"' : ''; ?>><a href="browse.php">Обзор</a></li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) === 'details.php') ? 'class="active"' : ''; ?>><a href="details.php">Детали</a></li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) === 'streams.php') ? 'class="active"' : ''; ?>><a href="streams.php">Фильмы</a></li>
            <li id="profileTab" class="profile-menu">
              <a href="profile.php">Профиль<img src="assets/images/profile-header.jpg" alt=""></a>
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