<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li
<?=($_SERVER['PHP_SELF']=='/index.php')?'class="active"':'';?>>
                <a href="index.php"><i class="fa fa-calendar"></i><span>Главная</span></a>
            </li>
            <li class="header">Предприятия</li>
            <li <?=($_SERVER['PHP_SELF']=='/list-teacher.php')?'class="active"':'';?>>
                <a href="#"><i class="fa fa-users"></i><span>Предприятия</span></a>
            </li>
            <li <?=($_SERVER['PHP_SELF']=='/list-student.php')?'class="active"':'';?>>
                <a href="list-student.php"><i class="fa fa-users"></i><span>Отделения</span></a>
            </li>
            <li <?=($_SERVER['PHP_SELF']=='/list-student.php')?'class="active"':'';?>>
                <a href="list-student.php"><i class="fa fa-users"></i><span>Комнаты</span></a>
            </li>
            <li class="header">Справочники</li>
            <li <?=($_SERVER['PHP_SELF']=='/list-gruppa.php')?'class="active"':'';?>>
                <a href="list-gruppa.php"><i class="fa fa-users"></i><span>Техника</span></a>
            </li>
            <li <?=($_SERVER['PHP_SELF']=='/list-otdel.php')?'class="active"':'';?>>
                <a href="list-otdel.php"><i class="fa fa-users"></i><span>Модели</span></a>
            </li>
            <li class="header">Сотрудники</li>
            <li <?=($_SERVER['PHP_SELF']=='/list-special.php')?'class="active"':'';?>>
                <a href="list-directors.php"><i class="fa fa-users"></i><span>Управляющие</span></a>
            </li>
            <li <?=($_SERVER['PHP_SELF']=='/list-subject.php')?'class="active"':'';?>>
                <a href="list-managers.php"><i class="fa fa-users"></i><span>Менеджеры</span></a>
            </li>
            <li <?=($_SERVER['PHP_SELF']=='/list-classroom.php')?'class="active"':'';?>>
                <a href="list-teacher.php"><i class="fa fa-users"></i><span>Материально-ответственные</span></a>
            </li>
        </ul>
    </section>
</aside>