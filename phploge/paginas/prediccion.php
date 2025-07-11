<?php
// paginas/prediccion.php
?>

<!-- Incluir CSS específico -->
<link rel="stylesheet" href="assets/css/prediccion.css">

<div class="page-content">
    <!-- Header principal -->
    <div class="prediccion-header">
        <h1 class="prediccion-title">Predicción de Cultivos</h1>
        <p class="prediccion-subtitle">Análisis Predictivo Avanzado con Inteligencia Artificial</p>
        <p class="prediccion-description">
            Utiliza algoritmos de machine learning para predecir el rendimiento de tus cultivos, 
            optimizar recursos y maximizar la productividad basándose en datos históricos, 
            condiciones climáticas y mejores prácticas agrícolas.
        </p>
    </div>

    <!-- Barra de herramientas -->
    <div class="toolbar">
        <div class="toolbar-section">
            <span class="toolbar-label">Período de Análisis:</span>
            <div class="date-range">
                <input type="date" class="date-input" value="2019-01-01">
                <span>a</span>
                <input type="date" class="date-input" value="2024-12-31">
            </div>
        </div>
        <div class="toolbar-section">
            <button class="btn-update">
                <i class="fas fa-sync-alt"></i> Actualizar
            </button>
            <button class="btn-export">
                <i class="fas fa-download"></i> Exportar
            </button>
        </div>
    </div>

    <!-- Selector de cultivos -->
    <div class="cultivo-selector">
        <div class="cultivo-tab active">Papa</div>
        <div class="cultivo-tab">Oca</div>
        <div class="cultivo-tab">Avena</div>
        <div class="cultivo-tab">Alfalfa</div>
    </div>
    
    <!-- Contenedor principal -->
    <div class="prediccion-container">
        <!-- Sección de gráfico -->
        <div class="grafico-section">
            <h3 class="grafico-title">
                <i class="fas fa-chart-line"></i> Predicción de Rendimiento - Papa
            </h3>
            <div class="chart-container">
                <svg class="chart-svg" viewBox="0 0 400 250">
                    <!-- El gráfico se generará dinámicamente con JavaScript -->
                </svg>
            </div>
            <div class="chart-legend">
                <div class="legend-item">
                    <div class="legend-color legend-sembradas"></div>
                    <span>Hectáreas Sembradas</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color legend-cosechadas"></div>
                    <span>Hectáreas Cosechadas</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color legend-prediccion"></div>
                    <span>Predicción IA</span>
                </div>
            </div>
        </div>
        
        <!-- Información del cultivo -->
        <div class="cultivo-info">
            <div class="cultivo-image">🥔</div>
            <h3 class="cultivo-name">Papa</h3>
            <p class="cultivo-description">
                La papa es uno de los cultivos más importantes en la región andina. 
                Rico en carbohidratos y vitaminas, es base de la alimentación local.
            </p>
            <div class="cultivo-metrics">
                <div class="metric-item">
                    <div class="metric-value">90</div>
                    <div class="metric-label">Días</div>
                </div>
                <div class="metric-item">
                    <div class="metric-value">12.5</div>
                    <div class="metric-label">Ton/Ha</div>
                </div>
                <div class="metric-item">
                    <div class="metric-value">$2.4</div>
                    <div class="metric-label">Precio/Kg</div>
                </div>
                <div class="metric-item">
                    <div class="metric-value">Bajo</div>
                    <div class="metric-label">Riesgo</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas de predicción -->
    <div class="prediccion-stats">
        <h3 class="stats-title">
            <i class="fas fa-chart-bar"></i> Métricas de Predicción
        </h3>
        <div class="stats-grid">
            <div class="stat-item tooltip" data-tooltip="Precisión del modelo predictivo">
                <div class="stat-value">87%</div>
                <div class="stat-label">Precisión</div>
            </div>
            <div class="stat-item tooltip" data-tooltip="Rendimiento promedio esperado">
                <div class="stat-value">12.5</div>
                <div class="stat-label">Ton/Ha</div>
            </div>
            <div class="stat-item tooltip" data-tooltip="Mejora respecto al año anterior">
                <div class="stat-value">+15%</div>
                <div class="stat-label">Mejora</div>
            </div>
            <div class="stat-item tooltip" data-tooltip="Duración del ciclo de cultivo">
                <div class="stat-value">90</div>
                <div class="stat-label">Días</div>
            </div>
            <div class="stat-item tooltip" data-tooltip="Ingreso estimado por hectárea">
                <div class="stat-value">$2,400</div>
                <div class="stat-label">Ingreso/Ha</div>
            </div>
            <div class="stat-item tooltip" data-tooltip="Nivel de confianza de la predicción">
                <div class="stat-value">94%</div>
                <div class="stat-label">Confianza</div>
            </div>
        </div>
    </div>

    <!-- Sección de acciones recomendadas -->
    <div class="actions-section">
        <h3 class="actions-title">
            <i class="fas fa-tasks"></i> Acciones Recomendadas
        </h3>
        <div class="actions-grid">
            <div class="action-card" data-action="Optimizar Siembra">
                <div class="action-icon">🌱</div>
                <h4 class="action-name">Optimizar Siembra</h4>
                <p class="action-description">Ajusta las fechas de siembra según las predicciones climáticas y condiciones del suelo</p>
                <div class="action-status status-recomendado">Recomendado</div>
            </div>
            
            <div class="action-card" data-action="Planificar Riego">
                <div class="action-icon">💧</div>
                <h4 class="action-name">Planificar Riego</h4>
                <p class="action-description">Programa el riego basado en las necesidades hídricas previstas del cultivo</p>
                <div class="action-status status-recomendado">Recomendado</div>
            </div>
            
            <div class="action-card" data-action="Aplicar Fertilizantes">
                <div class="action-icon">🌿</div>
                <h4 class="action-name">Aplicar Fertilizantes</h4>
                <p class="action-description">Timing óptimo para la aplicación de nutrientes según etapa fenológica</p>
                <div class="action-status status-programado">Programado</div>
            </div>
            
            <div class="action-card" data-action="Monitorear Progreso">
                <div class="action-icon">📊</div>
                <h4 class="action-name">Monitorear Progreso</h4>
                <p class="action-description">Seguimiento continuo del desarrollo del cultivo con sensores IoT</p>
                <div class="action-status status-recomendado">Recomendado</div>
            </div>
            
            <div class="action-card" data-action="Control Fitosanitario">
                <div class="action-icon">🛡️</div>
                <h4 class="action-name">Control Fitosanitario</h4>
                <p class="action-description">Prevención y control de plagas y enfermedades específicas del cultivo</p>
                <div class="action-status status-urgente">Urgente</div>
            </div>
            
            <div class="action-card" data-action="Optimizar Cosecha">
                <div class="action-icon">🚜</div>
                <h4 class="action-name">Optimizar Cosecha</h4>
                <p class="action-description">Determinar el momento óptimo de cosecha para maximizar calidad y rendimiento</p>
                <div class="action-status status-programado">Programado</div>
            </div>
        </div>
    </div>

    <!-- Análisis avanzado -->
    <div class="analisis-avanzado">
        <h3 class="analisis-title">
            <i class="fas fa-brain"></i> Análisis Avanzado con IA
        </h3>
        <div class="analisis-grid">
            <div class="analisis-card">
                <h4>Análisis de Riesgo Climático</h4>
                <p>
                    Basado en patrones climáticos históricos y pronósticos meteorológicos, 
                    el riesgo de pérdidas por factores climáticos es <strong>bajo</strong> 
                    para la próxima temporada.
                </p>
                <div class="analisis-metrics">
                    <div class="analisis-metric">
                        <div class="analisis-metric-value">15%</div>
                        <div class="analisis-metric-label">Riesgo Sequía</div>
                    </div>
                    <div class="analisis-metric">
                        <div class="analisis-metric-value">8%</div>
                        <div class="analisis-metric-label">Riesgo Heladas</div>
                    </div>
                    <div class="analisis-metric">
                        <div class="analisis-metric-value">5%</div>
                        <div class="analisis-metric-label">Riesgo Inundación</div>
                    </div>
                </div>
            </div>
            
            <div class="analisis-card">
                <h4>Optimización de Recursos</h4>
                <p>
                    Los algoritmos de IA sugieren ajustes en el uso de agua, fertilizantes 
                    y mano de obra para maximizar la eficiencia y reducir costos operativos.
                </p>
                <div class="analisis-metrics">
                    <div class="analisis-metric">
                        <div class="analisis-metric-value">-12%</div>
                        <div class="analisis-metric-label">Agua</div>
                    </div>
                    <div class="analisis-metric">
                        <div class="analisis-metric-value">-8%</div>
                        <div class="analisis-metric-label">Fertilizantes</div>
                    </div>
                    <div class="analisis-metric">
                        <div class="analisis-metric-value">+15%</div>
                        <div class="analisis-metric-label">Eficiencia</div>
                    </div>
                </div>
            </div>
            
            <div class="analisis-card">
                <h4>Predicción de Mercado</h4>
                <p>
                    Análisis de tendencias de precios y demanda del mercado local e internacional 
                    para optimizar las decisiones de comercialización y maximizar ingresos.
                </p>
                <div class="analisis-metrics">
                    <div class="analisis-metric">
                        <div class="analisis-metric-value">+8%</div>
                        <div class="analisis-metric-label">Precio Esperado</div>
                    </div>
                    <div class="analisis-metric">
                        <div class="analisis-metric-value">Alta</div>
                        <div class="analisis-metric-label">Demanda</div>
                    </div>
                    <div class="analisis-metric">
                        <div class="analisis-metric-value">92%</div>
                        <div class="analisis-metric-label">Confianza</div>
                    </div>
                </div>
            </div>
            
            <div class="analisis-card">
                <h4>Sostenibilidad Ambiental</h4>
                <p>
                    Evaluación del impacto ambiental de las prácticas agrícolas propuestas 
                    y recomendaciones para mantener la sostenibilidad a largo plazo.
                </p>
                <div class="analisis-metrics">
                    <div class="analisis-metric">
                        <div class="analisis-metric-value">-25%</div>
                        <div class="analisis-metric-label">Huella Carbono</div>
                    </div>
                    <div class="analisis-metric">
                        <div class="analisis-metric-value">+18%</div>
                        <div class="analisis-metric-label">Biodiversidad</div>
                    </div>
                    <div class="analisis-metric">
                        <div class="analisis-metric-value">A+</div>
                        <div class="analisis-metric-label">Sostenibilidad</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de comparación histórica -->
    <div class="comparacion-historica">
        <h3 class="stats-title">
            <i class="fas fa-history"></i> Comparación Histórica
        </h3>
        <div class="comparacion-grid">
            <div class="comparacion-card">
                <h4>Rendimiento por Año</h4>
                <div class="comparacion-chart">
                    <div class="bar-chart">
                        <div class="bar" style="height: 70%;" data-year="2019" data-value="10.2">
                            <span class="bar-label">2019</span>
                            <span class="bar-value">10.2</span>
                        </div>
                        <div class="bar" style="height: 75%;" data-year="2020" data-value="11.1">
                            <span class="bar-label">2020</span>
                            <span class="bar-value">11.1</span>
                        </div>
                        <div class="bar" style="height: 80%;" data-year="2021" data-value="11.8">
                            <span class="bar-label">2021</span>
                            <span class="bar-value">11.8</span>
                        </div>
                        <div class="bar" style="height: 85%;" data-year="2022" data-value="12.3">
                            <span class="bar-label">2022</span>
                            <span class="bar-value">12.3</span>
                        </div>
                        <div class="bar" style="height: 90%;" data-year="2023" data-value="12.5">
                            <span class="bar-label">2023</span>
                            <span class="bar-value">12.5</span>
                        </div>
                        <div class="bar prediction" style="height: 95%;" data-year="2024" data-value="14.2">
                            <span class="bar-label">2024</span>
                            <span class="bar-value">14.2*</span>
                        </div>
                    </div>
                    <p class="chart-note">* Predicción basada en IA</p>
                </div>
            </div>
            
            <div class="comparacion-card">
                <h4>Factores de Éxito</h4>
                <div class="factores-lista">
                    <div class="factor-item">
                        <div class="factor-icon">☀️</div>
                        <div class="factor-info">
                            <h5>Condiciones Climáticas</h5>
                            <p>Temperatura y precipitación óptimas</p>
                            <div class="factor-progress">
                                <div class="progress-bar" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="factor-item">
                        <div class="factor-icon">🌱</div>
                        <div class="factor-info">
                            <h5>Calidad del Suelo</h5>
                            <p>pH y nutrientes en niveles adecuados</p>
                            <div class="factor-progress">
                                <div class="progress-bar" style="width: 78%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="factor-item">
                        <div class="factor-icon">💧</div>
                        <div class="factor-info">
                            <h5>Manejo del Riego</h5>
                            <p>Sistema de irrigación eficiente</p>
                            <div class="factor-progress">
                                <div class="progress-bar" style="width: 92%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="factor-item">
                        <div class="factor-icon">🛡️</div>
                        <div class="factor-info">
                            <h5>Control Fitosanitario</h5>
                            <p>Prevención de plagas y enfermedades</p>
                            <div class="factor-progress">
                                <div class="progress-bar" style="width: 88%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Incluir JavaScript específico -->
