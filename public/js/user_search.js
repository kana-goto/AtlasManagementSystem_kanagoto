$(function () {
  $('.search-trigger').click(function () {
    $(this).toggleClass('active');
    $('.search_conditions_inner').slideToggle();
  });

  $('.subject_edit_btn').click(function () {
    $(this).toggleClass('active');
    $('.subject_inner').slideToggle();
  });
});
