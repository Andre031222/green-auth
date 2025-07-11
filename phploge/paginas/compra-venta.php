<?php
// paginas/compra-venta.php
?>

<!-- Incluir CSS específico -->
<link rel="stylesheet" href="assets/css/compra-venta.css">

<div class="page-content">
    <!-- Header con estadísticas -->
    <div class="compra-venta-header">
        <div>
            <h2 class="page-title">Marketplace Agrícola</h2>
            <p class="page-subtitle">Conecta con proveedores y compradores de productos agrícolas</p>
        </div>
        <div class="page-stats">
            <div class="stat-item">
                <div class="stat-value">1,247</div>
                <div class="stat-label">Productos</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">89</div>
                <div class="stat-label">Vendedores</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">156</div>
                <div class="stat-label">Ventas Hoy</div>
            </div>
        </div>
    </div>

    <!-- Pestañas -->
    <div class="tabs-container">
        <button class="tab-btn active" onclick="showTab('compra')">
            <i class="fas fa-shopping-cart"></i> Compra
        </button>
        <button class="tab-btn" onclick="showTab('venta')">
            <i class="fas fa-store"></i> Venta
        </button>
    </div>
    
    <!-- Contenido de Compra -->
    <div id="compra-tab" class="tab-content active">
        <!-- Sección de búsqueda -->
        <div class="search-section">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Buscar productos, marcas o categorías...">
                <button class="search-btn">
                    <i class="fas fa-filter"></i>
                </button>
            </div>
            <div class="filters">
                <button class="filter-btn active"><span>Todos</span></button>
                <button class="filter-btn"><span>Semillas</span></button>
                <button class="filter-btn"><span>Fertilizantes</span></button>
                <button class="filter-btn"><span>Pesticidas</span></button>
                <button class="filter-btn"><span>Herramientas</span></button>
                <button class="filter-btn"><span>Equipos</span></button>
                <button class="filter-btn"><span>Bioinsecticidas</span></button>
            </div>
        </div>
        
        <!-- Grid de productos -->
        <div class="productos-grid">
            <!-- Los productos se cargarán dinámicamente con JavaScript -->
        </div>

        <!-- Sección de categorías destacadas -->
        <div class="destacados-section">
            <h3 class="destacados-title">Categorías Más Populares</h3>
            <div class="destacados-grid">
                <div class="destacado-card" data-category="fertilizantes">
                    <div class="destacado-icon">🌱</div>
                    <h4 class="destacado-name">Fertilizantes</h4>
                    <p class="destacado-description">Productos para nutrición vegetal y mejora del suelo</p>
                </div>
                
                <div class="destacado-card" data-category="semillas">
                    <div class="destacado-icon">🌾</div>
                    <h4 class="destacado-name">Semillas</h4>
                    <p class="destacado-description">Variedades certificadas de alta calidad</p>
                </div>
                
                <div class="destacado-card" data-category="proteccion">
                    <div class="destacado-icon">🛡️</div>
                    <h4 class="destacado-name">Protección</h4>
                    <p class="destacado-description">Control de plagas y enfermedades</p>
                </div>
                
                <div class="destacado-card" data-category="maquinaria">
                    <div class="destacado-icon">🚜</div>
                    <h4 class="destacado-name">Maquinaria</h4>
                    <p class="destacado-description">Equipos y herramientas agrícolas</p>
                </div>
                
                <div class="destacado-card" data-category="organicos">
                    <div class="destacado-icon">🍃</div>
                    <h4 class="destacado-name">Orgánicos</h4>
                    <p class="destacado-description">Productos ecológicos y sostenibles</p>
                </div>
                
                <div class="destacado-card" data-category="riego">
                    <div class="destacado-icon">💧</div>
                    <h4 class="destacado-name">Riego</h4>
                    <p class="destacado-description">Sistemas de irrigación eficientes</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Contenido de Venta -->
    <div id="venta-tab" class="tab-content">
        <!-- Sección principal de venta -->
        <div class="venta-section">
            <h2 class="venta-title">¿Tienes productos agrícolas para vender?</h2>
            <p class="venta-description">
                Únete a nuestra plataforma y conecta con miles de agricultores y compradores. 
                Publica tus productos de forma fácil, segura y gratuita.
            </p>
            <button class="venta-btn" onclick="mostrarFormularioVenta()">
                <i class="fas fa-plus"></i> Publicar Producto
            </button>
        </div>
        
        <!-- Beneficios de vender -->
        <div class="destacados-section">
            <h3 class="destacados-title">Beneficios de Vender con Nosotros</h3>
            <div class="destacados-grid">
                <div class="destacado-card">
                    <div class="destacado-icon">📈</div>
                    <h4 class="destacado-name">Mayor Alcance</h4>
                    <p class="destacado-description">Llega a miles de compradores potenciales</p>
                </div>
                
                <div class="destacado-card">
                    <div class="destacado-icon">💰</div>
                    <h4 class="destacado-name">Mejores Precios</h4>
                    <p class="destacado-description">Obtén el mejor valor por tus productos</p>
                </div>
                
                <div class="destacado-card">
                    <div class="destacado-icon">🔒</div>
                    <h4 class="destacado-name">Transacciones Seguras</h4>
                    <p class="destacado-description">Pagos protegidos y garantizados</p>
                </div>
                
                <div class="destacado-card">
                    <div class="destacado-icon">📱</div>
                    <h4 class="destacado-name">Fácil Gestión</h4>
                    <p class="destacado-description">Administra tus ventas desde cualquier lugar</p>
                </div>
            </div>
        </div>

        <!-- Categorías más vendidas -->
        <div class="destacados-section">
            <h3 class="destacados-title">Categorías Más Vendidas</h3>
            <div class="destacados-grid">
                <div class="destacado-card">
                    <div class="destacado-icon">🌱</div>
                    <h4 class="destacado-name">Fertilizantes</h4>
                    <p class="destacado-description">Alta demanda todo el año</p>
                    <small style="color: #4CAF50; font-weight: bold;">+23% este mes</small>
                </div>
                
                <div class="destacado-card">
                    <div class="destacado-icon">🌾</div>
                    <h4 class="destacado-name">Semillas</h4>
                    <p class="destacado-description">Especialmente en época de siembra</p>
                    <small style="color: #4CAF50; font-weight: bold;">+45% este mes</small>
                </div>
                
                <div class="destacado-card">
                    <div class="destacado-icon">🛡️</div>
                    <h4 class="destacado-name">Protección</h4>
                    <p class="destacado-description">Pesticidas y fungicidas</p>
                    <small style="color: #4CAF50; font-weight: bold;">+18% este mes</small>
                </div>
                
                <div class="destacado-card">
                    <div class="destacado-icon">🚜</div>
                    <h4 class="destacado-name">Maquinaria</h4>
                    <p class="destacado-description">Equipos nuevos y usados</p>
                    <small style="color: #4CAF50; font-weight: bold;">+12% este mes</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Incluir JavaScript específico -->
