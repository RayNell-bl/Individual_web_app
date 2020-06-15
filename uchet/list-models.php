<?php
    require_once 'secure.php';
    $size = 5;
    if (isset($_GET['page'])) {
        $page = Helper::clearInt($_GET['page']);
    } 
    else {
        $page = 1;
    }
    $modelsconnect = new ModelsConnect();
    $count = $modelsconnect->count();
    $models = $modelsconnect->findAllModels($page*$size-$size,$size);
    $header = 'Список моделей';
    require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
    <div class="box">
    <section class="content-header">
        <h1>Список моделей</h1>
        <ol class="breadcrumb">
            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active">Список моделей</li>
        </ol>
    </section>
    <div class="box-body">
    <a class="btn btn-success" href="add-model.php">Добавить модель</a>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php
if ($models) {
?>

<table id="example2" class="table table-bordered table-hover">

<thead>
    <tr>
        <th>ИД модели</th>
        <th>Название</th>
    </tr>
</thead>
<tbody>
<?php
foreach ($models as $model) {
        echo '<tr>';
        echo '<td>'.$model->id.'</td>';
        echo '<td>'.$model->name.'</a></td>';
}
?>
</tbody>
</table>
<?php } else {
echo 'Ни одной модели не найдено';
} ?>
</div>
<div class="box-body">
<?php Helper::paginator($count, $page,$size); ?>
</div>
<!-- /.box-body -->
</div>
</div>
</div>
<?php
require_once 'template/footer.php';
?>