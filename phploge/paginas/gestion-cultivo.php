<?php
// paginas/gestion-cultivo.php
?>
<style>
/* ========================================
   VARIABLES CSS - Configuración global
   ======================================== */
:root {
    /* Colores principales */
    --primary-color: #2c5530;
    --secondary-color: #4CAF50;
    --accent-color: #66BB6A;
    --tertiary-color: #81C784;
    --info-color: #2196F3;
    --warning-color: #FF9800;
    --success-color: #4CAF50;
    --danger-color: #f44336;
    --purple-color: #9C27B0;
    --teal-color: #009688;
    
    /* Colores de texto */
    --dark-text: #2c3e50;
    --light-text: #666;
    --lighter-text: #999;
    
    /* Fondos */
    --bg-light: #f8fffe;
    --bg-card: #ffffff;
    --border-color: #e0e6ed;
    
    /* Sombras */
    --shadow-light: 0 4px 15px rgba(0,0,0,0.08);
    --shadow-medium: 0 8px 25px rgba(0,0,0,0.12);
    --shadow-heavy: 0 15px 35px rgba(0,0,0,0.18);
    
    /* Bordes redondeados */
    --radius-small: 8px;
    --radius-medium: 12px;
    --radius-large: 16px;
    --radius-xl: 24px;
    
    /* Transiciones */
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-fast: all 0.2s ease;
    
    /* Gradientes */
    --gradient-primary: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    --gradient-secondary: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
    --gradient-info: linear-gradient(135deg, var(--info-color) 0%, #1976D2 100%);
    --gradient-warning: linear-gradient(135deg, var(--warning-color) 0%, #F57C00 100%);
    --gradient-purple: linear-gradient(135deg, var(--purple-color) 0%, #7B1FA2 100%);
    --gradient-teal: linear-gradient(135deg, var(--teal-color) 0%, #00695C 100%);
    
    /* Glassmorphism */
    --glass-bg: rgba(255, 255, 255, 0.25);
    --glass-border: rgba(255, 255, 255, 0.18);
    --glass-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
}

/* ========================================
   RESET Y BASE - Estilos fundamentales
   ======================================== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    line-height: 1.6;
    color: var(--dark-text);
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
}

/* ========================================
   LAYOUT - Estructura principal
   ======================================== */
.page-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px 20px;
}

/* ========================================
   HEADER - Encabezado principal
   ======================================== */
.cultivo-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
    padding: 30px 0;
    position: relative;
}

.cultivo-header::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--gradient-primary);
    border-radius: 2px;
}

.page-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--dark-text);
    margin: 0;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    position: relative;
}

.page-title::before {
    content: '🌾';
    margin-right: 15px;
    font-size: 2rem;
}

.btn-agregar {
    background: var(--gradient-primary);
    color: white;
    border: none;
    padding: 15px 30px;
    border-radius: var(--radius-xl);
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: var(--transition);
    box-shadow: var(--shadow-light);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 10px;
}

.btn-agregar::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: var(--transition);
}

.btn-agregar:hover::before {
    left: 100%;
}

.btn-agregar:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-medium);
}

.btn-agregar:active {
    transform: translateY(-1px);
}

/* ========================================
   TABS - Pestañas de navegación
   ======================================== */
.cultivo-tabs {
    display: flex;
    gap: 15px;
    margin-bottom: 40px;
    padding: 5px;
    background: var(--bg-card);
    border-radius: var(--radius-large);
    box-shadow: var(--shadow-light);
    overflow-x: auto;
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.cultivo-tabs::-webkit-scrollbar {
    display: none;
}

.cultivo-tab {
    padding: 15px 25px;
    border: none;
    background: transparent;
    cursor: pointer;
    border-radius: var(--radius-medium);
    transition: var(--transition);
    font-size: 1rem;
    font-weight: 500;
    color: var(--light-text);
    position: relative;
    white-space: nowrap;
    min-width: fit-content;
}

.cultivo-tab::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 3px;
    background: var(--gradient-primary);
    border-radius: 2px;
    transition: var(--transition);
}

.cultivo-tab.active {
    color: var(--secondary-color);
    background: rgba(76, 175, 80, 0.1);
    font-weight: 600;
}

.cultivo-tab.active::before {
    width: 80%;
}

.cultivo-tab:hover:not(.active) {
    background: rgba(76, 175, 80, 0.05);
    color: var(--secondary-color);
}

/* ========================================
   CULTIVOS GRID - Tarjetas de cultivos
   ======================================== */
