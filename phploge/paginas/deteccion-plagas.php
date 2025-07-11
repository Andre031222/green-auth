<?php
// paginas/deteccion-plagas.php
?>
<style>
:root {
    --primary-color: #1e3a8a;       /* Azul profundo */
    --secondary-color: #10b981;     /* Verde esmeralda */
    --accent-color: #6366f1;        /* Violeta suave */
    --danger-color: #ef4444;        /* Rojo vivo */
    --warning-color: #f59e0b;       /* Amarillo ámbar */
    --info-color: #3b82f6;          /* Azul claro */
    --success-color: #22c55e;       /* Verde brillante */

    --light-bg: #f9fafb;            /* Gris claro */
    --dark-text: #1f2937;           /* Gris oscuro */
    --light-text: #6b7280;          /* Gris medio */

    --border-radius: 12px;
    --shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
    --transition: all 0.3s ease-in-out;
}


* {
    box-sizing: border-box;
}

.page-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.plagas-header {
    text-align: center;
    margin-bottom: 40px;
    padding: 30px;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    border-radius: var(--border-radius);
    color: white;
}

.plagas-header h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
    font-weight: 700;
}

.plagas-header .page-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
    margin: 0;
}

.upload-section {
    background: white;
    padding: 40px;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    margin-bottom: 40px;
    position: relative;
}

.upload-area {
    border: 3px dashed var(--secondary-color);
    border-radius: var(--border-radius);
    padding: 60px 30px;
    margin: 30px 0;
    background: var(--light-bg);
    transition: var(--transition);
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.upload-area:hover {
    background: #f0fff0;
    border-color: var(--accent-color);
    transform: translateY(-2px);
}

.upload-area.dragover {
    background: #e8f5e8;
    border-color: var(--accent-color);
    transform: scale(1.02);
}

.upload-icon {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
    margin: 0 auto 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: white;
    transition: var(--transition);
    position: relative;
    z-index: 2;
}

.upload-area:hover .upload-icon {
    transform: scale(1.1) rotate(5deg);
}

.upload-text {
    color: var(--dark-text);
    font-size: 1.3rem;
    margin-bottom: 10px;
    font-weight: 600;
}

.upload-subtitle {
    color: var(--light-text);
    margin-bottom: 20px;
    font-size: 1rem;
}

.upload-formats {
    color: var(--light-text);
    font-size: 0.9rem;
    margin-bottom: 20px;
}

.upload-btn {
    background: linear-gradient(135deg, var(--info-color) 0%, #1976D2 100%);
    color: white;
    border: none;
    padding: 15px 30px;
    border-radius: 25px;
    cursor: pointer;
    font-size: 1.1rem;
    transition: var(--transition);
    margin-top: 20px;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(33, 150, 243, 0.3);
}

.upload-btn:hover {
    background: linear-gradient(135deg, #1976D2 0%, #1565C0 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(33, 150, 243, 0.4);
}

.loading-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.95);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 10;
    border-radius: var(--border-radius);
}

.loading-spinner {
    width: 60px;
    height: 60px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid var(--secondary-color);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.preview-section {
    background: white;
    padding: 30px;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    margin-bottom: 30px;
    display: none;
}

.image-preview {
    max-width: 100%;
    max-height: 400px;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    margin: 20px auto;
    display: block;
}

.biblioteca-section {
    background: white;
    padding: 30px;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    margin-bottom: 30px;
}

.biblioteca-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 25px;
}

.biblioteca-title {
    color: var(--dark-text);
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0;
}

.filter-buttons {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.filter-btn {
    padding: 8px 16px;
    border: 2px solid var(--secondary-color);
    background: white;
    color: var(--secondary-color);
    border-radius: 20px;
    cursor: pointer;
    transition: var(--transition);
    font-size: 0.9rem;
    font-weight: 500;
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--secondary-color);
    color: white;
}

.plagas-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.plaga-card {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 25px;
    border-radius: var(--border-radius);
    text-align: center;
    transition: var(--transition);
    cursor: pointer;
    position: relative;
    overflow: hidden;
    border: 2px solid transparent;
}

.plaga-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    border-color: var(--secondary-color);
}

