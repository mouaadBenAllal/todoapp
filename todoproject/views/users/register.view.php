<form class="form-horizontal" method="post">
    <fieldset>
        <legend>Register now!</legend>
        <div class="form-group">
            <label for="inputText" class="col-lg-1 control-label">Username</label>
            <div class="col-lg-5">
                <input type="text" class="form-control" id="inputText" name="username" placeholder="Username" required>
            </div>
        </div>

        <div class="form-group">
            <label for="inputText" class="col-lg-1 control-label">Role</label>
            <div class="col-lg-5">

                <select class="form-control" id="select" name="role">
                    <?php foreach ($viewmodel as $item) : ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name']?></option>
                    <?php endforeach;?>
                </select>
                <span class="help-block">Selecteer 'user' of 'admin' in bovenstaande selectvak.</span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail" class="col-lg-1 control-label">Email</label>
            <div class="col-lg-5">
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-lg-1 control-label">Password</label>
            <div class="col-lg-5">
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword" class="col-lg-1 control-label">Confirm Password</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" id="confPassword" name="confpass" placeholder="Confirm password" onchange="checkPasswordMatch();" required>
                <br>
                <?php Messages::displayMessage();?>
            </div>

        </div>
        <div class="form-group">
            <div class="col-lg-5 col-lg-offset-1">
                <button type="reset" class="btn btn-default">Cancel</button>
                <input type="submit" name="submit" value="submit" id= "inpbutton" class="btn btn-primary">

            </div>
        </div>

    </fieldset>
</form>