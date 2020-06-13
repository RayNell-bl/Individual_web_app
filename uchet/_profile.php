<?php
$employeeconnect = new EmployeeConnect();
$employee = $employeeconnect->findProfileById($id);
if ($employee) {
?>
<tr>
    <th>Ф.И.О.</th>
    <td><?=$employee->fio;?></td>
</tr>
<tr>
    <th>Отдел</th>
    <td><?=$employee->otd;?></td>
</tr>
<tr>
    <th>Должность</th>
    <td><?=$employee->dolzh;?></td>
</tr>
<tr>
    <th>Логин</th>
    <td><?=$employee->login;?></td>
</tr>
<?php } ?>