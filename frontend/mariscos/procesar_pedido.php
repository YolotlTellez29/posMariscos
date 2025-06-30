<?php
session_start();
$_POST = $_POST ?? [];
include 'data/menu.php';
?>

<form id="redirigir" method="POST" action="pago.php">
    <?php foreach ($_POST as $key => $value): ?>
        <?php if (is_array($value)): ?>
            <?php foreach ($value as $k => $v): ?>
                <input type="hidden" name="<?= $key ?>[<?= $k ?>]" value="<?= $v ?>">
            <?php endforeach; ?>
        <?php else: ?>
            <input type="hidden" name="<?= $key ?>" value="<?= $value ?>">
        <?php endif; ?>
    <?php endforeach; ?>
</form>
<script>document.getElementById('redirigir').submit();</script>