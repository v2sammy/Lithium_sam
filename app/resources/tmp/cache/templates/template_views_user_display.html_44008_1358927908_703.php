<?php
session_start();
?>  

<ul><h4>User Details </h4>
        <?php foreach ($users as $user) { ?>
            <li><?php echo $h($user['first_name']); ?> <br><?php echo $h($user['last_name']); ?><br><?php echo $h($user['date_of_birth ']); ?><br><?php echo $h($user['user_name']); ?><br><?//=$user['email']; ?><br><?php echo $h($user['contact_no']); ?><br><?php echo $h($user['address_1']); ?><br><?php echo $h($user['address_2']); ?>
<br><?php echo $h($user['country']); ?><br><?php echo $h($user['state']); ?><br><?php echo $h($user['city']); ?><br><?php echo $h($user['pincode']); ?>
<br><?php echo $h($user['nationality']); ?><br><?php echo $h($user['religion']); ?><br><?php echo $h($user['education']); ?><br><?php echo $h($user['profession']); ?>
<br><?php echo $h($user['experience']); ?></li>
        <?php } ?>
    </ul>


<h6>Logged In users </h6>

<?php echo $_SESSION['email'];?>
