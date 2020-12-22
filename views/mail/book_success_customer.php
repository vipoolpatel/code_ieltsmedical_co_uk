<?php
$this->load->view('mail/header');
?>
<div class="col-12" style="margin-top: 20px;">
	<p>Hi <?php print_r($firstname);?>,</p>
	<p>We'd like to say:   </p>
	<p>- Thank you for your order at ieltsmedical.co.uk</p>
	<p>Order summary:</p>

   <table cellspacing="0" cellpadding="0" border="1" width="100%">
    <thead>
       <tr>
          <th>Item Name</th>
          <th>Price</th>
          <th>Qty</th>
          <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
	<?php
foreach ($getitem as $value) {?>
   <tr>
    <td><?=$value->name?></td>
    <td>&pound;<?=$value->price?></td>
    <td><?=$value->qty?></td>
    <td>&pound;<?=$value->subtotal?></td>
</tr>
<?php }
?>
</tbody>
</table>

	<p>If you have any queries, please reply to this email or call your Textbook team on 02036376621.</p>
	<p>Thanks</p>
</div>
<?php
$this->load->view('mail/footer');
?>