

jQuery(document).ready(function() {

    jQuery('.woocommerce-product-gallery').append("<div class='zoom_roll_over' style='text-align:center'>Roll over image to zoom in</div>");

    let interval = setInterval(function() {
        if(jQuery('.wcsatt-options-prompt-radios input').eq(1).length ==1 ){
            jQuery('.wcsatt-options-prompt-radios input').eq(1).click();

            clearInterval(interval);
        }
            
    }, 500);
    

    /* Collapsible Widget */
    let coll = document.getElementsByClassName("collapsible");   
    
    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight){
          content.style.maxHeight = null;
        } else {
          content.style.maxHeight = content.scrollHeight + "px";
        } 
      });
    }
    /* Collapsible Widget */

});