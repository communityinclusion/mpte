/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.mpte_boot4 = {
    attach: function (context, settings) { 
      if (!$('span.distNote').length) $('#block-schooldistricts h2').after(' <span class="distNote">NOTE: Schools districts listed below participate in one or more of the interagency groups listed on this site. Districts not shown do not participate in any of the groups listed.<hr /></span>');

    }
  };
 
})(jQuery, Drupal);
