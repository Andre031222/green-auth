<?php
// paginas/clima.php
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
    --sky-blue: #87CEEB;
    --deep-blue: #1E3A8A;
    --orange: #FF9800;
    --red: #f44336;
    --yellow: #FFC107;
    --purple: #9C27B0;
    --teal: #009688;
    
    /* Colores de texto */
    --dark-text: #2c3e50;
    --light-text: #666;
    --white-text: #ffffff;
    
    /* Fondos */
    --bg-light: #f8fffe;
    --bg-card: #ffffff;
    --bg-glass: rgba(255, 255, 255, 0.25);
    --border-color: #e0e6ed;
    
    /* Gradientes climáticos */
    --gradient-sunny: linear-gradient(135deg, #FFA726 0%, #FF7043 100%);
    --gradient-cloudy: linear-gradient(135deg, #78909C 0%, #546E7A 100%);
    --gradient-rainy: linear-gradient(135deg, #42A5F5 0%, #1E88E5 100%);
    --gradient-night: linear-gradient(135deg, #3F51B5 0%, #1A237E 100%);
    --gradient-sky: linear-gradient(135deg, #87CEEB 0%, #4FC3F7 100%);
    
    /* Sombras */
    --shadow-light: 0 4px 15px rgba(0,0,0,0.08);
    --shadow-medium: 0 8px 25px rgba(0,0,0,0.12);
    --shadow-heavy: 0 15px 35px rgba(0,0,0,0.18);
    
    /* Bordes */
    --radius-small: 8px;
    --radius-medium: 12px;
    --radius-large: 16px;
    --radius-xl: 24px;
    
    /* Transiciones */
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* ========================================
   RESET Y BASE
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
    background: #f8f9fa;
    min-height: 100vh;
}

/* ========================================
   LAYOUT PRINCIPAL
   ======================================== */
.page-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px 20px;
}

.page-header {
    text-align: center;
    margin-bottom: 40px;
    color: white;
    position: relative;
}

.page-header::before {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 4px;
    background: var(--gradient-sunny);
    border-radius: 2px;
}

.page-title {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 15px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.page-title::before {
    content: '🌤️';
    margin-right: 15px;
}

.page-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-bottom: 20px;
}

.location-info {
    background: var(--bg-glass);
    backdrop-filter: blur(15px);
    padding: 15px 25px;
    border-radius: var(--radius-xl);
    border: 1px solid rgba(255,255,255,0.2);
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: white;
    font-weight: 500;
    box-shadow: var(--shadow-medium);
}

/* ========================================
   CONTENEDOR PRINCIPAL DEL CLIMA
   ======================================== */
.weather-main-container {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 30px;
    margin-bottom: 40px;
}

.weather-current {
    background: var(--bg-card);
    padding: 40px;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-medium);
    position: relative;
    overflow: hidden;
}

.weather-current::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 6px;
    background: var(--gradient-sunny);
}

.weather-current-header {
    text-align: center;
    margin-bottom: 30px;
}

.weather-time {
    color: var(--light-text);
    font-size: 1rem;
    margin-bottom: 10px;
}

.weather-condition {
    color: var(--dark-text);
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 30px;
}

.current-temp {
    font-size: 5rem;
    font-weight: 800;
    color: var(--orange);
    margin: 30px 0;
    text-shadow: 0 4px 8px rgba(255,152,0,0.3);
    position: relative;
}

.current-temp::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background: var(--gradient-sunny);
    border-radius: 2px;
}

.weather-details {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    margin-top: 30px;
}

.weather-detail {
    text-align: center;
    padding: 20px;
    background: rgba(135,206,235,0.1);
    border-radius: var(--radius-medium);
    border: 1px solid rgba(135,206,235,0.2);
    transition: var(--transition);
}

.weather-detail:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-light);
}

.weather-detail-icon {
    font-size: 2rem;
    margin-bottom: 10px;
}

.weather-detail-value {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--dark-text);
    margin-bottom: 8px;
}

