<?php include_once 'views/main.view.php';?>
<div><?php
    if(!empty($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?></div>

<div class="col-lg-9">



<table class="table table-striped table-hover ">
    <thead>
    <tr>
        <th>Id</th>
        <th>Description</th>
        <th>Completed</th>
        <th>Created_at</th>
        <?php if($_SESSION['isLoggedIn']):?>
            <th>User</th>
        <?php endif;?>
        <?php if($_SESSION['isLoggedIn']):?>
        <th>Delete?</th>
        <?php endif;?>
    </tr>
    </thead>
    <tbody>

<?php foreach ($viewmodel as $item) : ?>
    <tr><td><?=$item['id']?></td>
        <td><?=$item['description'];?></td>
        <td><?php if($item['completed']==0) :?>
                <p>Not Done</p>
                <?php elseif ($item['completed']==1) :?>
                <p>Done</p>
            <?php endif; ?>
        </td>
        <td><?=$item['created_at'];?></td>
        <?php if($_SESSION['isLoggedIn']==true ):?>
            <td><?=$item['user_id'];?></td>
            <td><form method="post" action="<?php $_SERVER['PHP_SELF']?>">
                    <input type="hidden" name="delete_id" value="<?php echo $item['id'];?>">
                    <a href="<?= ROOT_URL ?>todos/update" class="btn btn-info">Update</a>   &nbsp
                    <input type="submit" name="delete" class="btn btn-danger" value="Delete">
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

    <?php if($_SESSION['isLoggedIn'] && $_SESSION['user_info']['role'] == 3):?>
        <a href="<?=ROOT_URL;?>todos/add" class="btn btn-default">Add Todo</a>
    <?php endif;?>
    </div>