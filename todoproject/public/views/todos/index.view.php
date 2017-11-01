<?php include_once 'views/main.view.php';?>
<!-- Als session message niet leeg is laat message zien. -->
<div>
    <?php if(!empty($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
    <?php Messages::displayMessage();?>
</div>
<!-- foreach loop door alle tasks -->


<div class="col-lg-9">



<table class="table table-striped table-hover ">
    <thead>
    <tr>
        <th>Id</th>
        <th>Description</th>
        <th>Status</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th>User</th>
        <?php if(isset($_SESSION['isLoggedIn'])) : ?>
            <th>Update / Delete?</th>
        <?php endif;?>
    </tr>
    </thead>
    <tbody>
<!-- foreach loop door alle tasks -->
<?php foreach ($viewmodel as $task) : ?>
    <tr><td><?=$task['id']?></td>
        <td><?=$task['description'];?></td>
        <td><?php if($task['completed']==1) :?>
                <span class="label label-success">Done</span>
                <?php else : ?>
                <span class="label label-danger">Not Done</span>
            <?php endif; ?>
        </td>

        <td><?=$task['created_at'];?></td>
        <td><?=$task['updated_at'];?></td>
        <td><?=$task['username'];?></td>
        <!-- Kijkt in session of isLogged in op true staat. -->
        <?php if(isset($_SESSION['isLoggedIn']) == true):?>
            <td><form method="post" action="<?php $_SERVER['PHP_SELF']?>">

                    <a href="<?= ROOT_PATH; ?>todos/update" class="btn btn-info">Update</a>   &nbsp
                    <input type="hidden" name="delete_id" value="<?php echo $task['id'];?>">
                    <input type="submit" name="delete" class="btn btn-danger" value="Delete" onClick="return confirm('Are you sure?')">
                </form>
            </td>
        <?php endif; ?>
<?php endforeach; ?>
    </tr>
    </tbody>
</table>
    <!-- Kijkt of array leeg is. -->
    <?php if(empty($viewmodel)) : ?>
        <?php echo "<b>Er zijn geen todo's voor jouw!</b>"?>
    <?endif; ?>

    <br>
    <br>
    <!-- Kijkt of session isLogged in is geset. -->
    <?php if(isset($_SESSION['isLoggedIn'])) :?>
        <a href="<?=ROOT_PATH;?>todos/add" class="btn btn-default">Add Todo</a>
    <?php endif;?>
    </div>