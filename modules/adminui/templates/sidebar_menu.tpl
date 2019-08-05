
{assign $badgeclass=array('primary'=>'label-primary','secondary'=>'label-default','success'=>'label-success','danger'=>'label-danger','warning'=>'label-warning','info'=>'label-info',)}
<ul class="sidebar-menu" data-widget="tree">
    {foreach $sidebar->getMenuItems() as $item}
        {if $item->getType() == 'submenu' && $item->hasChildren()}
            <li class="header">{$item->getLabel()}</li>
            {fetchtpl 'adminui~sidebar_submenu', array('menuitems'=>$item->getChildren()) }
        {elseif $item->getType() == 'url'}
            <li {if $item->isActive()}class="active"{/if}>
                <a href="{$item->getUrl()}">
                    {if $item->getIcon()}<i class="fa fa-{$item->getIcon()}"></i>{/if} <span>{$item->getLabel()}</span>
                    <span class="pull-right-container">
                   {foreach $item->getBadgePills() as $badge}
                       <small class="label pull-right {$badgeclass[$badge['type']]}">{$badge['label']|eschtml}</small>
                   {/foreach}
                </span>
                </a>
            </li>
        {elseif $item->getType() == 'html'}
            <li>{$item->getHtml()}</li>
        {/if}
    {/foreach}
</ul>