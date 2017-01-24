<?php
    $name = "Gosho";
    $number = "0935-213-432";
    $age = 24;
    $address = "Sofia-Center";
    ?>

<style>
    table, th, td {
        border: 1px solid black;
        text-align: left;
    }
</style>

    <table>
        <tr>
            <th>Name</th>
            <th><?php echo $name ?></th>
        </tr>
        <tr>
            <th>Phone Number</th>
            <th><?php echo $number ?></th>
        </tr>
        <tr>
            <th>Age</th>
            <th><?php echo $age ?></th>
        </tr>
        <tr>
            <th>Address</th>
            <th><?php echo $address ?></th>
        </tr>
    </table>