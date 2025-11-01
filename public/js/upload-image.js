"use strict";

const imageInput = document.getElementById("inpImage");
const imageLabel = document.getElementById("spnImageLabel");
const preview = document.getElementById("imgPreview");
const buttonRemoveImage = document.getElementById("btnRemoveImage")

imageInput.addEventListener("change", () => {
  const file = imageInput.files[0];

  if (!file) return;
  if (!isFileTypeValid(file)) return;
  if (!isFileSizeAcceptable(file.size)) return;

  imageLabel.innerText = file.name;

  const reader = new FileReader();
  reader.onload = ({ target }) => preview.src = target.result;
  reader.readAsDataURL(file);
  buttonRemoveImage.classList.remove("invisible");
});

buttonRemoveImage.addEventListener("click", () => {
  imageInput.value = "";
  preview.src = "/images/photos.png";
});

function isFileTypeValid(file) {
  const validTypes = [
    "image/jpeg",
    "image/jpg",
    "image/png",
    "image/gif",
    "image/webp"
  ];

  const validTypesFormatted = validTypes.map(type => " " + type.slice(6).toUpperCase());

  if (!validTypes.includes(file.type)) {
    alert(`Atenção: o tipo do arquivo enviado não é valido. Envie apenas:${validTypesFormatted.toString()}`);
    imageInput.value = "";
    return false;
  }

  return true;
}

function isFileSizeAcceptable(fileSize) {
  const MAX_SIZE_ACCEPTABLE_IN_MB = 15;
  const FILE_SIZE_IN_MB = fileSize / (1024 * 1024);

  if (FILE_SIZE_IN_MB > MAX_SIZE_ACCEPTABLE_IN_MB) {
    alert(`Atenção: o tamanho da imagem não deve ser superior a ${MAX_SIZE_ACCEPTABLE_IN_MB}mb`);
    imageInput.value = "";
    return false;
  }

  return true;
}