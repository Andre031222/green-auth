// assets/js/informes.js

// Variables globales
let informesGenerados = 47;
let informesEsteMes = 12;

// Función para mostrar notificaciones
function mostrarNotificacion(mensaje, tipo = 'success') {
    const notification = document.getElementById('notification');
    if (!notification) return;
    
    notification.textContent = mensaje;
    notification.className = `notification ${tipo} show`;
    
    setTimeout(() => {
        notification.classList.remove('show');
    }, 3000);
}

// Función para generar informes
function generarInforme(tipo, button) {
    const originalText = button.innerHTML;
    const originalClass = button.className;
    
    // Cambiar estado del botón
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generando...';
    button.className = 'btn-generate generating';
    button.disabled = true;
    
    // Crear barra de progreso
    const progressBar = document.createElement('div');
    progressBar.className = 'progress-bar';
    progressBar.innerHTML = '<div class="progress-fill" style="width: 0%"></div>';
    button.parentNode.appendChild(progressBar);
    
    // Simular progreso
    let progress = 0;
    const interval = setInterval(() => {
        progress += Math.random() * 25 + 5; // Progreso más realista
        if (progress > 100) progress = 100;
        
        const progressFill = progressBar.querySelector('.progress-fill');
        if (progressFill) {
            progressFill.style.width = progress + '%';
        }
        
        if (progress >= 100) {
            clearInterval(interval);
            
            // Completar generación
            setTimeout(() => {
                button.innerHTML = '<i class="fas fa-check"></i> Completado';
                button.className = 'btn-generate completed';
                
                // Actualizar estadísticas
                informesGenerados++;
                informesEsteMes++;
                
                // Actualizar elementos en el DOM
                const totalElement = document.getElementById('total-informes');
                const mesElement = document.getElementById('informes-mes');
                
                if (totalElement) {
                    totalElement.textContent = informesGenerados;
                    totalElement.style.animation = 'pulse 0.5s ease';
                }
                
                if (mesElement) {
                    mesElement.textContent = informesEsteMes;
                    mesElement.style.animation = 'pulse 0.5s ease';
                }
                
                // Agregar al historial
                agregarAlHistorial(tipo);
                
                // Mostrar notificación
                mostrarNotificacion(`Informe ${getNombreTipo(tipo)} generado exitosamente`);
                
                // Registrar evento en analytics
                if (window.agrifarmAnalytics) {
                    window.agrifarmAnalytics.registrarEvento('generar_informe', {
                        tipo: tipo,
                        nombre: getNombreTipo(tipo)
                    });
                }
                
                // Restaurar botón después de 2 segundos
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.className = originalClass;
                    button.disabled = false;
                    if (progressBar && progressBar.parentNode) {
                        progressBar.remove();
                    }
                }, 2000);
            }, 500);
        }
    }, 150);
}

// Función para obtener nombre del tipo de informe
function getNombreTipo(tipo) {
    const nombres = {
        'dashboard': 'Dashboard Ejecutivo',
        'cultivos': 'Estado de Cultivos',
        'financiero': 'Análisis Financiero',
        'climatico': 'Impacto Climático',
        'plagas': 'Detección de Plagas',
        'sostenibilidad': 'Sostenibilidad'
    };
    return nombres[tipo] || tipo;
}

