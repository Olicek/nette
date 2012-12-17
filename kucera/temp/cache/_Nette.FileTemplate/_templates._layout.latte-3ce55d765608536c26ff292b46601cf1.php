<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.77409500 1354639177";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:60:"C:\server\www\pokusy\test\kucera\app\templates\@layout.latte";i:2;i:1341166649;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: C:\server\www\pokusy\test\kucera\app\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'zm580a9e07')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb192b98dd69_head')) { function _lb192b98dd69_head($_l, $_args) { extract($_args)
;
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta name="description" content="Nette Framework web application skeleton" />
<?php if (isset($robots)): ?>	<meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>

	<title><?php if (isset($title)): echo Nette\Templating\Helpers::escapeHtml($title, ENT_NOQUOTES) ?>
 &ndash; <?php endif ?>Zámečnictví Kučera</title>

        <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/js/jquery/css/jquery-ui-1.8.16.custom.css" type="text/css" />
	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/screen.css" type="text/css" />
	<link rel="stylesheet" media="print" href="<?php echo htmlSpecialChars($basePath) ?>/css/print.css" type="text/css" />
	<link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/favicon.ico" type="image/x-icon" />

	<script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery/jquery.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery/jquery-ui-1.8.16.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.nette.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/ajax.js"></script>
	<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>

<body> 
    <div id="master">
        <div id="header">
            <h1><span>ZÁMEČNICTVÍ KUČERA</span></h1>
            <h2>Odemkněte s námi Vaše životy!</h2>
            <div id="admin-menu">
                <a href="<?php echo htmlSpecialChars($_control->link(":Homepage:")) ?>
">Hlavní stránka</a>
                <a href="<?php echo htmlSpecialChars($_control->link(":Admin:Homepage:default")) ?>
">Administrace</a><br />
<?php if ($user->isLoggedIn()): ?>
                    <span class="icon user"><?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->name, ENT_NOQUOTES) ?></span>
                    <a href="<?php echo htmlSpecialChars($_control->link(":User:password")) ?>
">Změna hesla</a>
                    <a href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>
">Odhlásit</a>
<?php else: ?>
                    <a href="<?php echo htmlSpecialChars($_control->link(":Sign:in")) ?>
">Přihlásit</a>
                    <a href="<?php echo htmlSpecialChars($_control->link(":Sign:new")) ?>
">Registrovat</a>
<?php endif ?>
            </div>
        </div>
        <div id="menu">
            <ul>
                <li><a href="<?php echo htmlSpecialChars($_control->link(":Homepage:")) ?>
">Hlavní stránka</a></li>
                <li><a href="<?php echo htmlSpecialChars($_control->link(":Homepage:about")) ?>
">O nás</a></li>
                <li><a href="<?php echo htmlSpecialChars($_control->link(":Eshop:Homepage:default")) ?>
">E-shop</a></li>
                <li><a href="<?php echo htmlSpecialChars($_control->link(":Contact:")) ?>
">Kontakt</a></li>
                
            </ul>
        </div>
        <div id="contentBox">
            <div id="leftmenu">
                <ul>
<?php $iterations = 0; foreach ($categoryList_menu as $category): if ($category->published): ?>                    <li>
                        <a href="<?php echo htmlSpecialChars($_control->link(":Eshop:Category:default", array($category->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($category->title, ENT_NOQUOTES) ?></a>
                        <ul class="submenu">
<?php $iterations = 0; foreach ($productList_menu as $product): if (($category->id == $product->categorylist_id)): if ($product->published): ?>                                    <li>
                                        <a href="<?php echo htmlSpecialChars($_control->link(":Eshop:Product:default", array($product->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($product->title, ENT_NOQUOTES) ?></a>
                                    </li>
<?php endif ;endif ;$iterations++; endforeach ?>
                        </ul>
                    </li>
<?php endif ;$iterations++; endforeach ?>
                </ul>
            </div>
            <div id="content">
                <div id="contentIn">
<?php $iterations = 0; foreach ($flashes as $flash): ?>                    <div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ;Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
                </div>
            </div>
        </div>
        <div id="footer">
            <a href="#">Mapa stránek</a> |
            <a href="#">Tisknout stránku</a> |
            <a href="<?php echo htmlSpecialChars($_control->link(":Contact:")) ?>
">Kontaktujte nás</a> <br />
            2012 Kučera zámečnictví
        </div>
    </div>
</body>
</html>
