<?php

/**
 * Plugin Name: Before After image Gutenberg Block
 * Description: Before After image block — is a Gutenberg plugin created via create-guten-block.
 * Author: kardi420
 * Author URI: https://webtoptemplates.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 *
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}


function ple_hook_javascript()
{
?>
  <script>
    var sliderBox = document.querySelectorAll(".comparison-slider-container");
    var afterSlide = document.querySelectorAll(".comparison-slide-after");
    var beforeSlide = document.querySelectorAll(".comparison-slide-before");

    for (var i = 0; i < sliderBox.length; i++) {
      sliderBox[i].addEventListener("mousemove", trackLocation, false);
      sliderBox[i].addEventListener("touchstart", trackLocation, false);
      sliderBox[i].addEventListener("touchmove", trackLocation, false);
    }

    function trackLocation(e) {
      // find the current slider container being hovered or touched
      var sliderContainer = e.currentTarget;

      // find the related before slide
      var before = sliderContainer.querySelector(".comparison-slide-before");

      // find the related after slide
      var after = sliderContainer.querySelector(".comparison-slide-after");

      var rect = before.getBoundingClientRect();

      var position = ((e.pageX - rect.left) / before.offsetWidth) * 100;
      if (position <= 100) {
        after.style.width = position + "%";
      }

    }
  </script>
<?php
}

add_action('wp_footer', 'ple_hook_javascript');

/**
 * Block Initializer.
 */
require_once plugin_dir_path(__FILE__) . 'src/init.php';
