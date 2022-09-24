<!-- Home -->

<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?=base_url();?>/uploads/images/slider/about_background.jpg"></div>
	<div class="home_content">
		<div class="home_title">Fast Boat</div>
	</div>
</div>

<!-- Intro -->

<div class="intro">
	<div class="container">
		<div class="cartShop">
			<div class="card mb-3">
				<div class="card-body">
					<div class="row text-dark">
						<div class="mx-3 route_from" id="route_from"></div>
						<h3><i class='fa fa-long-arrow-right' aria-hidden='true'></i></h3>
						<div class="mx-3 route_to" id="route_to"></div>
					</div>
					<div>
						Kam, 01 Sep 2022  |  1 penumpang  |  Reguler | One Way
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 p-0">
				<div class="row mb-2">
					<div class="col-6 text-filter">
						FILTER
					</div>
					<div class="col-6 text-right">
						<a href="#" class="btn-reset" onclick="reset_filter();">RESET</a>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<div class="col-filter list-horizontal__top">
							<div class="filter">
								<form>
									<div class="content-filter">
										<div class="field">
											<div class="checkbox">
												<div class="collapse-label">Transit<i class="tix tix-chevron-up"></i></div>
												<div class="list-checkbox" style="height: auto;">
													<div class="ReactCollapse--content">
														<div class="margin"></div>
														<div class="custom-checkbox single">
															<div class="check">
																<input id="direct" name="stops|direct" type="checkbox">
																<label for="direct">Direct</label>
															</div>
														</div>
														<div class="custom-checkbox single">
															<div class="check">
																<input id="stop" name="stops|stop" type="checkbox">
																<label for="stop">1 Transit</label>
															</div>
														</div>
														<div class="custom-checkbox single">
															<div class="check">
																<input id="stops" name="stops|stops" type="checkbox">
																<label for="stops">2+ Transit</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<hr>
										<div class="field">
											<div class="filter-slider">
												<div class="collapse-label">Transit Duration<i class="tix tix-chevron-up"></i> </div>
												<div class="list-slider" style="height: auto;">
													<div class="ReactCollapse--content">
														<div class="margin"></div>
														<div class="text-duration ">Duration per transit :  <span class="text-hour">0h - 2h</span></div>
														<div class="rc-slider tiket-slider">
															<div class="rc-slider-rail"></div>
															<div class="rc-slider-track rc-slider-track-1" style="left: 0%; right: auto; width: 100%;"></div>
															<div class="rc-slider-step">
																<span class="rc-slider-dot rc-slider-dot-active" style="left: 0%;"></span>
																<span class="rc-slider-dot rc-slider-dot-active" style="left: 50%;"></span>
																<span class="rc-slider-dot rc-slider-dot-active" style="left: 100%;"></span>
															</div>
															<div tabindex="0" class="rc-slider-handle rc-slider-handle-1" role="slider" aria-valuemin="0" aria-valuemax="2" aria-valuenow="0" aria-disabled="false" style="left: 0%; right: auto; transform: translateX(-50%);"></div>
															<div tabindex="0" class="rc-slider-handle rc-slider-handle-2" role="slider" aria-valuemin="0" aria-valuemax="2" aria-valuenow="2" aria-disabled="false" style="left: 100%; right: auto; transform: translateX(-50%);"></div><div class="rc-slider-mark"></div>
														</div>
														<div class="text-min-max false">
															<span class="text-min">0h</span>
															<span class="text-max">2h</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<hr>
										<div class="field">
											<div class="checkbox">
												<div class="collapse-label">Times<i class="tix tix-chevron-up"></i></div>
												<div class="list-checkbox" style="height: auto;">
													<div class="ReactCollapse--content">
														<div class="margin"></div>
														<div class="multi">
															<div class="title ">Departure</div>
															<div class="custom-checkbox single">
																<div class="check">
																	<input id="departure_dawn" name="times|departure|dawn" type="checkbox">
																	<label for="departure_dawn">00:00 - 06:00</label>
																</div>
															</div>
															<div class="custom-checkbox single">
																<div class="check">
																	<input id="departure_morning" name="times|departure|morning" type="checkbox">
																	<label for="departure_morning">06:00 - 12:00</label>
																</div>
															</div>
															<div class="custom-checkbox single">
																<div class="check">
																	<input id="departure_afternoon" name="times|departure|afternoon" type="checkbox">
																	<label for="departure_afternoon">12:00 - 18:00</label>
																</div>
															</div>
															<div class="custom-checkbox single">
																<div class="check">
																	<input id="departure_evening" name="times|departure|evening" type="checkbox">
																	<label for="departure_evening">18:00 - 24:00</label>
																</div>
															</div>
														</div>
														<div class="multi">
															<div class="title ">Arrival</div>
															<div class="custom-checkbox single">
																<div class="check disabled">
																	<input id="arrival_dawn" name="times|arrival|dawn" type="checkbox" disabled="">
																	<label for="arrival_dawn">00:00 - 06:00</label>
																</div>
															</div>
															<div class="custom-checkbox single">
																<div class="check">
																	<input id="arrival_morning" name="times|arrival|morning" type="checkbox">
																	<label for="arrival_morning">06:00 - 12:00</label>
																</div>
															</div>
															<div class="custom-checkbox single">
																<div class="check">
																	<input id="arrival_afternoon" name="times|arrival|afternoon" type="checkbox">
																	<label for="arrival_afternoon">12:00 - 18:00</label>
																</div>
															</div>
															<div class="custom-checkbox single">
																<div class="check">
																	<input id="arrival_evening" name="times|arrival|evening" type="checkbox"><label for="arrival_evening">18:00 - 24:00</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<hr>
										<div class="field">
											<div class="filter-checkbox-multi-label">
												<div class="collapse-label">Airlines<i class="tix tix-chevron-up"></i></div>
												<div class="list-checkbox" style="height: auto;">
													<div class="ReactCollapse--content">
														<div class="margin"></div>
														<div class="custom-checkbox multi with-icon">
															<div class="new-label">
																<div class="label-1">AirAsia Indonesia</div>
																<div class="label-2">from  IDR 1,362,900</div>
															</div>
															<div class="check">
																<input id="QZmultilabelmultilabel" name="airlines|QZ" type="checkbox">
																<label for="QZmultilabelmultilabel"></label>
															</div>
															<div class="logo-airline-wrapped">
																<img class="logo-airline-filter" src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit00gsmenlarge1/string/2021/09/16/543e12e5-7e8f-415f-9dc8-5401107ca6cf-1631780430394-7ff48f0c6bac2f185bd4abf7993c7337.png" alt="">
															</div>
														</div>
														<div class="custom-checkbox multi with-icon">
															<div class="new-label">
																<div class="label-1">Batik Air</div>
																<div class="label-2">from  IDR 1,516,330</div>
															</div>
															<div class="check">
																<input id="IDmultilabelmultilabel" name="airlines|ID" type="checkbox">
																<label for="IDmultilabelmultilabel"></label>
															</div>
															<div class="logo-airline-wrapped">
																<img class="logo-airline-filter" src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit00gsmenlarge1/string/2020/12/17/4d7fa58c-a41f-4424-a599-7a2ccd27f270-1608152644158-75f5ada3c1800a50a7ba02a56ae2603b.png" alt="">
															</div>
														</div>
														<div class="custom-checkbox multi with-icon">
															<div class="new-label">
																<div class="label-1">Citilink</div>
																<div class="label-2">from  IDR 1,712,109</div>
															</div>
															<div class="check">
																<input id="QGmultilabelmultilabel" name="airlines|QG" type="checkbox">
																<label for="QGmultilabelmultilabel"></label>
															</div>
															<div class="logo-airline-wrapped">
																<img class="logo-airline-filter" src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit00gsmenlarge1/string/2020/12/17/3deec547-980a-4d75-ac89-6e34eb9ddcf7-1608153225434-f5996f5af379dc69b93f00f8b725e579.png" alt="">
															</div>
														</div>
														<div class="custom-checkbox multi with-icon">
															<div class="new-label">
																<div class="label-1">Garuda Indonesia</div>
																<div class="label-2">from  IDR 2,322,320</div>
															</div>
															<div class="check">
																<input id="GAmultilabelmultilabel" name="airlines|GA" type="checkbox">
																<label for="GAmultilabelmultilabel"></label>
															</div>
															<div class="logo-airline-wrapped">
																<img class="logo-airline-filter" src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit00gsmenlarge1/string/2020/12/17/884009ae-b512-478a-9c3d-f4dbf22386eb-1608152537048-0c289e6d3a1bcb518efdd93be5ae139c.png" alt="">
															</div>
														</div>
														<div class="custom-checkbox multi with-icon">
															<div class="new-label">
																<div class="label-1">Lion Air</div>
																<div class="label-2">from  IDR 1,288,830</div>
															</div>
															<div class="check">
																<input id="JTmultilabelmultilabel" name="airlines|JT" type="checkbox">
																<label for="JTmultilabelmultilabel"></label>
															</div>
															<div class="logo-airline-wrapped">
																<img class="logo-airline-filter" src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit00gsmenlarge1/string/2020/12/17/1dedfd4e-2f74-4fa9-a3f5-d238c74d3d72-1608152770164-b210808aea30c7543cab4380aca4c3ad.png" alt="">
															</div>
														</div>
														<div class="show-more"><label>Show more +1</label></div>
													</div>
												</div>
											</div>
										</div>
										<hr>
										<div class="field">
											<div class="filter-checkbox-multi-label">
												<div class="collapse-label">Fare Type<i class="tix tix-chevron-up"></i></div>
												<div class="list-checkbox" style="height: auto;">
													<div class="ReactCollapse--content">
														<div class="margin"></div>
														<div class="custom-checkbox multi with-icon">
															<div class="new-label">
																<div class="label-1">Free Reschedule</div>
																<div class="label-2">3 flights</div>
															</div>
															<div class="check">
																<input id="tiketfleximultilabelmultilabel" name="fare|tiketflexi" type="checkbox">
																<label for="tiketfleximultilabelmultilabel"></label>
															</div>
															<div class="logo-airline-wrapped">
																<img class="logo-airline-filter" src="https://en.tiket.com/pesawat/assets/tiket-flexi.png" alt="">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<hr>
										<div class="field">
											<div class="filter-checkbox-multi-label">
												<div class="collapse-label">Facilities<i class="tix tix-chevron-up"></i></div>
												<div class="list-checkbox" style="height: auto;">
													<div class="ReactCollapse--content">
														<div class="margin"></div>
														<div class="custom-checkbox multi ">
															<div class="new-label">
																<div class="label-1">Baggage</div>
																<div class="label-2">43 flights</div>
															</div>
															<div class="check">
																<input id="baggagemultilabelmultilabel" name="facilities|baggage" type="checkbox">
																<label for="baggagemultilabelmultilabel"></label>
															</div>
														</div>
														<div class="custom-checkbox multi ">
															<div class="new-label">
																<div class="label-1">Entertainment</div>
																<div class="label-2">12 flights</div>
															</div>
															<div class="check">
																<input id="entertainmentmultilabelmultilabel" name="facilities|entertainment" type="checkbox">
																<label for="entertainmentmultilabelmultilabel"></label>
															</div>
														</div>
														<div class="custom-checkbox multi ">
															<div class="new-label">
																<div class="label-1">Meal</div>
																<div class="label-2">12 flights</div>
															</div>
															<div class="check">
																<input id="mealmultilabelmultilabel" name="facilities|meal" type="checkbox">
																<label for="mealmultilabelmultilabel"></label>
															</div>
														</div>
														<div class="custom-checkbox multi">
															<div class="new-label">
																<div class="label-1">USB port / Power</div>
																<div class="label-2">9 flights</div>
															</div>
															<div class="check">
																<input id="usbmultilabelmultilabel" name="facilities|usb" type="checkbox">
																<label for="usbmultilabelmultilabel"></label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<hr>
										<div class="field">
											<div class="checkbox">
												<div class="collapse-label">Transit Airports<i class="tix tix-chevron-up"></i></div>
												<div class="list-checkbox" style="height: auto;">
													<div class="ReactCollapse--content">
														<div class="margin"></div>
														<div class="custom-checkbox single">
															<div class="check">
																<input id="BTHC" name="airports|BTHC" type="checkbox">
																<label for="BTHC">Batam</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<hr>
										<div class="field">
											<div class="checkbox">
												<div class="collapse-label">Others<i class="tix tix-chevron-up"></i></div>
												<div class="list-checkbox" style="height: auto;">
													<div class="ReactCollapse--content">
														<div class="margin"></div>
														<div class="custom-checkbox single">
															<div class="check">
																<input id="FLEXI" name="quickFilter|FLEXI" type="checkbox">
																<label for="FLEXI">Free Reschedule</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<div class="col-lg-9">
				<div class="text-center text-success collapse" id="loader">
					<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>		
				</div>
				<div class="" id="card_ticket"></div>
			</div>
		</div>
	</div>
