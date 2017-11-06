<form class="form-horizontal" method="post">
    <fieldset>
        <legend>Add Todo</legend>
        <div class="form-group">
            <label for="inputDescription" class="col-lg-1 control-label">Omschrijving</label>
            <div class="col-lg-5">
                <input type="text" class="form-control" id="inputDescription" name="description" placeholder="Description" required>
            </div>
        </div>

        <div class="form-group">
            <label for="select" class="col-lg-1 control-label">Gebruiker</label>
            <div class="col-lg-5">

                <select class="form-control" id="select" name="user_id" multiple="multiple">
                    <?php foreach ($viewmodel as $user) : ?>
                        <option value="<?php echo $user['id']?>"><?php echo $user['username']?></option>
                    <?php endforeach;?>
                </select>
                <span class="help-block">Selecteer gebruiker voor de taak.</span>

            </div>

        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-1">
                <a href="<?php echo ROOT_PATH; ?>todos" class="btn btn-default">Cancel</a>
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </div>
        </div>

    </fieldset>
</form>



