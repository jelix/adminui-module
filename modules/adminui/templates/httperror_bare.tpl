<div class="error-page">
    <h2 class="headline {$classText}">{$httpCode}</h2>
    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle {$classText}"></i> {$httpMessage|eschtml}.</h3>

        <p>
            {$httpErrorDetails|eschtml}
        </p>

    </div>
</div>