{meta_html assets 'adminlte'}

<div class="register-box">

    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{$j_basepath}" class="h1">{$appHtmlLogo}</a>
        </div>
        <div class="card-body">
            {if $boxTitle}<p class="login-box-msg">{$boxTitle}</p>{/if}
            {$MAIN}
        </div>

    </div>

</div>