// Función para agregar al historial
function agregarAlHistorial(tipo) {
    const historialLista = document.getElementById('historial-lista');
    if (!historialLista) return;
    
    const tipoNames = {
        'dashboard': 'Dashboard Ejecutivo',
        'cultivos': 'Estado de Cultivos',
        'financiero': 'Análisis Financiero',
        'climatico': 'Impacto Climático',
        'plagas': 'Detección de Plagas',
        'sostenibilidad': 'Sostenibilidad'
    };
    
    const icons = {
        'dashboard': 'fas fa-chart-line',
        'cultivos': 'fas fa-seedling',
        'financiero': 'fas fa-dollar-sign',
        'climatico': 'fas fa-cloud-sun',
        'plagas': 'fas fa-bug',
        'sostenibilidad': 'fas fa-leaf'
    };
    
    const fecha = new Date().toLocaleDateString('es-ES', {
        year: 'numeric',
        month: 'long'
    });
    
    const nuevoItem = document.createElement('div');
    nuevoItem.className = 'history-item';
    nuevoItem.style.animation = 'slideIn 0.3s ease';
    nuevoItem.innerHTML = `
        <div class="history-icon">
            <i class="${icons[tipo]}"></i>
        </div>
        <div class="history-details">
            <div class="history-title">${tipoNames[tipo]} - ${fecha}</div>
            <div class="history-meta">Generado hace unos segundos • ${Math.floor(Math.random() * 500 + 500)} KB</div>
        </div>
        <div class="history-actions">
            <button class="btn-small btn-view" onclick="verInforme('${tipo}-${Date.now()}')">
                <i class="fas fa-eye"></i>
                Ver
            </button>
            <button class="btn-small btn-download" onclick="descargarInforme('${tipo}-${Date.now()}')">
                <i class="fas fa-download"></i>
                Descargar
            </button>
        </div>
    `;
    
    historialLista.insertBefore(nuevoItem, historialLista.firstChild);
    
    // Limitar el historial a 10 elementos
    const items = historialLista.querySelectorAll('.history-item');
    if (items.length > 10) {
        items[items.length - 1].remove();
    }
}

// Función para ver informe
function verInforme(id) {
    mostrarNotificacion('Abriendo informe...', 'info');
    
    // Simular apertura de informe
    setTimeout(() => {
        console.log(`Abriendo informe: ${id}`);
        // Aquí iría la lógica real para abrir el informe
        // Por ejemplo: window.open(`/informes/${id}.pdf`, '_blank');
    }, 500);
}

// Función para descargar informe
function descargarInforme(id) {
    mostrarNotificacion('Iniciando descarga...', 'info');
    
    // Simular descarga
    setTimeout(() => {
        console.log(`Descargando informe: ${id}`);
        // Aquí iría la lógica real para descargar el informe
        // Por ejemplo: 
        // const link = document.createElement('a');
        // link.href = `/downloads/${id}.pdf`;
        // link.download = `informe_${id}.pdf`;
        // link.click();
        
        mostrarNotificacion('Descarga completada', 'success');
    }, 1000);
}

// Función para abrir modal personalizado
function abrirModalPersonalizado() {
    const modal = document.getElementById('modal-personalizado');
    if (modal) {
        modal.style.display = 'block';
        // Limpiar formulario
        const nombreInput = document.getElementById('nombre-informe');
        if (nombreInput) {
            nombreInput.value = '';
        }
        
        // Resetear checkboxes
        const checkboxes = modal.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach((checkbox, index) => {
            checkbox.checked = index < 2; // Primeros 2 marcados por defecto
        });
    }
}

// Función para cerrar modal
function cerrarModal() {
    const modal = document.getElementById('modal-personalizado');
    if (modal) {
        modal.style.display = 'none';
    }
}

// Función para crear informe personalizado
function crearInformePersonalizado() {
    const nombreInput = document.getElementById('nombre-informe');
    const nombre = nombreInput ? nombreInput.value.trim() : '';
    
    if (!nombre) {
        mostrarNotificacion('Por favor ingrese un nombre para el informe', 'error');
        return;
    }
    
    // Obtener secciones seleccionadas
    const checkboxes = document.querySelectorAll('#modal-personalizado input[type="checkbox"]:checked');
    const secciones = Array.from(checkboxes).map(cb => cb.parentElement.textContent.trim());
    
    if (secciones.length === 0) {
        mostrarNotificacion('Por favor seleccione al menos una sección', 'error');
        return;
    }
    
    cerrarModal();
    mostrarNotificacion(`Creando informe personalizado: ${nombre}`, 'info');
    
    // Simular creación de informe personalizado
    setTimeout(() => {
        // Agregar al historial como personalizado
        agregarInformePersonalizadoAlHistorial(nombre, secciones);
        mostrarNotificacion(`Informe "${nombre}" creado exitosamente`, 'success');
    }, 2000);
}

