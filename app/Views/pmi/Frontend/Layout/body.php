<body>

	<div class="super_container">
		
		<?=view($frontend['view']['layout'].'partials/header');?>

		<div class="menu trans_500">
			<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
				<div class="menu_close_container"><div class="menu_close"></div></div>
				<div class="logo menu_logo"><a href="#"><img src="<?=base_url();?>/tijket/assets/images/logo.png" alt=""></a></div>
				<ul>
					<li class="menu_item"><a href="#">home</a></li>
					<li class="menu_item"><a href="about.html">about us</a></li>
					<li class="menu_item"><a href="offers.html">offers</a></li>
					<li class="menu_item"><a href="blog.html">news</a></li>
					<li class="menu_item"><a href="contact.html">contact</a></li>
				</ul>
			</div>
		</div>

		<?=view($view['pages'].$page);?>

		<!-- Footer -->

		<footer class="footer">
			<?=view($frontend['view']['layout'].'partials/footer');?>
		</footer>

		<!-- Copyright -->

		<div class="copyright">
			<?=view($frontend['view']['layout'].'partials/copyright');?>
		</div>

	</div>

	<!-- <script src="<?//=base_url();?>/tijket/assets/js/jquery-3.2.1.min.js"></script> -->
	<script src="<?=base_url();?>/tijket/assets/styles/bootstrap4/popper.js"></script>
	<script src="<?=base_url();?>/tijket/assets/styles/bootstrap-4.0.0/js/bootstrap.min.js"></script>
	<script src="<?=base_url();?>/tijket/assets/plugins/parallax-js-master/parallax.min.js"></script>
	<script src="<?=base_url();?>/tijket/assets/plugins/easing/easing.js"></script>
	<script type="module" src="<?=base_url();?>/tijket/assets/plugins/js-cookie/js.cookie.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script> -->

	<?=isset($js) ? view($view['pages'].$js) : '';?>

</body>