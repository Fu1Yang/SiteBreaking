document.addEventListener("DOMContentLoaded", function() {
    // Vérifiez si le consentement a déjà été donné
    if (!getCookie("cookieConsent")) {
        document.getElementById("cookieBanner").style.display = "block";
    }
});

function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
    let nameEQ = name + "=";
    let ca = document.cookie.split(';');
    for(let i=0;i < ca.length;i++) {
        let c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    document.cookie = name + '=; Max-Age=-99999999;';
}

function acceptCookies() {
    setCookie("cookieConsent", "accepted", 365);
    hideBanner();
}

function rejectCookies() {
    setCookie("cookieConsent", "rejected", 365);
    hideBanner();
}

function customizeCookies() {
    // Implémenter la logique de personnalisation des cookies
    alert("Personnalisation des cookies à implémenter.");
}

function hideBanner() {
    document.getElementById("cookieBanner").style.display = "none";
}
