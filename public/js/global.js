// Dark Toggle
const darkModeToggle = document.getElementById("darkModeToggle");
const savedDarkModePreference = localStorage.getItem("darkModePreference");
const html = document.querySelector("html");

function setDarkModePreference(isDarkMode) {
    localStorage.setItem("darkModePreference", isDarkMode);
}

if (savedDarkModePreference === "true") {
    html.classList.add("dark");
    darkModeToggle.checked = true;
}

function toggleDarkMode() {
    html.classList.toggle("dark");
    const isDarkMode = html.classList.contains("dark");
    setDarkModePreference(isDarkMode);
}

darkModeToggle.addEventListener("click", toggleDarkMode);
