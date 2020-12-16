<header class="masthead" style="background-image: url('/public/materials/<?php echo $tableName?>/<?php echo $data['id']; ?>.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1><?php echo htmlspecialchars($data['name'], ENT_QUOTES); ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<section>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <audio controls>
                    <source src="/public/materials/<? echo $this->route['table'] ?>/<? echo $data['id'] . '_audio'?>.mp3" type="audio/mpeg">
                </audio>
            </div>
            <div class="col-xl-12">
                <p>Прослушайте аудиозапись и ответьте на вопросы</p>
            </div>
            <div class="col-xl-12">
                <?if(!empty($_POST)): //debug($_POST); ?>
                <?$part_one = explode(' - ',$data['aQuest']);
                if(!empty($part_one[1])):?>
                    <p>Вы два раза услышите четыре коротких диалога, обозначенных буквами А, B, C, D. Установите соответствие между диалогами и местами, где они происходят: к каждому диалогу подберите соответствующее место действия, обозначенное цифрами. Используйте каждое место действия только один раз. В задании есть одно лишнее место действия.</p>
                    <?  $letters = ['a', 'b', 'c', 'd', 'e'];
                    for($i = 0; $i < count($letters); $i++):
                        $word_part  = explode(" - ", $data[$letters[$i] . 'Quest']);?>
                                <?if($_POST[$word_part[0]] == $word_part[0]):?>
                                        <div class="wordDiv">
                                            <select name="<?echo $_POST[$word_part[0]];?>">
                                                <?if($_POST[$word_part[0]] == "aQuest"):?>
                                                    <option selected value="aQuest">A</option>
                                                <?else:?>
                                                    <option value="aQuest">A</option>
                                                <?endif;?>

                                                <?if($_POST[$word_part[0]] == "bQuest"):?>
                                                    <option selected value="bQuest">B</option>
                                                <?else:?>
                                                    <option value="bQuest">B</option>
                                                <?endif;?>

                                                <?if($_POST[$word_part[0]] == "cQuest"):?>
                                                    <option selected value="cQuest">C</option>
                                                <?else:?>
                                                    <option value="cQuest">C</option>
                                                <?endif;?>

                                                <?if($_POST[$word_part[0]] == "dQuest"):?>
                                                    <option selected value="dQuest">D</option>
                                                <?else:?>
                                                    <option value="dQuest">D</option>
                                                <?endif;?>

                                                    <option value="eQuest">E</option>

                                            </select>
                                            <span><?echo $word_part[1];?></span>
                                            <div class="alert alert-success" role="alert">
                                                Правильно
                                            </div>
                                        </div>
                                <?else:?>
                                        <div class="wordDiv">

                                            <select name="<?echo $_POST[$word_part[0]];?>">
                                                <?if($_POST[$word_part[0]] == "aQuest"):?>
                                                    <option selected value="aQuest">A</option>
                                                <?else:?>
                                                    <option value="aQuest">A</option>
                                                <?endif;?>

                                                <?if($_POST[$word_part[0]] == "bQuest"):?>
                                                    <option selected value="bQuest">B</option>
                                                <?else:?>
                                                    <option value="bQuest">B</option>
                                                <?endif;?>

                                                <?if($_POST[$word_part[0]] == "cQuest"):?>
                                                    <option selected value="cQuest">C</option>
                                                <?else:?>
                                                    <option value="cQuest">C</option>
                                                <?endif;?>

                                                <?if($_POST[$word_part[0]] == "dQuest"):?>
                                                    <option selected value="dQuest">D</option>
                                                <?else:?>
                                                    <option value="dQuest">D</option>
                                                <?endif;?>

                                                <?if($_POST[$word_part[0]] == "eQuest"):?>
                                                    <option selected value="eQuest">Extra</option>
                                                <?else:?>
                                                    <option value="eQuest">Extra</option>
                                                <?endif;?>
                                            </select>
                                            <span><?echo $word_part[1];?></span>
                                            <div class="alert alert-danger" role="alert">
                                                Ошибка
                                            </div>
                                        </div>
                                <?endif;?>
                        <?endfor;?>
                <?endif;?>
                <?$part_two = explode(' - ',$data['aTest']);
                if(!empty($part_two[1])):?>
                    <p>Вы два раза услышите четыре коротких диалога, обозначенных буквами А, B, C, D. Установите соответствие между диалогами и местами, где они происходят: к каждому диалогу подберите соответствующее место действия, обозначенное цифрами. Используйте каждое место действия только один раз. В задании есть одно лишнее место действия.</p>
                    <?  $letters = ['a', 'b', 'c', 'd', 'e', 'extra'];
                    for($i = 0; $i < count($letters); $i++):
                        $word_part  = explode(" - ", $data[$letters[$i] . 'Test']);?>
                        <?if($_POST[$word_part[0]] == $word_part[0]):?>
                        <div class="wordDiv">
                            <select name="<?echo $_POST[$word_part[0]];?>">
                                <?if($_POST[$word_part[0]] == "aTest"):?>
                                    <option selected value="aTest">A</option>
                                <?else:?>
                                    <option value="aTest">A</option>
                                <?endif;?>

                                <?if($_POST[$word_part[0]] == "bTest"):?>
                                    <option selected value="bTest">B</option>
                                <?else:?>
                                    <option value="bTest">B</option>
                                <?endif;?>

                                <?if($_POST[$word_part[0]] == "cTest"):?>
                                    <option selected value="cTest">C</option>
                                <?else:?>
                                    <option value="cTest">C</option>
                                <?endif;?>

                                <?if($_POST[$word_part[0]] == "dTest"):?>
                                    <option selected value="dTest">D</option>
                                <?else:?>
                                    <option value="dTest">D</option>
                                <?endif;?>

                                <?if($_POST[$word_part[0]] == "eTest"):?>
                                    <option selected value="eTest">E</option>
                                <?else:?>
                                    <option value="eTest">E</option>
                                <?endif;?>

                                <?if($_POST[$word_part[0]] == "extraTest"):?>
                                    <option selected value="extraTest">Extra</option>
                                <?else:?>
                                    <option value="extraTest">Extra</option>
                                <?endif;?>

                            </select>
                            <span><?echo $word_part[1];?></span>
                            <div class="alert alert-success" role="alert">
                                Правильно
                            </div>
                        </div>
                    <?else:?>
                        <div class="wordDiv">

                            <select name="<?echo $_POST[$word_part[0]];?>">
                                <?if($_POST[$word_part[0]] == "aTest"):?>
                                    <option selected value="aTest">A</option>
                                <?else:?>
                                    <option value="aTest">A</option>
                                <?endif;?>

                                <?if($_POST[$word_part[0]] == "bTest"):?>
                                    <option selected value="bTest">B</option>
                                <?else:?>
                                    <option value="bTest">B</option>
                                <?endif;?>

                                <?if($_POST[$word_part[0]] == "cTest"):?>
                                    <option selected value="cTest">C</option>
                                <?else:?>
                                    <option value="cTest">C</option>
                                <?endif;?>

                                <?if($_POST[$word_part[0]] == "dTest"):?>
                                    <option selected value="dTest">D</option>
                                <?else:?>
                                    <option value="dTest">D</option>
                                <?endif;?>

                                <?if($_POST[$word_part[0]] == "eTest"):?>
                                    <option selected value="eTest">E</option>
                                <?else:?>
                                    <option value="eTest">E</option>
                                <?endif;?>

                                <?if($_POST[$word_part[0]] == "extraTest"):?>
                                    <option selected value="extraTest">Extra</option>
                                <?else:?>
                                    <option value="extraTest">Extra</option>
                                <?endif;?>
                            </select>
                            <span><?echo $word_part[1];?></span>
                            <div class="alert alert-danger" role="alert">
                                Ошибка
                            </div>
                        </div>
                    <?endif;?>
                    <?endfor;;?>
                <?endif;?>
                    <p>Выберите правильные варианты ответа, исходя из  аудиозаписи</p>
                    <?for($i = 1; $i < 8; $i++):?>
                        <?if(!empty($data['word' . $i])):
                            $word_part  = explode(" - ", $data['word' . $i]);
                            //debug($word_part[0]);?>

                                <? if($_POST['test'][$i] == 1) :?>
                                    <?if($_POST['test'][$i] == $word_part[4]) :?>
                                        <p><?echo $word_part[0];?></p>
                                        <div>
                                            <input checked type="radio" name="test[<?echo $i?>]" value="1">
                                            <span><? echo $word_part[1]?></span>
                                        </div>
                                        <div>
                                            <input type="radio" name="test[<?echo $i?>]" value="2">
                                            <span><? echo $word_part[2]?></span>
                                        </div>
                                        <div>
                                            <input type="radio" name="test[<?echo $i?>]" value="3">
                                            <span><? echo $word_part[3]?></span>
                                        </div>
                                        <div class="alert alert-success" role="alert">
                                            Правильно
                                        </div>
                                    <?else:?>
                                        <p><?echo $word_part[0];?></p>
                                        <div>
                                            <input checked type="radio" name="test[<?echo $i?>]" value="1">
                                            <span><? echo $word_part[1]?></span>
                                        </div>
                                        <div>
                                            <input type="radio" name="test[<?echo $i?>]" value="2">
                                            <span><? echo $word_part[2]?></span>
                                        </div>
                                        <div>
                                            <input type="radio" name="test[<?echo $i?>]" value="3">
                                            <span><? echo $word_part[3]?></span>
                                        </div>
                                        <div class="alert alert-danger" role="alert">
                                            Ошибка
                                        </div>
                                    <?endif;?>

                                <? elseif($_POST['test'][$i] == 2) :?>
                            <?if($_POST['test'][$i] == $word_part[4]) :?>
                                <p><?echo $word_part[0];?></p>
                                <div>
                                    <input type="radio" name="test[<?echo $i?>]" value="1">
                                    <span><? echo $word_part[1]?></span>
                                </div>
                                <div>
                                    <input checked type="radio" name="test[<?echo $i?>]" value="2">
                                    <span><? echo $word_part[2]?></span>
                                </div>
                                <div>
                                    <input type="radio" name="test[<?echo $i?>]" value="3">
                                    <span><? echo $word_part[3]?></span>
                                </div>
                                <div class="alert alert-success" role="alert">
                                    Правильно
                                </div>
                            <?else:?>
                                <p><?echo $word_part[0];?></p>
                                <div>
                                    <input type="radio" name="test[<?echo $i?>]" value="1">
                                    <span><? echo $word_part[1]?></span>
                                </div>
                                <div>
                                    <input checked type="radio" name="test[<?echo $i?>]" value="2">
                                    <span><? echo $word_part[2]?></span>
                                </div>
                                <div>
                                    <input type="radio" name="test[<?echo $i?>]" value="3">
                                    <span><? echo $word_part[3]?></span>
                                </div>
                                <div class="alert alert-danger" role="alert">
                                    Ошибка
                                </div>
                            <?endif;?>
                                <? elseif($_POST['test'][$i] == 3) :?>
                            <?if($_POST['test'][$i] == $word_part[4]) :?>
                                <p><?echo $word_part[0];?></p>
                                <div>
                                    <input type="radio" name="test[<?echo $i?>]" value="1">
                                    <span><? echo $word_part[1]?></span>
                                </div>
                                <div>
                                    <input type="radio" name="test[<?echo $i?>]" value="2">
                                    <span><? echo $word_part[2]?></span>
                                </div>
                                <div>
                                    <input checked type="radio" name="test[<?echo $i?>]" value="3">
                                    <span><? echo $word_part[3]?></span>
                                </div>
                                <div class="alert alert-success" role="alert">
                                    Правильно
                                </div>
                            <?else:?>
                                <p><?echo $word_part[0];?></p>
                                <div>
                                    <input  type="radio" name="test[<?echo $i?>]" value="1">
                                    <span><? echo $word_part[1]?></span>
                                </div>
                                <div>
                                    <input type="radio" name="test[<?echo $i?>]" value="2">
                                    <span><? echo $word_part[2]?></span>
                                </div>
                                <div>
                                    <input checked type="radio" name="test[<?echo $i?>]" value="3">
                                    <span><? echo $word_part[3]?></span>
                                </div>
                                <div class="alert alert-danger" role="alert">
                                    Ошибка
                                </div>
                            <?endif;?>
                                <?else:?>

                                <?endif;?>

                        <?endif;?>
                    <?endfor;?>

                <?else:?>
                    <form method="post" action="/<?echo $this->route['table']?>/<?echo $data['id']?>" class="test"">
                        <?$part_one = explode(' - ',$data['aQuest']);
                        if(!empty($part_one[1])):?>
                            <p>Вы два раза услышите четыре коротких диалога, обозначенных буквами А, B, C, D. Установите соответствие между диалогами и местами, где они происходят: к каждому диалогу подберите соответствующее место действия, обозначенное цифрами. Используйте каждое место действия только один раз. В задании есть одно лишнее место действия.</p>
                            <? $letters = ['a', 'b', 'c', 'd', 'e'];
                            shuffle($letters);
                            for($i = 0; $i < count($letters); $i++):
                                $word_part  = explode(" - ", $data[$letters[$i] . 'Quest']);?>
                                <?if($word_part[0] == 'aQuest'):?>
                                    <div class="wordDiv">
                                        <select name="aQuest">
                                            <option value="aQuest">A</option>
                                            <option value="bQuest">B</option>
                                            <option value="cQuest">C</option>
                                            <option value="dQuest">D</option>
                                            <option value="eQuest">Extra</option>
                                        </select>
                                        <span><?echo $word_part[1];?></span>
                                    </div>
                                <?elseif($word_part[0] == 'bQuest'):?>
                                    <div class="wordDiv">
                                        <select name="bQuest">
                                            <option value="aQuest">A</option>
                                            <option value="bQuest">B</option>
                                            <option value="cQuest">C</option>
                                            <option value="dQuest">D</option>
                                            <option value="eQuest">Extra</option>
                                        </select>
                                        <span><?echo $word_part[1];?></span>
                                    </div>
                                <?elseif($word_part[0] == 'cQuest'):?>
                                    <div class="wordDiv">
                                        <select name="cQuest">
                                            <option value="aQuest">A</option>
                                            <option value="bQuest">B</option>
                                            <option value="cQuest">C</option>
                                            <option value="dQuest">D</option>
                                            <option value="eQuest">Extra</option>
                                        </select>
                                        <span><?echo $word_part[1];?></span>
                                    </div>
                                <?elseif($word_part[0] == 'dQuest'):?>
                                    <div class="wordDiv">
                                        <select name="dQuest">
                                            <option value="aQuest">A</option>
                                            <option value="bQuest">B</option>
                                            <option value="cQuest">C</option>
                                            <option value="dQuest">D</option>
                                            <option value="eQuest">Extra</option>
                                        </select>
                                        <span><?echo $word_part[1];?></span>
                                    </div>
                                <?elseif($word_part[0] == 'eQuest'):?>
                                    <div class="wordDiv">
                                        <select name="eQuest">
                                            <option value="aQuest">A</option>
                                            <option value="bQuest">B</option>
                                            <option value="cQuest">C</option>
                                            <option value="dQuest">D</option>
                                            <option value="eQuest">Extra</option>
                                        </select>
                                        <span><?echo $word_part[1];?></span>
                                    </div>
                                <?endif;?>
                            <?endfor;?>
                        <?endif;?>
                        <?$part_two = explode(' - ',$data['aTest']);
                        if(!empty($part_two[1])):?>
                        <p>Вы два раза услышите четыре коротких диалога, обозначенных буквами А, B, C, D, E. Установите соответствие между диалогами и местами, где они происходят: к каждому диалогу подберите соответствующее место действия, обозначенное цифрами. Используйте каждое место действия только один раз. В задании есть одно лишнее место действия.</p>
                            <? $letters = ['a', 'b', 'c', 'd', 'e', 'extra'];
                            shuffle($letters);
                            for($i = 0; $i < count($letters); $i++):
                                $word_part  = explode(" - ", $data[$letters[$i] . 'Test']);?>
                                <?if($word_part[0] == 'aTest'):?>
                                    <div class="wordDiv">
                                        <select name="aTest">
                                            <option value="aTest">A</option>
                                            <option value="bTest">B</option>
                                            <option value="cTest">C</option>
                                            <option value="dTest">D</option>
                                            <option value="eTest">E</option>
                                            <option value="extraTest">Extra</option>
                                        </select>
                                        <span><?echo $word_part[1];?></span>
                                    </div>
                                <?elseif($word_part[0] == 'bTest'):?>
                                    <div class="wordDiv">
                                        <select name="bTest">
                                            <option value="aTest">A</option>
                                            <option value="bTest">B</option>
                                            <option value="cTest">C</option>
                                            <option value="dTest">D</option>
                                            <option value="eTest">E</option>
                                            <option value="extraTest">Extra</option>
                                        </select>
                                        <span><?echo $word_part[1];?></span>
                                    </div>
                                <?elseif($word_part[0] == 'cTest'):?>
                                    <div class="wordDiv">
                                        <select name="cTest">
                                            <option value="aTest">A</option>
                                            <option value="bTest">B</option>
                                            <option value="cTest">C</option>
                                            <option value="dTest">D</option>
                                            <option value="eTest">E</option>
                                            <option value="extraTest">Extra</option>
                                        </select>
                                        <span><?echo $word_part[1];?></span>
                                    </div>
                                <?elseif($word_part[0] == 'dTest'):?>
                                    <div class="wordDiv">
                                        <select name="dTest">
                                            <option value="aTest">A</option>
                                            <option value="bTest">B</option>
                                            <option value="cTest">C</option>
                                            <option value="dTest">D</option>
                                            <option value="eTest">E</option>
                                            <option value="extraTest">Extra</option>
                                        </select>
                                        <span><?echo $word_part[1];?></span>
                                    </div>
                                <?elseif($word_part[0] == 'eTest'):?>
                                    <div class="wordDiv">
                                        <select name="eTest">
                                            <option value="aTest">A</option>
                                            <option value="bTest">B</option>
                                            <option value="cTest">C</option>
                                            <option value="dTest">D</option>
                                            <option value="eTest">E</option>
                                            <option value="extraTest">Extra</option>
                                        </select>
                                        <span><?echo $word_part[1];?></span>
                                    </div>
                                <?elseif($word_part[0] == 'extraTest'):?>
                                    <div class="wordDiv">
                                        <select name="extraTest">
                                            <option value="aTest">A</option>
                                            <option value="bTest">B</option>
                                            <option value="cTest">C</option>
                                            <option value="dTest">D</option>
                                            <option value="eTest">E</option>
                                            <option value="extraTest">Extra</option>
                                        </select>
                                        <span><?echo $word_part[1];?></span>
                                    </div>
                                <?endif;?>
                            <?endfor;?>
                        <?endif;?>
                        <p>Выберите правильные варианты ответа, исходя из  аудиозаписи</p>
                        <?for($i = 1; $i < 8; $i++):?>
                            <?if(!empty($data['word' . $i])):
                                $word_part  = explode(" - ", $data['word' . $i]);?>


                                    <p><?echo $word_part[0];?></p>
                                    <div>
                                        <input checked type="radio" name="test[<?echo $i?>]" value="1">
                                        <span><? echo $word_part[1]?></span>
                                    </div>
                                    <div>
                                        <input type="radio" name="test[<?echo $i?>]" value="2">
                                        <span><? echo $word_part[2]?></span>
                                    </div>
                                    <div>
                                        <input type="radio" name="test[<?echo $i?>]" value="3">
                                        <span><? echo $word_part[3]?></span>
                                    </div>

                            <?endif;?>
                        <?endfor;?>
                        <div class="btn btn-primary test-sub">Проверить</div>
                    </form>
                <?endif;?>
            </div>
        </div>
    </div>
</section>

