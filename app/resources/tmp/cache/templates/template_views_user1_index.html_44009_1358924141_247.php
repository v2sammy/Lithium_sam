<h2>Registered Users</h2>

 <a href="/logout" style="float:right;"> Logout </a>
    <ul>
        <?php foreach ($user1s as $registration) { ?>
            <li><a href="/view"><?php echo $h($registration['email']); ?></a></li><br>
        <?php } ?>
    </ul>
