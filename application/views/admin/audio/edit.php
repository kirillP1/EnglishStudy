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
                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>