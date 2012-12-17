<?php //netteCache[01]000407a:2:{s:4:"time";s:21:"0.38628100 1355395710";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:85:"C:\server\www\Bakalarka\Nette\kucera\app\AdminModule\templates\Category\default.latte";i:2;i:1341166640;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: C:\server\www\Bakalarka\Nette\kucera\app\AdminModule\templates\Category\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '92tb5ouyyt')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb635ae9c8f8_content')) { function _lb635ae9c8f8_content($_l, $_args) { extract($_args)
?><h2>Kategorie</h2>

<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("newCategory") ? "newCategory" : $_control["newCategory"]), array()) ?>
<div>
<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>
    <div class="pair">
        <?php if ($_label = $_form["text"]->getLabel()) echo $_label->addAttributes(array()) ?> <br />
        <?php echo $_form["text"]->getControl()->addAttributes(array('size' => 20)) ?>
 <?php echo $_form["create"]->getControl()->addAttributes(array()) ?>

    </div>
</div>
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form)  ?>
<div id="<?php echo $_control->getSnippetId('form') ?>"><?php call_user_func(reset($_l->blocks['_form']), $_l, $template->getParameters()) ?>
</div><?php
}}

//
// block _form
//
if (!function_exists($_l->blocks['_form'][] = '_lbde8e289e79__form')) { function _lbde8e289e79__form($_l, $_args) { extract($_args); $_control->validateControl('form')
?><table>
    <thead>
    <tr>
        <th>Zobrazeno</th>
        <th>id</th>
        <th>Název</th>
        <th>Editovat</th>
        <th>Odstranit</th>
    </tr>
    </thead>
    <tbody>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($categoryList) as $list): ?>
    <tr<?php if ($_l->tmp = array_filter(array($iterator->isOdd() ? 'odd' : 'even'))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
        <td>
<?php if ($list->published): ?>            <a class="icon tick ajax" href="<?php echo htmlSpecialChars($_control->link("markUnPublished!", array($list->id))) ?>
"></a>
<?php endif ;if (!$list->published): ?>            <a class="icon untick ajax" href="<?php echo htmlSpecialChars($_control->link("markPublished!", array($list->id))) ?>
"></a>
<?php endif ?>
        </td>

        <td><?php echo Nette\Templating\Helpers::escapeHtml($list->id, ENT_NOQUOTES) ?></td>
        <td><a href="<?php echo htmlSpecialChars($_control->link("ProductList:", array($list->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($list->title, ENT_NOQUOTES) ?></a></td>
        <td>
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("editCategory") ? "editCategory" : $_control["editCategory"]), array('class' => 'ajax')) ;if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>
                <span class="icon edit" title="editovat"></span>
                <?php echo $_form["editId"]->getControl()->addAttributes(array('value' => $list->id)) ?>

                <?php echo $_form["text"]->getControl()->addAttributes(array('size' => 15)) ?>
 <?php echo $_form["create"]->getControl()->addAttributes(array()) ?>

<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
        </td>
        <td><a class="icon delete ajax" title="smazat" href="<?php echo htmlSpecialChars($_control->link("deleteCategory!", array($list->id))) ?>
"></a></td>
    </tr>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
    </tbody>
</table>
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