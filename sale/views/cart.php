<?php 
	require_once('views/header.php');
 ?>
	<div class="container" style="margin-top: 100px;">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="?mod=home" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">ID</th>
									<th class="column-2">Name</th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
								
								<?php 
								$total = 0;
								 foreach ($cart as $key => $product) {
								 	$total += $product['price']*$product['quantity'];
								 ?>
								 <tr class="table_row">
									<td class="column-1"><?=$product['code']?></td>
									<td class="column-2"><?=$product['name']?></td>
									<td class="column-3"><?= number_format($product['price']) ?></td>
									<td class="column-4">
										<a href="?mod=cart&act=addToCart&code=<?php echo $product['code']; ?>" class="btn">+</a>
						                <?php echo $product['quantity']; ?>
						                <a href="?mod=cart&act=minus&code=<?php echo $product['code']; ?>"  class="btn">-</a>
									</td>
									<td class="column-5"><?= number_format($product['price']*$product['quantity']) ?></td>
								</tr>
								 <?php
								 }
								 ?>
								
							</table>
						</div>

						
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?= number_format($total) ?>
								</span>
							</div>
						</div>
						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Ship Fee:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?= number_format(30000) ?>
								</span>
							</div>
						</div>
						<form action="?mod=cart&act=bill" method="POST" role="form" enctype="multipart/form-data">
							<div class="flex-w flex-t bor12 p-t-15 p-b-30">
								<span class="stext-110 cl2">
									Shipping Information:
								</span>

								
									<p class="stext-111 cl6 p-t-2">
										Pls, enter your information for shipping. 
									</p>
									
									<div class="p-t-15">
										<span class="stext-112 cl8">
											Your name
										</span>

										<input type="text" name="name" class="form-control" required="">

										<span class="stext-112 cl8">
											Address
										</span>

										<input type="text" name="address" class="form-control" required="">

										<span class="stext-112 cl8">
											Email
										</span>

										<input type="email" name="email" class="form-control" required="">

										<span class="stext-112 cl8">
											Number Phone
										</span>

										<input type="number" name="numphone" class="form-control" required="">
											
									</div>
								
							</div>

							<div class="flex-w flex-t p-t-27 p-b-33">
								<div class="size-208">
									<span class="mtext-101 cl2">
										Total:
									</span>
								</div>

								<div class="size-209 p-t-1">
									<span class="mtext-110 cl2">
										<?= number_format($total + 30000) ?>
									</span>
								</div>
							</div>

							<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
								Proceed to Checkout
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
	require_once('views/footer.php');
 ?>