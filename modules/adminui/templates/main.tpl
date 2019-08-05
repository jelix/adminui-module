{meta_html assets 'adminlte'}

<div class="wrapper">

    <header class="main-header">
        <a href="/" class="logo">
            <span class="logo-mini">{$appHtmlLogoMini}</span>
            <span class="logo-lg">{$appHtmlLogo}</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    {foreach $navbar->getItems() as $items}
                        {$items}
                    {/foreach}
                    {if $controlSidebar->hasPanels()}
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                    {/if}
                </ul>
            </div>
        </nav>
    </header>


    <aside class="main-sidebar">
        <section class="sidebar">
            {include 'adminui~sidebar_menu'}

        </section>
    </aside>


    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {$page_title|eschtml}
                {if $sub_page_title}<small>{$sub_page_title|eschtml}</small>{/if}
            </h1>
            {if $breadcrumb}
            <ol class="breadcrumb">
                {foreach $breadcrumb as $item}
                <li><a href="{$item['url']}">{if isset($item['icon-class'])}<i class="fa fa-dashboard"></i>{/if} {$item['label']}</a></li>
                {/foreach}
                <li class="active">{$page_title|eschtml}</li>
            </ol>
            {/if}
        </section>

        <section class="content">
        {$MAIN}

        </section>
    </div>

    <footer class="main-footer text-center">
        <div class="pull-right hidden-xs">
             <a href="https://adminlte.io">AdminLTE</a> Theme
        </div>
        {if $appHtmlCopyright}
        <div class="pull-left hidden-xs">
            {$appHtmlCopyright}
        </div>
        {/if}
        {if $appVersion}
            <b>Version</b> {$appVersion|eschtml}
        {/if}
    </footer>
    {if $controlSidebar->hasPanels()}
    <aside class="control-sidebar control-sidebar-dark">
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            {foreach $controlSidebar->getPanels() as $panel}
                <li><a href="#control-sidebar-{$panel->getId()}-tab" data-toggle="tab" title="{$panel->getLabel()|eschtml}">
                        {if $panel->getIcon()}<i class="fa fa-{$panel->getIcon()}"></i>{else}{$panel->getLabel()|eschtml}{/if}</a></li>
            {/foreach}
        </ul>
        <div class="tab-content">
            {foreach $controlSidebar->getPanels() as $panel}
            <div class="tab-pane" id="control-sidebar-{$panel->getId()}-tab">
                {$panel->getContent()}
            </div>
            {/foreach}
        </div>
    </aside>
    {* Add the sidebar's background. This div must be placed
         immediately after the control sidebar *}
    <div class="control-sidebar-bg"></div>
    {/if}
</div>
