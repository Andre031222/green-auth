<?php // paginas/inicio.php ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #f0fdf4 100%);
        color: #1f2937;
        line-height: 1.6;
    }

    .main-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #059669 0%, #065f46 100%);
        border-radius: 24px;
        padding: 60px 40px;
        margin-bottom: 40px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 25px 50px rgba(5, 150, 105, 0.2);
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        color: white;
        margin-bottom: 20px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .welcome-text {
        font-size: 1.3rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 40px;
        font-weight: 300;
    }

    .hero-actions {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        padding: 16px 32px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-primary {
        background: white;
        color: #059669;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
    }

    .btn-secondary {
        background: transparent;
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(10px);
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: white;
        transform: translateY(-2px);
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        margin-bottom: 50px;
    }

    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(5, 150, 105, 0.1);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #059669, #34d399);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .stat-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        background: linear-gradient(135deg, #059669, #34d399);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        box-shadow: 0 8px 20px rgba(5, 150, 105, 0.3);
    }

    .stat-content h3 {
        font-size: 14px;
        font-weight: 600;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        color: #059669;
        margin-bottom: 10px;
        display: block;
    }

    .stat-change {
        font-size: 14px;
        color: #059669;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .stat-change.negative {
        color: #dc2626;
    }

    .stat-progress {
        height: 6px;
        background: #f3f4f6;
        border-radius: 3px;
        overflow: hidden;
        margin-top: 15px;
    }

    .progress-bar {
        height: 100%;
        background: linear-gradient(90deg, #059669, #34d399);
        border-radius: 3px;
        transition: width 1s ease;
    }

    .weather-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .weather-temp {
        font-size: 2.5rem;
        font-weight: 700;
        color: #059669;
    }

    .weather-details {
        color: #6b7280;
        font-size: 14px;
    }

    /* Chart Section */
    .chart-section {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
        margin-bottom: 50px;
    }

    .chart-card, .alerts-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(5, 150, 105, 0.1);
    }

    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .chart-title {
        font-size: 20px;
        font-weight: 700;
        color: #1f2937;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .chart-title i {
        color: #059669;
    }

    .chart-container {
        position: relative;
        height: 300px;
        margin-bottom: 20px;
    }

    .chart-bars {
        display: flex;
        align-items: end;
        height: 100%;
        gap: 20px;
        padding: 0 10px;
    }

    .chart-bar-wrapper {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%;
    }

    .chart-bar {
        width: 100%;
        background: linear-gradient(135deg, #059669, #34d399);
        border-radius: 8px 8px 0 0;
        transition: all 0.6s ease;
        position: relative;
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.2);
    }

    .chart-bar:hover {
        background: linear-gradient(135deg, #047857, #10b981);
        transform: scale(1.05);
    }

    .chart-labels {
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
        padding: 0 10px;
    }

    .chart-label {
        font-size: 12px;
        color: #6b7280;
        font-weight: 500;
    }

    /* Alerts Card */
    .alerts-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .alerts-counter {
        background: #fef3c7;
        color: #f59e0b;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .alerts-summary {
        margin-bottom: 25px;
        padding: 20px;
        background: #f0fdf4;
        border-radius: 12px;
        border-left: 4px solid #059669;
    }

    .alerts-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .alert-item {
        display: flex;
        gap: 15px;
        padding: 20px;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .alert-item:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .alert-item.priority-high {
        border-left: 4px solid #dc2626;
        background: #fef2f2;
    }

    .alert-item.priority-medium {
        border-left: 4px solid #f59e0b;
        background: #fffbeb;
    }

    .alert-item.priority-low {
        border-left: 4px solid #059669;
        background: #f0fdf4;
    }

    .alert-item .alert-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        color: white;
    }

    .priority-high .alert-icon {
        background: #dc2626;
    }

    .priority-medium .alert-icon {
        background: #f59e0b;
    }

    .priority-low .alert-icon {
        background: #059669;
    }

    .alert-content {
        flex: 1;
    }

    .alert-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 5px;
    }

    .alert-header h4 {
        font-size: 16px;
        font-weight: 600;
        color: #1f2937;
    }

    .alert-time {
        font-size: 12px;
        color: #6b7280;
    }

    .alert-content p {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .alert-actions {
        display: flex;
        gap: 8px;
    }

    .btn-alert {
        padding: 6px 12px;
        border: none;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-resolve {
        background: #059669;
        color: white;
    }

    .btn-resolve:hover {
        background: #047857;
    }

    .btn-view {
        background: #f3f4f6;
        color: #6b7280;
    }

    .btn-view:hover {
        background: #e5e7eb;
    }

    /* Tools Grid */
    .section-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .section-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 10px;
    }

    .section-header p {
        color: #6b7280;
        font-size: 18px;
    }

    .tools-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
        margin-bottom: 50px;
    }

    .tool-card {
        background: white;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(5, 150, 105, 0.1);
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .tool-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #059669, #34d399);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .tool-card:hover::before {
        transform: scaleX(1);
    }

    .tool-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .tool-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        background: linear-gradient(135deg, #059669, #34d399);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 20px;
        box-shadow: 0 8px 20px rgba(5, 150, 105, 0.3);
    }

    .tool-content h3 {
        font-size: 18px;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 8px;
    }

    .tool-content p {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .tool-stats {
        display: flex;
        gap: 15px;
        font-size: 12px;
        color: #059669;
        font-weight: 500;
    }

    .tool-status {
        margin-top: 10px;
    }

    .status-good {
        color: #059669;
        font-size: 12px;
        font-weight: 500;
    }

    .status-pending {
        color: #f59e0b;
        font-size: 12px;
        font-weight: 500;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .welcome-text {
            font-size: 1.1rem;
        }

        .hero-actions {
            flex-direction: column;
            align-items: center;
        }

        .chart-section {
            grid-template-columns: 1fr;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .tools-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Hero Section -->
<div class="main-container">
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">🌱 Green Modern Agrifarm</h1>
            <p class="welcome-text"></p>
            <div class="hero-actions">
                <a href="?page=cultivo-insumos" class="btn btn-primary">
                    <i class="fas fa-seedling"></i> Empezar Análisis
                </a>
                <a href="?page=informes" class="btn btn-secondary">
                    <i class="fas fa-chart-line"></i> Ver Reportes
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="fas fa-seedling"></i>
                </div>
            </div>
            <div class="stat-content">
                <h3>Cultivos Activos</h3>
                <div class="stat-number"><?php echo $cultivos_activos; ?></div>
                <div class="stat-change">
                    <i class="fas fa-arrow-up"></i>
                    +2 este mes
                </div>
            </div>
            <div class="stat-progress">
                <div class="progress-bar" style="width: 78%"></div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
            </div>
            <div class="stat-content">
                <h3>Alertas del Día</h3>
                <div class="stat-number"><?php echo $alertas_dia; ?></div>
                <div class="stat-change negative">
                    <i class="fas fa-arrow-down"></i>
                    -1 desde ayer
                </div>
            </div>
            <div class="stat-progress">
                <div class="progress-bar" style="width: 25%"></div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="fas fa-sun"></i>
                </div>
            </div>
            <div class="stat-content">
                <h3>Clima Actual</h3>
                <div class="weather-info">
                    <div class="weather-temp"><?php echo $temperatura; ?>°</div>
                    <div>
                        <div style="color: #059669; font-weight: 600;">Soleado</div>
                        <div class="weather-details">Humedad: 65% | Viento: 12 km/h</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
            <div class="stat-content">
                <h3>Eficiencia Semanal</h3>
                <div class="stat-number">89</div>
                <div class="stat-change">
                    <i class="fas fa-arrow-up"></i>
                    +5% mejora
                </div>
            </div>
            <div class="stat-progress">
                <div class="progress-bar" style="width: 89%"></div>
            </div>
        </div>
    </div>

    <!-- Chart and Alerts Section -->
    <div class="chart-section">
        <div class="chart-card">
            <div class="chart-header">
                <h3 class="chart-title">
                    <i class="fas fa-chart-area"></i> Rendimiento de Cultivos
                </h3>
                <select class="chart-filter">
                    <option>Últimos 7 días</option>
                    <option>Últimos 30 días</option>
                    <option>Últimos 3 meses</option>
                </select>
            </div>
            <div class="chart-container">
                <div class="chart-bars">
                    <?php foreach($rendimiento_datos as $index => $valor): ?>
                        <div class="chart-bar-wrapper">
                            <div class="chart-bar" style="height: <?php echo $valor; ?>%"></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="chart-labels">
                    <?php foreach($labels_dias as $dia): ?>
                        <span class="chart-label"><?php echo $dia; ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="alerts-card">
            <div class="alerts-header">
                <h3 class="chart-title">
                    <i class="fas fa-bell"></i> Centro de Alertas
                </h3>
                <div class="alerts-counter"><?php echo $alertas_pendientes; ?></div>
            </div>
            
            <div class="alerts-summary">
                <p>Tienes <strong><?php echo $alertas_pendientes; ?> alertas</strong> que requieren tu atención inmediata</p>
            </div>
            
            <div class="alerts-list">
                <div class="alert-item priority-high">
                    <div class="alert-icon">
                        <i class="fas fa-tint"></i>
                    </div>
                    <div class="alert-content">
                        <div class="alert-header">
                            <h4>Riego Crítico</h4>
                            <span class="alert-time">Hace 2 horas</span>
                        </div>
                        <p>Cultivo de tomates sector A requiere riego inmediato</p>
                        <div class="alert-actions">
                            <button class="btn-alert btn-resolve">Resolver</button>
                            <button class="btn-alert btn-view">Ver detalles</button>
                        </div>
                    </div>
                </div>
                
                <div class="alert-item priority-medium">
                    <div class="alert-icon">
                        <i class="fas fa-bug"></i>
                    </div>
                    <div class="alert-content">
                        <div class="alert-header">
                            <h4>Plaga Detectada</h4>
                            <span class="alert-time">Hace 4 horas</span>
                        </div>
                        <p>Posible infestación de pulgones en sector B</p>
                        <div class="alert-actions">
                            <button class="btn-alert btn-resolve">Resolver</button>
                            <button class="btn-alert btn-view">Ver detalles</button>
                        </div>
                    </div>
                </div>
                
                <div class="alert-item priority-low">
                    <div class="alert-icon">
                        <i class="fas fa-thermometer-three-quarters"></i>
                    </div>
                    <div class="alert-content">
                        <div class="alert-header">
                            <h4>Temperatura Elevada</h4>
                            <span class="alert-time">Hace 6 horas</span>
                        </div>
                        <p>Temperatura 3°C por encima del promedio</p>
                        <div class="alert-actions">
                            <button class="btn-alert btn-resolve">Resolver</button>
                            <button class="btn-alert btn-view">Ver detalles</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="quick-actions-section">
        <div class="section-header">
            <h2>Herramientas Inteligentes</h2>
            <p>Accede a las funcionalidades esenciales para gestionar tu agricultura</p>
        </div>
        
        <div class="tools-grid">
            <div class="tool-card" onclick="location.href='?page=clima'">
                <div class="tool-icon">
                    <i class="fas fa-cloud-sun"></i>
                </div>
                <div class="tool-content">
                    <h3>Monitoreo Climático</h3>
                    <p>Supervisa condiciones meteorológicas en tiempo real con sensores IoT</p>
                    <div class="tool-stats">
                        <span>🌡️ <?php echo $temperatura; ?>°C</span>
                        <span>💧 65%</span>
                        <span>🌬️ 12 km/h</span>
                    </div>
                </div>
            </div>
            
            <div class="tool-card" onclick="location.href='?page=deteccion-plagas'">
                <div class="tool-icon">
                    <i class="fas fa-search-plus"></i>
                </div>
                <div class="tool-content">
                    <h3>Detección de Plagas</h3>
                    <p>Identifica y previene problemas con IA y visión por computadora</p>
                    <div class="tool-status">
                        <span class="status-good">✅ Sistema activo - 98% precisión</span>
                    </div>
                </div>
            </div>
            
            <div class="tool-card" onclick="location.href='?page=cultivo-insumos'">
                <div class="tool-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <div class="tool-content">
                    <h3>Calculadora de Insumos</h3>
                    <p>Optimiza fertilizantes y recursos con algoritmos avanzados</p>
                    <div class="tool-stats">
                        <span>💰 Ahorro: 23%</span>
                        <span>📊 Eficiencia: +15%</span>
                    </div>
                </div>
            </div>
            
            <div class="tool-card" onclick="location.href='?page=prediccion'">
                <div class="tool-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="tool-content">
                    <h3>Predicción de Cosechas</h3>
                    <p>Estima rendimientos usando machine learning y big data</p>
                    <div class="tool-stats">
                        <span>📈 Precisión: 94%</span>
                        <span>🎯 Confianza: 96%</span>
                    </div>
                </div>
            </div>
            
            <div class="tool-card" onclick="location.href='?page=gestion-cultivo'">
                <div class="tool-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <div class="tool-content">
                    <h3>Gestión de Cultivos</h3>
                    <p>Administra y programa tareas agrícolas automáticamente</p>
                    <div class="tool-status">
                        <span class="status-pending">⏳ 5 tareas programadas</span>
                    </div>
                </div>
            </div>
            
            <div class="tool-card" onclick="location.href='?page=informes'">
                <div class="tool-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="tool-content">
                    <h3>Reportes Inteligentes</h3>
                    <p>Genera informes detallados con análisis predictivo</p>
                    <div class="tool-stats">
                        <span>📊 12 reportes</span>
                        <span>🔍 Análisis en vivo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Animaciones y efectos interactivos
document.addEventListener('DOMContentLoaded', function() {
    // Animación de barras de progreso
    const progressBars = document.querySelectorAll('.progress-bar');
    progressBars.forEach((bar, index) => {
        const width = bar.style.width;
        bar.style.width = '0%';
        setTimeout(() => {
            bar.style.width = width;
        }, 500 + (index * 200));
    });
    
    // Animación de barras del gráfico
    const chartBars = document.querySelectorAll('.chart-bar');
    chartBars.forEach((bar, index) => {
        const height = bar.style.height;
        bar.style.height = '0%';
        setTimeout(() => {
            bar.style.height = height;
        }, 1000 + (index * 150));
    });
    
    // Efectos de hover en tiempo real
    document.addEventListener('mousemove', (e) => {
        const hero = document.querySelector('.hero-section');
        if (hero) {
            const x = (e.clientX / window.innerWidth) * 5;
            const y = (e.clientY / window.innerHeight) * 5;
            hero.style.transform = `translate(${x}px, ${y}px)`;
        }
    });
    
    // Efectos de card hover
    document.querySelectorAll('.tool-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Simulación de notificaciones
    setTimeout(() => {
        showNotification('Sistema Green Modern Agrifarm iniciado correctamente', 'success');
    }, 1500);
});

// Sistema de notificaciones
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'success' ? '#059669' : '#3b82f6'};
        color: white;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        z-index: 1000;
        animation: slideIn 0.3s ease;
        font-weight: 600;
    `;
    
    notification.innerHTML = `
        <div style="display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-${type === 'success' ? 'check' : 'info'}-circle"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Agregar estilos CSS para animaciones
const additionalStyles = `
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;

const styleSheet = document.createElement('style');
styleSheet.textContent = additionalStyles;
document.head.appendChild(styleSheet);
</script>