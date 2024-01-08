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