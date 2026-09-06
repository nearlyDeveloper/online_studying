<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <a href="/admin/articles/add/<?=$id;?>" class="btn btn-success btn-sm">Добавить статью</a>
                <br><br>
                <table id="table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Иконка</th>
                        <th>Название</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <? if ($articles) {?>
                        <? foreach ($articles as $article) {?>
                            <tr>
                                <td><?=$article->id;?></td>
                                <td><i class="<?=$article->icon;?>"></i></td>
                                <td><?=$article->name;?></td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a href="/admin/articles/edit/<?=$id;?>?id=<?=$article->id;?>" type="button" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="/admin/articles/delete/<?=$id;?>?id=<?=$article->id;?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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