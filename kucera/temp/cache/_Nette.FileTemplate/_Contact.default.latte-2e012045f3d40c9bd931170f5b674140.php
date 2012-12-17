<?php //netteCache[01]000390a:2:{s:4:"time";s:21:"0.19354900 1354639187";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:68:"C:\server\www\pokusy\test\kucera\app\templates\Contact\default.latte";i:2;i:1341166650;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: C:\server\www\pokusy\test\kucera\app\templates\Contact\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '7e0q9c2fmk')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb5cf997d68f_content')) { function _lb5cf997d68f_content($_l, $_args) { extract($_args)
?><div id="contentIn">
    <h1>Kontaktní formulář</h1>
    <p>Pomocí tohoto formuláře nám můžete napsat vzkaz, na který Vám odpovíme v co možná nejkraším čase.</p>
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("contactForm") ? "contactForm" : $_control["contactForm"]), array()) ?>
        <div class="contact-form">
<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>
            <div class="pair">
            <?php if ($_label = $_form["name"]->getLabel()) echo $_label->addAttributes(array()) ?>
 <?php echo $_form["name"]->getControl()->addAttributes(array('size' => 30, 'autofocus' => true)) ?>

            </div>
            <div class="pair">
            <?php if ($_label = $_form["email"]->getLabel()) echo $_label->addAttributes(array()) ?>
 <?php echo $_form["email"]->getControl()->addAttributes(array()) ?>

            </div>
            <div class="pair">
            <?php if ($_label = $_form["subject"]->getLabel()) echo $_label->addAttributes(array()) ?>
 <?php echo $_form["subject"]->getControl()->addAttributes(array()) ?>

            </div>
            <div class="pair">
            <?php if ($_label = $_form["message"]->getLabel()) echo $_label->addAttributes(array()) ?>
 <?php echo $_form["message"]->getControl()->addAttributes(array()) ?>

            </div>
            <?php echo $_form["send"]->getControl()->addAttributes(array()) ?>

        </div>
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
</div><?php
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
$title = 'Kontakt' ;if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 