// Función para agregar informe personalizado al historial
function agregarInformePersonalizadoAlHistorial(nombre, secciones) {
    const historialLista = document.getElementById('historial-lista');
    if (!historialLista) return;
    
    const fecha = new Date().toLocaleDateString('es-ES', {
        year: 'numeric',
        month: 'long'
    });
    
    const nuevoItem = document.createElement('div');
    nuevoItem.className = 'history-item';
    nuevoItem.style.animation = 'slideIn 0.3s ease';
    nuevoItem.innerHTML = `
        <div class="history-icon" style="background: linear-gradient(135deg, #8e44ad, #9b59b6);">
            <i class="fas fa-cog"></i>
        </div>
        <div class="history-details">
            <div class="history-title">${nombre} - ${fecha}</div>
            <div class="history-meta">Generado hace unos segundos • ${Math.floor(Math.random() * 800 + 600)} KB</div>
        </div>
        <div class="history-actions">
            <button class="btn-small btn-view" onclick="verInforme('personalizado-${Date.now()}')">
                <i class="fas fa-eye"></i>
                Ver
            </button>
            <button class="btn-small btn-download" onclick="descargarInforme('personalizado-${Date.now()}')">
                <i class="fas fa-download"></i>
                Descargar
            </button>
        </div>
    `;
    
    historialLista.insertBefore(nuevoItem, historialLista.firstChild);
    
    // Actualizar estadísticas
    informesGenerados++;
    informesEsteMes++;
    
    const totalElement = document.getElementById('total-informes');
    const mesElement = document.getElementById('informes-mes');
    
    if (totalElement) {
        totalElement.textContent = informesGenerados;
        totalElement.style.animation = 'pulse 0.5s ease';
    }
    if (mesElement) {
        mesElement.textContent = informesEsteMes;
        mesElement.style.animation = 'pulse 0.5s ease';
    }
}

// Función para abrir archivo
function abrirArchivo() {
    mostrarNotificacion('Abriendo archivo de informes...', 'info');
    
    // Simular apertura de archivo
    setTimeout(() => {
        console.log('Abriendo archivo de informes');
        // Aquí iría la lógica real para abrir el archivo
        // Por ejemplo: window.location.href = '/archivo-informes';
    }, 500);
}

// Función para filtrar informes en tiempo real
function filtrarInformes() {
    const busqueda = document.getElementById('busqueda-informes');
    if (!busqueda) return;
    
    busqueda.addEventListener('input', function(e) {
        const texto = e.target.value.toLowerCase();
        const items = document.querySelectorAll('.history-item');
        
        items.forEach(item => {
            const titulo = item.querySelector('.history-title');
            if (titulo) {
                const textoItem = titulo.textContent.toLowerCase();
                if (textoItem.includes(texto)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            }
        });
    });
}

// Función para actualizar filtros
function aplicarFiltros() {
    const periodo = document.getElementById('filtro-periodo');
    const cultivos = document.getElementById('filtro-cultivos');
    const ubicacion = document.getElementById('filtro-ubicacion');
    
    if (periodo) {
        periodo.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            mostrarNotificacion(`Filtro aplicado: ${selectedOption.text}`, 'info');
        });
    }
    
    if (cultivos) {
        cultivos.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            mostrarNotificacion(`Filtro aplicado: ${selectedOption.text}`, 'info');
        });
    }
    
    if (ubicacion) {
        ubicacion.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            mostrarNotificacion(`Filtro aplicado: ${selectedOption.text}`, 'info');
        });
    }
}

// Función para manejar el modal
function manejarModal() {
    // Cerrar modal al hacer clic fuera
    window.onclick = function(event) {
        const modal = document.getElementById('modal-personalizado');
        if (event.target === modal) {
            cerrarModal();
        }
    }
    
    // Cerrar modal con tecla ESC
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            cerrarModal();
        }
    });
}

