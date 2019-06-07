/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.mpte_boot4 = {
    attach: function (context, settings) { 
      if (!$('span.distNote').length) $('#block-schooldistricts h2').after(' <span class="distNote">NOTE: Listed below are only school districts with affiliated interagency groups. Districts not shown have no reported interagency group.<hr /></span>');

    }
  };

})(jQuery, Drupal);
