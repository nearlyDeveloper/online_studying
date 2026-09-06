<p class="login-box-msg">Регистрация на сайте</p>
<?php echo validation_errors('<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h4><i class="icon fa fa-ban"></i> Ошибка</h4>','</div>'); ?>

<form method="post">
    <div class="form-group has-feedback">
        <input type="text" name="login" value="<?=set_value('login'); ?>" class="form-control" placeholder="Логин">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input type="text" name="email" value="<?=set_value('email'); ?>" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Пароль">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input type="password" name="passconf" class="form-control" placeholder="Повторите пароль">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-flat">Создать аккаунт</button>
    <center class="text_ii"><a href="/user/auth/login">Авторизация</a></center>
</form>

<style>
    .text_ii {
        margin-top: 5px;
    }
</style>