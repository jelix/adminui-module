<div class="float-right hidden-xs">
    <a href="https://adminlte.io">AdminLTE</a> Theme
</div>
{if $appHtmlCopyright}
    <div class="float-left hidden-xs">
        {$appHtmlCopyright}
    </div>
{/if}
{if $appVersion}
    <div class="d-none d-sm-inline-block">
        <b>Version</b> {$appVersion|eschtml}
    </div>
{/if}
