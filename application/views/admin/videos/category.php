<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">Видео
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/<?php echo $this->route['table']?>/posts">Список</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/<?php echo $this->route['table']?>/add">Добавить</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Категории</a>
                    </li>
                </ul>
            </div>
            <div class="card-body" id="content">
                <div class="row">
                    <div class="col-sm-4">
                        <?php if(isset($categoryName)) : ?>
                            <a href="/admin/<?php echo $this->route['table']?>/category"><i class="fas fa-arrow-left"></i> Назад</a>
                            <table class="table">
                                <tr>
                                    <th>Видео в категориии <? echo $categoryName?></th>
                                </tr>
                                <?php foreach ($category as $val): ?>
                                    <tr class="content-item">
                                        <td><a href="/admin/<?php echo $this->route['table']?>/edit/<?php echo $val['id']; ?>"><?php echo htmlspecialchars($val['name'], ENT_QUOTES); ?></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        <? elseif (empty($category)): ?>
                            <p>Список постов пуст</p>
                        <?php else:
                            $new_cat = [];
                            foreach ($category as $cat){
                                if(!in_array($cat['category'],  $new_cat)){
                                    $new_cat[] = $cat['category'];
                                }
                            }
                            ?>
                            <table class="table">
                                <tr>
                                    <th>Название категорий</th>
                                </tr>
                                <?php foreach ($new_cat as $val): ?>

                                    <tr>
                                        <td class="content-item"><a href="/admin/<?php echo $this->route['table']?>/category/<? echo $val?>"><?php echo htmlspecialchars($val, ENT_QUOTES); ?></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>

                        <?php endif; ?>
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
        </div>
    </div>
</div>