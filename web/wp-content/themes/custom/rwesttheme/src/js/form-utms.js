function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}
function eraseCookie(name) {
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}


/**
 * Get URL Parameter
 *
 * @param {str} sParam
 * @returns param value on true / false
 */
function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return;
};


/**
 * Store UTM Parameters
 *
 * @description on page load, check if there are any UTM parameters.
 *  If there are, collect them and store them in a cookie.
 *
 */
function saveUTMParameters() {
    let parameters = false;
    let utm_source = getUrlParameter('utm_source');
    let utm_medium = getUrlParameter('utm_medium');
    let utm_campaign = getUrlParameter('utm_campaign');
    let utm_content = getUrlParameter('utm_content');

    if (utm_source || utm_medium || utm_campaign || utm_content) {
        parameters = {
            utm_source: utm_source,
            utm_medium: utm_medium,
            utm_campaign: utm_campaign,
            utm_content: utm_content
        };
    }

    if (parameters != false) {
        setCookie('utm_parameters', JSON.stringify(parameters), 0.15); // store cookie for < 4 hours
    }

}

/**
 * Add UTMs to Forms
 *
 * @description if there are UTMS stored in a cookie, add them to any
 *  forms that are on the current page.
 *
 */
function updateFormUTMs() {

    let x = JSON.parse(getCookie('utm_parameters'));

    // If the cookie exists, update form values
    if (x) {
        jQuery('.gform_body .gfield.utm_source input').val(x.utm_source);
        jQuery('.gform_body .gfield.utm_medium input').val(x.utm_medium);
        jQuery('.gform_body .gfield.utm_campaign input').val(x.utm_campaign);
        jQuery('.gform_body .gfield.utm_content input').val(x.utm_content);
    }

}



jQuery(document).ready(function () {
    saveUTMParameters(); // Create/Update cookie with UTM data
    updateFormUTMs();
});