// assets/js/prediccion.js

class PrediccionManager {
    constructor() {
        this.cultivos = {};
        this.currentCultivo = 'Papa';
        this.chartData = {};
        this.predictions = {};
        this.init();
    }

    init() {
        this.loadCultivosData();
        this.setupEventListeners();
        this.updatePrediccion();
        this.animateOnLoad();
        this.setupTooltips();
    }

    // Datos de cultivos con información detallada
    loadCultivosData() {
        this.cultivos = {
            'Papa': {
                nombre: 'Papa',
                icon: '🥔',
                descripcion: 'La papa es uno de los cultivos más importantes en la región andina. Rico en carbohidratos y vitaminas, es base de la alimentación local.',
                ciclo: 90,
                rendimiento: 12.5,
                precio: 2.4,
                temporada: 'Todo el año',
                condiciones: {
                    temperatura: '15-20°C',
                    humedad: '60-70%',
                    suelo: 'Franco-arcilloso',
                    ph: '5.5-6.5'
                },
                datos: {
                    años: [2019, 2020, 2021, 2022, 2023, 2024],
                    sembradas: [45, 48, 52, 55, 58, 62],
                    cosechadas: [42, 45, 49, 52, 55, 59],
                    prediccion: [65, 68, 72, 75, 78, 82]
                },
                estadisticas: {
                    precision: 87,
                    rendimiento: 12.5,
                    mejora: 15,
                    dias: 90,
                    ingreso: 2400,
                    riesgo: 'Bajo'
                }
            },
            'Oca': {
                nombre: 'Oca',
                icon: '🟤',
                descripcion: 'Tubérculo andino de gran valor nutricional, resistente a bajas temperaturas y con alto potencial comercial.',
                ciclo: 120,
                rendimiento: 8.5,
                precio: 3.2,
                temporada: 'Abril-Julio',
                condiciones: {
                    temperatura: '12-18°C',
                    humedad: '50-60%',
                    suelo: 'Franco-arenoso',
                    ph: '5.8-6.8'
                },
                datos: {
                    años: [2019, 2020, 2021, 2022, 2023, 2024],
                    sembradas: [20, 22, 25, 28, 30, 33],
                    cosechadas: [18, 20, 23, 26, 28, 31],
                    prediccion: [35, 38, 42, 45, 48, 52]
                },
                estadisticas: {
                    precision: 82,
                    rendimiento: 8.5,
                    mejora: 12,
                    dias: 120,
                    ingreso: 2720,
                    riesgo: 'Medio'
                }
            },
            'Avena': {
                nombre: 'Avena',
                icon: '🌾',
                descripcion: 'Cereal nutritivo y versátil, ideal para alimentación humana y animal. Adaptado a climas fríos.',
                ciclo: 150,
                rendimiento: 3.2,
                precio: 1.8,
                temporada: 'Mayo-Octubre',
                condiciones: {
                    temperatura: '10-25°C',
                    humedad: '40-60%',
                    suelo: 'Franco',
                    ph: '6.0-7.0'
                },
                datos: {
                    años: [2019, 2020, 2021, 2022, 2023, 2024],
                    sembradas: [80, 85, 90, 95, 100, 105],
                    cosechadas: [75, 80, 85, 90, 95, 100],
                    prediccion: [110, 115, 120, 125, 130, 135]
                },
                estadisticas: {
                    precision: 91,
                    rendimiento: 3.2,
                    mejora: 8,
                    dias: 150,
                    ingreso: 1800,
                    riesgo: 'Bajo'
                }
            },
            'Alfalfa': {
                nombre: 'Alfalfa',
                icon: '🌿',
                descripcion: 'Forraje perenne de alta calidad proteica, fundamental para la ganadería y mejoramiento del suelo.',
                ciclo: 365,
                rendimiento: 45.0,
                precio: 0.8,
                temporada: 'Todo el año',
                condiciones: {
                    temperatura: '15-30°C',
                    humedad: '50-70%',
                    suelo: 'Franco-limoso',
                    ph: '6.5-7.5'
                },
                datos: {
                    años: [2019, 2020, 2021, 2022, 2023, 2024],
                    sembradas: [150, 160, 170, 180, 190, 200],
                    cosechadas: [145, 155, 165, 175, 185, 195],
                    prediccion: [205, 215, 225, 235, 245, 255]
                },
                estadisticas: {
                    precision: 94,
                    rendimiento: 45.0,
                    mejora: 20,
                    dias: 365,
                    ingreso: 3600,
                    riesgo: 'Bajo'
                }
            }
        };
    }

