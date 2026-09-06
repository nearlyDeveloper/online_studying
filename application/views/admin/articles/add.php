<?php echo form_open(); ?>
<div class="row">
    <div class="col-xs-12">
        <?php echo validation_errors(); ?>
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label for="">Название статьи</label>
                    <input type="text" class="form-control" name="name" placeholder="Основы VK API">
                </div>
                <div class="form-group">
                    <label for="">Иконка</label>
                    <input type="text" class="form-control" name="icon" placeholder="fa fa-quora">
                    <small>Для поиска воспользуйтесь <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">сайтом</a></small>
                </div>
                <div class="form-group">
                    <label for="">Содержание статьи</label>
                    <textarea class="form-control" name="text"></textarea>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </div>
    </div>
</div>
</form>