<script src="assets/js/compra-venta.js"></script>

<script>
// Función específica para mostrar formulario de venta
function mostrarFormularioVenta() {
    const modal = document.createElement('div');
    modal.className = 'purchase-modal';
    modal.innerHTML = `
        <div class="purchase-modal-content" style="max-width: 600px;">
            <span class="close-modal">&times;</span>
            <h3><i class="fas fa-plus-circle"></i> Publicar Producto</h3>
            <form class="venta-form">
                <div class="form-group">
                    <label>Nombre del Producto</label>
                    <input type="text" required placeholder="Ej: Fertilizante NPK 15-15-15">
                </div>
                
                <div class="form-group">
                    <label>Categoría</label>
                    <select required>
                        <option value="">Selecciona una categoría</option>
                        <option value="fertilizantes">Fertilizantes</option>
                        <option value="semillas">Semillas</option>
                        <option value="pesticidas">Pesticidas</option>
                        <option value="herramientas">Herramientas</option>
                        <option value="equipos">Equipos</option>
                        <option value="bioinsecticidas">Bioinsecticidas</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea required placeholder="Describe tu producto..."></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Precio (S/)</label>
                        <input type="number" required step="0.01" placeholder="0.00">
                    </div>
                    <div class="form-group">
                        <label>Cantidad Disponible</label>
                        <input type="number" required placeholder="0">
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Información de Contacto</label>
                    <input type="tel" required placeholder="Número de WhatsApp">
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn-cancel">Cancelar</button>
                    <button type="submit" class="btn-submit">Publicar Producto</button>
                </div>
            </form>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    // Estilos para el formulario
    const formStyles = `
        .venta-form {
            margin-top: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #333;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #4CAF50;
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }
        
        .form-actions {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
        }
        
        .btn-cancel,
        .btn-submit {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-cancel {
            background: #f8f9fa;
            color: #666;
            border: 2px solid #e0e0e0;
        }
        
        .btn-cancel:hover {
            background: #e9ecef;
        }
        
        .btn-submit {
            background: #4CAF50;
            color: white;
        }
        
        .btn-submit:hover {
            background: #45a049;
        }
    `;
    
    const styleSheet = document.createElement('style');
    styleSheet.textContent = formStyles;
    document.head.appendChild(styleSheet);
    
    // Event listeners
    modal.querySelector('.close-modal').addEventListener('click', () => {
        document.body.removeChild(modal);
    });
    
    modal.querySelector('.btn-cancel').addEventListener('click', () => {
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

// Función para mostrar pestaña (mantener compatibilidad)
function showTab(tabName) {
    const event = { target: document.querySelector(`[onclick="showTab('${tabName}')"]`) };
    if (window.CompraVentaManager) {
        // Si la clase está disponible, usar su método
        const manager = new CompraVentaManager();
        manager.showTab(event);
    } else {
        // Fallback básico
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.remove('active');
        });
        
        document.querySelectorAll('.tab-btn').forEach(button => {
            button.classList.remove('active');
        });
        
        document.getElementById(tabName + '-tab').classList.add('active');
        event.target.classList.add('active');
    }
}
</script>