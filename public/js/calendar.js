$(function () {
  $('.js-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var getPart = $(this).attr('getPart');

    $('.modal_getPart').text(getPart);
  });

  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
