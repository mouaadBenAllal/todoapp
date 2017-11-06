<form class="form-horizontal" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
    <fieldset>
        <legend>Login</legend>

        <div class="form-group">
            <!-- Laat alle messages zien. -->
            <?php Messages::displayMessage();?>
            <label for="inputText" class="col-lg-1 control-label">Email</label>
            <div class="col-lg-5">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-lg-1 control-label">Password</label>
            <div class="col-lg-5">
                <input type="password" class="form-control" name="password" placeholder="Password" required><br>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-5 col-lg-offset-1">
                <button type="reset" class="btn btn-default">Cancel</button>
                <input type="submit" name="submit" value="submit" class="btn btn-primary">

            </div>

        </div>

    </fieldset>
</form>