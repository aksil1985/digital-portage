/* js */

function toggleForm() {
  const form = document.getElementById("formulaire-contact");

  if (form.style.display === "none") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
}
const button = document.getElementById("toggle-button");
button.addEventListener("click", toggleForm);
