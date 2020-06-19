<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
/* Default comment here */ 
jQuery(document).ready(function( $ ){
   
   function createAvaliableTime(todaydates){
        var timeresult = "";
        var alldistime = "";
        for(var i=0;i<partialdisdate.length;i++){
         	if(partialdisdate[i] == currentdate){
              alldistime = partialdistime[i];
            }
        }
        var distimearray = alldistime.split(",");
        if(!distimearray.includes("11:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "11:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='11:00'>11:00</option>");
          }
        }
        if(!distimearray.includes("11:30")){
          timeresult = todaydates.filter(todaydates => todaydates == "11:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='11:30'>11:30</option>");
          }
        }
     	if(!distimearray.includes("12:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "12:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='12:00'>12:00</option>");
          }
        }
        if(!distimearray.includes("12:30")){
          timeresult = todaydates.filter(todaydates => todaydates == "12:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='12:30'>12:30</option>");
          }
        }
        if(!distimearray.includes("13:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "13:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='13:00'>13:00</option>");
          }
        }
     	if(!distimearray.includes("13:30")){
          timeresult = todaydates.filter(todaydates => todaydates == "13:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='13:30'>13:30</option>");
          }
        }
        if(!distimearray.includes("14:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "14:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='14:00'>14:00</option>");
          }
        }
     	if(!distimearray.includes("14:30")){
          timeresult = todaydates.filter(todaydates => todaydates == "14:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='14:30'>14:30</option>");
          }
        }
     	if(!distimearray.includes("15:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "15:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='15:00'>15:00</option>");
          }
        }
     	if(!distimearray.includes("15:30")){
          timeresult = todaydates.filter(todaydates => todaydates == "15:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='15:30'>15:30</option>");
          }
        }
     	if(!distimearray.includes("16:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "16:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='16:00'>16:00</option>");
          }
        }
     	/*if(!distimearray.includes("16:30")){
          timeresult = todaydates.filter(todaydates => todaydates == "16:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='16:30'>16:30</option>");
          }
        }
     	if(!distimearray.includes("17:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "17:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='17:00'>17:00</option>");
          }
        }
     	if(!distimearray.includes("17:30")){
          timeresult = todaydates.filter(todaydates => todaydates == "17:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='17:30'>17:30</option>");
          }
        }
     	if(!distimearray.includes("18:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "18:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='18:00'>18:00</option>");
          }
        }
     	if(!distimearray.includes("18:30")){
          timeresult = todaydates.filter(todaydates => todaydates == "18:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='18:30'>18:30</option>");
          }
        }
        if(!distimearray.includes("19:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "19:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='19:00'>19:00</option>");
          }
        }*/
   }
  
   if(window.location.pathname == "/bookings/"){
     var currentdate = "";
     var partialdisdate = [];
     var partialdistime = [];
     
     data = JSON.stringify({  });
     $.post( "https://rajafashionapp.me/sites/api/getappointmentdisable.php", data)
         .done(function( data ) {
          var response = $.parseJSON(data);
          var disarray = [];
          var reasonarray = [];
          var distime = [];
          for(var i=0;i<response.date.length;i++){
             var disdate = response.date[i].split(" ");
             if(response.distime[i] == null){
             	disarray.push(disdate[0]); 
               	distime.push(response.distime[i]);
             	reasonarray.push(response.reason[i]);
             }else{
                partialdisdate.push(disdate[0]); 
               	partialdistime.push(response.distime[i]);
             }
          }
          $('.booking-calendar').pignoseCalendar({
              select: function(date, context) {
                 console.log(date[0]._i);
                 var selectdate = date[0]._i;
                 currentdate = selectdate;
                 var distimes = "";
                 for(var x=0;x < disarray.length; x++){
                  	if(disarray[x] == currentdate){
                      distimes = distime[x];
                    }
                 }
                 data = JSON.stringify({ "todayfrom":selectdate , "todaytill": selectdate});
                 $.post( "https://rajafashionapp.me/sites/api/searchappointmentbooking.php", data)
                     .done(function( data ) {
                      var response = $.parseJSON(data);
                      var todaydates = [];
                   	  try{
                        for(var i=0;i<response.date.length;i++){
                          var disdate = response.date[i].split(" ");
                          if(disdate[0] == selectdate){
                             todaydates.push(response.date[i].split(" ")[1]);
                          }
                        }
                      }catch(e){
                        todaydates = [];
                      }
                      $("#avatime").html("");
                      createAvaliableTime(todaydates);
                 });
              },
              page(info, context){
                 var dtmonth = info.month;
                 $("#disdates").html("");
                 for(var i=0;i<disarray.length;i++){
                   if(disarray[i].split("-")[1] == dtmonth){
                     const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
             		 const d = new Date();
                     //$("#disdates").append("<li class='disdate-item'>"+disarray[i].split("-")[2]+": "+reasonarray[i]+"</li>");
                     $("#disdates").append("<li class='disdate-item'>"+monthNames[dtmonth-1] + " " +disarray[i].split("-")[2]+": "+reasonarray[i]+"</li>");
                   }
                 }
              },
              init: function(){
                 var dt = new Date();
                 var dtmonth = dt.getMonth()+1;
                 for(var i=0;i<disarray.length;i++){
                   if(disarray[i].split("-")[1] == dtmonth){
                     const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
             		 const d = new Date();
                     $("#disdates").append("<li class='disdate-item'>"+monthNames[d.getMonth()] + " " +disarray[i].split("-")[2]+": "+reasonarray[i]+"</li>");
                   }
                 }
                 var today = new Date();
                 var dd = String(today.getDate()).padStart(2, '0');
                 var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                 var yyyy = today.getFullYear();

                 var selecttoday = yyyy + '-' + mm + '-' + dd;
                 currentdate = "";
                 data = JSON.stringify({ "todayfrom":selecttoday , "todaytill": selecttoday});
                 $.post( "https://rajafashionapp.me/sites/api/searchappointmentbooking.php", data)
                     .done(function( data ) {
                      var response = $.parseJSON(data);
                      var todaydates = [];
                      try{
                        for(var i=0;i<response.date.length;i++){
                          var disdate = response.date[i].split(" ");
                          if(disdate[0] == selectdate){
                             todaydates.push(response.date[i].split(" ")[1]);
                          }
                        }
                      }catch(e){
                        todaydates = [];
                      }
                      $("#avatime").html("");
                      createAvaliableTime(todaydates);
                 });
              },
              disabledDates: disarray,
              disabledWeekdays: [0,1,3,5] // SUN (0), SAT (6)
          });
    });
     
     $( "#submitappt" ).click(function() {
       if(currentdate == ""){
         alert("Please select a date to confirm appointment"); 
       }else{
         $(".booking-wrapper").css("display","none");
         $(".booking-confirm-wrapper").css("display","block");
         var formatdate = currentdate.split("-");
         var aptformatdate = formatdate[1]+"/"+formatdate[2]+"/"+formatdate[0];
         var apttime = aptformatdate + " - " + $("#avatime").val()+":00";
         var aptpeople = $("#apppeople").val();
         var aptname = $("#apptname").val();
         var aptemail = $("#apptemail").val().trim();
         var aptmsg = $("#apptmsg").val();
         var data = JSON.stringify({ "customer":aptname , "email": aptemail, "phone": "-", "appointmentdate":apttime, "country":"-", "method":"website", "comment":aptmsg, "people":aptpeople});
         console.log(data);
         $.post( "https://rajafashionapp.me/sites/api/newappointmentapp.php", data)
            .done(function( data ) {
           		var response = $.parseJSON(data);
                if(response.result == "done"){
                 	alert("Your appointment has been booked"); 
                    location.reload();
                }else{
                 	alert("Appointment was not booked. Please try again in a few mintues"); 
                  	$(".booking-confirm-wrapper").css("display","none");	
                  	$(".booking-wrapper").css("display","block");
                }
         }).fail(function() {
            alert("Appointment was not able to be booked. Please try again!"); 
            $(".booking-confirm-wrapper").css("display","none");	
            $(".booking-wrapper").css("display","block");
         })
       }
     });
  }
  
  if(window.location.pathname == "/appointments/"){
   	 $(document).ready(function(){
       var selectdate = '';
       var selectedtime = '';
       var timehour = '';
       var googlecalendertime = '';
       moment().format('LL');
       $.post( "https://rajafashionapp.me/sites/api/getcurrentdate.php").done(function( data ) {
         var response = $.parseJSON(data);
         console.log('serverdate',response.serverdate[0])
          for(var i=0 ; i< 20; i++){
             var dd = moment(response.serverdate[0]).add(i, 'days');
             if(moment(dd).format('ddd') != 'Sun'){
                $('.owl-carousel-new').append('<div class="slick-date"><div style="text-transform:uppercase;width:90%;text-align:center;font-size:17px;padding: 3rem 1rem;	background: #F4F4F4;	border: 1px solid #979797;	border-radius: 2px;	color: #555;	outline: none;	text-decoration: none;	position: relative;	-webkit-transition: .1s ease;	transition: .1s ease;">'+moment(dd).format("ddd, MMM Do")+'</div><div style="display:none" class="date-input">'+moment(dd).format("YYYY-MM-DD")+'</div></div');       
             }
           }
       $('.owl-carousel-new').slick({
        dots: false,
        arrows: true,
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 5,
              slidesToScroll: 5,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });
       $(".slick-prev").text("<")
       $(".slick-next").text(">")
       $( ".slick-date" ).click(function() {
         $(".slick-date").each(function(){
              $(this).removeClass('active')
         })
         $(".ava-item").each(function(){
           	$(this).removeClass('choice-disabled')
         })
         $(this).addClass('active');
         selectdate = $(this).children('.date-input').text();
         console.log(String(moment().format("YYYY-MM-DD")))
         if(selectdate == String(moment(response.serverdate[0]).format("YYYY-MM-DD"))){
           $(".ava-item").each(function(){
              var avatime =  moment($(this).text(), ["h:mm A"]).format("HH:mm:ss");
              var currenttime =  moment(response.serverdate[0]).add(2, 'hours').format('HH:mm:ss');
              console.log(avatime + ","+ currenttime)
              if(currenttime > avatime ){
                  $(this).addClass('choice-disabled');
              }
           })
       	 }
         data = JSON.stringify({ "todayfrom":selectdate , "todaytill": selectdate});
         $.post( "https://rajafashionapp.me/sites/api/searchreservationbooking.php", data)
            .done(function( data ) {
            	console.log(data)
           		try{
           		  var response = $.parseJSON(data);
                  for(var i=0;i<response.date.length;i++){
                      var ctime = response.date[i].split(' ')[1].split(":");
                      ctime = ctime[0]+":"+ctime[1];
                      $(".ava-item").each(function(){
                         console.log($(this).text().trim() + ',' + ctime + " "+ response.ampm[i].trim()) 
                         if($(this).text().trim() == ctime+ " "+ response.ampm[i].trim()){
                           $(this).addClass('choice-disabled');
                         }
                      })
                  }
                }catch(e){
                  console.log('no prior appointments')
                }
           		$("#avatime").css("height","auto")
            });
       });
       $( ".ava-item" ).click(function() {
         $(".ava-item").each(function(){
              $(this).removeClass('active')
         })
         $(this).addClass('active');
         googlecalendertime = moment($(this).text(), ["h:mm A"]).format("HH:mm");
         selectedtime = $(this).text().split(" ")[0];
         
         timehour = $(this).text().split(" ")[1];
         var displaysetdate = selectdate.split('-')
         $(".confirmed-time").text('Confirm Reservation Request for '+ displaysetdate[1]+'/'+displaysetdate[2]+'/'+displaysetdate[0] +' at '+ $(this).text()+ ' Bangkok Local Time')
         $('.bookingform').css('display','block');
         var $container = $("html,body");
         var $scrollTo = $('.bookingform');
         $container.animate({scrollTop: $scrollTo.offset().top - 800 - $container.offset().top + $container.scrollTop(), scrollLeft: 0},300); 
       })
       $( "#appmethod" ).change(function() {
         if($( "#appmethod" ).val() == 'WhatsApp Video Call'){
           $(".appwhatsapp").css("display","block")
         }else{
           $(".appwhatsapp").css("display","none")
         }
       });
       $( "#submitappt" ).click(function() {
       	 var formatdate = selectdate.split("-");
         var aptformatdate = formatdate[1]+"/"+formatdate[2]+"/"+formatdate[0];
         var apttime = aptformatdate+" - "+selectedtime.trim()+":00";
         var aptpeople = '1'
         var aptname = $("#apptname").val().trim();
         var aptemail = $("#apptemail").val().trim();
         var aptmsg = $("#apptmsg").val();
         var aptmethod = $("#appmethod").val();
         var aptphone = $("#appwhatsapp").val();
         var apttype = $("#appvisited").val();
         var apttimehour = timehour
         var gdatetime = aptformatdate+" - "+googlecalendertime+":00";
         var data = JSON.stringify({ "customer":aptname , "email": aptemail, "phone": "-", "appointmentdate":apttime, "country":"-", "method":"website", "comment":aptmsg, "people":aptpeople, "aptmethod":aptmethod, "whatsappphone":aptphone, "type":apttype, "apttimehour":apttimehour,"googletime":gdatetime});
         console.log(data);
         if(aptemail != '' && aptname != ''){
           if($( "#appmethod" ).val() == 'WhatsApp Video Call' && aptphone.trim() == ''){
              alert('Please provide us with your WhatsApp phone number to complete the reservation')
           }else{
              $("#submitappt").text('Making your reservation..') 
              $.post( "https://rajafashionapp.me/sites/api/newvirtualbookingweb.php", data)
                  .done(function( data ) {
                      var response = $.parseJSON(data);
                      if(response.result == "done"){
                          $("#submitappt").text('Making your reservation..')
                          alert("Your appointment has been reserved"); 
                          location.reload();
                      }else{
                          alert("Appointment was not booked. Please try again in a few mintues"); 
                          $(".booking-confirm-wrapper").css("display","none");	
                          $(".booking-wrapper").css("display","block");
                          $("#submitappt").text('SUBMIT')
                      }
               }).fail(function() {
                  alert("Appointment was not able to be booked. Please try again!"); 
                  $(".booking-confirm-wrapper").css("display","none");	
                  $(".booking-wrapper").css("display","block");
               })
            }
         }else{
           alert('Please enter your name and email address to make a booking');
         }
       })
    });
              });
  }
  
  if(window.location.pathname == "/live-bookings/"){
     var currentdate = "";
     var partialdisdate = [];
     var partialdistime = [];
     
     data = JSON.stringify({  });
     $.post( "https://rajafashionapp.me/sites/api/getappointmentdisable.php", data)
         .done(function( data ) {
          var response = $.parseJSON(data);
          var disarray = [];
          var reasonarray = [];
          var distime = [];
          for(var i=0;i<response.date.length;i++){
             var disdate = response.date[i].split(" ");
             if(response.distime[i] == null){
             	disarray.push(disdate[0]); 
               	distime.push(response.distime[i]);
             	reasonarray.push(response.reason[i]);
             }else{
                partialdisdate.push(disdate[0]); 
               	partialdistime.push(response.distime[i]);
             }
          }
          $('.booking-calendar').pignoseCalendar({
              select: function(date, context) {
                 console.log(date[0]._i);
                 var selectdate = date[0]._i;
                 currentdate = selectdate;
                 var distimes = "";
                 for(var x=0;x < disarray.length; x++){
                  	if(disarray[x] == currentdate){
                      distimes = distime[x];
                    }
                 }
                 data = JSON.stringify({ "todayfrom":selectdate , "todaytill": selectdate});
                 $.post( "https://rajafashionapp.me/sites/api/searchappointmentbooking.php", data)
                     .done(function( data ) {
                      var response = $.parseJSON(data);
                      var todaydates = [];
                   	  try{
                        for(var i=0;i<response.date.length;i++){
                          var disdate = response.date[i].split(" ");
                          if(disdate[0] == selectdate){
                             todaydates.push(response.date[i].split(" ")[1]);
                          }
                        }
                      }catch(e){
                        todaydates = [];
                      }
                      $("#avatime").html("");
                      createAvaliableTime(todaydates);
                 });
              },
              page(info, context){
                 var dtmonth = info.month;
                 $("#disdates").html("");
                 for(var i=0;i<disarray.length;i++){
                   if(disarray[i].split("-")[1] == dtmonth){
                     const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
             		 const d = new Date();
                     //$("#disdates").append("<li class='disdate-item'>"+disarray[i].split("-")[2]+": "+reasonarray[i]+"</li>");
                     $("#disdates").append("<li class='disdate-item'>"+monthNames[dtmonth-1] + " " +disarray[i].split("-")[2]+": "+reasonarray[i]+"</li>");
                   }
                 }
              },
              init: function(){
                 var dt = new Date();
                 var dtmonth = dt.getMonth()+1;
                 for(var i=0;i<disarray.length;i++){
                   if(disarray[i].split("-")[1] == dtmonth){
                     const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
             		 const d = new Date();
                     $("#disdates").append("<li class='disdate-item'>"+monthNames[d.getMonth()] + " " +disarray[i].split("-")[2]+": "+reasonarray[i]+"</li>");
                   }
                 }
                 var today = new Date();
                 var dd = String(today.getDate()).padStart(2, '0');
                 var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                 var yyyy = today.getFullYear();

                 var selecttoday = yyyy + '-' + mm + '-' + dd;
                 currentdate = "";
                 data = JSON.stringify({ "todayfrom":selecttoday , "todaytill": selecttoday});
                 $.post( "https://rajafashionapp.me/sites/api/searchappointmentbooking.php", data)
                     .done(function( data ) {
                      var response = $.parseJSON(data);
                      var todaydates = [];
                      try{
                        for(var i=0;i<response.date.length;i++){
                          var disdate = response.date[i].split(" ");
                          if(disdate[0] == selectdate){
                             todaydates.push(response.date[i].split(" ")[1]);
                          }
                        }
                      }catch(e){
                        todaydates = [];
                      }
                      $("#avatime").html("");
                      createAvaliableTime(todaydates);
                 });
              },
              disabledDates: disarray,
              disabledWeekdays: [0] // SUN (0), SAT (6)
          });
    });
     
     $( "#submitappt" ).click(function() {
       if(currentdate == ""){
         alert("Please select a date to confirm appointment"); 
       }else{
         $(".booking-wrapper").css("display","none");
         $(".booking-confirm-wrapper").css("display","block");
         var formatdate = currentdate.split("-");
         var aptformatdate = formatdate[1]+"/"+formatdate[2]+"/"+formatdate[0];
         var apttime = aptformatdate + " - " + $("#avatime").val()+":00";
         var aptpeople = $("#apppeople").val();
         var aptname = $("#apptname").val();
         var aptemail = $("#apptemail").val().trim();
         var aptmsg = $("#apptmsg").val();
         var data = JSON.stringify({ "customer":aptname , "email": aptemail, "phone": "-", "appointmentdate":apttime, "country":"-", "method":"website", "comment":aptmsg, "people":aptpeople});
         console.log(data);
         $.post( "https://rajafashionapp.me/sites/api/newappointmentapp.php", data)
            .done(function( data ) {
           		var response = $.parseJSON(data);
                if(response.result == "done"){
                 	alert("Your appointment has been booked"); 
                    location.reload();
                }else{
                 	alert("Appointment was not booked. Please try again in a few mintues"); 
                  	$(".booking-confirm-wrapper").css("display","none");	
                  	$(".booking-wrapper").css("display","block");
                }
         }).fail(function() {
            alert("Appointment was not able to be booked. Please try again!"); 
            $(".booking-confirm-wrapper").css("display","none");	
            $(".booking-wrapper").css("display","block");
         })
       }
     });
  }
  
  $(".available-slots").click(function() {
    $(".available-slots").removeClass("active");
    $(this).addClass("active");
  });
  if(window.location.pathname == "/product/suits-2/"){
   	 if(getAllUrlParams().fabric == "plain"){
       $(".variations tr:first-child").addClass("active");
       $(".variations tr:first-child .wcba-filter .wcba:first-child").click();
     }
     if(getAllUrlParams().fabric == "stripe"){
       $(".variations tr:first-child").addClass("active");
       $(".variations tr:first-child .wcba-filter .wcba").eq(1).click();
     }
     if(getAllUrlParams().fabric == "plaid"){
       $(".variations tr:first-child").addClass("active");
       $(".variations tr:first-child .wcba-filter .wcba").eq(2).click();
     }
    if(getAllUrlParams().fabric == "branded"){
       $(".variations tr:first-child").addClass("active");
       $(".variations tr:first-child .wcba-filter .wcba").eq(3).click();
     }
    if(getAllUrlParams().fabric == "all"){
       $(".variations tr:first-child").addClass("active");
       $(".variations tr:first-child .wcba-filter .wcba").eq(4).click();
     }
  }
  if(window.location.pathname == "/product/sports-jackets/"){
     if(getAllUrlParams().fabric == "tweed"){
       $(".variations tr:first-child").addClass("active");
       $(".variations tr:first-child .wcba-filter .wcba:first-child").click();
     }
     if(getAllUrlParams().fabric == "wool"){
       $(".variations tr:first-child").addClass("active");
       $(".variations tr:first-child .wcba-filter .wcba").eq(1).click();
     }
    if(getAllUrlParams().fabric == "hopsack"){
       $(".variations tr:first-child").addClass("active");
       $(".variations tr:first-child .wcba-filter .wcba").eq(2).click();
     }
     if(getAllUrlParams().fabric == "plaid"){
       $(".variations tr:first-child").addClass("active");
       $(".variations tr:first-child .wcba-filter .wcba").eq(3).click();
     }
     if(getAllUrlParams().fabric == "all"){
       $(".variations tr:first-child").addClass("active");
       $(".variations tr:first-child .wcba-filter .wcba").eq(4).click();
     }
   }
  
 function getAllUrlParams(url) {

  // get query string from url (optional) or window
  var queryString = url ? url.split('?')[1] : window.location.search.slice(1);

  // we'll store the parameters here
  var obj = {};

  // if query string exists
  if (queryString) {

    // stuff after # is not part of query string, so get rid of it
    queryString = queryString.split('#')[0];

    // split our query string into its component parts
    var arr = queryString.split('&');

    for (var i = 0; i < arr.length; i++) {
      // separate the keys and the values
      var a = arr[i].split('=');

      // set parameter name and value (use 'true' if empty)
      var paramName = a[0];
      var paramValue = typeof (a[1]) === 'undefined' ? true : a[1];

      // (optional) keep case consistent
      paramName = paramName.toLowerCase();
      if (typeof paramValue === 'string') paramValue = paramValue.toLowerCase();

      // if the paramName ends with square brackets, e.g. colors[] or colors[2]
      if (paramName.match(/\[(\d+)?\]$/)) {

        // create key if it doesn't exist
        var key = paramName.replace(/\[(\d+)?\]/, '');
        if (!obj[key]) obj[key] = [];

        // if it's an indexed array e.g. colors[2]
        if (paramName.match(/\[\d+\]$/)) {
          // get the index value and add the entry at the appropriate position
          var index = /\[(\d+)\]/.exec(paramName)[1];
          obj[key][index] = paramValue;
        } else {
          // otherwise add the value to the end of the array
          obj[key].push(paramValue);
        }
      } else {
        // we're dealing with a string
        if (!obj[paramName]) {
          // if it doesn't exist, create property
          obj[paramName] = paramValue;
        } else if (obj[paramName] && typeof obj[paramName] === 'string'){
          // if property does exist and it's a string, convert it to an array
          obj[paramName] = [obj[paramName]];
          obj[paramName].push(paramValue);
        } else {
          // otherwise add the property
          obj[paramName].push(paramValue);
        }
      }
    }
  }

  return obj;
}
  
  setTimeout(function(){ 
  	$(".buttonizer").append('<a class="buttonizer-button button-mobile-1 button-desktop-1" data-buttonizer="buttonizer-button-lMunMq01lJyPmIC" href="https://www.rajasfashions.com/appointments/"><div style="background-color:rgba(78,76,76,1)" class="buttonizer-label">Make a Virtual Appointment</div><i class="fa fa-calendar"></i></a>')
   }, 3000);
  
});</script>
<!-- end Simple Custom CSS and JS -->
