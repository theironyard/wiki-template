<?php
/**
 * Language file for config
 *
 * @author   Giuseppe Di Terlizzi <giuseppe.diterlizzi@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

$lang['discussionPage']      = 'コメントページ名（<code>discussion:@ID@</code> がデフォルト。<code>@ID@</code> は現在ページ名に置き換えるプレースホルダー）。リンクしない場合は空にする。';
$lang['showDiscussion']      = 'ツールメニューにコメントリンクを表示する';
$lang['showLoginOnFooter']   = 'フッターに「小さな」ログインリンクを表示する。<code>hideLoginLink</code> を有効にした場合、便利です。';
$lang['hideLoginLink']       = 'navbar 上のログインボタンを非表示にする。「読取り専用」の DokuWiki サイト（例：ブログ・個人的な Web サイト）には便利です。';
$lang['showUserHomeLink']    = 'navbar にユーザーのホームページリンクを表示する';
$lang['showCookieLawBanner'] = 'Display the Cookie Law banner on footer';
$lang['cookieLawBannerPage'] = 'Cookie Law banner page name';
$lang['cookieLawPolicyPage'] = 'Cookie Law policy page name';
$lang['browserTitle']        = 'ブラウザー上の DokuWiki の見出し（ <code>@TITLE@ [@WIKI@]</code> がデフォルトです。<code>@TITLE@</code> は現在のページ見出しに置換え。<code>@WIKI@</code> は Wiki タイトルに置換え。<a href="#config___title">title</a> の設定内容を参照して下さい。）';
$lang['showIndividualTool']  = 'Enable/Disable individual tool in navbar';
$lang['showTools']           = 'navbar 上のツール表示';
$lang['individualTools']     = 'navbar 上のツールを個々のメニューに分割する';
$lang['showTools_o_never']   = '表示しない';
$lang['showTools_o_logged']  = 'ログイン時に表示する';
$lang['showTools_o_always']  = '常に表示する';
$lang['showSearchForm']      = 'navbar 上の検索フォーム表示';
$lang['showSearchForm_o_never']  = '表示しない';
$lang['showSearchForm_o_logged'] = 'ログイン時に表示する';
$lang['showSearchForm_o_always'] = '常に表示する';
$lang['sidebarPosition']     = 'DokuWiki サイドバーの配置（<code>left</code> 又は <code>right</code>）';
$lang['rightSidebar']        = '右サイドバーのページ名。空欄で右サイドバー無効。デフォルトの DokuWiki <a href="#config___sidebar">サイドバー</a>が有効で <code>left</code> に配置している場合（<a href="#config___tpl____bootstrap3____sidebarPosition">tpl»bootstrap3»sidebarPosition</a> 設定を参照）のみ右サイドバーを表示します。DokuWiki サイドバーを右側に配置したい場合、<a href="#config___tpl____bootstrap3____sidebarPosition">tpl»bootstrap3»sidebarPosition</a> 設定を <code>right</code> にしてください。';
$lang['tableFullWidth']      = '100% のテーブル幅を有効にする（Bootstrap のデフォルト）';
$lang['semantic']            = 'semantic データを有効にする';
$lang['schemaOrgType']       = 'Schema.org の型（<code>Article</code>, <code>NewsArticle</code>, <code>TechArticle</code>, <code>BlogPosting</code>）';
$lang['showTranslation']     = '翻訳ツールバーを表示する（<em>Translation プラグイン</em>が必要）';
$lang['showAdminMenu']       = 'Display Administration menu';
$lang['inverseNavbar']       = 'navbar の色を反転する';
$lang['fixedTopNavbar']      = 'navbar を上部に固定する';
$lang['fluidContainer']      = 'Enable the fluid container (full-width of page)';
$lang['fluidContainerBtn']   = 'Display a button in navbar to expand container';
$lang['pageOnPanel']         = 'Enable the panel around the page';
$lang['bootstrapTheme']      = 'Bootstrap テーマ';
$lang['bootstrapTheme_o_default']    = 'Vanilla Bootstrap テーマ';
$lang['bootstrapTheme_o_optional']   = 'Optional Bootstrap テーマ';
$lang['bootstrapTheme_o_custom']     = 'custom Bootstrap テーマ';
$lang['bootstrapTheme_o_bootswatch'] = 'Bootswatch.com テーマ';
$lang['customTheme']         = 'custom テーマの URL';
$lang['bootswatchTheme']     = 'Bootswatch.com テーマの選択';
$lang['showThemeSwitcher']   = 'Bootswatch.com テーマ選択を navbar に表示';
$lang['hideInThemeSwitcher'] = 'テーマ選択で表示しないテーマ';
$lang['showPageInfo']        = 'ページのメタデータを表示する（日付、編集者など）';
$lang['showBadges']          = 'Show badge buttons (DokuWiki, Donate, etc)';
$lang['leftSidebarGrid']     = '左サイドバーの grid クラス <code>col-{xs,sm,md,lg}-x</code>（<a href="http://getbootstrap.com/css/#grid" target="_blank">Bootstrap Grids</a> マニュアルを参照）';
$lang['rightSidebarGrid']    = '右サイドバーの grid クラス <code>col-{xs,sm,md,lg}-x</code>（<a href="http://getbootstrap.com/css/#grid" target="_blank">Bootstrap Grids</a> マニュアルを参照）';
$lang['useGravatar']         = 'Load Gravatar image';
