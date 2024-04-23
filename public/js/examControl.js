// Exam Timer
function startExam(id, category) {
    $.ajax({
        url: "/post/timer",
        type: "POST",
        data: {
            exam_id: id,
            category: category,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {},
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        },
    });
}

function startTimer() {
    var examId = $("#Exam-Id").val();
    var examCategory = $("#Category").val();

    $.ajax({
        url: "/fetch/timer",
        type: "GET",
        data: {
            id: examId,
            category: examCategory,
        },
        success: function (response) {
            var startTime = new Date(response.start_time).getTime();
            var duration = response.duration * 1000;
            var timer = setInterval(function () {
                var now = new Date().getTime();
                var distance = startTime + duration - now;

                if (distance <= 0) {
                    clearInterval(timer);
                    $("#endButton").submit();
                    console.log("Exam has ended");
                } else {
                    var hours = Math.floor(
                        (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                    );
                    var minutes = Math.floor(
                        (distance % (1000 * 60 * 60)) / (1000 * 60)
                    )
                        .toString()
                        .padStart(2, "0");
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000)
                        .toString()
                        .padStart(2, "0");

                    $("#timerDisplay").text(
                        hours + ":" + minutes + ":" + seconds
                    );
                }
            }, 1000);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        },
    });
}

startTimer();

function postTimer(id, category) {
    startExam(id, category);
}

// Page Refresh
function refreshUser() {
    location.reload();
}
