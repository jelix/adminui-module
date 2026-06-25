<div class="float-end hidden-xs">
    <a href="https://adminlte.io">AdminLTE</a> Theme
</div>
{if $appHtmlCopyright}
    <div class="float-start hidden-xs">
        {$appHtmlCopyright}
    </div>
{/if}
{if $appVersion}
    <div class="d-none d-sm-inline-block">
        <b>Version</b> {$appVersion|eschtml}
    </div>
{/if}
