<?php //netteCache[01]000385a:2:{s:4:"time";s:21:"0.40496500 1355395712";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:63:"C:\server\www\Bakalarka\Nette\kucera\app\components\PList.latte";i:2;i:1354639456;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: C:\server\www\Bakalarka\Nette\kucera\app\components\PList.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'q4i4t129r5')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb731870f710_content')) { function _lb731870f710_content($_l, $_args) { extract($_args)
?><table>
    <thead>
    <tr>
        <th>Zobrazeno</th>
        <th>id</th>
        <th>Název</th>
        <th>Kategorie</th>
        <th>Editovat</th>
        <th>Odstranit</th>
    </tr>
    </thead>
    <tbody>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($pList) as $plist): ?>
    <tr<?php if ($_l->tmp = array_filter(array($iterator->isOdd() ? 'odd' : 'even'))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
        <td>
<?php if ($plist->published): ?>            <a class="icon tick" href="<?php echo htmlSpecialChars($_control->link("markUnPublished!", array($plist->id))) ?>
"></a>
<?php endif ;if (!$plist->published): ?>            <a class="icon untick" href="<?php echo htmlSpecialChars($_control->link("markPublished!", array($plist->id))) ?>
"></a>
<?php endif ?>
        </td>
        <td><?php echo Nette\Templating\Helpers::escapeHtml($plist->id, ENT_NOQUOTES) ?></td>
        <td><a href="<?php echo htmlSpecialChars($_presenter->link(":Admin:Product:", array($plist->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($plist->title, ENT_NOQUOTES) ?></a></td>
        <td><a href="<?php echo htmlSpecialChars($_presenter->link(":Admin:ProductList:", array($plist->categorylist->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($plist->categorylist->title, ENT_NOQUOTES) ?></a></td>
        <td>
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("editProductList") ? "editProductList" : $_control["editProductList"]), array()) ;if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>
                <span class="icon edit" title="editovat"></span>
                <?php echo $_form["editId"]->getControl()->addAttributes(array('value' => $plist->id)) ?>

                <?php echo $_form["text"]->getControl()->addAttributes(array('size' => 15)) ?>
 <?php echo $_form["create"]->getControl()->addAttributes(array()) ?>

<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
        </td>
        <td><a class="icon delete" title="smazat" href="<?php echo htmlSpecialChars($_control->link("deleteProductList!", array($plist->id))) ?>
"></a></td>
    </tr>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
    </tbody>
</table><?php
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