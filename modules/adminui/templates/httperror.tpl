<div class="error-page">
    <h2 class="headline {$classText}">{$httpCode}</h2>
    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle {$classText}"></i> {$httpMessage|eschtml}.</h3>

        <p>
            {$httpErrorDetails|eschtml}
            {@adminui~ui.http.error.dashboard.access@} <a href="{jurl 'adminui~default:index'}">{@adminui~ui.http.error.dashboard.access.link.label@}</a>
            {@adminui~ui.http.error.dashboard.access2@}.
        </p>

    </div>
</div>