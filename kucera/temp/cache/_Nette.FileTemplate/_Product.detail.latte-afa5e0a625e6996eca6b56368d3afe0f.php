<?php //netteCache[01]000405a:2:{s:4:"time";s:21:"0.60407500 1355678066";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:83:"C:\server\www\Bakalarka\Nette\kucera\app\AdminModule\templates\Product\detail.latte";i:2;i:1355678052;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: C:\server\www\Bakalarka\Nette\kucera\app\AdminModule\templates\Product\detail.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '84c3b9691c')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbd2d09bc015_content')) { function _lbd2d09bc015_content($_l, $_args) { extract($_args)
?><div id="detail">
    <a href="<?php echo htmlSpecialChars($_control->link("Product:", array($product->productlist_id))) ?>
">zpět</a>
    <div id="options">
        <a class="icon untick" href="<?php echo htmlSpecialChars($_control->link("deleteProduct!", array($product->id, $product->productlist_id))) ?>
">smazat</a>
        <span class="icon edit opener">editovat</span>
    </div>
    
    <h2><?php if ($product->published): ?><a class="icon tick" href="<?php echo htmlSpecialChars($_control->link("markUnPublished!", array($product->id))) ?>
"></a>
<?php endif ;if (!$product->published): ?>        <a class="icon untick" href="<?php echo htmlSpecialChars($_control->link("markPublished!", array($product->id))) ?>
"></a>
<?php endif ?>
        <?php echo Nette\Templating\Helpers::escapeHtml($product->title, ENT_NOQUOTES) ?>

    </h2>
    
    <div class="content">
        <div class="box">
<?php $iterations = 0; foreach ($images as $image): ?>            <span>
                <img src="<?php echo htmlSpecialChars($basePath) ;echo htmlSpecialChars($image->path) ?>
/thumb/<?php echo htmlSpecialChars($image->name) ?>" alt="" />
            </span>
<?php $iterations++; endforeach ?>
        </div>
        <div class="box">
            <p><?php echo Nette\Templating\Helpers::escapeHtml($product->description, ENT_NOQUOTES) ?></p>
            <p><?php echo Nette\Templating\Helpers::escapeHtml($product->price, ENT_NOQUOTES) ?> Kč</p>
            
            <p><?php echo Nette\Templating\Helpers::escapeHtml($product->created, ENT_NOQUOTES) ?></p>
        </div>
        <div class="clear"></div>
    </div>
    <div class="content">
        <p><?php echo Nette\Templating\Helpers::escapeHtml($product->text, ENT_NOQUOTES) ?></p>
    </div>
</div>


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

$('.untick').click(function(e){
    if (!confirm('Skutečně chcete odstranit?')){
        e.preventDefault();
        return false;
    }
    
});
</script>

<div id="dialog">
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("editProduct") ? "editProduct" : $_control["editProduct"]), array()) ;if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>
    <div class="pair">
        <?php if ($_label = $_form["title"]->getLabel()) echo $_label->addAttributes(array()) ?>
 <?php echo $_form["title"]->getControl()->addAttributes(array('size' => 20)) ?>

    </div>
    <div class="pair">
        <?php if ($_label = $_form["description"]->getLabel()) echo $_label->addAttributes(array()) ?>
 <?php echo $_form["description"]->getControl()->addAttributes(array('size' => 20)) ?>

    </div>
    <div class="pair">
        <?php if ($_label = $_form["text"]->getLabel()) echo $_label->addAttributes(array()) ?>
 <?php echo $_form["text"]->getControl()->addAttributes(array('size' => 20)) ?>

    </div>
    <div class="pair">
        <?php if ($_label = $_form["price"]->getLabel()) echo $_label->addAttributes(array()) ?>
 <?php echo $_form["price"]->getControl()->addAttributes(array('size' => 20)) ?>

    </div>
    <?php echo $_form["create"]->getControl()->addAttributes(array()) ?>

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
?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 