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
            <div class="col-xl-4">
                <p><?php echo $data['text']; ?></p>
            </div>
            <div class="col-xl-8">
                <table class="table">
                    <tr>
                        <th>Слово</th>
                        <th>Перевод</th>
                    </tr>
                    <?for($i = 1; $i < 16; $i++):?>
                        <tr>
                            <?if(!empty($data['word' . $i])):
                                $word_part  = explode(" - ",$data['word' . $i]);?>
                                <div class="wordPart">
                                    <td><? echo $word_part[0]?></td>
                                    <td><?echo $word_part[1]?></td>
                                </div>
                            <?endif;?>

                        </tr>
                    <?endfor;?>
                </table>
            </div>
        </div>
    </div>
</section>
