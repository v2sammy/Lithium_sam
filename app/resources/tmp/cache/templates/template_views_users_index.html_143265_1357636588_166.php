<h2>Users</h2>

    <ul>
        <?php foreach ($users as $user) { ?>
            <li><?php echo $h($user->email); ?><br><?php echo $h($user->password); ?></li>
        <?php } ?>
    </ul>
