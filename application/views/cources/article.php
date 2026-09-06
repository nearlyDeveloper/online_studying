<div class="box box-solid">
    <div class="box-header">
        <h3 class="box-title"><?=$article->name;?></h3>
    </div>
    <div class="box-body">
        <?=$article->text;?>
    </div>
</div>
<a href="/cources/view/index/<?=$article->cource;?>" class="btn btn-default"><i class="fa fa fa-graduation-cap"></i> Назад к курсу</a>