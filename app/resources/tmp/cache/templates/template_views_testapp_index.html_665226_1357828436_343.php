<?php use lithium\core\Environment; ?>
 <div id="locale-navigation">
    <ul>
        <?php foreach (Environment::get('locales') as $locale => $name): ?>
            <li><?php echo $this->html->link($name, compact('locale') + $this->_request->params); ?></li>
        <?php endforeach; ?>
    </ul>
</div>

<?php echo $h($t('Laboratory')); ?>
<?php echo $h($t('Arun')); ?>
