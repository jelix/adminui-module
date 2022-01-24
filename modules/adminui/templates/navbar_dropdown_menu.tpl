{assign $badgeclass=array('primary'=>'label-primary','secondary'=>'label-default','success'=>'label-success','danger'=>'label-danger','warning'=>'label-warning','info'=>'label-info',)}

<li class="dropdown {$dropdownCssClass}">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="{$label|eschtml}">
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
                    {if is_string($link)}
                        <li>{$link}</li>
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
                    {else}
                        <li>{$link}</li>
                    {/if}
                {/foreach}
            </ul>
        </li>
        {if $footerLink}<li class="footer">{$footerLink}</li>
        {elseif $footer}<li class="footer">{$footer}</li>
        {/if}
    </ul>
</li>