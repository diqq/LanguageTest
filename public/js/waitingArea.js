// Fetch Button Waiting Area - Enroll
function fetchData() {
    $.ajax({
        url: "/fetch/enroll/start",
        method: "GET",
        dataType: "json",
        success: function (data) {
            var disabledButton = document.getElementById("disabledStart");
            var enabledButton = document.getElementById("enabledStart");

            if (data.status == null || data.status === "end") {
                disabledButton.classList.remove("hidden");
                enabledButton.classList.add("hidden");
            } else {
                disabledButton.classList.add("hidden");
                enabledButton.classList.remove("hidden");
            }
            console.log(data);
        },
        error: function (error) {
            console.error("Error fetching data:", error);
        },
    });
}

fetchData();

setInterval(fetchData, 3000);
