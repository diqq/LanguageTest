// DataTables
new DataTable("#reporting", {
    layout: {
        top1Start: {
            buttons: ["excel", "pdf", "print"],
        },
    },
});

$(document).ready(function () {
    $("#myTable").DataTable();
});

// Create Story Local Storage
function storyLocalStorage() {
    var selectedType = document.getElementById("storyType").value;
    localStorage.setItem("storyType", selectedType);
}

// Create Question Local Storage
function questionLocalStorage() {
    var selectedType = document.getElementById("questionType").value;
    localStorage.setItem("questionType", selectedType);
}
