<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title; ?></title>
        <link href="/public/styles/bootstrap.css" rel="stylesheet">
        <link href="/public/styles/main.css" rel="stylesheet">
        <link rel="stylesheet" href="sweetalert2.min.css">
    </head>
    <body>
    <div class="windows8">
        <div class="win-in">
            <div class="wBall" id="wBall_1">
                <div class="wInnerBall"></div>
            </div>
            <div class="wBall" id="wBall_2">
                <div class="wInnerBall"></div>
            </div>
            <div class="wBall" id="wBall_3">
                <div class="wInnerBall"></div>
            </div>
            <div class="wBall" id="wBall_4">
                <div class="wInnerBall"></div>
            </div>
            <div class="wBall" id="wBall_5">
                <div class="wInnerBall"></div>
            </div>
        </div>
    </div>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">EnglishStudy</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <?php if (isset($_SESSION['account']['id'])): ?>
                            <li class="nav-item">
                                <?if(isset($this->route['table'])): ?>
                                    <?if($this->route['table'] == 'rules') :?>
                                        <a class="nav-link active" href="/rules">
                                            <i class="fas fa-ruler-vertical"></i>Правила
                                        </a>
                                    <?else:?>
                                        <a class="nav-link" href="/rules">
                                            <i class="fas fa-ruler-vertical"></i>Правила
                                        </a>
                                    <?endif;?>
                                    <?else:?>
                                    <a class="nav-link" href="/rules">
                                        <i class="fas fa-ruler-vertical"></i>Правила
                                    </a>
                                <?endif;?>
                            </li>
                            <li class="nav-item dropdown">
                                <?if(isset($this->route['table'])): ?>
                                    <?if($this->route['table'] == 'audio' or $this->route['table'] == 'listening'):?>
                                        <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-headphones"></i>Аудио</a>
                                    <?else:?>
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-headphones"></i>Аудио</a>
                                    <?endif;?>

                                <?else:?>
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-headphones"></i>Аудио</a>
                                <?endif;?>

                                <div class="dropdown-menu">
                                    <?if(isset($this->route['table'])): ?>
                                        <?if($this->route['table'] == 'audio') :?>
                                            <a class="dropdown-item nav-link active" href="/audio">
                                               Говорение
                                            </a>
                                        <?else:?>
                                            <a class="dropdown-item nav-link" href="/audio">
                                               Говорение
                                            </a>
                                        <?endif;?>
                                    <?else:?>
                                        <a class="dropdown-item nav-link" href="/audio">
                                            Говорение
                                        </a>
                                    <?endif;?>

                                    <?if(isset($this->route['table'])): ?>
                                        <?if($this->route['table'] == 'listening') :?>
                                            <a class="dropdown-item nav-link active" href="/listening">
                                                Аудирование
                                            </a>
                                        <?else:?>
                                            <a class="dropdown-item nav-link" href="/listening">
                                                Аудирование
                                            </a>
                                        <?endif;?>
                                    <?else:?>
                                        <a class="dropdown-item nav-link" href="/listening">
                                            Аудирование
                                        </a>
                                    <?endif;?>
                                </div>

                            </li>
                            <li class="nav-item">
                                <?if(isset($this->route['table'])): ?>
                                    <?if($this->route['table'] == 'videos') :?>
                                        <a class="nav-link active" href="/videos">
                                            <i class="fas fa-video"></i>Видео
                                        </a>
                                    <?else:?>
                                        <a class="nav-link" href="/videos">
                                            <i class="fas fa-video"></i>Видео
                                        </a>
                                    <?endif;?>
                                <?else:?>
                                    <a class="nav-link" href="/videos">
                                        <i class="fas fa-video"></i>Видео
                                    </a>
                                <?endif;?>
                            </li>
                            <li class="nav-item">
                                <?if(isset($this->route['table'])): ?>
                                    <?if($this->route['table'] == 'dictionary') :?>
                                        <a class="nav-link active" href="/dictionary">
                                            <i class="fas fa-book"></i>
                                            <span class="nav-link-text">Словари</span>
                                        </a>
                                    <?else:?>
                                        <a class="nav-link" href="/dictionary">
                                            <i class="fas fa-book"></i>
                                            <span class="nav-link-text">Словари</span>
                                        </a>
                                    <?endif;?>
                                <?else:?>
                                    <a class="nav-link" href="/dictionary">
                                        <i class="fas fa-book"></i>
                                        <span class="nav-link-text">Словари</span>
                                    </a>
                                <?endif;?>
                            </li>
                            <li class="nav-item">
                                <?if(isset($this->route['table'])): ?>
                                    <?if($this->route['table'] == 'post') :?>
                                        <a class="nav-link active" href="/post">
                                            <i class="fa fa-fw fa-list"></i>Посты
                                        </a>
                                    <?else:?>
                                        <a class="nav-link" href="/post">
                                            <i class="fa fa-fw fa-list"></i>Посты
                                        </a>
                                    <?endif;?>
                                <?else:?>
                                    <a class="nav-link" href="/post">
                                        <i class="fa fa-fw fa-list"></i>Посты
                                    </a>
                                <?endif;?>
                            </li>
                            <li class="nav-item">
                                <?if($this->route['action'] == 'profile'):?>
                                    <a href="/account/profile" class="nav-link active avatar-a">
                                        <!--<i class="fas fa-user-circle"></i>
                                        Профиль-->
                                        <?if(file_exists('public/materials/users' . '/' . $_SESSION['account']['id'] . '.jpg')):?>
                                            <div class="avatar-wrapper" style="background-image: url('/public/materials/users/<?echo $_SESSION["account"]["id"];?>.jpg')">
                                         <?else:?>
                                            <div class="avatar-wrapper" style="background-image: url('/public/materials/users/def.jpg')">
                                        <?endif;?>

                                            </div>
                                        <span class="level">
                                            <i class="fas fa-star"></i>
                                            <?echo $_SESSION['account']['level']?>
                                        </span>

                                    </a>
                                <?else:?>
                                    <a href="/account/profile" class="nav-link  avatar-a">
                                        <!--<i class="fas fa-user-circle"></i>
                                        Профиль-->
                                        <?if(file_exists('public/materials/users' . '/' . $_SESSION['account']['id'] . '.jpg')):?>
                                            <div class="avatar-wrapper" style="background-image: url('/public/materials/users/<?echo $_SESSION["account"]["id"];?>.jpg')">
                                        <?else:?>
                                            <div class="avatar-wrapper" style="background-image: url('/public/materials/users/def.jpg')">
                                        <?endif;?>


                                        </div>
                                        <span class="level">
                                             <i class="fas fa-star"></i>
                                             <?echo $_SESSION['account']['level']?>
                                         </span>
                                    </a>
                                <?endif;?>
                            </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a href="/account/register" class="nav-link">
                                        <i class="fas fa-user-circle"></i>
                                        Регистрация
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/account/login" class="nav-link">
                                        <i class="fas fa-sign-in-alt"></i>
                                        Вход
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <?php echo $content; ?>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <p class="copyright text-muted">&copy; 2021, EnglishStudy</p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://kit.fontawesome.com/0dde516780.js" crossorigin="anonymous"></script>
        <script src="/public/scripts/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="sweetalert2.all.min.js"></script>
        <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script src="sweetalert2.min.js"></script>
        <script src="/public/scripts/cat.js"></script>
        <script src="/public/scripts/form.js"></script>
        <script src="/public/scripts/popper.js"></script>
        <script src="/public/scripts/bootstrap.js"></script>
        <script src="/public/scripts/nicEdit.js"></script>
        <script src="/public/scripts/pagination.js"></script>
        <script src="/public/scripts/add.js"></script>
        <script src="/public/scripts/error.js"></script>
        <script src="/public/scripts/check.js"></script>
        <script src="/public/scripts/preloader.js"></script>
    </body>
</html>