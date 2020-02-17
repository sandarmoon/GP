// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable(
  	{
 pagingType: 'full_numbers',
 pageLength: 5,
 language: {
 oPaginate: {
   sNext: '<i class="fa fa-forward"></i>',
   sPrevious: '<i class="fa fa-backward"></i>',
   sFirst: '<i class="fa fa-step-backward"></i>',
   sLast: '<i class="fa fa-step-forward"></i>'
   }
   } 
  }
 );


});