<script src="assets/js/prediccion.js"></script>

<!-- Estilos adicionales específicos para esta página -->
<style>
.comparacion-historica {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    margin-top: 30px;
    animation: fadeInUp 0.6s ease-out 0.8s both;
}

.comparacion-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    margin-top: 25px;
}

.comparacion-card {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 15px;
    border: 1px solid #e9ecef;
}

.comparacion-card h4 {
    color: #2c3e50;
    font-size: 1.2rem;
    margin-bottom: 20px;
    font-weight: 600;
}

.bar-chart {
    display: flex;
    align-items: end;
    justify-content: space-between;
    height: 200px;
    margin-bottom: 15px;
    padding: 0 10px;
}

.bar {
    width: 30px;
    background: linear-gradient(to top, #4CAF50, #81C784);
    border-radius: 4px 4px 0 0;
    position: relative;
    transition: all 0.3s ease;
    cursor: pointer;
}

.bar.prediction {
    background: linear-gradient(to top, #2196F3, #64B5F6);
}

.bar:hover {
    transform: scale(1.05);
}

.bar-label {
    position: absolute;
    bottom: -25px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 0.8rem;
    color: #666;
    font-weight: 600;
}

.bar-value {
    position: absolute;
    top: -25px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 0.8rem;
    color: #2c3e50;
    font-weight: 600;
}

.chart-note {
    font-size: 0.8rem;
    color: #666;
    font-style: italic;
    text-align: center;
}

.factores-lista {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.factor-item {
    display: flex;
    align-items: center;
    gap: 15px;
}

.factor-icon {
    font-size: 2rem;
    width: 50px;
    text-align: center;
}

.factor-info {
    flex: 1;
}

.factor-info h5 {
    color: #2c3e50;
    font-size: 1rem;
    margin-bottom: 5px;
    font-weight: 600;
}

.factor-info p {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 10px;
}

.factor-progress {
    width: 100%;
    height: 8px;
    background: #e9ecef;
    border-radius: 4px;
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    background: linear-gradient(90deg, #4CAF50, #81C784);
    border-radius: 4px;
    transition: width 0.3s ease;
}

@media (max-width: 768px) {
    .comparacion-grid {
        grid-template-columns: 1fr;
    }
    
    .bar-chart {
        height: 150px;
    }
    
    .bar {
        width: 25px;
    }
}
</style>