// assets/js/asesoria.js

class AsesoriaManager {
    constructor() {
        this.servicios = {};
        this.especialistas = {};
        this.testimonios = [];
        this.currentModal = null;
        this.init();
    }

    init() {
        this.loadData();
        this.setupEventListeners();
        this.animateOnScroll();
        this.setupContactForms();
        this.startCounterAnimation();
    }

    // Cargar datos de servicios y especialistas
    loadData() {
        this.servicios = {
            'asesoria-integral': {
                id: 'asesoria-integral',
                titulo: 'Asesoría Agronómica Integral',
                descripcion: 'Servicio completo de asesoramiento técnico especializado',
                precio: 'Desde $500',
                duracion: '3-6 meses',
                incluye: [
                    'Diagnóstico completo del cultivo',
                    'Plan nutricional personalizado',
                    'Calendario de aplicaciones',
                    'Seguimiento mensual',
                    'Análisis de suelo y agua',
                    'Recomendaciones fitosanitarias',
                    'Informe final detallado'
                ],
                contacto: {
                    whatsapp: 'https://wa.me/51987654321?text=Hola, me interesa la Asesoría Agronómica Integral',
                    email: 'mailto:asesoria@greenagrifarm.com?subject=Consulta Asesoría Integral'
                }
            },
            'asesoria-especializada': {
                id: 'asesoria-especializada',
                titulo: 'Asesoría Agrícola Especializada',
                descripcion: 'Consultoría técnica para problemas específicos',
                precio: 'Desde $200',
                duracion: '1-3 meses',
                incluye: [
                    'Evaluación técnica especializada',
                    'Diagnóstico del problema',
                    'Soluciones personalizadas',
                    'Plan de implementación',
                    'Seguimiento semanal',
                    'Soporte técnico'
                ],
                contacto: {
                    whatsapp: 'https://wa.me/51987654321?text=Hola, me interesa la Asesoría Especializada',
                    email: 'mailto:asesoria@greenagrifarm.com?subject=Consulta Asesoría Especializada'
                }
            },
            'consultoria-express': {
                id: 'consultoria-express',
                titulo: 'Consultoría Express',
                descripcion: 'Consulta rápida para resolver dudas específicas',
                precio: '$50',
                duracion: '1 sesión',
                incluye: [
                    'Consulta virtual de 1 hora',
                    'Diagnóstico inicial',
                    'Recomendaciones básicas',
                    'Documento resumen',
                    'Seguimiento por email'
                ],
                contacto: {
                    whatsapp: 'https://wa.me/51987654321?text=Hola, me interesa la Consultoría Express',
                    email: 'mailto:asesoria@greenagrifarm.com?subject=Consulta Express'
                }
            }
        };

        this.especialistas = {
            'carlos-mendoza': {
                nombre: 'Dr. Carlos Mendoza',
                titulo: 'Ingeniero Agrónomo',
                especialidad: 'Nutrición Vegetal y Fertilidad',
                experiencia: '15 años de experiencia',
                descripcion: 'Especialista en nutrición vegetal con PhD en Ciencias del Suelo. Experto en programas de fertilización para cultivos intensivos.',
                logros: [
                    'PhD en Ciencias del Suelo - Universidad Nacional',
                    'Certificación en Nutrición Vegetal Avanzada',
                    '200+ proyectos exitosos',
                    'Publicaciones en revistas científicas'
                ],
                contacto: {
                    email: 'carlos.mendoza@greenagrifarm.com',
                    whatsapp: 'https://wa.me/51987654321?text=Hola Dr. Mendoza, me gustaría una consulta',
                    linkedin: 'https://linkedin.com/in/carlos-mendoza-agronomo'
                }
            },
            'maria-gonzalez': {
                nombre: 'Ing. María González',
                titulo: 'Ingeniera Agrícola',
                especialidad: 'Sistemas de Riego e Hidráulica',
                experiencia: '12 años de experiencia',
                descripcion: 'Experta en diseño e implementación de sistemas de riego eficientes. Especialista en tecnificación del riego.',
                logros: [
                    'Maestría en Ingeniería de Riego',
                    'Certificación en Riego Tecnificado',
                    '150+ sistemas implementados',
                    'Consultora internacional'
                ],
                contacto: {
                    email: 'maria.gonzalez@greenagrifarm.com',
                    whatsapp: 'https://wa.me/51987654322?text=Hola Ing. González, necesito ayuda con riego',
                    linkedin: 'https://linkedin.com/in/maria-gonzalez-riego'
                }
            },
            'luis-ramirez': {
                nombre: 'Dr. Luis Ramírez',
                titulo: 'Fitopatólogo',
                especialidad: 'Control de Plagas y Enfermedades',
                experiencia: '18 años de experiencia',
                descripcion: 'Especialista en manejo integrado de plagas con enfoque en control biológico y sostenible.',
                logros: [
                    'PhD en Fitopatología',
                    'Certificación en Control Biológico',
                    'Investigador en MIP',
                    'Autor de 50+ publicaciones'
                ],
                contacto: {
                    email: 'luis.ramirez@greenagrifarm.com',
                    whatsapp: 'https://wa.me/51987654323?text=Hola Dr. Ramírez, tengo problemas de plagas',
                    linkedin: 'https://linkedin.com/in/luis-ramirez-fitopatologo'
                }
            },
            'ana-torres': {
                nombre: 'Ing. Ana Torres',
                titulo: 'Especialista en Suelos',
                especialidad: 'Fertilidad y Química del Suelo',
                experiencia: '10 años de experiencia',
                descripcion: 'Experta en análisis de suelos y recomendaciones de fertilización. Especialista en recuperación de suelos degradados.',
                logros: [
                    'Maestría en Ciencias del Suelo',
                    'Certificación en Análisis de Suelos',
                    '300+ análisis realizados',
                    'Especialista en suelos salinos'
                ],
                contacto: {
                    email: 'ana.torres@greenagrifarm.com',
                    whatsapp: 'https://wa.me/51987654324?text=Hola Ing. Torres, necesito análisis de suelo',
                    linkedin: 'https://linkedin.com/in/ana-torres-suelos'
                }
            }
        };

        this.testimonios = [
            {
                nombre: 'Juan Carlos Pérez',
                cargo: 'Agricultor - Huancayo',
                avatar: 'JC',
                testimonio: 'Gracias a la asesoría del Dr. Mendoza, logré aumentar mi producción de papa en un 40%. Su plan nutricional fue clave para el éxito.',
                rating: 5,
                cultivo: 'Papa'
            },
            {
                nombre: 'María Elena Quispe',
                cargo: 'Productora Orgánica - Cusco',
                avatar: 'ME',
                testimonio: 'El sistema de riego que diseñó la Ing. González me permitió ahorrar 60% de agua y mejorar la calidad de mis cultivos orgánicos.',
                rating: 5,
                cultivo: 'Hortalizas'
            },
            {
                nombre: 'Roberto Silva',
                cargo: 'Cooperativa Agrícola - Arequipa',
                avatar: 'RS',
                testimonio: 'El Dr. Ramírez nos ayudó a controlar una plaga que amenazaba toda nuestra cosecha. Su enfoque biológico fue muy efectivo.',
                rating: 5,
                cultivo: 'Quinua'
            },
            {
                nombre: 'Carmen Huamán',
                cargo: 'Empresa Agroindustrial - Lima',
                avatar: 'CH',
                testimonio: 'La Ing. Torres rehabilitó nuestros suelos salinos. Ahora tenemos una producción estable y rentable.',
                rating: 5,
                cultivo: 'Espárragos'
            }
        ];
    }

