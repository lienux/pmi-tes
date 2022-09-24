/*!
 * APP: Tijket Travel
 * VERSION: 1.0
 * DATE: 2022-09-01
 * UPDATES AND DOCS AT: http://tijket.bocahganteng.com/
 *
 * @license Copyright (c) 2022, DorbitT. All rights reserved.
 * 
 * @developer: M. Ali Imron QQ | www.bocahganteng.com | lienux.qq@gmail.com
 * @author: Ummu Khairiyah Yusna | www.ummukhairiyahyusna.my.id | ummukhairiyahyusna@gmail.com
 **/

 // Shorthand for $( document ).ready()
$(function() {
    // console.log( "ready!" );
    getCookie();
    search();
});

function reset_filter()
{
	// var from_harbor = getUrlParameter('from');
	// var to_harbor = getUrlParameter('to');
	// const params = new URLSearchParams(window.location.search);

	// alert(from_harbor+', '+to_harbor);
	// alert(params);
	// alert(getCookie("from_island"));
	// alert(Cookies.get('from_island')+' , '+Cookies.get('from_harbor'));
	// search();
}

function search() {
	const params = new URLSearchParams(window.location.search);

    $.ajax({
        url: base_url + '/api/ali/schedule/search?' + params,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            $('#loader').show();
            $('#card_ticket').empty();
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            $('#loader').hide();
        },
        success: function(response){
            // console.log(response);            
            createListSchedule(response);
        }
    });
};

function setCookieSearch() {
	// document.cookie = 
}

function getCookie() {
	var from_island = Cookies.get('from_island');
	var from_harbor = Cookies.get('from_harbor');
	var to_island = Cookies.get('to_island');
	var to_harbor = Cookies.get('to_harbor');

	$('#route_from').html(from_harbor + ' <span class="badge badge-info">'+from_island+'</span>');
	$('#route_to').html(to_harbor + ' <span class="badge badge-info">'+to_island+'</span>');
}

function createListSchedule(data) {
	$('#card_ticket').empty();
    for(index in data){
    	var from_time = getHoursMinutes(data[index].time_from);
    	var to_time = getHoursMinutes(data[index].time_to);
        var a = 
        "<div class='card mb-3'</div>"+
        	"<div class='card-body'>"+
				"<div class='mb-2 font-weight-bold'>"+data[index].route.company_name+"</div>"+
				"<div class='row'>"+
					"<div class='col-lg-2'>"+
						"<img src='"+base_url+"/uploads/images/logo/"+data[index].route.company_image+"' class='img-thumbnail'>"+
					"</div>"+
					"<div class='col-lg-8 align-middle'>"+
						"<div class='row'>"+
				  			"<div class='departure'>"+
				  				"<span>"+data[index].route.from_harbor+"</span> <span class='text-dark'>("+data[index].route.from_island+")</span>"+
				  				"<h3 class='text-dark'>"+from_time+"</h3>"+
				  			"</div>"+
				  			"<div class='mx-4 pt-4'>"+
				  				"<h3><i class='fa fa-long-arrow-right' aria-hidden='true'></i></h3>"+			  				
				  			"</div>"+
				  			"<div class=''>"+
				  				"<span>"+data[index].route.to_harbor+"</span> <span class='text-dark'>("+data[index].route.to_island+")</span>"+
				  				"<h3 class='text-dark'>"+to_time+"</h3>"+
				  			"</div>"+			  				
						"</div>"+
					"</div>"+
					"<div class='col-lg-2 text-right'>"+
						"<h4 class='text-primary'>IDR "+data[index].ticket.price+"</h4>"+
						"<span class='text-danger'>diskon 10%</span>"+
						"<div class='mt-3'>"+
			  			"<a href='#' class='btn btn-warning'>"+
			  				"<i class='bi bi-bag-plus'></i> Select"+
			  			"</a>"+			  				
						"</div>"+
					"</div>"+			  			
				"</div>"+
			"</div>"+
		"</div>";
        $('#card_ticket').append(a); 
    }
}