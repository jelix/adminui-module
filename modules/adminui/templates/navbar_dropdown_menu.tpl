{assign $badgeclass=array(
'primary'=>'badge-primary',
'secondary'=>'badge-default',
'success'=>'badge-success',
'danger'=>'badge-danger',
'warning'=>'badge-warning',
'info'=>'badge-info',)}

<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" title="{$label|eschtml}">
        <i class="fa fa-{$icon}"></i>
        {foreach $badgePills as $badge}
            <small class="badge navbar-badge {$badgeclass[$badge['type']]}">{$badge['label']|eschtml}</small>
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
                <li><a href="{$link->getUrl()}" {if $link->toNewWindow()}target="_blank"{/if}>
                    {if $link->getSenderImage()}<div class="pull-left">
                        <img src="{$link->getSenderImage()}" class="img-circle" alt="{$link->getSenderName()|eschtml}">
                    </div>{/if}
                    <h4>{$link->getSenderName()|eschtml}
                        <small><i class="fa fa-clock-o"></i> {$link->getDate()|jdatetime}</small>
                    </h4>
                    <p>{$link->getSubject()|eschtml}</p>
                </a></li>
            {elseif get_class($link) == "Jelix\AdminUI\NavBar\NotificationItem"}
                <a href="{$link->getUrl()}" class="dropdown-item">
                    <i class="fas fa-{$link->getIcon()} mr-2"></i> {$link->getLabel()}
                    <span class="float-right text-muted text-sm">{$link->getDate()}</span>
                </a>
            {else}
                {$link}
            {/if}
            <div class="dropdown-divider"></div>
        {/foreach}

        {if $footerLink}<li class="footer">{$footerLink}</a></li>
        {elseif $footer}<li class="footer">{$footer}</li>
        {/if}
    </div>
</li>