    setupEventListeners() {
        // Botones de servicios
        document.querySelectorAll('.servicio-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                this.handleServiceClick(e);
            });
        });

        // Tarjetas de especialidades
        document.querySelectorAll('.especialidad-card').forEach(card => {
            card.addEventListener('click', (e) => {
                this.handleEspecialidadClick(e);
            });
        });

        // Tarjetas de especialistas
        document.querySelectorAll('.miembro-card').forEach(card => {
            card.addEventListener('click', (e) => {
                this.handleEspecialistaClick(e);
            });
        });

        // Botones de contacto
        document.querySelectorAll('.contact-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                this.handleContactClick(e);
            });
        });

        // Botón de consulta gratuita
        document.querySelectorAll('.contacto-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                this.handleConsultaGratuita(e);
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

    handleServiceClick(event) {
        const serviceCard = event.target.closest('.servicio-card');
        const serviceTitle = serviceCard.querySelector('.servicio-title').textContent;
        
        // Determinar el servicio
        let serviceKey = 'asesoria-integral';
        if (serviceTitle.includes('ESPECIALIZADA')) {
            serviceKey = 'asesoria-especializada';
        }
        
        const servicio = this.servicios[serviceKey];
        
        if (event.target.textContent.includes('Presupuesto') || event.target.textContent.includes('Solicitar')) {
            this.showServiceModal(servicio);
        } else if (event.target.textContent.includes('WhatsApp')) {
            window.open(servicio.contacto.whatsapp, '_blank');
        } else if (event.target.textContent.includes('Email')) {
            window.open(servicio.contacto.email, '_blank');
        }
    }

    handleEspecialidadClick(event) {
        const especialidadName = event.currentTarget.querySelector('.especialidad-name').textContent;
        this.showEspecialidadInfo(especialidadName);
    }

    handleEspecialistaClick(event) {
        const especialistaName = event.currentTarget.querySelector('.miembro-name').textContent;
        const especialistaKey = this.getEspecialistaKey(especialistaName);
        
        if (especialistaKey) {
            this.showEspecialistaModal(this.especialistas[especialistaKey]);
        }
    }

    handleContactClick(event) {
        const contactType = event.target.classList.contains('email') ? 'email' : 
                           event.target.classList.contains('phone') ? 'phone' : 'whatsapp';
        
        const especialistaCard = event.target.closest('.miembro-card');
        const especialistaName = especialistaCard.querySelector('.miembro-name').textContent;
        const especialistaKey = this.getEspecialistaKey(especialistaName);
        
        if (especialistaKey) {
            const especialista = this.especialistas[especialistaKey];
            
            switch (contactType) {
                case 'email':
                    window.open(especialista.contacto.email, '_blank');
                    break;
                case 'phone':
                    window.open(especialista.contacto.whatsapp, '_blank');
                    break;
                case 'whatsapp':
                    window.open(especialista.contacto.whatsapp, '_blank');
                    break;
            }
        }
    }

    handleConsultaGratuita(event) {
        this.showConsultaGratuitaModal();
    }

    getEspecialistaKey(name) {
        const mapping = {
            'Dr. Carlos Mendoza': 'carlos-mendoza',
            'Ing. María González': 'maria-gonzalez',
            'Dr. Luis Ramírez': 'luis-ramirez',
            'Ing. Ana Torres': 'ana-torres'
        };
        return mapping[name];
    }

    showServiceModal(servicio) {
        const modal = document.createElement('div');
        modal.className = 'modal-overlay';
        modal.innerHTML = `
            <div class="modal-content service-modal">
                <span class="close-modal">&times;</span>
                <h3>${servicio.titulo}</h3>
                <div class="modal-body">
                    <div class="service-details">
                        <div class="service-price">${servicio.precio}</div>
                        <div class="service-duration">Duración: ${servicio.duracion}</div>
                        <p>${servicio.descripcion}</p>
                        
                        <h4>¿Qué incluye?</h4>
                        <ul class="service-includes">
                            ${servicio.incluye.map(item => `<li>${item}</li>`).join('')}
                        </ul>
                        
                        <div class="service-actions">
                            <button class="btn-primary" onclick="window.open('${servicio.contacto.whatsapp}', '_blank')">
                                <i class="fab fa-whatsapp"></i> Contactar por WhatsApp
                            </button>
                            <button class="btn-secondary" onclick="window.open('${servicio.contacto.email}', '_blank')">
                                <i class="fas fa-envelope"></i> Enviar Email
                            </button>
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

    showEspecialistaModal(especialista) {
        const modal = document.createElement('div');
        modal.className = 'modal-overlay';
        modal.innerHTML = `
            <div class="modal-content especialista-modal">
                <span class="close-modal">&times;</span>
                <div class="especialista-header">
                    <div class="especialista-avatar-large">
                        ${especialista.nombre.split(' ').map(n => n[0]).join('')}
                    </div>
                    <div class="especialista-info">
                        <h3>${especialista.nombre}</h3>
                        <p class="especialista-titulo">${especialista.titulo}</p>
                        <p class="especialista-especialidad">${especialista.especialidad}</p>
                        <p class="especialista-experiencia">${especialista.experiencia}</p>
                    </div>
                </div>
                
                <div class="modal-body">
                    <p>${especialista.descripcion}</p>
                    
                    <h4>Logros y Certificaciones</h4>
                    <ul class="especialista-logros">
                        ${especialista.logros.map(logro => `<li>${logro}</li>`).join('')}
                    </ul>
                    
                    <div class="especialista-actions">
                        <button class="btn-primary" onclick="window.open('${especialista.contacto.whatsapp}', '_blank')">
                            <i class="fab fa-whatsapp"></i> Contactar por WhatsApp
                        </button>
                        <button class="btn-secondary" onclick="window.open('${especialista.contacto.email}', '_blank')">
                            <i class="fas fa-envelope"></i> Enviar Email
                        </button>
                        <button class="btn-outline" onclick="window.open('${especialista.contacto.linkedin}', '_blank')">
                            <i class="fab fa-linkedin"></i> Ver LinkedIn
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
        const especialidadData = {
            'Nutrición Vegetal': {
                descripcion: 'Optimización de la nutrición de cultivos mediante análisis científico y planes personalizados.',
                beneficios: [
                    'Aumento del rendimiento hasta 40%',
                    'Mejora de la calidad del producto',
                    'Reducción de costos en fertilizantes',
                    'Optimización del uso de nutrientes'
                ],
                proceso: [
                    'Análisis de suelo y agua',
                    'Diagnóstico nutricional',
                    'Diseño del plan de fertilización',
                    'Implementación y seguimiento'
                ]
            },
            'Manejo Hídrico': {
                descripcion: 'Diseño e implementación de sistemas de riego eficientes y sostenibles.',
                beneficios: [
                    'Ahorro de agua hasta 60%',
                    'Mejora en uniformidad de riego',
                    'Reducción de costos operativos',
                    'Aumento de la productividad'
                ],
                proceso: [
                    'Evaluación del recurso hídrico',
                    'Diseño del sistema de riego',
                    'Instalación y puesta en marcha',
                    'Capacitación y mantenimiento'
                ]
            }
        };

        const data = especialidadData[especialidadName];
        if (!data) return;

        this.showInfoModal(especialidadName, data);
    }

    showInfoModal(title, data) {
        const modal = document.createElement('div');
        modal.className = 'modal-overlay';
        modal.innerHTML = `
            <div class="modal-content info-modal">
                <span class="close-modal">&times;</span>
                <h3>${title}</h3>
                <div class="modal-body">
                    <p>${data.descripcion}</p>
                    
                    <div class="info-sections">
                        <div class="info-section">
                            <h4>Beneficios</h4>
                            <ul>
                                ${data.beneficios.map(beneficio => `<li>${beneficio}</li>`).join('')}
                            </ul>
                        </div>
                        
                        <div class="info-section">
                            <h4>Proceso</h4>
                            <ol>
                                ${data.proceso.map(paso => `<li>${paso}</li>`).join('')}
                            </ol>
                        </div>
                    </div>
                    
                    <div class="info-actions">
                        <button class="btn-primary" onclick="this.closest('.modal-overlay').remove(); window.asesoriaManager.showConsultaGratuitaModal();">
                            Solicitar Consulta Gratuita
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

    showConsultaGratuitaModal() {
        const modal = document.createElement('div');
        modal.className = 'modal-overlay';
        modal.innerHTML = `
            <div class="modal-content consulta-modal">
                <span class="close-modal">&times;</span>
                <h3>Consulta Gratuita</h3>
                <p>Agenda una consulta gratuita de 30 minutos con uno de nuestros expertos</p>
                
                <form class="consulta-form">
                    <div class="form-group">
                        <label>Nombre Completo</label>
                        <input type="text" required placeholder="Tu nombre completo">
                    </div>
                    
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" required placeholder="tu@email.com">
                    </div>
                    
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="tel" required placeholder="987654321">
                    </div>
                    
                    <div class="form-group">
                        <label>Tipo de Cultivo</label>
                        <select required>
                            <option value="">Selecciona tu cultivo</option>
                            <option value="papa">Papa</option>
                            <option value="maiz">Maíz</option>
                            <option value="quinua">Quinua</option>
                            <option value="hortalizas">Hortalizas</option>
                            <option value="frutales">Frutales</option>
                            <option value="otros">Otros</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Área de Cultivo (hectáreas)</label>
                        <input type="number" required placeholder="0">
                    </div>
                    
                    <div class="form-group">
                        <label>Consulta Principal</label>
                        <textarea required placeholder="Describe tu consulta o problema..."></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Especialista Preferido</label>
                        <select>
                            <option value="">Sin preferencia</option>
                            <option value="carlos-mendoza">Dr. Carlos Mendoza - Nutrición</option>
                            <option value="maria-gonzalez">Ing. María González - Riego</option>
                            <option value="luis-ramirez">Dr. Luis Ramírez - Plagas</option>
                            <option value="ana-torres">Ing. Ana Torres - Suelos</option>
                        </select>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn-cancel">Cancelar</button>
                        <button type="submit" class="btn-submit">Solicitar Consulta</button>
                    </div>
                </form>
            </div>
        `;
        
        document.body.appendChild(modal);
        this.currentModal = modal;
        
        // Event listeners
        modal.querySelector('.close-modal').addEventListener('click', () => {
            this.closeModal();
        });
        
        modal.querySelector('.btn-cancel').addEventListener('click', () => {
            this.closeModal();
        });
        
        modal.querySelector('.consulta-form').addEventListener('submit', (e) => {
            this.handleConsultaSubmit(e);
        });
        
        // Animación
        setTimeout(() => modal.classList.add('show'), 10);
    }

    handleConsultaSubmit(event) {
        event.preventDefault();
        
        const formData = new FormData(event.target);
        const data = Object.fromEntries(formData);
        
        // Simular envío
        this.showLoading();
        
        setTimeout(() => {
            this.hideLoading();
            this.closeModal();
            this.showNotification('¡Consulta programada exitosamente! Te contactaremos pronto.', 'success');
            
            // Simular confirmación por WhatsApp
            setTimeout(() => {
                const message = `Hola, he solicitado una consulta gratuita para ${data.cultivo} en ${data.area} hectáreas. Mi consulta es: ${data.consulta}`;
                const whatsappUrl = `https://wa.me/51987654321?text=${encodeURIComponent(message)}`;
                window.open(whatsappUrl, '_blank');
            }, 2000);
        }, 2000);
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

    setupContactForms() {
        // Configurar formularios de contacto adicionales
        document.querySelectorAll('.contact-form').forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleContactFormSubmit(e);
            });
        });
    }

    animateOnScroll() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.servicio-card, .especialidad-card, .miembro-card').forEach(card => {
            observer.observe(card);
        });
    }

    startCounterAnimation() {
        const counters = document.querySelectorAll('.stat-number');
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
                element.textContent = target + '+';
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current) + '+';
            }
        }, 16);
    }

    showLoading() {
        const loading = document.createElement('div');
        loading.className = 'loading-overlay';
        loading.innerHTML = `
            <div class="loading-spinner">
                <div class="spinner"></div>
                <p>Procesando solicitud...</p>
            </div>
        `;
        document.body.appendChild(loading);
    }

    hideLoading() {
        const loading = document.querySelector('.loading-overlay');
        if (loading) {
            document.body.removeChild(loading);
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

    // Métodos adicionales para funcionalidades avanzadas
    initializeChatbot() {
        const chatbot = document.createElement('div');
        chatbot.className = 'chatbot-container';
        chatbot.innerHTML = `
            <div class="chatbot-toggle" onclick="window.asesoriaManager.toggleChat()">
                <i class="fas fa-comments"></i>
            </div>
            <div class="chatbot-window" style="display: none;">
                <div class="chatbot-header">
                    <h4>Asistente Virtual</h4>
                    <button onclick="window.asesoriaManager.toggleChat()">&times;</button>
                </div>
                <div class="chatbot-messages" id="chatbot-messages">
                    <div class="bot-message">
                        ¡Hola! Soy tu asistente virtual. ¿En qué puedo ayudarte hoy?
                    </div>
                </div>
                <div class="chatbot-input">
                    <input type="text" placeholder="Escribe tu consulta..." id="chatbot-input">
                    <button onclick="window.asesoriaManager.sendChatMessage()">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        `;
        
        document.body.appendChild(chatbot);
    }

    toggleChat() {
        const chatWindow = document.querySelector('.chatbot-window');
        const isVisible = chatWindow.style.display !== 'none';
        chatWindow.style.display = isVisible ? 'none' : 'block';
        
        if (!isVisible) {
            document.getElementById('chatbot-input').focus();
        }
    }

    sendChatMessage() {
        const input = document.getElementById('chatbot-input');
        const message = input.value.trim();
        
        if (!message) return;
        
        this.addChatMessage(message, 'user');
        input.value = '';
        
        // Simular respuesta del bot
        setTimeout(() => {
            const response = this.generateBotResponse(message);
            this.addChatMessage(response, 'bot');
        }, 1000);
    }

    addChatMessage(message, sender) {
        const messagesContainer = document.getElementById('chatbot-messages');
        const messageDiv = document.createElement('div');
        messageDiv.className = `${sender}-message`;
        messageDiv.textContent = message;
        
        messagesContainer.appendChild(messageDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    generateBotResponse(message) {
        const responses = {
            'precio': 'Nuestros servicios van desde $50 para consultoría express hasta $500+ para asesoría integral. ¿Te gustaría conocer más detalles?',
            'contacto': 'Puedes contactarnos por WhatsApp: +51 987 654 321 o email: asesoria@greenagrifarm.com',
            'especialista': 'Contamos con 6 especialistas en diferentes áreas. ¿En qué área específica necesitas ayuda?',
            'papa': 'Para cultivos de papa, te recomiendo consultar con el Dr. Carlos Mendoza, especialista en nutrición vegetal.',
            'riego': 'Para sistemas de riego, la Ing. María González es nuestra experta. ¿Quieres contactarla?',
            'plagas': 'Para control de plagas, el Dr. Luis Ramírez es tu mejor opción. Tiene 18 años de experiencia.',
            'suelo': 'Para análisis de suelos, la Ing. Ana Torres puede ayudarte. ¿Necesitas análisis?'
        };
        
        const lowerMessage = message.toLowerCase();
        
        for (const [keyword, response] of Object.entries(responses)) {
            if (lowerMessage.includes(keyword)) {
                return response;
            }
        }
        
        return 'Gracias por tu consulta. Un especialista se pondrá en contacto contigo pronto. ¿Hay algo más en lo que pueda ayudarte?';
    }

    // Inicializar funcionalidades adicionales
    initializeAdvancedFeatures() {
        this.initializeChatbot();
        this.setupScrollAnimations();
        this.setupLazyLoading();
        this.setupSearchFunctionality();
    }

    setupScrollAnimations() {
        const elements = document.querySelectorAll('.servicio-card, .especialidad-card, .miembro-card, .testimonio-card');
        
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

    setupLazyLoading() {
        const images = document.querySelectorAll('img[data-src]');
        
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        images.forEach(img => {
            imageObserver.observe(img);
        });
    }

    setupSearchFunctionality() {
        const searchInput = document.createElement('input');
        searchInput.type = 'text';
        searchInput.placeholder = 'Buscar especialista o servicio...';
        searchInput.className = 'search-input';
        
        const searchContainer = document.createElement('div');
        searchContainer.className = 'search-container';
        searchContainer.appendChild(searchInput);
        
        // Agregar a la página
        const header = document.querySelector('.asesoria-header');
        if (header) {
            header.appendChild(searchContainer);
        }
        
        // Funcionalidad de búsqueda
        let searchTimeout;
        searchInput.addEventListener('input', (e) => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                this.performSearch(e.target.value);
            }, 300);
        });
    }

    performSearch(query) {
        if (!query.trim()) {
            this.resetSearch();
            return;
        }
        
        const searchableElements = document.querySelectorAll('.servicio-card, .especialidad-card, .miembro-card');
        
        searchableElements.forEach(element => {
            const text = element.textContent.toLowerCase();
            const isMatch = text.includes(query.toLowerCase());
            
            if (isMatch) {
                element.style.display = 'block';
                element.classList.add('search-highlight');
            } else {
                element.style.display = 'none';
                element.classList.remove('search-highlight');
            }
        });
    }

    resetSearch() {
        const searchableElements = document.querySelectorAll('.servicio-card, .especialidad-card, .miembro-card');
        
        searchableElements.forEach(element => {
            element.style.display = 'block';
            element.classList.remove('search-highlight');
        });
    }

    // Función para generar reportes
    generateReport() {
        const reportData = {
            servicios: Object.keys(this.servicios).length,
            especialistas: Object.keys(this.especialistas).length,
            testimonios: this.testimonios.length,
            fecha: new Date().toISOString(),
            estadisticas: {
                proyectos: 500,
                años: 15,
                satisfaccion: 95,
                especialistas: 25
            }
        };
        
        const blob = new Blob([JSON.stringify(reportData, null, 2)], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `reporte-asesoria-${new Date().toISOString().split('T')[0]}.json`;
        a.click();
        URL.revokeObjectURL(url);
        
        this.showNotification('Reporte generado exitosamente', 'success');
    }
}

// Estilos adicionales para nuevas funcionalidades
const chatbotStyles = `
    .chatbot-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }
    
    .chatbot-toggle {
        width: 60px;
        height: 60px;
        background: #4CAF50;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        transition: all 0.3s ease;
    }
    
    .chatbot-toggle:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 20px rgba(76, 175, 80, 0.6);
    }
    
    .chatbot-toggle i {
        color: white;
        font-size: 1.5rem;
    }
    
    .chatbot-window {
        position: absolute;
        bottom: 80px;
        right: 0;
        width: 350px;
        height: 400px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }
    
    .chatbot-header {
        background: #4CAF50;
        color: white;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .chatbot-header h4 {
        margin: 0;
        font-size: 1.1rem;
    }
    
    .chatbot-header button {
        background: none;
        border: none;
        color: white;
        font-size: 1.2rem;
        cursor: pointer;
    }
    
    .chatbot-messages {
        flex: 1;
        padding: 15px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    .bot-message, .user-message {
        padding: 10px 15px;
        border-radius: 15px;
        max-width: 80%;
        word-wrap: break-word;
    }
    
    .bot-message {
        background: #f0f0f0;
        align-self: flex-start;
    }
    
    .user-message {
        background: #4CAF50;
        color: white;
        align-self: flex-end;
    }
    
    .chatbot-input {
        display: flex;
        padding: 15px;
        border-top: 1px solid #eee;
        gap: 10px;
    }
    
    .chatbot-input input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 20px;
        outline: none;
    }
    
    .chatbot-input button {
        width: 40px;
        height: 40px;
        background: #4CAF50;
        border: none;
        border-radius: 50%;
        color: white;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .search-container {
        margin-top: 20px;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .search-input {
        width: 100%;
        padding: 12px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 25px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }
    
    .search-input:focus {
        outline: none;
        border-color: #4CAF50;
    }
    
    .search-highlight {
        animation: highlight 0.5s ease-out;
    }
    
    @keyframes highlight {
        0% { background-color: #fff3cd; }
        100% { background-color: transparent; }
    }
    
    @media (max-width: 768px) {
        .chatbot-window {
            width: 300px;
            height: 350px;
        }
        
        .chatbot-toggle {
            width: 50px;
            height: 50px;
        }
    }
`;

// Agregar estilos completos al documento
const completeStyles = additionalStyles + chatbotStyles;
const styleSheet = document.createElement('style');
styleSheet.textContent = completeStyles;
document.head.appendChild(styleSheet);

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    window.asesoriaManager = new AsesoriaManager();
    // Inicializar funcionalidades avanzadas
    window.asesoriaManager.initializeAdvancedFeatures();
});

