{assign $badgeclass=array(
'primary'=>'badge-primary',
'secondary'=>'badge-default',
'success'=>'badge-success',
'danger'=>'badge-danger',
'warning'=>'badge-warning',
'info'=>'badge-info',)}
<li class="nav-item dropdown">
    <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false" title="{$label|eschtml}">
        <i class="far fa-{$icon}"></i>
        {foreach $badgePills as $badge}
            <span class="badge navbar-badge {$badgeclass[$badge['type']]}">{$badge['label']|eschtml}</span>
        {/foreach}

    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        {if $header}<span class="dropdown-item dropdown-header">{$header}</span>
            <div class="dropdown-divider"></div>
        {/if}
        <div class="dropdown-item">
            {$content}
        </div>
        {$footer}
    </div>
</li>