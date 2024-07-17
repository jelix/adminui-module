
function showToastMessage(title, message, cssClass)
{
    $(document).Toasts('create', {
        class: cssClass,
        //title: title,
        body: message,
        autohide: true,
        delay: 5000,
        position: 'topRight',
    })
}


$(document).ready(function () {


        let messages = document.querySelectorAll('.jelix-toast-msg li');
        let timeout = 500;
        if (messages && messages.length) {
            for (let item of messages) {
                window.setTimeout(function() {
                    showToastMessage(item.dataset.title, item.innerHTML, item.getAttribute('class'))
                }, timeout);
                timeout += 500;
            }
        }
});
