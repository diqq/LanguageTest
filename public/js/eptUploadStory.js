// Upload Story Condition
document.addEventListener("DOMContentLoaded", function () {
    var storyType = localStorage.getItem("storyType");
    var selectSection = document.getElementById("select-section");
    var storyArea = document.getElementById("story-area");

    if (storyType === "audio") {
        storyArea.innerHTML = `
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Audio Story</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="story" accept="audio/*" required>`;
        selectSection.disabled = false;
        selectSection.innerHTML = `
        <option disabled selected>Select section</option>
        <option value="part b">For Listening Part B</option>
        <option value="part c">For Listening Part C</option>`;
    } else if (storyType === "text") {
        storyArea.innerHTML = `
        <label for="reading-story" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reading Story</label>
        <textarea id="reading-story" name="story" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write direction here ..."></textarea>`;
        selectSection.disabled = false;
        selectSection.innerHTML = `<option value="reading" selected>Reading Comprehension</option>`;
    }
});
