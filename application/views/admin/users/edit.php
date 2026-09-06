<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <form method="post">
                    <?=validation_errors('<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h4><i class="icon fa fa-ban"></i> Ошибка</h4>','</div>'); ?>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Логин</label>
                        <input type="text" class="form-control" readonly value="<?=$user->login;?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Группа</label>
                        <?=form_dropdown('group', [1=>'Пользователь', 2 => 'Администратор'], $user->group,'class="form-control" ')?>
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</div>
