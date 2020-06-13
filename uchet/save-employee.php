<?php
    require_once 'secure.php';
    if (isset($_POST['employee_id'])) {
        $employee = new Employee();
        $employee->lastname = Helper::clearString($_POST['lastname']);
        $employee->employee_id= Helper::clearInt($_POST['employee_id']);
        $employee->firstname = Helper::clearString($_POST['firstname']);
        $employee->patronomic = Helper::clearString($_POST['patronomic']);
        $employee->otdel_id = Helper::clearInt($_POST['otdel_id']);
        $employee->login = Helper::clearString($_POST['login']);
        $employee->pass = password_hash(Helper::clearString($_POST['password']), PASSWORD_BCRYPT);

        if (isset($_POST['saveDirector'])) {
            $employee->dolzhnost_id = 2;
            if ((new EmployeeConnect())->save($employee)) {
                header('Location: profile-employee.php?id='.$employee->employee_id);
            }
        }

        elseif (isset($_POST['saveManager'])) {
            $employee->dolzhnost_id = 3;
            if ((new EmployeeConnect())->save($employee)) {
                header('Location: profile-employee.php?id='.$employee->employee_id);
            }
        }

    }
?>