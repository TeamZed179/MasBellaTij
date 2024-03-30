document.addEventListener('DOMContentLoaded', () => {
    const productosContainer = document.getElementById('productos-container');

    function cargarProductos() {
        fetch('pbs.php')
            .then(response => response.json())
            .then(data => {
                const html = data.map(producto => `
                    <div class="pro">
                        <img src="${producto.Imagen}" alt="" data-id="${producto.SKU}">
                        <div class="des">
                            <span>${producto.Nombre}</span>
                            <h5>${producto.Descripcion}</h5>
                        </div>
                        <div>
                            <h4>${producto.Precio}</h4>
                        </div>
                    </div>
                `).join('');
                productosContainer.innerHTML = html;
                const imagenes = productosContainer.querySelectorAll('.pro img');
                imagenes.forEach(img => {
                    img.addEventListener('click', () => {
                        const sku = img.getAttribute('data-id');
                        const url = 'detalles.php?sku=' + sku;
                        console.log('URL para cargar detalles:', url);
                        window.open(url, '_blank');
                    });
                });
            })
            .catch(error => console.error('Error al obtener los productos:', error));
    }

    cargarProductos();
});
