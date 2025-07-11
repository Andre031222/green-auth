// assets/js/formacion.js

class FormacionManager {
    constructor() {
        this.cursos = {};
        this.especialidades = {};
        this.currentFilter = 'todos';
        this.currentModal = null;
        this.userProgress = {};
        this.init();
    }

    init() {
        this.loadCursosData();
        this.setupEventListeners();
        this.animateOnScroll();
        this.initializeProgress();
        this.setupSearch();
        this.loadUserProgress();
    }

    // Cargar datos de cursos y especialidades
    loadCursosData() {
        this.cursos = {
            'agricultura-sostenible': {
                id: 'agricultura-sostenible',
                nombre: 'Fundamentos de Agricultura Sostenible',
                descripcion: 'Aprende los principios básicos de la agricultura sostenible y cómo implementarlos en tu finca.',
                duracion: '4 horas',
                tipo: 'Video',
                nivel: 'Básico',
                badge: 'nuevo',
                instructor: 'Dr. Carlos Mendoza',
                rating: 4.8,
                estudiantes: 234,
                precio: 'Gratis',
                modulos: [
                    'Introducción a la agricultura sostenible',
                    'Principios ecológicos aplicados',
                    'Manejo integrado de recursos',
                    'Certificaciones y estándares',
                    'Casos de éxito prácticos'
                ],
                recursos: [
                    'Videos HD de alta calidad',
                    'Material PDF descargable',
                    'Plantillas y herramientas',
                    'Certificado de finalización'
                ],
                enlaces: {
                    iniciar: 'https://curso.greenagrifarm.com/agricultura-sostenible',
                    preview: 'https://preview.greenagrifarm.com/agricultura-sostenible',
                    certificado: 'https://certificados.greenagrifarm.com'
                }
            },
            'manejo-plagas': {
                id: 'manejo-plagas',
                nombre: 'Manejo Integrado de Plagas',
                descripcion: 'Estrategias efectivas para controlar plagas sin dañar el medio ambiente.',
                duracion: '6 horas',
                tipo: 'Webinar',
                nivel: 'Intermedio',
                badge: 'popular',
                instructor: 'Dr. Luis Ramírez',
                rating: 4.9,
                estudiantes: 567,
                precio: '$49',
                modulos: [
                    'Identificación de plagas comunes',
                    'Métodos de control biológico',
                    'Uso responsable de pesticidas',
                    'Monitoreo y seguimiento',
                    'Programas de MIP'
                ],
                recursos: [
                    'Sesiones en vivo interactivas',
                    'Guías de identificación',
                    'Videos demostrativos',
                    'Soporte técnico continuo'
                ],
                enlaces: {
                    iniciar: 'https://curso.greenagrifarm.com/manejo-plagas',
                    preview: 'https://preview.greenagrifarm.com/manejo-plagas',
                    certificado: 'https://certificados.greenagrifarm.com'
                }
            },
            'agricultura-precision': {
                id: 'agricultura-precision',
                nombre: 'Agricultura de Precisión',
                descripcion: 'Tecnologías avanzadas para optimizar la producción agrícola usando datos y sensores.',
                duracion: '8 horas',
                tipo: 'Curso',
                nivel: 'Avanzado',
                badge: 'avanzado',
                instructor: 'Ing. Laura Paredes',
                rating: 4.7,
                estudiantes: 189,
                precio: '$99',
                modulos: [
                    'Introducción a la agricultura de precisión',
                    'Sensores y tecnologías IoT',
                    'Análisis de datos agrícolas',
                    'Mapeo y zonificación',
                    'Implementación práctica'
                ],
                recursos: [
                    'Simuladores interactivos',
                    'Software especializado',
                    'Casos de estudio reales',
                    'Mentorías personalizadas'
                ],
                enlaces: {
                    iniciar: 'https://curso.greenagrifarm.com/agricultura-precision',
                    preview: 'https://preview.greenagrifarm.com/agricultura-precision',
                    certificado: 'https://certificados.greenagrifarm.com'
                }
            },
            'preparacion-suelos': {
                id: 'preparacion-suelos',
                nombre: 'Preparación de Suelos',
                descripcion: 'Técnicas fundamentales para preparar el suelo antes de la siembra.',
                duracion: '3 horas',
                tipo: 'Video',
                nivel: 'Básico',
                badge: 'basico',
                instructor: 'Ing. Ana Torres',
                rating: 4.6,
                estudiantes: 345,
                precio: 'Gratis',
                modulos: [
                    'Análisis de suelos',
                    'Técnicas de laboreo',
                    'Enmiendas y mejoradores',
                    'Calendario de preparación'
                ],
                recursos: [
                    'Videos demostrativos',
                    'Guías paso a paso',
                    'Calculadoras de enmiendas',
                    'Lista de verificación'
                ],
                enlaces: {
                    iniciar: 'https://curso.greenagrifarm.com/preparacion-suelos',
                    preview: 'https://preview.greenagrifarm.com/preparacion-suelos',
                    certificado: 'https://certificados.greenagrifarm.com'
                }
            },
            'sistemas-riego': {
                id: 'sistemas-riego',
                nombre: 'Sistemas de Riego Eficientes',
                descripcion: 'Optimización del uso del agua en sistemas de riego modernos.',
                duracion: '5 horas',
                tipo: 'Webinar',
                nivel: 'Intermedio',
                badge: 'intermedio',
                instructor: 'Ing. María González',
                rating: 4.8,
                estudiantes: 423,
                precio: '$39',
                modulos: [
                    'Tipos de sistemas de riego',
                    'Cálculo de necesidades hídricas',
                    'Automatización y control',
                    'Mantenimiento preventivo'
                ],
                recursos: [
                    'Calculadoras de riego',
                    'Planos técnicos',
                    'Videos de instalación',
                    'Soporte técnico'
                ],
                enlaces: {
                    iniciar: 'https://curso.greenagrifarm.com/sistemas-riego',
                    preview: 'https://preview.greenagrifarm.com/sistemas-riego',
                    certificado: 'https://certificados.greenagrifarm.com'
                }
            },
            'cultivos-hidroponicos': {
                id: 'cultivos-hidroponicos',
                nombre: 'Cultivos Hidropónicos',
                descripcion: 'Introducción a los cultivos sin suelo y sus ventajas productivas.',
                duracion: '7 horas',
                tipo: 'Curso',
                nivel: 'Especializado',
                badge: 'especializado',
                instructor: 'Ing. José Silva',
                rating: 4.9,
                estudiantes: 156,
                precio: '$79',
                modulos: [
                    'Principios de hidroponía',
                    'Sistemas hidropónicos',
                    'Nutrición mineral',
                    'Manejo del ambiente',
                    'Costos y rentabilidad'
                ],
                recursos: [
                    'Simuladores 3D',
                    'Calculadoras nutricionales',
                    'Proveedores recomendados',
                    'Comunidad de práctica'
                ],
                enlaces: {
                    iniciar: 'https://curso.greenagrifarm.com/cultivos-hidroponicos',
                    preview: 'https://preview.greenagrifarm.com/cultivos-hidroponicos',
                    certificado: 'https://certificados.greenagrifarm.com'
                }
            }
        };

        this.especialidades = {
            'agricultura-organica': {
                nombre: 'Agricultura Orgánica',
                descripcion: 'Principios y prácticas de la agricultura ecológica',
                cursos: 12,
                icon: '🌱'
            },
            'manejo-invernaderos': {
                nombre: 'Manejo de Invernaderos',
                descripcion: 'Técnicas avanzadas para cultivos protegidos',
                cursos: 8,
                icon: '🏠'
            },
            'fertilizacion-foliar': {
                nombre: 'Fertilización Foliar',
                descripcion: 'Aplicación eficiente de nutrientes foliares',
                cursos: 6,
                icon: '🍃'
            },
            'control-biologico': {
                nombre: 'Control Biológico',
                descripcion: 'Enemigos naturales para control de plagas',
                cursos: 9,
                icon: '🐛'
            },
            'postcosecha': {
                nombre: 'Postcosecha',
                descripcion: 'Manejo y conservación después de la cosecha',
                cursos: 7,
                icon: '📦'
            },
            'certificaciones': {
                nombre: 'Certificaciones',
                descripcion: 'Estándares y certificaciones agrícolas',
                cursos: 5,
                icon: '🏆'
            }
        };
    }

