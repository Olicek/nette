<?php //netteCache[01]000393a:2:{s:4:"time";s:21:"0.01725800 1355653598";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:71:"C:\server\www\Bakalarka\Nette\kucera\app\templates\Homepage\about.latte";i:2;i:1355653591;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: C:\server\www\Bakalarka\Nette\kucera\app\templates\Homepage\about.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '59e6os5sb1')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbd57205ccdf_content')) { function _lbd57205ccdf_content($_l, $_args) { extract($_args)
?><img id="foto" src="<?php echo htmlSpecialChars($basePath) ?>/images/foto.jpg" alt="" />
<div id="contentIn">
    <h1>O nás</h1>
    <p>
        <span><?php echo $date ?></span>
        Firma Kučera – Zámečnictví byla založena v roce 1957 jako rodinný podnik, který se ve své době
        zabýval nejen kovovýrobou, ale fungoval také jako kovárna. Firma měla mnoho učňů a dělala čest
        svému řemeslu. Postupně byla výroba rozšiřována, nicméně plánované otevření zinkovny bylo
        nakonec v roce 1968 přerušeno.
    </p>
    <p>
        Jako všechny soukromé podniky se i naše dílna v roce 1968 ocitla pod správou komunálu. Stroje
        byly znárodněny, plány zničeny a rozvoj se zastavil na dalších dvacet let. V roce 1991 se podařilo
        vrátit firmu do původních kolejí, tedy do soukromých rukou rodiny Kučerových. Bohužel, s poměrně
        velkým handicapem v podobě zabavených strojů, které firma musela od státu odkoupit. Naštěstí naše
        kvalitní výrobky brzy vrátily firmě její dobré jméno a nic nebránilo jejímu dalšímu rozvoji.
    </p>
    <p>
        V dnešní době se zabýváme nejen výrobou kovového zboží, ale i expertním otevíráním dveří a
        montáží bezpečnostních systémů. Tradice předávaná z otců na syny se odráží v kvalitním zpracování
        zakázek a v pečlivé odborné montáži našich výrobků.
    </p>
</div>
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
$title = 'O nás' ?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 