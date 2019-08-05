{assign $badgeclass=array('primary'=>'label-primary','secondary'=>'label-default','success'=>'label-success','danger'=>'label-danger','warning'=>'label-warning','info'=>'label-info',)}
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="{$label|eschtml}">
        <i class="fa fa-{$icon}"></i>
        {foreach $badgePills as $badge}
            <small class="label {$badgeclass[$badge['type']]}">{$badge['label']|eschtml}</small>
        {/foreach}

    </a>
    <ul class="dropdown-menu">
        {if $header}<li class="header">{$header}</li>{/if}
        <li>
            {$content}
        </li>
        {if $footerLink}<li class="footer">{$footerLink}</li>
        {elseif $footer}<li class="footer">{$footer}</li>
        {/if}
    </ul>
</li>