<?php
require_once './components/connection.php';
$query_str = "SELECT schools.id, 
	   schools.name, 
       schools.picture, 
       schools.location, 
       schools.google_stars, 
       schools.polish_avg, 
       schools.math_avg, 
       schools.eng_avg, 
       schools.polish_rate, 
       schools.math_rate, 
       schools.eng_rate,
       SUM(qualifications.pass_rate)/COUNT(qualifications.pass_rate)
  FROM schools LEFT OUTER JOIN qualifications ON schools.id = qualifications.schools_id
 WHERE schools.type = 1 GROUP BY schools.name ORDER BY (schools.google_stars + schools.polish_avg + schools.polish_rate + schools.eng_avg + schools.eng_rate + schools.math_avg + schools.math_rate + SUM(qualifications.pass_rate) * SUM(qualifications.people))/7 + COUNT(qualifications.pass_rate) DESC;";
$query = $conn->query($query_str);
$result = $query->fetchAll();
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
                <a href=../../index.html#home" class="nav--title"> <img src="../img/logo.png" alt="Zdjęcie przedstawia czerwone logo">
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
        <div class=" header--image">
        </div>
        <div class="header--shadow">
            <div class="text-box">
                <h1>Schools<span>Guide</span></h1>
            </div>
        </div>
        <a href="#ranking"><i class="ti ti-arrow-narrow-down"></i></a>
    </header>
    <section class="section ranking" id = "ranking">
        <div class="text-box">
            <h2 class="heading">Ranking Techników</h2>
            <form action="./components/search.php" method="POST" class="description">
                <div class="search-box">
                    <button type="submit"><i class="ti ti-search"></i></button><input type="search" name="content"
                        placeholder="Szukasz tylko licea" required>
                    <input type="hidden" name="type" value="0">
                </div>
            </form>
        </div>
        <div class="podium">
            <a href="./school.php?id=<?=$result[0][0]?>"  class="card card--first_place">
                <img class="card--img" src="../img/schools/<?= $result[0][2] ?>" alt="">
                <div class="card--content">
                    <p>1</p>
                    <h2>
                        <?= $result[0][1] ?>
                    </h2>
                    <p class="hide"> <?= $result[0][3] ?></p>
                    <?php if ($result[0][4] >= 5): ?>
                        <img class="hide" src="../img/stars/5stars.png" alt="">
                    <?php elseif ($result[0][4] >= 4): ?>
                        <img class="hide" src="../img/stars/4stars.png" alt="">
                    <?php elseif ($result[0][4] >= 3): ?>
                        <img class="hide" src="../img/stars/3stars.png" alt="">
                    <?php elseif ($result[0][4] >= 2): ?>
                        <img class="hide" src="../img/stars/2stars.png" alt="">
                    <?php else: ?>
                        <img class="hide" src="../img/stars/1stars.png" alt="">
                    <?php endif; ?>
                </div>
                <div class="card--shadow"></div>
            </a>
            <a href="./school.php?id=<?=$result[1][0]?>"  class="card card--second_place">
                <img class="card--img" src="../img/schools/<?= $result[1][2] ?>" alt="">
                <div class="card--content">
                    <p>2</p>
                    <h2>
                        <?= $result[1][1] ?>
                    </h2>
                    <p class="hide"> <?= $result[1][3] ?></p>
                    <?php if ($result[1][4] >= 5): ?>
                        <img class="hide" src="../img/stars/5stars.png" alt="">
                    <?php elseif ($result[1][4] >= 4): ?>
                        <img class="hide" src="../img/stars/4stars.png" alt="">
                    <?php elseif ($result[1][4] >= 3): ?>
                        <img class="hide" src="../img/stars/3stars.png" alt="">
                    <?php elseif ($result[1][4] >= 2): ?>
                        <img class="hide" src="../img/stars/2stars.png" alt="">
                    <?php else: ?>
                        <img class="hide" src="../img/stars/1stars.png" alt="">
                    <?php endif; ?>
                </div>
                <div class="card--shadow"></div>
            </a>
            <a href="./school.php?id=<?=$result[2][0]?>" class="card card--third_place">
                <img class="card--img" src="../img/schools/<?= $result[2][2] ?>" alt="">
                <div class="card--content">
                    <p>3</p>
                    <h2>
                        <?= $result[2][1] ?>
                    </h2>
                    <p class="hide"><?= $result[2][3] ?></p>
                    <?php if ($result[2][4] >= 5): ?>
                        <img class="hide" src="../img/stars/5stars.png" alt="">
                    <?php elseif ($result[2][4] >= 4): ?>
                        <img class="hide" src="../img/stars/4stars.png" alt="">
                    <?php elseif ($result[2][4] >= 3): ?>
                        <img class="hide" src="../img/stars/3stars.png" alt="">
                    <?php elseif ($result[2][4] >= 2): ?>
                        <img class="hide" src="../img/stars/2stars.png" alt="">
                    <?php else: ?>
                        <img class="hide" src="../img/stars/1stars.png" alt="">
                    <?php endif; ?>
                </div>
                <div class="card--shadow"></div>
            </a>
        </div>
        <div class="cards">
            <?php for ($i = 3; $i < count($result); $i++): ?>
                <a href="./school.php?id=<?= $result[$i][0] ?>" class="card">
                    <img class="card--img" src="../img/schools/<?=$result[$i][2]?>" alt="">
                    <div class="card--content">
                        <p><?= $i + 1 ?></p>
                        <h2><?= $result[$i][1] ?></h2>
                        <p class="hide"><?= $result[$i][3] ?></p>
                        <?php if ($result[$i][4] >= 5): ?>
                            <img class="hide" src="../img/stars/5stars.png" alt="">
                        <?php elseif ($result[$i][4] >= 4): ?>
                            <img class="hide" src="../img/stars/4stars.png" alt="">
                        <?php elseif ($result[$i][4] >= 3): ?>
                            <img class="hide" src="../img/stars/3stars.png" alt="">
                        <?php elseif ($result[$i][4] >= 2): ?>
                            <img class="hide" src="../img/stars/2stars.png" alt="">
                        <?php else: ?>
                            <img class="hide" src="../img/stars/1stars.png" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="card--shadow"></div>
                </a>
            <?php endfor;
            ; ?>
        </div>
    </section>
    <footer class="footer">
        <p>Maciej Michalczyk &copy; 2022 | Wszelkie prawa zastrzeżone!</p>
    </footer>
    <script src="../js/main.js"></script>

</body>

</html>