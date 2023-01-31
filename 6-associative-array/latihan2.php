<?php 
// ARRAY ASSOCIATIVE
// definisinya sama seperti array numerik, kecuali
// key-nya adalah string yang kita buat sendiri
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
// echo $mahasiswa[1]["nilai"][2]; => 100

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
</head>
<body>
    
<h1>List Movies</h1>

<?php foreach($movies as $movie) : ?>
    <ul>
        <li>
            <img src="./images/<?= $movie["image"] ?>" >
        </li>
        <li><?= $movie["title"] ?></li>
        <li><?= $movie["release_date"] ?></li>
        <li><?= $movie["director"] ?></li>
        <li>
            Actor:
            <?php foreach($movie["cast"] as $actor) : ?>
                <?= $actor ?>,
            <?php endforeach; ?>
            etc.
        </li>
    </ul>
<?php endforeach; ?>
    
</body>
</html>