// Función para agregar animaciones CSS dinámicas
function agregarAnimacionesCSS() {
    const style = document.createElement('style');
    style.textContent = `
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    `;
    
    // Solo agregar si no existe
    if (!document.head.querySelector('style[data-custom-animations]')) {
        style.setAttribute('data-custom-animations', 'true');
        document.head.appendChild(style);
    }
}

// Función para simular datos en tiempo real
function simularDatosEnTiempoReal() {
    const intervalId = setInterval(() => {
        // Ocasionalmente cambiar la precisión
        if (Math.random() > 0.98) {
            const precision = (97 + Math.random() * 2).toFixed(1);
            const elements = document.querySelectorAll('.stat-value');
            if (elements.length > 2) {
                elements[2].textContent = precision + '%';
                elements[2].style.animation = 'pulse 0.5s ease';
            }
        }
    }, 5000);
    
    // Guardar el interval ID para poder limpiarlo después
    window.intervaloDatosEnTiempoReal = intervalId;
}

// Función para validar formulario del modal
function validarFormularioModal() {
    const form = document.getElementById('form-personalizado');
    if (!form) return;
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        crearInformePersonalizado();
    });
}

// Función para manejar teclas de acceso rápido
function manejarTeclasRapidas() {
    document.addEventListener('keydown', function(event) {
        // Ctrl + N para nuevo informe personalizado
        if (event.ctrlKey && event.key === 'n') {
            event.preventDefault();
            abrirModalPersonalizado();
        }
        
        // Ctrl + F para enfocar búsqueda
        if (event.ctrlKey && event.key === 'f') {
            event.preventDefault();
            const busqueda = document.getElementById('busqueda-informes');
            if (busqueda) {
                busqueda.focus();
            }
        }
    });
}

// Función para mejorar la accesibilidad
function mejorarAccesibilidad() {
    // Agregar roles ARIA
    const reportCards = document.querySelectorAll('.report-card');
    reportCards.forEach(card => {
        card.setAttribute('role', 'button');
        card.setAttribute('tabindex', '0');
    });
    
    // Agregar descripción para lectores de pantalla
    const generateButtons = document.querySelectorAll('.btn-generate');
    generateButtons.forEach(button => {
        button.setAttribute('aria-label', 'Generar informe PDF');
    });
}

// Función para optimizar rendimiento
function optimizarRendimiento() {
    // Lazy loading para elementos no visibles
    const observerOptions = {
        root: null,
        rootMargin: '50px',
        threshold: 0.1
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);
    
    const reportCards = document.querySelectorAll('.report-card');
    reportCards.forEach(card => {
        observer.observe(card);
    });
    
    // Guardar el observer para poder limpiarlo después
    window.intersectionObserver = observer;
}

// Función para limpiar recursos
function limpiarRecursos() {
    // Limpiar intervalos si existen
    if (window.intervaloDatosEnTiempoReal) {
        clearInterval(window.intervaloDatosEnTiempoReal);
    }
    
    // Limpiar observers
    if (window.intersectionObserver) {
        window.intersectionObserver.disconnect();
    }
    
    // Limpiar event listeners
    window.removeEventListener('beforeunload', limpiarRecursos);
}

// Función para exportar datos de informes
function exportarDatosInformes() {
    const datos = {
        totalInformes: informesGenerados,
        informesEsteMes: informesEsteMes,
        fecha: new Date().toISOString(),
        historial: []
    };
    
    // Obtener datos del historial
    const historialItems = document.querySelectorAll('.history-item');
    historialItems.forEach(item => {
        const titulo = item.querySelector('.history-title');
        const meta = item.querySelector('.history-meta');
        
        if (titulo && meta) {
            datos.historial.push({
                titulo: titulo.textContent,
                meta: meta.textContent
            });
        }
    });
    
    // Crear y descargar archivo JSON
    const blob = new Blob([JSON.stringify(datos, null, 2)], { type: 'application/json' });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = `informes_data_${new Date().toISOString().split('T')[0]}.json`;
    link.click();
    
    URL.revokeObjectURL(url);
    mostrarNotificacion('Datos exportados exitosamente', 'success');
}

