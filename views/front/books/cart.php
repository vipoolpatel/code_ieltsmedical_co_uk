<?php
$this->load->view('header/header');
?>
		<section class="faq-area section-gap" id="faq" style="margin-top: 50px;">
				<div class="container">

				<?php
$this->load->view('message');
?>


					<div class="row">

					 <?php
if ($cart = $this->cart->contents()) {
	?>
                     <div class="col-lg-8  col-md-12">
                     	<div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div><br>
 <form action="<?=base_url()?>home/update_cart" method="post">
	                   <table class="table">
	                   	<thead>
	                   		<tr>
                   			 	 <th>Item Name</th>
                                <th>Item Price</th>
                                <th>Qty</th>
                                <th>Sub Total</th>
                                <th>Action</th>
	                   		</tr>
	                   	</thead>
	                   	<tbody>
	                   	 <?php
$finaltotal = 0;
	foreach ($cart as $item) {
		echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
		echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
		echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);

		$this->db->where('id', $item['id']);
		$this->db->limit('1');
		$finaltotalwelcome = $this->db->get('book')->row();

		$finaltotal = $finaltotal + $item['subtotal'];
		?>
                            <tr>
                                <td><?php echo $finaltotalwelcome->name; ?></td>
                                <td>&pound;<?php echo number_format($item['price'], 2); ?></td>
                                <td><input type="number" name="cart[<?=$item['id']?>][qty]" value="<?php echo $item['qty']; ?>" maxlength="3" minlength="1" size="2" class="form-control" style="width: 75px;"></td>
                                <td>&pound;<?php echo number_format($item['subtotal'], 2); ?></td>
                                <td>
                                    <a href="<?=base_url()?>home/removecart/<?=$item['rowid']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                            <?php
}
	?>




	                   	</tbody>

	                   </table>

	                        <button type="submit" class="btn btn-primary float-right">Update Cart</button>
</form>
					</div>
					<div class="col-lg-4  col-md-12">
						<div class="cart-summary">
	                        <h5>Cart Total</h5>
                            <ul class="summary-table">
                                 <li><span>subtotal:</span> <span>&pound;<?=$this->cart->total();?></span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>&pound;<?=$this->cart->total();?></span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="<?=base_url()?>checkout" class="genric-btn info">Checkout</a>
                            </div>
                        </div>

					</div>
					<?php } else {?>
							 <div class="col-md-12">
							 	Your shopping cart is empty!.
							 </div>
				<?php	}
?>
					</div>
				</div>
			</section>



<?php
$this->load->view('header/common_book');
?>

<?php
$this->load->view('header/footer');
?>