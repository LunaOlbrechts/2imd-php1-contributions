<?php
    session_start();
    require_once("classes/Artist.class.php");
    require_once("classes/Album.class.php");
    require_once("classes/ArtistTrack.class.php");
    if(!isset($_SESSION["user"])){
        header("location: login.php");
    }
    if(!empty($_GET["artist"] && !empty($_GET["album"]))){
        $artist = Artist::getArtistById($_GET["artist"]);
        $album = Album::getAlbumById($_GET["album"]);
        $tracks = ArtistTrack::getTracksByAlbumId($_GET["album"]);
    } else {
        header("location: index.php");
    }
?>
<html lang="en">
<?php include_once("head.inc.php") ?>
<body>
    <div class="grid-container">
        <?php include_once("nav.inc.php") ?>
        <main class="tracks">
            <h1><?php echo $album ?> by <?php echo $artist ?></h1>
            <ol>
            <?php foreach($tracks as $track):?>
              <li class="track">
                <?php echo $track["title"]; ?>
              </li>
            <?php endforeach; ?>
            </ol>
        </main>
    </div>
</body>
</html>