.plaga-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--secondary-color), var(--accent-color));
    transform: scaleX(0);
    transition: var(--transition);
}

.plaga-card:hover::before {
    transform: scaleX(1);
}

.plaga-image {
    width: 100%;
    height: 150px;
    background: linear-gradient(135deg, #e9ecef 0%, #f8f9fa 100%);
    border-radius: 10px;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 4rem;
    color: var(--secondary-color);
    transition: var(--transition);
}

.plaga-card:hover .plaga-image {
    transform: scale(1.05);
}

.plaga-name {
    color: var(--dark-text);
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 8px;
}

.plaga-description {
    color: var(--light-text);
    font-size: 0.9rem;
    margin-bottom: 10px;
}

.plaga-severity {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
}

.severity-low {
    background: rgba(76, 175, 80, 0.1);
    color: var(--success-color);
}

.severity-medium {
    background: rgba(255, 152, 0, 0.1);
    color: var(--warning-color);
}

.severity-high {
    background: rgba(244, 67, 54, 0.1);
    color: var(--danger-color);
}

.result-section {
    background: white;
    padding: 30px;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    margin-top: 30px;
    display: none;
    border-left: 5px solid var(--secondary-color);
}

.result-header {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #f0f0f0;
}

.result-image {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    color: white;
    box-shadow: var(--shadow);
}

.result-info h3 {
    color: var(--dark-text);
    margin-bottom: 10px;
    font-size: 1.8rem;
    font-weight: 700;
}

.result-confidence {
    color: var(--secondary-color);
    font-weight: bold;
    font-size: 1.2rem;
    margin-bottom: 10px;
}

.result-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 30px;
}

.detail-section {
    background: #f8f9fa;
    padding: 25px;
    border-radius: var(--border-radius);
    border-left: 4px solid var(--secondary-color);
}

