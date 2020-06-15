<?php
require_once 'secure.php';
    $size = 5;
    if (isset($_GET['page'])) {
        $page = Helper::clearInt($_GET['page']);
    } 
    else {
        $page = 1;
    }
    $responsfaceconnect = new ResponsFaceConnect();
    $count = $responsfaceconnect->count();
    $matrespons = $responsfaceconnect->findAllMatRespons($page*$size-$size,$size);
    $header = 'Список материально-ответственных';
    require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
    <div class="box">
    <section class="content-header">
        <h1>Список материально-ответственных</h1>
        <ol class="breadcrumb">
            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active">Список материально-ответственных</li>
        </ol>
    </section>
    <div class="box-body">
    <a class="btn btn-success" href="add-matrespons.php">Добавить материально-ответственного</a>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php
if ($matrespons) {
?>

<table id="example2" class="table table-bordered table-hover">

<thead>
    <tr>
        <th>Ф.И.О</th>
        <th>Отдел</th>
        <th>Должность</th>
        <th>Материально ответственный</th>
        <th>Дата передачи</th>
        <th>Единица техники</th>
        <th>Инвентарный номер</th>
    </tr>
</thead>
<tbody>
<?php
foreach ($matrespons as $matrespon) {
    echo '<tr>';
    echo '<td><a href="profile-matrespons.php?id='.$matrespon->employee_id.'">'.$matrespon->fio.'</a> '. '<a href="add-matrespons.php?id='.$matrespon->employee_id.'"><i class="fa fa-pencil"></i></a></td>';
    echo '<td>'.$matrespon->otdel.'</td>';
    echo '<td>'.$matrespon->dolzhnost.'</td>';
    if ($matrespon->matr == 0) {
        echo '<td>'.Нет.'</td>';
    }
    else {
        echo '<td>'.Да.'</td>';
    }
    echo '<td>'.$matrespon->dat.'</td>';
    echo '<td>'.$matrespon->tech.'</td>';
    echo '<td>'.$matrespon->num.'</td>';
    echo '</tr>';
}
?>
</tbody>
</table>
<?php } else {
echo 'Ни одного материально-ответственного не найдено';
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