.weather-detail-label {
    color: var(--light-text);
    font-size: 0.9rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* ========================================
   MAPA CLIMÁTICO
   ======================================== */
.weather-map {
    background: var(--bg-card);
    padding: 30px;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-medium);
    position: relative;
}

.weather-map::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 6px;
    background: var(--gradient-sky);
}

.map-header {
    margin-bottom: 20px;
}

.map-title {
    color: var(--dark-text);
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.map-placeholder {
    width: 100%;
    height: 350px;
    background: var(--gradient-sky);
    border-radius: var(--radius-large);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    border: 3px dashed rgba(255,255,255,0.5);
    position: relative;
    overflow: hidden;
}

.map-placeholder::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.3)"/><circle cx="80" cy="40" r="3" fill="rgba(255,255,255,0.3)"/><circle cx="40" cy="80" r="2" fill="rgba(255,255,255,0.3)"/></svg>');
    animation: float 20s infinite linear;
}

.map-content {
    text-align: center;
    position: relative;
    z-index: 2;
}

.map-icon {
    font-size: 4rem;
    margin-bottom: 15px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.map-text {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 10px;
}

.map-location {
    font-size: 1rem;
    opacity: 0.9;
}

/* ========================================
   ALERTAS CLIMÁTICAS
   ======================================== */
.weather-alerts {
    background: var(--bg-card);
    padding: 25px;
    border-radius: var(--radius-large);
    box-shadow: var(--shadow-medium);
    margin-bottom: 30px;
}

.alerts-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
}

.alerts-icon {
    font-size: 1.8rem;
    color: var(--orange);
}

.alerts-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--dark-text);
}

.alert-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: rgba(255,152,0,0.1);
    border-radius: var(--radius-medium);
    border-left: 4px solid var(--orange);
    margin-bottom: 10px;
}

.alert-item:last-child {
    margin-bottom: 0;
}

.alert-icon {
    font-size: 1.2rem;
    color: var(--orange);
}

.alert-text {
    flex: 1;
    color: var(--dark-text);
    font-weight: 500;
}

.alert-time {
    color: var(--light-text);
    font-size: 0.9rem;
}

/* ========================================
   SECCIÓN DE DATOS DETALLADOS
   ======================================== */
.weather-data-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

.weather-data-card {
    background: var(--bg-card);
    padding: 30px;
    border-radius: var(--radius-large);
    box-shadow: var(--shadow-medium);
    position: relative;
    overflow: hidden;
}

.weather-data-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-sunny);
}

.data-card-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
}

.data-card-icon {
    font-size: 2rem;
    color: var(--orange);
}

.data-card-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--dark-text);
}

.data-metrics {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.metric-item {
    text-align: center;
    padding: 15px;
    background: rgba(135,206,235,0.1);
    border-radius: var(--radius-medium);
}

.metric-value {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--dark-text);
    margin-bottom: 5px;
}

.metric-label {
    color: var(--light-text);
    font-size: 0.9rem;
    font-weight: 500;
}

/* ========================================
   PRONÓSTICO EXTENDIDO
   ======================================== */
.weather-forecast {
    background: var(--bg-card);
    padding: 40px;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-medium);
    margin-bottom: 40px;
    position: relative;
}

.weather-forecast::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 6px;
    background: var(--gradient-sky);
}

.forecast-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 30px;
}

.forecast-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--dark-text);
    display: flex;
    align-items: center;
    gap: 15px;
}

.forecast-title::before {
    content: '📅';
    font-size: 1.5rem;
}

.forecast-toggle {
    display: flex;
    gap: 10px;
}

.toggle-btn {
    padding: 8px 16px;
    border: 2px solid var(--border-color);
    background: var(--bg-card);
    border-radius: var(--radius-small);
    cursor: pointer;
    transition: var(--transition);
    font-weight: 500;
}

.toggle-btn.active {
    background: var(--gradient-sunny);
    color: white;
    border-color: var(--orange);
}

.forecast-days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 15px;
}

