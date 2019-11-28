$(function(){
//mostrar data no input
  $( "#datepickerinicio" ).datepicker({
    appendText:"(dd-mm-yy)",
    dateFormat:"dd-mm-yy",
    altField: "#datepickerinicio-valorbd",
    altFormat: "yy-mm-dd",
})
$('#datepickerinicio').datepicker().datepicker('setDate', new Date());
 $( "#datepickerfim" ).datepicker({
    appendText:"(dd-mm-yy)",
    dateFormat:"dd-mm-yy",
    altField: "#datepickerfim-valorbd",
    altFormat: "yy-mm-dd"
 })
 $('#datepickerfim').datepicker().datepicker('setDate', new Date());
  

//mostrar time no input
    var d = new Date(),        
        h = d.getHours(),
        m = d.getMinutes();
    if(h < 10) h = '0' + h; 
    if(m < 10) m = '0' + m; 
    $('input[type="time"][value="now"]').each(function(){ 
      $(this).attr({'value': h + ':' + m});
    });

  });
  