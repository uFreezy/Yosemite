$(document).ready(function () {
    var agreements = $('<div id="agreements"></div>');
    var cookiesLink = '<a href="https://support.mozilla.org/en-US/kb/cookies-information-websites-store-on-your-computer" title="Cookies" target="_blank">Cookies</a>';
    var FAQLink = '<a href="#" title="FAQ" target="_blank">FAQ</a>';
    var acceptBtn = '<a id="accept-agreements" href="#" title="accept agreement">I agree</a>';
    var paragraph = 'This site use &nbsp' + cookiesLink + '&nbsp ' +
        'to store information on your computer.' +
        'Please read our &nbsp' + FAQLink + '&nbsp&nbsp' + ' section.' + acceptBtn;
    agreements.append(paragraph);
    $('#fake-header').append(agreements);

    //CLICK LISTENER AGREEMENTS
    $('#accept-agreements').click(function () {
        $('#agreements').remove();
    });

    //CLICK LISTENER LOGIN
    $('#login-btn').click(function () {
        var formStatus = '<input id="form-status" type="hidden" name="status" value="submitted"/>';
        var loginForm = $('#login-form');
        loginForm.append(formStatus);

        if ($('#form-status').val() === 'submitted') {
            loginForm.submit();
        }
    });

    //MODAL LISTENER
    $("#modal_trigger").leanModal({top : 120, overlay : 0.6, closeButton: ".modal_close" });
});