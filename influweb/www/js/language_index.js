const cflagsElement = document.getElementById("flags");

const ctextsToChange = document.querySelectorAll("[data-section]");

const cchangeLanguage = async (language) => {
  const crequestJson = await fetch(`./language/${language}.json`);
  const ctexts = await crequestJson.json();

  for (const ctextToChange of ctextsToChange) {
    const csection = ctextToChange.dataset.section;
    const cvalue = ctextToChange.dataset.value;
    ctextToChange.innerHTML = ctexts[csection][cvalue];
  }

  // Cambiar la bandera principal por la seleccionada
  const cselectedFlag = cflagsElement.querySelector(".flags__dropdown .flags__item[data-language='" + language + "']");
  const cmainFlag = cflagsElement.querySelector(".flags__item[data-language]");
  cmainFlag.innerHTML = cselectedFlag.innerHTML;
};

cflagsElement.addEventListener("click", (e) => {
  const clanguage = e.target.parentElement.dataset.language;
  cchangeLanguage(clanguage);
});

document.addEventListener("click", (e) => {
  if (!cflagsElement.contains(e.target)) {
    cflagsElement.querySelector(".flags__dropdown").classList.remove("active");
  }
});

cflagsElement.addEventListener("mouseenter", () => {
  cflagsElement.querySelector(".flags__dropdown").classList.add("active");
});

cflagsElement.addEventListener("mouseleave", () => {
  cflagsElement.querySelector(".flags__dropdown").classList.remove("active");
});
