<?php
/*
 * default configuration settings
 *
 * @author   Giuseppe Di Terlizzi <giuseppe.diterlizzi@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

$conf['showTools']           = 'always';
$conf['showSearchForm']      = 'always';
$conf['individualTools']     = 0;
$conf['showIndividualTool']  = 'user,site,page';
$conf['showUserHomeLink']    = 1;
$conf['showLoginOnFooter']   = 0;
$conf['hideLoginLink']       = 0;
$conf['showCookieLawBanner'] = 0;
$conf['cookieLawBannerPage'] = 'cookie:banner';
$conf['cookieLawPolicyPage'] = 'cookie:policy';
$conf['sidebarPosition']     = 'left';
$conf['rightSidebar']        = 'rightsidebar';
$conf['browserTitle']        = '@TITLE@ [@WIKI@]';
$conf['leftSidebarGrid']     = 'col-sm-3 col-md-2';
$conf['rightSidebarGrid']    = 'col-sm-3 col-md-2';
$conf['showTranslation']     = 0;
$conf['showAdminMenu']       = 0;
$conf['inverseNavbar']       = 0;
$conf['fixedTopNavbar']      = 0;
$conf['fluidContainer']      = 0;
$conf['fluidContainerBtn']   = 0;
$conf['pageOnPanel']         = 1;
$conf['tableFullWidth']      = 1;
$conf['semantic']            = 0;
$conf['schemaOrgType']       = 'Article';
$conf['bootstrapTheme']      = 'default';
$conf['customTheme']         = '';
$conf['bootswatchTheme']     = 'spacelab';
$conf['showThemeSwitcher']   = 0;
$conf['hideInThemeSwitcher'] = '';
$conf['showPageInfo']        = 1;
$conf['showBadges']          = 1;
$conf['showDiscussion']      = 0;
$conf['discussionPage']      = 'discussion:@ID@';
$conf['useGravatar']         = 0;
$conf['showLandingPage']     = 0;
$conf['landingPages']        = '(intro)';
$conf['showPageTools']       = 'always';
$conf['useLocalBootswatch']  = 1;
$conf['tableStyle']          = 'striped,condensed,responsive';

// helper functions
//

function iron_tpl_content($prependTOC = true) {
    global $ACT;
    global $INFO;
    $INFO['prependTOC'] = $prependTOC;

    ob_start();
    trigger_event('TPL_ACT_RENDER', $ACT, 'iron_tpl_content_core');
    $html_output = ob_get_clean();
    trigger_event('TPL_CONTENT_DISPLAY', $html_output, 'ptln');

    return !empty($html_output);
}

/**
 * Default Action of TPL_ACT_RENDER
 *
 * @return bool
 */
function iron_tpl_content_core() {
    global $ACT;
    global $TEXT;
    global $PRE;
    global $SUF;
    global $SUM;
    global $IDX;
    global $INPUT;

    switch($ACT) {
        case 'show':
            iron_html_show($TEXT);
            break;
        /** @noinspection PhpMissingBreakStatementInspection */
        case 'locked':
            html_locked();
        case 'edit':
        case 'recover':
            iron_html_edit();
            break;
        case 'preview':
            iron_html_edit();
            iron_html_show($TEXT);
            break;
        case 'draft':
            iron_html_draft();
            break;
        case 'search':
            html_search();
            break;
        case 'revisions':
            html_revisions($INPUT->int('first'));
            break;
        case 'diff':
            html_diff();
            break;
        case 'recent':
            $show_changes = $INPUT->str('show_changes');
            if (empty($show_changes)) {
                $show_changes = get_doku_pref('show_changes', $show_changes);
            }
            html_recent($INPUT->extract('first')->int('first'), $show_changes);
            break;
        case 'index':
            html_index($IDX); #FIXME can this be pulled from globals? is it sanitized correctly?
            break;
        case 'backlink':
            html_backlinks();
            break;
        case 'conflict':
            html_conflict(con($PRE, $TEXT, $SUF), $SUM);
            html_diff(con($PRE, $TEXT, $SUF), false);
            break;
        case 'login':
            html_login();
            break;
        case 'register':
            html_register();
            break;
        case 'resendpwd':
            html_resendpwd();
            break;
        case 'denied':
            html_denied();
            break;
        case 'profile' :
            html_updateprofile();
            break;
        case 'admin':
            tpl_admin();
            break;
        case 'subscribe':
            tpl_subscribe();
            break;
        case 'media':
            tpl_media();
            break;
        default:
            $evt = new Doku_Event('TPL_ACT_UNKNOWN', $ACT);
            if($evt->advise_before()) {
                msg("Failed to handle command: ".hsc($ACT), -1);
            }
            $evt->advise_after();
            unset($evt);
            return false;
    }
    return true;
}

