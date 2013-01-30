<‍script type="text/javascript">
$(document).ready(function() {
    $('a[target]').bind('click', function(e) {
        $($(this).attr('target')).load(this.href);
        e.preventDefault();
    });
});
</script>

<‍p>
    <?=$message; ?> a regular request.
</p>
<?=$this->html->link('Load...', 'HelloWorld::test', array('target' => 'p:first')); ?>
