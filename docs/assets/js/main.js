const toggle = document.querySelector('.nav-toggle');
const nav = document.querySelector('.main-nav, .site-nav');

if (toggle && nav) {
  toggle.addEventListener('click', () => {
    const open = toggle.getAttribute('aria-expanded') === 'true';
    toggle.setAttribute('aria-expanded', String(!open));
    nav.classList.toggle('open', !open);
  });
}

document.querySelectorAll('[data-filter]').forEach((button) => {
  button.addEventListener('click', () => {
    const filter = button.dataset.filter || 'all';
    document.querySelectorAll('[data-filter]').forEach((item) => item.classList.toggle('active', item === button));
    document.querySelectorAll('[data-category]').forEach((item) => {
      item.classList.toggle('is-hidden', filter !== 'all' && item.dataset.category !== filter);
    });
  });
});

const lightboxLinks = Array.from(document.querySelectorAll('[data-lightbox]'));
if (lightboxLinks.length) {
  let currentIndex = 0;
  const box = document.createElement('div');
  box.className = 'lightbox';
  box.setAttribute('role', 'dialog');
  box.setAttribute('aria-modal', 'true');
  box.innerHTML = '<button class="lightbox-close" type="button" aria-label="Lightbox schließen">×</button><button class="lightbox-prev" type="button" aria-label="Vorheriges Bild">‹</button><figure><img alt=""><figcaption></figcaption></figure><button class="lightbox-next" type="button" aria-label="Nächstes Bild">›</button>';
  document.body.appendChild(box);
  const image = box.querySelector('img');
  const caption = box.querySelector('figcaption');
  const close = box.querySelector('.lightbox-close');

  const show = (index) => {
    currentIndex = (index + lightboxLinks.length) % lightboxLinks.length;
    const link = lightboxLinks[currentIndex];
    image.src = link.getAttribute('href');
    image.alt = link.querySelector('img')?.alt || 'Projektbild';
    caption.textContent = link.dataset.caption || link.querySelector('span')?.textContent || '';
    box.classList.add('open');
  };

  lightboxLinks.forEach((link, index) => {
    link.addEventListener('click', (event) => {
      event.preventDefault();
      show(index);
    });
  });

  const closeBox = () => box.classList.remove('open');
  close.addEventListener('click', closeBox);
  box.querySelector('.lightbox-prev').addEventListener('click', () => show(currentIndex - 1));
  box.querySelector('.lightbox-next').addEventListener('click', () => show(currentIndex + 1));
  box.addEventListener('click', (event) => {
    if (event.target === box) closeBox();
  });
  document.addEventListener('keydown', (event) => {
    if (!box.classList.contains('open')) return;
    if (event.key === 'Escape') closeBox();
    if (event.key === 'ArrowLeft') show(currentIndex - 1);
    if (event.key === 'ArrowRight') show(currentIndex + 1);
  });
}

document.querySelectorAll('.map-consent [data-load-map]').forEach((button) => {
  button.addEventListener('click', () => {
    const wrapper = button.closest('.map-consent');
    const src = wrapper?.dataset.mapSrc;
    if (!wrapper || !src) return;
    const iframe = document.createElement('iframe');
    iframe.src = src;
    iframe.title = 'Google Maps Standort Hysenaj Galabau';
    iframe.loading = 'lazy';
    iframe.referrerPolicy = 'no-referrer-when-downgrade';
    iframe.allowFullscreen = true;
    wrapper.replaceChildren(iframe);
  });
});

document.querySelectorAll('input, textarea').forEach((field) => {
  field.addEventListener('invalid', () => field.classList.add('touched'));
  field.addEventListener('input', () => field.classList.remove('touched'));
});