</div>

<!-- Stats -->

<div class="stats">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title">years statistics</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-10 offset-lg-1 text-center">
				<p class="stats_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis vulputate eros, iaculis consequat nisl. Nunc et suscipit urna. Integer elementum orci eu vehicula pretium. Donec bibendum tristique condimentum. Aenean in lacus ligula. </p>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="stats_years">
					<div class="stats_years_last">2016</div>
					<div class="stats_years_new float-right">2017</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="stats_contents">
					
					<!-- Stats Item -->
					<div class="stats_item d-flex flex-md-row flex-column clearfix">
						<div class="stats_last order-md-1 order-3">
							<div class="stats_last_icon d-flex flex-column align-items-center justify-content-end">
								<img src="images/stats_1.png" alt="">
							</div>
							<div class="stats_last_content">
								<div class="stats_number">1642</div>
								<div class="stats_type">Clients</div>
							</div>
						</div>
						<div class="stats_bar order-md-2 order-2" data-x="1642" data-y="3527" data-color="#31124b">
							<div class="stats_bar_perc">
								<div>
									<div class="stats_bar_value"></div>
								</div>
							</div>
						</div>
						<div class="stats_new order-md-3 order-1 text-right">
							<div class="stats_new_icon d-flex flex-column align-items-center justify-content-end">
								<img src="images/stats_1.png" alt="">
							</div>
							<div class="stats_new_content">
								<div class="stats_number">3527</div>
								<div class="stats_type">Clients</div>
							</div>
						</div>
					</div>
					
					<!-- Stats Item -->
					<div class="stats_item d-flex flex-md-row flex-column clearfix">
						<div class="stats_last order-md-1 order-3">
							<div class="stats_last_icon d-flex flex-column align-items-center justify-content-end">
								<img src="images/stats_2.png" alt="">
							</div>
							<div class="stats_last_content">
								<div class="stats_number">768</div>
								<div class="stats_type">Returning Clients</div>
							</div>
						</div>
						<div class="stats_bar order-md-2 order-2" data-x="768" data-y="145" data-color="#a95ce4">
							<div class="stats_bar_perc">
								<div>
									<div class="stats_bar_value"></div>
								</div>
							</div>
						</div>
						<div class="stats_new order-md-3 order-1 text-right">
							<div class="stats_new_icon d-flex flex-column align-items-center justify-content-end">
								<img src="images/stats_2.png" alt="">
							</div>
							<div class="stats_new_content">
								<div class="stats_number">145</div>
								<div class="stats_type">Returning Clients</div>
							</div>
						</div>
					</div>

					<!-- Stats Item -->
					<div class="stats_item d-flex flex-md-row flex-column clearfix">
						<div class="stats_last order-md-1 order-3">
							<div class="stats_last_icon d-flex flex-column align-items-center justify-content-end">
								<img src="images/stats_3.png" alt="">
							</div>
							<div class="stats_last_content">
								<div class="stats_number">11546</div>
								<div class="stats_type">Reach</div>
							</div>
						</div>
						<div class="stats_bar order-md-2 order-2" data-x="11546" data-y="9321" data-color="#fa6f1b">
							<div class="stats_bar_perc">
								<div>
									<div class="stats_bar_value"></div>
								</div>
							</div>
						</div>
						<div class="stats_new order-md-3 order-1 text-right">
							<div class="stats_new_icon d-flex flex-column align-items-center justify-content-end">
								<img src="images/stats_3.png" alt="">
							</div>
							<div class="stats_new_content">
								<div class="stats_number">9321</div>
								<div class="stats_type">Reach</div>
							</div>
						</div>
					</div>

					<!-- Stats Item -->
					<div class="stats_item d-flex flex-md-row flex-column clearfix">
						<div class="stats_last order-md-1 order-3">
							<div class="stats_last_icon d-flex flex-column align-items-center justify-content-end">
								<img src="images/stats_4.png" alt="">
							</div>
							<div class="stats_last_content">
								<div class="stats_number">3729</div>
								<div class="stats_type">Items</div>
							</div>
						</div>
						<div class="stats_bar order-md-2 order-2" data-x="3729" data-y="17429" data-color="#fa9e1b">
							<div class="stats_bar_perc">
								<div>
									<div class="stats_bar_value"></div>
								</div>
							</div>
						</div>
						<div class="stats_new order-md-3 order-1 text-right">
							<div class="stats_new_icon d-flex flex-column align-items-center justify-content-end">
								<img src="images/stats_4.png" alt="">
							</div>
							<div class="stats_new_content">
								<div class="stats_number">17429</div>
								<div class="stats_type">More Items</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Add -->

