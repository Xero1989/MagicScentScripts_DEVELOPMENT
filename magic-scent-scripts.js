jQuery(document).ready(function () {
  console.log("Magic Scent Scripts LOADED");

  if (jQuery("#section_products_list").length == 1) {
    jQuery("#section_products_list .qodef-m-filter-item-name")
      .eq(5)
      .text("Scents");
    jQuery("#section_products_list .qodef-m-filter-item-name").eq(5).click();

    jQuery(".qodef-woo-product-list .qodef-m-filter").css("display", "block");
    jQuery(".qodef-woo-product-list .qodef-grid-inner").css("display", "block");
  }

  // let scroll_position = jQuery(document).scrollTop();
  // jQuery(document).scroll(function () {
  //     new_scroll_position = jQuery(document).scrollTop();

  //     jQuery("#qodef-page-header").removeClass("scroll_hide_header");
  //     jQuery("#qodef-page-mobile-header").removeClass("scroll_hide_header");
  //     jQuery("div.ancr-group").removeClass("scroll_hide_header");
  //     jQuery("#qodef-top-area").removeClass("scroll_hide_header");

  //     if (new_scroll_position > scroll_position) {
  //         scroll_position = new_scroll_position - 1;

  //         if (!jQuery("#qodef-page-header").hasClass("scroll_hide_header")) {
  //             jQuery("#qodef-page-header").addClass("scroll_hide_header");
  //             jQuery("#qodef-page-header").removeClass("scroll_show_header");
  //         }

  //         if (!jQuery("#qodef-page-mobile-header").hasClass("scroll_hide_header")) {
  //             jQuery("#qodef-page-mobile-header").addClass("scroll_hide_header");
  //             jQuery("#qodef-page-mobile-header").removeClass("scroll_show_header");
  //         }

  //         if (!jQuery("div.ancr-group").hasClass("scroll_hide_header")) {
  //             jQuery("div.ancr-group").addClass("scroll_hide_header");
  //             jQuery("div.ancr-group").removeClass("scroll_show_header");
  //         }

  //         if (!jQuery("#qodef-top-area").hasClass("scroll_hide_header"))
  //             jQuery("#qodef-top-area").addClass("scroll_hide_header");
  //         jQuery("#qodef-top-area").removeClass("scroll_show_header");

  //     }
  //     else {

  //         if (!jQuery("#qodef-page-header").hasClass("scroll_show_header")) {
  //             jQuery("#qodef-page-header").addClass("scroll_show_header");
  //             jQuery("#qodef-page-header").removeClass("scroll_hide_header");
  //         }

  //         if (!jQuery("#qodef-page-mobile-header").hasClass("scroll_show_header")) {
  //             jQuery("#qodef-page-mobile-header").addClass("scroll_show_header");
  //             jQuery("#qodef-page-mobile-header").removeClass("scroll_hide_header");
  //         }

  //         if (!jQuery("#div.ancr-group").hasClass("scroll_show_header")) {
  //             jQuery("div.ancr-group").addClass("scroll_show_header");
  //             jQuery("div.ancr-group").removeClass("scroll_hide_header");
  //         }

  //         if (!jQuery("#qodef-top-area").hasClass("scroll_show_header")) {
  //             jQuery("#qodef-top-area").addClass("scroll_show_header");
  //             jQuery("#qodef-top-area").removeClass("scroll_hide_header");
  //         }

  //         if (new_scroll_position == 0) {
  //             // jQuery("#qodef-page-header").css("top", "0px");
  //             // jQuery("#qodef-page-mobile-header").css("top", "0px");
  //         }

  //         scroll_position = new_scroll_position;
  //     }
  // });

  //     setTimeout(function () {
  //   jQuery(".wcsatt-options-prompt-action")
  //     .eq(1)
  //     .text("Subscribe & save up to 20%");
  //   jQuery("table.variations .thwvsf-wrapper-item-li:eq(0)").click();
  // }, 1000);

  
  
});



function diffusers_filter_by() {
  console.log("filter diffusers by");

  let option = jQuery("#select_filter_diffuser option:selected").val();

  switch (option) {
    case "small":
      window.location.href = "/product-category/small-room-diffusers/";
      break;
    case "medium":
      window.location.href = "/product-category/medium-room-diffusers/";
      break;
    case "large":
      window.location.href = "/product-category/large-room-diffusers/";
      break;
    case "hvac":
      window.location.href = "/product-category/hvac-scent-diffusers/";
      break;
    case "best_sellers":
      window.location.href = "/product-category/best-sellers-diffusers/";
      break;
    case "cars":
      window.location.href = "/product-category/cars/";
      break;
  }
}


