<?php
include 'header.php';
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
    <title>Movie Time</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">
    <link rel="stylesheet" href="css/layouts/side-menu.css">
</head>
<body>

    <div id="layout">

        <a href="#menu" id="menuLink" class="menu-link">
            <span></span>
        </a>

        <div id="menu">
            <div class="pure-menu pure-menu-open">
                <!-- <a class="pure-menu-heading" href="#">Company</a> -->

                <ul>
                    <li  class="menu-item-divided pure-menu-selected"><a href="#">Home</a></li>
                    <li><a href="./displayMovies.php">Movies</a></li>
                    <li><a href="./watchedmovies.php">Watched Movies</a></li>
                    <li><a href="./sharad.php">Rate Movies</a></li>
                    <?php
                        $id=$_SESSION['uid'];
                        $query="select rated from user where id=$id";
                        $res=mysql_query($query);
                        $flag=0;
                        while($row = mysql_fetch_array($res)){
                            if($row['rated']>=20){
                                $flag=1;
                            }
                        }
                        if($flag==1)
                        {
                            echo "<li><a href='./suggest.php'>Suggest Me !</a></li>";
                        }
                    ?>
                    <li><a href="./logout.php">Logout</a></li>
                    <li><a href="./fb/connect.php">Facebook !</a></li>
                    <!-- <li><a href="./fb/movies.php">FB</a></li> -->
                    </ul>
                </div>
            </div>

            <div id="main">
                <div class="header">
                    <h1>Movie Time</h1>
                    <h2>Online Movie Recommendation Engine</h2>
                </div>

                <div class="content">
                    <h2 class="content-subhead">About</h2>
                    <p>
                        We present a social network-based recommendation system that uses data from user profiles and user-to-user connections. Our Domain for this project are movies.The algorithm uses collaborative filteirng techniques and matrix factorization has been used to implement the same.This product can be used by members to get recommendations given both their ratings history and their demographic information.<br>
                        So Enjoy !! <br/>
                        <br/>
                        PS: To use this, please rate atleast 20 movies
                    </p>
                </div>
            </div>
        </div>
        <script src="js/ui.js"></script>
    </body>
    </html>
