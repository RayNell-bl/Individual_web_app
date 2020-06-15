<?php
    require_once 'secure.php';
    $size = 5;
    if (isset($_GET['page'])) {
        $page = Helper::clearInt($_GET['page']);
    } 
    else {
        $page = 1;
    }
    $predconnect = new PredConnect();
    $count = $predconnect->count();
    $preds = $predconnect->findAll($page*$size-$size,$size);
    $header = 'Список предприятий';
    require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
    <div class="box">
    <section class="content-header">
        <h1>Список предприятий</h1>
        <ol class="breadcrumb">
            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active">Список предприятий</li>
        </ol>
    </section>
    <div class="box-body">
    <a class="btn btn-success" href="add-pred.php">Добавить предприятие</a>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php
if ($preds) {
?>

<table id="example2" class="table table-bordered table-hover">

<thead>
    <tr>
        <th>ИД предприятия</th>
        <th>Название</th>
    </tr>
</thead>
<tbody>
<?php
foreach ($preds as $pred) {
        echo '<tr>';
        echo '<td>'.$pred->id.'</td>';
        echo '<td>'.$pred->name.'</a></td>';
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