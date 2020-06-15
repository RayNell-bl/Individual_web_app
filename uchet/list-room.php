<?php
require_once 'secure.php';
    $size = 5;
    if (isset($_GET['page'])) {
        $page = Helper::clearInt($_GET['page']);
    } 
    else {
        $page = 1;
    }
    $connect = new RoomConnect();
    $count = $connect->count();
    $rooms = $connect->findAll($page*$size-$size,$size);
    $header = 'Список кабинетов';
    require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
    <div class="box">
    <section class="content-header">
        <h1>Список кабинетов</h1>
        <ol class="breadcrumb">
            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active">Список кабинетов</li>
        </ol>
    </section>
    <div class="box-body">
    <a class="btn btn-success" href="add-room.php">Добавить кабинет</a>
</div>
<!-- /.box-header -->
<div class="box-body">
<?
if ($rooms) {
?>
<table id="example2" class="table table-bordered table-hover">
<thead>
    <tr>
        <th>Кабинет</th>
        <th>Отдел</th>
        <th>Площадь</th>
    </tr>
</thead>
<tbody>
<?php
foreach ($rooms as $room) {
    echo '<tr>';
    echo '<td><a href="profile-room.php?id='.$room->room_id.'">'.$room->name.'</a> '. '<a href="add-room.php?id='.$room->room_id.'"><i class="fa fa-pencil"></i></a></td>';
    echo '<td>'.$room->ot.'</td>';
    echo '<td>'.$room->pl.'</td>';
    echo '</tr>';
}
?>
</tbody>
</table>
<?php } else {
echo 'Ни одного кабинета не найдено';
} ?>
</div>
<div class="box-body">
<?php Helper::paginator($count, $page,$size); ?>
</div>
</div>
</div>
</div>
<?php
require_once 'template/footer.php';
?>