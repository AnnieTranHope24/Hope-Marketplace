<!DOCTYPE html>
<html lang="en">

<head>
  <?php include './partials/head.php' ?>
  <title>About</title>
  <link rel="stylesheet" href="css/about.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Merriweather&display=swap"
    rel="stylesheet">
</head>
<header>
  <?php include './partials/header.php'?>
</header>

<body>
  <div class="title">For Students, by Students</div>
  <div class="text">
    <div class="text-content"> <img src="images/icons/target.png">
      <p>The mission and purpose of two students making a website for their fellow students at their school is to create
        a platform that allows students to easily trade or sell items they no longer need or use, and to facilitate cost
        savings for students who might otherwise have to purchase new items at full price. </p>
    </div>
    <div class="text-content"> <img src="images/icons/save-the-planet.png">
      <p>The primary mission of the website is to promote sustainability and reduce waste by encouraging the reuse of
        goods within the school community. By enabling students to trade or sell items they no longer need, the website
        helps to prevent those items from being thrown away and ending up in landfills. This is an important goal for
        students who are increasingly aware of the need to reduce their environmental impact. </P>
    </div>
    <div class="text-content"> <img src="images/icons/fair-trade.png">
      <p>In addition to promoting sustainability, the website also has a financial purpose. By allowing students to
        exchange goods with one another, the website enables students to save money on items they might otherwise have
        to purchase new. For example, if a student needs a new textbook for a class, they could use the website to find
        another student who has already taken the class and no longer needs the book. This could save the student a
        significant amount of money, particularly if the textbook is expensive.
      </p>
    </div>
    <div class="text-content"> <img src="images/icons/community.png">
      <p> Overall, the mission and purpose of the website created by these two students is to provide a platform that
        promotes sustainability and cost savings for students in their school community. By enabling students to
        exchange goods with one another, the website helps to reduce waste and save money, while also fostering a sense
        of community and collaboration among the students.
      </p>
    </div>
  </div>
  <div id="st">
    <div class="row" id="stories">
      <div class="col">
        <img class="profiles1" src="images/icons/bereket.jpg" alt="profile picture of bereket" class="img-responsive">
        <h4>Web developer</h4>
        <p>Bereket Bessie</p>
        <div class="links">
          <a href="mailto:bereket.bessie@hope.edu"> <img src="images/icons/envelope.svg"></a>
          <a href="https://www.linkedin.com/in/bereket-bessie-088267253"> <img src="images/icons/linkedin.svg"></a>
          <a href=""> <img src="images/icons/instagram.svg"></a>
          <a href=""> <img src="images/icons/twitter.svg"></a>
          <a href=""> <img src="images/icons/snapchat.svg"></a>
        </div>
        <p class="more-details"> My name is Bereket Bessie and I'm currently a student at Hope College, studying
          Computer Science and Economics. I'm passionate about exploring the intersection of technology and business,
          and I'm always eager to learn more about how these fields can work together to drive innovation and create
          positive change in the world. When I'm not studying or working on projects, you can usually find me running,
          playing soccer, or catching up on my favorite shows on Netflix. </p>
        <button class="detail-btn1">View Details</button>
      </div>
      <div class="col">
        <img class="profiles2" src="images/icons/annie.jpg" alt="profile picture of annie" class="img-responsive">
        <h4>Web developer</h4>
        <p>Annie Tran</p>
        <div class="links">
          <a href="mailto:ngoc.tran@hope.edu"> <img src="images/icons/envelope.svg"></a>
          <a href=""> <img src="images/icons/linkedin.svg"></a>
          <a href=""> <img src="images/icons/instagram.svg"></a>
          <a href=""> <img src="images/icons/twitter.svg"></a>
          <a href=""> <img src="images/icons/snapchat.svg"></a>
        </div>
        <p class="more-details1"> I'm Annie Tran. I'm a Computer Science student at Hope College. I love Computer
          Science and I am eager to learn about more different areas of this industry. My dream is to write a cool
          program that many people find useful. </p>
        <button class="detail-btn2">View Details</button>
      </div>
    </div>
  </div>
  <div class="video">
    <video controls class="vid">
      <source src="images/icons/aboutUs.mp4" type="video/mp4" />
    </video>
  </div>
  <script src="js/hamburger.js"></script>
</body>
<footer>
  <?php include './partials/footer.php'?>
</footer>