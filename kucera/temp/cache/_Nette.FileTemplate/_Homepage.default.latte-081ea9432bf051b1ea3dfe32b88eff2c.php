<?php //netteCache[01]000395a:2:{s:4:"time";s:21:"0.03775600 1355046867";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:73:"C:\server\www\Bakalarka\Nette\kucera\app\templates\Homepage\default.latte";i:2;i:1341166651;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: C:\server\www\Bakalarka\Nette\kucera\app\templates\Homepage\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '6ave797436')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb757c449b07_content')) { function _lb757c449b07_content($_l, $_args) { extract($_args)
?><img id="foto" src="<?php echo htmlSpecialChars($basePath) ?>/images/foto.jpg" alt="" />
    <h1>Hlavní stránka</h1>
    <p>Vítejte na stránkách rodinné firmy Kučera – Zámečnictví.</p>
    <p>
        Zabýváme se výrobou kovového zboží, expertním otevíráním dveří, včetně montáží bezpečnostních
        systémů, a také odbornou montáží našich výrobků. Nabízíme výrobu garážových vrat, plotových
        bran, plotových dílů, různých konstrukcí, grilů a dalšího drobného kovového zboží. Dále pak napínání
        plotů, sváření, a to nejen elektrickým obloukem, ale i autogenem. Vyrábíme klíče FAB, dozické klíče
        i autoklíče. Naše výrobky se vyznačují vysokou kvalitou a díky nižším nákladům rodinného podniku i
        velice příznivou cenou. Přijďte nás navštívit a přesvědčte se sami.
    </p> 
<?php
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

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 