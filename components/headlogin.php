<head>
    <meta charset="UTF-8">
    <title>Наше Кино</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css"> -->
    <link rel="stylesheet" href="assets/app.css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <style>
        body {
            background-color: #1e1e1e;
            /* Цвет фона страницы */
            color: #ffffff;
            /* Цвет текста */
            font-family: 'Montserrat', sans-serif;
            /* Шрифт */
        }

        h4,
        h6 {
            color: #e75e8d !important;
            /* Цвет заголовков */
        }

        a,
        a:hover {
            color: #fff !important;
            /* Цвет ссылок и их цвет при наведении */
            text-decoration: none;
        }

        .submit {
            font-size: 16px;
            color: #fff;
            background-color: #e75e8d;
            padding: 12px 30px;
            display: inline-block;
            border-radius: 25px;
            font-weight: 400;
            text-transform: capitalize;
            letter-spacing: 0.5px;
            transition: all .3s;
            position: relative;
            overflow: hidden;
            margin-top: auto;
            color: inherit;
            /* Наследование цвета текста */
            text-decoration: none;
            /* Убираем стандартное подчеркивание */
            transition: color 0.3s;
            /* Плавное изменение цвета при наведении */
            color: #fff !important;
        }

        .submit:hover {
            color: #e75e8d !important;
            /* Цвет при наведении */
            background-color: #fff;
            color: #ec6090;

        }

        .back-button a {
            font-size: 16px;
            color: #fff;
            background-color: #e75e8d;
            padding: 12px 30px;
            display: inline-block;
            border-radius: 25px;
            font-weight: 400;
            text-transform: capitalize;
            letter-spacing: 0.5px;
            transition: all .3s;
            position: relative;
            overflow: hidden;
            margin-top: auto;

        }

        .back-button a:hover {
            background-color: #fff;
            color: #ec6090;
        }

        .live-stream {
            background-color: #333;
            /* Цвет фона блока Live Stream */
        }

        .live-stream .item {
            background-color: #444;
            /* Цвет фона элемента Live Stream */
        }

        .live-stream .item:hover {
            background-color: #555;
            /* Цвет фона элемента Live Stream при наведении */
        }

        a {
            color: inherit;
            /* Наследование цвета текста */
            text-decoration: none;
            /* Убираем стандартное подчеркивание */
            transition: color 0.3s;
            /* Плавное изменение цвета при наведении */
            color: #fff !important;
        }

        a:hover {
            color: #e75e8d !important;
            /* Цвет при наведении */
        }

        .form-group label {
            display: block;
        }

        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group input[type="file"],
        .form-group input[type="checkbox"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 15px;
        }

        fieldset {
            margin: 20px 0;
        }

        .submit {
            background-color: #e75e8d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            background: #1f2122;
        }

        fieldset {
            margin-bottom: 20px;
        }

        .submit {
            margin-top: 10px;
        }

        .back-button {
            margin-top: 20px;
        }
    </style>
</head>