.forecast-day {
    text-align: center;
    padding: 25px 15px;
    border-radius: var(--radius-large);
    background: rgba(135,206,235,0.1);
    border: 2px solid rgba(135,206,235,0.2);
    transition: var(--transition);
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.forecast-day::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-sunny);
    opacity: 0;
    transition: var(--transition);
}

.forecast-day:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-medium);
    border-color: var(--orange);
}

.forecast-day:hover::before {
    opacity: 0.1;
}

.forecast-day > * {
    position: relative;
    z-index: 1;
}

.forecast-day-name {
    font-weight: 700;
    color: var(--dark-text);
    margin-bottom: 15px;
    font-size: 1rem;
}

.forecast-date {
    color: var(--light-text);
    font-size: 0.8rem;
    margin-bottom: 15px;
}

.forecast-icon {
    font-size: 2.5rem;
    margin: 15px 0;
}

.forecast-condition {
    color: var(--light-text);
    font-size: 0.85rem;
    margin-bottom: 15px;
    font-weight: 500;
}

.forecast-temps {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.temp-high {
    font-weight: 700;
    color: var(--orange);
    font-size: 1.1rem;
}

.temp-low {
    color: var(--light-text);
    font-size: 1rem;
}

.forecast-precipitation {
    color: var(--sky-blue);
    font-size: 0.8rem;
    margin-top: 8px;
    font-weight: 500;
}

/* ========================================
   GRÁFICOS Y ESTADÍSTICAS
   ======================================== */
.weather-charts {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    margin-bottom: 40px;
}

.chart-container {
    background: var(--bg-card);
    padding: 30px;
    border-radius: var(--radius-large);
    box-shadow: var(--shadow-medium);
}

.chart-header {
    margin-bottom: 20px;
}

.chart-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--dark-text);
    margin-bottom: 10px;
}

.chart-placeholder {
    width: 100%;
    height: 250px;
    background: var(--gradient-sky);
    border-radius: var(--radius-medium);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    position: relative;
    overflow: hidden;
}

.chart-placeholder::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M10,50 Q30,20 50,50 T90,50" stroke="rgba(255,255,255,0.3)" stroke-width="2" fill="none"/></svg>');
    animation: pulse 4s ease-in-out infinite;
}

/* ========================================
   RECOMENDACIONES AGRÍCOLAS
   ======================================== */
.weather-recommendations {
    background: var(--bg-card);
    padding: 40px;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-medium);
    margin-bottom: 40px;
    position: relative;
}

.weather-recommendations::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 6px;
    background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
}

.recommendations-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 30px;
}

.recommendations-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--dark-text);
}

.recommendations-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.recommendation-card {
    padding: 20px;
    background: rgba(76,175,80,0.1);
    border-radius: var(--radius-medium);
    border-left: 4px solid var(--secondary-color);
    transition: var(--transition);
}

.recommendation-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-light);
}

.recommendation-icon {
    font-size: 1.8rem;
    margin-bottom: 10px;
}

.recommendation-title {
    font-weight: 600;
    color: var(--dark-text);
    margin-bottom: 8px;
}

.recommendation-text {
    color: var(--light-text);
    font-size: 0.9rem;
    line-height: 1.5;
}

/* ========================================
   ANIMACIONES
   ======================================== */
@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}

@keyframes pulse {
    0% { opacity: 0.5; }
    50% { opacity: 1; }
    100% { opacity: 0.5; }
}

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

/* ========================================
   RESPONSIVE
   ======================================== */
