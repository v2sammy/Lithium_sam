<?php use lithium\core\Environment; ?>
 <div id="locale-navigation">
    <ul>
        <?php foreach (Environment::get('locales') as $locale => $name): ?>
            <li><?=$this->html->link($name, compact('locale') + $this->_request->params); ?></li>
        <?php endforeach; ?>
    </ul>
</div>

<?= $t('Laboratory'); ?>
<?= $t('Arun'); ?>
