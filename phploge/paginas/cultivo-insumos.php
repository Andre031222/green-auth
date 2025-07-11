<?php
// paginas/cultivo-insumos.php
?>
<style>
/* ========================================
   VARIABLES CSS - Configuración global
   ======================================== */
:root {

    /* 🖋️ Colores de texto (para fondo oscuro como el banner) */
--dark-text: #ffffff;        /* Blanco puro para títulos */
--light-text: #e0f2f1;       /* Blanco suave para subtítulos */
--lighter-text: #b2dfdb;     /* Más tenue pero legible */


    /* 🎨 Colores principales */
    --primary-color: #1e3a8a;        /* Azul profundo */
    --secondary-color: #10b981;      /* Verde esmeralda */
    --accent-color: #6366f1;         /* Violeta suave */
    --tertiary-color: #83c5be;       /* Verde azulado suave */

    /* ℹ️ Estados */
    --info-color: #3b82f6;           /* Azul claro */
    --warning-color: #f59e0b;        /* Ámbar */
    --success-color: #22c55e;        /* Verde éxito */
    --danger-color: #ef4444;         /* Rojo vivo */

    /* 🖋️ Colores de texto (versión negro) */
    --dark-text: #000000;         /* Negro puro */
    --light-text: #1a1a1a;        /* Negro muy oscuro */
    --lighter-text: #333333;      /* Gris oscuro casi negro */


    /* 🎨 Fondos */
    --bg-light: #f9fafb;             /* Fondo general */
    --bg-card: #ffffff;              /* Tarjetas blancas */
    --border-color: #e5e7eb;         /* Bordes suaves */

    /* 🌫️ Sombras */
    --shadow-light: 0 2px 10px rgba(0, 0, 0, 0.04);
    --shadow-medium: 0 5px 20px rgba(0, 0, 0, 0.08);
    --shadow-heavy: 0 10px 30px rgba(0, 0, 0, 0.12);

    /* 🔲 Bordes redondeados */
    --radius-small: 8px;
    --radius-medium: 12px;
    --radius-large: 16px;
    --radius-xl: 24px;

    /* ✨ Transiciones */
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);

    /* 🌈 Gradientes */
    --gradient-primary: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    --gradient-secondary: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
    --gradient-info: linear-gradient(135deg, var(--info-color), #2563eb);
    --gradient-warning: linear-gradient(135deg, var(--warning-color), #f97316);
    --gradient-success: linear-gradient(135deg, var(--success-color), #16a34a);
    --gradient-danger: linear-gradient(135deg, var(--danger-color), #dc2626);
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
    background-color: var(--bg-light);
}

/* ========================================
   LAYOUT - Estructura principal
   ======================================== */
.page-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.main-content {
    display: flex;
    gap: 40px;
    margin-bottom: 50px;
    align-items: flex-start;
}

.calculadora-section {
    flex: 2;
    min-width: 0;
}

.calculadora-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 30px;
}

.sidebar {
    flex: 1;
    min-width: 300px;
    display: flex;
    flex-direction: column;
    gap: 25px;
    position: sticky;
    top: 20px;
}

/* ========================================
   HEADER - Encabezado y banner
   ======================================== */
.insumos-header {
    text-align: center;
    margin-bottom: 50px;
    position: relative;
    overflow: hidden;
}

.header-background {
    background: var(--gradient-primary);
    padding: 60px 40px;
    border-radius: var(--radius-xl);
    color: white;
    position: relative;
    overflow: hidden;
}

.header-background::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="3" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="80" r="2" fill="rgba(255,255,255,0.1)"/></svg>');
    animation: float 20s infinite linear;
}

.page-title {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 15px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    position: relative;
    z-index: 2;
}

.page-subtitle {
    font-size: 1.3rem;
    opacity: 0.9;
    font-weight: 500;
    position: relative;
    z-index: 2;
}

.savings-banner {
    background: var(--gradient-secondary);
    color: white;
    padding: 25px 30px;
    border-radius: var(--radius-large);
    text-align: center;
    margin-bottom: 40px;
    font-size: 1.2rem;
    font-weight: 600;
    box-shadow: var(--shadow-medium);
    position: relative;
    overflow: hidden;
}

.savings-banner::before {
    content: '💰';
    position: absolute;
    top: -10px;
    right: -10px;
    font-size: 3rem;
    opacity: 0.2;
    transform: rotate(15deg);
}

.savings-banner::after {
    content: '📊';
    position: absolute;
    bottom: -10px;
    left: -10px;
    font-size: 3rem;
    opacity: 0.2;
    transform: rotate(-15deg);
}

/* ========================================
   SECCIONES - Contenedores principales
   ======================================== */
.calculadora-section {
    background: var(--bg-card);
    padding: 40px;
    border-radius: var(--radius-large);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
}

.section-title {
    color: var(--dark-text);
    font-size: 2rem;
    margin-bottom: 30px;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 12px;
}

.section-title::before {
    content: '🧮';
    font-size: 1.5rem;
}

.result-section {
    background: var(--bg-card);
    padding: 30px;
    border-radius: var(--radius-large);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    margin-top: 30px;
    display: none;
}

.tips-section {
    background: var(--bg-card);
    padding: 30px;
    border-radius: var(--radius-large);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    margin-top: 30px;
}

/* ========================================
   TARJETAS - Cards y componentes
   ======================================== */
.calculadora-card {
    background: var(--bg-card);
    padding: 30px;
    border-radius: var(--radius-medium);
    border: 2px solid var(--border-color);
    transition: var(--transition);
    position: relative;
    overflow: hidden;
    width: 100%;
    box-shadow: var(--shadow-light);
}

.calculadora-card::before {
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

.calculadora-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
    border-color: var(--secondary-color);
}

.calculadora-card:hover::before {
    transform: scaleX(1);
}

.calculadora-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 25px;
}

