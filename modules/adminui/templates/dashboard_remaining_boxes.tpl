<div class="row">

    {if count($rightBoxes)}
        <section class="col-md-6">
            {foreach $leftBoxes as $id => $box}
                {dashboard_box $id}
            {/foreach}
        </section>
        <section class="col-md-6">
            {foreach $rightBoxes as $id => $box}
                {dashboard_box $id}
            {/foreach}
        </section>
    {else}
        <section class="col-md-12">
            {foreach $leftBoxes as $id => $box}
                {dashboard_box $id}
            {/foreach}
        </section>
    {/if}

</div>