<div class="row small-boxes">
{foreach $smallBoxes as $row => $smallBoxesRow}
    {assign $size = $boxSizesPerRows[$row]}
    {foreach $smallBoxesRow as $bCount => $boxId}
        <div class="{if $size == 1}col-lg-1 col-md-2 col-sm-4 col-xs-6{elseif $size == 2}col-lg-2 col-md-3 col-sm-4 col-xs-6 {elseif $size == 3}col-md-3 col-sm-6 col-xs-12{elseif $size == 4}col-md-4 col-sm-6 col-xs-12{elseif $size == 6}col-md-6 col-xs-12{else}col-md-{$size}{/if}">
            {dashboard_box $boxId}
        </div>
    {/foreach}
    {if $bCount == 5}
        <div class="{if $size == 1}col-lg-1 col-md-2 col-sm-4 col-xs-6{elseif $size == 2}col-lg-2 col-md-3 col-sm-4 col-xs-6 {elseif $size == 3}col-md-3 col-sm-6 col-xs-12{elseif $size == 4}col-md-4 col-sm-6 col-xs-12{elseif $size == 6}col-md-6 col-xs-12{else}col-md-{$size}{/if}"></div>
    {/if}
{/foreach}
</div>