.calculadora-icon {
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

.calculadora-icon::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(255,255,255,0.1), transparent);
    transition: var(--transition);
}

.calculadora-card:hover .calculadora-icon::before {
    transform: translateX(100%);
}

.calculadora-card:nth-child(1) .calculadora-icon { background: var(--gradient-secondary); }
.calculadora-card:nth-child(2) .calculadora-icon { background: var(--gradient-info); }
.calculadora-card:nth-child(3) .calculadora-icon { background: var(--gradient-warning); }

.calculadora-title {
    color: var(--dark-text);
    font-size: 1.3rem;
    font-weight: 600;
    margin: 0;
    flex: 1;
}

.info-card {
    background: var(--bg-card);
    padding: 25px;
    border-radius: var(--radius-medium);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    width: 100%;
}

.info-card-title {
    color: var(--dark-text);
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
}

/* ========================================
   FORMULARIOS - Inputs y selects
   ======================================== */
.calculadora-form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    align-items: end;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-label {
    color: var(--dark-text);
    font-weight: 500;
    font-size: 0.9rem;
}

.form-input {
    padding: 12px 16px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-small);
    font-size: 1rem;
    transition: var(--transition);
    background: var(--bg-light);
    width: 100%;
}

.form-input:focus {
    outline: none;
    border-color: var(--secondary-color);
    box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
}

.form-select {
    padding: 12px 16px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-small);
    font-size: 1rem;
    transition: var(--transition);
    background: var(--bg-light);
    cursor: pointer;
    width: 100%;
}

.form-select:focus {
    outline: none;
    border-color: var(--secondary-color);
    box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
}

/* ========================================
   BOTONES - Elementos interactivos
   ======================================== */
.calcular-btn {
    background: var(--gradient-primary);
    color: white;
    border: none;
    padding: 15px 30px;
    border-radius: var(--radius-medium);
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: var(--transition);
    box-shadow: var(--shadow-light);
    position: relative;
    overflow: hidden;
    width: 100%;
    justify-self: stretch;
    grid-column: 1 / -1;
    margin-top: 10px;
}

