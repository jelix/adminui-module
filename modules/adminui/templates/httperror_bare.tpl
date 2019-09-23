<div class="error-page">
    <h2 class="headline text-yellow">{$httpCode}</h2>
    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> {$httpMessage|eschtml}.</h3>

        <p>
            {$httpErrorDetails|eschtml}
        </p>

    </div>
</div>