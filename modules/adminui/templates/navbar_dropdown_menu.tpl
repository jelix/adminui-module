{assign $badgeclass=array('primary'=>'label-primary','secondary'=>'label-default','success'=>'label-success','danger'=>'label-danger','warning'=>'label-warning','info'=>'label-info',)}

<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-{$icon}"></i>
        {foreach $badgePills as $badge}
            <small class="label {$badgeclass[$badge['type']]}">{$badge['label']|eschtml}</small>
        {/foreach}
    </a>
    <ul class="dropdown-menu">
        {if $header}<li class="header">{$header}</li>{/if}
        <li>
            <ul class="menu">
                {foreach $links as $link}
                    <li>{$link}</li>
                {/foreach}
            </ul>
        </li>
        {if $footerLink}<li class="footer">{$footerLink}</a></li>
        {elseif $footer}<li class="footer">{$footer}</li>
        {/if}
    </ul>
</li>