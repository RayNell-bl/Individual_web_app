<?php
require_once 'secure.php';
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
} else {
    header('Location: 404.php');
}
$header = 'Профиль отдела';
$otdel = (new OtdelConnect())->findProfileById($id);
$emps = (new OtdelConnect())->findEmps ($id);
require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
                <h1>Профиль отдела</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

                    <li><a href="list-otdel.php">Список отделов</a></li>

                    <li class="active">Профиль</li>
                </ol>
            </section>
            <div class="box-body">
                <a class="btn btn-success" href="add-otdel.php?id=<?=$id;?>">Изменить</a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Название</th>
                        <td><?=$otdel->name;?></td>
                    </tr>
                    <tr>
                        <th>Предприятие</th>
                        <td><?=$otdel->pr;?></td>
                    </tr>
                </table>
            </div>

            <div>
                <h1>Список сотрудников</h1>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Ф.И.О</th>
                            <th>Должность</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($emps as $emp) {
                        if ($emp->dolzhnost_id != 1) {
                        echo '<tr>';
                        if ($emp->dolzhnost_id == 2) {
                            echo '<td><a href="profile-director.php?id='.$emp->employee_id.'">'.$emp->fio.'</a> '. '</a></td>';
                        }
                        elseif ($emp->dolzhnost_id == 3) {
                            echo '<td><a href="profile-managers.php?id='.$emp->employee_id.'">'.$emp->fio.'</a> '. '</a></td>';
                        }
                        echo '<td>'.$emp->dolzh.'</td>';
                        echo '</tr>';
                    }
                }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'template/footer.php';
?>