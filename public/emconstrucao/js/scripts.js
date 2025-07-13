jQuery(document).ready(function () {
  /*
        Background slideshow
    */
  $('.coming-soon').backstretch(
    [asset('img/backgrounds/1.jpg'), asset('img/backgrounds/2.jpg'), asset('img/backgrounds/3.jpg')],
    { duration: 3000, fade: 750 }
  );

  /*
        Tooltips
    */
  $('.social a.email').tooltip();
  $('.social a.instagram').tooltip();
  $('.social a.facebook').tooltip();
  $('.social a.twitter').tooltip();
  $('.social a.dribbble').tooltip();
  $('.social a.googleplus').tooltip();
  $('.social a.pinterest').tooltip();
  $('.social a.flickr').tooltip();

  /*
        Subscription form
    */
  $('.success-message').hide();
  $('.error-message').hide();

  $('.subscribe form').submit(function () {
    var postdata = $('.subscribe form').serialize();
    $.ajax({
      type: 'POST',
      url: 'assets/sendmail.php',
      data: postdata,
      dataType: 'json',
      success: function (json) {
        if (json.valid == 0) {
          $('.success-message').hide();
          $('.error-message').hide();
          $('.error-message').html(json.message);
          $('.error-message').fadeIn();
        } else {
          $('.error-message').hide();
          $('.success-message').hide();
          $('.subscribe form').hide();
          $('.success-message').html(json.message);
          $('.success-message').fadeIn();
        }
      },
    });
    return false;
  });
});
