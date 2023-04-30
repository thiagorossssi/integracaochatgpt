$(document).ready(() => {
    let path = window.location.pathname;
    path = path.split('/');

    switch (path[path.length - 1]) {
        case '':
            $('#app').load('pages/home.html');
        break;
        case 'home':
            $('#app').load('pages/home.html');
        break;
        default:
            $('#app').load('pages/404.html');
    }
});
