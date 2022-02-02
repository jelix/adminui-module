{assign $badgeclass=array(
'primary'=>'badge-primary',
'secondary'=>'badge-default',
'success'=>'badge-success',
'danger'=>'badge-danger',
'warning'=>'badge-warning',
'info'=>'badge-info',)}

<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false" title="{$label|eschtml}">
        <i class="far fa-{$icon}"></i>
        {foreach $badgePills as $badge}
            <span class="badge navbar-badge {$badgeclass[$badge['type']]}">{$badge['label']|eschtml}</span>
        {/foreach}
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        {if $header}<span class="dropdown-item dropdown-header">{$header}</span>
        <div class="dropdown-divider"></div>
        {/if}
        {foreach $links as $link}
            {if is_string($link)}
               {$link}
            {elseif get_class($link) == "Jelix\AdminUI\Link"}
            <a href="{$link->getUrl()}"  {if $link->toNewWindow()} target="_blank"{/if} class="dropdown-item">
                {$link->getLabel()}
            </a>
            {elseif get_class($link) == "Jelix\AdminUI\NavBar\MessageItem"}
                <a href="{$link->getUrl()}" {if $link->toNewWindow()}target="_blank"{/if} class="dropdown-item">
                    <div class="media">
                        {if $link->getSenderImage()}
                            <img src="{$link->getSenderImage()}" class="img-circle img-size-50 mr-3" alt="{$link->getSenderName()|eschtml}">
                        {/if}
                        <div class="media-body">
                           <h3 class="dropdown-item-title">{$link->getSenderName()|eschtml}</h3>
                            <p class="text-sm">{$link->getSubject()|eschtml}</p>
                            <p class="text-sm text-muted">
                                <i class="far fa-clock mr-1"></i> {$link->getDate()|jdatetime}
                            </p>
                        </div>
                    </div>
                </a>
            {elseif get_class($link) == "Jelix\AdminUI\NavBar\NotificationItem"}
                <a href="{$link->getUrl()}" class="dropdown-item">
                    <i class="fas fa-{$link->getIcon()} mr-2"></i>
                    {$link->getLabel()}
                    <span class="float-right text-muted text-sm">{$link->getDate()|jdatetime}</span>
                </a>
            {else}
                {$link}
            {/if}
            <div class="dropdown-divider"></div>
        {/foreach}

        {$footer}
    </div>
</li>