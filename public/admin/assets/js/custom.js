(function ($) {
    "use strict";
})(jQuery);
$("document").ready(function () {
    setTimeout(function () {
        $("div#alert-message").remove();
    }, 3000); // 3 secs
});
function closeAlert(event){
    let element = event.target;
    while(element.nodeName !== "BUTTON"){
      element = element.parentNode;
    }
    element.parentNode.parentNode.removeChild(element.parentNode);
  }