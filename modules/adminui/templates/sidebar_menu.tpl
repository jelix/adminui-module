
{if $sidebar->isSearchFormMenuEnabled()}
<!-- SidebarSearch Form -->
<div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
    </div>
</div>
{/if}

{assign $badgeclass=array(
'primary'=>'badge-primary',
'secondary'=>'badge-default',
'success'=>'badge-success',
'danger'=>'badge-danger',
'warning'=>'badge-warning',
'info'=>'badge-info',)}

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column {$sidebar->navCssClass()}" data-widget="treeview" role="menu" data-accordion="false">

    {foreach $sidebar->getMenuItems() as $item}
        {if $item->getType() == 'submenu' && $item->hasChildren()}
            <li class="nav-header">{$item->getLabel()}</li>
            {fetchtpl 'adminui~sidebar_submenu', array('menuitems'=>$item->getChildren()) }
        {elseif $item->getType() == 'url'}
            <li class="nav-item">
                <a href="{$item->getUrl()}"  class="nav-link{if $item->isActive()} active{/if}">
                    {if $item->getIcon()}<i class="nav-icon fas fa-{$item->getIcon()}"></i>
                    {else}<i class="nav-icon fas fa-circle"></i>{/if}
                    <p>{$item->getLabel()|eschtml}
                   {foreach $item->getBadgePills() as $badge}
                       <span class="right badge {$badgeclass[$badge['type']]}">{$badge['label']|eschtml}</span>
                   {/foreach}
                    </p>
                </a>
            </li>
        {elseif $item->getType() == 'html'}
            <li class="nav-item">{$item->getHtml()}</li>
        {/if}
    {/foreach}
    </ul>
</nav>
<!-- /.sidebar-menu -->