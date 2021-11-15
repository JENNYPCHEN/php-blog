<?php session_start(); 
use App\Models\Session;?>
<?php Session::get('user_type_id')?>
<?php Session::get('username') ?>
<?php Session::get('id') ?>
<?php $title = 'ChingYi P.C | Personal Blog | Dashboard'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=filter_var($title, FILTER_SANITIZE_STRING)?></title>
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
    <link rel="stylesheet" type="text/css" href="public/css/style.css" >
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


<!--Grid-->

<body>
    <div class="row">
        <div class="col-lg-2 sidebarcolor">

            <!--logo-->
            <div class="text-center mt-5 mb-5"><a class="navbar-brand" href="index.php" target="_blank" rel="noopener noreferrer"><img src="public/img/logo_transparent.png" alt="logo" width="150"></a></div>

            <!--navbar-->
            <ul class="nav d-flex align-items-start flex-column  me-5 mt-5 mb-5 d-none d-lg-block ps-5 ">
                <hr>

                <li class="nav-item">
                    <a class="nav-link pb-2 " <a href="index.php" target="_blank" rel="noopener noreferrer">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-2 " href="index.php?action=dashboard">Dashboard</a>
                </li>
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Posts
                </a>
                <ul class="dropdown-menu sidebardropdown" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="index.php?action=dashboard#posts">Posts</a>
                    </li>
                    <li><a class="dropdown-item" href="index.php?action=newPostPage">add a post</a>
                    </li>
                </ul>
                <li class="nav-item">
                    <a class="nav-link pb-2" href="index.php?action=dashboard#comments">Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-2" href="index.php?action=dashboard#users">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-2 " href="index.php?action=logout">Logout</a>
                </li>
            </ul>



        </div>

        <!--navbar toggler-->
        <nav class="navbar navbar-expand-lg navbar-light border-light d-lg-none d-block m-1 navcolor fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse " id="navbar">
                    <ul class="navbar-nav mx-auto reply">
                        <li class="nav-item">
                            <a class="nav-link pb-2 " hhref="index.php" target="_blank" rel="noopener noreferrer" >Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=dashboard">Dashboard</a>
                        </li>
                        <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Posts
                        </a>
                        <ul class="dropdown-menu sidebardropdown" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php?action=dashboard#posts">Posts</a>
                            </li>
                            <li><a class="dropdown-item" href="index.php?action=newPostPage">add an posts</a>
                            </li>
                        </ul>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=dashboard#comments">Comments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=dashboard#users">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="col-lg-10  ">
        <!--statistic-->
            <div class=" d-flex justify-content-between card-group border-light mb-3">
              <!--  <div class="card">
                    <h5 class="card-body card-title fs-6"><i class="fas fa-mail-bulk"></i> Publications</h5>
                </div>
                <div class="card">
                    <h5 class="card-body card-title fs-6"><i class="far fa-user"></i>  Users</h5>
                </div>
                <div class="card">
                    <h5 class="card-body card-title fs-6"><i class="far fa-comments"></i>  Comments</h5>
                </div>-->
            </div>
   
            <?=$content ?>

        </div>
    </div>

</body>



<!--footer-->
<footer class="py-4"">
    <div class=" container text-center">
    <div class="row align-items-center">
        <div class="col-md-4 text-lg-left"><img src="public/img/logo_transparent.png"  alt="logo" width="120"></div>
        <div class="col-md-4 text-center">
            <div class="d-flex align-items-center flex-wrap justify-content-center">
                <ul class="list-inline small mb-0 text-white">
                    <li class="list-inline-item"><a href="#"target="_blank" rel="noopener noreferrer" ><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="#"target="_blank" rel="noopener noreferrer" ><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.linkedin.com/in/ching-yi-chen-63120322/"target="_blank" rel="noopener noreferrer" ><i class="fab fa-linkedin"></i></a></li>
                    <li class="list-inline-item"><a href="https://github.com/JENNYPCHEN" target="_blank"><i class="fab fa-github"></i></a></li>
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