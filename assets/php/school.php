<?php
$id = $_GET['id'] ?? NULL;
if (!$id) {
    header("Location: ../../index.html");
}
require './components/connection.php';
$query_str = "SELECT * FROM schools WHERE schools.id = {$id}";
$query = $conn->query($query_str);
$result = $query->fetch();

if ($result[14] == 1) {
    $query_str = "SELECT * FROM qualifications WHERE qualifications.schools_id ={$id}";
    $query = $conn->query($query_str);
    $qualifications = $query->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SchoolsGuide</title>
    <script src="https://kit.fontawesome.com/6ef5c73047.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
</head>

<body>
    <nav class='nav'>
        <div class="wrapper">
            <div class="nav--header">
                <a href="../../index.html#home" class="nav--title"> <img src="../img/logo.png" alt="Zdjęcie przedstawia czerwone logo">
                    <p>SchoolsGuide<span>SchoolsGuide</span>
                    </p>
                </a>
                <button class="nav--menu">
                    <div class="bars"></div>
                </button>
            </div>
            <div class="nav--links">
            <a href="../../index.html#film">film</a>
                <a href="../../index.html#guide">przewodnik</a>
                <a href="../../index.html#about-us">o nas</a>
                <a href="../../index.html#map">mapa</a>
                <a href="../../index.html##contact">kontakt</a>
            </div>
        </div>
    </nav>
    <header class="header header--small" id="home">
        <div class="header--image"></div>
        <div class="header--shadow">
            <div class="text-box">
                <h1>Schools<span>Guide</span></h1>
            </div>
        </div>
        <a href="#ranking"><i class="ti ti-arrow-narrow-down"></i></a>
    </header>
    <section class="section school" id="ranking">
        <img src="../img/schools/<?= $result[2] ?>" class="main-img" alt="">
        <h1 class="heading">
            <?= $result[1] ?>
        </h1>
        <div class="main-content">
       <?= $result[15] ?>
            <div class="right">
            <?php if ($result[4] >= 5): ?>
                        <img class="hide" src="../img/stars/5stars.png" alt="">
                    <?php elseif ($result[4] >= 4): ?>
                        <img class="hide" src="../img/stars/4stars.png" alt="">
                    <?php elseif ($result[4] >= 3): ?>
                        <img class="hide" src="../img/stars/3stars.png" alt="">
                    <?php elseif ($result[4] >= 2): ?>
                        <img class="hide" src="../img/stars/2stars.png" alt="">
                    <?php else: ?>
                        <img class="hide" src="../img/stars/1stars.png" alt="">
                    <?php endif; ?>
                <p><span>Lokalizacja: </span>
                    <?= $result[5] ?>
                </p>
                <p><span>Link do strony szkoły: </span><a href="  <?= $result[6] ?>">
                        <?= $result[6] ?>
                    </a></p>
                <p><span>Historia szkoły: </span>
                    <?= $result[7] ?>
                </p>
                <p><span>Minimalna ilość punktów: </span>
                    <?= $result[3] ?>
                </p>
            </div>
        </div>
        <div class="average-results">
            <h2>Średnie wyniki maturalne: </h2>
            <div>
                <div>
                    <p>Język Polski (zdawalność <?= $result[11] ?>%)</p>
                    <meter value="<?= $result[8] ?>" min="0" max="100"></meter>
                    <p>
                        <?= $result[8] ?>%
                    </p>
                </div>
                <div>
                    <p>Matematyka (zdawalność <?= $result[12] ?>%)</p>
                    <meter value="<?= $result[9] ?>" min="0" max="100"></meter>
                    <p>
                        <?= $result[9] ?>%
                    </p>
                </div>
                <div>
                    <p>Język Angielski (zdawalność <?= $result[13] ?>%)</p>
                    <meter value="<?= $result[10] ?>" min="0" max="100"></meter>
                    <p>
                        <?= $result[10] ?>%
                    </p>
                </div>
            </div>
        </div>
        <?php if (isset($qualifications)): ?>
        <div class="average-results">
            <h2>Średnia zdawalność egzaminów zawodowych: </h2>
            <div>
                <?php foreach ($qualifications as $q): ?>
                    <div>
                        <p><?= $q[1] ?> ( <?= $q[2] ?> )</p>
                        <meter value="<?= $q[4] ?>" min="0" max="100"></meter>
                        <p><?= $q[4] ?> %</p>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
    </section>
    <footer class="footer">
        <p>Maciej Michalczyk &copy; 2022 | Wszelkie prawa zastrzeżone!</p>
    </footer>
    <script src="../js/main.js"></script>
</body>

</html>
