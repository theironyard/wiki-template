<?php
/**
 * DokuWiki Bootstrap3 Template
 *
 * @link     http://dokuwiki.org/template:bootstrap3
 * @author   Giuseppe Di Terlizzi <giuseppe.diterlizzi@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */
header('X-UA-Compatible: IE=edge,chrome=1');
include_once(dirname(__FILE__).'/tpl_global.php'); // Include template global variables

tpl_flush(); /* flush the output buffer */
// render the content into buffer for later use
ob_start();
iron_tpl_content(false);
$content = ob_get_clean();
@require_once('tpl_cookielaw.php');
?>
<meta charset="utf-8">

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />

    <title><?php echo $browserTitle ?></title>

    <link type="text/css" rel="stylesheet" href="<?php echo DOKU_TPL ?>css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo DOKU_TPL ?>css/style.css" />
    <!-- <link type="text/css" rel="stylesheet" href="<?php echo DOKU_TPL ?>css/typeplate.css" /> -->
    <style type="text/css">

    </style>
</head>
<body>

<div class="toolbar-top grid grid-4">
    <a href="/"><img src="<?php echo DOKU_TPL ?>/images/logo.svg"></a>
    <span>Swayze – The Iron Yard Wiki</span>
</div>

<?php
    // notes
    // echo tpl_favicon(array('favicon', 'mobile'));
    // tpl_includeFile('meta.html');
    // bootstrap3_html_msgarea();
    // tpl_flush();
    // bootstrap3_toc(tpl_toc(true));
    // tpl_includeFile('pageheader.html');
    // tpl_includeFile('pagefooter.html');
    // tpl_includeFile('topheader.html');
    // iron_tpl_content(false);
    // tpl_includeFile('footer.html');
    // tpl_includeFile('header.html');
    // tpl_includeFile('social.html');
    // tpl_youarehere(' ');
    // tpl_breadcrumbs(' ');
    // tpl_metaheaders();
    // tpl_classes();
    // tpl_breadcrumbs(' ');
    // tpl_pageinfo();
    // echo json_encode($tplConfigJSON);
    // echo ($showSidebar) ? 'hasSidebar' : '';
    // echo hsc($ID);
    // @require_once('tpl_navbar.php');
    // // if(!empty($INFO['draft'])) echo $lang['draftdate'].' '.dformat();
    // echo $lang['mediaselect'];
    // if ($wr && $data['media_manager']){?><a href="<?php echo DOKU_BASE?>lib/exe/mediamanager.php?ns=<?php echo $INFO['namespace']
    // if ($showSidebar && $sidebarPosition == 'right') {
    //     bootstrap3_include_sidebar($conf['sidebar'], 'dokuwiki__aside', $leftSidebarGrid, 'sidebarheader.html', 'sidebarfooter.html');
    // }
    // if ($showSidebar && $showRightSidebar && $sidebarPosition == 'left') {
    //     bootstrap3_include_sidebar($rightSidebar, 'dokuwiki__rightaside', $rightSidebarGrid, 'rightsidebarheader.html', 'rightsidebarfooter.html');
    // }
    // if ($showSidebar && $sidebarPosition == 'left') {
    //     bootstrap3_include_sidebar($conf['sidebar'], 'dokuwiki__aside', $leftSidebarGrid, 'sidebarheader.html', 'sidebarfooter.html');
    // }
?>

<?php
@require_once('tpl_page_tools.php');
tpl_toc(true);
echo tpl_action('login', 1, 0, 1, '<i class="fa fa-sign-in"></i> ');
?>

<pre class="markdeep-container">
<?php
    print $content;
    tpl_flush();
?>
</pre>

<script type="text/javascript">window.markdeepOptions = {mode: 'script'}</script>
<script src="<?php echo DOKU_TPL ?>js/markdeep.min.js"></script>
<script type="text/javascript">
    window.onload = app

    var decodeEntities = (function() {
        // this prevents any overhead from creating the object each time
        var element = document.createElement('div');

        function decodeHTMLEntities(str) {
            if (str && typeof str === 'string') {
                // strip script/html tags
                // str = str.replace(/<script[^>]*>([\S\s]*?)<\/script>/gmi, '')
                str = str.replace(/&\w+;/gmi, function(match){
                    element.innerHTML = match
                    match = element.textContent
                    element.textContent = ''
                    return match
                })

            }

            return str
        }

        return decodeHTMLEntities;
    })()

    function qs(s){ return document.querySelector(s) }

    function setAndClean(html){
        return html.replace(/<!--(.|\s)*-->/gi, '')
            .replace(/<p>(\s*)<p>/gi, '<p>')
            .replace(/<p>(\s*)<\/p>/gi, '')
            .replace(/(\s){2,}/gi, '')
    }

    function app(){
        var form = '#dw__editform',
            c = '.markdeep-container',
            _no = qs(form+' .no'),
            $c = qs(c)

        if(_no)
            _no.remove()

        var tag = document.createElement('style')
        tag.type='text/css'
        tag.textContent = window.markdeep.stylesheet().replace(/<[^<>]+>/ig, '').replace(/\}/g, '}\n')
        document.head.appendChild(tag)

        var result_html = setAndClean(
            window.markdeep.format('\n'+decodeEntities($c.innerHTML)))

        $c = qs(c) // find it again
        var $_c = document.createElement('div')
        $_c.innerHTML = result_html
        $c.parentNode.insertBefore($_c, $c.nextSibling)
        $c.remove()

        if(_no)
            qs(form).appendChild(_no)
    }
</script>

<?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?>

</body>
</html>
