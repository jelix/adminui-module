<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-{$icon}-o"></i>
        {if $counter !== null}<span class="label label-{if $counter_type == 'ok'}success{elseif $counter_type == 'warning'}warning{elseif $counter_type == 'error'}danger{/if}">{$counter}</span>{/if}
    </a>
    <ul class="dropdown-menu">
        {if $header}<li class="header">{$header}</li>{/if}
        <li>
            {$content}
        </li>
        {if $footerLink}<li class="footer"><a href="{$footerLink->getUrl()}">{$footerLink->getLabel()}</a></li>
        {elseif $footer}<li class="footer">{$footer}</li>
        {/if}
    </ul>
</li>