.detail-title {
    color: var(--dark-text);
    font-size: 1.3rem;
    margin-bottom: 15px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.detail-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.detail-item {
    padding: 12px 0;
    border-bottom: 1px solid #e9ecef;
    color: var(--light-text);
    display: flex;
    align-items: flex-start;
    gap: 10px;
}

.detail-item:last-child {
    border-bottom: none;
}

.detail-item::before {
    content: '✓';
    color: var(--secondary-color);
    font-weight: bold;
    font-size: 1.1rem;
}

.urgency-indicator {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-top: 10px;
}

.urgency-low {
    background: rgba(76, 175, 80, 0.1);
    color: var(--success-color);
}

.urgency-medium {
    background: rgba(255, 152, 0, 0.1);
    color: var(--warning-color);
}

.urgency-high {
    background: rgba(244, 67, 54, 0.1);
    color: var(--danger-color);
}

.action-buttons {
    display: flex;
    gap: 15px;
    margin-top: 30px;
    flex-wrap: wrap;
}

.action-btn {
    padding: 12px 24px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-primary {
    background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(76, 175, 80, 0.4);
}

.btn-secondary {
    background: white;
    color: var(--secondary-color);
    border: 2px solid var(--secondary-color);
}

.btn-secondary:hover {
    background: var(--secondary-color);
    color: white;
}

.stats-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 30px;
    border-radius: var(--border-radius);
    margin-top: 30px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.stat-card {
    background: white;
    padding: 20px;
    border-radius: var(--border-radius);
    text-align: center;
    box-shadow: var(--shadow);
    transition: var(--transition);
}

.stat-card:hover {
    transform: translateY(-5px);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--secondary-color);
    margin-bottom: 10px;
}

.stat-label {
    color: var(--light-text);
    font-size: 0.9rem;
    text-transform: uppercase;
    font-weight: 600;
}

.notification {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 15px 20px;
    border-radius: var(--border-radius);
    color: white;
    font-weight: 600;
    box-shadow: var(--shadow);
    z-index: 1000;
    transform: translateX(100%);
    transition: var(--transition);
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

@media (max-width: 768px) {
    .page-content {
        padding: 10px;
    }
    
    .plagas-header h1 {
        font-size: 2rem;
    }
    
    .plagas-header .page-subtitle {
        font-size: 1rem;
    }
    
    .upload-section,
    .biblioteca-section,
    .result-section {
        padding: 20px;
    }
    
    .result-header {
        flex-direction: column;
        text-align: center;
    }
    
    .result-details {
        grid-template-columns: 1fr;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .filter-buttons {
        justify-content: center;
    }
    
    .plagas-grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }
}
</style>

<div class="page-content">
    <div class="plagas-header">
        <h1>🌿 Detección Inteligente de Plagas</h1>
        <p class="page-subtitle"></p>
    </div>
    
    <div class="upload-section">
        <div class="upload-area" id="uploadArea">
            <div class="upload-icon">🐛</div>
            <h3 class="upload-text">Detectar Plaga Automáticamente</h3>
            <p class="upload-subtitle">Arrastra una imagen aquí o haz clic para seleccionar</p>
            <p class="upload-formats">Formatos soportados: JPG, PNG, WEBP (máx. 10MB)</p>
            <input type="file" id="fileInput" accept="image/*" style="display: none;">
        </div>
        
        <div class="loading-overlay" id="loadingOverlay">
            <div class="loading-spinner"></div>
        </div>
        
        <button class="upload-btn" id="uploadBtn">
            📸 Subir Imagen
        </button>
    </div>
    
    <div class="preview-section" id="previewSection">
        <h3 style="color: var(--dark-text); margin-bottom: 20px;">Vista Previa de la Imagen</h3>
        <img id="imagePreview" class="image-preview" alt="Vista previa">
    </div>
    
    <div class="biblioteca-section">
        <div class="biblioteca-header">
            <h3 class="biblioteca-title">📚 Biblioteca de Plagas</h3>
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">Todas</button>
                <button class="filter-btn" data-filter="insectos">Insectos</button>
                <button class="filter-btn" data-filter="acaros">Ácaros</button>
                <button class="filter-btn" data-filter="hongos">Hongos</button>
            </div>
        </div>
        
        <div class="plagas-grid" id="plagasGrid">
            <!-- Plagas se cargarán dinámicamente -->
        </div>
    </div>
    
    <div class="result-section" id="resultSection">
        <div class="result-header">
            <div class="result-image" id="resultIcon">🐛</div>
            <div class="result-info">
                <h3 id="plagaDetected">Plaga Detectada</h3>
                <div id="plagaConfidence" class="result-confidence">95% de confianza</div>
                <div id="urgencyIndicator" class="urgency-indicator urgency-medium">
                    ⚠️ Acción requerida
                </div>
            </div>
        </div>
        
        <div class="result-details">
            <div class="detail-section">
                <h4 class="detail-title">🎯 Tratamiento Inmediato</h4>
                <ul class="detail-list" id="treatmentList">
                    <!-- Tratamientos se cargarán dinámicamente -->
                </ul>
            </div>
            
            <div class="detail-section">
                <h4 class="detail-title">🔬 Características</h4>
                <ul class="detail-list" id="characteristicsList">
                    <!-- Características se cargarán dinámicamente -->
                </ul>
            </div>
            
            <div class="detail-section">
                <h4 class="detail-title">🛡️ Prevención</h4>
                <ul class="detail-list" id="preventionList">
                    <!-- Prevención se cargará dinámicamente -->
                </ul>
            </div>
        </div>
        
        <div class="action-buttons">
            <button class="action-btn btn-primary" onclick="generateReport()">
                📄 Generar Reporte
            </button>
            <button class="action-btn btn-secondary" onclick="consultExpert()">
                👨‍🔬 Consultar Experto
            </button>
            <button class="action-btn btn-secondary" onclick="shareResults()">
                📤 Compartir Resultados
            </button>
        </div>
    </div>
    
    <div class="stats-section">
        <h3 style="color: var(--dark-text); text-align: center; margin-bottom: 30px;">📊 Estadísticas del Sistema</h3>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">1,247</div>
                <div class="stat-label">Detecciones Realizadas</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">94.7%</div>
                <div class="stat-label">Precisión Promedio</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">156</div>
                <div class="stat-label">Especies Registradas</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Disponibilidad</div>
            </div>
        </div>
    </div>
</div>

<script>
// Base de datos de plagas
const plagasDatabase = {
    insectos: [
        {
            name: 'Pulgón Verde',
            icon: '🐛',
            description: 'Insecto chupador de savia',
            severity: 'medium',
            category: 'insectos',
            characteristics: [
                'Pequeño insecto de color verde',
                'Se alimenta de la savia de las plantas',
                'Forma colonias en brotes jóvenes',
                'Produce melaza pegajosa'
            ],
            treatment: [
                'Aplicar insecticida sistémico',
                'Usar jabón potásico diluido',
                'Introducir depredadores naturales',
                'Eliminar brotes muy infestados'
            ],
            prevention: [
                'Inspeccionar plantas semanalmente',
                'Mantener plantas bien ventiladas',
                'Evitar exceso de nitrógeno',
                'Usar plantas repelentes'
            ],
            urgency: 'medium'
        },
        {
            name: 'Mosca Blanca',
            icon: '🦟',
            description: 'Insecto volador transmisor de virus',
            severity: 'high',
            category: 'insectos',
            characteristics: [
                'Pequeño insecto blanco volador',
                'Se encuentra en el envés de las hojas',
                'Transmite virus a las plantas',
                'Causa amarillamiento de hojas'
            ],
            treatment: [
                'Usar trampas amarillas pegajosas',
                'Aplicar aceite de neem',
                'Insecticida específico para mosca blanca',
                'Eliminar plantas muy afectadas'
            ],
            prevention: [
                'Controlar malezas cercanas',
                'Usar mallas antiinsectos',
                'Desinfectar herramientas',
                'Cuarentena de plantas nuevas'
            ],
            urgency: 'high'
        },
        {
            name: 'Trips',
            icon: '🐛',
            description: 'Insecto raspador microscópico',
            severity: 'medium',
            category: 'insectos',
            characteristics: [
                'Insecto muy pequeño y alargado',
                'Raspa la superficie de las hojas',
                'Deja manchas plateadas',
                'Puede transmitir virus'
            ],
            treatment: [
                'Aplicar insecticida sistémico',
                'Usar trampas azules pegajosas',
                'Aumentar humedad ambiental',
                'Podar partes afectadas'
            ],
            prevention: [
                'Mantener buen drenaje',
                'Evitar estrés hídrico',
                'Controlar temperatura',
                'Limpiar restos vegetales'
            ],
            urgency: 'medium'
        },
        {
            name: 'Minador de Hojas',
            icon: '🐛',
            description: 'Larva que crea túneles en hojas',
            severity: 'low',
            category: 'insectos',
            characteristics: [
                'Larva que vive dentro de la hoja',
                'Crea túneles serpenteantes',
                'Reduce capacidad fotosintética',
                'Debilita la planta'
            ],
            treatment: [
                'Eliminar hojas afectadas',
                'Aplicar insecticida sistémico',
                'Usar depredadores naturales',
                'Rotación de cultivos'
            ],
            prevention: [
                'Inspección regular de hojas',
                'Mantener plantas sanas',
                'Evitar monocultivos',
                'Controlar malezas'
            ],
            urgency: 'low'
        }
    ],
    acaros: [
        {
            name: 'Araña Roja',
            icon: '🕷️',
            description: 'Ácaro microscópico muy dañino',
            severity: 'high',
            category: 'acaros',
            characteristics: [
                'Ácaro microscópico rojizo',
                'Forma telarañas finas',
                'Causa punteado amarillo en hojas',
                'Prolifera en ambiente seco'
            ],
            treatment: [
                'Aumentar humedad ambiental',
                'Aplicar acaricida específico',
                'Usar aceite de neem',
                'Lavar hojas con agua'
            ],
            prevention: [
                'Mantener humedad alta',
                'Ventilación adecuada',
                'Evitar estrés hídrico',
                'Inspeccionar regularmente'
            ],
            urgency: 'high'
        },
        {
            name: 'Ácaro del Bronceado',
            icon: '🕷️',
            description: 'Ácaro que causa bronceado en hojas',
            severity: 'medium',
            category: 'acaros',
            characteristics: [
                'Provoca bronceado en hojas',
                'Muy pequeño, difícil de ver',
                'Afecta principalmente tomate',
                'Causa defoliación'
            ],
            treatment: [
                'Acaricida específico',
                'Eliminar hojas afectadas',
                'Aumentar humedad',
                'Usar azufre'
            ],
            prevention: [
                'Control de temperatura',
                'Mantener humedad adecuada',
                'Evitar estrés en plantas',
                'Rotación de cultivos'
            ],
            urgency: 'medium'
        }
    ],
    hongos: [
        {
            name: 'Mildiu',
            icon: '🍄',
            description: 'Hongo que causa manchas en hojas',
            severity: 'high',
            category: 'hongos',
            characteristics: [
                'Manchas amarillas en hojas',
                'Pelusa blanca en envés',
                'Prolifera con humedad alta',
                'Causa defoliación'
            ],
            treatment: [
                'Fungicida sistémico',
                'Mejorar ventilación',
                'Reducir humedad',
                'Eliminar hojas afectadas'
            ],
            prevention: [
                'Evitar riego por aspersión',
                'Buena ventilación',
                'Espaciado adecuado',
                'Rotación de cultivos'
            ],
            urgency: 'high'
        },
        {
            name: 'Oídio',
            icon: '🍄',
            description: 'Hongo polvoriento blanco',
            severity: 'medium',
            category: 'hongos',
            characteristics: [
                'Polvo blanco en hojas',
                'Reduce fotosíntesis',
                'Prolifera en ambiente seco',
                'Afecta brotes jóvenes'
            ],
            treatment: [
                'Fungicida específico para oídio',
                'Bicarbonato de sodio diluido',
                'Mejorar circulación de aire',
                'Eliminar partes afectadas'
            ],
            prevention: [
                'Evitar hacinamiento',
                'Riego en la base',
                'Buena ventilación',
                'Variedades resistentes'
            ],
            urgency: 'medium'
        }
    ]
};

// Variables globales
let currentFilter = 'all';
let detectionHistory = [];

// Inicialización
document.addEventListener('DOMContentLoaded', function() {
    initializeComponents();
    loadPlagasGrid();
    setupEventListeners();
});

function initializeComponents() {
    // Configurar drag and drop
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('fileInput');
    const uploadBtn = document.getElementById('uploadBtn');
    
    // Eventos de drag and drop
    uploadArea.addEventListener('dragover', handleDragOver);
    uploadArea.addEventListener('dragleave', handleDragLeave);
    uploadArea.addEventListener('drop', handleDrop);
    uploadArea.addEventListener('click', () => fileInput.click());
    
    // Evento de botón de subir
    uploadBtn.addEventListener('click', () => fileInput.click());
    
    // Evento de cambio de archivo
    fileInput.addEventListener('change', handleFileSelect);
}

function setupEventListeners() {
    // Filtros de biblioteca
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            currentFilter = this.dataset.filter;
            loadPlagasGrid();
        });
    });
}

