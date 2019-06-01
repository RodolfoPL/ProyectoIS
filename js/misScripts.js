$(document).ready(function(){
  $("#datetime").datetimepicker({
    format: 'yyyy-mm-dd hh:ii',
    language: 'es',
    daysOfWeekDisabled: [0, 6],
    hoursDisabled: '0,1,2,3,4,5,6,7,20,21,22,23'
  });
});
