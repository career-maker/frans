// Load and inject centralized menu into all pages
(function() {
  console.log('[Menu Loader] Starting menu injection...');

  // Determine correct path to menu.html
  const getMenuPath = () => {
    const pathname = window.location.pathname;

    // Check if current file is in a subdirectory
    // E.g., /Franciscan Society/index.html (root, fetch 'menu.html')
    //       /Franciscan Society/ministries-pastoral.html (inner, fetch '../menu.html')
    const lastSlashIndex = pathname.lastIndexOf('/');
    const secondLastSlashIndex = pathname.lastIndexOf('/', lastSlashIndex - 1);

    // If there's another slash before the last one, we're in a subdirectory
    if (secondLastSlashIndex > pathname.indexOf('/Franciscan')) {
      return '../menu.html';
    }
    return 'menu.html';
  };

  const menuPath = getMenuPath();
  console.log('[Menu Loader] Menu path:', menuPath);

  // Fetch menu.html and inject into DOM
  fetch(menuPath, { cache: 'no-cache' })
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP ${response.status}: ${response.statusText}`);
      }
      return response.text();
    })
    .then(html => {
      console.log('[Menu Loader] Menu HTML loaded, injecting...');

      // Insert at very start of body (before everything)
      const firstChild = document.body.firstChild;
      const wrapper = document.createElement('div');
      wrapper.innerHTML = html;

      // Move all children from wrapper to body
      while (wrapper.firstChild) {
        document.body.insertBefore(wrapper.firstChild, firstChild);
      }

      // Set body padding to account for fixed header
      document.body.style.paddingTop = '100px';

      console.log('[Menu Loader] Menu injected successfully');

      // Set active link
      setActiveMenuLink();

      // Re-run dependent scripts
      if (window.initializeMenuDependencies) {
        window.initializeMenuDependencies();
      }
    })
    .catch(error => {
      console.error('[Menu Loader] Failed to load menu:', error.message);
    });

  // Mark current page link as active
  function setActiveMenuLink() {
    try {
      const currentPath = window.location.pathname.split('/').pop() || 'index.html';
      const allLinks = document.querySelectorAll('.fs-desktop-nav a, .fs-mobile-nav > a');

      allLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href === currentPath || (currentPath === '' && href === 'index.html')) {
          link.classList.add('active');
        } else {
          link.classList.remove('active');
        }
      });
    } catch (e) {
      console.error('[Menu Loader] Error setting active link:', e);
    }
  }
})();
