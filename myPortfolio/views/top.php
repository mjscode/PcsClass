

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Myl's Sample Site</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body {
            padding-top: 70px;
        }
        #info{
            display:none;
        }
        #bottom{
            margin-top: 10%;
        }

        .jumbotron{
            background-color:#4faf54;
        }
        #userN{
            color:orange;
        }
        #status{
            color:red;
        }
        

        <?php if (!empty($styles)) echo $styles ?>
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PCS</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?= getLink(['action'=>'homepage']) ?>">Home</a></li>
                <li><a href="<?= getLink(['action'=>'catalog']) ?>">Catalog</a></li>
                <?php if(!empty($_SESSION["logged"])):?>
                    <li><a href="<?= getLink(['action'=>'logout']) ?>">Log Out</a></li>
                <?php else:?>
                    <li><a href="<?= getLink(['action'=>'signin']) ?>">Log in</a></li>
                <?php endif ?>
            </ul>
            <?php include 'label.php'; ?>
            </div>
        </div>
        </nav>
    <div class="container">
        <div class="jumbotron">
            <div class="container text-center">
                <h1>Store Site</h1>
                <h2>A sample store site from Myl's</h2>
            </div>
        </div>