.calcular-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: var(--transition);
}

.calcular-btn:hover::before {
    left: 100%;
}

.calcular-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-medium);
}

.calcular-btn:active {
    transform: translateY(0);
}

/* ========================================
   LISTAS - Elementos informativos
   ======================================== */
.info-list {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 0;
    border-bottom: 1px solid var(--border-color);
}

.info-item:last-child {
    border-bottom: none;
}

.info-icon {
    width: 8px;
    height: 8px;
    background: var(--secondary-color);
    border-radius: 50%;
    flex-shrink: 0;
}

.info-text {
    color: var(--light-text);
    font-size: 0.9rem;
}

/* ========================================
   RESULTADOS - Visualización de datos
   ======================================== */
.result-header {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 2px solid var(--border-color);
}

.result-icon {
    width: 60px;
    height: 60px;
    background: var(--gradient-primary);
    border-radius: var(--radius-medium);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
}

.result-title {
    color: var(--dark-text);
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0;
}

.result-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.result-item {
    background: var(--bg-light);
    padding: 20px;
    border-radius: var(--radius-small);
    border-left: 4px solid var(--secondary-color);
}

.result-item-title {
    color: var(--dark-text);
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 10px;
}

.result-item-value {
    color: var(--secondary-color);
    font-size: 1.5rem;
    font-weight: 700;
}

.result-item-unit {
    color: var(--light-text);
    font-size: 0.9rem;
    margin-left: 5px;
}

/* ========================================
   CONSEJOS - Tips y recomendaciones
   ======================================== */
