<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-{$icon}"></i>
        {if $counter !== null}<span class="label label-{if $counter_type == 'ok'}success{elseif $counter_type == 'warning'}warning{elseif $counter_type == 'error'}danger{/if}">{$counter}</span>{/if}
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