function handleDragOver(e) {
    e.preventDefault();
    e.currentTarget.classList.add('dragover');
}

function handleDragLeave(e) {
    e.preventDefault();
    e.currentTarget.classList.remove('dragover');
}

function handleDrop(e) {
    e.preventDefault();
    e.currentTarget.classList.remove('dragover');
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        processFile(files[0]);
    }
}

function handleFileSelect(e) {
    const file = e.target.files[0];
    if (file) {
        processFile(file);
    }
}

function processFile(file) {
    // Validar archivo
    if (!file.type.startsWith('image/')) {
        showNotification('Por favor selecciona una imagen válida', 'error');
        return;
    }
    
    if (file.size > 10 * 1024 * 1024) { // 10MB
        showNotification('La imagen es demasiado grande. Máximo 10MB', 'error');
        return;
    }
    
    // Mostrar vista previa
    showImagePreview(file);
    
    // Simular detección
    simulateDetection(file);
}

function showImagePreview(file) {
    const previewSection = document.getElementById('previewSection');
    const imagePreview = document.getElementById('imagePreview');
    
    const reader = new FileReader();
    reader.onload = function(e) {
        imagePreview.src = e.target.result;
        previewSection.style.display = 'block';
        previewSection.scrollIntoView({ behavior: 'smooth' });
    };
    reader.readAsDataURL(file);
}

