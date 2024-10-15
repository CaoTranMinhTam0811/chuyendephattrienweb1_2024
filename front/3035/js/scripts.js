function openTab(evt, tabName) {

    var tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(function (tabContent) {
        tabContent.classList.remove('active');
    });

    var tabButtons = document.querySelectorAll('.tab button');
    tabButtons.forEach(function (tabButton) {
        tabButton.classList.remove('active');
    });

    document.getElementById(tabName).classList.add('active');

    evt.currentTarget.classList.add('active');
}
