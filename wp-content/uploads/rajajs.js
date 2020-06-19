/* Add your JavaScript code here.

If you are using the jQuery library, then don't forget to wrap your code inside jQuery.ready() as follows:

jQuery(document).ready(function( $ ){
    // Your code in here
});

--

If you want to link a JavaScript file that resides on another server (similar to
<script src="https://example.com/your-js-file.js"></script>), then please use
the "Add HTML Code" page, as this is a HTML code that links a JavaScript file.

End of comment */ 
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
        if(!distimearray.includes("09:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "09:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='09:00'>09:00</option>");
          }
        }
        /* if(!distimearray.includes("11:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "09:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='09:30'>09:30</option>");
          }
        } */
        if(!distimearray.includes("10:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "10:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='10:00'>10:00</option>");
          }
        }
        /* if(!distimearray.includes("11:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "10:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='10:30'>10:30</option>");
          }
        } */
        if(!distimearray.includes("11:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "11:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='11:00'>11:00</option>");
          }
        }
        /* if(!distimearray.includes("11:30")){
          timeresult = todaydates.filter(todaydates => todaydates == "11:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='11:30'>11:30</option>");
          }
        } */
     	/* if(!distimearray.includes("12:00")){
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
        } */
        if(!distimearray.includes("13:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "13:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='13:00'>13:00</option>");
          }
        }
     	/* if(!distimearray.includes("13:30")){
          timeresult = todaydates.filter(todaydates => todaydates == "13:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='13:30'>13:30</option>");
          }
        } */
        if(!distimearray.includes("14:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "14:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='14:00'>14:00</option>");
          }
        }
     	/* if(!distimearray.includes("14:30")){
          timeresult = todaydates.filter(todaydates => todaydates == "14:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='14:30'>14:30</option>");
          }
        } */
     	if(!distimearray.includes("15:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "15:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='15:00'>15:00</option>");
          }
        }
     	/* if(!distimearray.includes("15:30")){
          timeresult = todaydates.filter(todaydates => todaydates == "15:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='15:30'>15:30</option>");
          }
        } */
     	if(!distimearray.includes("16:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "16:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='16:00'>16:00</option>");
          }
        }
     	/* if(!distimearray.includes("16:30")){
          timeresult = todaydates.filter(todaydates => todaydates == "16:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='16:30'>16:30</option>");
          }
        } */
     	if(!distimearray.includes("17:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "17:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='17:00'>17:00</option>");
          }
        }
     	/* if(!distimearray.includes("17:30")){
          timeresult = todaydates.filter(todaydates => todaydates == "17:30:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='17:30'>17:30</option>");
          }
        } */
     	if(!distimearray.includes("18:00")){
          timeresult = todaydates.filter(todaydates => todaydates == "18:00:00");
          if(timeresult <= 1){
            $("#avatime").append("<option value='18:00'>18:00</option>");
          }
        }
   }

   $( "#state" ).change(function() {
        var state = "";
        var setEnabledDates = [];
        var disarray = [];
        var reasonarray = [];
        var distime = [];
        var selecteddate = '2020-04-12T01:00:00'
        $( "#state option:selected" ).each(function() {
          state = $( this ).text();
        });
        if(state == "Houston"){
          setEnabledDates = [
            '2020-04-12',
            '2020-04-13',
            '2020-04-14',
          ];
          selecteddate = '2020-04-12T01:00:00'
        }else{
          setEnabledDates = [
            '2020-04-16',
            '2020-04-17',
            '2020-04-18',
            '2020-04-19',
          ];
          selecteddate = '2020-04-16T01:00:00'
        }
        $('.booking-calendar').pignoseCalendar({
          date: selecteddate,
          enabledDates: setEnabledDates,
          select: function(date, context) {
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
      });
  });

  if(window.location.pathname == "/special-appointment/"){
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
            date: '2020-04-12T01:00:00',
            enabledDates: [
                '2020-04-12',
                '2020-04-13',
                '2020-04-14',
             ],
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
        var country = $("#state").val();
        var data = JSON.stringify({ "customer":aptname , "email": aptemail, "phone": "-", "appointmentdate":apttime, "country":country, "method":"website", "comment":aptmsg, "people":aptpeople});
        console.log(data);
        $.post( "https://rajafashionapp.me/sites/api/newappointmentspecialapp.php", data)
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
});