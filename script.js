// This writes a message in the browser console (press F12 → Console tab)
console.log("JavaScript is now running!");

// This changes the text of the first <h2> on the page
document.addEventListener("DOMContentLoaded", function() {
  const heading = document.querySelector("h2");
  if (heading) {
    heading.textContent = "🚀 My Updated Heading from JavaScript!";
  }
});
document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("toggleMode");
  
    toggleButton.addEventListener("click", function () {
      document.body.classList.toggle("dark-mode");
  
      // Optional: change button text depending on mode
      if (document.body.classList.contains("dark-mode")) {
        toggleButton.textContent = "Switch to Light Mode";
      } else {
        toggleButton.textContent = "Switch to Dark Mode";
      }
    });
  });