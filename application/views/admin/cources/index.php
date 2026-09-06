<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <a href="/admin/cources/add" class="btn btn-success btn-sm">Добавить курс</a>
                <br><br>
                <table id="table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <? if ($cources) {?>
                        <? foreach ($cources as $cource) {?>
                            <tr>
                                <td><?=$cource->id;?></td>
                                <td><?=$cource->name;?></td>
                                <td>
                                    <a href="/admin/articles/view/<?=$cource->id;?>" type="button" class="btn btn-primary">Статьи курса</a>
                                    <a href="/admin/cources/test/<?=$cource->id;?>" type="button" class="btn btn-default">Тест курса</a>
                                </td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a href="/admin/cources/edit/<?=$cource->id;?>" type="button" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="/admin/cources/delete/<?=$cource->id;?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <? } ?>
                    <? } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>