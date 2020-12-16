<hr>
<div class="container main" id="content">
    <div class="row">
        <div class="col-xl-3">
            <? //debug($this->route);?>
            <a href="/<?php echo $this->route['table']?>"><i class="fas fa-arrow-left"></i> Назад</a>
        </div>
        <div class="col-xl-9 row">
            <?php  foreach ($category as $val):?>
                <article class="content-item col-md-6">
                    <a href="/<?php echo $this->route['table']?>/<?php echo $val['id']?>">
                        <img src='//img.youtube.com/vi/<?php echo htmlspecialchars($val['img_u'], ENT_QUOTES); ?>/maxresdefault.jpg' alt="">
                        <div class="flex">
                            <div class="div">
                                <h2><?php echo $val['name']; ?></h2>
                            </div>
                            <div class="div">
                                <?if($val['hard'] == 'easy'):?>
                                    <span class="harder easy"></span>
                                <?elseif($val['hard'] == 'med'):?>
                                    <span class="harder med"></span>
                                <?elseif($val['hard'] == 'hard'):?>
                                    <span class="harder hard"></span>
                                <?endif;?>
                            </div>

                        </div>

                    </a>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="col-xl-12">
            <nav  aria-label="Page navigation example">
                <ul class="pagination d-flex justify-content-center">
                    <li id="prev-page" class="page-item">
                        <a class="page-link" href="jacascript:void(0)" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>



