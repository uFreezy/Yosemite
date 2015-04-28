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

    //CHANGE CSS
    function changeCSS(cssFile, cssLinkIndex) {

        var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);

        var newlink = document.createElement("link");
        newlink.setAttribute("rel", "stylesheet");
        newlink.setAttribute("type", "text/css");
        newlink.setAttribute("href", cssFile);

        document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
    }

    $('#theme-choose').change(function() {
        var element = $('#theme-choose');

        if (element.val() == 'dark') {
            changeCSS('assets/styles/dark.css', 0);
        } else if (element.val() == 'white') {
            changeCSS('assets/styles/white.css', 0);
        } else {
            changeCSS('assets/styles/main.css', 0);
        }
    })
});