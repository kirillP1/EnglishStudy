<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/<?php echo $this->route['table']?>/posts">Список</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Добавить</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/<?php echo $this->route['table']?>/category">Категории</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form class="form" action="/admin/<?echo $this->route['table']?>/add" method="post">
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label>Катеория</label>
                                <input class="form-control" type="text" name="category">
                            </div>
                            <div class="form-group">
                                <label class="harder">Сложность</label>
                                <label class="easy" for="easy">
                                    <input type="radio" id="easy" name="hard" value="easy">
                                    <span class="fake"></span>
                                </label>
                                <label class="med" for="med">
                                    <input type="radio" id="med" name="hard" value="med">
                                    <span class="fake"></span>
                                </label>
                                <label class="hard" for="hard">
                                    <input type="radio" id="hard" name="hard" value="hard">
                                    <span class="fake"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Изображение</label>
                                <input class="form-control" type="text" name="img_u">
                            </div>
                            <div class="form-group">
                                <label>Видео</label>
                                <input class="form-control" type="text" name="link">
                            </div>
                            <div class="form-group test">
                                <label>Тест</label>
                                <div id="parentTestId">
                                    <div class="wordPart">
                                        <nobr>
                                            <div>
                                                <input class="form-control-plaintext" name="testName[1]" type="text" placeholder="Вопрос"/>
                                            </div>
                                            <div>
                                                <input checked type="radio" name="test[1]" value="1">
                                                <input class="form-control-plaintext" name="first[1]" type="text" placeholder="Вариант ответа 1"/>
                                            </div>
                                            <div>
                                                <input type="radio" name="test[1]" value="2">
                                                <input class="form-control-plaintext" name="second[1]" type="text" placeholder="Вариант ответа 2"/>
                                            </div>
                                            <div>
                                                <input type="radio" name="test[1]" value="3">
                                                <input class="form-control-plaintext" name="third[1]" type="text" placeholder="Вариант ответа 3"/>
                                            </div>
                                        </nobr>
                                    </div>
                                </div>
                                <a style="color:red;" onclick="return deleteField(this)" href="#">[—]</a>
                                <a style="color:green;" onclick="return addTestField()" href="#">[+]</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>