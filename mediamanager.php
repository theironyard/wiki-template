<?php
/**
 * DokuWiki Bootstrap3 Template: Media Manager Popup
 *
 * @link     http://dokuwiki.org/template:bootstrap3
 * @author   Andreas Gohr <andi@splitbrain.org>
 * @author   Giuseppe Di Terlizzi <giuseppe.diterlizzi@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); // must be run from within DokuWiki
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */
header('X-UA-Compatible: IE=edge,chrome=1');

include_once(dirname(__FILE__).'/tpl_global.php'); // Include template global variables

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
  lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction'] ?>" class="popup no-js">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?php echo hsc($lang['mediaselect'])?> [<?php echo strip_tags($conf['title'])?>]</title>
  <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
  <?php tpl_includeFile('meta.html') ?>
  <?php foreach ($bootstrapStyles as  $bootstrapStyle): ?>
  <link type="text/css" rel="stylesheet" href="<?php echo $bootstrapStyle; ?>" />
  <?php endforeach; ?>
  <link type="text/css" rel="stylesheet" href="<?php echo DOKU_TPL ?>assets/font-awesome/css/font-awesome.min.css" />
  <script type="text/javascript">/*<![CDATA[*/
    var TPL_CONFIG = <?php echo json_encode($tplConfigJSON); ?>;
  /*!]]>*/</script>
  <?php tpl_metaheaders() ?>
  <script src="<?php echo DOKU_TPL ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
    #media_content label, #media__opts label { display: inline !important; }
    #media__tree li { margin: 0; }
    #media__content input, #media__content label { margin: 0; }
    #media__content [type=submit] { vertical-align: bottom; }
    #mediamgr__aside, #mediamgr__content { height: auto; }
    #mediamgr__aside { top: 0; position: fixed; }
  </style>
</head>

<body>
    <!--[if IE 8 ]><div id="IE8"><![endif]-->
    <div id="media__manager" class="<?php echo tpl_classes(); ?> row">

        <div id="dw__msgarea">
          <?php html_msgarea() ?>
        </div>
        <div id="mediamgr__aside" class="col-xs-4">
            <h1><?php echo hsc($lang['mediaselect'])?></h1>

            <?php /* keep the id! additional elements are inserted via JS here */?>
            <div id="media__opts"></div>

            <?php tpl_mediaTree() ?>
        </div>

        <div id="mediamgr__content" class="col-xs-8">
            <?php tpl_mediaContent() ?>
        </div>

    </div>
    <!--[if IE 8 ]></div"><![endif]-->
</body>
</html>
