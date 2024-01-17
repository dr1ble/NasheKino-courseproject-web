<?php
require_once 'src\helpers.php';
?>
<div class="col-md-6">
    <div class="card mt-4">
        <div class="card-header">
            <h2 class="text-center">Список викторин</h2>
        </div>

        <div class="card-body">
            <ul class="list-group">
                <?php
                $res = $conn->query("SELECT * FROM tests");
                while ($row = $res->fetch_assoc()) {
                    ?>
                    <li class="list-group-item">
                        <a href="main.php?id=<?php echo $row['id']; ?>&film_name=<?php echo $row['film_name']; ?>">
                            <?php echo $row['title']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="card mt-4">
        <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 1): ?>
            <div class="card-body text-center">
                <a href="admin.php?do=add" class="btn btn-primary">Добавить тест</a>
            </div>
        <?php endif; ?>
    </div>
</div>