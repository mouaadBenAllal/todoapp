<?php include_once 'views/main.view.php';?>
<div><?php
    if(!empty($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?></div>
<?php Messages::displayMessage();?>

<div class="col-lg-9">



<table class="table table-striped table-hover ">
    <thead>
    <tr>
        <th>Id</th>
        <th>Description</th>
        <th>Status</th>
        <th>Created_at</th>
        <th>User</th>
        <?php if(isset($_SESSION['isLoggedIn'])) : ?>
            <th>Update / Delete?</th>
        <?php endif;?>
    </tr>
    </thead>
    <tbody>

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
        <td><?=$task['username'];?></td>
        <?php if(isset($_SESSION['isLoggedIn']) == true):?>
            <td><form method="post" action="<?php $_SERVER['PHP_SELF']?>">

                    <a href="<?= ROOT_URL; ?>todos/update" class="btn btn-info">Update</a>   &nbsp
                    <input type="submit" name="delete" class="btn btn-danger" value="Delete" onClick="return confirm('Are you sure?')">
                    <input type="hidden" name="delete_id" value="<?php echo $task['id'];?>">
                </form>
            </td>
        <?php endif; ?>




<?php endforeach; ?>
    </tr>
    </tbody>
</table>

    <?php if(empty($viewmodel)) : ?>
        <?php echo "<b>Er zijn geen todo's voor jouw!</b>"?>
    <?endif; ?>

    <br>
    <br>

    <?php if(isset($_SESSION['isLoggedIn'])) :?>
        <a href="<?=ROOT_URL;?>todos/add" class="btn btn-default">Add Todo</a>
    <?php endif;?>
    </div>