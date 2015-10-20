<?php
/**
 * DokuWiki Bootstrap3 Template: Cookie Law Banner
 *
 * @link     http://dokuwiki.org/template:bootstrap3
 * @author   Giuseppe Di Terlizzi <giuseppe.diterlizzi@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

?>
<?php if ( $showCookieLawBanner && ! (get_doku_pref('cookieNoticeAccepted', null) || get_doku_pref('cookieNoticeAccepted', '')) ): ?>
<div id="cookieNotice" class="navbar <?php echo (($inverseNavbar) ? 'navbar-inverse' : 'navbar-default') ?> navbar-fixed-bottom">
  <div class="container">
    <?php tpl_include_page($cookieLawBannerPage) ?>
    <div class="navbar-right">
      <button class="btn btn-primary btn-xs navbar-btn" id="cookieDismiss">OK</button>
      <?php tpl_link(wl($cookieLawPolicyPage), 'Policy', 'class="btn btn-default btn-xs navbar-btn" id="cookiePolicy"')?>
    </div>
  </div>
</div>
<script type="text/javascript">
  jQuery('#cookieDismiss').click(function(){
    jQuery('#cookieNotice').hide();
    DokuCookie.setValue('cookieNoticeAccepted', true);
  });
  jQuery(document).ready(function(){
    jQuery('#cookieNotice p').addClass('navbar-text').prepend('<i class="fa fa-info-circle text-primary"/>');
  });
</script>
<?php endif; ?>