// Función para importar configuraciones
function importarConfiguraciones(file) {
    const reader = new FileReader();
    
    reader.onload = function(e) {
        try {
            const config = JSON.parse(e.target.result);
            
            // Aplicar configuraciones
            if (config.filtros) {
                aplicarConfiguracionFiltros(config.filtros);
            }
            
            if (config.preferencias) {
                aplicarPreferenciasUsuario(config.preferencias);
            }
            
            mostrarNotificacion('Configuraciones importadas exitosamente', 'success');
        } catch (error) {
            mostrarNotificacion('Error al importar configuraciones', 'error');
            console.error('Error al importar:', error);
        }
    };
    
    reader.readAsText(file);
}

// Función para aplicar configuración de filtros
function aplicarConfiguracionFiltros(filtros) {
    const periodo = document.getElementById('filtro-periodo');
    const cultivos = document.getElementById('filtro-cultivos');
    const ubicacion = document.getElementById('filtro-ubicacion');
    
    if (periodo && filtros.periodo) {
        periodo.value = filtros.periodo;
    }
    
    if (cultivos && filtros.cultivos) {
        cultivos.value = filtros.cultivos;
    }
    
    if (ubicacion && filtros.ubicacion) {
        ubicacion.value = filtros.ubicacion;
    }
}

// Función para aplicar preferencias del usuario
function aplicarPreferenciasUsuario(preferencias) {
    // Aplicar tema si está definido
    if (preferencias.tema) {
        document.body.className = preferencias.tema;
    }
    
    // Aplicar configuraciones de notificaciones
    if (preferencias.notificaciones !== undefined) {
        window.notificacionesHabilitadas = preferencias.notificaciones;
    }
}

// Función para manejar errores globales
function manejarErrores() {
    window.addEventListener('error', function(event) {
        console.error('Error global:', event.error);
        mostrarNotificacion('Ha ocurrido un error inesperado', 'error');
    });
    
    window.addEventListener('unhandledrejection', function(event) {
        console.error('Promise rechazada:', event.reason);
        mostrarNotificacion('Error en operación asíncrona', 'error');
    });
}

// Función para debugging (solo en desarrollo)
function habilitarDebugging() {
    if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
        window.debugInformes = {
            mostrarEstadisticas: function() {
                console.log('Estadísticas del Centro de Informes:');
                console.log('Total de informes:', informesGenerados);
                console.log('Informes este mes:', informesEsteMes);
                console.log('Elementos en historial:', document.querySelectorAll('.history-item').length);
            },
            simularError: function() {
                mostrarNotificacion('Error simulado para testing', 'error');
            },
            limpiarHistorial: function() {
                const historial = document.getElementById('historial-lista');
                if (historial) {
                    historial.innerHTML = '';
                    mostrarNotificacion('Historial limpiado', 'info');
                }
            }
        };
        
        console.log('Debugging habilitado. Usa window.debugInformes para funciones de debug.');
    }
}

// Función para manejar el estado de la aplicación
function manejarEstadoAplicacion() {
    // Guardar estado en localStorage
    function guardarEstado() {
        const estado = {
            informesGenerados: informesGenerados,
            informesEsteMes: informesEsteMes,
            ultimaActividad: new Date().toISOString()
        };
        
        try {
            localStorage.setItem('agrifarm_informes_estado', JSON.stringify(estado));
        } catch (error) {
            console.warn('No se pudo guardar el estado en localStorage:', error);
        }
    }
    
    // Cargar estado desde localStorage
    function cargarEstado() {
        try {
            const estadoGuardado = localStorage.getItem('agrifarm_informes_estado');
            if (estadoGuardado) {
                const estado = JSON.parse(estadoGuardado);
                informesGenerados = estado.informesGenerados || 47;
                informesEsteMes = estado.informesEsteMes || 12;
                
                // Actualizar UI
                const totalElement = document.getElementById('total-informes');
                const mesElement = document.getElementById('informes-mes');
                
                if (totalElement) totalElement.textContent = informesGenerados;
                if (mesElement) mesElement.textContent = informesEsteMes;
            }
        } catch (error) {
            console.warn('No se pudo cargar el estado desde localStorage:', error);
        }
    }
    
    // Cargar estado al iniciar
    cargarEstado();
    
    // Guardar estado periódicamente
    setInterval(guardarEstado, 30000); // Cada 30 segundos
    
    // Guardar estado antes de salir
    window.addEventListener('beforeunload', guardarEstado);
}

