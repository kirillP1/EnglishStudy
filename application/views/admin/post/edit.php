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
                                <label>Описание</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?>" name="description">
                            </div>
                            <div class="form-group">
                                <label>Текст</label>
                                <textarea class="form-control" id="area1" name="text" style="width: 450px; height: 100px;">
                                    <?php echo htmlspecialchars($data['text'], ENT_QUOTES); ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Изображение</label>
                                <img src='/public/materials/<? echo $this->route['table'] ?>/<? echo $data['id']?>.jpg' alt="">
                                <input class="form-control" type="file" name="img">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>