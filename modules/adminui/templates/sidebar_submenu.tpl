{assign $badgeclass=array(
'primary'=>'badge-primary',
'secondary'=>'badge-default',
'success'=>'badge-success',
'danger'=>'badge-danger',
'warning'=>'badge-warning',
'info'=>'badge-info',)}

{foreach $menuitems as $item}
    {if $item->getType() == 'submenu' && $item->hasChildren()}
<li class="nav-item">
    <a href="#" class="nav-link{if $item->isActive()} active{/if}">
        {if $item->getIcon()}<i class="nav-icon fas fa-{$item->getIcon()}"></i>
        {else}<i class="nav-icon fas fa-circle"></i>{/if}
        <p>{$item->getLabel()}
              <i class="right fas fa-angle-left"></i>
                {foreach $item->getBadgePills() as $badge}
                    <span class="label pull-right {$badgeclass[$badge['type']]}">{$badge['label']|eschtml}</span>
                {/foreach}
        </p>
    </a>
    <ul class="nav nav-treeview">
        {fetchtpl 'adminui~sidebar_submenu', array('menuitems'=>$item->getChildren()) }
    </ul>
</li>
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