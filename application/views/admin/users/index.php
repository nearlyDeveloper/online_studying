<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <? if (count($users)) {?>
                    <table class="table table-hover" datatable="true">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Логин</th>
                            <th scope="col">Группа</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <? foreach ($users as $user) {?>
                            <tr>
                                <th scope="row"><?=$user->id;?></th>
                                <td><?=$user->login;?></td>
                                <td><?=$user->group==2?'Администратор':'Пользователь';?></td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a href="/admin/users/edit/<?=$user->id;?>" type="button" class="btn btn-default">
                                            <i class="fa fa-pencil"></i> Редактировать
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <? } ?>
                        </tbody>
                    </table>
                <? } else { ?>
                    <p class="text-center">Список записей пуст!</p>
                <? } ?>
            </div>
        </div>
    </div>
</div>