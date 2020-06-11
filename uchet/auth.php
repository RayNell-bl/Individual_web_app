<?php
    require_once 'autoload.php';
    session_start();
    $message = 'Войдите для просмотра страницы учёта техники'; 
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = Helper::clearString($_POST['login']);
            $password = Helper::clearString($_POST['password']);
            $employeeConnect = new EmployeeConnect();
            $employee = $employeeConnect->auth($login, $password);
            if ($employee) {
                $_SESSION['id'] = $employee->employee_id;
                $_SESSION['dolzhnost'] = $employee->name;
                $_SESSION['fio'] = $employee->fio;
                header('Location: index.php');
                exit;
            } 
            else {
                $message = '<br><span style="color:red;">Некорректен логин или пароль</span>';
            }
    }
    require_once 'template/login.php'; 