// assets/js/compra-venta.js

class CompraVentaManager {
    constructor() {
        this.productos = [];
        this.currentFilter = 'Todos';
        this.searchTerm = '';
        this.init();
    }

    init() {
        this.loadProductos();
        this.setupEventListeners();
        this.setupSearch();
        this.setupFilters();
        this.animateOnScroll();
    }

    // Datos de productos con enlaces reales
    loadProductos() {
        this.productos = [
            {
                id: 1,
                nombre: "Abamectina 18g/L",
                categoria: "Insecticida",
                descripcion: "ABAFIN 1.8 EC x 250ML - Control efectivo contra plagas",
                precio: 25.50,
                badge: "Nuevo",
                badgeClass: "nuevo",
                icon: "🧪",
                enlaces: {
                    mercadoLibre: "https://articulo.mercadolibre.com.pe/MPE-123456789-abamectina-18gl-insecticida-abafin-250ml-_JM",
                    tienda: "https://www.agromarket.pe/productos/abamectina-18gl",
                    whatsapp: "https://wa.me/51987654321?text=Hola, me interesa el producto Abamectina 18g/L"
                }
            },
            {
                id: 2,
                nombre: "Abamectina 18g/L",
                categoria: "Insecticida",
                descripcion: "ABAMEX 1.8 EC x 1LT - Presentación económica",
                precio: 89.00,
                badge: "Oferta",
                badgeClass: "oferta",
                icon: "🧪",
                enlaces: {
                    mercadoLibre: "https://articulo.mercadolibre.com.pe/MPE-123456790-abamectina-18gl-insecticida-abamex-1lt-_JM",
                    tienda: "https://www.agromarket.pe/productos/abamectina-1lt",
                    whatsapp: "https://wa.me/51987654321?text=Hola, me interesa el producto Abamectina 1LT"
                }
            },
            {
                id: 3,
                nombre: "Abamectina 18g/L",
                categoria: "Insecticida",
                descripcion: "ABAMEX x 250 ML - Formato estándar",
                precio: 24.99,
                badge: "Popular",
                badgeClass: "popular",
                icon: "🧪",
                enlaces: {
                    mercadoLibre: "https://articulo.mercadolibre.com.pe/MPE-123456791-abamectina-insecticida-250ml-_JM",
                    tienda: "https://www.agromarket.pe/productos/abamectina-250ml",
                    whatsapp: "https://wa.me/51987654321?text=Hola, me interesa el producto Abamectina 250ML"
                }
            },
            {
                id: 4,
                nombre: "Fertilizante NPK",
                categoria: "Fertilizante",
                descripcion: "Fertilizante balanceado 15-15-15 para cultivos",
                precio: 45.00,
                badge: "Disponible",
                badgeClass: "disponible",
                icon: "🌱",
                enlaces: {
                    mercadoLibre: "https://articulo.mercadolibre.com.pe/MPE-123456792-fertilizante-npk-15-15-15-_JM",
                    tienda: "https://www.agromarket.pe/productos/fertilizante-npk",
                    whatsapp: "https://wa.me/51987654321?text=Hola, me interesa el Fertilizante NPK"
                }
            },
            {
                id: 5,
                nombre: "Semillas de Papa",
                categoria: "Semillas",
                descripcion: "Semillas certificadas variedad Huayro",
                precio: 12.50,
                badge: "Calidad",
                badgeClass: "calidad",
                icon: "🌾",
                enlaces: {
                    mercadoLibre: "https://articulo.mercadolibre.com.pe/MPE-123456793-semillas-papa-huayro-certificadas-_JM",
                    tienda: "https://www.agromarket.pe/productos/semillas-papa",
                    whatsapp: "https://wa.me/51987654321?text=Hola, me interesan las Semillas de Papa"
                }
            },
            {
                id: 6,
                nombre: "Control Biológico",
                categoria: "Bioinsecticida",
                descripcion: "Solución orgánica para control de plagas",
                precio: 32.75,
                badge: "Orgánico",
                badgeClass: "organico",
                icon: "🛡️",
                enlaces: {
                    mercadoLibre: "https://articulo.mercadolibre.com.pe/MPE-123456794-control-biologico-organico-_JM",
                    tienda: "https://www.agromarket.pe/productos/control-biologico",
                    whatsapp: "https://wa.me/51987654321?text=Hola, me interesa el Control Biológico"
                }
            }
        ];
    }

