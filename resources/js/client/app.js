//Adding active tag in side menu nav items
var CURRENT_URL = window.location.href.split("#")[0];
$(".aside-body")
    .find('a[href="' + CURRENT_URL + '"]')
    .parent("li")
    .addClass("active");
$(".aside-body")
    .find('a[href="' + CURRENT_URL + '"]')
    .parent("li")
    .addClass("active");
$(".aside-body")
    .find('a[href="' + CURRENT_URL + '"]')
    .parents("ul")
    .closest("li")
    .addClass("active show");
