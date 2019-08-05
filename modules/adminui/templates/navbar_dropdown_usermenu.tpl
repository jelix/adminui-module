{if $isAuthenticated}
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        {if $photoUrl}<img src="{$photoUrl}" class="user-image" alt="{$username|eschtml}">{/if}

        <span class="hidden-xs">{$username|eschtml}</span>
    </a>
    <ul class="dropdown-menu">
        <li class="user-header">
            {if $photoUrl}<img src="{$photoUrl}" class="img-circle" alt="{$username|eschtml}">{/if}
            <p>
                {$username|eschtml}
            </p>
        </li>
        <!--<li class="user-body">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                </div>
            </div>
        </li>-->
        <li>
            <ul class="menu">
                {foreach $links as $link}
                    <li>{$link}</li>
                {/foreach}
            </ul>
        </li>
        <li class="user-footer">
            <div class="pull-left">
                {if $profileLink}<a href="{$profileLink}" class="btn btn-default btn-flat">{@adminui~ui.header.account.profile@}</a>{/if}
            </div>
            <div class="pull-right">
                {if $signOutLink}<a href="{$signOutLink}" class="btn btn-default btn-flat">{@adminui~ui.header.account.signout@}</a>{/if}
            </div>
        </li>
    </ul>
</li>
{else}
<li class="">
    <a href="{$signInLink}" title="{$label|eschtml}">
        <i class="fa fa-{$icon}"></i>
    </a>
</li>
{/if}