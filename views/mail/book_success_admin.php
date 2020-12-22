<?php
$this->load->view('mail/header');
?>
<div class="col-12" style="margin-top: 20px;">
	<p>Hi Admin,</p>
	<p>New book order from : <?=$firstname?></p>
  <p>Book orders from ieltsmedical.co.uk</p>
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

	<p><a href="' . base_url() . 'panel/book/book_order/1">Login Link</a></p>
	<p>Thanks</p>
</div>
<?php
$this->load->view('mail/footer');
?>