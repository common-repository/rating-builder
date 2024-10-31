(function($) {
  $(".comment-reply-link").on("click", function(e) {
    $(".wp-rating-extend").hide();
  });
  $("#cancel-comment-reply-link").on("click", function(e) {
    $(".wp-rating-extend").show();
  });

  /**********************************/
  // attachment item remaining
  /**********************************/
  var tli = $("ul.rqt_comment_attachments_wrap li").length;

  function moreNum() {
    var result = tli - 5;

    $("ul.rqt_comment_attachments_wrap li")
      .eq(4)
      .find("a")
      .addClass("rq-rating-img-text")
      .prepend("<span class='rating-caption'>+" + result + "</span>");
  }

  if (tli > 5) {
    moreNum();
  }

  /**********************************/
  // attachment item popup
  /**********************************/
  $("ul.rqt_comment_attachments_wrap li a.comment_attachments").magnificPopup({
    type: "image",
    gallery: {
      enabled: true,
    },
    zoom: {
      enabled: true,
      duration: 300,
      opener: function(element) {
        return element.find("img");
      },
    },
  });
})(jQuery);
