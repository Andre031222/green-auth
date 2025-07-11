<?php
// paginas/informes.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriFarm</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="assets/css/informes.css" rel="stylesheet">
</head>
<body>
    <!-- Este contenido se inserta en el área principal, sin sidebar -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h1></h1>
            <div class="header-actions">
                <button class="btn btn-secondary" onclick="abrirArchivo()">
                    <i class="fas fa-archive"></i>
                    Archivo
                </button>
                <button class="btn btn-primary" onclick="abrirModalPersonalizado()">
                    <i class="fas fa-plus"></i>
                    Crear Personalizado
                </button>
            </div>
        </div>
        
        <!-- Filters Bar -->
        <div class="filters-bar">
            <div class="filters-grid">
                <div class="filter-group">
                    <label class="filter-label">PERÍODO</label>
                    <select class="filter-select" id="filtro-periodo">
                        <option value="30">Últimos 30 días</option>
                        <option value="90">Últimos 3 meses</option>
                        <option value="365">1 año</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">CULTIVOS</label>
                    <select class="filter-select" id="filtro-cultivos">
                        <option value="todos">Todos los cultivos</option>
                        <option value="papa">Papa</option>
                        <option value="habas">Habas</option>
                        <option value="oca">Oca</option>
                        <option value="alfalfa">Alfalfa</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">UBICACIÓN</label>
                    <select class="filter-select" id="filtro-ubicacion">
                        <option value="mi-finca">Mi finca</option>
                        <option value="sector-norte">Sector Norte</option>
                        <option value="sector-sur">Sector Sur</option>
                        <option value="todas">Todas las ubicaciones</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">BÚSQUEDA</label>
                    <input type="text" class="filter-input" id="busqueda-informes" placeholder="Buscar informes...">
                </div>
            </div>
        </div>
        
        <!-- Content Area -->
        <div class="content-area">
            <div class="reports-section">
                <!-- Dashboard Ejecutivo -->
                <div class="report-card">
                    <div class="report-header">
                        <div class="report-icon dashboard">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div>
                            <div class="report-title">Dashboard Ejecutivo</div>
                            <div class="report-subtitle">Resumen completo de KPIs principales</div>
                        </div>
                    </div>
                    <div class="report-description">
                        Resumen completo de KPIs principales: rendimiento, costos, alertas y predicciones para una visión integral de tu operación agrícola.
                    </div>
                    <div class="report-meta">
                        <div class="report-time">
                            <i class="fas fa-clock"></i>
                            2 min
                        </div>
                        <div class="report-status status-available">Disponible</div>
                    </div>
                    <button class="btn-generate" onclick="generarInforme('dashboard', this)">
                        <i class="fas fa-file-pdf"></i>
                        Generar PDF
                    </button>
                </div>
                
                <!-- Estado de Cultivos -->
                <div class="report-card">
                    <div class="report-header">
                        <div class="report-icon crops">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <div>
                            <div class="report-title">Estado de Cultivos</div>
                            <div class="report-subtitle">Análisis detallado de salud y crecimiento</div>
                        </div>
                    </div>
                    <div class="report-description">
                        Análisis detallado de salud, crecimiento y próximas acciones para todos tus cultivos con recomendaciones específicas.
                    </div>
                    <div class="report-meta">
                        <div class="report-time">
                            <i class="fas fa-clock"></i>
                            3 min
                        </div>
                        <div class="report-status status-available">Disponible</div>
                    </div>
                    <button class="btn-generate" onclick="generarInforme('cultivos', this)">
                        <i class="fas fa-file-pdf"></i>
                        Generar PDF
                    </button>
                </div>
                
                <!-- Análisis Financiero -->
                <div class="report-card">
                    <div class="report-header">
                        <div class="report-icon financial">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div>
                            <div class="report-title">Análisis Financiero</div>
                            <div class="report-subtitle">ROI por cultivo y análisis de costos</div>
                        </div>
                    </div>
                    <div class="report-description">
                        ROI por cultivo, análisis de costos, proyecciones de rentabilidad y comparativas con períodos anteriores.
                    </div>
                    <div class="report-meta">
                        <div class="report-time">
                            <i class="fas fa-clock"></i>
                            5 min
                        </div>
                        <div class="report-status status-processing">Procesando</div>
                    </div>
                    <button class="btn-generate" onclick="generarInforme('financiero', this)" disabled>
                        <i class="fas fa-file-pdf"></i>
                        Generar PDF
                    </button>
                </div>
                
                <!-- Impacto Climático -->
                <div class="report-card">
                    <div class="report-header">
                        <div class="report-icon climate">
                            <i class="fas fa-cloud-sun"></i>
                        </div>
                        <div>
                            <div class="report-title">Impacto Climático</div>
                            <div class="report-subtitle">Análisis de condiciones meteorológicas</div>
                        </div>
                    </div>
                    <div class="report-description">
                        Análisis de condiciones meteorológicas y su efecto en la producción agrícola con predicciones futuras.
                    </div>
                    <div class="report-meta">
                        <div class="report-time">
                            <i class="fas fa-clock"></i>
                            4 min
                        </div>
                        <div class="report-status status-available">Disponible</div>
                    </div>
                    <button class="btn-generate" onclick="generarInforme('climatico', this)">
                        <i class="fas fa-file-pdf"></i>
                        Generar PDF
                    </button>
                </div>

                <!-- Detección de Plagas -->
                <div class="report-card">
                    <div class="report-header">
                        <div class="report-icon pests">
                            <i class="fas fa-bug"></i>
                        </div>
                        <div>
                            <div class="report-title">Detección de Plagas</div>
                            <div class="report-subtitle">Resumen de plagas detectadas y tratamientos</div>
                        </div>
                    </div>
                    <div class="report-description">
                        Resumen de plagas detectadas, tratamientos aplicados y recomendaciones preventivas para mantener cultivos saludables.
                    </div>
                    <div class="report-meta">
                        <div class="report-time">
                            <i class="fas fa-clock"></i>
                            2 min
                        </div>
                        <div class="report-status status-available">Disponible</div>
                    </div>
                    <button class="btn-generate" onclick="generarInforme('plagas', this)">
                        <i class="fas fa-file-pdf"></i>
                        Generar PDF
                    </button>
                </div>

                <!-- Sostenibilidad -->
                <div class="report-card">
                    <div class="report-header">
                        <div class="report-icon sustainability">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <div>
                            <div class="report-title">Sostenibilidad</div>
                            <div class="report-subtitle">Huella de carbono y eficiencia de recursos</div>
                        </div>
                    </div>
                    <div class="report-description">
                        Huella de carbono, uso eficiente de recursos y avance hacia certificaciones de sostenibilidad agrícola.
                    </div>
                    <div class="report-meta">
                        <div class="report-time">
                            <i class="fas fa-clock"></i>
                            5 min
                        </div>
                        <div class="report-status status-available">Disponible</div>
                    </div>
                    <button class="btn-generate" onclick="generarInforme('sostenibilidad', this)">
                        <i class="fas fa-file-pdf"></i>
                        Generar PDF
                    </button>
                </div>
            </div>
            
            <!-- Sidebar Right -->
            <div class="sidebar-right">
                <div class="stats-card">
                    <div class="stats-title">
                        <i class="fas fa-chart-bar"></i>
                        Estadísticas de Informes
                    </div>
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-value" id="total-informes">47</div>
                            <div class="stat-label">Informes Generados</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value" id="informes-mes">12</div>
                            <div class="stat-label">Este Mes</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">98%</div>
                            <div class="stat-label">Precisión</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">5.2GB</div>
                            <div class="stat-label">Datos Analizados</div>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card">
                    <div class="stats-title">
                        <i class="fas fa-history"></i>
                        Historial de Informes
                    </div>
                    <div id="historial-lista">
                        <div class="history-item">
                            <div class="history-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="history-details">
                                <div class="history-title">Dashboard Ejecutivo - Diciembre 2024</div>
                                <div class="history-meta">Generado hace 2 días • 847 KB</div>
                            </div>
                            <div class="history-actions">
                                <button class="btn-small btn-view" onclick="verInforme('dashboard-dic')">
                                    <i class="fas fa-eye"></i>
                                    Ver
                                </button>
                                <button class="btn-small btn-download" onclick="descargarInforme('dashboard-dic')">
                                    <i class="fas fa-download"></i>
                                    Descargar
                                </button>
                            </div>
                        </div>
                        
                        <div class="history-item">
                            <div class="history-icon">
                                <i class="fas fa-seedling"></i>
                            </div>
                            <div class="history-details">
                                <div class="history-title">Estado de Cultivos - Noviembre 2024</div>
                                <div class="history-meta">Generado hace 1 semana • 1.2 MB</div>
                            </div>
                            <div class="history-actions">
                                <button class="btn-small btn-view" onclick="verInforme('cultivos-nov')">
                                    <i class="fas fa-eye"></i>
                                    Ver
                                </button>
                                <button class="btn-small btn-download" onclick="descargarInforme('cultivos-nov')">
                                    <i class="fas fa-download"></i>
                                    Descargar
                                </button>
                            </div>
                        </div>
                        
                        <div class="history-item">
                            <div class="history-icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="history-details">
                                <div class="history-title">Análisis Financiero - Octubre 2024</div>
                                <div class="history-meta">Generado hace 3 semanas • 923 KB</div>
                            </div>
                            <div class="history-actions">
                                <button class="btn-small btn-view" onclick="verInforme('financiero-oct')">
                                    <i class="fas fa-eye"></i>
                                    Ver
                                </button>
                                <button class="btn-small btn-download" onclick="descargarInforme('financiero-oct')">
                                    <i class="fas fa-download"></i>
                                    Descargar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para crear informe personalizado -->
    <div id="modal-personalizado" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cerrarModal()">&times;</span>
            <h2>Crear Informe Personalizado</h2>
            <form id="form-personalizado">
                <div class="filter-group">
                    <label class="filter-label">Nombre del Informe</label>
                    <input type="text" class="filter-input" id="nombre-informe" placeholder="Ingrese el nombre del informe">
                </div>
                <div class="filter-group">
                    <label class="filter-label">Secciones a Incluir</label>
                    <div class="checkbox-grid">
                        <label><input type="checkbox" checked> Resumen Ejecutivo</label>
                        <label><input type="checkbox" checked> Estado de Cultivos</label>
                        <label><input type="checkbox"> Análisis Financiero</label>
                        <label><input type="checkbox"> Impacto Climático</label>
                        <label><input type="checkbox"> Detección de Plagas</label>
                        <label><input type="checkbox"> Sostenibilidad</label>
                    </div>
                </div>
                <div style="margin-top: 20px; text-align: center;">
                    <button type="button" class="btn btn-primary" onclick="crearInformePersonalizado()">
                        <i class="fas fa-plus"></i>
                        Crear Informe
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Notificación -->
    <div id="notification" class="notification"></div>

    <script src="assets/js/informes.js"></script>
</body>
</html>