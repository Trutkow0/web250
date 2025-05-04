<section id="intro-form" class="intro">
  <h2>Introduction Form</h2>

  <form id="introForm">
    <div class="form-row">
      <label>Image URL:
        <input type="text" id="image" name="image" value="images/tree_me.png" required>
      </label>
      <label>Image Caption:
        <input type="text" id="caption" name="caption" value="Enjoying some baseball by a tree." required>
      </label>
    </div>

    <div class="form-row">
      <label>Personal Background:<br>
        <textarea rows="5" cols="30" id="personal" name="personal" required>
I was born in Queens, NY and raised in Charlotte, NC...
        </textarea>
      </label>
      <label>Professional Background:<br>
        <textarea rows="5" cols="30" id="professional" name="professional" required>
I have worked with CMS as an After School Teacher...
        </textarea>
      </label>
      <label>Academic Background:<br>
        <textarea rows="5" cols="30" id="academic" name="academic" required>
I have an Associate’s Degree in Fine Arts...
        </textarea>
      </label>
      <label>Background in this Subject:<br>
        <textarea rows="5" cols="30" id="subject" name="subject" required>
I started learning HTML and CSS about 2 summers ago...
        </textarea>
      </label>
      <label>Primary Computer Platform:<br>
        <textarea rows="5" cols="30" id="platform" name="platform" required>
HP Envy Laptop running Linux Mint
        </textarea>
      </label>
    </div>

    <div class="form-row">
      <label>Course 1:<br>
        <input type="text" id="course1" name="course1" value="CSC221- Advanced Python Programming" required>
      </label>
      <label>Reason 1:<br>
        <input type="text" id="reason1" name="reason1" value="It is required for my degree program" required>
      </label>

      <label>Course 2:<br>
        <input type="text" id="course2" name="course2" value="WEB215- Advanced Web Markup & Scripting" required>
      </label>
      <label>Reason 2:<br>
        <input type="text" id="reason2" name="reason2" value="It is required for my degree program" required>
      </label>

      <label>Course 3:<br>
        <input type="text" id="course3" name="course3" value="WEB250- Database Driven Websites" required>
      </label>
      <label>Reason 3:<br>
        <input type="text" id="reason3" name="reason3" value="It is required for my degree program" required>
      </label>
    </div>

    <div class="form-submit">
      <input type="submit" value="Generate My Intro">
    </div>
  </form>
</section>