    setupEventListeners() {
        // Pestañas de cultivos
        document.querySelectorAll('.cultivo-tab').forEach(tab => {
            tab.addEventListener('click', (e) => {
                this.changeCultivo(e.target.textContent);
            });
        });

        // Botón de actualizar
        const btnUpdate = document.querySelector('.btn-update');
        if (btnUpdate) {
            btnUpdate.addEventListener('click', () => {
                this.updatePrediccion();
            });
        }

        // Botón de exportar
        const btnExport = document.querySelector('.btn-export');
        if (btnExport) {
            btnExport.addEventListener('click', () => {
                this.exportData();
            });
        }

        // Inputs de fecha
        const dateInputs = document.querySelectorAll('.date-input');
        dateInputs.forEach(input => {
            input.addEventListener('change', () => {
                this.updateDateRange();
            });
        });

        // Tarjetas de acción
        document.querySelectorAll('.action-card').forEach(card => {
            card.addEventListener('click', (e) => {
                this.handleActionClick(e.currentTarget);
            });
        });

        // Puntos del gráfico
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('chart-point')) {
                this.showPointDetails(e.target);
            }
        });
    }

    changeCultivo(nombreCultivo) {
        this.currentCultivo = nombreCultivo;
        
        // Actualizar pestañas
        document.querySelectorAll('.cultivo-tab').forEach(tab => {
            tab.classList.remove('active');
            if (tab.textContent === nombreCultivo) {
                tab.classList.add('active');
            }
        });

        // Actualizar contenido
        this.updateCultivoInfo();
        this.updateChart();
        this.updateStats();
        this.updateActions();
        
        // Animación
        this.animateContentChange();
    }

    updateCultivoInfo() {
        const cultivo = this.cultivos[this.currentCultivo];
        if (!cultivo) return;

        // Actualizar información básica
        const cultivoImage = document.querySelector('.cultivo-image');
        const cultivoName = document.querySelector('.cultivo-name');
        const cultivoDescription = document.querySelector('.cultivo-description');

        if (cultivoImage) cultivoImage.textContent = cultivo.icon;
        if (cultivoName) cultivoName.textContent = cultivo.nombre;
        if (cultivoDescription) cultivoDescription.textContent = cultivo.descripcion;

        // Actualizar métricas
        this.updateCultivoMetrics(cultivo);
    }

    updateCultivoMetrics(cultivo) {
        const metricsContainer = document.querySelector('.cultivo-metrics');
        if (!metricsContainer) return;

        metricsContainer.innerHTML = `
            <div class="metric-item">
                <div class="metric-value">${cultivo.ciclo}</div>
                <div class="metric-label">Días</div>
            </div>
            <div class="metric-item">
                <div class="metric-value">${cultivo.rendimiento}</div>
                <div class="metric-label">Ton/Ha</div>
            </div>
            <div class="metric-item">
                <div class="metric-value">$${cultivo.precio}</div>
                <div class="metric-label">Precio/Kg</div>
            </div>
            <div class="metric-item">
                <div class="metric-value">${cultivo.estadisticas.riesgo}</div>
                <div class="metric-label">Riesgo</div>
            </div>
        `;
    }

    updateChart() {
        const cultivo = this.cultivos[this.currentCultivo];
        if (!cultivo) return;

        // Actualizar título
        const title = document.querySelector('.grafico-title');
        if (title) {
            title.innerHTML = `<i class="fas fa-chart-line"></i> Predicción de Rendimiento - ${cultivo.nombre}`;
        }

        // Generar nuevo SVG
        this.generateChart(cultivo.datos);
    }

    generateChart(datos) {
        const svg = document.querySelector('.chart-svg');
        if (!svg) return;

        const width = 400;
        const height = 250;
        const margin = { top: 20, right: 40, bottom: 40, left: 60 };

        // Limpiar SVG
        svg.innerHTML = '';

        // Crear escalas
        const xScale = (index) => margin.left + (index * (width - margin.left - margin.right)) / (datos.años.length - 1);
        const yScale = (value) => height - margin.bottom - (value * (height - margin.top - margin.bottom)) / Math.max(...datos.prediccion);

        // Grilla
        const grid = this.createGrid(svg, width, height, margin);
        
        // Área de predicción
        const area = this.createArea(svg, datos, xScale, yScale);
        
        // Líneas
        const lines = this.createLines(svg, datos, xScale, yScale);
        
        // Puntos
        const points = this.createPoints(svg, datos, xScale, yScale);
        
        // Etiquetas
        const labels = this.createLabels(svg, datos, width, height, margin, xScale, yScale);
    }

    createGrid(svg, width, height, margin) {
        const defs = document.createElementNS('http://www.w3.org/2000/svg', 'defs');
        const pattern = document.createElementNS('http://www.w3.org/2000/svg', 'pattern');
        pattern.setAttribute('id', 'grid');
        pattern.setAttribute('width', '40');
        pattern.setAttribute('height', '25');
        pattern.setAttribute('patternUnits', 'userSpaceOnUse');
        
        const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
        path.setAttribute('d', 'M 40 0 L 0 0 0 25');
        path.setAttribute('fill', 'none');
        path.setAttribute('stroke', '#e0e0e0');
        path.setAttribute('stroke-width', '0.5');
        
        pattern.appendChild(path);
        defs.appendChild(pattern);
        svg.appendChild(defs);
        
        const rect = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
        rect.setAttribute('width', '100%');
        rect.setAttribute('height', '100%');
        rect.setAttribute('fill', 'url(#grid)');
        svg.appendChild(rect);
    }

    createArea(svg, datos, xScale, yScale) {
        const area = document.createElementNS('http://www.w3.org/2000/svg', 'path');
        let d = `M ${xScale(0)} ${yScale(0)}`;
        
        datos.prediccion.forEach((value, index) => {
            d += ` L ${xScale(index)} ${yScale(value)}`;
        });
        
        d += ` L ${xScale(datos.prediccion.length - 1)} ${yScale(0)} Z`;
        
        area.setAttribute('d', d);
        area.setAttribute('class', 'chart-area');
        svg.appendChild(area);
    }

    createLines(svg, datos, xScale, yScale) {
        // Línea sembradas
        const lineSembradas = document.createElementNS('http://www.w3.org/2000/svg', 'path');
        let dSembradas = `M ${xScale(0)} ${yScale(datos.sembradas[0])}`;
        datos.sembradas.forEach((value, index) => {
            if (index > 0) {
                dSembradas += ` L ${xScale(index)} ${yScale(value)}`;
            }
        });
        lineSembradas.setAttribute('d', dSembradas);
        lineSembradas.setAttribute('class', 'chart-line sembradas');
        svg.appendChild(lineSembradas);

        // Línea cosechadas
        const lineCosechadas = document.createElementNS('http://www.w3.org/2000/svg', 'path');
        let dCosechadas = `M ${xScale(0)} ${yScale(datos.cosechadas[0])}`;
        datos.cosechadas.forEach((value, index) => {
            if (index > 0) {
                dCosechadas += ` L ${xScale(index)} ${yScale(value)}`;
            }
        });
        lineCosechadas.setAttribute('d', dCosechadas);
        lineCosechadas.setAttribute('class', 'chart-line cosechadas');
        svg.appendChild(lineCosechadas);

        // Línea predicción
        const linePrediccion = document.createElementNS('http://www.w3.org/2000/svg', 'path');
        let dPrediccion = `M ${xScale(0)} ${yScale(datos.prediccion[0])}`;
        datos.prediccion.forEach((value, index) => {
            if (index > 0) {
                dPrediccion += ` L ${xScale(index)} ${yScale(value)}`;
            }
        });
        linePrediccion.setAttribute('d', dPrediccion);
        linePrediccion.setAttribute('class', 'chart-line prediccion');
        svg.appendChild(linePrediccion);
    }

    createPoints(svg, datos, xScale, yScale) {
        datos.prediccion.forEach((value, index) => {
            const point = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
            point.setAttribute('cx', xScale(index));
            point.setAttribute('cy', yScale(value));
            point.setAttribute('r', '4');
            point.setAttribute('class', 'chart-point');
            point.setAttribute('data-year', datos.años[index]);
            point.setAttribute('data-value', value);
            point.setAttribute('data-tooltip', `${datos.años[index]}: ${value} hectáreas`);
            svg.appendChild(point);
        });
    }

    createLabels(svg, datos, width, height, margin, xScale, yScale) {
        // Etiquetas de años
        datos.años.forEach((año, index) => {
            const text = document.createElementNS('http://www.w3.org/2000/svg', 'text');
            text.setAttribute('x', xScale(index));
            text.setAttribute('y', height - 10);
            text.setAttribute('text-anchor', 'middle');
            text.setAttribute('font-size', '10');
            text.setAttribute('fill', '#666');
            text.textContent = año;
            svg.appendChild(text);
        });

        // Etiquetas de valores
        const maxValue = Math.max(...datos.prediccion);
        for (let i = 0; i <= 4; i++) {
            const value = (maxValue * i) / 4;
            const text = document.createElementNS('http://www.w3.org/2000/svg', 'text');
            text.setAttribute('x', margin.left - 10);
            text.setAttribute('y', yScale(value) + 5);
            text.setAttribute('text-anchor', 'end');
            text.setAttribute('font-size', '10');
            text.setAttribute('fill', '#666');
            text.textContent = Math.round(value);
            svg.appendChild(text);
        }
    }

    updateStats() {
        const cultivo = this.cultivos[this.currentCultivo];
        if (!cultivo) return;

        const stats = cultivo.estadisticas;
        
        document.querySelector('.stat-item:nth-child(1) .stat-value').textContent = `${stats.precision}%`;
        document.querySelector('.stat-item:nth-child(2) .stat-value').textContent = stats.rendimiento;
        document.querySelector('.stat-item:nth-child(3) .stat-value').textContent = `+${stats.mejora}%`;
        document.querySelector('.stat-item:nth-child(4) .stat-value').textContent = stats.dias;
        document.querySelector('.stat-item:nth-child(5) .stat-value').textContent = `$${stats.ingreso}`;

        // Añadir tendencias
        this.addTrendIndicators(stats);
    }

    addTrendIndicators(stats) {
        const statItems = document.querySelectorAll('.stat-item');
        statItems.forEach((item, index) => {
            const existingTrend = item.querySelector('.stat-trend');
            if (existingTrend) existingTrend.remove();

            const trend = document.createElement('div');
            trend.className = 'stat-trend';
            
            switch (index) {
                case 0: // Precisión
                    trend.textContent = '+2.5% este mes';
                    trend.classList.add('positive');
                    break;
                case 1: // Rendimiento
                    trend.textContent = '+0.8 ton/ha';
                    trend.classList.add('positive');
                    break;
                case 2: // Mejora
                    trend.textContent = '+3% proyectado';
                    trend.classList.add('positive');
                    break;
                case 3: // Días
                    trend.textContent = 'Ciclo óptimo';
                    trend.classList.add('positive');
                    break;
                case 4: // Ingreso
                    trend.textContent = '+$200/ha';
                    trend.classList.add('positive');
                    break;
            }
            
            item.appendChild(trend);
        });
    }

    updateActions() {
        const cultivo = this.cultivos[this.currentCultivo];
        if (!cultivo) return;

        const actions = this.getActionsForCultivo(cultivo);
        const actionsGrid = document.querySelector('.actions-grid');
        
        if (actionsGrid) {
            actionsGrid.innerHTML = '';
            actions.forEach(action => {
                const actionCard = this.createActionCard(action);
                actionsGrid.appendChild(actionCard);
            });
        }
    }

    getActionsForCultivo(cultivo) {
        const baseActions = [
            {
                icon: '🌱',
                name: 'Optimizar Siembra',
                description: `Ajustar fechas según ciclo de ${cultivo.ciclo} días`,
                status: 'recomendado'
            },
            {
                icon: '💧',
                name: 'Planificar Riego',
                description: `Programar según humedad ${cultivo.condiciones.humedad}`,
                status: 'recomendado'
            },
            {
                icon: '🌿',
                name: 'Aplicar Fertilizantes',
                description: `Optimizar para pH ${cultivo.condiciones.ph}`,
                status: 'programado'
            },
            {
                icon: '📊',
                name: 'Monitorear Progreso',
                description: `Seguimiento cada 15 días durante ${cultivo.ciclo} días`,
                status: 'recomendado'
            }
        ];

        // Añadir acciones específicas según el cultivo
        if (cultivo.nombre === 'Papa') {
            baseActions.push({
                icon: '🛡️',
                name: 'Control Fitosanitario',
                description: 'Prevenir tizón tardío y gusano blanco',
                status: 'urgente'
            });
        } else if (cultivo.nombre === 'Alfalfa') {
            baseActions.push({
                icon: '✂️',
                name: 'Programar Cortes',
                description: 'Planificar cortes cada 30-35 días',
                status: 'programado'
            });
        }

        return baseActions;
    }

    createActionCard(action) {
        const card = document.createElement('div');
        card.className = 'action-card';
        card.dataset.action = action.name;
        
        card.innerHTML = `
            <div class="action-icon">${action.icon}</div>
            <h4 class="action-name">${action.name}</h4>
            <p class="action-description">${action.description}</p>
            <div class="action-status status-${action.status}">${action.status}</div>
        `;
        
        return card;
    }

    updatePrediccion() {
        // Mostrar estado de carga
        this.showLoading();
        
        // Simular llamada a API
        setTimeout(() => {
            this.updateCultivoInfo();
            this.updateChart();
            this.updateStats();
            this.updateActions();
            this.hideLoading();
            this.showNotification('Predicción actualizada exitosamente', 'success');
        }, 1500);
    }

    exportData() {
        const cultivo = this.cultivos[this.currentCultivo];
        if (!cultivo) return;

        const data = {
            cultivo: cultivo.nombre,
            fecha: new Date().toISOString(),
            datos: cultivo.datos,
            estadisticas: cultivo.estadisticas,
            condiciones: cultivo.condiciones
        };

        const blob = new Blob([JSON.stringify(data, null, 2)], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `prediccion-${cultivo.nombre.toLowerCase()}-${new Date().toISOString().split('T')[0]}.json`;
        a.click();
        URL.revokeObjectURL(url);

        this.showNotification('Datos exportados exitosamente', 'success');
    }

    handleActionClick(card) {
        const actionName = card.dataset.action;
        const actionInfo = this.getActionInfo(actionName);
        
        this.showActionModal(actionInfo);
    }

    getActionInfo(actionName) {
        const cultivo = this.cultivos[this.currentCultivo];
        const actionDetails = {
            'Optimizar Siembra': {
                title: 'Optimización de Siembra',
                content: `
                    <h4>Recomendaciones para ${cultivo.nombre}</h4>
                    <ul>
                        <li>Temperatura óptima: ${cultivo.condiciones.temperatura}</li>
                        <li>Tipo de suelo: ${cultivo.condiciones.suelo}</li>
                        <li>pH recomendado: ${cultivo.condiciones.ph}</li>
                        <li>Ciclo de cultivo: ${cultivo.ciclo} días</li>
                    </ul>
                    <p>Siguiendo estas recomendaciones, puedes aumentar tu rendimiento hasta un ${cultivo.estadisticas.mejora}%.</p>
                `
            },
            'Planificar Riego': {
                title: 'Planificación de Riego',
                content: `
                    <h4>Sistema de Riego para ${cultivo.nombre}</h4>
                    <ul>
                        <li>Humedad requerida: ${cultivo.condiciones.humedad}</li>
                        <li>Frecuencia: Cada 3-4 días</li>
                        <li>Cantidad: 25-30 mm por aplicación</li>
                        <li>Horario: 6:00 AM - 8:00 AM</li>
                    </ul>
                `
            }
        };

        return actionDetails[actionName] || {
            title: actionName,
            content: `<p>Información detallada sobre ${actionName} para ${cultivo.nombre}</p>`
        };
    }

    showActionModal(actionInfo) {
        const modal = document.createElement('div');
        modal.className = 'action-modal';
        modal.innerHTML = `
            <div class="action-modal-content">
                <span class="close-modal">&times;</span>
                <h3>${actionInfo.title}</h3>
                <div class="modal-body">
                    ${actionInfo.content}
                </div>
                <div class="modal-actions">
                    <button class="btn-implement">Implementar</button>
                    <button class="btn-schedule">Programar</button>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        
        // Event listeners
        modal.querySelector('.close-modal').addEventListener('click', () => {
            document.body.removeChild(modal);
        });
        
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                document.body.removeChild(modal);
            }
        });
        
        // Animación
        setTimeout(() => modal.classList.add('show'), 10);
    }

    showPointDetails(point) {
        const year = point.getAttribute('data-year');
        const value = point.getAttribute('data-value');
        const tooltip = point.getAttribute('data-tooltip');
        
        this.showNotification(tooltip, 'info');
    }

    setupTooltips() {
        document.querySelectorAll('.tooltip').forEach(element => {
            element.addEventListener('mouseenter', (e) => {
                this.showTooltip(e.target, e.target.getAttribute('data-tooltip'));
            });
            
            element.addEventListener('mouseleave', (e) => {
                this.hideTooltip();
            });
        });
    }

    showTooltip(element, text) {
        const tooltip = document.createElement('div');
        tooltip.className = 'tooltip-content';
        tooltip.textContent = text;
        document.body.appendChild(tooltip);
        
        const rect = element.getBoundingClientRect();
        tooltip.style.left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + 'px';
        tooltip.style.top = rect.top - tooltip.offsetHeight - 10 + 'px';
    }

    hideTooltip() {
        const tooltip = document.querySelector('.tooltip-content');
        if (tooltip) {
            document.body.removeChild(tooltip);
        }
    }

    showLoading() {
        document.querySelectorAll('.grafico-section, .prediccion-stats').forEach(section => {
            section.classList.add('loading');
        });
    }

    hideLoading() {
        document.querySelectorAll('.loading').forEach(element => {
            element.classList.remove('loading');
        });
    }

    showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => notification.classList.add('show'), 100);
        
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                if (document.body.contains(notification)) {
                    document.body.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }

    animateOnLoad() {
        const elements = document.querySelectorAll('.prediccion-header, .toolbar, .cultivo-selector, .prediccion-container, .prediccion-stats, .actions-section');
        elements.forEach((element, index) => {
            element.style.animationDelay = `${index * 0.1}s`;
        });
    }

    animateContentChange() {
        const elements = document.querySelectorAll('.cultivo-info, .grafico-section');
        elements.forEach(element => {
            element.style.animation = 'none';
            setTimeout(() => {
                element.style.animation = 'fadeInUp 0.5s ease-out';
            }, 10);
        });
    }

    updateDateRange() {
        const startDate = document.querySelector('.date-input[type="date"]:first-child').value;
        const endDate = document.querySelector('.date-input[type="date"]:last-child').value;
        
        if (startDate && endDate) {
            this.showNotification('Rango de fechas actualizado', 'info');
            this.updatePrediccion();
        }
    }
}

// Estilos adicionales para modales y notificaciones
const additionalStyles = `
    .action-modal {
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
    
    .action-modal.show {
        opacity: 1;
    }
    
    .action-modal-content {
        background: white;
        padding: 30px;
        border-radius: 15px;
        max-width: 500px;
        width: 90%;
        position: relative;
        transform: translateY(-50px);
        transition: transform 0.3s ease;
    }
    
    .action-modal.show .action-modal-content {
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
    
    .modal-body {
        margin: 20px 0;
    }
    
    .modal-body h4 {
        color: #2c3e50;
        margin-bottom: 15px;
    }
    
    .modal-body ul {
        margin: 15px 0;
        padding-left: 20px;
    }
    
    .modal-body li {
        margin: 8px 0;
        color: #666;
    }
    
    .modal-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
        margin-top: 25px;
    }
    
    .btn-implement,
    .btn-schedule {
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .btn-implement {
        background: #4CAF50;
        color: white;
    }
    
    .btn-implement:hover {
        background: #45a049;
    }
    
    .btn-schedule {
        background: #2196F3;
        color: white;
    }
    
    .btn-schedule:hover {
        background: #1976D2;
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
    
    .tooltip-content {
        position: fixed;
        background: #333;
        color: white;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 0.8rem;
        z-index: 1000;
        white-space: nowrap;
    }
`;

// Agregar estilos al documento
const styleSheet = document.createElement('style');
styleSheet.textContent = additionalStyles;
document.head.appendChild(styleSheet);

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    new PrediccionManager();
});

// Exportar para uso en otros archivos
window.PrediccionManager = PrediccionManager;