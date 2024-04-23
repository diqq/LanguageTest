// Upload Question Condition
document.addEventListener("DOMContentLoaded", function () {
    var questionType = localStorage.getItem("questionType");
    var selectStory = document.getElementById("select-story");
    var questionInput = document.getElementById("question");
    var questionCase = document.getElementById("question-case");
    var questionHeader = document.getElementById("questionHeader");

    switch (questionType) {
        case "part a":
            questionHeader.innerHTML =
                "EPT Upload Question for Listening Part A";
            break;
        case "part b":
            questionHeader.innerHTML =
                "EPT Upload Question for Listening Part B";
            break;
        case "part c":
            questionHeader.innerHTML =
                "EPT Upload Question for Listening Part C";
            break;
        case "structure":
            questionHeader.innerHTML =
                "EPT Upload Question for Structure Expression";
            break;
        case "written":
            questionHeader.innerHTML =
                "EPT Upload Question for Written Expression";
            break;
        case "reading":
            questionHeader.innerHTML =
                "EPT Upload Question for Reading Comprehension";
            break;
        default:
            break;
    }

    if (["part a", "part b", "part c"].includes(questionType)) {
        questionInput.innerHTML = `
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Audio Question</label>
        <input id="file_input" type="file" name="question" accept="audio/*" required
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        >`;
    } else if (questionType === "structure") {
        questionInput.innerHTML = `
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="text-input">Structure Question</label>
        <input id="text-input" type="text" name="question" placeholder="Enter the question of Structure Expression here" required
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        >`;
    } else if (questionType === "written") {
        questionInput.innerHTML = `
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="text-input">Written Question</label>
        <input id="text-input" type="text" name="question" placeholder="Enter the question of Written Expression here" required
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        >`;
    } else if (questionType === "reading") {
        questionInput.innerHTML = `
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="text-input">Reading Question</label>
        <input id="text-input" type="text" name="question" placeholder="Enter the question of Reading story here" required
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        >`;
    }

    if (questionType === "part b") {
        $.ajax({
            url: "/fetch/ept/story/part b",
            method: "GET",
            dataType: "json",
            success: function (data) {
                var selectStory = document.getElementById("select-story");
                var htmlString = `
                    <label for="select-story" class="mt-5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Story Part B</label>
                    <select id="select-story" name="story_code" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Select Story Part B</option>`;
                if (data.length > 0) {
                    data.forEach(function (select) {
                        if (select.section === "part b") {
                            htmlString += `<option value="${select.code}">${select.story}</option>`;
                        }
                    });
                } else {
                    htmlString += `<option value="">No Story For Part B Has Been Created</option>`;
                }
                htmlString += `</select>`;
                selectStory.innerHTML = htmlString;
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    } else if (questionType === "part c") {
        var section = "part c";
        $.ajax({
            url: "/fetch/ept/story/part c",
            method: "GET",
            dataType: "json",
            success: function (data) {
                var selectStory = document.getElementById("select-story");
                var htmlString = `
                    <label for="select-story" class="mt-5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Story for Part C</label>
                    <select id="select-story" name="story_code" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Select Story</option>`;
                if (data.length > 0) {
                    data.forEach(function (select) {
                        if (select.section === section) {
                            htmlString += `<option value="${select.code}">${select.story}</option>`;
                        }
                    });
                } else {
                    htmlString += `<option value="">No Story For Part C Has Been Created</option>`;
                }
                htmlString += `</select>`;
                selectStory.innerHTML = htmlString;
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    } else if (questionType === "reading") {
        var section = "reading";
        $.ajax({
            url: "/fetch/ept/story/reading",
            method: "GET",
            dataType: "json",
            success: function (data) {
                var selectStory = document.getElementById("select-story");
                var htmlString = `
                    <label for="select-story" class="mt-5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Story for Reading</label>
                    <select id="select-story" name="story_code" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Select Story</option>`;
                if (data.length > 0) {
                    data.forEach(function (select) {
                        if (select.section === section) {
                            htmlString += `<option value="${select.code}">${select.story}</option>`;
                        }
                    });
                } else {
                    htmlString += `<option value="">No Story For Reading Has Been Created</option>`;
                }
                htmlString += `</select>`;
                selectStory.innerHTML = htmlString;
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    } else {
        selectStory.innerHTML = ``;
    }

    if (questionType === "part a") {
        questionCase.innerHTML = `<input type="hidden" value="1" name="questionCase">`;
    } else if (questionType === "part b") {
        questionCase.innerHTML = `<input type="hidden" value="2" name="questionCase">`;
    } else if (questionType === "part c") {
        questionCase.innerHTML = `<input type="hidden" value="3" name="questionCase">`;
    } else if (questionType === "structure") {
        questionCase.innerHTML = `<input type="hidden" value="4" name="questionCase">`;
    } else if (questionType === "written") {
        questionCase.innerHTML = `<input type="hidden" value="5" name="questionCase">`;
    } else if (questionType === "reading") {
        questionCase.innerHTML = `<input type="hidden" value="6" name="questionCase">`;
    }
});
