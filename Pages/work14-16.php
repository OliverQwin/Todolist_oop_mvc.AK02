<?php
error_reporting(0);
spl_autoload_register(function (string $all_data) {
    require_once __DIR__ . '/../src/' . str_replace('\\', '/', $all_data) . '.php';
});
$connection = new Projects\Controllers\MainController();
if ($_GET['id']) {
    $connection->deleteids($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Work14-16</title>
</head>

<body>
    <header>
        <h1>Ваш список завдань</h1>
    </header>
    <div class="pages">
        <div class="adding">
            <form action="/Pages/work14-16.php" method="POST">
                <input type="title" name="title" placeholder="Пишу завдання..." />
                <button type="submit">Додати завдання(Enter) + </button>
            </form>
        </div>
        <div class="photo_todo">
            <p class="check-box">
            <div class="todo_class">
                <?php
                $connection = new Projects\Controllers\MainController();
                $sequel = $connection->allDatas();
                if (!empty($_POST['title'])) {
                    $connection->adding($_POST['title']);
                }
                ?>
                <?php if (!empty($sequel)) : ?>
                    <?php foreach ($sequel as $effect) : ?>
                        <span data_todo_id="<?php echo $effect['id']; ?>" class="check-box">
                            <a class="delete_to_do" href="/Pages/work14-16.php?id=<?= $effect['id'] ?>">Вилучити завдання</a></span>
                        <h2><?php echo $effect['title'] ?></h2>
                        <span><?php echo $effect['working'] ?></span>
                        <br>
                        <small>Создано: <?php echo $effect['date_time'] ?></small>
                        <div class="todo_class">
                            <div class="gif">
                                <img src="gif/6GcM.gif" width="100%">
                                <img src="gif/Uond.gif" width="90px" />
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="photo_todo">
                            <div class="todo_class">
                                <div class="gif">
                                    <img src="gif/263809535_0.gif" width="100%">
                                </div>
                            </div>
                            <p>Список завдань порожній(додайте завдання)</p>

                        <?php endif ?>

                        </div>
                        </div>

            </div>
        </div>
    </div>


</body>

</html>
