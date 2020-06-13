<?php
require_once 'secure.php';
    $size = 5;
    if (isset($_GET['page'])) {
        $page = Helper::clearInt($_GET['page']);
    } 
    else {
        $page = 1;
    }
    $employeeconnect = new EmployeeConnect();
    $count = $employeeconnect->count();
    $managers = $employeeconnect->findAllManagers($page*$size-$size,$size);
    $header = 'Список менеджеров';
    require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
    <div class="box">
    <section class="content-header">
        <h1>Список менеджеров</h1>
        <ol class="breadcrumb">
            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active">Список менеджеров</li>
        </ol>
    </section>
    <div class="box-body">
    <a class="btn btn-success" href="add-manager.php">Добавить менеджера</a>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php
if ($managers) {
?>

<table id="example2" class="table table-bordered table-hover">

<thead>
    <tr>
        <th>Ф.И.О</th>
        <th>Отдел</th>
        <th>Должность</th>
        <th>Материально ответственный</th>
    </tr>
</thead>
<tbody>
<?php
foreach ($managers as $manager) {
    echo '<tr>';
    echo '<td><a href="profile-managers.php?id='.$manager->employee_id.'">'.$manager->fio.'</a> '. '<a href="add-manager.php?id='.$manager->employee_id.'"><i class="fa fa-pencil"></i></a></td>';
    echo '<td>'.$manager->otdel.'</td>';
    echo '<td>'.$manager->dolzhnost.'</td>';
    if ($manager->matr == 0) {
        echo '<td>'.Нет.'</td>';
    }
    else {
        echo '<td>'.Да.'</td>';
    }
    echo '</tr>';
}
?>
</tbody>
</table>
<?php } else {
echo 'Ни одного менеджера не найдено';
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