<?php 
/** SUPERGLOBALS
 * $_GET
 * $_POST
 * $_REQUEST
 * $_SESSION
 * $_COOKIE
 * $_SERVER
 * $_ENV
 *  
 * -> Variabel global milik PHP merupakan Array Associative
 */

// var_dump($_SERVER);
// echo "<br>";
// echo $_SERVER["SERVER_NAME"];


// $_GET["nama"] = "Nugie Jaya Nugraha";
// $_GET["nrp"] = "123456";

// var_dump($_GET);

$movies = [
    [
        "title" => "A Man Called Otto",
        "release_date" => "January 13, 2023",
        "director" => "Marc Forster",
        "cast" => ["Tom Hanks", "Mariana Trevino", "Truman Hanks"],
        "image" => "otto.jpg"
    ],
    [
        "title" => "Avatar: The Way of Water",
        "release_date" => "December 14, 2022",
        "director" => "James Cameron",
        "cast" => ["Sam Worthington", "Zoe Saldana", "Sigourney Weaver"],
        "image" => "avatar.jpg"
    ],
];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Movies</title>
</head>
<body>
    <h1>List Movies</h1>

    <ul>
        <?php foreach($movies as $movie) : ?>
            <li>
                <a href="get.php?title=<?= $movie["title"] ?>&release_date=<?= $movie["release_date"] ?>&director=<?= $movie["director"] ?>&image=<?= $movie["image"] ?>">
                    <?= $movie["title"]; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>