// Función para mejorar la experiencia del usuario
function mejorarExperienciaUsuario() {
    // Preloader para botones
    function agregarPreloader(button) {
        const preloader = document.createElement('div');
        preloader.className = 'btn-preloader';
        preloader.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        button.appendChild(preloader);
    }
    
    // Tooltips informativos
    function agregarTooltips() {
        const tooltipElements = [
            { selector: '.btn-generate', text: 'Generar informe en formato PDF' },
            { selector: '.btn-view', text: 'Ver informe en una nueva ventana' },
            { selector: '.btn-download', text: 'Descargar informe a tu dispositivo' },
            { selector: '.report-status', text: 'Estado actual del informe' }
        ];
        
        tooltipElements.forEach(item => {
            const elements = document.querySelectorAll(item.selector);
            elements.forEach(element => {
                element.setAttribute('title', item.text);
            });
        });
    }
    
    // Feedback visual mejorado
    function mejorarFeedbackVisual() {
        const buttons = document.querySelectorAll('button');
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
    }
    
    agregarTooltips();
    mejorarFeedbackVisual();
}

// Función para analytics básico
function configurarAnalytics() {
    const analytics = {
        eventos: [],
        
        registrarEvento: function(tipo, datos) {
            this.eventos.push({
                tipo: tipo,
                datos: datos,
                timestamp: new Date().toISOString()
            });
            
            // Mantener solo los últimos 100 eventos
            if (this.eventos.length > 100) {
                this.eventos.shift();
            }
        },
        
        obtenerEstadisticas: function() {
            const tiposEventos = {};
            this.eventos.forEach(evento => {
                tiposEventos[evento.tipo] = (tiposEventos[evento.tipo] || 0) + 1;
            });
            
            return {
                totalEventos: this.eventos.length,
                tiposEventos: tiposEventos,
                ultimoEvento: this.eventos[this.eventos.length - 1]
            };
        }
    };
    
    window.agrifarmAnalytics = analytics;
    
    // Registrar eventos automáticamente
    document.addEventListener('click', function(e) {
        if (e.target.matches('.btn-generate')) {
            const reportCard = e.target.closest('.report-card');
            const reportTitle = reportCard ? reportCard.querySelector('.report-title') : null;
            analytics.registrarEvento('generar_informe', {
                elemento: reportTitle ? reportTitle.textContent : 'Desconocido'
            });
        }
    });
}

// Función de inicialización
function inicializar() {
    // Configurar event listeners
    filtrarInformes();
    aplicarFiltros();
    manejarModal();
    validarFormularioModal();
    manejarTeclasRapidas();
    
    // Mejoras de UX
    agregarAnimacionesCSS();
    mejorarAccesibilidad();
    
    // Funcionalidades adicionales
    simularDatosEnTiempoReal();
    optimizarRendimiento();
    
    // Mensaje de bienvenida
    setTimeout(() => {
        mostrarNotificacion('Centro de Informes cargado correctamente', 'success');
    }, 500);
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    // Inicialización principal
    inicializar();
    
    // Funcionalidades adicionales
    manejarEstadoAplicacion();
    manejarErrores();
    mejorarExperienciaUsuario();
    configurarAnalytics();
    habilitarDebugging();
    
    console.log('Centro de Informes AgriFarm inicializado correctamente');
});

// Limpiar recursos cuando se cambie de página
window.addEventListener('beforeunload', function() {
    limpiarRecursos();
    console.log('Recursos del Centro de Informes limpiados');
});

// Exportar funciones para uso externo (si es necesario)
window.AgriFarmInformes = {
    generarInforme: generarInforme,
    exportarDatos: exportarDatosInformes,
    mostrarNotificacion: mostrarNotificacion,
    limpiarRecursos: limpiarRecursos
};