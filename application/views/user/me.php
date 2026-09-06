<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?="https://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) ) . "?s=60";?>" alt="User profile picture">

                <h3 class="profile-username text-center"><?=$user->login;?></h3>

                <button data-toggle="modal" data-target="#settings" class="btn btn-primary btn-block">Редактировать имя пользователя</button>  <!--Изменил на "Редактировать имя пользователя -->
            </div>
        </div>
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <? foreach ($cources as $cource) { ?>
            <div class="box box-<? if ($cource->percent == 0) { ?>default<? } else if ($cource->percent > 0 && $cource->percent < 100) {?>primary<? } else { ?>success<? } ?>">
                <div class="box-header with-border">
                    <h3 class="box-title"><?=$cource->name;?></h3>
                </div>
                <div class="box-body">
                    <div class="clearfix">
                        <span class="pull-left">Процесс выполнения</span>
                        <small class="pull-right"><?=$cource->percent;?>%</small>
                    </div>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-striped progress-bar-<? if ($cource->percent == 0) { ?>default<? } else if ($cource->percent > 0 && $cource->percent < 100) {?>primary<? } else { ?>green<? } ?>" style="width: <?=$cource->percent;?>%;"></div>
                    </div>
                </div>
                <div class="box-footer">
                    Уроков <?=$cource->done;?> из <?=$cource->all;?>
                </div>
            </div>
        <? } ?>
    </div>
    <!-- /.col -->
</div>
<div id="app">
    <!-- Modal -->
    <div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Настройки профиля</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Логин</label>
                        <input type="email" class="form-control" v-model="login" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="button" @click="sendForm()" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            login: '<?=$user->login;?>'
        },
        methods: {
            sendForm() {
                axios.post('/user/me/setLogin', {
                    login: this.login
                }).then((response) => {
                    if (response.data.error) {
                        swal("Ошибка", response.data.error, "error");
                    }
                    if (response.data.status == 'ok') {
                        location.reload();
                    }
                });
            }
        }
    })
</script>