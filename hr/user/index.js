$(document).ready(function () {
  
    $('#allowanceTable').DataTable(  {
    "columnDefs": [
      { "width": "1%", "targets": 0, },
      {"className": "dt-center", "targets": "_all"}
    ],
      responsive: true,
      
      
    }   );



});