function simulateDetection(file) {
    const loadingOverlay = document.getElementById('loadingOverlay');
    const resultSection = document.getElementById('resultSection');
    
    // Mostrar loading
    loadingOverlay.style.display = 'flex';
    
    // Simular procesamiento
    setTimeout(() => {
        loadingOverlay.style.display = 'none';
        
        // Seleccionar plaga aleatoria para simular detección
        const allPlagas = [...plagasDatabase.insectos, ...plagasDatabase.acaros, ...plagasDatabase.hongos];
        const randomPlaga = allPlagas[Math.floor(Math.random() * allPlagas.length)];
        const confidence = Math.floor(Math.random() * 20) + 80; // 80-99%
        
        displayDetectionResult(randomPlaga, confidence);
        
        // Guardar en historial
        detectionHistory.push({
            plaga: randomPlaga,
            confidence: confidence,
            timestamp: new Date(),
            fileName: file.name
        });
        
        showNotification('¡Detección completada con éxito!', 'success');
        
    }, 3000);
}

function displayDetectionResult(plaga, confidence) {
    const resultSection = document.getElementById('resultSection');
    const resultIcon = document.getElementById('resultIcon');
    const plagaDetected = document.getElementById('plagaDetected');
    const plagaConfidence = document.getElementById('plagaConfidence');
    const urgencyIndicator = document.getElementById('urgencyIndicator');
    const treatmentList = document.getElementById('treatmentList');
    const characteristicsList = document.getElementById('characteristicsList');
    const preventionList = document.getElementById('preventionList');
    
    // Actualizar información principal
    resultIcon.textContent = plaga.icon;
    plagaDetected.textContent = plaga.name;
    plagaConfidence.textContent = `${confidence}% de confianza`;
    
    // Actualizar indicador de urgencia
    urgencyIndicator.className = `urgency-indicator urgency-${plaga.urgency}`;
    urgencyIndicator.innerHTML = getUrgencyIcon(plaga.urgency) + ' ' + getUrgencyText(plaga.urgency);
    
    // Actualizar listas
    updateList(treatmentList, plaga.treatment);
    updateList(characteristicsList, plaga.characteristics);
    updateList(preventionList, plaga.prevention);
    
    // Mostrar sección de resultados
    resultSection.style.display = 'block';
    resultSection.scrollIntoView({ behavior: 'smooth' });
}

