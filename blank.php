<?php
require_once('functions/init.php');

$query = " SELECT * FROM game_results WHERE user='Username' ORDER BY id DESC ";
$result = Query($query);
$count1 = row_count($result);

?>
<table>
    <tbody>
<?php
for($i=1;$i<=$count1;$i++){
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td>Username</td>
    </tr>
    <?php
}
?>
    </tbody>
</table>
