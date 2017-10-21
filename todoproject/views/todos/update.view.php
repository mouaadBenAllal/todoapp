<?php
/**
 * Created by PhpStorm.
 * User: mouaad
 * Date: 13/10/2017
 * Time: 17:04
 */

?>
<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <fieldset>

        <legend>Pas Todo aan</legend>
        <div class="form-group">
            <label for="inputDescription" class="col-lg-1 control-label">Omschrijving</label>
            <div class="col-lg-5">
                <input type="text" class="form-control" id="inputDescription" name="description" placeholder="Description" required>
            </div>
        </div>

        <div class="form-group">
            <label for="select" class="col-lg-1 control-label">Todo</label>
            <div class="col-lg-5">
                <select class="form-control" id="select" name="todo_id">
                    <?php foreach ($viewmodel as $item) : ?>
                        <option value="<?php echo $item['id']?>"><?php echo $item['description']?></option>

                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="select" class="col-lg-1 control-label">Completed?</label>
                <div class="col-lg-5">
                    <input type="number" class="form-control" id="inputDescription" name="completed" placeholder="0 of 1" required>
                    <span class="help-block">0 = Not done , 1 = Done.</span>
                </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-1">
                <a href="<?php ROOT_URL; ?>index" class="btn btn-default">Cancel</a>
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </div>
        </div>

    </fieldset>
</form>