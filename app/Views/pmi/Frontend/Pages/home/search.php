<!-- Search Contents -->

<div class="container fill_height">
	<div class="row fill_height">
		<div class="col fill_height">

			<!-- Search Tabs -->

			<div class="search_tabs_container">
				<div class="search_tabs d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
					<div class="search_tab active d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
						<img src="<?=base_url();?>/tijket/assets/img/speed-boat.png" alt="">
						<span>Speed Boat</span>
					</div>

					<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
						<img src="<?=base_url();?>/tijket/assets/img/motorbike.png" alt="">
						<span>Motorbike</span>
					</div>

					<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
						<img src="<?=base_url();?>/tijket/assets/img/car.png" alt="">
						<span>Car</span>
					</div>

					<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
						<img src="<?=base_url();?>/tijket/assets/img/hotel.png" alt="">
						<span>hotels</span>
					</div>
					<!-- <div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/departure.png" alt="">flights</div>
					<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/island.png" alt="">trips</div>
					<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/diving.png" alt="">activities</div> -->
				</div>
			</div>

			<!-- Search Panel -->
			<div class="search_panel active">
				<!-- <div class="col-lg-12 mt-4 mb-4 row">
					<?php //foreach ($pulau as $key => $value) { ?>
                    <button class="btn btn-sm btn-outline-primary m-2 btnPulau <?//=($value['id']==1)? 'active' : '';?>" id="btnPulau" data-id="<?//=$value['id'];?>" onclick="dataPelabuhan(event, $(this).data('id'))">
                        <?//=$value['name'];?>
                    </button>
	                <?//php } ?>
				</div> -->
				<form action="<?=base_url('boat/search/')?>" id="search_form_1">
					<div class="d-flex flex-lg-row mt-3 mb-3">
						<div class="search_itemz">
							<?php foreach ($pulau as $key => $value) { ?>
							<button type="button" class="btn btn-sm btn-outline-light mr-2 mb-1 btnPulau <?=($value['id']==1)? 'active' : '';?>" id="btnPulau" data-id="<?=$value['id'];?>" data-name="<?=$value['name'];?>" onclick="btn_pulau(event, $(this).data('id'), $(this).data('name'))"><?=$value['name'];?></button>
							<?php } ?>
						</div>
					</div>
					<div class="">
						<div class="col-lg-12 ">
							<div class="search_item2 row">
								<div class="form-group mr-4">
				                	<div class="input-group-prepend">
									    <div class="input-group-text mr-2">
				                    		<input name="trip" type='radio' id="one_way" class="icheckbox_square-grey" onchange='radio(this);' checked>
									    </div>
				                    	<label class="form-check-label mt-1" for="checkbox1">One Way</label>
									 </div>
					            </div>
					            <div class="form-group">
				                	<div class="input-group-prepend">
									    <div class="input-group-text mr-2">
				                    		<input name="trip" type='radio' id="roundtrip" class="icheckbox_square-grey" onchange='radio(this);'>
									    </div>
				                    	<label class="form-check-label mt-1" for="checkbox1">Roundtrip</label>
									 </div>
					            </div>
					        </div>
						</div>						
						<div class="col-lg-12">
							<div class="row">								
								<div class="col-lg-2 search_item">
								  	<div class="mb-1">From</div>
								  	<select class="form-control search_input opt_fromHarbor" name="from" id="pelabuhan" onchange="opt_fromHarbor($(this).val());" >
									    <option selected disabled>Pilih Pelabuhan</option>
									    <?php foreach ($pelabuhan as $key => $value) { ?>
									    <option value="<?=$value['id'];?>"><?=$value['name'];?></option>
									    <?php } ?>
								  	</select>
								</div>
								<div class="col-lg-2 search_item">
									<div class="mb-1">To</div>
									<select class="form-control search_input opt_toHarbor" name="to" id="destination" onchange="opt_toHarbor($(this).val());">
									    <option selected disabled>Pilih Tujuan</option>
								  	</select>
								</div>
								<div class="col-lg-2 search_item">
									<div class="mb-1">Departure</div>
									<input type="text" class="form-control check_in search_input date-pick" data-date-format="d M yyyy" name="check_in" id="check_in" onfocus="datePick(this)" required>
								</div>
								<div class="col-lg-2 search_item" id="col_check_out">
									<div class="mb-1 row" style="margin-left: 0px;">
										<input type="checkbox" name="checkbox_checkout" id="checkbox_checkout" class="mr-1" style="width: 15px; height:15px;" onchange="checkboxOut(this);">
										<div>Return</div>
									</div>
									<input type="text" class="form-control check_out search_input date-pick" disabled data-date-format="d M yyyy" name="check_out" value="disabled" id="check_out" onfocus="datePick(this)">
								</div>
								<div class="col-lg-1 search_item">
									<div class="mb-1">Adults</div>
									<input name="adult" type="text" value="1" id="adult" class="form-control search_input" required>
								</div>
								<div class="col-lg-1 search_item">
									<div class="mb-1">Children</div>
									<input name="child" type="text" value="0" id="child" class="form-control search_input mr-0 pr-0" required>
								</div>
								<div class="col-lg-2 search_item">
									<div></div>
									<button type="submit" class="button search_button" onclick="submit_search();">search<span></span><span></span><span></span></button>
								</div>
							</div>
						</div>
						<!-- <div class="col-lg-12">
							<div class="row">
								<div class="search_item">
									<div></div>
									<button class="button search_button">search<span></span><span></span><span></span></button>
								</div>
							</div>
						</div> -->				
					</div>
				</form>
			</div>				

			<!-- Search Panel -->
			<div class="search_panel">
				<!-- <div class="row">
					<div class="col text-center">
						<h2 class="section_title">the best offers with rooms</h2>
					</div>
				</div> -->
				<form action="#" id="search_form_2" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
					<div class="col text-center">
						<h2 class="section_title">we'll be back soon.</h2>
					</div>
					<!-- <div class="search_item">
						<div>destination</div>
						<input type="text" class="destination search_input" required="required">
					</div>
					<div class="search_item">
						<div>check in</div>
						<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
					</div>
					<div class="search_item">
						<div>check out</div>
						<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
					</div>
					<div class="search_item">
						<div>adults</div>
						<select name="adults" id="adults_2" class="dropdown_item_select search_input">
							<option>01</option>
							<option>02</option>
							<option>03</option>
						</select>
					</div>
					<div class="search_item">
						<div>children</div>
						<select name="children" id="children_2" class="dropdown_item_select search_input">
							<option>0</option>
							<option>02</option>
							<option>03</option>
						</select>
					</div>
					<button class="button search_button">search<span></span><span></span><span></span></button> -->
				</form>
			</div>

			<!-- Search Panel -->

			<div class="search_panel">
				<form action="#" id="search_form_3" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
					<div class="col text-center">
						<h2 class="section_title">we'll be back soon.</h2>
					</div>
					<!-- <div class="search_item">
						<div>destination</div>
						<input type="text" class="destination search_input" required="required">
					</div>
					<div class="search_item">
						<div>check in</div>
						<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
					</div>
					<div class="search_item">
						<div>check out</div>
						<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
					</div>
					<div class="search_item">
						<div>adults</div>
						<select name="adults" id="adults_3" class="dropdown_item_select search_input">
							<option>01</option>
							<option>02</option>
							<option>03</option>
						</select>
					</div>
					<div class="search_item">
						<div>children</div>
						<select name="children" id="children_3" class="dropdown_item_select search_input">
							<option>0</option>
							<option>02</option>
							<option>03</option>
						</select>
					</div>
					<button class="button search_button">search<span></span><span></span><span></span></button> -->
				</form>
			</div>

			<!-- Search Panel -->

			<div class="search_panel">
				<form action="#" id="search_form_4" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
					<div class="col text-center">
						<h2 class="section_title">we'll be back soon.</h2>
					</div>
					<!-- <div class="search_item">
						<div>destination</div>
						<input type="text" class="destination search_input" required="required">
					</div>
					<div class="search_item">
						<div>check in</div>
						<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
					</div>
					<div class="search_item">
						<div>check out</div>
						<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
					</div>
					<div class="search_item">
						<div>adults</div>
						<select name="adults" id="adults_4" class="dropdown_item_select search_input">
							<option>01</option>
							<option>02</option>
							<option>03</option>
						</select>
					</div>
					<div class="search_item">
						<div>children</div>
						<select name="children" id="children_4" class="dropdown_item_select search_input">
							<option>0</option>
							<option>02</option>
							<option>03</option>
						</select>
					</div>
					<button class="button search_button">search<span></span><span></span><span></span></button> -->
				</form>
			</div>

			<!-- Search Panel -->

			<div class="search_panel">
				<form action="#" id="search_form_5" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
					<div class="search_item">
						<div>destination</div>
						<input type="text" class="destination search_input" required="required">
					</div>
					<div class="search_item">
						<div>check in</div>
						<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
					</div>
					<div class="search_item">
						<div>check out</div>
						<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
					</div>
					<div class="search_item">
						<div>adults</div>
						<select name="adults" id="adults_5" class="dropdown_item_select search_input">
							<option>01</option>
							<option>02</option>
							<option>03</option>
						</select>
					</div>
					<div class="search_item">
						<div>children</div>
						<select name="children" id="children_5" class="dropdown_item_select search_input">
							<option>0</option>
							<option>02</option>
							<option>03</option>
						</select>
					</div>
					<button class="button search_button">search<span></span><span></span><span></span></button>
				</form>
			</div>

			<!-- Search Panel -->

			<div class="search_panel">
				<form action="#" id="search_form_6" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
					<div class="search_item">
						<div>destination</div>
						<input type="text" class="destination search_input" required="required">
					</div>
					<div class="search_item">
						<div>check in</div>
						<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
					</div>
					<div class="search_item">
						<div>check out</div>
						<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
					</div>
					<div class="search_item">
						<div>adults</div>
						<select name="adults" id="adults_6" class="dropdown_item_select search_input">
							<option>01</option>
							<option>02</option>
							<option>03</option>
						</select>
					</div>
					<div class="search_item">
						<div>children</div>
						<select name="children" id="children_6" class="dropdown_item_select search_input">
							<option>0</option>
							<option>02</option>
							<option>03</option>
						</select>
					</div>
					<button class="button search_button">search<span></span><span></span><span></span></button>
				</form>
			</div>
		</div>
	</div>
</div>