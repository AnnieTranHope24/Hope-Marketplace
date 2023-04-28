<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  

include "includes/common_functions.php";

include './partials/head.php' ;
require_once('config.php');

include 'categories.php';
try {
  $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
?>
<head>
  <?php 
  include './partials/head.php' 
  ?>
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
      <p>Two students have undertaken the task of building a website for their peers at school with the aim of providing a user-friendly platform that enables students to trade or sell unwanted items, thereby helping other students save on costs that they would otherwise have to incur on buying new items at their full price. </p>
    </div>
    <div class="text-content"> <img src="images/icons/save-the-planet.png">
      <p>The website promotes a circular economy, where items are kept in use for as long as possible and waste is minimized. This reduces the amount of waste generated from discarded items and helps to conserve landfill space.</P>
    </div>
    <div class="text-content"> <img src="images/icons/fair-trade.png">
      <p>Students who are selling or trading items on the website benefit from the opportunity to declutter their possessions and earn some extra money in the process. They can also feel good about contributing to the circular economy and reducing waste by passing their items along to someone else who can use them.
      </p>
    </div>
    <div class="text-content"> <img src="images/icons/community.png">
      <p> The website could serve as a platform for students to share information and advice on a variety of topics related to student life, such as academics, extracurricular activities, and social events. This can help students feel more connected to their school community and provide them with a support system as they navigate their educational journey.
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
    <div controls class="vid">
      <iframe width="100%" height="600px"src="https://www.youtube.com/embed/e9YZAPoCprc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
  </div>
  <script src="js/hamburger.js"></script>
</body>
<footer>
  <?php include './partials/footer.php'?>
</footer>