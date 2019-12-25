<?php foreach ($model as $item){?>
    <h2><?= $item->name?></h2>
    <p>Izoh: <?= $item->text?></p>
    <p>G'olib: <?= $item->winners->user->username?></p>
    <p>Summa: <?= $item->winners->sum?></p>
    <form action="/winners/create">
        <input type="number" name="sum" required>
        <input type="hidden" name="tender" value="<?= $item->id?>">
        <input type="hidden" name="user" value="<?= Yii::$app->user->id?>">
        <input type="submit" class="btn btn-success" value="OK" />
    </form>
<?php } ?>
