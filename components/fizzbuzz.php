<script src="scripts/fizzbuzz.js" defer></script>

<section id="fizzbuzz">
  <h2>FizzBuzz BANG!</h2>
  <form id="fizzbuzz-form">
    <!-- Row 1: Name fields -->
    <div class="form-row">
      <input type="text" id="first" name="first" placeholder="First Name" required>
      <input type="text" id="middle" name="middle" placeholder="M" maxlength="1">
      <input type="text" id="last" name="last" placeholder="Last Name">
    </div>

    <!-- Row 2: Default word and count -->
    <div class="form-row">
      <input type="text" id="defaultWord" name="defaultWord" value="Raccoon" placeholder="Default Word">
      <input type="number" id="count" name="count" value="111" min="1" placeholder="Count">
    </div>

    <!-- Row 3: Words and divisors -->
    <div class="form-row">
      <input type="text" id="word1" name="word1" value="Fizz" placeholder="Word 1">
      <input type="text" id="word2" name="word2" value="Buzz" placeholder="Word 2">
      <input type="text" id="word3" name="word3" value="Bang" placeholder="Word 3">
      <input type="number" id="div1" name="div1" value="3" min="1" placeholder="Divisor 1">
      <input type="number" id="div2" name="div2" value="5" min="1" placeholder="Divisor 2">
      <input type="number" id="div3" name="div3" value="7" min="1" placeholder="Divisor 3">
    </div>

    <div class="form-submit">
      <input type="submit" value="Generate">
    </div>
  </form>

  <div id="results"></div>
</section>