function updateList(listElement, items) {
    listElement.innerHTML = '';
    items.forEach(item => {
        const li = document.createElement('li');
        li.className = 'detail-item';
        li.textContent = item;
        listElement.appendChild(li);
    });
}

function getUrgencyIcon(urgency) {
    switch(urgency) {
        case 'low': return '✅';
        case 'medium': return '⚠️';
        case 'high': return '🚨';
        default: return '⚠️';
    }
}

function getUrgencyText(urgency) {
    switch(urgency) {
        case 'low': return 'Monitoreo requerido';
        case 'medium': return 'Acción requerida';
        case 'high': return 'Acción urgente';
        default: return 'Acción requerida';
    }
}

function loadPlagasGrid() {
    const plagasGrid = document.getElementById('plagasGrid');
    plagasGrid.innerHTML = '';
    
    let plagasToShow = [];
    
    if (currentFilter === 'all') {
        plagasToShow = [...plagasDatabase.insectos, ...plagasDatabase.acaros, ...plagasDatabase.hongos];
    } else {
        plagasToShow = plagasDatabase[currentFilter] || [];
    }
    
    plagasToShow.forEach(plaga => {
        const card = createPlagaCard(plaga);
        plagasGrid.appendChild(card);
    });
}

function createPlagaCard(plaga) {
    const card = document.createElement('div');
    card.className = 'plaga-card';
    card.dataset.category = plaga.category;
    
    card.innerHTML = `
        <div class="plaga-image">${plaga.icon}</div>
        <div class="plaga-name">${plaga.name}</div>
        <div class="plaga-description">${plaga.description}</div>
        <span class="plaga-severity severity-${plaga.severity}">
            ${plaga.severity === 'low' ? 'Baja' : plaga.severity === 'medium' ? 'Media' : 'Alta'}
        </span>
    `;
    
    card.addEventListener('click', () => showPlagaInfo(plaga));
    
    return card;
}

