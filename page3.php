<?php
//  *************** For PostgreSQL
$dsn = "pgsql:host=localhost;dbname=login_course;port=5432";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false
];
$pdo = new PDO($dsn, 'postgres', 'express', $opt);
echo "Connected To Database";
//  *************** For MySQL
//    $dsn = "mysql:host=localhost;dbname=login_course;port=3306;charset=utf8";
//    $opt = [
//        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//        PDO::ATTR_EMULATE_PREPARES   => false
//    ];
//    $pdo = new PDO($dsn, $user, $pass, $opt);
?>

<!DOCTYPE html>
<html lang="en">
    <?php include "includes/header.php" ?>
    <body>
        <?php include "includes/nav.php" ?>

        <div class="container">
            <h1 class="text-center">Page 3</h1>
            <p>"Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante. Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante quis turpis. Nulla facilisi. Ut fringilla. Suspendisse potenti. Nunc feugiat mi a tellus consequat imperdiet. Vestibulum sapien. Proin quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

            <br>
            <?php
    $result = $pdo->query("SELECT * FROM users");
    if ($result->rowCount()>0) {
        foreach ($result as $row) {
            echo $row['firstname'];
        }
    } else {
        echo "No users in users table";
    }

            ?>
        </div> <!--Container-->

        <?php include "includes/footer.php" ?>
    </body>
</html>