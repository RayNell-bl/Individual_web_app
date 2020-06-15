<?php
require_once 'secure.php';
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
} else {
    header('Location: 404.php');
}
$header = 'Профиль Единицы техники';
$tech = (new TechniqueConnect())->findProfileById($id);
require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
                <h1>Профиль Единицы техники</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

                    <li><a href="list-directors.php">Список техники</a></li>

                    <li class="active">Профиль</li>
                </ol>
            </section>
            <div class="box-body">
                <a class="btn btn-success" href="add-tech.php?id=<?=$id;?>">Изменить</a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Название</th>
                        <td><?=$tech->name;?></td>
                    </tr>
                    <tr>
                        <th>Инвентарный номер</th>
                        <td><?=$tech->num;?></td>
                    </tr>
                    <tr>
                        <th>Модель</th>
                        <td><?=$tech->mo;?></td>
                    </tr>
                    <tr>
                        <th>Кабинет</th>
                        <td><?=$tech->ro;?></td>
                    </tr>
                    <tr>
                        <th>Дата приобретения</th>
                        <td><?=$tech->da;?></td>
                    </tr>
                    <tr>
                        <th>Материально-ответственный</th>
                            <?if ($tech->fio != '') {
                                echo '<td><a href = "profile-matrespons.php?id='.$tech->eid.'">'.$tech->fio.'</a></td>';
                            }
                            else {
                                echo '<td>'.'Нет материально-ответственного'.'</td>';
                            } ?>
                    </tr>
                    <tr>
                        <th>Дата передачи материально-ответственному</th>
                        <td><?=$tech->daex;?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'template/footer.php';
?>