<?php
require_once 'secure.php';
    $size = 5;
    if (isset($_GET['page'])) {
        $page = Helper::clearInt($_GET['page']);
    } 
    else {
        $page = 1;
    }
    $techconnect = new TechniqueConnect();
    $count = $techconnect->count();
    $techies = $techconnect->findAll($page*$size-$size,$size);
    $header = 'Список техники';
    require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
    <div class="box">
    <section class="content-header">
        <h1>Список техники</h1>
        <ol class="breadcrumb">
            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active">Список техники</li>
        </ol>
    </section>
    <div class="box-body">
    <a class="btn btn-success" href="add-tech.php">Добавить единицу техники</a>
</div>
<div class="box-body">
    <a class="btn btn-success" href="add-matrespons.php">Добавить материально-ответственного</a>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php
if ($techies) {
?>

<table id="example2" class="table table-bordered table-hover">

<thead>
    <tr>
        <th>Название</th>
        <th>Инвентарный номер</th>
        <th>Модель</th>
        <th>Комната</th>
        <th>Отдел</th>
    </tr>
</thead>
<tbody>
<?php
foreach ($techies as $tech) {
    echo '<tr>';
    echo '<td><a href="profile-tech.php?id='.$tech->technique_id.'">'.$tech->name.'</a> '. '<a href="add-tech.php?id='.$tech->technique_id.'"><i class="fa fa-pencil"></i></a></td>';
    echo '<td>'.$tech->num.'</td>';
    echo '<td>'.$tech->mo.'</td>';
    echo '<td>'.$tech->ro.'</td>';
    echo '<td>'.$tech->otd.'</td>';
    echo '</tr>';
}
?>
</tbody>
</table>
<?php } else {
echo 'Ни одной единицы техники не найдено';
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