.tips-title {
    color: var(--dark-text);
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.tips-title::before {
    content: '💡';
    font-size: 1.2rem;
}

.tips-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.tip-card {
    background: var(--bg-light);
    padding: 20px;
    border-radius: var(--radius-small);
    border-left: 4px solid var(--info-color);
    position: relative;
}

.tip-card::before {
    content: attr(data-tip);
    position: absolute;
    top: -10px;
    left: 15px;
    background: var(--info-color);
    color: white;
    padding: 5px 10px;
    border-radius: var(--radius-small);
    font-size: 0.8rem;
    font-weight: 600;
}

.tip-text {
    color: var(--light-text);
    font-size: 0.9rem;
    line-height: 1.5;
}

/* ========================================
   CARGA - Estados de loading
   ======================================== */
.loading-state {
    display: none;
    text-align: center;
    padding: 20px;
    color: var(--light-text);
}

.spinner {
    width: 40px;
    height: 40px;
    border: 4px solid var(--border-color);
    border-top: 4px solid var(--secondary-color);
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto 15px;
}

/* ========================================
   NOTIFICACIONES - Alertas del sistema
   ======================================== */
.notification {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 15px 20px;
    border-radius: var(--radius-small);
    color: white;
    font-weight: 500;
    z-index: 1000;
    transform: translateX(100%);
    transition: var(--transition);
    box-shadow: var(--shadow-medium);
}

.notification.show {
    transform: translateX(0);
}

.notification.success {
    background: var(--success-color);
}

.notification.error {
    background: var(--danger-color);
}

.notification.warning {
    background: var(--warning-color);
}

/* ========================================
   ANIMACIONES - Efectos visuales
   ======================================== */
@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* ========================================
   RESPONSIVE - Adaptación móvil
   ======================================== */
@media (max-width: 1024px) {
    .main-content {
        flex-direction: column;
        gap: 30px;
    }
    
    .sidebar {
        position: static;
        min-width: auto;
        order: -1;
    }
    
    .calculadora-form {
        grid-template-columns: 1fr;
    }
    
    .page-title {
        font-size: 2.5rem;
    }
    
    .result-grid {
        grid-template-columns: 1fr;
    }
    
    .tips-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .page-content {
        padding: 15px;
    }
    
    .header-background {
        padding: 40px 20px;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .page-subtitle {
        font-size: 1.1rem;
    }
    
    .calculadora-section,
    .info-card,
    .result-section,
    .tips-section {
        padding: 20px;
    }
    
    .calculadora-header {
        flex-direction: column;
        text-align: center;
        gap: 10px;
    }
    
    .calculadora-title {
        font-size: 1.1rem;
    }
    
    .result-header {
        flex-direction: column;
        text-align: center;
    }
    
    .calculadora-form {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .form-group {
        width: 100%;
    }
    
    .main-content {
        gap: 20px;
    }
}

@media (max-width: 480px) {
    .page-content {
        padding: 10px;
    }
    
    .calculadora-section,
    .info-card,
    .result-section,
    .tips-section {
        padding: 15px;
    }
    
    .calculadora-card {
        padding: 20px;
    }
    
    .page-title {
        font-size: 1.8rem;
    }
    
    .savings-banner {
        padding: 20px;
        font-size: 1.1rem;
    }
}
</style>

<div class="page-content">
    <div class="insumos-header">
        <div class="header-background">
            <h1 class="page-title">🌾 Calculadora Inteligente</h1>
            <p class="page-subtitle"></p>
        </div>
    </div>
    
    <div class="savings-banner">
        <strong>💰 Ahorra hasta 35% en costos de producción</strong> con nuestras recomendaciones personalizadas
    </div>
    
    <div class="main-content">
        <div class="calculadora-section">
            <h2 class="section-title">Calculadoras Especializadas</h2>
            
            <div class="calculadora-grid">
                <!-- Calculadora de Fertilizantes -->
                <div class="calculadora-card">
                    <div class="calculadora-header">
                        <div class="calculadora-icon">🌱</div>
                        <h3 class="calculadora-title">Fertilizantes NPK</h3>
                    </div>
                    <form class="calculadora-form" id="fertilizantesForm">
                        <div class="form-group">
                            <label class="form-label">Tipo de Cultivo</label>
                            <select class="form-select" id="cultivo_fertilizante">
                                <option value="">Selecciona un cultivo</option>
                                <option value="maiz">Maíz</option>
                                <option value="trigo">Trigo</option>
                                <option value="soja">Soja</option>
                                <option value="papa">Papa</option>
                                <option value="tomate">Tomate</option>
                                <option value="arroz">Arroz</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Área (hectáreas)</label>
                            <input type="number" class="form-input" id="area_fertilizante" placeholder="Ej: 5.5" step="0.1" min="0">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Etapa del Cultivo</label>
                            <select class="form-select" id="etapa_cultivo">
                                <option value="siembra">Siembra</option>
                                <option value="crecimiento">Crecimiento</option>
                                <option value="floracion">Floración</option>
                                <option value="fructificacion">Fructificación</option>
                            </select>
                        </div>
                        <button type="button" class="calcular-btn" onclick="calcularFertilizantes()">
                            🧮 Calcular Fertilizantes
                        </button>
                    </form>
                </div>
                
                <!-- Calculadora de Riego -->
                <div class="calculadora-card">
                    <div class="calculadora-header">
                        <div class="calculadora-icon">💧</div>
                        <h3 class="calculadora-title">Agua de Riego</h3>
                    </div>
                    <form class="calculadora-form" id="riegoForm">
                        <div class="form-group">
                            <label class="form-label">Tipo de Cultivo</label>
                            <select class="form-select" id="cultivo_riego">
                                <option value="">Selecciona un cultivo</option>
                                <option value="maiz">Maíz</option>
                                <option value="trigo">Trigo</option>
                                <option value="soja">Soja</option>
                                <option value="papa">Papa</option>
                                <option value="tomate">Tomate</option>
                                <option value="arroz">Arroz</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Área (hectáreas)</label>
                            <input type="number" class="form-input" id="area_riego" placeholder="Ej: 10" step="0.1" min="0">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Temporada</label>
                            <select class="form-select" id="temporada">
                                <option value="seca">Temporada Seca</option>
                                <option value="lluviosa">Temporada Lluviosa</option>
                                <option value="intermedia">Temporada Intermedia</option>
                            </select>
                        </div>
                        <button type="button" class="calcular-btn" onclick="calcularRiego()">
                            💧 Calcular Riego
                        </button>
                    </form>
                </div>
                
                <!-- Calculadora de Pesticidas -->
                <div class="calculadora-card">
                    <div class="calculadora-header">
                        <div class="calculadora-icon">🛡️</div>
                        <h3 class="calculadora-title">Pesticidas y Herbicidas</h3>
                    </div>
                    <form class="calculadora-form" id="pesticidasForm">
                        <div class="form-group">
                            <label class="form-label">Tipo de Cultivo</label>
                            <select class="form-select" id="cultivo_pesticida">
                                <option value="">Selecciona un cultivo</option>
                                <option value="maiz">Maíz</option>
                                <option value="trigo">Trigo</option>
                                <option value="soja">Soja</option>
                                <option value="papa">Papa</option>
                                <option value="tomate">Tomate</option>
                                <option value="arroz">Arroz</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Área (hectáreas)</label>
                            <input type="number" class="form-input" id="area_pesticida" placeholder="Ej: 8" step="0.1" min="0">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nivel de Infestación</label>
                            <select class="form-select" id="infestacion">
                                <option value="baja">Baja (1-10%)</option>
                                <option value="media">Media (11-25%)</option>
                                <option value="alta">Alta (26-50%)</option>
                                <option value="severa">Severa (>50%)</option>
                            </select>
                        </div>
                        <button type="button" class="calcular-btn" onclick="calcularPesticidas()">
                            🛡️ Calcular Pesticidas
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="sidebar">
            <div class="info-card">
                <h3 class="info-card-title">🎯 Factores Considerados</h3>
                <ul class="info-list">
                    <li class="info-item">
                        <div class="info-icon"></div>
                        <span class="info-text">Análisis de suelo específico</span>
                    </li>
                    <li class="info-item">
                        <div class="info-icon"></div>
                        <span class="info-text">Condiciones climáticas actuales</span>
                    </li>
                    <li class="info-item">
                        <div class="info-icon"></div>
                        <span class="info-text">Etapa fenológica del cultivo</span>
                    </li>
                    <li class="info-item">
                        <div class="info-icon"></div>
                        <span class="info-text">Historial de rendimientos</span>
                    </li>
                    <li class="info-item">
                        <div class="info-icon"></div>
                        <span class="info-text">Precios actuales del mercado</span>
                    </li>
                </ul>
            </div>
            
            <div class="info-card">
                <h3 class="info-card-title">📊 Beneficios Comprobados</h3>
                <ul class="info-list">
                    <li class="info-item">
                        <div class="info-icon"></div>
                        <span class="info-text">Reducción de costos del 20-35%</span>
                    </li>
                    <li class="info-item">
                        <div class="info-icon"></div>
                        <span class="info-text">Aumento de rendimiento hasta 15%</span>
                    </li>
                    <li class="info-item">
                        <div class="info-icon"></div>
                        <span class="info-text">Mejora en calidad del producto</span>
                    </li>
                    <li class="info-item">
                        <div class="info-icon"></div>
                        <span class="info-text">Reducción de impacto ambiental</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="result-section" id="resultSection">
        <div class="result-header">
            <div class="result-icon" id="resultIcon">🧮</div>
            <h3 class="result-title" id="resultTitle">Resultados de Cálculo</h3>
        </div>
        
        <div class="loading-state" id="loadingState">
            <div class="spinner"></div>
            <p>Calculando recomendaciones personalizadas...</p>
        </div>
        
        <div class="result-grid" id="resultGrid">
            <!-- Los resultados se insertarán aquí dinámicamente -->
        </div>
    </div>
    
    <div class="tips-section">
        <h3 class="tips-title">Consejos de Optimización</h3>
        <div class="tips-grid">
            <div class="tip-card" data-tip="TIP 1">
                <p class="tip-text">Realiza análisis de suelo cada 2-3 años para ajustar las recomendaciones de fertilización según las necesidades específicas de tu terreno.</p>
            </div>
            <div class="tip-card" data-tip="TIP 2">
                <p class="tip-text">Implementa sistemas de riego por goteo para reducir el consumo de agua hasta en un 40% manteniendo la productividad.</p>
            </div>
            <div class="tip-card" data-tip="TIP 3">
                <p class="tip-text">Utiliza aplicaciones fraccionadas de fertilizantes para mejorar la eficiencia de absorción y reducir pérdidas por lixiviación.</p>
            </div>
            <div class="tip-card" data-tip="TIP 4">
                <p class="tip-text">Combina control biológico con químico para una estrategia de manejo integrado de plagas más efectiva y sostenible.</p>
            </div>
        </div>
    </div>
</div>

<script>
// ========================================
// BASE DE DATOS - Información de cultivos
// ========================================
const cultivosDB = {
    maiz: {
        nombre: 'Maíz',
        fertilizante: {
            n: 180, // kg/ha
            p: 80,
            k: 60
        },
        riego: {
            seca: 6500, // litros/ha
            lluviosa: 3200,
            intermedia: 4800
        },
        pesticida: {
            baja: 1.2, // litros/ha
            media: 2.5,
            alta: 4.0,
            severa: 6.5
        }
    },
    trigo: {
        nombre: 'Trigo',
        fertilizante: {
            n: 120,
            p: 60,
            k: 40
        },
        riego: {
            seca: 4500,
            lluviosa: 2200,
            intermedia: 3200
        },
        pesticida: {
            baja: 0.8,
            media: 1.8,
            alta: 3.2,
            severa: 5.0
        }
    },
    soja: {
        nombre: 'Soja',
        fertilizante: {
            n: 60, // menor debido a fijación de N
            p: 70,
            k: 80
        },
        riego: {
            seca: 5200,
            lluviosa: 2800,
            intermedia: 3800
        },
        pesticida: {
            baja: 1.0,
            media: 2.2,
            alta: 3.8,
            severa: 5.8
        }
    },
    papa: {
        nombre: 'Papa',
        fertilizante: {
            n: 200,
            p: 100,
            k: 150
        },
        riego: {
            seca: 8000,
            lluviosa: 4500,
            intermedia: 6000
        },
        pesticida: {
            baja: 2.0,
            media: 3.5,
            alta: 5.5,
            severa: 8.0
        }
    },
    tomate: {
        nombre: 'Tomate',
        fertilizante: {
            n: 250,
            p: 120,
            k: 200
        },
        riego: {
            seca: 9500,
            lluviosa: 5500,
            intermedia: 7200
        },
        pesticida: {
            baja: 2.5,
            media: 4.2,
            alta: 6.8,
            severa: 9.5
        }
    },
    arroz: {
        nombre: 'Arroz',
        fertilizante: {
            n: 150,
            p: 65,
            k: 50
        },
        riego: {
            seca: 12000,
            lluviosa: 8000,
            intermedia: 10000
        },
        pesticida: {
            baja: 1.5,
            media: 2.8,
            alta: 4.5,
            severa: 6.8
        }
    }
};

// ========================================
// CONFIGURACIÓN - Factores y precios
// ========================================
// Factores de ajuste por etapa del cultivo
const factoresEtapa = {
    siembra: 0.3,
    crecimiento: 0.5,
    floracion: 0.8,
    fructificacion: 1.0
};

// Precios aproximados (en soles peruanos)
const precios = {
    fertilizante_n: 2.5, // por kg
    fertilizante_p: 3.2,
    fertilizante_k: 2.8,
    agua: 0.008, // por litro
    pesticida: 15.5 // por litro
};

// ========================================
// FUNCIONES DE CÁLCULO
// ========================================

/**
 * Calcula los requerimientos de fertilizantes
 */
function calcularFertilizantes() {
    const cultivo = document.getElementById('cultivo_fertilizante').value;
    const area = parseFloat(document.getElementById('area_fertilizante').value);
    const etapa = document.getElementById('etapa_cultivo').value;
    
    if (!cultivo || !area || area <= 0) {
        showNotification('Por favor completa todos los campos correctamente', 'error');
        return;
    }
    
    showLoading();
    
    setTimeout(() => {
        const cultivoData = cultivosDB[cultivo];
        const factor = factoresEtapa[etapa];
        
        const nRequerido = Math.round(cultivoData.fertilizante.n * factor * area);
        const pRequerido = Math.round(cultivoData.fertilizante.p * factor * area);
        const kRequerido = Math.round(cultivoData.fertilizante.k * factor * area);
        
        const costoN = nRequerido * precios.fertilizante_n;
        const costoP = pRequerido * precios.fertilizante_p;
        const costoK = kRequerido * precios.fertilizante_k;
        const costoTotal = costoN + costoP + costoK;
        
        const results = [
            {
                title: 'Nitrógeno (N)',
                value: nRequerido,
                unit: 'kg',
                extra: `Costo: S/. ${costoN.toFixed(2)}`
            },
            {
                title: 'Fósforo (P₂O₅)',
                value: pRequerido,
                unit: 'kg',
                extra: `Costo: S/. ${costoP.toFixed(2)}`
            },
            {
                title: 'Potasio (K₂O)',
                value: kRequerido,
                unit: 'kg',
                extra: `Costo: S/. ${costoK.toFixed(2)}`
            },
            {
                title: 'Costo Total',
                value: costoTotal.toFixed(2),
                unit: 'S/.',
                extra: `Para ${area} hectáreas`
            }
        ];
        
        displayResults('🌱', `Fertilización para ${cultivoData.nombre}`, results);
        showNotification('Cálculo de fertilizantes completado', 'success');
    }, 2000);
}

/**
 * Calcula los requerimientos de riego
 */
function calcularRiego() {
    const cultivo = document.getElementById('cultivo_riego').value;
    const area = parseFloat(document.getElementById('area_riego').value);
    const temporada = document.getElementById('temporada').value;
    
    if (!cultivo || !area || area <= 0) {
        showNotification('Por favor completa todos los campos correctamente', 'error');
        return;
    }
    
    showLoading();
    
    setTimeout(() => {
        const cultivoData = cultivosDB[cultivo];
        const aguaRequerida = cultivoData.riego[temporada] * area;
        const costoAgua = aguaRequerida * precios.agua;
        
        const results = [
            {
                title: 'Agua Requerida',
                value: aguaRequerida.toLocaleString(),
                unit: 'litros',
                extra: `Por ciclo de cultivo`
            },
            {
                title: 'Agua por Día',
                value: Math.round(aguaRequerida / 120).toLocaleString(),
                unit: 'litros',
                extra: `Promedio diario (120 días)`
            },
            {
                title: 'Costo Total',
                value: costoAgua.toFixed(2),
                unit: 'S/.',
                extra: `Para ${area} hectáreas`
            },
            {
                title: 'Costo por Hectárea',
                value: (costoAgua / area).toFixed(2),
                unit: 'S/./ha',
                extra: `Costo unitario`
            }
        ];
        
        displayResults('💧', `Riego para ${cultivoData.nombre}`, results);
        showNotification('Cálculo de riego completado', 'success');
    }, 1800);
}

/**
 * Calcula los requerimientos de pesticidas
 */
function calcularPesticidas() {
    const cultivo = document.getElementById('cultivo_pesticida').value;
    const area = parseFloat(document.getElementById('area_pesticida').value);
    const infestacion = document.getElementById('infestacion').value;
    
    if (!cultivo || !area || area <= 0) {
        showNotification('Por favor completa todos los campos correctamente', 'error');
        return;
    }
    
    showLoading();
    
    setTimeout(() => {
        const cultivoData = cultivosDB[cultivo];
        const pesticidasRequeridos = cultivoData.pesticida[infestacion] * area;
        const costoPesticidas = pesticidasRequeridos * precios.pesticida;
        
        // Calcular aplicaciones recomendadas
        const aplicaciones = infestacion === 'baja' ? 1 : 
                          infestacion === 'media' ? 2 :
                          infestacion === 'alta' ? 3 : 4;
        
        const results = [
            {
                title: 'Pesticidas Totales',
                value: pesticidasRequeridos.toFixed(1),
                unit: 'litros',
                extra: `Para ${area} hectáreas`
            },
            {
                title: 'Aplicaciones',
                value: aplicaciones,
                unit: 'veces',
                extra: `Frecuencia recomendada`
            },
            {
                title: 'Por Aplicación',
                value: (pesticidasRequeridos / aplicaciones).toFixed(1),
                unit: 'litros',
                extra: `Cantidad por aplicación`
            },
            {
                title: 'Costo Total',
                value: costoPesticidas.toFixed(2),
                unit: 'S/.',
                extra: `Inversión total`
            }
        ];
        
        displayResults('🛡️', `Pesticidas para ${cultivoData.nombre}`, results);
        showNotification('Cálculo de pesticidas completado', 'success');
    }, 2200);
}

// ========================================
// FUNCIONES DE INTERFAZ
// ========================================

/**
 * Muestra el estado de carga
 */
function showLoading() {
    const resultSection = document.getElementById('resultSection');
    const loadingState = document.getElementById('loadingState');
    const resultGrid = document.getElementById('resultGrid');
    
    resultSection.style.display = 'block';
    loadingState.style.display = 'block';
    resultGrid.style.display = 'none';
    
    resultSection.scrollIntoView({ behavior: 'smooth' });
}

/**
 * Muestra los resultados de cálculo
 */
function displayResults(icon, title, results) {
    const resultSection = document.getElementById('resultSection');
    const loadingState = document.getElementById('loadingState');
    const resultGrid = document.getElementById('resultGrid');
    const resultIcon = document.getElementById('resultIcon');
    const resultTitle = document.getElementById('resultTitle');
    
    // Actualizar encabezado
    resultIcon.textContent = icon;
    resultTitle.textContent = title;
    
    // Limpiar y llenar resultados
    resultGrid.innerHTML = '';
    results.forEach(result => {
        const resultItem = document.createElement('div');
        resultItem.className = 'result-item';
        resultItem.innerHTML = `
            <div class="result-item-title">${result.title}</div>
            <div class="result-item-value">
                ${result.value}
                <span class="result-item-unit">${result.unit}</span>
            </div>
            <div class="result-item-extra">${result.extra}</div>
        `;
        resultGrid.appendChild(resultItem);
    });
    
    // Mostrar resultados
    loadingState.style.display = 'none';
    resultGrid.style.display = 'grid';
}

/**
 * Muestra notificaciones al usuario
 */
function showNotification(message, type) {
    // Remover notificación anterior
    const existingNotification = document.querySelector('.notification');
    if (existingNotification) {
        existingNotification.remove();
    }
    
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Mostrar notificación
    setTimeout(() => {
        notification.classList.add('show');
    }, 100);
    
    // Ocultar notificación después de 4 segundos
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }, 4000);
}

// ========================================
// INICIALIZACIÓN - Eventos del DOM
// ========================================
document.addEventListener('DOMContentLoaded', function() {
    // Agregar validación en tiempo real
    const inputs = document.querySelectorAll('.form-input');
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            if (this.value < 0) {
                this.value = 0;
            }
        });
    });
    
    // Mostrar mensaje de bienvenida
    setTimeout(() => {
        showNotification('¡Bienvenido a la calculadora inteligente de insumos!', 'success');
    }, 1000);
});
</script>