<div class="add">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="add_container">
					<div class="add_background" style="background-image:url(<?=base_url();?>/uploads/images/add.jpg)"></div>
					<div class="add_content">
						<h1 class="add_title">thailand</h1>
						<div class="add_subtitle">From <span>$999</span></div>
						<div class="button add_button"><div class="button_bcg"></div><a href="#">explore now<span></span><span></span><span></span></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Milestones -->

<div class="milestones">
	<div class="container">
		<div class="row">
			
			<!-- Milestone -->
			<div class="col-lg-3 milestone_col">
				<div class="milestone text-center">
					<div class="milestone_icon"><img src="images/milestone_1.png" alt=""></div>
					<div class="milestone_counter" data-end-value="255">0</div>
					<div class="milestone_text">Clients</div>
				</div>
			</div>

			<!-- Milestone -->
			<div class="col-lg-3 milestone_col">
				<div class="milestone text-center">
					<div class="milestone_icon"><img src="images/milestone_2.png" alt=""></div>
					<div class="milestone_counter" data-end-value="1176">0</div>
					<div class="milestone_text">Projects</div>
				</div>
			</div>

			<!-- Milestone -->
			<div class="col-lg-3 milestone_col">
				<div class="milestone text-center">
					<div class="milestone_icon"><img src="images/milestone_3.png" alt=""></div>
					<div class="milestone_counter" data-end-value="39">0</div>
					<div class="milestone_text">Countries</div>
				</div>
			</div>

			<!-- Milestone -->
			<div class="col-lg-3 milestone_col">
				<div class="milestone text-center">
					<div class="milestone_icon"><img src="images/milestone_4.png" alt=""></div>
					<div class="milestone_counter" data-end-value="127">0</div>
					<div class="milestone_text">Coffees</div>
				</div>
			</div>

		</div>
	</div>
</div>