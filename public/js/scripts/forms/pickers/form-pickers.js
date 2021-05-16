(function (window, document, $) {
  'use strict';

  /*******  Flatpickr  *****/
  var dateTimePickr = $('.flatpickr-date');

  // Date & TIme
  if (dateTimePickr.length) {
    dateTimePickr.flatpickr({
      altInput: true,
      altFormat: 'j F, Y',
      dateFormat: 'Y-m-d',
      // defaultDate: '2016-10-20'
    });
  }
})(window, document, jQuery);
