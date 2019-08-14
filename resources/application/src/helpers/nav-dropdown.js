export default {

  dropdown_nav () {

    if($(window).width()>400){
      $(".menu__items").removeAttr('style')  // Removes all .list style attributes (remove display:none)
    }

    $(".nav_icon").click(function () {
      $('.menu__items').slideToggle("", function(){
      });
    });


    $(".menu__item").click(function () {
      if($(window).width()<=400) {
        $('.menu__items').slideToggle("", function () {
        });
      }
    });

    $(window).resize(function(){
      if($(window).width()>400){
        $(".menu__items").removeAttr('style')  // Removes all .list style attributes (remove display:none)
      }
    });

    $(document).on('click', function(event){
      var $trigger = $('.nav_icon');
      if($trigger != event.target && !$trigger.has(event.target).length){
        if($(window).width()<400){
          $('.menu__items').slideUp("");
        }
      }
    });
  }
}
