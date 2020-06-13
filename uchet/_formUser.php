<?php
    $employeeconnect = new EmployeeConnect();
    $employee = $employeeconnect->findById($id);
?>
<div class="form-group">
    <label>Фамилия</label>
    <input type="text" class="form-control"
    name="lastname" required="required" value="<?=$employee->lastname;?>">
</div>
<div class="form-group">
    <label>Имя</label>
    <input type="text" class="form-control" name="firstname" required="required" value="<?=$employee->firstname;?>">
</div>
<div class="form-group">
    <label>Отчество</label>
    <input type="text" class="form-control" name="patronomic" value="<?=$employee->patronomic;?>">
</div>
<div class="form-group">
    <label>Отделение</label>
        <select class="form-control" name="otdel_id">
            <?= Helper::printSelectOptions($employee->otdel_id, (new OtdelConnect())->arrOtdels());?>
        </select>
    </div>
<div class="form-group">
    <label>Логин</label>
    <input type="text" class="form-control" name="login" required="required" value="<?=$employee->login;?>">
</div>
<div class="form-group">
    <label>Пароль</label>
    <input type="password" class="form-control" name="password" required="required">
</div>
<input type="hidden" name="employee_id" value="<?=$id;?>"/>