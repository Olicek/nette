<?php //netteCache[01]000410a:2:{s:4:"time";s:21:"0.05507400 1355405660";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:88:"C:\server\www\Bakalarka\Nette\kucera\app\AdminModule\templates\ProductList\default.latte";i:2;i:1341166642;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: C:\server\www\Bakalarka\Nette\kucera\app\AdminModule\templates\ProductList\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'j5u9vpt45h')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb96d10f3986_content')) { function _lb96d10f3986_content($_l, $_args) { extract($_args)
?><h3>Seznam produktů pro kategorii <?php echo Nette\Templating\Helpers::escapeHtml($categoryList->title, ENT_NOQUOTES) ?></h3>

<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("newProductList") ? "newProductList" : $_control["newProductList"]), array()) ;if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>

        <?php if ($_label = $_form["text"]->getLabel()) echo $_label->addAttributes(array()) ?> <br />
        <?php echo $_form["text"]->getControl()->addAttributes(array('size' => 20)) ?>

        <?php if ($_label = $_form["categoryId"]->getLabel()) echo $_label->addAttributes(array()) ?> <br />
        <?php echo $_form["categoryId"]->getControl()->addAttributes(array()) ?>
 <?php echo $_form["create"]->getControl()->addAttributes(array()) ?>

<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form)  ?>
<div id="<?php echo $_control->getSnippetId('table') ?>"><?php call_user_func(reset($_l->blocks['_table']), $_l, $template->getParameters()) ?>
</div><?php
}}

//
// block _table
//
if (!function_exists($_l->blocks['_table'][] = '_lb81928cf3e6__table')) { function _lb81928cf3e6__table($_l, $_args) { extract($_args); $_control->validateControl('table')
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
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($productList) as $plist): ?>
    <tr<?php if ($_l->tmp = array_filter(array($iterator->isOdd() ? 'odd' : 'even'))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
        <td>
<?php if ($plist->published): ?>            <a class="icon tick ajax" href="<?php echo htmlSpecialChars($_control->link("markUnPublished!", array($plist->id))) ?>
"></a>
<?php endif ;if (!$plist->published): ?>            <a class="icon untick ajax" href="<?php echo htmlSpecialChars($_control->link("markPublished!", array($plist->id))) ?>
"></a>
<?php endif ?>
        </td>
        <td><?php echo Nette\Templating\Helpers::escapeHtml($plist->id, ENT_NOQUOTES) ?></td>
        <td><a href="<?php echo htmlSpecialChars($_control->link("Product:", array($plist->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($plist->title, ENT_NOQUOTES) ?></a></td>
        <td><a href="" class="icon edit opener" title="editovat"></a></td>
        <td><a class="icon delete" title="smazat" href="<?php echo htmlSpecialChars($_control->link("deleteProductList!", array($plist->id))) ?>
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