.cultivos-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.cultivo-card {
    background: var(--bg-card);
    padding: 30px;
    border-radius: var(--radius-large);
    box-shadow: var(--shadow-light);
    transition: var(--transition);
    position: relative;
    overflow: hidden;
    border: 2px solid transparent;
}

.cultivo-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
    transform: scaleX(0);
    transition: var(--transition);
}

.cultivo-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-medium);
    border-color: var(--secondary-color);
}

.cultivo-card:hover::before {
    transform: scaleX(1);
}

.cultivo-image {
    width: 100%;
    height: 180px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: var(--radius-medium);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 4rem;
    color: var(--light-text);
    position: relative;
    overflow: hidden;
}

.cultivo-image::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
    transform: translateX(-100%);
    transition: var(--transition);
}

.cultivo-card:hover .cultivo-image::before {
    transform: translateX(100%);
}

.cultivo-info h3 {
    color: var(--dark-text);
    font-size: 1.4rem;
    font-weight: 700;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.cultivo-info h3::after {
    content: '';
    flex: 1;
    height: 2px;
    background: linear-gradient(90deg, var(--secondary-color), transparent);
    border-radius: 1px;
}

.cultivo-meta {
    color: var(--light-text);
    font-size: 0.9rem;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.cultivo-meta::before {
    content: '📅';
    font-size: 1rem;
}

.cultivo-status {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 15px;
}

.status-badge {
    padding: 8px 16px;
    border-radius: var(--radius-xl);
    font-size: 0.85rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    position: relative;
    overflow: hidden;
}

.status-badge::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
    transform: translateX(-100%);
    transition: var(--transition);
}

.status-badge:hover::before {
    transform: translateX(100%);
}

.status-bueno {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    color: #155724;
    border: 1px solid #c3e6cb;
}

.status-excelente {
    background: linear-gradient(135deg, #cce5ff 0%, #b3d9ff 100%);
    color: #004085;
    border: 1px solid #b3d9ff;
}

.status-regular {
    background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
    color: #856404;
    border: 1px solid #ffeaa7;
}

.cultivo-accion {
    color: var(--light-text);
    font-size: 0.9rem;
    padding: 12px 16px;
    background: rgba(76, 175, 80, 0.05);
    border-radius: var(--radius-small);
    border-left: 4px solid var(--secondary-color);
    margin-top: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.cultivo-accion::before {
    content: '⚡';
    font-size: 1rem;
}

.cultivo-actions {
    display: flex;
    gap: 12px;
    margin-top: 20px;
}

.action-btn {
    flex: 1;
    padding: 12px 16px;
    border: 2px solid var(--border-color);
    background: var(--bg-card);
    border-radius: var(--radius-medium);
    cursor: pointer;
    transition: var(--transition);
    text-align: center;
    font-size: 0.9rem;
    font-weight: 500;
    color: var(--dark-text);
    position: relative;
    overflow: hidden;
}

.action-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-primary);
    opacity: 0;
    transition: var(--transition);
}

.action-btn:hover {
    border-color: var(--secondary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-light);
}

.action-btn:hover::before {
    opacity: 1;
}

.action-btn span {
    position: relative;
    z-index: 1;
}

/* ========================================
   HERRAMIENTAS - Sección de herramientas
   ======================================== */
.herramientas-section {
    margin-top: 60px;
    padding: 40px 0;
    position: relative;
}

.herramientas-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--gradient-secondary);
    border-radius: 2px;
}

.herramientas-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--dark-text);
    margin-bottom: 30px;
    text-align: center;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
}

.herramientas-title::before {
    content: '🛠️';
    font-size: 1.8rem;
}

.herramientas-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
}

.herramienta-card {
    background: var(--bg-card);
    padding: 25px;
    border-radius: var(--radius-large);
    box-shadow: var(--shadow-light);
    display: flex;
    align-items: center;
    gap: 20px;
    cursor: pointer;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
    border: 2px solid transparent;
}

.herramienta-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-info);
    transform: scaleX(0);
    transition: var(--transition);
}

.herramienta-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-medium);
    border-color: var(--info-color);
}

.herramienta-card:hover::before {
    transform: scaleX(1);
}

.herramienta-icon {
    width: 60px;
    height: 60px;
    border-radius: var(--radius-medium);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    position: relative;
    overflow: hidden;
    flex-shrink: 0;
}

.herramienta-icon::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(255,255,255,0.1), transparent);
    transform: translateX(-100%);
    transition: var(--transition);
}

