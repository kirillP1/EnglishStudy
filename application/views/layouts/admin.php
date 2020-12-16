<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title; ?></title>
        <link href="/public/styles/bootstrap.css" rel="stylesheet">
        <link href="/public/styles/admin.css" rel="stylesheet">
        <link rel="stylesheet" href="sweetalert2.min.css">
    </head>
    <body class="fixed-nav sticky-footer bg-dark">
        <?php if ($this->route['action'] != 'login'): ?>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
                <span class="navbar-brand">Панель Администратора</span>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/post/posts">
                            <i class="fa fa-fw fa-list"></i>
                            <span class="nav-link-text">Посты</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/rules/posts">
                                <i class="fas fa-ruler-vertical"></i>
                                <span class="nav-link-text">Правила</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/dictionary/posts">
                                <i class="fas fa-book"></i>
                                <span class="nav-link-text">Словари</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/videos/posts">
                                <i class="fas fa-video"></i>
                                <span class="nav-link-text">Видео</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/audio/posts">
                                <i class="fas fa-headphones"></i>
                                <span class="nav-link-text">Говорение (диалог)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/listening/posts">
                                <i class="fas fa-headphones"></i>
                                <span class="nav-link-text">Аудирование</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/logout">
                            <i class="fa fa-fw fa-sign-out"></i>
                            <span class="nav-link-text">Выход</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php endif; ?>
        <?php echo $content; ?>
        <?php if ($this->route['action'] != 'login'): ?>
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>&copy; 2021, EnglishStudy</small>
                    </div>
                </div>
            </footer>
        <?php endif; ?>
        <script src="https://kit.fontawesome.com/0dde516780.js" crossorigin="anonymous"></script>
        <script src="/public/scripts/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="sweetalert2.all.min.js"></script>
        <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script src="sweetalert2.min.js"></script>
        <script src="/public/scripts/form.js"></script>
        <script src="/public/scripts/popper.js"></script>
        <script src="/public/scripts/bootstrap.js"></script>
        <script src="/public/scripts/nicEdit.js"></script>
        <script src="/public/scripts/error.js"></script>
        <script src="/public/scripts/pagination.js"></script>
        <script src="/public/scripts/add.js"></script>
        <script src="/public/scripts/check.js"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(function() {
                new nicEditor({iconsPath : '/public/images/nicEditorIcons.gif'},{buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area1');
            });

        </script>
    </body>
</html>