"use strict";

const eyeButton = document.getElementById("eye");
const passwordInput = document.getElementById("inpPass");
let isVisible = false;

eyeButton.addEventListener("click", () => {
  isVisible = !isVisible;
  const icon = !isVisible ? "visibility" : "visibility_off";
  const inputType = !isVisible ? "password" : "text"
  eyeButton.innerText = icon;
  passwordInput.setAttribute("type", inputType);
});