.herramienta-card:hover .herramienta-icon::before {
    transform: translateX(100%);
}

.herramienta-card:nth-child(1) .herramienta-icon { background: var(--gradient-primary); }
.herramienta-card:nth-child(2) .herramienta-icon { background: var(--gradient-info); }
.herramienta-card:nth-child(3) .herramienta-icon { background: var(--gradient-warning); }
.herramienta-card:nth-child(4) .herramienta-icon { background: var(--gradient-purple); }

.herramienta-content h4 {
    color: var(--dark-text);
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 8px;
    line-height: 1.4;
}

.herramienta-content p {
    color: var(--light-text);
    font-size: 0.9rem;
    line-height: 1.5;
    margin: 0;
}

/* ========================================
   ANIMACIONES - Efectos visuales
   ======================================== */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.cultivo-card {
    animation: fadeInUp 0.6s ease-out;
}

.cultivo-card:nth-child(1) { animation-delay: 0.1s; }
.cultivo-card:nth-child(2) { animation-delay: 0.2s; }
.cultivo-card:nth-child(3) { animation-delay: 0.3s; }

.herramienta-card {
    animation: fadeInUp 0.6s ease-out;
}

.herramienta-card:nth-child(1) { animation-delay: 0.1s; }
.herramienta-card:nth-child(2) { animation-delay: 0.2s; }
.herramienta-card:nth-child(3) { animation-delay: 0.3s; }
.herramienta-card:nth-child(4) { animation-delay: 0.4s; }

/* ========================================
   RESPONSIVE - Adaptación móvil
   ======================================== */
