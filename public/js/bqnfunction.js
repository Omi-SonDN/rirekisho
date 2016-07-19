/* thông báo 3s*/
$("div.alert, span.help-block").delay(3000).slideUp();

// xac nhan co xoa
function xacnhanxoa(msg) {
    if (window.confirm(msg)) {
        return true;
    }
    return false;
}