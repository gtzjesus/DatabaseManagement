<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Grad Track</title>
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicons.ico">
  
</head>

  <!-- Nav Integration -->

  <header>
    <a href="http://cssrvlab01.utep.edu/Classes/cs4342/Team2_pm/" class="site-logo" aria-label="homepage">Grad Track</a>
    <!--
    <nav class="main-nav">
      <ul class="nav__list">
      
        <li class="nav__list-item">
          <a href="http://cssrvlab01.utep.edu/Classes/cs4342/Team2_pm/" class="nav__link">LINK1</a>
        </li>
        <li class="nav__list-item">
          <a href="http://cssrvlab01.utep.edu/Classes/cs4342/Team2_pm/" class="nav__link">LINK2</a>
        </li>
        <li class="nav__list-item">
          <a href="http://cssrvlab01.utep.edu/Classes/cs4342/Team2_pm/" class="nav__link">LINK3</a>
        </li>
      </ul>
    </nav>
    <nav class="account">
      <ul class="nav__list">
    
        <li class="nav__list-item">
          <a class="nav__link nav__link--btn" href="http://cssrvlab01.utep.edu/Classes/cs4342/Team2_pm/student_login.php">Login</a>
        </li>
        -->
        
        <li class="nav__list-item">
          <a
            class="nav__link nav__link--btn nav__link--btn--highlight"
            href="http://cssrvlab01.utep.edu/Classes/cs4342/Team2_pm/create_account.php"
            >Join</a
          >
        </li>
      </ul>
    </nav>
  </header>

  <!-- Nav Integration -->

  <!-- Landing Page Integration -->

  <div class="landing-page">
    
      <h1>Grad Track Advising</h1>
      <a class="start-here-button" href="http://cssrvlab01.utep.edu/Classes/cs4342/Team2_pm/create_account.php">Start Here</a>
  
  </div>

  <!-- Landing Page Integration -->
  <!-- <img src="assets/test.jpg"alt=""> -->
  <script src="assets/scrolling.js"></script>
</body>
</html>

<!-- Stylesheet -->

<style>

body {
    margin: 0;
    background: #FB9A49;
  }
  
  /* Top Navigation */
  
  .site-logo {
      font-weight: 900;
      font-size: 1rem;
      color: var(--text);
      text-decoration: none;
    }
  
    header {
      --text: #333;
      --text-inverse: #333;
      --background: transparent;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 999;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 2em 5.5em;
      transition: background 250ms ease-in;
      background: var(--background);
      color: var(--text);
    }
  
    .nav__list {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
    }
  
    .nav__link {
      --spacing: 2em;
      text-decoration: none;
      color: inherit;
      display: inline-block;
      padding: calc(var(--spacing) / 5) var(--spacing);
      position: relative;
      text-transform: uppercase;
      letter-spacing: 2px;
      font-size: 0.9rem;
    }
  
    .nav__link:after {
      content: "";
      position: absolute;
      bottom: 0;
      left: var(--spacing);
      right: var(--spacing);
      height: 2px;
      background: currentColor;
      -webkit-transform: scaleX(0);
      transform: scaleX(0);
      transition: -webkit-transform 150ms ease-in-out;
      transition: transform 150ms ease-in-out;
      transition: transform 150ms ease-in-out, -webkit-transform 150ms ease-in-out;
    }
  
    .nav__link:hover::after {
      -webkit-transform: scaleX(1);
      transform: scaleX(1);
    }
  
    .nav__link--btn {
      border: 1.5px solid currentColor;
      border-radius: 2em;
      margin-left: 1em;
      transition: background 250ms ease-in-out;
      letter-spacing: 1px;
      padding: 0.75em 1.5em;
    }
  
    .nav__link--btn:hover {
      background: var(--text);
      color: var(--text-inverse);
      color: #fff;
      border-color: var(--text);
    }
  
    .nav__link--btn::after {
      display: none;
    }
  
    .nav__link--btn--highlight {
      background: #05366B;
      border-color: #05366B;
      color: #fff;
    }
  
    .nav__link--btn--highlight:hover {
      background: var(--text);
      border-color: var(--text);
    }
  
    .nav-scrolled {
      --text: #333;
      --text-inverse: #f4f4f4;
      --background: #f4f4f4;
      box-shadow: 0 3px 20px rgba(0, 0, 0, 0.2);
    }
  
    /* End of Navigation */

    /* Landing Page Section Grid */

  .landing-page {
    display: grid;
    grid-gap: 0;
    margin: 0;
    color: inherit;
    background: inherit;
    background-image: url("landing-page.jpg");
    min-height: 100vh;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

 

  .landing-page h1 {
    text-align: center;
    font-size: 45px;
    letter-spacing: 1px;
    font-weight: 200;
    position: fixed;
    top: 35%;
    left: 50%;
    /* bring your own prefixes */
    transform: translate(-50%, -35%);
  }

  .start-here-button {
    position: fixed;
    top: 50%;
    left: 50%;
    /* bring your own prefixes */
    transform: translate(-50%, -50%);
    background-color: #D4DCE2;
    border: none;
    color: #3e3e3e;
    padding: 0.75rem;
    font-size: 25px;
    letter-spacing: 1px;
    font-weight: 200;
    text-align: center;
    display: table;
    margin: 0vh auto;
    text-decoration: none;
    border-radius: 0vh;
  }

  .intro-h1 {
    font-size: 80px;
    letter-spacing: 3px;
    font-weight: 100;
    text-transform: uppercase;
  }

  .intro-h2 {
    font-size: 30px;
    letter-spacing: 1.5px;
    font-weight: 100;
  }

  .landing-btn {
    background-color: #3e3e3e;
    color: #fff;
    padding: 0.95rem;
    font-size: 18px;
    letter-spacing: 1px;
    font-weight: 200;
    text-align: center;
    text-transform: uppercase;
    display: table;
    margin: 3vh auto;
    border-radius: 0.5vh;
  }

  .landing-btn:hover {
    transition: 0.35s;
    color: #3e3e3e;
    background: #fff;
  }

  /* End of Landing Page Section Grid  */
  
    </style>
