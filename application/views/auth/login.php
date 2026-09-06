<p class="login-box-msg">Авторизация на сайте</p>
<? if (isset($_POST['login'])) { ?>
    <div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Ошибка</h4>
        Проверьте данные авторизации
    </div>
<? } ?>

<form method="post">
    <div class="form-group has-feedback">
        <input type="text" name="login" value="<?=set_value('login'); ?>" class="form-control" placeholder="Логин/E-mail">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Пароль">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-flat">Войти</button>
    <center class="text_ii"><a href="/user/auth/register">Создать аккаунт</a></center>
</form>

<style>
    .text_ii {
        margin-top: 5px;
    }
</style>