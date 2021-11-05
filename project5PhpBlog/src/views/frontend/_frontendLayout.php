<?php session_start(); 
use App\Models\Session;?>
<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= filter_var($title, FILTER_SANITIZE_STRING); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Icon in title bar-->
    <link rel="icon" href="public/img/icon.png" type="image/icon type">
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Satisfy&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" type="text/css" href="public/css/style.css" 
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--tinyMCE-->
    <script src="https://cdn.tiny.cloud/1/luaptjjzddcgpjnq6jj9axtn2bq4giqp07fre7mj00rivpsr/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</head>

<body>

    <!--logo-->
    <div class="text-center"><a class="navbar-brand" href="index.php"><img src="public/img/logo.png" alt="logo" width="150"></a></div>
    <!--navbar contact-->
    <nav class="navbar navbar-expand-lg navbar-light py-4 bg-white link">
        <div class="container d-flex justify-content-center justify-content-lg-between align-items-center">
            <ul class="list-inline small mb-0 text-dark d-none d-lg-block">
                <li class="list-inline-item"><a href="#"target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#"target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram" ></i></a></li>
                <li class="list-inline-item"><a href="https://www.linkedin.com/in/ching-yi-chen-63120322/"target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin" ></i></a></li>
                <li class="list-inline-item"><a href="https://github.com/JENNYPCHEN"target="_blank" rel="noopener noreferrer" ><i class="fab fa-github"></i></a></li>
            </ul>
            <?php if(empty(Session::get('username'))) : ?>
            <a class="text-small mb-0 h6 d-none d-lg-block admin-title" href="index.php?action=loginpage" title="Please login so that you can leave your comments"><i class="fas fa-sign-in-alt"></i> Signup/Login</a>
            <?php else : ?>
            <div class="text-small mb-0 h6 d-none d-lg-block cardtitle"><i class="fas fa-heart" style="color:#eededa"></i>&nbsp;Hi. <?=Session::get('username') ?>&nbsp;<i class="fas fa-heart" style="color:#eededa"></i></div>
            <a class="text-small mb-0 h6 d-none d-lg-block" href="index.php?action=logout"><i class="fas fa-sign-in-alt"></i> Logout</a>
            <?php endif; ?>
        </div>
    </nav>
    <!--navbar-->
    <?php if(empty(Session::get('username'))) : ?>
    <div class="text-center d-block d-lg-none link "><a href="index.php?action=loginpage" title="Please login so that you can leave your comments"><i class="fas fa-sign-in-alt"></i> Signup/Login</a></div>
    <?php else : ?>
        <div class="text-center d-block d-lg-none link cardtitle "><i class="fas fa-heart" style="color:#eededa"></i>&nbsp;Hi. <?=filter_var(Session::get('username'), FILTER_SANITIZE_STRING); ?>&nbsp;<i class="fas fa-heart" style="color:#eededa"></i></div>
        <div class="text-center d-block d-lg-none link "><a href="index.php?action=logout"><i class="fas fa-sign-in-alt"></i> Logout</a></div>
        <?php endif; ?>
        <nav class="navbar navbar-expand-lg navbar-light border-top border-bottom border-light link sticky-top navcolor">
        <div class="container-fluid">
            <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse " id="navbar">
                <ul class="navbar-nav mx-auto">
                    <!-- Navbar link-->
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#blogposts">Blogpost</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?= $content ?>

    <!--footer-->
    <footer class="py-4"">
    <div class=" container text-center">
        <div class="row align-items-center">
            <div class="col-md-4 text-lg-left"><img src="public/img/logo_transparent.png" alt="..." width="120"></div>
            <div class="col-md-4 text-center">
                <div class="d-flex align-items-center flex-wrap justify-content-center">
                    <ul class="list-inline small mb-0 text-white">
                        <li class="list-inline-item"><a href="#"target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f" ></i></a></li>
                        <li class="list-inline-item"><a href="#"target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram" ></i></a></li>
                        <li class="list-inline-item"><a href="https://www.linkedin.com/in/ching-yi-chen-63120322/"target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin"target="_blank" rel="noopener noreferrer" ></i></a></li>
                        <li class="list-inline-item"><a href="https://github.com/JENNYPCHEN"target="_blank" rel="noopener noreferrer" ><i class="fab fa-github"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 text-lg-right">
            </div>
        </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>