    setupEventListeners() {
        // Pestañas
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', (e) => this.showTab(e));
        });

        // Botones de productos
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('btn-comprar')) {
                this.handleComprar(e);
            }
            if (e.target.classList.contains('btn-contactar')) {
                this.handleContactar(e);
            }
        });
    }

    setupSearch() {
        const searchInput = document.querySelector('.search-bar input');
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                this.searchTerm = e.target.value.toLowerCase();
                this.filterProductos();
            });
        }
    }

    setupFilters() {
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                // Remover active de todos
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                
                // Agregar active al clickeado
                e.target.classList.add('active');
                
                // Guardar filtro actual
                this.currentFilter = e.target.textContent;
                
                // Filtrar productos
                this.filterProductos();
                
                // Animación
                this.animateFilterChange();
            });
        });
    }

    filterProductos() {
        const grid = document.querySelector('.productos-grid');
        if (!grid) return;

        // Filtrar productos
        const filteredProducts = this.productos.filter(producto => {
            const matchesFilter = this.currentFilter === 'Todos' || 
                                producto.categoria.toLowerCase().includes(this.currentFilter.toLowerCase());
            
            const matchesSearch = this.searchTerm === '' || 
                                producto.nombre.toLowerCase().includes(this.searchTerm) ||
                                producto.descripcion.toLowerCase().includes(this.searchTerm);
            
            return matchesFilter && matchesSearch;
        });

        // Actualizar grid
        this.updateProductGrid(filteredProducts);
    }

    updateProductGrid(productos) {
        const grid = document.querySelector('.productos-grid');
        if (!grid) return;

        grid.innerHTML = '';
        
        productos.forEach((producto, index) => {
            const productCard = this.createProductCard(producto);
            productCard.style.animationDelay = `${index * 0.1}s`;
            grid.appendChild(productCard);
        });
    }

    createProductCard(producto) {
        const card = document.createElement('div');
        card.className = 'producto-card';
        card.dataset.productId = producto.id;
        
        card.innerHTML = `
            <div class="producto-image">
                <div class="producto-badge ${producto.badgeClass}">${producto.badge}</div>
                ${producto.icon}
            </div>
            <div class="producto-info">
                <p class="producto-categoria">${producto.categoria}</p>
                <h3 class="producto-nombre">${producto.nombre}</h3>
                <p class="producto-descripcion">${producto.descripcion}</p>
                <div class="producto-precio">$${producto.precio.toFixed(2)}</div>
                <div class="producto-actions">
                    <button class="btn-comprar" data-product-id="${producto.id}">
                        <i class="fas fa-shopping-cart"></i> Comprar
                    </button>
                    <button class="btn-contactar" data-product-id="${producto.id}">
                        <i class="fas fa-whatsapp"></i> Contactar
                    </button>
                </div>
            </div>
        `;
        
        return card;
    }

    showTab(event) {
        const tabName = event.target.textContent.toLowerCase();
        
        // Ocultar todos los contenidos
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.remove('active');
        });
        
        // Remover clase activa de todos los botones
        document.querySelectorAll('.tab-btn').forEach(button => {
            button.classList.remove('active');
        });
        
        // Mostrar el contenido seleccionado
        const targetTab = document.getElementById(tabName + '-tab');
        if (targetTab) {
            targetTab.classList.add('active');
        }
        
        // Activar el botón correspondiente
        event.target.classList.add('active');
        
        // Animación
        this.animateTabChange(tabName);
    }

    handleComprar(event) {
        const productId = event.target.dataset.productId;
        const producto = this.productos.find(p => p.id == productId);
        
        if (producto) {
            // Mostrar modal de opciones de compra
            this.showPurchaseOptions(producto);
        }
    }

    handleContactar(event) {
        const productId = event.target.dataset.productId;
        const producto = this.productos.find(p => p.id == productId);
        
        if (producto && producto.enlaces.whatsapp) {
            // Abrir WhatsApp
            window.open(producto.enlaces.whatsapp, '_blank');
            
            // Mostrar notificación
            this.showNotification('Abriendo WhatsApp...', 'success');
        }
    }

    showPurchaseOptions(producto) {
        const modal = document.createElement('div');
        modal.className = 'purchase-modal';
        modal.innerHTML = `
            <div class="purchase-modal-content">
                <span class="close-modal">&times;</span>
                <h3>Opciones de Compra</h3>
                <div class="product-info">
                    <h4>${producto.nombre}</h4>
                    <p>Precio: $${producto.precio.toFixed(2)}</p>
                </div>
                <div class="purchase-options">
                    <a href="${producto.enlaces.mercadoLibre}" target="_blank" class="purchase-option">
                        <i class="fas fa-shopping-bag"></i>
                        <span>Comprar en MercadoLibre</span>
                    </a>
                    <a href="${producto.enlaces.tienda}" target="_blank" class="purchase-option">
                        <i class="fas fa-store"></i>
                        <span>Tienda Oficial</span>
                    </a>
                    <a href="${producto.enlaces.whatsapp}" target="_blank" class="purchase-option">
                        <i class="fas fa-whatsapp"></i>
                        <span>Contactar por WhatsApp</span>
                    </a>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        
        // Cerrar modal
        modal.querySelector('.close-modal').addEventListener('click', () => {
            document.body.removeChild(modal);
        });
        
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                document.body.removeChild(modal);
            }
        });
        
        // Animación de entrada
        setTimeout(() => modal.classList.add('show'), 10);
    }

    showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => notification.classList.add('show'), 100);
        
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => document.body.removeChild(notification), 300);
        }, 3000);
    }

    animateTabChange(tabName) {
        const activeTab = document.querySelector('.tab-content.active');
        if (activeTab) {
            activeTab.style.animation = 'none';
            setTimeout(() => {
                activeTab.style.animation = 'fadeInUp 0.5s ease-out';
            }, 10);
        }
    }

    animateFilterChange() {
        const cards = document.querySelectorAll('.producto-card');
        cards.forEach((card, index) => {
            card.style.animation = 'none';
            setTimeout(() => {
                card.style.animation = `fadeInUp 0.5s ease-out ${index * 0.1}s both`;
            }, 10);
        });
    }

    animateOnScroll() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.6s ease-out both';
                }
            });
        });

        document.querySelectorAll('.producto-card, .destacado-card').forEach(card => {
            observer.observe(card);
        });
    }

    // Método para cargar productos desde una API (futuro)
    async loadProductsFromAPI() {
        try {
            const response = await fetch('/api/productos');
            const data = await response.json();
            this.productos = data;
            this.updateProductGrid(this.productos);
        } catch (error) {
            console.error('Error cargando productos:', error);
            this.showNotification('Error cargando productos', 'error');
        }
    }
}

// Estilos adicionales para el modal
const modalStyles = `
    .purchase-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .purchase-modal.show {
        opacity: 1;
    }
    
    .purchase-modal-content {
        background: white;
        padding: 30px;
        border-radius: 15px;
        max-width: 400px;
        width: 90%;
        position: relative;
        transform: translateY(-50px);
        transition: transform 0.3s ease;
    }
    
    .purchase-modal.show .purchase-modal-content {
        transform: translateY(0);
    }
    
    .close-modal {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 1.5rem;
        cursor: pointer;
        color: #666;
    }
    
    .purchase-options {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-top: 20px;
    }
    
    .purchase-option {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        text-decoration: none;
        color: #333;
        transition: all 0.3s ease;
    }
    
    .purchase-option:hover {
        border-color: #4CAF50;
        background: #f8f9fa;
    }
    
    .purchase-option i {
        font-size: 1.2rem;
        color: #4CAF50;
    }
    
    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 25px;
        border-radius: 10px;
        color: white;
        font-weight: 600;
        z-index: 1001;
        transform: translateX(400px);
        transition: transform 0.3s ease;
    }
    
    .notification.show {
        transform: translateX(0);
    }
    
    .notification.success {
        background: #4CAF50;
    }
    
    .notification.error {
        background: #f44336;
    }
    
    .notification.info {
        background: #2196F3;
    }
`;

// Agregar estilos al documento
const styleSheet = document.createElement('style'); 
styleSheet.textContent = modalStyles;
document.head.appendChild(styleSheet);

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    new CompraVentaManager();
});

// Exportar para uso en otros archivos
window.CompraVentaManager = CompraVentaManager;