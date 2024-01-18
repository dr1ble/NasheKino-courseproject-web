<?php
require_once 'src\helpers.php';
require_once 'src\filminfo.php';
?>
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
            // Вписать название фильма в строку поиска
            $('#film').val(filmname);
            // Скрыть выпадающий список после выбора фильма
            $('#filmList').fadeOut();
        });

    });
</script>

<div class="col-md-6">
    <form action="admin.php?do=save" method="post">
        <div class="card mt-4">
            <div class="card-header">
                <h2 class="text-center">Добавление теста</h2>
            </div>

            <div class="card-body">
                <div>
                    <!-- <label for="title" class="form-label">Название теста</label>
                    <input type="text" name="title" id="title" class="form-control"><br> -->
                    <!-- <label for="title" class="form-label">Название фильма</label>
                    <select name="title" id="title" class="form-control">
                        <option value="" selected disabled hidden>Выберите фильм</option>
                        
                    </select> -->
                    <div class="card-body">
                        <div>
                            <label for="title" class="form-label">Название теста</label>
                            <input type="text" name="title" id="title" class="form-control"><br>
                            <label for="title" class="form-label">Название фильма</label>
                            <input type="text" name="film" id="film" class="form-control mt-2"
                                placeholder="Название фильма" required />
                            <div id="filmList"></div>
                            <div id="filmCards">

                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <h4>Добавление вопросов</h4>
                        </div>
                        <div class="questions">
                            <div class="question-items">
                                <div class="mt-4">
                                    <label for="question_1" class="form-label">Вопрос #1</label>
                                    <input type="text" name="question_1" id="question_1" class="form-control">
                                    <div class="answers">
                                        <div class="answer-items">
                                            <div>
                                                <label for="answer_text_1_1" class="form-label">Ответ #1</label>
                                                <input type="text" name="answer_text_1_1" id="answer_text_1_1"
                                                    class="form-control">
                                            </div>
                                            <div class="mt-2">
                                                <label for="answer_score_1_1" class="form-label">Балл за ответ
                                                    #1</label>
                                                <input type="text" name="answer_score_1_1" id="answer_score_1_1"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="button" class="btn btn-light border addAnswer"
                                                data-question="1" data-answer="1">Добавить вариант ответа</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-primary addQuestion">Добавить вопрос</button>
                            </div>

                        </div>

                        <div class="mt-5 text-center">
                            <h4>Добавление результатов</h4>
                        </div>
                        <div class="results">
                            <div class="result-items">
                                <div class="mt-4">
                                    <div class="">
                                        <label for="result_1" class="form-label">Результат #1</label>
                                        <textarea name="result_1" id="result_1" class="form-control"></textarea>
                                    </div>
                                    <div class="mt-2">
                                        <label for="result_score_min_1" class="form-label">Балл (от) #1</label>
                                        <input type="text" name="result_score_min_1" id="result_score_min_1"
                                            class="form-control">
                                    </div>
                                    <div class="mt-2">
                                        <label for="result_score_max_1" class="form-label">Балл (до) #1</label>
                                        <input type="text" name="result_score_max_1" id="result_score_max_1"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-primary addResult">Добавить результат</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4 mb-4">
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </div>
                <div style="display: flex; align-items: center; justify-content: center;">
                    <div class="main-button">
                        <br><a href="admin.php" class="back-button" style="text-decoration: none;">Назад</a>
                    </div>
                </div>
    </form>
</div>
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
            // Вписать название фильма в строку поиска
            $('#film').val(filmname);
            // Скрыть выпадающий список после выбора фильма
            $('#filmList').fadeOut();
        });
    });
</script>
<style>
    /* Стили для живого поиска */
    #filmList {
        position: absolute;
        z-index: 1000;
        background-color: #fff;
        border: 1px solid #000 !important;
        max-height: 150px;
        overflow-y: auto;
    }

    .film-card {
        background-color: #fff !important;
        color: #000 !important;
        border: solid 1px #ff414e !important;
        padding: 10px;
        cursor: pointer;
    }

    .film-card:hover {
        background-color: #ff414e !important;
        color: #fff !important;
    }
</style>