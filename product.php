<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sản phẩm | TV Shop</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/logo4.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<?php
		include 'shared/header.php';
		include 'shared/quick-view-cart.php'; ?>


	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140" style="margin-top: 84px;">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
						Women
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
						Men
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
						Bag
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
						Shoes
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
						Watches
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

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" onkeyup ="return searchByName(this.value);" type="text" name="search-product" placeholder="Search">
					</div>
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Default
									</a>
								</li>
								<li class="p-b-6">
									<a href="#" data-type="lowtohigh" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" data-type="hightolow" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" data-type="0_50" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" data-type="50_100" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" data-type="100_150" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" data-type="150" class="filter-link stext-106 trans-04">
										> $150.00
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="row isotope-grid">
				<?php
					include ("connect.php");
					$sqla = "select count(*) as number_row from products";
					$rs = mysqli_query($conn,$sqla);
					$numbAll = mysqli_fetch_array($rs);
					$sql = "select product_id, name, price, image, description, category_name from products p join categories c on p.category_id = c.category_id";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_array($result)){
				?>
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $row['category_name']; ?>">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-pic hov-img0">
									<img src="images/<?php echo $row['image']; ?>" alt="IMG-PRODUCT">

									<a href="#" data-id="<?php echo $row['product_id']; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
										Xem nhanh
									</a>
								</div>

								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="product-detail.php?id=<?php echo $row['product_id']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											<?php echo $row['name']; ?>
										</a>

										<span class="stext-105 cl3">
											$<?php echo $row['price']; ?>
										</span>
									</div>

									<div class="block2-txt-child2 flex-r p-t-3">
										<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
											<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
											<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
										</a>
									</div>
								</div>
							</div>
						</div>
				<?php } ?>
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Xem thêm
				</a>
			</div>
		</div>
	</div>


	<!-- Footer -->
		<!-- Footer -->
	<?php  include 'shared/footer.php' ?>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">

	</div>

<!--===============================================================================================-->
	<script src="admin/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/assets/vendor/bootstrap/js/popper.js"></script>
	<script src="admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/assets/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="admin/assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="admin/assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="admin/assets/vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="admin/assets/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="admin/assets/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="admin/assets/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/assets/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});
		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});
		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});
		/*---------------------------------------------*/
		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
<!--===============================================================================================-->
	<script src="admin/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});
			$(window).on('resize', function(){
				ps.update();
			})
		});
		function searchByName(name){
			$.ajax({
				url: 'search-product.php?search_name='+ name,
				type: 'POST',
				data: {search_name: name},
				success: function(result){
					$('.isotope-grid').html(result).show().fadeIn('slow');
            $('.js-show-modal1').on('click',function(e){
                e.preventDefault();
                var idPro = $(this).data('id');
                $.post("pre-view-product.php", {id_pro: idPro}, function(result){
                    $('.js-modal1').html(data);
                    $('.js-modal1').addClass('show-modal12');
                    $('.js-hide-modal1').on('click',function(){
                        $('.js-modal1').html("");
                        $('.js-modal1').removeClass('show-modal12');
                    });
                });
            });
				}
			});
		}
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>
