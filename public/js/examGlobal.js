// Dark Toggle
const darkModeToggle = document.getElementById("examDarkMode");
const toggleIcons = document.querySelectorAll(".toggle-icon");
const html = document.querySelector("html");

function setDarkModePreference(isDarkMode) {
    localStorage.setItem("darkModePreference", isDarkMode);
}

function toggleDarkMode() {
    html.classList.toggle("dark");
    toggleIcons.forEach((icon) => icon.classList.toggle("hidden"));
    const isDarkMode = html.classList.contains("dark");
    setDarkModePreference(isDarkMode);
}

const savedDarkModePreference = localStorage.getItem("darkModePreference");
if (savedDarkModePreference === "true") {
    html.classList.add("dark");
    toggleIcons.forEach((icon) => icon.classList.toggle("hidden"));
}

darkModeToggle.addEventListener("click", toggleDarkMode);
