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

    //CLICK LISTENER
    $('#accept-agreements').click(function () {
        $('#agreements').remove();
    });
});