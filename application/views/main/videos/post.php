<header class="masthead" style="background-image: url(//img.youtube.com/vi/<?php echo htmlspecialchars($data['img_u'], ENT_QUOTES); ?>/maxresdefault.jpg)">
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
               <div class="embed-responsive embed-responsive-16by9">
                <p><?php echo $data['link']; ?></p>
                </div>
            </div>
            <div class="col-xl-12">
                <?if(!empty($_POST)): //debug($_POST); ?>
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
                    <form method="post" action="/<?echo $this->route['table']?>/<?echo $data['id']?>" class="test">
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