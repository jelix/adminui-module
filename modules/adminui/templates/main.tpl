{meta_html assets 'adminlte'}
<div class="wrapper">
      <!-- Preloader -->
    {if $showPreloader}
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{$urlAdminLteAssets}dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
    {/if}

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand {$navbar->cssClass()}">
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
    <aside class="main-sidebar {$sidebar->cssClass()} elevation-4">
        <!-- Brand Logo -->
        <a href="{$j_basepath}" class="brand-link {$brandClass}">
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
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            {$page_title|eschtml}

                        </h1>
                        {if $sub_page_title}<small>{$sub_page_title|eschtml}</small>{/if}
                    </div>
                    <div class="col-sm-6">
                        {if $breadcrumb}
                        <ol class="breadcrumb float-sm-right">
                            {foreach $breadcrumb as $item}
                            <li class="breadcrumb-item"><a href="{$item['url']}">{if isset($item['icon-class'])}<i class="fa fa-dashboard"></i>{/if} {$item['label']}</a></li>
                            {/foreach}
                            <li class="breadcrumb-item active">{$page_title|eschtml}</li>
                        </ol>
                        {/if}
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
        {$MAIN}
            </div>
        </section>
    </div>

    <footer class="main-footer text-center {$footer->cssClass()}">
        {$footer}
    </footer>
    {if $controlSidebar->hasPanels()}
    <aside class="control-sidebar control-sidebar-dark">
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            {foreach $controlSidebar->getPanels() as $k => $panel}
                <li class="nav-item">
                    <a href="#control-sidebar-{$panel->getId()}-tab" title="{$panel->getLabel()|eschtml}"
                    class="nav-link {if $k==0}active{/if}" data-toggle="pill" role="tab"
                       aria-controls="control-sidebar-{$panel->getId()}-tab" {if $k==0}aria-selected="true"{/if}
                    >
                        {if $panel->getIcon()}<i class="fa fa-{$panel->getIcon()}"></i>{else}{$panel->getLabel()|eschtml}{/if}</a></li>
            {/foreach}
        </ul>
        <div class="tab-content">
            {foreach $controlSidebar->getPanels() as $k=>$panel}
            <div class="tab-pane {if $k==0}show active{/if}" id="control-sidebar-{$panel->getId()}-tab"
                role="tabpanel" aria-labelledby="control-sidebar-{$panel->getId()}-tab"
            >
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
