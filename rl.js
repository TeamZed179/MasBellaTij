if (window.location.href.endsWith('.php') || window.location.href.endsWith('.html')) {
    const newUrl = window.location.href.replace(/\.php|\.html$/, ''); // Eliminar tanto .php como .html al final de la URL
    window.history.replaceState({}, document.title, newUrl);
}
