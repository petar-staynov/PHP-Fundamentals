<form method="get">
    Operation:
    <select name="operation">
        <option value="sum">Sum</option>
        <option value="subtract">Subtract</option>
    </select>
    <br>
    Number 1: <input type="text" name="num1"><br>
    Number 2: <input type="text" name="num2"><br>


<?php if (isset($output)) : ?>
<div>
    <div>
        Result:
        <input type="text" disabled readonly value="<?= $output; ?>"/>
    </div>
    <?php endif; ?>
</div>
    <input type="submit" name="calculate" value="Calculate">
</form>