function iron_html_show($txt=null){
    global $ID;
    global $REV;
    global $HIGH;
    global $INFO;
    global $DATE_AT;
    //disable section editing for old revisions or in preview
    if($txt || $REV){
        $secedit = false;
    }else{
        $secedit = true;
    }

    if (!is_null($txt)){
        //PreviewHeader
        // echo '<br id="scroll__here" />';
        // echo p_locale_xhtml('preview');
        // echo '<div class="preview"><div class="pad">';
        // $html = html_secedit(p_render('xhtml',p_get_instructions($txt),$info),$secedit);
        // if($INFO['prependTOC']) $html = tpl_toc(true).$html;
        // $html = iron_p_wiki_xhtml($ID,'text',$REV,true,$DATE_AT); ADDED LATER FOR TESTING
        echo '<div>'.NL.$txt.NL.'</div>'.NL;
        // echo '<div class="clearer"></div>';
        // echo '</div></div>';
    }else{
        if ($REV||$DATE_AT){
            $data = array('rev' => &$REV, 'date_at' => &$DATE_AT);
            trigger_event('HTML_SHOWREV_OUTPUT', $data, 'html_showrev');
        }
        // echo json_encode(p_wiki_xhtml($ID,$REV,true,$DATE_AT));
        $html = iron_p_wiki_xhtml($ID,'text',$REV,true,$DATE_AT);
        // $html = html_secedit($html,$secedit);
        if($INFO['prependTOC']) $html = tpl_toc(true).$html;
        // $html = html_hilight($html,$HIGH);
        echo $html;
    }
}

/**
 * Returns the parsed Wikitext in XHTML for the given id and revision.
 *
 * If $excuse is true an explanation is returned if the file
 * wasn't found
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 *
 * @param string $id page id
 * @param string|int $rev revision timestamp or empty string
 * @param bool $excuse
 * @return null|string
 */
function iron_p_wiki_xhtml($id, $mode='text', $rev='', $excuse=true,$date_at=''){
    $file = wikiFN($id,$rev);
    $ret  = '';

    //ensure $id is in global $ID (needed for parsing)
    global $ID;
    $keep = $ID;
    $ID   = $id;

    if($rev || $date_at){
        if(file_exists($file)){
            $ret = io_readWikiPage($file,$id,$rev);
            // $ret = p_render($mode,p_get_instructions(io_readWikiPage($file,$id,$rev)),$info,$date_at); //no caching on old revisions
        }elseif($excuse){
            $ret = p_locale_xhtml('norev');
        }
    }else{
        if(file_exists($file)){
            $ret = io_readWikiPage($file,$id,$rev);
            // $ret = p_cached_output($file,$mode,$id);
        }elseif($excuse){
            $ret = p_locale_xhtml('newpage');
        }
    }

    //restore ID (just in case)
    $ID = $keep;

    return $ret;
}

/**
 * Preprocess edit form data
 *
 * @author   Andreas Gohr <andi@splitbrain.org>
 *
 * @triggers HTML_EDITFORM_OUTPUT
 */
