{meta_html assets 'adminlte'}
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            {foreach $navbar->getLeftItems() as $items}
                {$items}
            {/foreach}
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            {foreach $navbar->getItems() as $items}
                {$items}
            {/foreach}
            {if $navbar->showFullScreenMode()}
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            {/if}
            {if $controlSidebar->hasPanels()}
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
            {/if}
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            {$appHtmlLogoMini}
            <span class="brand-text font-weight-light">{$appHtmlLogo}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            {include 'adminui~sidebar_menu'}
        </div>
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
        {$footer}
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
