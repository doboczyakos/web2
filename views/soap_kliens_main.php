<h1>kliens</h1>

<?php
    $headers = array("nev", "nem", "szuldat", "nemzet");
?>

<table>
    <tr>
    <?php foreach ($headers as $header): ?>
        <th><?php echo $header; ?></th>
    <?php endforeach; ?>
    </tr>

    <?php foreach ($viewData as $data_cell): 
            if (!is_array($data_cell) || count($data_cell) != 4) { continue; } ?>
        <tr>
        <?php foreach ($headers as $header): ?>
            <td><?php echo $data_cell[$header]; ?></td>
        <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>
