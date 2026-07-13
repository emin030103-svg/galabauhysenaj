const toggle = document.querySelector('.nav-toggle');
const nav = document.querySelector('.main-nav, .site-nav');

if (toggle && nav) {
  toggle.addEventListener('click', () => {
    const open = toggle.getAttribute('aria-expanded') === 'true';
    toggle.setAttribute('aria-expanded', String(!open));
    nav.classList.toggle('open', !open);
  });
}

const revealItems = document.querySelectorAll('.reveal');
if ('IntersectionObserver' in window) {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.14 });
  revealItems.forEach((item) => observer.observe(item));
} else {
  revealItems.forEach((item) => item.classList.add('visible'));
}

const lightboxLinks = document.querySelectorAll('[data-lightbox]');
if (lightboxLinks.length) {
  const box = document.createElement('div');
  box.className = 'lightbox';
  box.innerHTML = '<button type="button" aria-label="Lightbox schließen">×</button><img alt="">';
  document.body.appendChild(box);
  const image = box.querySelector('img');
  const close = box.querySelector('button');

  lightboxLinks.forEach((link) => {
    link.addEventListener('click', (event) => {
      event.preventDefault();
      image.src = link.getAttribute('href');
      image.alt = link.querySelector('img')?.alt || 'Projektbild';
      box.classList.add('open');
    });
  });

  const closeBox = () => box.classList.remove('open');
  close.addEventListener('click', closeBox);
  box.addEventListener('click', (event) => {
    if (event.target === box) closeBox();
  });
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') closeBox();
  });
}

document.querySelectorAll('input, textarea').forEach((field) => {
  field.addEventListener('invalid', () => field.classList.add('touched'));
  field.addEventListener('input', () => field.classList.remove('touched'));
});