    setupEventListeners() {
        // Tags de filtros
        document.querySelectorAll('.curso-tag').forEach(tag => {
            tag.addEventListener('click', (e) => {
                this.handleFilterClick(e);
            });
        });

        // Tarjetas de cursos
        document.querySelectorAll('.curso-card').forEach(card => {
            card.addEventListener('click', (e) => {
                if (!e.target.classList.contains('curso-btn')) {
                    this.handleCursoClick(e);
                }
            });
        });

        // Botones de cursos
        document.querySelectorAll('.curso-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                this.handleCursoButtonClick(e);
            });
        });

        // Tarjetas de especialidades
        document.querySelectorAll('.especialidad-card').forEach(card => {
            card.addEventListener('click', (e) => {
                this.handleEspecialidadClick(e);
            });
        });

        // Botones de recursos
        document.querySelectorAll('.recurso-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                this.handleRecursoClick(e);
            });
        });

        // Cerrar modales
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('modal-overlay')) {
                this.closeModal();
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.currentModal) {
                this.closeModal();
            }
        });
    }

    handleFilterClick(event) {
        const filter = event.target.textContent.toLowerCase();
        
        // Actualizar filtro activo
        document.querySelectorAll('.curso-tag').forEach(tag => {
            tag.classList.remove('active');
        });
        event.target.classList.add('active');
        
        this.currentFilter = filter;
        this.filterCursos(filter);
    }

    handleCursoClick(event) {
        const cursoCard = event.currentTarget;
        const cursoName = cursoCard.querySelector('.curso-name').textContent;
        const cursoKey = this.getCursoKey(cursoName);
        
        if (cursoKey) {
            this.showCursoModal(this.cursos[cursoKey]);
        }
    }

    handleCursoButtonClick(event) {
        event.stopPropagation();
        
        const cursoCard = event.target.closest('.curso-card');
        const cursoName = cursoCard.querySelector('.curso-name').textContent;
        const cursoKey = this.getCursoKey(cursoName);
        
        if (cursoKey) {
            const curso = this.cursos[cursoKey];
            
            if (event.target.textContent.includes('Iniciar') || event.target.textContent.includes('Continuar')) {
                this.iniciarCurso(curso);
            } else if (event.target.textContent.includes('Vista Previa')) {
                this.previewCurso(curso);
            }
        }
    }

    handleEspecialidadClick(event) {
        const especialidadName = event.currentTarget.querySelector('.especialidad-name').textContent;
        this.showEspecialidadInfo(especialidadName);
    }

    handleRecursoClick(event) {
        const recursoCard = event.target.closest('.recurso-card');
        const recursoTitle = recursoCard.querySelector('.recurso-title').textContent;
        
        if (recursoTitle.includes('Videos')) {
            this.showRecursosVideos();
        } else if (recursoTitle.includes('Guías')) {
            this.showRecursosGuias();
        } else if (recursoTitle.includes('Webinars')) {
            this.showRecursosWebinars();
        }
    }

    getCursoKey(cursoName) {
        const mapping = {
            'Fundamentos de Agricultura Sostenible': 'agricultura-sostenible',
            'Manejo Integrado de Plagas': 'manejo-plagas',
            'Agricultura de Precisión': 'agricultura-precision',
            'Preparación de Suelos': 'preparacion-suelos',
            'Sistemas de Riego Eficientes': 'sistemas-riego',
            'Cultivos Hidropónicos': 'cultivos-hidroponicos'
        };
        return mapping[cursoName];
    }

    filterCursos(filter) {
        const cursoCards = document.querySelectorAll('.curso-card');
        
        cursoCards.forEach(card => {
            const cursoName = card.querySelector('.curso-name').textContent.toLowerCase();
            const cursoDescription = card.querySelector('.curso-description').textContent.toLowerCase();
            const cursoBadge = card.querySelector('.curso-badge').textContent.toLowerCase();
            
            const matchesFilter = filter === 'todos' || 
                                cursoName.includes(filter) ||
                                cursoDescription.includes(filter) ||
                                cursoBadge.includes(filter);
            
            if (matchesFilter) {
                card.style.display = 'block';
                card.classList.add('animate-in');
            } else {
                card.style.display = 'none';
                card.classList.remove('animate-in');
            }
        });
    }

    showCursoModal(curso) {
        const modal = document.createElement('div');
        modal.className = 'modal-overlay';
        modal.innerHTML = `
            <div class="modal-content curso-modal">
                <span class="close-modal">&times;</span>
                <div class="curso-modal-header">
                    <h3>${curso.nombre}</h3>
                    <div class="curso-modal-meta">
                        <span class="curso-badge ${curso.badge}">${curso.nivel}</span>
                        <div class="curso-rating">
                            <span class="stars">★★★★★</span>
                            <span class="rating-text">${curso.rating} (${curso.estudiantes} estudiantes)</span>
                        </div>
                    </div>
                </div>
                
                <div class="modal-body">
                    <div class="curso-modal-info">
                        <div class="curso-instructor">
                            <div class="instructor-avatar">${curso.instructor.split(' ').map(n => n[0]).join('')}</div>
                            <div class="instructor-details">
                                <h4>Instructor</h4>
                                <p>${curso.instructor}</p>
                            </div>
                        </div>
                        
                        <div class="curso-detalles">
                            <div class="detalle-item">
                                <i class="fas fa-clock"></i>
                                <span>Duración: ${curso.duracion}</span>
                            </div>
                            <div class="detalle-item">
                                <i class="fas fa-play-circle"></i>
                                <span>Tipo: ${curso.tipo}</span>
                            </div>
                            <div class="detalle-item">
                                <i class="fas fa-users"></i>
                                <span>${curso.estudiantes} estudiantes</span>
                            </div>
                            <div class="detalle-item">
                                <i class="fas fa-tag"></i>
                                <span>Precio: ${curso.precio}</span>
                            </div>
                        </div>
                    </div>
                    
                    <p class="curso-descripcion-completa">${curso.descripcion}</p>
                    
                    <div class="curso-modulos">
                        <h4>Módulos del Curso</h4>
                        <ul>
                            ${curso.modulos.map(modulo => `<li>${modulo}</li>`).join('')}
                        </ul>
                    </div>
                    
                    <div class="curso-recursos">
                        <h4>Recursos Incluidos</h4>
                        <ul>
                            ${curso.recursos.map(recurso => `<li>${recurso}</li>`).join('')}
                        </ul>
                    </div>
                    
                    <div class="curso-modal-actions">
                        <button class="btn-primary" onclick="window.open('${curso.enlaces.iniciar}', '_blank')">
                            <i class="fas fa-play"></i> Iniciar Curso
                        </button>
                        <button class="btn-secondary" onclick="window.open('${curso.enlaces.preview}', '_blank')">
                            <i class="fas fa-eye"></i> Vista Previa
                        </button>
                        <button class="btn-outline" onclick="window.formacionManager.addToWishlist('${curso.id}')">
                            <i class="fas fa-heart"></i> Añadir a Favoritos
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        this.currentModal = modal;
        
        // Event listeners
        modal.querySelector('.close-modal').addEventListener('click', () => {
            this.closeModal();
        });
        
        // Animación
        setTimeout(() => modal.classList.add('show'), 10);
    }

    showEspecialidadInfo(especialidadName) {
        const especialidad = this.especialidades[especialidadName.toLowerCase().replace(/\s+/g, '-')];
        if (!especialidad) return;

        const modal = document.createElement('div');
        modal.className = 'modal-overlay';
        modal.innerHTML = `
            <div class="modal-content especialidad-modal">
                <span class="close-modal">&times;</span>
                <div class="especialidad-modal-header">
                    <div class="especialidad-icon-large">${especialidad.icon}</div>
                    <h3>${especialidad.nombre}</h3>
                </div>
                
                <div class="modal-body">
                    <p>${especialidad.descripcion}</p>
                    
                    <div class="especialidad-stats">
                        <div class="stat-item">
                            <div class="stat-number">${especialidad.cursos}</div>
                            <div class="stat-label">Cursos Disponibles</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">98%</div>
                            <div class="stat-label">Satisfacción</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">1,234</div>
                            <div class="stat-label">Estudiantes</div>
                        </div>
                    </div>
                    
                    <div class="especialidad-cursos">
                        <h4>Cursos Recomendados</h4>
                        <p>Explora nuestros cursos especializados en ${especialidad.nombre.toLowerCase()}</p>
                    </div>
                    
                    <div class="especialidad-actions">
                        <button class="btn-primary" onclick="window.formacionManager.filterByEspecialidad('${especialidadName}')">
                            <i class="fas fa-search"></i> Ver Cursos
                        </button>
                        <button class="btn-secondary" onclick="window.formacionManager.contactEspecialista('${especialidadName}')">
                            <i class="fas fa-user-tie"></i> Contactar Especialista
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        this.currentModal = modal;
        
        // Event listeners
        modal.querySelector('.close-modal').addEventListener('click', () => {
            this.closeModal();
        });
        
        // Animación
        setTimeout(() => modal.classList.add('show'), 10);
    }

    showRecursosVideos() {
        this.showRecursoModal('Videos Educativos', {
            descripcion: 'Accede a nuestra biblioteca de videos educativos de alta calidad',
            recursos: [
                'Más de 200 videos en HD',
                'Subtítulos en español',
                'Descargas offline',
                'Actualizaciones constantes'
            ],
            estadisticas: {
                videos: 200,
                horas: 150,
                temas: 25
            }
        });
    }

    showRecursosGuias() {
        this.showRecursoModal('Guías PDF', {
            descripcion: 'Documentos técnicos detallados para consulta offline',
            recursos: [
                'Guías paso a paso',
                'Ilustraciones técnicas',
                'Tablas y referencias',
                'Formatos imprimibles'
            ],
            estadisticas: {
                guias: 85,
                paginas: 2500,
                descargas: 15000
            }
        });
    }

    showRecursosWebinars() {
        this.showRecursoModal('Webinars en Vivo', {
            descripcion: 'Sesiones interactivas con expertos del sector agrícola',
            recursos: [
                'Sesiones en vivo semanales',
                'Interacción con expertos',
                'Grabaciones disponibles',
                'Certificados de participación'
            ],
            estadisticas: {
                webinars: 52,
                participantes: 5000,
                horas: 104
            }
        });
    }

    showRecursoModal(titulo, data) {
        const modal = document.createElement('div');
        modal.className = 'modal-overlay';
        modal.innerHTML = `
            <div class="modal-content recurso-modal">
                <span class="close-modal">&times;</span>
                <h3>${titulo}</h3>
                
                <div class="modal-body">
                    <p>${data.descripcion}</p>
                    
                    <div class="recurso-stats">
                        ${Object.entries(data.estadisticas).map(([key, value]) => `
                            <div class="stat-item">
                                <div class="stat-number">${value}</div>
                                <div class="stat-label">${key}</div>
                            </div>
                        `).join('')}
                    </div>
                    
                    <div class="recurso-features">
                        <h4>Características</h4>
                        <ul>
                            ${data.recursos.map(recurso => `<li>${recurso}</li>`).join('')}
                        </ul>
                    </div>
                    
                    <div class="recurso-actions">
                        <button class="btn-primary">
                            <i class="fas fa-play"></i> Acceder Ahora
                        </button>
                        <button class="btn-secondary">
                            <i class="fas fa-download"></i> Descargar Catálogo
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        this.currentModal = modal;
        
        // Event listeners
        modal.querySelector('.close-modal').addEventListener('click', () => {
            this.closeModal();
        });
        
        // Animación
        setTimeout(() => modal.classList.add('show'), 10);
    }

    iniciarCurso(curso) {
        // Actualizar progreso
        this.updateUserProgress(curso.id, 0);
        
        // Abrir curso
        window.open(curso.enlaces.iniciar, '_blank');
        
        // Mostrar notificación
        this.showNotification(`Curso "${curso.nombre}" iniciado exitosamente`, 'success');
        
        // Cerrar modal si está abierto
        if (this.currentModal) {
            this.closeModal();
        }
    }

    previewCurso(curso) {
        window.open(curso.enlaces.preview, '_blank');
        this.showNotification('Abriendo vista previa del curso', 'info');
    }

    addToWishlist(cursoId) {
        const wishlist = JSON.parse(localStorage.getItem('wishlist') || '[]');
        
        if (!wishlist.includes(cursoId)) {
            wishlist.push(cursoId);
            localStorage.setItem('wishlist', JSON.stringify(wishlist));
            this.showNotification('Curso añadido a favoritos', 'success');
        } else {
            this.showNotification('El curso ya está en favoritos', 'info');
        }
    }

    filterByEspecialidad(especialidadName) {
        // Cerrar modal
        this.closeModal();
        
        // Filtrar cursos relacionados
        const relatedFilter = especialidadName.toLowerCase();
        this.filterCursos(relatedFilter);
        
        // Scroll a la sección de cursos
        document.querySelector('.cursos-section').scrollIntoView({ behavior: 'smooth' });
    }

    contactEspecialista(especialidadName) {
        const whatsappMessage = `Hola, me interesa obtener más información sobre ${especialidadName}. ¿Podrían ayudarme?`;
        const whatsappUrl = `https://wa.me/51987654321?text=${encodeURIComponent(whatsappMessage)}`;
        
        window.open(whatsappUrl, '_blank');
        this.showNotification('Abriendo WhatsApp para contactar especialista', 'info');
        
        this.closeModal();
    }

    setupSearch() {
        const searchInput = document.querySelector('.filter-search input');
        if (searchInput) {
            let searchTimeout;
            
            searchInput.addEventListener('input', (e) => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    this.performSearch(e.target.value);
                }, 300);
            });
        }
    }

    performSearch(query) {
        if (!query.trim()) {
            this.resetSearch();
            return;
        }
        
        const cursoCards = document.querySelectorAll('.curso-card');
        
        cursoCards.forEach(card => {
            const name = card.querySelector('.curso-name').textContent.toLowerCase();
            const description = card.querySelector('.curso-description').textContent.toLowerCase();
            const instructor = card.querySelector('.instructor-name')?.textContent.toLowerCase() || '';
            
            const isMatch = name.includes(query.toLowerCase()) ||
                           description.includes(query.toLowerCase()) ||
                           instructor.includes(query.toLowerCase());
            
            if (isMatch) {
                card.style.display = 'block';
                card.classList.add('search-highlight');
            } else {
                card.style.display = 'none';
                card.classList.remove('search-highlight');
            }
        });
    }

    resetSearch() {
        const cursoCards = document.querySelectorAll('.curso-card');
        
        cursoCards.forEach(card => {
            card.style.display = 'block';
            card.classList.remove('search-highlight');
        });
    }

    initializeProgress() {
        // Animar barras de progreso
        const progressBars = document.querySelectorAll('.progreso-fill');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const progress = entry.target.dataset.progress || 65;
                    entry.target.style.width = progress + '%';
                    observer.unobserve(entry.target);
                }
            });
        });

        progressBars.forEach(bar => {
            observer.observe(bar);
        });

        // Animar contadores
        this.animateCounters();
    }

    animateCounters() {
        const counters = document.querySelectorAll('.progreso-number, .stat-number');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        });

        counters.forEach(counter => {
            observer.observe(counter);
        });
    }

    animateCounter(element) {
        const target = parseInt(element.textContent);
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 16);
    }

    loadUserProgress() {
        // Cargar progreso desde localStorage
        this.userProgress = JSON.parse(localStorage.getItem('userProgress') || '{}');
        
        // Actualizar UI con progreso
        Object.entries(this.userProgress).forEach(([cursoId, progress]) => {
            this.updateCursoUI(cursoId, progress);
        });
    }

    updateUserProgress(cursoId, progress) {
        this.userProgress[cursoId] = progress;
        localStorage.setItem('userProgress', JSON.stringify(this.userProgress));
        this.updateCursoUI(cursoId, progress);
    }

    updateCursoUI(cursoId, progress) {
        const cursoCard = document.querySelector(`[data-curso-id="${cursoId}"]`);
        if (cursoCard) {
            const progressBar = cursoCard.querySelector('.curso-progress-fill');
            const actionBtn = cursoCard.querySelector('.curso-btn.primary');
            
            if (progressBar) {
                progressBar.style.width = progress + '%';
            }
            
            if (actionBtn && progress > 0) {
                actionBtn.textContent = progress === 100 ? 'Completado' : 'Continuar';
                actionBtn.innerHTML = progress === 100 ? 
                    '<i class="fas fa-check"></i> Completado' : 
                    '<i class="fas fa-play"></i> Continuar';
            }
        }
    }

    animateOnScroll() {
        const elements = document.querySelectorAll('.recurso-card, .curso-card, .especialidad-card');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('animate-in');
                    }, index * 100);
                }
            });
        }, {
            threshold: 0.1
        });

        elements.forEach(element => {
            observer.observe(element);
        });
    }

    closeModal() {
        if (this.currentModal) {
            this.currentModal.classList.remove('show');
            setTimeout(() => {
                if (document.body.contains(this.currentModal)) {
                    document.body.removeChild(this.currentModal);
                }
                this.currentModal = null;
            }, 300);
        }
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
        }, 4000);
    }

    // Funciones adicionales para funcionalidades avanzadas
    generateCertificate(cursoId) {
        const curso = this.cursos[cursoId];
        if (!curso) return;
        
        const certificateData = {
            curso: curso.nombre,
            estudiante: 'Usuario',
            fecha: new Date().toLocaleDateString(),
            instructor: curso.instructor,
            duracion: curso.duracion
        };
        
        // Simular generación de certificado
        this.showNotification('Generando certificado...', 'info');
        
        setTimeout(() => {
            window.open(curso.enlaces.certificado, '_blank');
            this.showNotification('Certificado generado exitosamente', 'success');
        }, 2000);
    }

    exportProgress() {
        const progressData = {
            usuario: 'Usuario',
            fecha: new Date().toISOString(),
            cursos: this.userProgress,
            estadisticas: {
                cursosCompletados: Object.values(this.userProgress).filter(p => p === 100).length,
                cursosEnProgreso: Object.values(this.userProgress).filter(p => p > 0 && p < 100).length,
                horasEstudio: this.calculateStudyHours()
            }
        };
        
        const blob = new Blob([JSON.stringify(progressData, null, 2)], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `progreso-formacion-${new Date().toISOString().split('T')[0]}.json`;
        a.click();
        URL.revokeObjectURL(url);
        
        this.showNotification('Progreso exportado exitosamente', 'success');
    }

    calculateStudyHours() {
        let totalHours = 0;
        Object.entries(this.userProgress).forEach(([cursoId, progress]) => {
            const curso = this.cursos[cursoId];
            if (curso && progress > 0) {
                const hours = parseInt(curso.duracion) || 0;
                totalHours += (hours * progress) / 100;
            }
        });
        return Math.round(totalHours * 10) / 10;
    }

    // Funcionalidades de gamificación
    checkAchievements() {
        const achievements = [];
        const completedCourses = Object.values(this.userProgress).filter(p => p === 100).length;
        const studyHours = this.calculateStudyHours();
        
        // Logros por cursos completados
        if (completedCourses >= 1) achievements.push('Primer Curso Completado');
        if (completedCourses >= 5) achievements.push('Estudiante Dedicado');
        if (completedCourses >= 10) achievements.push('Experto en Formación');
        
        // Logros por horas de estudio
        if (studyHours >= 10) achievements.push('10 Horas de Estudio');
        if (studyHours >= 50) achievements.push('50 Horas de Estudio');
        if (studyHours >= 100) achievements.push('100 Horas de Estudio');
        
        return achievements;
    }

    showAchievements() {
        const achievements = this.checkAchievements();
        
        const modal = document.createElement('div');
        modal.className = 'modal-overlay';
        modal.innerHTML = `
            <div class="modal-content achievements-modal">
                <span class="close-modal">&times;</span>
                <h3>🏆 Tus Logros</h3>
                
                <div class="modal-body">
                    <div class="achievements-grid">
                        ${achievements.map(achievement => `
                            <div class="achievement-item">
                                <div class="achievement-icon">🏅</div>
                                <div class="achievement-name">${achievement}</div>
                            </div>
                        `).join('')}
                    </div>
                    
                    ${achievements.length === 0 ? '<p>¡Completa tu primer curso para obtener logros!</p>' : ''}
                    
                    <div class="achievements-stats">
                        <div class="stat-item">
                            <div class="stat-number">${Object.values(this.userProgress).filter(p => p === 100).length}</div>
                            <div class="stat-label">Cursos Completados</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">${this.calculateStudyHours()}</div>
                            <div class="stat-label">Horas de Estudio</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">${achievements.length}</div>
                            <div class="stat-label">Logros Obtenidos</div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        this.currentModal = modal;
        
        // Event listeners
        modal.querySelector('.close-modal').addEventListener('click', () => {
            this.closeModal();
        });
        
        // Animación
        setTimeout(() => modal.classList.add('show'), 10);
    }

    // Funcionalidad de recomendaciones
    getRecommendedCourses() {
        const completed = Object.keys(this.userProgress).filter(id => this.userProgress[id] === 100);
        const recommendations = [];
        
        // Lógica simple de recomendaciones
        if (completed.includes('agricultura-sostenible')) {
            recommendations.push('manejo-plagas', 'preparacion-suelos');
        }
        if (completed.includes('manejo-plagas')) {
            recommendations.push('control-biologico', 'agricultura-precision');
        }
        if (completed.includes('preparacion-suelos')) {
            recommendations.push('sistemas-riego', 'agricultura-organica');
        }
        
        return recommendations.filter(id => !completed.includes(id));
    }

    showRecommendations() {
        const recommendations = this.getRecommendedCourses();
        
        if (recommendations.length === 0) {
            this.showNotification('Complete algunos cursos para recibir recomendaciones', 'info');
            return;
        }
        
        const modal = document.createElement('div');
        modal.className = 'modal-overlay';
        modal.innerHTML = `
            <div class="modal-content recommendations-modal">
                <span class="close-modal">&times;</span>
                <h3>📚 Cursos Recomendados</h3>
                
                <div class="modal-body">
                    <p>Basado en tu progreso, te recomendamos estos cursos:</p>
                    
                    <div class="recommendations-grid">
                        ${recommendations.map(cursoId => {
                            const curso = this.cursos[cursoId];
                            if (!curso) return '';
                            
                            return `
                                <div class="recommendation-item">
                                    <h4>${curso.nombre}</h4>
                                    <p>${curso.descripcion}</p>
                                    <div class="recommendation-meta">
                                        <span>⭐ ${curso.rating}</span>
                                        <span>👥 ${curso.estudiantes} estudiantes</span>
                                        <span>⏱️ ${curso.duracion}</span>
                                    </div>
                                    <button class="btn-primary" onclick="window.formacionManager.iniciarCurso(window.formacionManager.cursos['${cursoId}'])">
                                        Iniciar Curso
                                    </button>
                                </div>
                            `;
                        }).join('')}
                    </div>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        this.currentModal = modal;
        
        // Event listeners
        modal.querySelector('.close-modal').addEventListener('click', () => {
            this.closeModal();
        });
        
        // Animación
        setTimeout(() => modal.classList.add('show'), 10);
    }
}

