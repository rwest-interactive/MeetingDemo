/**
 * Wait For Element
 *
 * @desc Wait for an element to exist, then do something
 *
 */
var waitForEl = function(selector, callback) {
	if ( jQuery(selector).length ) {
		callback();
	} else {
		setTimeout(function() {
			waitForEl(selector, callback);
		}, 100);
	}
};

/**
 * Set Cookie
 *
 * @desc Set/Create a cookie
 *
 * @param cookieName (string) The name of the of cookie
 * @param value (string) The value of the of cookie
 * @param days (int) Number of days the cookie should be stored for
 *
 */
 function rwestSetCookie( cookieName, value, days ) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = cookieName + "=" + (value || "")  + expires + "; path=/";
}

/**
 * Get/Fetch Cookie
 *
 * @desc Get/Fetch a cookie by name
 *
 * @param cookieName (string) The name of the cookie to get
 *
 * @return Cookie value on success / Null on fail
 *
 */
function rwestGetCookie( cookieName ) {
    var nameEQ = cookieName + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

/**
 * Erase Cookie
 *
 * @desc Erase / Remove a cookie
 *
 * @param cookieName (string) The name of the cookie to remove
 *
 */
function rwestEraseCookie( cookieName ) {
    document.cookie = cookieName +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
