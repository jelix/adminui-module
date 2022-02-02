{if $isAuthenticated}
<li class="nav-item  dropdown user user-menu">
    <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false">
        {if $photoUrl}<img src="{$photoUrl}" class="user-image" alt="{$username|eschtml}">
        {else}
            <i class="far fa-user"></i>
        {/if}
        <span class="hidden-xs">{$username|eschtml}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-item user-header">
            {if $photoUrl}<img src="{$photoUrl}" class="img-circle" alt="{$username|eschtml}">{/if}
            <p>
                {$username|eschtml}
            </p>
        </div>
        <div class="dropdown-divider"></div>
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

                {foreach $links as $link}
                    <a href="{$link->getUrl()}"  {if $link->toNewWindow()} target="_blank"{/if} class="dropdown-item">
                        {$link->getLabel()}
                    </a>

                {/foreach}
        <div class="dropdown-divider"></div>
        <div class="dropdown-item user-footer">
            <div class="pull-left">
                {if $profileLink}<a href="{$profileLink}" class="btn btn-default btn-flat">{@adminui~ui.header.account.profile@}</a>{/if}
            </div>
            <div class="pull-right">
                {if $signOutLink}<a href="{$signOutLink}" class="btn btn-default btn-flat">{@adminui~ui.header.account.signout@}</a>{/if}
            </div>
        </div>
    </div>
</li>
{else}
<li class="">
    <a href="{$signInLink}" title="{$label|eschtml}">
        <i class="fa fa-{$icon}"></i>
    </a>
</li>
{/if}