// Estilos adicionales para modales y funcionalidades
const additionalStyles = `
    .modal-overlay {
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
    
    .modal-overlay.show {
        opacity: 1;
    }
    
    .modal-content {
        background: white;
        padding: 30px;
        border-radius: 15px;
        max-width: 700px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
        transform: translateY(-50px);
        transition: transform 0.3s ease;
    }
    
    .modal-overlay.show .modal-content {
        transform: translateY(0);
    }
    
    .close-modal {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 1.5rem;
        cursor: pointer;
        color: #666;
        transition: color 0.3s ease;
    }
    
    .close-modal:hover {
        color: #333;
    }
    
    .curso-modal-header {
        margin-bottom: 20px;
    }
    
    .curso-modal-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }
    
    .curso-modal-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }
    
    .curso-instructor {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 10px;
    }
    
    .instructor-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #4CAF50;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
    
    .curso-detalles {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    .detalle-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #666;
    }
    
    .detalle-item i {
        color: #4CAF50;
        width: 20px;
    }
    
    .curso-modulos, .curso-recursos {
        margin: 20px 0;
    }
    
    .curso-modulos h4, .curso-recursos h4 {
        color: #2c3e50;
        margin-bottom: 10px;
        font-weight: 600;
    }
    
    .curso-modulos ul, .curso-recursos ul {
        list-style: none;
        padding: 0;
    }
    
    .curso-modulos li, .curso-recursos li {
        padding: 8px 0;
        border-bottom: 1px solid #eee;
        color: #666;
        position: relative;
        padding-left: 20px;
    }
    
    .curso-modulos li::before, .curso-recursos li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: #4CAF50;
        font-weight: bold;
    }
    
    .curso-modal-actions {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        flex-wrap: wrap;
    }
    
    .btn-primary,
    .btn-secondary,
    .btn-outline {
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-primary {
        background: #4CAF50;
        color: white;
    }
    
    .btn-primary:hover {
        background: #45a049;
        transform: translateY(-2px);
    }
    
    .btn-secondary {
        background: #2c3e50;
        color: white;
    }
    
    .btn-secondary:hover {
        background: #1a252f;
        transform: translateY(-2px);
    }
    
    .btn-outline {
        background: transparent;
        color: #4CAF50;
        border: 2px solid #4CAF50;
    }
    
    .btn-outline:hover {
        background: #4CAF50;
        color: white;
    }
    
    .especialidad-modal-header {
        text-align: center;
        margin-bottom: 20px;
    }
    
    .especialidad-icon-large {
        font-size: 4rem;
        margin-bottom: 15px;
    }
    
    .especialidad-stats {
        display: flex;
        justify-content: space-around;
        margin: 20px 0;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
    }
    
    .stat-item {
        text-align: center;
    }
    
    .stat-number {
        font-size: 2rem;
        font-weight: bold;
        color: #4CAF50;
        margin-bottom: 5px;
    }
    
    .stat-label {
        color: #666;
        font-size: 0.9rem;
    }
    
    .especialidad-actions {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 20px;
    }
    
    .recurso-stats {
        display: flex;
        justify-content: space-around;
        margin: 20px 0;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
    }
    
    .recurso-features {
        margin: 20px 0;
    }
    
    .recurso-features h4 {
        color: #2c3e50;
        margin-bottom: 10px;
    }
    
    .recurso-features ul {
        list-style: none;
        padding: 0;
    }
    
    .recurso-features li {
        padding: 8px 0;
        color: #666;
        position: relative;
        padding-left: 20px;
    }
    
    .recurso-features li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: #4CAF50;
        font-weight: bold;
    }
    
    .recurso-actions {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 20px;
    }
    
    .achievements-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin: 20px 0;
    }
    
    .achievement-item {
        text-align: center;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
        border: 2px solid #4CAF50;
    }
    
    .achievement-icon {
        font-size: 2rem;
        margin-bottom: 10px;
    }
    
    .achievement-name {
        font-weight: 600;
        color: #2c3e50;
    }
    
    .achievements-stats {
        display: flex;
        justify-content: space-around;
        margin-top: 30px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
    }
    
    .recommendations-grid {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin: 20px 0;
    }
    
    .recommendation-item {
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
        border-left: 4px solid #4CAF50;
    }
    
    .recommendation-item h4 {
        color: #2c3e50;
        margin-bottom: 10px;
    }
    
    .recommendation-item p {
        color: #666;
        margin-bottom: 15px;
    }
    
    .recommendation-meta {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
        font-size: 0.9rem;
        color: #666;
    }
    
    .search-highlight {
        animation: highlight 0.5s ease-out;
    }
    
    @keyframes highlight {
        0% { background-color: #fff3cd; }
        100% { background-color: transparent; }
    }
    
    @media (max-width: 768px) {
        .modal-content {
            padding: 20px;
            width: 95%;
        }
        
        .curso-modal-info {
            grid-template-columns: 1fr;
        }
        
        .curso-modal-actions,
        .especialidad-actions,
        .recurso-actions {
            flex-direction: column;
        }
        
        .especialidad-stats,
        .recurso-stats,
        .achievements-stats {
            flex-direction: column;
            gap: 15px;
        }
    }
`;

// Agregar estilos al documento
const styleSheet = document.createElement('style');
styleSheet.textContent = additionalStyles;
document.head.appendChild(styleSheet);

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    window.formacionManager = new FormacionManager();
});

// Exportar para uso en otros archivos
window.FormacionManager = FormacionManager;