// Funciones globales para compatibilidad
window.toggleChat = () => {
    if (window.asesoriaManager) {
        window.asesoriaManager.toggleChat();
    }
};

window.sendChatMessage = () => {
    if (window.asesoriaManager) {
        window.asesoriaManager.sendChatMessage();
    }
};

// Manejar eventos del teclado para el chat
document.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' && e.target.id === 'chatbot-input') {
        window.asesoriaManager.sendChatMessage();
    }
});

// Estilos adicionales para modales y animaciones
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
        max-width: 600px;
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
    
    .service-details {
        margin-top: 20px;
    }
    
    .service-price {
        font-size: 1.8rem;
        font-weight: bold;
        color: #4CAF50;
        margin-bottom: 10px;
    }
    
    .service-duration {
        color: #666;
        margin-bottom: 20px;
    }
    
    .service-includes {
        margin: 20px 0;
        padding-left: 20px;
    }
    
    .service-includes li {
        margin: 8px 0;
        color: #666;
    }
    
    .service-actions {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        flex-wrap: wrap;
    }
    
    .especialista-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
    }
    
    .especialista-avatar-large {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #4CAF50, #45a049);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        font-weight: bold;
    }
    
    .especialista-logros {
        margin: 20px 0;
        padding-left: 20px;
    }
    
    .especialista-logros li {
        margin: 8px 0;
        color: #666;
    }
    
    .especialista-actions {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        flex-wrap: wrap;
    }
    
    .consulta-form {
        margin-top: 20px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
        color: #333;
    }
    
    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }
    
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #4CAF50;
    }
    
    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }
    
    .form-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
        margin-top: 30px;
    }
    
    .btn-primary,
    .btn-secondary,
    .btn-outline,
    .btn-cancel,
    .btn-submit {
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
    
    .btn-cancel {
        background: #f8f9fa;
        color: #666;
        border: 2px solid #e0e0e0;
    }
    
    .btn-cancel:hover {
        background: #e9ecef;
    }
    
    .btn-submit {
        background: #4CAF50;
        color: white;
    }
    
    .btn-submit:hover {
        background: #45a049;
    }
    
    .info-sections {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin: 20px 0;
    }
    
    .info-section h4 {
        color: #2c3e50;
        margin-bottom: 15px;
        font-weight: 600;
    }
    
    .info-section ul,
    .info-section ol {
        padding-left: 20px;
    }
    
    .info-section li {
        margin: 8px 0;
        color: #666;
    }
    
    .info-actions {
        text-align: center;
        margin-top: 30px;
    }
    
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1001;
    }
    
    .loading-spinner {
        background: white;
        padding: 30px;
        border-radius: 15px;
        text-align: center;
    }
    
    .spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #4CAF50;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto 20px;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    .animate-in {
        animation: fadeInUp 0.8s ease-out;
    }
    
    @media (max-width: 768px) {
        .modal-content {
            padding: 20px;
            width: 95%;
        }
        
        .info-sections {
            grid-template-columns: 1fr;
        }
        
        .especialista-header {
            flex-direction: column;
            text-align: center;
        }
        
        .service-actions,
        .especialista-actions,
        .form-actions {
            flex-direction: column;
        }
    }
`;
