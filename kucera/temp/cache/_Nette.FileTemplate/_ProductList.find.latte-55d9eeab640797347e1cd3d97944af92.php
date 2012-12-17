<?php //netteCache[01]000407a:2:{s:4:"time";s:21:"0.34501600 1355395712";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:85:"C:\server\www\Bakalarka\Nette\kucera\app\AdminModule\templates\ProductList\find.latte";i:2;i:1341166641;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: C:\server\www\Bakalarka\Nette\kucera\app\AdminModule\templates\ProductList\find.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'm0en1v2jw8')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lba57150d6b3_content')) { function _lba57150d6b3_content($_l, $_args) { extract($_args)
?><h2>Seznam produktů</h2>


<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("newProductList") ? "newProductList" : $_control["newProductList"]), array()) ;if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>

        <?php if ($_label = $_form["text"]->getLabel()) echo $_label->addAttributes(array()) ?> <br />
        <?php echo $_form["text"]->getControl()->addAttributes(array('size' => 20)) ?><br />
        <?php if ($_label = $_form["categoryId"]->getLabel()) echo $_label->addAttributes(array()) ?> <br />
        <?php echo $_form["categoryId"]->getControl()->addAttributes(array()) ?>
 <?php echo $_form["create"]->getControl()->addAttributes(array()) ?>

<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>


<?php $_ctrl = $_control->getComponent("plist"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ;
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