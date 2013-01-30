<h2>user</h2>

 <a href="/logout" style="float:right;"> Logout </a>
    <ul>
        <?php foreach ($view as $user) { ?>
            <?php echo $h($user['first_name']); ?><br><?php echo $h($user['last_name']); ?><br><?php echo $h($user['dob']); ?><br><?php echo $h($user['user_name']); ?><br><?php echo $h($user['email']); ?><br><?php echo $h($user['contact_no']); ?><br><?php echo $h($user['address_1']); ?><br><?php echo $h($user['address_2']); ?>
<br><?php echo $h($user['country']); ?><br><?php echo $h($user['state']); ?><br><?php echo $h($user['city']); ?><br><?php echo $h($user['pincode']); ?>
<br><?php echo $h($user['nationality']); ?><br><?php echo $h($user['religion']); ?><br><?php echo $h($user['education']); ?><br><?php echo $h($user['profession']); ?>
<br><?php echo $h($user['experience']); ?>
        <?php } ?>
    </ul>
