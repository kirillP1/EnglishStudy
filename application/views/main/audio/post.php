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
        </div>
    </div>
</section>

