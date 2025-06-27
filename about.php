<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Me - Kevoh</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #e6f0ff;
      color: black;
    }
    .card {
      display: flex;
      background-color: #f4f4f4;
      color: black;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
      max-width: 600px;
    }
    .card img {
      width: 150px;
      border-radius: 10px;
      margin-right: 20px;
    }
    .info h2 {
      margin: 0 0 10px;
    }
    .team {
      margin-top: 40px;
      text-align: center;
    }
    .team-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 20px;
    }
    .member-card {
      background-color: white;
      border-radius: 10px;
      padding: 15px;
      width: 200px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .member-card img {
      width: 100px;
      border-radius: 50%;
      margin-bottom: 10px;
    }
    @media (max-width: 768px) {
      .team-container {
        flex-direction: column;
        align-items: center;
      }
      .member-card {
        width: 90%;
      }
      .card {
        flex-direction: column;
        text-align: center;
      }
      .card img {
        margin-right: 0;
        margin-bottom: 15px;
      }
    }
    .projects {
      margin-top: 50px;
      text-align: center;
    }
    .project-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      padding: 0 20px;
      margin-top: 20px;
    }
    .project-card {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="nav-container">
      <h1 class="logo">Kevoh</h1>
      <div class="menu-toggle" onclick="toggleMenu()">
        <span id="hamburger">☰</span>
        <span id="close" style="display: none;">✖</span>
      </div>
      <ul class="nav-links" id="navLinks">
        <li><a href="index.html">Home</a></li>
        <li><a href="#team">Team</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="edit_profile.php">Edit Profile</a></li>
      </ul>
    </div>
  </nav>
  <div class="card">
    <img src="profile.jpeg" alt="Kevoh" class="profile-pic">
    <div class="info">
      <h2>Kevoh Thuo</h2>
      <p>Passionate web developer in training. Exploring HTML, CSS, and everything frontend!</p>
      <p>Currently practicing HTML, CSS, and GitHub basics.</p>
      <a href="index.html" style="text-decoration: none;">
        <button style="padding: 10px 15px; background-color: #007BFF; color: white; border: none; border-radius: 5px;">
          View Portfolio
        </button>
      </a>
    </div>
  </div>
  <section class="team" id="team">
    <h2>Meet the Team</h2>
    <div class="team-container">
      <div class="member-card">
        <img src="vokeh.jpg" alt="Kevoh">
        <h3>Kevoh Thuo</h3>
        <p>Frontend Developer</p>
      </div>
      <div class="member-card">
        <img src="reece.jpeg" alt="Reece J.">
        <h3>Reece J.</h3>
        <p>UI Designer</p>
      </div>
      <div class="member-card">
        <img src="cole.jpeg" alt="Cole P.">
        <h3>Cole P.</h3>
        <p>UX Researcher</p>
      </div>
    </div>
  </section>
  <section class="projects" id="projects">
    <h2>My Projects</h2>
    <div class="project-grid">
      <div class="project-card">
        <h3>Weather App</h3>
        <p>A simple app that shows weather using an API.</p>
      </div>
      <div class="project-card">
        <h3>Portfolio Website</h3>
        <p>My personal responsive portfolio built with HTML & CSS.</p>
      </div>
      <div class="project-card">
        <h3>To-Do List</h3>
        <p>Tracks tasks using JavaScript — with dark mode!</p>
      </div>
      <div class="project-card">
        <h3>Calculator</h3>
        <p>Fully working calculator styled with Flexbox.</p>
      </div>
    </div>
  </section>
  <section class="contact" id="contact">
    <h2>Contact Me</h2>
    <form action="https://formspree.io/f/mvgrbbrv" method="POST" onsubmit="alert('Thank you! Your message has been sent.')">
      <input type="text" name="name" placeholder="Your Name" required />
      <input type="email" name="email" placeholder="Your Email" required />
      <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
      <button type="submit">Send Message</button>
    </form>
  </section>
  <button id="toggleMode" style="position: relative; top: 100px; left: 100px; padding: 10px; background: black; color: white;">
    Toggle Dark Mode
  </button>
  <script>
    function toggleMenu() {
      const nav = document.getElementById("navLinks");
      const hamburger = document.getElementById("hamburger");
      const close = document.getElementById("close");
      nav.classList.toggle("show");
      if (nav.classList.contains("show")) {
        hamburger.style.display = "none";
        close.style.display = "inline";
      } else {
        hamburger.style.display = "inline";
        close.style.display = "none";
      }
    }
  </script>
  <script src="script.js"></script>
</body>
</html>
