<?php //netteCache[01]000402a:2:{s:4:"time";s:21:"0.36967400 1354639225";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:80:"C:\server\www\pokusy\test\kucera\app\AdminModule\templates\Product\default.latte";i:2;i:1341166641;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: C:\server\www\pokusy\test\kucera\app\AdminModule\templates\Product\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '8egte90lgb')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbeff3c038b7_content')) { function _lbeff3c038b7_content($_l, $_args) { extract($_args)
?><h2><?php echo Nette\Templating\Helpers::escapeHtml($productList->title, ENT_NOQUOTES) ?></h2>
<span class="icon edit opener">Vložin tový produkt</span>
<script>
// increase the default animation speed to exaggerate the effect
$.fx.speeds._default = 1000;
$(function() {
    $( "#dialog" ).dialog({
            autoOpen: false,
            show: "explode",
            hide: "explode",
            closeText: "hide",
            draggable: false,
            resizable: false,
            modal: true,
            width: 600,
            title: "Editace produktu"
    });

    $( ".opener" ).click(function() {
            $( "#dialog" ).dialog( "open" );
            return false;
    });
});
</script>


<div id="dialog">
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("newProduct") ? "newProduct" : $_control["newProduct"]), array()) ;if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>

        <?php if ($_label = $_form["title"]->getLabel()) echo $_label->addAttributes(array()) ?>
 <?php echo $_form["title"]->getControl()->addAttributes(array('size' => 20)) ?><br />
        <?php if ($_label = $_form["description"]->getLabel()) echo $_label->addAttributes(array()) ?>
 <?php echo $_form["description"]->getControl()->addAttributes(array('size' => 20)) ?><br />
        <?php if ($_label = $_form["text"]->getLabel()) echo $_label->addAttributes(array()) ?>
 <?php echo $_form["text"]->getControl()->addAttributes(array('size' => 20)) ?><br />
        <?php if ($_label = $_form["price"]->getLabel()) echo $_label->addAttributes(array()) ?>
 <?php echo $_form["price"]->getControl()->addAttributes(array('size' => 20)) ?><br />
        <?php if ($_label = $_form["foto"]->getLabel()) echo $_label->addAttributes(array()) ?>
 <?php echo $_form["foto"]->getControl()->addAttributes(array('size' => 20)) ?><br />
        <br />
        <?php echo $_form["create"]->getControl()->addAttributes(array()) ?>

<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
</div>
<div id="<?php echo $_control->getSnippetId('item') ?>"><?php call_user_func(reset($_l->blocks['_item']), $_l, $template->getParameters()) ?>
</div><?php
}}

//
// block _item
//
if (!function_exists($_l->blocks['_item'][] = '_lb0bcfaaeccd__item')) { function _lb0bcfaaeccd__item($_l, $_args) { extract($_args); $_control->validateControl('item')
?><table>
    <thead>
    <tr>
        <th>Zobrazeno</th>
        <th>id</th>
        <th>Název</th>
        <th>popis</th>
        <th>Cena</th>
        <th>Vloženo</th>
        <th>Náhled</th>
    </tr>
    </thead>
    <tbody>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($product) as $list): ?>
    <tr<?php if ($_l->tmp = array_filter(array($iterator->isOdd() ? 'odd' : 'even'))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
<div id="<?php echo $_dynSnippetId = $_control->getSnippetId("item-$list->id") ?>
"><?php ob_start() ?>
        <td>
<?php if ($list->published): ?>            <a class="icon tick ajax" href="<?php echo htmlSpecialChars($_control->link("markUnPublished!", array($list->id))) ?>
"></a>
<?php endif ;if (!$list->published): ?>            <a class="icon untick ajax" href="<?php echo htmlSpecialChars($_control->link("markPublished!", array($list->id))) ?>
"></a>   
<?php endif ?>
        </td>
        <td><?php echo Nette\Templating\Helpers::escapeHtml($list->id, ENT_NOQUOTES) ?></td>
        <td><a href="<?php echo htmlSpecialChars($_control->link("Product:detail", array($list->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($list->title, ENT_NOQUOTES) ?></a></td>
        <td><?php echo Nette\Templating\Helpers::escapeHtml($list->description, ENT_NOQUOTES) ?></td>
        <td><?php echo Nette\Templating\Helpers::escapeHtml($list->price, ENT_NOQUOTES) ?> Kč</td>
        <td><?php echo Nette\Templating\Helpers::escapeHtml($list->created, ENT_NOQUOTES) ?></td>
<?php $iterations = 0; foreach ($images as $image): if ($image->product_id == $list->id): ?>
                <td>
                    <img src="<?php echo htmlSpecialChars($basePath) ;echo htmlSpecialChars($image->path) ?>
thumb/<?php echo htmlSpecialChars($image->name) ?>" alt="" />
                </td>
<?php if (($image->product_id == $list->id)) break ;endif ;$iterations++; endforeach ;$_dynSnippets[$_dynSnippetId] = ob_get_flush() ?>
</div>
    </tr>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
    </tbody>
</table>
<?php if (isset($_dynSnippets)) return $_dynSnippets; 
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