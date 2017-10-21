<form class="form-horizontal" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
    <fieldset>
        <legend>Login</legend>
        <div class="form-group">
            <label for="inputText" class="col-lg-1 control-label">Email</label>
            <div class="col-lg-5">
                <input type="text" class="form-control" name="email" placeholder="Email" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-lg-1 control-label">Password</label>
            <div class="col-lg-5">
                <input type="password" class="form-control" name="password" placeholder="Password" required><br>
                <?php Messages::displayMessage();?>
            </div>
        </div>
<!--        <div class="form-group">-->
<!--            <label for="inputPassword" class="col-lg-2 control-label">Confirm Password</label>-->
<!--            <div class="col-lg-10">-->
<!--                <input type="text" class="form-control" id="inputPassword" name="password" placeholder="Password" required>-->
<!--            </div>-->
<!--        </div>-->

        <div class="form-group">
            <div class="col-lg-5 col-lg-offset-1">
                <button type="reset" class="btn btn-default">Cancel</button>
                <input type="submit" name="submit" value="submit" class="btn btn-primary">

            </div>

        </div>

    </fieldset>
</form>