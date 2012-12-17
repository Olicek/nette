<?php //netteCache[01]000387a:2:{s:4:"time";s:21:"0.76357100 1355580207";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:65:"C:\server\www\Bakalarka\Nette\kucera\app\templates\Sign\new.latte";i:2;i:1341166652;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: C:\server\www\Bakalarka\Nette\kucera\app\templates\Sign\new.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '9xi22uo4kw')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb885b60d084_content')) { function _lb885b60d084_content($_l, $_args) { extract($_args)
;$title = 'Registrace nového uživatele' ?>
<h1>Registrace</h1>

<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("newUser") ? "newUser" : $_control["newUser"]), array()) ?>
<div class="sign-in-form">
<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>

    <div class="pair">
<?php if ($_label = $_form["username"]->getLabel()) echo $_label->addAttributes(array()) ?>
        <div class="input"><?php echo $_form["username"]->getControl()->addAttributes(array()) ?></div>
    </div>
    <div class="pair">
<?php if ($_label = $_form["password"]->getLabel()) echo $_label->addAttributes(array()) ?>
        <div class="input"><?php echo $_form["password"]->getControl()->addAttributes(array()) ?></div>
    </div>
    <div class="pair">
<?php if ($_label = $_form["name"]->getLabel()) echo $_label->addAttributes(array()) ?>
        <div class="input"><?php echo $_form["name"]->getControl()->addAttributes(array()) ?></div>
    </div>

    <div class="pair">
        <div class="input"><?php echo $_form["register"]->getControl()->addAttributes(array()) ?></div>
    </div>
</div>
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
<a href="<?php echo htmlSpecialChars($_control->link("Sign:in")) ?>">Přihlášení</a>
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 