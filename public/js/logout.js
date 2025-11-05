"use strict";

const logoutButton = document.getElementById("spnProfile");
const logoutDiv = document.getElementById("divLogout");
let isLogoutDivVisible = false;

logoutButton.addEventListener("click", () => {
  isLogoutDivVisible = !isLogoutDivVisible;
  logoutDiv.classList.toggle("hidden");
});