<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    {foreach $sidebar->getMenuItems() as $item}
        {if $item->getType() == 'submenu' && $item->hasChildren()}
            <li class="header">{$item->getLabel()}</li>
            {fetchtpl 'adminui~sidebar_submenu', array('menuitems'=>$item->getChildren()) }
        {elseif $item->getType() == 'url'}
            <li {if $item->isActive()}class="active"{/if}>
                <a href="{$item->getUrl()}">
                    {if $item->getIcon()}<i class="fa fa-{$item->getIcon()}"></i>{/if} <span>{$item->getLabel()}</span>
                </a>
            </li>
        {elseif $item->getType() == 'html'}
            <li>{$item->getHtml()}</li>
        {/if}
    {/foreach}
</ul>