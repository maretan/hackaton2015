<?php
/**
 * Created by PhpStorm.
 * User: slennie12
 * Date: 11/11/15
 * Time: 3:44 PM
 */
include_once 'includes/dbConnect.php';
?>

<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Het Zeeuwse Zeehondje</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="appartementen.html">De appartementen</a>
                </li>
                <li>
                    <a href="reserveren.html">Reserveren</a>
                </li>
                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/vlissingen/vlissingen_boulevard1.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Het Zeeuwse Zeehondje</h1>
                    <hr class="small">
                    <span class="subheading">Appartementen aan de kust van Vlissingen</span>
                </div>
            </div>
        </div>
    </div>
</header>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once '../includes/dbConnect.php';

    $appartment = $_POST['appartment'];
    $begindatum = $_POST['begindatum'];
    $einddatum = $_POST['einddatum'];
    $people = $_POST['people'];
    $kinderen = $_POST['kinderen'];

    $sql = "SELECT ID FROM Entry WHERE BeginDatum = '$begindatum' && EindDatum = '$einddatum'  ";



    if(mysqli_num_rows($mysqli->query($sql)) == 0) {

        $sql = "INSERT INTO Entry (Appartment, Kinderen, Aantal_Personen, BeginDatum, EindDatum)
            VALUES ('" . $appartment . "' , '" . $kinderen . "' , '" . $people .  "','" . $begindatum . "' , '" . $einddatum . "')";
        if ($mysqli->query($sql) == TRUE) {
            echo '<div id="wrapper">
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-lg-2"></div>
                                <div class="col-lg-5">';
            echo '<div class="alert alert-success" role="alert">Bedankt voor het aanvullen van de gegevens, ze zijn succesvol verwerkt!</div>';
            echo "<p>Of klik <a href=" . $_SERVER['REQUEST_URI'] . ">hier</a> om nog een bedrag toe te voegen.";
            echo '</div></div></div></div></div></div>';
        } else {
            echo '<div id="wrapper">
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-lg-2"></div>
                                <div class="col-lg-5">';
            echo '<div class="alert alert-danger" role="alert">Het lijkt er op alsof er een fout is met de verbinding van de database...</div>';
            echo "<p>Klik <a href=" . $_SERVER['REQUEST_URI'] . ">hier</a> om het opnieuw te proberen.</p>";
            echo '</div></div></div></div></div></div>';
        }
    }else{
        echo '<div id="wrapper">
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-5">';
        echo '<div class="alert alert-danger" role="alert">Lokaal bestaat al!</div>';
        echo "<p>Klik <a href=" . $_SERVER['REQUEST_URI'] . ">hier</a> om het opnieuw te proberen.</p>";
        echo '</div></div></div></div></div></div>';
    }

} else {
?>


<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <p>
                Voeg een reservering toe
            </p>
            <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
            <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
            <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
            <form name="add-appartment" id="add-appartment" method="POST" novalidate>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Naam</label>
                        <input type="number" class="form-control" placeholder="Naam" id="appartment" name="appartment" required
                               data-validation-required-message="Voer je naam in">

                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Aantal Kamers</label>
                        <input type="number" class="form-control" placeholder="Aantal Kinderen" id="kinderen" name="kinderen" required
                               data-validation-required-message="Voer het aantal kamers in">

                        <p class="help-block text-danger"></p>
                    </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Aantal Personen</label>
                        <input type="number" class="form-control" placeholder="Aantal personen" id="people" name="people" required
                               data-validation-required-message="Voer het aantal personen in">

                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>begindatum</label>
                        <input type="date" class="form-control" placeholder="begindatum" id="begindatum" name="begindatum" required
                               data-validation-required-message="Voer je prijs in">

                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>einddatum</label>
                        <input type="date" class="form-control" placeholder="einddatum" id="einddatum" name="einddatum" required
                               data-validation-required-message="Voer je prijs in">

                        <p class="help-block text-danger"></p>
                    </div>
                </div>

                <br>

                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-default">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <ul class="list-inline text-center">
                    <li>
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/clean-blog.min.js"></script>

</body>
<?php
}
?>

</html>