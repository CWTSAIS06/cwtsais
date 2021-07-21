// $(document).ready( function () {
//     $('#myTable').DataTable();
// } );

// function display_ct6() {
//     var x = new Date()
//     var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
//     // hours = x.getHours( ) % 12;
//     // hours = hours ? hours : 12; //for 12hours 
//     var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear();
//     x1 = x1 + " - " + x.getHours() + ":" +  x.getMinutes() + ":" +  x.getSeconds() + " " + ampm;
//     document.getElementById('ct6').innerHTML = x1;
//     display_c6();
// }
// function display_c6(){
//     var refresh=1000; // Refresh rate in milli seconds
//     mytime=setTimeout('display_ct6()',refresh)
// }

// display_c6();
$(document).ready( function () {
    $('#myTable').DataTable();
} );

function display_ct6() {
    var x = new Date()
    var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
    // hours = x.getHours( ) % 12;
    // hours = hours ? hours : 12; //for 12hours 
    var date=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear();
    var time= x.getHours() + ":" +  x.getMinutes() + ":" +  x.getSeconds() + " " + ampm;
    document.getElementById('attendance_time').innerHTML = time;
    document.getElementById('attendance_date').innerHTML = date;
    display_c6();
}
function display_c6(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct6()',refresh)
}

display_c6();
