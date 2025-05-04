document.getElementById("introForm").addEventListener("submit", function (e) {
  e.preventDefault();

const imageUrl = document.getElementById("image").value.trim();
const imageElement = document.getElementById("output-image");

if (imageUrl) {
  imageElement.src = imageUrl;
  imageElement.style.display = "block";
} else {
  imageElement.style.display = "none";
}


  // Set caption
  document.getElementById("output-caption").innerText = document.getElementById("caption").value;

  // Set background text
  document.getElementById("output-personal").innerText = document.getElementById("personal").value;
  document.getElementById("output-professional").innerText = document.getElementById("professional").value;
  document.getElementById("output-academic").innerText = document.getElementById("academic").value;
  document.getElementById("output-subject").innerText = document.getElementById("subject").value;
  document.getElementById("output-platform").innerText = document.getElementById("platform").value;

  // Set courses
  document.getElementById("output-course1").innerText = document.getElementById("course1").value;
  document.getElementById("output-reason1").innerText = document.getElementById("reason1").value;

  document.getElementById("output-course2").innerText = document.getElementById("course2").value;
  document.getElementById("output-reason2").innerText = document.getElementById("reason2").value;

  document.getElementById("output-course3").innerText = document.getElementById("course3").value;
  document.getElementById("output-reason3").innerText = document.getElementById("reason3").value;

  // Show the output section
  document.getElementById("intro-output").style.display = "block";
  document.getElementById("intro-output").scrollIntoView({ behavior: "smooth" });

});
