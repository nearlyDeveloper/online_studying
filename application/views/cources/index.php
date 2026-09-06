<div>
    <div class="box box-widget widget-user-2">
        <div class="widget-user-header">
            <div class="widget-user-image">
                <img class="img-circle" src="<?=$cource->image;?>" alt="<?=$cource->name;?>">
            </div>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username"><?=$cource->name;?></h3>
            <h5 class="widget-user-desc"><span class="badge bg-aqua">кол-во уроков <?=count($articles);?></span></h5>
        </div>
        <div class="box-footer box-comments" style="padding-top: 15px;">
            <p><?=$cource->descr;?></p>
        </div>
    </div>
    <? if ($user) { ?>
        <div class="row">
            <? foreach ($articles as $article) { ?>
                <div class="col-md-3">
                    <a class="text-black" href="/cources/article/index/<?=$article->id;?>">
                        <div class="leas-block">
                            <? if (@in_array($article->id, $user->articles)) { ?>
                            <small class="label pull-right bg-blue">прочитан</small>
                            <? } else {?>
                            <small class="label pull-right bg-danger">не прочитан</small>
                            <? } ?>

                            <i class="<?=$article->icon;?>" aria-hidden="true"></i>
                            <div><?=$article->name;?></div>
                        </div>
                    </a>
                </div>
            <? } ?>
            <div class="col-md-3">
                <a class="text-black" href="/cources/testing/index/<?=$cource->id;?>">
                    <div class="leas-block test-block">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <div>Контрольный тест</div>
                    </div>
                </a>
            </div>
        </div>
    <? } else { ?>
        <div class="box box-solid">
            <div class="box-body">
                <center>
                    <img style="margin-top: 15px;margin-bottom: 8px" width="50px" src="https://www.freeiconspng.com/uploads/a-red-error-exclamation-sign-meaningful-official-round-26.png">
                </center>
                <p class="text-center">Вы <b>не авторизировались</b> на сайте, поэтому информация о курсе вам недоступена!</p>
                <center>
                    <div class="btn-group">
                        <a href="/user/auth/login" class="btn btn-default">Авторизация</a>
                        <a href="/user/auth/register" class="btn btn-primary">Регистрация</a>
                    </div>
                </center>
            </div>
            <!-- /.box-body -->
        </div>
    <? } ?>
</div>

<style>
    .leas-block {
        background: white;
        padding: 33px;
        text-align: center;
        border-radius: 5px;
        font-size: 18px;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        margin-bottom: 9px;
        cursor: pointer;
    }
    .leas-block > i {
        font-size: 37px;
        margin-bottom: 15px;
        color: #767676;
    }
    .leas-block .label {
        position: absolute;
        right: 8px;
        top: 11px;
    }
    .bg-blue {
        background-image: linear-gradient(45deg, #b066fe, #68bcff);
        font-weight: 400;
    }
    .bg-danger {
        background-image: linear-gradient(45deg, #f24645, #ff8d57);
        font-weight: 400;
    }
    .test-block {
        background-image: linear-gradient(45deg, #b066fe, #63e2ff);
        color: white;
    }
    .test-block i {
        color: white;
    }
</style>