@media (max-width: 1024px) {
    .cultivos-grid {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
    }
    
    .herramientas-grid {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .page-content {
        padding: 20px 15px;
    }
    
    .cultivo-header {
        flex-direction: column;
        gap: 20px;
        text-align: center;
        padding: 20px 0;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .cultivo-tabs {
        justify-content: center;
        padding: 8px;
    }
    
    .cultivo-tab {
        padding: 12px 20px;
        font-size: 0.9rem;
    }
    
    .cultivos-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .cultivo-card {
        padding: 25px;
    }
    
    .cultivo-image {
        height: 150px;
        font-size: 3rem;
    }
    
    .herramientas-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .herramienta-card {
        padding: 20px;
        gap: 15px;
    }
    
    .herramienta-icon {
        width: 50px;
        height: 50px;
    }
    
    .herramientas-title {
        font-size: 1.6rem;
    }
}

@media (max-width: 480px) {
    .page-content {
        padding: 15px 10px;
    }
    
    .cultivo-header {
        padding: 15px 0;
    }
    
    .page-title {
        font-size: 1.8rem;
    }
    
    .btn-agregar {
        padding: 12px 20px;
        font-size: 0.9rem;
    }
    
    .cultivo-card {
        padding: 20px;
    }
    
    .cultivo-actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .action-btn {
        width: 100%;
    }
    
    .herramienta-card {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    
    .herramienta-icon {
        margin-bottom: 10px;
    }
}

/* ========================================
   UTILIDADES - Clases auxiliares
   ======================================== */
.text-center { text-align: center; }
.text-left { text-align: left; }
.text-right { text-align: right; }

.mb-0 { margin-bottom: 0; }
.mb-1 { margin-bottom: 8px; }
.mb-2 { margin-bottom: 16px; }
.mb-3 { margin-bottom: 24px; }

.mt-0 { margin-top: 0; }
.mt-1 { margin-top: 8px; }
.mt-2 { margin-top: 16px; }
.mt-3 { margin-top: 24px; }

.opacity-50 { opacity: 0.5; }
.opacity-75 { opacity: 0.75; }

.d-none { display: none; }
.d-block { display: block; }
.d-flex { display: flex; }
</style>

<div class="page-content">
    <!-- Header Principal -->
    <div class="cultivo-header">
        <h1 class="page-title">Gestión de Cultivos</h1>
        <button class="btn-agregar">
            <span>➕</span>
            <span>Agregar Cultivo</span>
        </button>
    </div>
    
    <!-- Tabs de Navegación -->
    <div class="cultivo-tabs">
        <button class="cultivo-tab active" data-cultivo="papa">🥔 Papa</button>
        <button class="cultivo-tab" data-cultivo="oca">🍠 Oca</button>
        <button class="cultivo-tab" data-cultivo="avena">🌾 Avena</button>
        <button class="cultivo-tab" data-cultivo="alfalfa">🌿 Alfalfa</button>
        <button class="cultivo-tab" data-cultivo="quinoa">🌾 Quinoa</button>
        <button class="cultivo-tab" data-cultivo="maiz">🌽 Maíz</button>
    </div>
    
    <!-- Grid de Cultivos -->
    <div class="cultivos-grid">
        <!-- Cultivo 1: Habas -->
        <div class="cultivo-card">
            <div class="cultivo-image">🌱</div>
            <div class="cultivo-info">
                <h3>Habas Tempranas</h3>
                <p class="cultivo-meta">35 días desde la siembra</p>
                <div class="cultivo-status">
                    <span class="status-badge status-bueno">Estado: Bueno</span>
                </div>
                <div class="cultivo-accion">
                    <strong>Próxima acción:</strong> Riego programado
                </div>
            </div>
            <div class="cultivo-actions">
                <button class="action-btn">
                    <span>👁️ Ver</span>
                </button>
                <button class="action-btn">
                    <span>📝 Editar</span>
                </button>
                <button class="action-btn">
                    <span>📊 Datos</span>
                </button>
            </div>
        </div>
        
        <!-- Cultivo 2: Papa -->
        <div class="cultivo-card">
            <div class="cultivo-image">🥔</div>
            <div class="cultivo-info">
                <h3>Papa Amarilla</h3>
                <p class="cultivo-meta">60 días desde la siembra</p>
                <div class="cultivo-status">
                    <span class="status-badge status-excelente">Estado: Excelente</span>
                </div>
                <div class="cultivo-accion">
                    <strong>Próxima acción:</strong> Aplicar fertilizante NPK
                </div>
            </div>
            <div class="cultivo-actions">
                <button class="action-btn">
                    <span>👁️ Ver</span>
                </button>
                <button class="action-btn">
                    <span>📝 Editar</span>
                </button>
                <button class="action-btn">
                    <span>📊 Datos</span>
                </button>
            </div>
        </div>
        
        <!-- Cultivo 3: Oca -->
        <div class="cultivo-card">
            <div class="cultivo-image">🍠</div>
            <div class="cultivo-info">
                <h3>Oca Morada</h3>
                <p class="cultivo-meta">20 días desde la siembra</p>
                <div class="cultivo-status">
                    <span class="status-badge status-regular">Estado: Regular</span>
                </div>
                <div class="cultivo-accion">
                    <strong>Próxima acción:</strong> Control de plagas
                </div>
            </div>
            <div class="cultivo-actions">
                <button class="action-btn">
                    <span>👁️ Ver</span>
                </button>
                <button class="action-btn">
                    <span>📝 Editar</span>
                </button>
                <button class="action-btn">
                    <span>📊 Datos</span>
                </button>
            </div>
        </div>
        
        <!-- Cultivo 4: Quinoa -->
        <div class="cultivo-card">
            <div class="cultivo-image">🌾</div>
            <div class="cultivo-info">
                <h3>Quinoa Real</h3>
                <p class="cultivo-meta">45 días desde la siembra</p>
                <div class="cultivo-status">
                    <span class="status-badge status-bueno">Estado: Bueno</span>
                </div>
                <div class="cultivo-accion">
                    <strong>Próxima acción:</strong> Monitoreo de crecimiento
                </div>
            </div>
            <div class="cultivo-actions">
                <button class="action-btn">
                    <span>👁️ Ver</span>
                </button>
                <button class="action-btn">
                    <span>📝 Editar</span>
                </button>
                <button class="action-btn">
                    <span>📊 Datos</span>
                </button>
            </div>
        </div>
        
        <!-- Cultivo 5: Maíz -->
        <div class="cultivo-card">
            <div class="cultivo-image">🌽</div>
            <div class="cultivo-info">
                <h3>Maíz Blanco</h3>
                <p class="cultivo-meta">30 días desde la siembra</p>
                <div class="cultivo-status">
                    <span class="status-badge status-excelente">Estado: Excelente</span>
                </div>
                <div class="cultivo-accion">
                    <strong>Próxima acción:</strong> Aplicar abono orgánico
                </div>
            </div>
            <div class="cultivo-actions">
                <button class="action-btn">
                    <span>👁️ Ver</span>
                </button>
                <button class="action-btn">
                    <span>📝 Editar</span>
                </button>
                <button class="action-btn">
                    <span>📊 Datos</span>
                </button>
            </div>
        </div>
        
        <!-- Cultivo 6: Alfalfa -->
        <div class="cultivo-card">
            <div class="cultivo-image">🌿</div>
            <div class="cultivo-info">
                <h3>Alfalfa Perenne</h3>
                <p class="cultivo-meta">85 días desde la siembra</p>
                <div class="cultivo-status">
                    <span class="status-badge status-bueno">Estado: Bueno</span>
                </div>
                <div class="cultivo-accion">
                    <strong>Próxima acción:</strong> Preparar para corte
                </div>
            </div>
            <div class="cultivo-actions">
                <button class="action-btn">
                    <span>👁️ Ver</span>
                </button>
                <button class="action-btn">
                    <span>📝 Editar</span>
                </button>
                <button class="action-btn">
                    <span>📊 Datos</span>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Sección de Herramientas -->
    <div class="herramientas-section">
        <h2 class="herramientas-title">Herramientas de Gestión</h2>
        <div class="herramientas-grid">
            <div class="herramienta-card">
                <div class="herramienta-icon">📋</div>
                <div class="herramienta-content">
                    <h4>Formulario Guiado</h4>
                    <p>Asistente inteligente para agregar nuevos cultivos con recomendaciones personalizadas</p>
                </div>
            </div>
            
            <div class="herramienta-card">
                <div class="herramienta-icon">📅</div>
                <div class="herramienta-content">
                    <h4>Calendario Agrícola</h4>
                    <p>Planifica y programa todas las actividades de tu campo con recordatorios automáticos</p>
                </div>
            </div>
            
            <div class="herramienta-card">
                <div class="herramienta-icon">✅</div>
                <div class="herramienta-content">
                    <h4>Registro de Tareas</h4>
                    <p>Lleva un control detallado de todas las tareas realizadas y su impacto en la producción</p>
                </div>
            </div>
            
            <div class="herramienta-card">
                <div class="herramienta-icon">📊</div>
                <div class="herramienta-content">
                    <h4>Análisis de Rendimiento</h4>
                    <p>Visualiza estadísticas detalladas y obtén insights para optimizar tus cultivos</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// ========================================
// GESTIÓN DE TABS - Navegación
// ========================================
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.cultivo-tab');
    const cards = document.querySelectorAll('.cultivo-card');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remover clase active de todos los tabs
            tabs.forEach(t => t.classList.remove('active'));
            
            // Agregar clase active al tab clickeado
            this.classList.add('active');
            
            // Filtrar cultivos (simulación - en producción filtrarías por tipo)
            const cultivo = this.dataset.cultivo;
            console.log(`Mostrando cultivos de tipo: ${cultivo}`);
        });
    });
    
    // ========================================
    // INTERACCIONES DE TARJETAS
    // ========================================
    
    // Botones de acción
    document.querySelectorAll('.action-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const action = this.textContent.trim();
            console.log(`Acción: ${action}`);
            
            // Efecto visual
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
    
    // Tarjetas de herramientas
    document.querySelectorAll('.herramienta-card').forEach(card => {
        card.addEventListener('click', function() {
            const titulo = this.querySelector('h4').textContent;
            console.log(`Abriendo herramienta: ${titulo}`);
            
            // Animación de click
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
    
    // Botón agregar cultivo
    document.querySelector('.btn-agregar').addEventListener('click', function() {
        console.log('Abriendo formulario para agregar cultivo');
        
        // Animación de click
        this.style.transform = 'scale(0.95)';
        setTimeout(() => {
            this.style.transform = '';
        }, 150);
    });
    
    // ========================================
    // EFECTOS DE HOVER MEJORADOS
    // ========================================
    
    // Efecto parallax suave en las tarjetas
    document.querySelectorAll('.cultivo-card').forEach(card => {
        card.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;
            
            this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px)`;
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });
    
    // ========================================
    // ANIMACIONES DE ENTRADA
    // ========================================
    
    // Intersection Observer para animaciones
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Aplicar observer a elementos
    document.querySelectorAll('.cultivo-card, .herramienta-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
    
    // ========================================
    // UTILIDADES Y HELPERS
    // ========================================
    
    // Función para mostrar notificaciones
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            background: ${type === 'success' ? '#4CAF50' : type === 'error' ? '#f44336' : '#2196F3'};
            color: white;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            z-index: 1000;
            font-weight: 500;
            transform: translateX(100%);
            transition: transform 0.3s ease;
        `;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
    
    // Mostrar notificación de bienvenida
    setTimeout(() => {
        showNotification('¡Bienvenido a la gestión de cultivos!', 'success');
    }, 1000);
});
</script>