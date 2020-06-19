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
     	if(!distimearray.includes("16:30")){
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
        }
   }
  
  if(window.location.pathname == "/special-appointment/"){
    
  }
  
  $(".available-slots").click(function() {
    $(".available-slots").removeClass("active");
    $(this).addClass("active");
  });
  
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
});</script>
<!-- end Simple Custom CSS and JS -->
