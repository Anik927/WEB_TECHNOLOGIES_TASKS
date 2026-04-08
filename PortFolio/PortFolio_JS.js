// ===== DARK / LIGHT MODE TOGGLE =====
const themeToggle = document.getElementById('themeToggle');

if (localStorage.getItem('theme') === 'dark') {
  document.body.classList.add('dark');
  themeToggle.textContent = '☀️ Light Mode';
}

themeToggle.addEventListener('click', function() {

  document.body.classList.toggle('dark');

  if (document.body.classList.contains('dark')) {
    themeToggle.textContent = '☀️ Light Mode';
    localStorage.setItem('theme', 'dark');
  } else {
    themeToggle.textContent = '🌙 Dark Mode';
    localStorage.setItem('theme', 'light');
  }
});

// ===== FORM VALIDATION =====
const form = document.getElementById('contactForm');

form.addEventListener('submit', function(event) {
  event.preventDefault();

  const name    = document.getElementById('name').value.trim();
  const email   = document.getElementById('email').value.trim();
  const subject = document.getElementById('subject').value.trim();
  const message = document.getElementById('message').value.trim();

  document.getElementById('nameError').textContent    = '';
  document.getElementById('emailError').textContent   = '';
  document.getElementById('subjectError').textContent = '';
  document.getElementById('messageError').textContent = '';
  document.getElementById('successMsg').textContent   = '';

  let isValid = true;

   if (name === '') {
    document.getElementById('nameError').textContent = 'Name is required.';
    isValid = false;
  }

  if (email === '') {
    document.getElementById('emailError').textContent = 'Email is required.';
    isValid = false;
  } else if (!email.includes('@') || !email.includes('.')) {
    document.getElementById('emailError').textContent = 'Please enter a valid email.';
    isValid = false;
  }

  if (subject === '') {
    document.getElementById('subjectError').textContent = 'Subject is required.';
    isValid = false;
  }

  if (message === '') {
    document.getElementById('messageError').textContent = 'Message is required.';
    isValid = false;
  }

   if (isValid) {
    document.getElementById('successMsg').textContent = '✅ Message sent successfully!';
    form.reset(); // clear the form
  }

});


// ===== PROJECT DATA =====
const projects = [
  {
    title: "Auto Services Management System",
    description: "A simple app that manages auto services and appointments.",
    image: "download.jpg",
    link: "#"
  },
  {
    title: "Hospital Management System",
    description: "A app that manages hospital operations, patient records, and appointments.",
    image: "Blur of patient in hospital.jpg",
    link: "#"
  },
  {
    title: "Auto Fan Control System",
    description: "A system that controls the speed of auto fans based on temperature.",
    image: "temperature-controlled-dc-fan-using-thermistor-1.png",
    link: "#"
  }
];

// ===== RENDER PROJECT CARDS =====
const container = document.getElementById('projectsContainer');

projects.forEach(function(project) {
  const card = document.createElement('div');
  card.className = 'card';

  card.innerHTML = `
    <img src="${project.image}" alt="${project.title}" />
    <h3>${project.title}</h3>
    <p>${project.description}</p>
    <a href="${project.link}">View Project →</a>
  `;

  container.appendChild(card);
});

// ===== SCROLL TO TOP BUTTON =====
const scrollTopBtn = document.getElementById('scrollTopBtn');

// Show button when user scrolls down 300px
window.addEventListener('scroll', function() {
  if (window.scrollY > 300) {
    scrollTopBtn.style.display = 'block';
  } else {
    scrollTopBtn.style.display = 'none';
  }
});

// Scroll back to top when clicked
scrollTopBtn.addEventListener('click', function() {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

