<?php echo form_open(); ?>
<div class="row">
    <div class="col-xs-12">
        <?php echo validation_errors(); ?>
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label for="">Название</label>
                    <input type="name" value="<?=$cource->name;?>" class="form-control" name="name" placeholder="Курс для начинающих">
                </div>
                <div class="form-group">
                    <label for="">Изображение</label>
                    <input type="text" value="<?=$cource->image;?>" class="form-control" name="image" placeholder="https://..png">
                </div>
                <div class="form-group">
                    <label for="">Описание курса</label>
                    <textarea class="form-control" name="descr"><?=$cource->descr;?></textarea>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </div>
    </div>
</div>
</form>