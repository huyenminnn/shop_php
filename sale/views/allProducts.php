<?php 
	require_once('views/header.php');
 ?>
<section class="bg0 p-t-23 p-b-140" style="margin-top: 150px;">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					All Product 
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".CAT01">
						Sneakers
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".CAT02">
						Boots
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".CAT03">
						Sandals
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".CAT04">
						Ballet flats
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".CAT05">
						Pumps
					</button>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				
			</div>

			<div class="row isotope-grid">
				
				<?php 
					foreach ($products as $key => $product) {
						
				?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?=$product['category']?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img style="width: 100%; height: 280px;" src="<?=$product['image'] ?>" alt="IMG-PRODUCT">

							<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?= $product['name'] ?>
								</a>

								<span class="stext-105 cl3">
									<?= number_format($product['price']) ?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="?mod=cart&act=addToCart2&code=<?=$product['code']?>" class="btn"><i class="fas fa-cart-arrow-down"></i></a>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
				 ?>
				
			</div>
	
		</div>
	</section>
 <?php 
	require_once('views/footer.php');
 ?>