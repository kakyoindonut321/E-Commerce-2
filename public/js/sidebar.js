function Toggle() {
    var sidebar = document.getElementById("sidebar");

    if (sidebar.className.match(/(?:^|\s)d-flex(?!\S)/)) {
        sidebar.className = sidebar.className.replace(/(?:^|\s)d-flex(?!\S)/g, 'd-none');

    } else if (sidebar.className.match(/(?:^|\s)d-none(?!\S)/)) {
        sidebar.className = sidebar.className.replace(/(?:^|\s)d-none(?!\S)/g, 'd-flex');

    }

}