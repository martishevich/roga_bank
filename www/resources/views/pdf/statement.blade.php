<table class="table ">
    <tr>
        <th scope="col">Sender account</th>
        <th scope="col">Beneficiary account</th>
        <th scope="col">Sum</th>
        <th scope="col">Currency</th>
        <th scope="col">Comment</th>
        <th scope="col">Date create</th>
    </tr>
    <?php foreach ($statementTransaction as $key => $row) {?>
    <tr>
        <td><?php echo $statementTransaction[$key]->sender_account?></td>
        <td><?php echo $statementTransaction[$key]->beneficiary_account?></td>
        <td><?php echo $statementTransaction[$key]->sum?></td>
        <td><?php echo $statementTransaction[$key]->currency?></td>
        <td><?php echo $statementTransaction[$key]->comment?></td>
        <td><?php echo $statementTransaction[$key]->created_at?></td>
    </tr>
    <?php }?>
</table>