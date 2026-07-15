const toggle = document.querySelector('.nav-toggle');
const nav = document.querySelector('.main-nav');

if (toggle && nav) {
  toggle.addEventListener('click', () => {
    const isOpen = toggle.getAttribute('aria-expanded') === 'true';
    toggle.setAttribute('aria-expanded', String(!isOpen));
    nav.classList.toggle('open', !isOpen);
  });
}

document.querySelectorAll('.gallery-system').forEach((gallery) => {
  const buttons = Array.from(gallery.querySelectorAll('[data-filter]'));
  const cards = Array.from(gallery.querySelectorAll('[data-gallery-card]'));
  const status = gallery.querySelector('[data-filter-status]');

  buttons.forEach((button) => {
    button.addEventListener('click', () => {
      const filter = button.dataset.filter || 'all';
      buttons.forEach((item) => item.classList.toggle('active', item === button));
      let visible = 0;
      cards.forEach((card) => {
        const match = filter === 'all' || card.dataset.category === filter;
        card.classList.toggle('is-hidden', !match);
        if (match) visible += 1;
      });
      if (status) {
        const label = button.textContent.trim();
        status.textContent = filter === 'all'
          ? 'Alle Referenzen werden angezeigt.'
          : `${visible} Referenz${visible === 1 ? '' : 'en'} für ${label}.`;
      }
    });
  });
});

const allLightboxLinks = Array.from(document.querySelectorAll('[data-lightbox]'));
if (allLightboxLinks.length) {
  let currentLinks = allLightboxLinks;
  let currentIndex = 0;
  const box = document.createElement('div');
  box.className = 'lightbox';
  box.setAttribute('role', 'dialog');
  box.setAttribute('aria-modal', 'true');
  box.innerHTML = '<button class="lightbox-close" type="button" aria-label="Lightbox schließen">×</button><button class="lightbox-prev" type="button" aria-label="Vorheriges Bild">‹</button><figure><img alt=""><figcaption></figcaption></figure><button class="lightbox-next" type="button" aria-label="Nächstes Bild">›</button>';
  document.body.appendChild(box);

  const image = box.querySelector('img');
  const caption = box.querySelector('figcaption');

  const visibleCollectionFor = (link) => {
    const gallery = link.closest('.gallery-system');
    const links = gallery
      ? Array.from(gallery.querySelectorAll('[data-lightbox]')).filter((item) => !item.classList.contains('is-hidden'))
      : allLightboxLinks;
    return links.length ? links : [link];
  };

  const show = (index) => {
    currentIndex = (index + currentLinks.length) % currentLinks.length;
    const link = currentLinks[currentIndex];
    image.src = link.getAttribute('href');
    image.alt = link.querySelector('img')?.alt || 'Projektbild';
    caption.textContent = link.dataset.caption || link.querySelector('span')?.textContent || '';
    box.classList.add('open');
  };

  allLightboxLinks.forEach((link) => {
    link.addEventListener('click', (event) => {
      event.preventDefault();
      currentLinks = visibleCollectionFor(link);
      show(currentLinks.indexOf(link));
    });
  });

  const closeBox = () => box.classList.remove('open');
  box.querySelector('.lightbox-close').addEventListener('click', closeBox);
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

document.querySelectorAll('[data-static-form]').forEach((form) => {
  form.addEventListener('submit', (event) => {
    event.preventDefault();
    if (typeof form.reportValidity === 'function' && !form.reportValidity()) return;
    const preview = form.querySelector('[data-form-preview]');
    if (preview) preview.hidden = false;
    if (form.dataset.staticForm === 'bewerbung') {
      window.location.href = 'mailto:galabau.hysenaj@gmail.com?subject=Bewerbung%20bei%20Hysenaj%20Galabau';
    }
  });
});