function showPlagaInfo(plaga) {
    displayDetectionResult(plaga, 100);
    
    // Cambiar título para indicar que es información de biblioteca
    const plagaDetected = document.getElementById('plagaDetected');
    plagaDetected.textContent = plaga.name + ' - Información';
    
    const plagaConfidence = document.getElementById('plagaConfidence');
    plagaConfidence.textContent = 'Información de biblioteca';
    
    showNotification('Información cargada desde la biblioteca', 'success');
}

function showNotification(message, type) {
    // Remover notificación anterior si existe
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
    
    // Ocultar notificación después de 3 segundos
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }, 3000);
}

// Funciones de acción
function generateReport() {
    showNotification('Generando reporte PDF...', 'success');
    // Aquí iría la lógica para generar el reporte
    setTimeout(() => {
        showNotification('Reporte generado exitosamente', 'success');
    }, 2000);
}

function consultExpert() {
    showNotification('Conectando con experto...', 'success');
    // Aquí iría la lógica para conectar con un experto
    setTimeout(() => {
        showNotification('Consulta programada para hoy a las 3:00 PM', 'success');
    }, 1500);
}

function shareResults() {
    if (navigator.share) {
        navigator.share({
            title: 'Resultado de Detección de Plagas',
            text: 'Revisa los resultados de la detección de plagas',
            url: window.location.href
        });
    } else {
        // Fallback para navegadores que no soportan Web Share API
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            showNotification('Enlace copiado al portapapeles', 'success');
        }).catch(() => {
            showNotification('No se pudo copiar el enlace', 'error');
        });
    }
}

// Función para actualizar estadísticas (simulada)
function updateStats() {
    const stats = document.querySelectorAll('.stat-number');
    stats.forEach(stat => {
        const target = parseInt(stat.textContent.replace(/[^\d]/g, ''));
        animateNumber(stat, target);
    });
}

function animateNumber(element, target) {
    const duration = 2000;
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current).toLocaleString();
    }, 16);
}

// Inicializar animaciones cuando la página esté visible
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            updateStats();
            observer.unobserve(entry.target);
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        observer.observe(statsSection);
    }
});
</script>