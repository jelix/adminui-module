<div class="pull-right hidden-xs">
    <a href="https://adminlte.io">AdminLTE</a> Theme
</div>
{if $appHtmlCopyright}
    <div class="pull-left hidden-xs">
        {$appHtmlCopyright}
    </div>
{/if}
{if $appVersion}
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> {$appVersion|eschtml}
    </div>
{/if}
