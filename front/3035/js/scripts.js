function openTab(evt, tabName) {
    // Hide all tab content
    var tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(function (tabContent) {
        tabContent.classList.remove('active');
    });

    // Remove active class from all buttons
    var tabButtons = document.querySelectorAll('.tab button');
    tabButtons.forEach(function (tabButton) {
        tabButton.classList.remove('active');
    });

    // Show the current tab
    document.getElementById(tabName).classList.add('active');

    // Add active class to the button that opened the tab
    evt.currentTarget.classList.add('active');
}
