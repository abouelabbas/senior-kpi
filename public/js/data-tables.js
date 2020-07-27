(function($) {

  'use strict';





  let StudentTable = $('.dattable').DataTable({

    "pageLength": -1,
    // aLengthMenu: [5, 10, 15, 20, 25, 30, 40, "All"]
    "language": {
      "lengthMenu": 'Display <select>'+
        '<option value="5">5</option>'+
        '<option value="10">10</option>'+
        '<option value="15">15</option>'+
        '<option value="20">20</option>'+
        '<option value="25">25</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="-1">All</option>'+
        '</select> records'
    }

  })





})(jQuery);

