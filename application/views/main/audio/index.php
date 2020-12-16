<hr>
<div class="container main" id="content">
    <div class="row">
        <div class="col-xl-3">

            <?php
            $new_cat = [];
            foreach ($categoryList as $cat):
                if (empty($cat['category'])): ?>

                <? else:
                    if(!in_array($cat['category'],  $new_cat)){
                        $new_cat[] = $cat['category'];
                    }
                endif;
            endforeach;?>

            <?if(!empty($new_cat)):?>
                <h3>Категории</h3>
                <ul>
                    <?php foreach ($new_cat as $val): ?>
                        <li><a href="/<?php echo $this->route['table']?>/<? echo $val?>"><?php echo htmlspecialchars($val, ENT_QUOTES); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?endif;?>


        </div>
        <div class="col-xl-9 row">
            <?php  foreach ($posts as $key => $val):?>
                <article class="content-item col-md-6">
                    <a href="/<?php echo $this->route['table']?>/<?php echo $val['id']?>">
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



