document.getElementById("fizzbuzz-form").addEventListener("submit", function (e) {
    e.preventDefault();

    const first = document.getElementById("first").value.trim();
    const middle = document.getElementById("middle").value.trim();
    const last = document.getElementById("last").value.trim();

    const fullName = `${first} ${middle ? middle + "." : ""} ${last}`.trim();
    const count = parseInt(document.getElementById("count").value);
    const defaultWord = document.getElementById("defaultWord").value;
    const word1 = document.getElementById("word1").value;
    const word2 = document.getElementById("word2").value;
    const word3 = document.getElementById("word3").value;
    const div1 = parseInt(document.getElementById("div1").value);
    const div2 = parseInt(document.getElementById("div2").value);
    const div3 = parseInt(document.getElementById("div3").value);

    const results = document.getElementById("results");
    results.innerHTML = `<h3>Welcome, ${fullName}!</h3><ul>`;

    for (let i = 1; i <= count; i++) {
      let output = "";
      if (i % div1 === 0) output += word1;
      if (i % div2 === 0) output += word2;
      if (i % div3 === 0) output += word3;
      if (!output) output = defaultWord;
      results.innerHTML += `<li>${output}</li>`;
    }
    results.innerHTML += "</ul>";
  });
