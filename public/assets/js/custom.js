$(function () {
    "use strict";

    $(".preloader").fadeOut();
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").on('click', function () {
        $("#main-wrapper").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function () {
        $(".app-search").toggle(200);
    });

    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body, .page-wrapper").trigger("resize");
    $(".page-wrapper").delay(20).show();

    //****************************
    /* This is for the mini-sidebar if width is less then 1170*/
    //**************************** 
    var setsidebartype = function () {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        if (width < 1170) {
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
        } else {
            $("#main-wrapper").attr("data-sidebartype", "full");
        }
    };
    $(window).ready(setsidebartype);
    $(window).on("resize", setsidebartype);

});

function openModal(id = '', firstName = '', lastName = '', username = '') {
    // Set form values
    document.getElementById('userId').value = id;
    document.getElementById('siswaName').value = firstName;
    document.getElementById('lastName').value = lastName;
    document.getElementById('username').value = username;

    // Update modal title
    document.getElementById('userModalLabel').innerText = id ? 'Edit User' : 'Add New User';

    // Show modal
    new bootstrap.Modal(document.getElementById('userModal')).show();
}

document.getElementById('selectAll').addEventListener('click', function() {
    const checkboxes = document.querySelectorAll('.checkbox-item');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

// Select all checkboxes when the "selectAll" checkbox is clicked
document.getElementById('selectAll').addEventListener('click', function () {
    const checkboxes = document.querySelectorAll('.checkbox-item');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

// Function to open the modal and show selected questions
document.getElementById('openModal').addEventListener('click', function () {
    const selectedCheckboxes = document.querySelectorAll('.checkbox-item:checked');
    const selectedList = document.getElementById('selectedQuestionsList');
    const noSelectionMessage = document.getElementById('noSelectionMessage');
    
    // Clear previous list
    selectedList.innerHTML = '';

    // If there are no selected checkboxes, show the "no selection" message
    if (selectedCheckboxes.length === 0) {
        noSelectionMessage.style.display = 'block';
    } else {
        noSelectionMessage.style.display = 'none';
        // Loop through selected checkboxes and display each ID in the list
        selectedCheckboxes.forEach(checkbox => {
            const listItem = document.createElement('li');
            listItem.textContent = 'ID Pertanyaan: ' + checkbox.getAttribute('data-id');
            selectedList.appendChild(listItem);
        });
    }
});
