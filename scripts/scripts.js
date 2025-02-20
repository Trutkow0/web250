document.addEventListener("DOMContentLoaded", function () {
// Find all elements with the data-include attribute
  const elements = document.querySelectorAll("[data-include]");

  // Iterate through each element
  elements.forEach((element) => {
    const filePath = element.getAttribute("data-include"); // Get the file path

    // Fetch the content of the file
    fetch(filePath)
      .then((response) => {
        if (!response.ok) {
          throw new Error(`Could not load ${filePath}: ${respopnse.statusText}`);
        }
        return response.text();
      })
    .then((html) => {
      element.innerHTML = html; //Insert the content into the element
    })
    .catch((error) => {
      console.error(error);
      element.innerHTML = `<p>Error loading component: ${filePath}</p>`;
    });
  });
});
