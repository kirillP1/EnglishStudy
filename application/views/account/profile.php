<div class="container">
    <h1 class="mt-4 mb-3"><?php echo $title; ?></h1>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <a href="/account/logout" class="nav-link exit">
                <i class="fas fa-sign-out-alt"></i>
            </a>
            <form action="/account/profile" method="post" class="form">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Логин:</label>
                        <input type="text" class="form-control" value="<?php echo $_SESSION['account']['login']; ?>" disabled>
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Кол-во опыта:</label>
                        <input type="text" class="form-control" value="Уровень <?php echo $_SESSION['account']['level']; ?>: <?php echo $_SESSION['account']['experience']; ?>/<?echo $level['max']?>" disabled>
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>E-mail:</label>
                        <input type="text" class="form-control"  value="<?php echo $_SESSION['account']['email']; ?>" name="email">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Новая аватарка: </label>
                        <input class="form-control" type="file" name="img">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Новый пароль для входа:</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>

        </div>
    </div>
</div>