@media (max-width: 1024px) {
    .weather-main-container {
        grid-template-columns: 1fr;
    }
    
    .weather-charts {
        grid-template-columns: 1fr;
    }
    
    .forecast-days {
        grid-template-columns: repeat(4, 1fr);
    }
    
    .weather-data-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .page-content {
        padding: 20px 15px;
    }
    
    .page-title {
        font-size: 2.5rem;
    }
    
    .current-temp {
        font-size: 4rem;
    }
    
    .weather-details {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .forecast-days {
        grid-template-columns: repeat(3, 1fr);
    }
    
    .weather-current,
    .weather-forecast,
    .weather-recommendations {
        padding: 25px;
    }
    
    .recommendations-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .page-content {
        padding: 15px 10px;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .current-temp {
        font-size: 3rem;
    }
    
    .forecast-days {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .weather-current,
    .weather-forecast,
    .weather-recommendations {
        padding: 20px;
    }
    
    .forecast-header {
        flex-direction: column;
        gap: 15px;
    }
}
</style>

<div class="page-content">
    <!-- Header Principal -->
    <div class="page-header">
        <h1 class="page-title">El clima semanal</h1>
        <p class="page-subtitle">
            <span>📍</span>
            <span>Información meteorológica en tiempo real</span>
        </p>
        
    </div>

    <!-- Alertas Climáticas -->
    <div class="weather-alerts">
        <div class="alerts-header">
            <div class="alerts-icon">⚠️</div>
            <h3 class="alerts-title">Alertas Climáticas</h3>
        </div>
        <div class="alert-item">
            <div class="alert-icon">🌡️</div>
            <div class="alert-text">Temperatura mínima esperada: 1°C esta noche</div>
            <div class="alert-time">6:00 PM</div>
        </div>
        <div class="alert-item">
            <div class="alert-icon">💧</div>
            <div class="alert-text">Condiciones secas - Revisar riego de cultivos</div>
            <div class="alert-time">Todo el día</div>
        </div>
    </div>

    <!-- Contenedor Principal del Clima -->
    <div class="weather-main-container">
        <!-- Clima Actual -->
        <div class="weather-current">
            <div class="weather-current-header">
                <p class="weather-time">Jueves, 11 de Julio - 11:00 AM</p>
                <h2 class="weather-condition">Soleado</h2>
            </div>
            
            <div class="current-temp">13°C</div>
            
            <div class="weather-details">
                <div class="weather-detail">
                    <div class="weather-detail-icon">🌧️</div>
                    <div class="weather-detail-value">0%</div>
                    <div class="weather-detail-label">Precipitación</div>
                </div>
                <div class="weather-detail">
                    <div class="weather-detail-icon">💧</div>
                    <div class="weather-detail-value">23%</div>
                    <div class="weather-detail-label">Humedad</div>
                </div>
                <div class="weather-detail">
                    <div class="weather-detail-icon">💨</div>
                    <div class="weather-detail-value">6 km/h</div>
                    <div class="weather-detail-label">Viento</div>
                </div>
            </div>
        </div>

        <!-- Mapa Climático -->
        <div class="weather-map">
            <div class="map-header">
                <h3 class="map-title">
                    <span>🗺️</span>
                    <span>Mapa Meteorológico</span>
                </h3>
            </div>
            <div class="map-placeholder">
                <div class="map-content">
                    <div class="map-icon">🌍</div>
                    <p class="map-text">Radar Meteorológico Interactivo</p>
                    <p class="map-location">Región: Puno - Altiplano</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Datos Climáticos Detallados -->
    <div class="weather-data-grid">
        <div class="weather-data-card">
            <div class="data-card-header">
                <div class="data-card-icon">🌡️</div>
                <h4 class="data-card-title">Temperaturas</h4>
            </div>
            <div class="data-metrics">
                <div class="metric-item">
                    <div class="metric-value">15°C</div>
                    <div class="metric-label">Máxima</div>
                </div>
                <div class="metric-item">
                    <div class="metric-value">1°C</div>
                    <div class="metric-label">Mínima</div>
                </div>
                <div class="metric-item">
                    <div class="metric-value">11°C</div>
                    <div class="metric-label">Sensación</div>
                </div>
                <div class="metric-item">
                    <div class="metric-value">13°C</div>
                    <div class="metric-label">Promedio</div>
                </div>
            </div>
        </div>

        <div class="weather-data-card">
            <div class="data-card-header">
                <div class="data-card-icon">🌪️</div>
                <h4 class="data-card-title">Viento y Presión</h4>
            </div>
            <div class="data-metrics">
                <div class="metric-item">
                    <div class="metric-value">6 km/h</div>
                    <div class="metric-label">Velocidad</div>
                </div>
                <div class="metric-item">
                    <div class="metric-value">E</div>
                    <div class="metric-label">Dirección</div>
                </div>
                <div class="metric-item">
                    <div class="metric-value">1020 mb</div>
                    <div class="metric-label">Presión</div>
                </div>
                <div class="metric-item">
                    <div class="metric-value">12 km/h</div>
                    <div class="metric-label">Ráfagas</div>
                </div>
            </div>
        </div>

        <div class="weather-data-card">
            <div class="data-card-header">
                <div class="data-card-icon">☀️</div>
                <h4 class="data-card-title">Radiación Solar</h4>
            </div>
            <div class="data-metrics">
                <div class="metric-item">
                    <div class="metric-value">5:45 AM</div>
                    <div class="metric-label">Amanecer</div>
                </div>
                <div class="metric-item">
                    <div class="metric-value">6:15 PM</div>
                    <div class="metric-label">Atardecer</div>
                </div>
                <div class="metric-item">
                    <div class="metric-value">UV 9</div>
                    <div class="metric-label">Índice UV</div>
                </div>
                <div class="metric-item">
                    <div class="metric-value">12h 30m</div>
                    <div class="metric-label">Duración</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficos Climáticos -->
    <div class="weather-charts">
        <div class="chart-container">
            <div class="chart-header">
                <h4 class="chart-title">📈 Temperatura (24h)</h4>
            </div>
            <div class="chart-placeholder">
                <div style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 10px;">📊</div>
                    <p>Gráfico de Temperatura</p>
                    <p style="font-size: 0.9rem; opacity: 0.8;">Últimas 24 horas</p>
                </div>
            </div>
        </div>

        <div class="chart-container">
            <div class="chart-header">
                <h4 class="chart-title">💧 Humedad y Precipitación</h4>
            </div>
            <div class="chart-placeholder">
                <div style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 10px;">💹</div>
                    <p>Gráfico de Humedad</p>
                    <p style="font-size: 0.9rem; opacity: 0.8;">Tendencia semanal</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pronóstico Extendido -->
    <div class="weather-forecast">
        <div class="forecast-header">
            <h3 class="forecast-title">Pronóstico Extendido</h3>
            <div class="forecast-toggle">
                <button class="toggle-btn active">7 días</button>
                <button class="toggle-btn">14 días</button>
            </div>
        </div>
        
        <div class="forecast-days">
            <div class="forecast-day">
                <div class="forecast-day-name">Jue</div>
                <div class="forecast-date">11 Jul</div>
                <div class="forecast-icon">☀️</div>
                <div class="forecast-condition">Soleado</div>
                <div class="forecast-temps">
                    <span class="temp-high">15°</span>
                    <span class="temp-low">1°</span>
                </div>
                <div class="forecast-precipitation">💧 0%</div>
            </div>
            
            <div class="forecast-day">
                <div class="forecast-day-name">Vie</div>
                <div class="forecast-date">12 Jul</div>
                <div class="forecast-icon">☀️</div>
                <div class="forecast-condition">Soleado</div>
                <div class="forecast-temps">
                    <span class="temp-high">14°</span>
                    <span class="temp-low">1°</span>
                </div>
                <div class="forecast-precipitation">💧 0%</div>
            </div>
            
            <div class="forecast-day">
                <div class="forecast-day-name">Sáb</div>
                <div class="forecast-date">13 Jul</div>
                <div class="forecast-icon">☀️</div>
                <div class="forecast-condition">Soleado</div>
                <div class="forecast-temps">
                    <span class="temp-high">15°</span>
                    <span class="temp-low">1°</span>
                </div>
                <div class="forecast-precipitation">💧 0%</div>
            </div>
            
            <div class="forecast-day">
                <div class="forecast-day-name">Dom</div>
                <div class="forecast-date">14 Jul</div>
                <div class="forecast-icon">☀️</div>
                <div class="forecast-condition">Soleado</div>
                <div class="forecast-temps">
                    <span class="temp-high">15°</span>
                    <span class="temp-low">1°</span>
                </div>
                <div class="forecast-precipitation">💧 0%</div>
            </div>
            
            <div class="forecast-day">
                <div class="forecast-day-name">Lun</div>
                <div class="forecast-date">15 Jul</div>
                <div class="forecast-icon">☀️</div>
                <div class="forecast-condition">Soleado</div>
                <div class="forecast-temps">
                    <span class="temp-high">16°</span>
                    <span class="temp-low">1°</span>
                </div>
                <div class="forecast-precipitation">💧 0%</div>
            </div>
            
            <div class="forecast-day">
                <div class="forecast-day-name">Mar</div>
                <div class="forecast-date">16 Jul</div>
                <div class="forecast-icon">⛅</div>
                <div class="forecast-condition">Parcial</div>
                <div class="forecast-temps">
                    <span class="temp-high">16°</span>
                    <span class="temp-low">1°</span>
                </div>
                <div class="forecast-precipitation">💧 10%</div>
            </div>
            
            <div class="forecast-day">
                <div class="forecast-day-name">Mié</div>
                <div class="forecast-date">17 Jul</div>
                <div class="forecast-icon">🌦️</div>
                <div class="forecast-condition">Lluvia</div>
                <div class="forecast-temps">
                    <span class="temp-high">16°</span>
                    <span class="temp-low">0°</span>
                </div>
                <div class="forecast-precipitation">💧 60%</div>
            </div>
            
            <div class="forecast-day">
                <div class="forecast-day-name">Jue</div>
                <div class="forecast-date">18 Jul</div>
                <div class="forecast-icon">⛅</div>
                <div class="forecast-condition">Parcial</div>
                <div class="forecast-temps">
                    <span class="temp-high">15°</span>
                    <span class="temp-low">-1°</span>
                </div>
                <div class="forecast-precipitation">💧 20%</div>
            </div>
        </div>
    </div>

    <!-- Recomendaciones Agrícolas -->
    <div class="weather-recommendations">
        <div class="recommendations-header">
            <div style="font-size: 1.8rem;">🌱</div>
            <h3 class="recommendations-title">Recomendaciones Agrícolas</h3>
        </div>
        
        <div class="recommendations-grid">
            <div class="recommendation-card">
                <div class="recommendation-icon">☀️</div>
                <h4 class="recommendation-title">Condiciones Óptimas</h4>
                <p class="recommendation-text">Excelente día para aplicar fertilizantes y realizar trabajos de campo. Sol abundante y baja humedad.</p>
            </div>
            
            <div class="recommendation-card">
                <div class="recommendation-icon">💧</div>
                <h4 class="recommendation-title">Gestión de Riego</h4>
                <p class="recommendation-text">Aumentar frecuencia de riego debido a condiciones secas. Revisar sistemas de goteo.</p>
            </div>
            
            <div class="recommendation-card">
                <div class="recommendation-icon">🌾</div>
                <h4 class="recommendation-title">Actividades de Campo</h4>
                <p class="recommendation-text">Día ideal para cosecha y labores agrícolas. Aprovechar las condiciones secas.</p>
            </div>
            
            <div class="recommendation-card">
                <div class="recommendation-icon">🌡️</div>
                <h4 class="recommendation-title">Monitoreo Térmico</h4>
                <p class="recommendation-text">Temperaturas estables. Vigilar cambios hacia el miércoles con posibles precipitaciones.</p>
            </div>
        </div>
    </div>
</div>

<script>
// ========================================
// SISTEMA CLIMÁTICO INTERACTIVO
// ========================================
document.addEventListener('DOMContentLoaded', function() {
    // Variables globales
    let currentView = '7days';
    let weatherData = {};
    
    // ========================================
    // INICIALIZACIÓN
    // ========================================
    
    function initWeatherSystem() {
        setupEventListeners();
        loadWeatherData();
        updateTimeDisplay();
        startRealTimeUpdates();
    }
    
    // ========================================
    // MANEJO DE EVENTOS
    // ========================================
    
    function setupEventListeners() {
        // Toggle de pronóstico
        document.querySelectorAll('.toggle-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.toggle-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                const period = this.textContent.includes('7') ? '7days' : '14days';
                switchForecastPeriod(period);
            });
        });
        
        // Días del pronóstico
        document.querySelectorAll('.forecast-day').forEach(day => {
            day.addEventListener('click', function() {
                showDayDetails(this);
            });
        });
        
        // Alertas climáticas
        document.querySelectorAll('.alert-item').forEach(alert => {
            alert.addEventListener('click', function() {
                showAlertDetails(this);
            });
        });
    }
    
    // ========================================
    // FUNCIONES DE DATOS
    // ========================================
    
    function loadWeatherData() {
        // Simulación de datos climáticos
        weatherData = {
            current: {
                temp: 10,
                condition: 'Parcialmente Nublado',
                humidity: 49,
                wind: 9,
                precipitation: 3,
                pressure: 1013,
                uvIndex: 7
            },
            forecast: {
                '7days': generateForecastData(7),
                '14days': generateForecastData(14)
            }
        };
        
        updateWeatherDisplay();
    }
    
    function generateForecastData(days) {
        const conditions = ['☀️', '🌤️', '⛅', '🌦️', '⛈️'];
        const conditionNames = ['Soleado', 'Parcial', 'Nublado', 'Lluvia', 'Tormenta'];
        const forecast = [];
        
        for (let i = 0; i < days; i++) {
            const conditionIndex = Math.floor(Math.random() * conditions.length);
            forecast.push({
                date: new Date(Date.now() + (i * 24 * 60 * 60 * 1000)),
                icon: conditions[conditionIndex],
                condition: conditionNames[conditionIndex],
                tempHigh: Math.floor(Math.random() * 10) + 15,
                tempLow: Math.floor(Math.random() * 5) - 2,
                precipitation: Math.floor(Math.random() * 90) + 5
            });
        }
        
        return forecast;
    }
    
    // ========================================
    // ACTUALIZACIÓN DE INTERFAZ
    // ========================================
    
    function updateWeatherDisplay() {
        // Actualizar temperatura actual
        const tempElement = document.querySelector('.current-temp');
        if (tempElement) {
            tempElement.textContent = `${weatherData.current.temp}°C`;
        }
        
        // Actualizar detalles del clima
        updateWeatherDetails();
        
        // Actualizar pronóstico
        updateForecastDisplay();
    }
    
    function updateWeatherDetails() {
        const details = document.querySelectorAll('.weather-detail-value');
        if (details.length >= 3) {
            details[0].textContent = `${weatherData.current.precipitation}%`;
            details[1].textContent = `${weatherData.current.humidity}%`;
            details[2].textContent = `${weatherData.current.wind} km/h`;
        }
    }
    
    function updateForecastDisplay() {
        const forecastDays = document.querySelectorAll('.forecast-day');
        const forecast = weatherData.forecast[currentView];
        
        forecastDays.forEach((day, index) => {
            if (forecast[index]) {
                const data = forecast[index];
                day.querySelector('.forecast-icon').textContent = data.icon;
                day.querySelector('.temp-high').textContent = `${data.tempHigh}°`;
                day.querySelector('.temp-low').textContent = `${data.tempLow}°`;
                day.querySelector('.forecast-precipitation').textContent = `💧 ${data.precipitation}%`;
                day.querySelector('.forecast-condition').textContent = data.condition;
            }
        });
    }
    
    function updateTimeDisplay() {
        const now = new Date();
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        };
        
        const timeElement = document.querySelector('.weather-time');
        if (timeElement) {
            timeElement.textContent = now.toLocaleDateString('es-ES', options);
        }
    }
    
    // ========================================
    // FUNCIONES DE INTERACCIÓN
    // ========================================
    
    function switchForecastPeriod(period) {
        currentView = period;
        updateForecastDisplay();
        
        // Animación de transición
        const forecastDays = document.querySelector('.forecast-days');
        forecastDays.style.opacity = '0.5';
        
        setTimeout(() => {
            forecastDays.style.opacity = '1';
        }, 300);
    }
    
    function showDayDetails(dayElement) {
        const dayName = dayElement.querySelector('.forecast-day-name').textContent;
        const temp = dayElement.querySelector('.temp-high').textContent;
        const condition = dayElement.querySelector('.forecast-condition').textContent;
        
        showNotification(`${dayName}: ${condition}, máxima ${temp}`, 'info');
        
        // Efecto visual
        dayElement.style.transform = 'scale(0.98)';
        setTimeout(() => {
            dayElement.style.transform = '';
        }, 150);
    }
    
    function showAlertDetails(alertElement) {
        const alertText = alertElement.querySelector('.alert-text').textContent;
        const alertTime = alertElement.querySelector('.alert-time').textContent;
        
        showNotification(`Alerta programada para ${alertTime}`, 'warning');
        
        // Efecto visual
        alertElement.style.backgroundColor = 'rgba(255,152,0,0.2)';
        setTimeout(() => {
            alertElement.style.backgroundColor = '';
        }, 1000);
    }
    
    // ========================================
    // ACTUALIZACIONES EN TIEMPO REAL
    // ========================================
    
    function startRealTimeUpdates() {
        // Actualizar cada 5 minutos
        setInterval(() => {
            updateTimeDisplay();
            simulateWeatherChange();
        }, 300000);
        
        // Actualizar cada minuto la hora
        setInterval(() => {
            updateTimeDisplay();
        }, 60000);
    }
    
    function simulateWeatherChange() {
        // Simular pequeños cambios en el clima
        const tempVariation = (Math.random() - 0.5) * 2;
        weatherData.current.temp += tempVariation;
        
        const humidityVariation = (Math.random() - 0.5) * 10;
        weatherData.current.humidity += humidityVariation;
        
        // Mantener valores dentro de rangos realistas
        weatherData.current.temp = Math.max(-10, Math.min(40, weatherData.current.temp));
        weatherData.current.humidity = Math.max(0, Math.min(100, weatherData.current.humidity));
        
        updateWeatherDisplay();
    }
    
    // ========================================
    // EFECTOS VISUALES
    // ========================================
    
    function addWeatherEffects() {
        // Efectos de hover mejorados
        document.querySelectorAll('.weather-detail').forEach(detail => {
            detail.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.05)';
            });
            
            detail.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        });
        
        // Efectos de parallax en las tarjetas
        document.querySelectorAll('.forecast-day').forEach(day => {
            day.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateX = (y - centerY) / 10;
                const rotateY = (centerX - x) / 10;
                
                this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px)`;
            });
            
            day.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        });
    }
    
    // ========================================
    // UTILIDADES
    // ========================================
    
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            background: ${type === 'success' ? '#4CAF50' : type === 'error' ? '#f44336' : type === 'warning' ? '#FF9800' : '#2196F3'};
            color: white;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            z-index: 1000;
            font-weight: 500;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            max-width: 300px;
        `;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (notification.parentNode) {
                    document.body.removeChild(notification);
                }
            }, 300);
        }, 4000);
    }
    
    function formatDate(date) {
        const options = { 
            weekday: 'short', 
            month: 'short', 
            day: 'numeric' 
        };
        return date.toLocaleDateString('es-ES', options);
    }
    
    // ========================================
    // INICIALIZACIÓN FINAL
    // ========================================
    
    // Inicializar el sistema
    initWeatherSystem();
    addWeatherEffects();
    
    // Mensaje de bienvenida
    setTimeout(() => {
        showNotification('¡Sistema climático cargado correctamente!', 'success');
    }, 1000);
    
    // Simular carga de datos
    setTimeout(() => {
        showNotification('Datos meteorológicos actualizados', 'info');
    }, 3000);
});
</script>