function iron_html_edit(){
    global $INPUT;
    global $ID;
    global $REV;
    global $DATE;
    global $PRE;
    global $SUF;
    global $INFO;
    global $SUM;
    global $lang;
    global $conf;
    global $TEXT;

    if ($INPUT->has('changecheck')) {
        $check = $INPUT->str('changecheck');
    } elseif(!$INFO['exists']){
        // $TEXT has been loaded from page template
        $check = md5('');
    } else {
        $check = md5($TEXT);
    }
    $mod = md5($TEXT) !== $check;

    $wr = $INFO['writable'] && !$INFO['locked'];
    $include = 'edit';
    if($wr){
        if ($REV) $include = 'editrev';
    }else{
        // check pseudo action 'source'
        if(!actionOK('source')){
            msg('Command disabled: source',-1);
            return;
        }
        $include = 'read';
    }

    global $license;

    $form = new Doku_Form(array('id' => 'dw__editform'));
    $form->addHidden('id', $ID);
    $form->addHidden('rev', $REV);
    $form->addHidden('date', $DATE);
    $form->addHidden('prefix', $PRE . '.');
    $form->addHidden('suffix', $SUF);
    $form->addHidden('changecheck', $check);

    $data = array('form' => $form,
                  'wr'   => $wr,
                  'media_manager' => true,
                  'target' => ($INPUT->has('target') && $wr) ? $INPUT->str('target') : 'section',
                  'intro_locale' => $include);

    if ($data['target'] !== 'section') {
        // Only emit event if page is writable, section edit data is valid and
        // edit target is not section.
        trigger_event('HTML_EDIT_FORMSELECTION', $data, 'iron_html_edit_form', true);
    } else {
        iron_html_edit_form($data);
    }
    if (isset($data['intro_locale'])) {
        echo p_locale_xhtml($data['intro_locale']);
    }

    $form->addHidden('target', $data['target']);
    // $form->addElement(form_makeOpenTag('div', array('id'=>'wiki__editbar', 'class'=>'editBar')));
    $form->addElement(form_makeOpenTag('div', array('id'=>'size__ctl')));
    $form->addElement(form_makeCloseTag('div'));
    if ($wr) {
        $form->addElement(form_makeOpenTag('div', array('class'=>'editButtons')));
        $form->addElement(form_makeButton('submit', 'save', $lang['btn_save'], array('id'=>'edbtn__save', 'accesskey'=>'s', 'tabindex'=>'4')));
        $form->addElement(form_makeButton('submit', 'preview', $lang['btn_preview'], array('id'=>'edbtn__preview', 'accesskey'=>'p', 'tabindex'=>'5')));
        $form->addElement(form_makeButton('submit', 'draftdel', $lang['btn_cancel'], array('tabindex'=>'6')));
        $form->addElement(form_makeCloseTag('div'));
        $form->addElement(form_makeOpenTag('div', array('class'=>'summary')));
        $form->addElement(form_makeTextField('summary', $SUM, $lang['summary'], 'edit__summary', 'nowrap', array('size'=>'50', 'tabindex'=>'2')));
        $elem = html_minoredit();
        if ($elem) $form->addElement($elem);
        $form->addElement(form_makeCloseTag('div'));
    }
    $form->addElement(form_makeCloseTag('div'));
    html_form('edit', $form);

    // if($wr && $conf['license']){
    //     $form->addElement(form_makeOpenTag('div', array('class'=>'license')));
    //     $out  = $lang['licenseok'];
    //     $out .= ' <a href="'.$license[$conf['license']]['url'].'" rel="license" class="urlextern"';
    //     if($conf['target']['extern']) $out .= ' target="'.$conf['target']['extern'].'"';
    //     $out .= '>'.$license[$conf['license']]['name'].'</a>';
    //     $form->addElement($out);
    //     $form->addElement(form_makeCloseTag('div'));
    // }

    // if ($wr) {
        // sets changed to true when previewed
        // echo '<script type="text/javascript">/*<![CDATA[*/'. NL;
        // echo 'textChanged = ' . ($mod ? 'true' : 'false');
        // echo '/*!]]>*/</script>' . NL;
    // }
}


function iron_form_makeWikiText($text, $attrs=array()) {
    $elem = array('_elem'=>'wikitext', '_text'=>$text, 'class'=>'edit', 'cols'=>'', 'rows'=>'');
    return array_merge($elem, $attrs);
}

function iron_html_draft(){
    global $INFO;
    global $ID;
    global $lang;
    $draft = unserialize(io_readFile($INFO['draft'],false));
    $text  = cleanText(con($draft['prefix'],$draft['text'],$draft['suffix'],true));

    print p_locale_xhtml('draft');
    $form = new Doku_Form(array('id' => 'dw__editform'));
    $form->addHidden('id', $ID);
    $form->addHidden('date', $draft['date']);
    $form->addElement(iron_form_makeWikiText($text, array('readonly'=>'readonly')));
    $form->addElement(form_makeOpenTag('div', array('id'=>'draft__status')));
    $form->addElement($lang['draftdate'].' '. dformat(filemtime($INFO['draft'])));
    $form->addElement(form_makeCloseTag('div'));
    $form->addElement(form_makeButton('submit', 'recover', $lang['btn_recover'], array('tabindex'=>'1')));
    $form->addElement(form_makeButton('submit', 'draftdel', $lang['btn_draftdel'], array('tabindex'=>'2')));
    $form->addElement(form_makeButton('submit', 'show', $lang['btn_cancel'], array('tabindex'=>'3')));
    html_form('draft', $form);
}

function iron_html_edit_form($param){
    global $TEXT;

    if ($param['target'] !== 'section') {
        msg('No editor for edit target ' . hsc($param['target']) . ' found.', -1);
    }

    $attr = array('tabindex'=>'1');
    if (!$param['wr']) $attr['readonly'] = 'readonly';

    $param['form']->addElement(preg_replace('/([^a-zA-Z_0-9 ])/i', '${1}', iron_form_makeWikiText($TEXT, $attr)));
}