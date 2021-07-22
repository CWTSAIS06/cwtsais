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
    $('table.display').DataTable({
        "order": false,
        "bPaginate": false,
        "bInfo" : false,
        searching: false
    });
} );

function display_ct6() {
    const months = ["JANUARY", "FEBRUARY", "MARCH","APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];
    const day = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
    var x = new Date()
    var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
    // hours = x.getHours( ) % 12;
    // hours = hours ? hours : 12; //for 12hours 
    var date= months[x.getMonth()] + " " + x.getDate() + " " + x.getFullYear();
    var time= x.getHours() + ":" +  x.getMinutes() + ":" +  x.getSeconds() + " " + ampm;
    var day_today = day[x.getDay()]
    document.getElementById('attendance_time').innerHTML = time;
    document.getElementById('attendance_date').innerHTML = date;
    document.getElementById('attendance_day').innerHTML = day_today;
    display_c6();
}
function display_c6(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct6()',refresh)
}

display_c6();
