<?php
require "allMovies.php";
require_once "functions.php";

function pageController($allMovies)
{
    $data = [];
    var_dump($_GET);

    $genre = inputGet("genre");
    $title = inputGet("title");
    $release= inputGet("release");

    function getMoviesByGenre($genre, $allMovies){
        $movies = [];

        foreach ($allMovies as $key => $movie) {
            if(in_array($genre, $movie["genre"])){
                $movies[] = $movie;
            }
        }
        return $movies;
    }

    function getMoviesByTitle($title, $allMovies){
        $movies = [];

        foreach ($allMovies as $movie) {
                if (stripos($movie["title"], $title) !== false) {
                    $movies[] = $movie;
                }
        } 
        return $movies;
    }

    if(empty($_GET)) {
        $data["movies"] = $allMovies;
    } elseif (!empty($genre) && empty($title)) {
        $data["movies"] = $getMoviesByGenre($genre, $allMovies);

    } elseif (!empty($title) && empty($genre)) {
        $data["movies"] = $getMoviesByTitle($title, $allMovies);

        $data["movies"] = $movies;   
    } else if (!empty($title) && !empty($genre)){
        $moviesWithGenre = getMoviesByGenre($genre, $allMovies);
        $moviesWithGenreAndTitle = getMoviesByTitle($title, $moviesWithGenre);
        $data["movies"] = $moviesWithGenreAndTitle;
    } else {
        $data["movies"] = $allMovies;
    }

    if(!empty($release)){
        $movies = [];

        foreach ($allMovies as $movie) {
            if($movie["release"] > $release){
                $movies[] = $movie;
            }
        }
    }


    ####searching by genre####
    if(isset($_GET['genre'])) {

        $genre = $_GET['genre'];
        $movies = [];
    
        foreach($allMovies as $movie) {
            if(in_array($genre, $movie['genre'])) {

                $movies[] = $movie;
            }
        }        

        $data['movies'] = $movies;
    } elseif (isset($_GET["title"])) {
        $title = $_GET['title'];
        $movies = [];
    
        foreach($allMovies as $movie) {
            if(strpos($title, $movie['title']) !== false) {

                $movies[] = $movie;
            }
        }        

        $data['movies'] = $movies;

    // } elseif (isset($_GET["release"])) {
    //     $release = $_GET["release"];
    //     $movies = [];

    //     foreach ($allMovies as $movie) {
    //         if ($release >= 2000) {
    //             $movies = $movie;
    //         }
    //     }

        $data["movies"] = $movies;
    } else {
        // set $data['movies'] to hold all movies (unless another request is made.)
        $data['movies'] = $allMovies;
    }

    #####searching by release#####
    // if(isset($_GET["release"])){

    //     $release = $_GET["release"];
    //     $movies = [];

    //     foreach ($allMovies as $movie) {
    //         if($release >= 2000) {

    //             $movies = $movie;
    //         }
    //     }

    //     $data["movies"] = $movie;
    // } else {
    //     $data["movies"] = $allMovies;
    // }

    return $data;
}

extract(pageController($allMovies));

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <main class="container">
        
        <h1>Welcome to MovieLister!</h1>

        <section class="form">
            <form method="GET" action="movies.php">
                <input type="text" name="title" placeholder="Search movies by title...">
               <!--  <input type="submit" name="submit">
            </form>
            <form> -->
                <input type="text" name="genre" placeholder="Search movies by Genre...">
                <input type="submit">
            </form>
        </section>

        <section class="links">
            <a href="?">Show all movies</a>

            <!-- Add a link that will show only movies with a release date after 2000 -->
            <a href="movies.php?release=2000">All movies released after 2000</a>

            <a href="movies.php?genre=comedy">Show only comedies</a>

            <a href="movies.php?genre=sci-fi">Show all Sci-Fi movies</a>
            
        </section>
        <section class="movies">
            <?php foreach($movies as $movie): ?>
                <div>
                    <h3>Title: <?= $movie['title'] ?></h3>
                    <p>Released in: <?= $movie['release'] ?></p>
                    <p>Genres: <?= implode(", ", $movie['genre']) ?></p>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
</body>
</html>