"use strict";

const deleteImageButtons = document.querySelectorAll(".btnDeleteImage");
const deleteDialogs = document.querySelectorAll(".dlgDeleteDialog");
const overlays = document.querySelectorAll(".overlay");
const closeDialogButtons = document.querySelectorAll(".btnCloseDialog");

deleteImageButtons.forEach((button, idx) => {
  button.addEventListener("click", () => {
    deleteDialogs[idx].classList.remove("hidden");
    overlays[idx].classList.remove("hidden");
  });
});

closeDialogButtons.forEach((button, idx) => {
  button.addEventListener("click", () => {
    deleteDialogs[idx].classList.add("hidden");
    overlays[idx].classList.add("hidden");
  });
});

overlays.forEach((overlay, idx) => {
  overlay.addEventListener("click", () => {
    dialogs[idx].classList.add("hidden");
    overlay.classList.add("hidden");
  });
});