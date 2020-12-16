<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/<?php echo $this->route['table']?>/posts">Список</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/<?php echo $this->route['table']?>/add">Добавить</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/<?php echo $this->route['table']?>/category">Категории</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div>
                            <a href="/admin/<?php echo $this->route['table']?>/posts"><i class="fas fa-arrow-left"></i> Назад</a>
                        </div>

                        <form class="form" action="/admin/<?php echo $this->route['table']?>/edit/<?php echo $data['id']; ?>" method="post" >
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['name'], ENT_QUOTES); ?>" name="name">
                            </div>
                            <div class="form-group">
                                <label>Категори</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['category'], ENT_QUOTES); ?>" name="category">
                            </div>
                            <div class="form-group">
                                <label class="harder">Сложность</label>
                                <?if($data['hard'] == 'easy'):?>
                                    <label class="easy" for="easy">
                                        <input checked type="radio" id="easy" name="hard" value="easy">
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
                                <?elseif($data['hard'] == 'med'):?>
                                    <label class="easy" for="easy">
                                        <input type="radio" id="easy" name="hard" value="easy">
                                        <span class="fake"></span>
                                    </label>
                                    <label class="med" for="med">
                                        <input checked type="radio" id="med" name="hard" value="med">
                                        <span class="fake"></span>
                                    </label>
                                    <label class="hard" for="hard">
                                        <input type="radio" id="hard" name="hard" value="hard">
                                        <span class="fake"></span>
                                    </label>
                                <?elseif($data['hard'] == 'hard'):?>
                                    <label class="easy" for="easy">
                                        <input type="radio" id="easy" name="hard" value="easy">
                                        <span class="fake"></span>
                                    </label>
                                    <label class="med" for="med">
                                        <input type="radio" id="med" name="hard" value="med">
                                        <span class="fake"></span>
                                    </label>
                                    <label class="hard" for="hard">
                                        <input checked type="radio" id="hard" name="hard" value="hard">
                                        <span class="fake"></span>
                                    </label>
                                <?endif;?>
                            </div>
                            <div class="form-group">
                                <label>Изображение</label>
                                <img src='//img.youtube.com/vi/<?php echo htmlspecialchars($data['img_u'], ENT_QUOTES); ?>/maxresdefault.jpg' alt="">
                                <input value="<?php echo htmlspecialchars($data['img_u'], ENT_QUOTES); ?>" class="form-control" type="text" name="img_u">
                            </div>
                            <div class="form-group">
                                <label>Видео</label>
                                <? echo $data['link']?>
                                <input value="<?php echo htmlspecialchars($data['link'], ENT_QUOTES); ?>" class="form-control" type="text" name="link">
                            </div>
                            <div class="form-group test">
                                <label>Тест</label>
                                <div id="parentTestId">

                                    <?for($i = 1; $i < 8; $i++):?>
                                        <?if(!empty($data['word' . $i])):
                                            $word_part  = explode(" - ",$data['word' . $i]);?>
                                            <?if($word_part[4] == 1) :?>
                                            <div class="wordPart">
                                                <nobr>
                                                    <div>
                                                        <input class="form-control-plaintext" name="testName[<?echo $i?>]" type="text" placeholder="Вопрос" value="<? echo $word_part[0]?>"/>
                                                    </div>
                                                    <div>
                                                        <input checked type="radio" name="test[<?echo $i?>]" value="1">
                                                        <input class="form-control-plaintext" name="first[<?echo $i?>]" type="text" placeholder="Вариант ответа 1" value="<? echo $word_part[1]?>"/>
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="test[<?echo $i?>]" value="2">
                                                        <input class="form-control-plaintext" name="second[<?echo $i?>]" type="text" placeholder="Вариант ответа 2" value="<? echo $word_part[2]?>"/>
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="test[<?echo $i?>]" value="3">
                                                        <input class="form-control-plaintext" name="third[<?echo $i?>]" type="text" placeholder="Вариант ответа 3" value="<? echo $word_part[3]?>"/>
                                                    </div>
                                                </nobr>
                                            </div>
                                        <?elseif($word_part[4] == 2) :?>
                                            <div class="wordPart">
                                                <nobr>
                                                    <div>
                                                        <input class="form-control-plaintext" name="testName[<?echo $i?>]" type="text" placeholder="Вопрос" value="<? echo $word_part[0]?>"/>
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="test[<?echo $i?>]" value="1">
                                                        <input class="form-control-plaintext" name="first[<?echo $i?>]" type="text" placeholder="Вариант ответа 1" value="<? echo $word_part[1]?>"/>
                                                    </div>
                                                    <div>
                                                        <input checked type="radio" name="test[<?echo $i?>]" value="2">
                                                        <input class="form-control-plaintext" name="second[<?echo $i?>]" type="text" placeholder="Вариант ответа 2" value="<? echo $word_part[2]?>"/>
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="test[<?echo $i?>]" value="3">
                                                        <input class="form-control-plaintext" name="third[<?echo $i?>]" type="text" placeholder="Вариант ответа 3" value="<? echo $word_part[3]?>"/>
                                                    </div>
                                                </nobr>
                                            </div>
                                        <?elseif($word_part[4] == 3) :?>
                                            <div class="wordPart">
                                                <nobr>
                                                    <div>
                                                        <input class="form-control-plaintext" name="testName[<?echo $i?>]" type="text" placeholder="Вопрос" value="<? echo $word_part[0]?>"/>
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="test[<?echo $i?>]" value="1">
                                                        <input class="form-control-plaintext" name="first[<?echo $i?>]" type="text" placeholder="Вариант ответа 1" value="<? echo $word_part[1]?>"/>
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="test[<?echo $i?>]" value="2">
                                                        <input class="form-control-plaintext" name="second[<?echo $i?>]" type="text" placeholder="Вариант ответа 2" value="<? echo $word_part[2]?>"/>
                                                    </div>
                                                    <div>
                                                        <input checked type="radio" name="test[<?echo $i?>]" value="3">
                                                        <input class="form-control-plaintext" name="third[<?echo $i?>]" type="text" placeholder="Вариант ответа 3" value="<? echo $word_part[3]?>"/>
                                                    </div>
                                                </nobr>
                                            </div>
                                        <?endif;?>
                                        <?endif;?>

                                    <?endfor;?>
                                </div>
                                <a style="color:red;" onclick="return deleteField()" href="#">[—]</a>
                                <a style="color:green;" onclick="return addTestField()" href="#">[+]</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>