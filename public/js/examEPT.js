// Fetch EPT Answer
$.ajax({
    url: "/fetch/exam/ept/answer",
    method: "GET",
    dataType: "json",
    success: function (data) {
        data.forEach(function (item) {
            var questionNav = $("#questionNav-" + item.question_id);
            var finishQuestionNav = $("#finishQuestionNav-" + item.question_id);

            $("#ept-answer-" + item.question_id + "-" + item.answer).prop(
                "checked",
                true
            );

            if (questionNav.length > 0 && item.answer) {
                questionNav
                    .removeClass(
                        "w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                    )
                    .addClass(
                        "w-10 h-10 text-sm text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                    );
            }

            if (finishQuestionNav.length > 0 && item.answer) {
                finishQuestionNav
                    .removeClass(
                        "w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                    )
                    .addClass(
                        "w-10 h-10 text-sm text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                    );
            }
        });
    },
    error: function (error) {
        console.error("Error fetching data:", error);
    },
});

// Post EPT Answer
function submitAnswer(questionId, answer) {
    $.ajax({
        url: "/post/exam/ept/answer",
        type: "POST",
        data: {
            question_id: questionId,
            answer: answer,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        },
    });
}

// Audio Question Toggle
$.ajax({
    url: "/fetch/exam/ept/question/audio",
    method: "GET",
    dataType: "json",
    success: function (data) {
        data.disabledButton.forEach(function (item) {
            $("#playQuestionAudio-" + item.question_id).prop("disabled", true);
            $("#playQuestionAudio-" + item.question_id)
                .removeClass(
                    "bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                )
                .addClass(
                    "bg-gray-400 disabled:cursor-not-allowed focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-sm p-2.5 text-center items-center me-2 dark:bg-gray-600 dark:focus:ring-gray-800"
                );
        });

        data.questionList.forEach(function (item) {
            const playQuestionAudio = document.getElementById(
                "playQuestionAudio-" + item.id
            );
            const pauseQuestionButton = document.getElementById(
                "pauseQuestionButton-" + item.id
            );
            const audioQuestionSource = document.getElementById(
                "audioQuestionSource-" + item.id
            );

            playQuestionAudio.addEventListener("click", function () {
                playQuestionAudio.classList.add("hidden");
                pauseQuestionButton.classList.remove("hidden");
                pauseQuestionButton.classList.add("inline-flex");
                audioQuestionSource.play();
            });

            audioQuestionSource.addEventListener("ended", function () {
                pauseQuestionButton.classList.add("hidden");
                pauseQuestionButton.classList.remove("inline-flex");
                playQuestionAudio.disabled = true;
                playQuestionAudio.classList.remove(
                    "hidden",
                    "bg-blue-700",
                    "hover:bg-blue-800",
                    "focus:ring-4",
                    "focus:outline-none",
                    "focus:ring-blue-300",
                    "font-medium",
                    "rounded-full",
                    "text-sm",
                    "p-2.5",
                    "text-center",
                    "inline-flex",
                    "items-center",
                    "me-2",
                    "dark:bg-blue-600",
                    "dark:hover:bg-blue-700",
                    "dark:focus:ring-blue-800"
                );
                playQuestionAudio.classList.add(
                    "bg-gray-400",
                    "disabled:cursor-not-allowed",
                    "focus:ring-4",
                    "focus:outline-none",
                    "focus:ring-gray-300",
                    "font-medium",
                    "rounded-full",
                    "text-sm",
                    "p-2.5",
                    "text-center",
                    "items-center",
                    "me-2",
                    "dark:bg-gray-600",
                    "dark:focus:ring-gray-800"
                );
            });
        });
    },
    error: function (error) {
        console.error("Error fetching data:", error);
    },
});

function submitQuestionAudio(questionId, status) {
    $.ajax({
        url: "/post/exam/ept/question/audio",
        type: "POST",
        data: {
            question_id: questionId,
            status: status,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        },
    });
}

// Audio Story Toggle
$.ajax({
    url: "/fetch/exam/ept/story/audio",
    method: "GET",
    dataType: "json",
    success: function (data) {
        data.disabledButton.forEach(function (item) {
            $("#playStoryAudio-" + item.story_id).prop("disabled", true);
            $("#playStoryAudio-" + item.story_id)
                .removeClass(
                    "bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                )
                .addClass(
                    "bg-gray-400 disabled:cursor-not-allowed focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-sm p-2.5 text-center items-center me-2 dark:bg-gray-600 dark:focus:ring-gray-800"
                );
        });

        data.storyList.forEach(function (item) {
            const playStoryAudio = document.getElementById(
                "playStoryAudio-" + item.id
            );
            const pauseStoryButton = document.getElementById(
                "pauseStoryButton-" + item.id
            );
            const audioStorySource = document.getElementById(
                "audioStorySource-" + item.id
            );

            playStoryAudio.addEventListener("click", function () {
                playStoryAudio.classList.add("hidden");
                pauseStoryButton.classList.remove("hidden");
                pauseStoryButton.classList.add("inline-flex");
                audioStorySource.play();
            });

            audioStorySource.addEventListener("ended", function () {
                pauseStoryButton.classList.add("hidden");
                pauseStoryButton.classList.remove("inline-flex");
                playStoryAudio.disabled = true;
                playStoryAudio.classList.remove(
                    "hidden",
                    "bg-blue-700",
                    "hover:bg-blue-800",
                    "focus:ring-4",
                    "focus:outline-none",
                    "focus:ring-blue-300",
                    "font-medium",
                    "rounded-full",
                    "text-sm",
                    "p-2.5",
                    "text-center",
                    "inline-flex",
                    "items-center",
                    "me-2",
                    "dark:bg-blue-600",
                    "dark:hover:bg-blue-700",
                    "dark:focus:ring-blue-800"
                );
                playStoryAudio.classList.add(
                    "bg-gray-400",
                    "disabled:cursor-not-allowed",
                    "focus:ring-4",
                    "focus:outline-none",
                    "focus:ring-gray-300",
                    "font-medium",
                    "rounded-full",
                    "text-sm",
                    "p-2.5",
                    "text-center",
                    "items-center",
                    "me-2",
                    "dark:bg-gray-600",
                    "dark:focus:ring-gray-800"
                );
            });
        });
    },
    error: function (error) {
        console.error("Error fetching data:", error);
    },
});

function submitStoryAudio(questionId, status) {
    $.ajax({
        url: "/post/exam/ept/story/audio",
        type: "POST",
        data: {
            story_id: questionId,
            status: status,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        },
    });
}

// Question Navigation Update
function updateQuestionNav() {
    $.ajax({
        url: "/fetch/exam/ept/answer",
        method: "GET",
        dataType: "json",
        success: function (data) {
            data.forEach(function (item) {
                var questionNav = $("#questionNav-" + item.question_id);
                var finishQuestionNav = $(
                    "#finishQuestionNav-" + item.question_id
                );

                if (questionNav.length > 0 && item.answer) {
                    questionNav
                        .removeClass(
                            "w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                        )
                        .addClass(
                            "w-10 h-10 text-sm text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        );
                }

                if (finishQuestionNav.length > 0 && item.answer) {
                    finishQuestionNav
                        .removeClass(
                            "w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                        )
                        .addClass(
                            "w-10 h-10 text-sm text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        );
                }
            });
        },
        error: function (error) {
            console.error("Error fetching data:", error);
        },
    });
}

function submitAndUpdate(questionId, answer) {
    submitAnswer(questionId, answer);
    updateQuestionNav();
}

function backToListeningPartA() {
    var partA = document.getElementById("eptListeningPartA");
    var partB = document.getElementById("eptListeningPartB");

    partA.classList.remove("hidden");
    partB.classList.add("hidden");

    var topElement = document.getElementById("top");
    if (topElement) {
        topElement.scrollIntoView({ behavior: "smooth" });
    }
}

function nextToListeningPartB() {
    var partA = document.getElementById("eptListeningPartA");
    var partB = document.getElementById("eptListeningPartB");
    var topElement = document.getElementById("top");

    partA.classList.add("hidden");
    partB.classList.remove("hidden");

    if (topElement) {
        topElement.scrollIntoView({ behavior: "smooth" });
    }
}

function nextToListeningPartC() {
    var partB = document.getElementById("eptListeningPartB");
    var partC = document.getElementById("eptListeningPartC");
    var topElement = document.getElementById("top");

    partB.classList.add("hidden");
    partC.classList.remove("hidden");

    if (topElement) {
        topElement.scrollIntoView({ behavior: "smooth" });
    }
}

function backToListeningPartB() {
    var partB = document.getElementById("eptListeningPartB");
    var partC = document.getElementById("eptListeningPartC");
    var topElement = document.getElementById("top");

    partB.classList.remove("hidden");
    partC.classList.add("hidden");

    if (topElement) {
        topElement.scrollIntoView({ behavior: "smooth" });
    }
}

function nextToStructure() {
    var partC = document.getElementById("eptListeningPartC");
    var structure = document.getElementById("eptStructure");
    var topElement = document.getElementById("top");

    partC.classList.add("hidden");
    structure.classList.remove("hidden");

    if (topElement) {
        topElement.scrollIntoView({ behavior: "smooth" });
    }
}

function backToListeningPartC() {
    var structure = document.getElementById("eptStructure");
    var partC = document.getElementById("eptListeningPartC");
    var topElement = document.getElementById("top");

    structure.classList.add("hidden");
    partC.classList.remove("hidden");

    if (topElement) {
        topElement.scrollIntoView({ behavior: "smooth" });
    }
}

function nextToWritten() {
    var written = document.getElementById("eptWritten");
    var structure = document.getElementById("eptStructure");
    var topElement = document.getElementById("top");

    structure.classList.add("hidden");
    written.classList.remove("hidden");

    if (topElement) {
        topElement.scrollIntoView({ behavior: "smooth" });
    }
}

function backToStructure() {
    var written = document.getElementById("eptWritten");
    var structure = document.getElementById("eptStructure");
    var topElement = document.getElementById("top");

    written.classList.add("hidden");
    structure.classList.remove("hidden");

    if (topElement) {
        topElement.scrollIntoView({ behavior: "smooth" });
    }
}

function nextToReading() {
    var written = document.getElementById("eptWritten");
    var reading = document.getElementById("eptReading");
    var topElement = document.getElementById("top");

    written.classList.add("hidden");
    reading.classList.remove("hidden");

    if (topElement) {
        topElement.scrollIntoView({ behavior: "smooth" });
    }
}

function backToWritten() {
    var written = document.getElementById("eptWritten");
    var reading = document.getElementById("eptReading");
    var topElement = document.getElementById("top");

    reading.classList.add("hidden");
    written.classList.remove("hidden");

    if (topElement) {
        topElement.scrollIntoView({ behavior: "smooth" });
    }
}

function nextToFinish() {
    var finish = document.getElementById("eptFinish");
    var reading = document.getElementById("eptReading");
    var eptNav = document.getElementById("eptNav");
    var topElement = document.getElementById("top");

    reading.classList.add("hidden");
    eptNav.classList.add("hidden");
    finish.classList.remove("hidden");

    if (topElement) {
        topElement.scrollIntoView({ behavior: "smooth" });
    }
}

function backToReading() {
    var finish = document.getElementById("eptFinish");
    var reading = document.getElementById("eptReading");
    var eptNav = document.getElementById("eptNav");
    var topElement = document.getElementById("top");

    finish.classList.add("hidden");
    reading.classList.remove("hidden");
    eptNav.classList.remove("hidden");

    if (topElement) {
        topElement.scrollIntoView({ behavior: "smooth" });
    }
}

// Exam Timer
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
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        success: function (response) {
            var startTime = new Date(response.start_time).getTime();
            var duration = response.duration * 1000;
            console.log(response);

            var timer = setInterval(function () {
                var now = new Date().getTime();
                var distance = startTime + duration - now;

                if (distance <= 0) {
                    clearInterval(timer);
                    $("#finish-exam-button").submit();
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

// Check Kick Status
function fetchStatus() {
    $.ajax({
        url: "/fetch/exam/ept/status",
        method: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data.status);
            if (data.status == "kick") {
                $("#finish-ept-modal").show(function () {
                    $(this).find("form").submit();
                });
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}

fetchStatus();

setInterval(fetchStatus, 25000);
