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
                                <label class="harder">Аудио</label>
                                <audio controls>
                                    <source src="/public/materials/<? echo $this->route['table'] ?>/<? echo $data['id'] . '_audio'?>.mp3" type="audio/mpeg">
                                </audio>
                                <input class="form-control" type="file" name="audio">
                            </div>
                            <div class="form-group test">
                                <label>Задание по буквам 1</label>
                                <div id="parentWordId">
                                    <div class="">
                                        <? $letters = ['a', 'b', 'c', 'd', 'e'];
                                        for($i = 0; $i < count($letters); $i++):
                                            $word_part  = explode(" - ", $data[$letters[$i] . 'Quest']);?>
                                            <?if($word_part[0] == 'aQuest'):?>
                                            <div class="wordDiv">
                                                <span>A</span>
                                                <input class="form-control-plaintext" name="aQuest" type="text" placeholder="Текст для подбора" value="<?echo $word_part[1];?>"/>
                                            </div>
                                        <?elseif($word_part[0] == 'bQuest'):?>
                                            <div class="wordDiv">
                                                <span>B</span>
                                                <input class="form-control-plaintext" name="bQuest" type="text" placeholder="Текст для подбора" value="<?echo $word_part[1];?>"/>
                                            </div>
                                        <?elseif($word_part[0] == 'cQuest'):?>
                                            <div class="wordDiv">
                                                <span>C</span>
                                                <input class="form-control-plaintext" name="cQuest" type="text" placeholder="Текст для подбора" value="<?echo $word_part[1];?>"/>
                                            </div>
                                        <?elseif($word_part[0] == 'dQuest'):?>
                                            <div class="wordDiv">
                                                <span>D</span>
                                                <input class="form-control-plaintext" name="dQuest" type="text" placeholder="Текст для подбора" value="<?echo $word_part[1];?>"/>
                                            </div>
                                        <?elseif($word_part[0] == 'eQuest'):?>
                                            <div class="wordDiv">
                                                <span>Extra</span>
                                                <input class="form-control-plaintext" name="eQuest" type="text" placeholder="Текст для подбора" value="<?echo $word_part[1];?>"/>
                                            </div>
                                        <?endif;?>
                                        <?endfor;?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group test">
                                <label>Задание по буквам 2</label>
                                <div id="parentWordId">
                                    <div class="">
                                        <? $letters = ['a', 'b', 'c', 'd', 'e', 'extra'];
                                        for($i = 0; $i < count($letters); $i++):
                                            $word_part  = explode(" - ", $data[$letters[$i] . 'Test']);?>
                                            <?if($word_part[0] == 'aTest'):?>
                                            <div class="wordDiv">
                                                <span>A</span>
                                                <input class="form-control-plaintext" name="aTest" type="text" placeholder="Текст для подбора" value="<?echo $word_part[1];?>"/>
                                            </div>
                                        <?elseif($word_part[0] == 'bTest'):?>
                                            <div class="wordDiv">
                                                <span>B</span>
                                                <input class="form-control-plaintext" name="bTest" type="text" placeholder="Текст для подбора" value="<?echo $word_part[1];?>"/>
                                            </div>
                                        <?elseif($word_part[0] == 'cTest'):?>
                                            <div class="wordDiv">
                                                <span>C</span>
                                                <input class="form-control-plaintext" name="cTest" type="text" placeholder="Текст для подбора" value="<?echo $word_part[1];?>"/>
                                            </div>
                                        <?elseif($word_part[0] == 'dTest'):?>
                                            <div class="wordDiv">
                                                <span>D</span>
                                                <input class="form-control-plaintext" name="dTest" type="text" placeholder="Текст для подбора" value="<?echo $word_part[1];?>"/>
                                            </div>
                                        <?elseif($word_part[0] == 'eTest'):?>
                                            <div class="wordDiv">
                                                <span>E</span>
                                                <input class="form-control-plaintext" name="eTest" type="text" placeholder="Текст для подбора" value="<?echo $word_part[1];?>"/>
                                            </div>
                                        <?elseif($word_part[0] == 'extraTest'):?>
                                            <div class="wordDiv">
                                                <span>Extra</span>
                                                <input class="form-control-plaintext" name="extraTest" type="text" placeholder="Текст для подбора" value="<?echo $word_part[1];?>"/>
                                            </div>
                                        <?endif;?>
                                        <?endfor;?>
                                    </div>
                                </div>
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