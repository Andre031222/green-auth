<?php
// paginas/formacion.php
?>

<!-- Incluir CSS específico -->
<link rel="stylesheet" href="assets/css/formacion.css">

<div class="page-content">
    <!-- Header principal -->
    <div class="formacion-header">
        <h1 class="formacion-title">Formación Continua</h1>
        <p class="formacion-subtitle">Capacitación de expertos para tu éxito agrícola</p>
        <p class="formacion-description">
            Accede a una amplia gama de recursos educativos diseñados por expertos en agricultura. 
            Desde cursos básicos hasta especializaciones avanzadas, tenemos todo lo que necesitas 
            para mejorar tus habilidades y conocimientos agrícolas.
        </p>
    </div>

    <!-- Barra de progreso del usuario -->
    <div class="progreso-bar">
        <h3 class="progreso-title">Tu Progreso de Aprendizaje</h3>
        <div class="progreso-stats">
            <div class="progreso-item">
                <div class="progreso-number">3</div>
                <div class="progreso-label">Cursos Completados</div>
            </div>
            <div class="progreso-item">
                <div class="progreso-number">2</div>
                <div class="progreso-label">En Progreso</div>
            </div>
            <div class="progreso-item">
                <div class="progreso-number">24</div>
                <div class="progreso-label">Horas Estudiadas</div>
            </div>
            <div class="progreso-item">
                <div class="progreso-number">8</div>
                <div class="progreso-label">Certificados</div>
            </div>
        </div>
        <div class="progreso-visual">
            <div class="progreso-fill" data-progress="65"></div>
        </div>
    </div>
    
    <!-- Grid de recursos principales -->
    <div class="recursos-grid">
        <div class="recurso-card">
            <div class="recurso-icon">📹</div>
            <h3 class="recurso-title">Nuevo: Curso de Agricultura de Precisión</h3>
            <p class="recurso-subtitle">Videos Educativos</p>
            <p class="recurso-description">
                Aprende las técnicas más avanzadas de agricultura moderna con nuestros videos 
                especializados, producidos por expertos reconocidos internacionalmente.
            </p>
            <div class="recurso-stats">
                <div class="recurso-stat">
                    <div class="recurso-stat-number">200+</div>
                    <div class="recurso-stat-label">Videos</div>
                </div>
                <div class="recurso-stat">
                    <div class="recurso-stat-number">150</div>
                    <div class="recurso-stat-label">Horas</div>
                </div>
                <div class="recurso-stat">
                    <div class="recurso-stat-number">25</div>
                    <div class="recurso-stat-label">Temas</div>
                </div>
            </div>
            <button class="recurso-btn">
                <i class="fas fa-play"></i> Explorar Videos
            </button>
        </div>
        
        <div class="recurso-card">
            <div class="recurso-icon">📄</div>
            <h3 class="recurso-title">Guías PDF Descargables</h3>
            <p class="recurso-subtitle">Documentación Técnica</p>
            <p class="recurso-description">
                Documentos completos y detallados para consultar en cualquier momento sin conexión. 
                Incluye ilustraciones, tablas y referencias técnicas actualizadas.
            </p>
            <div class="recurso-stats">
                <div class="recurso-stat">
                    <div class="recurso-stat-number">85</div>
                    <div class="recurso-stat-label">Guías</div>
                </div>
                <div class="recurso-stat">
                    <div class="recurso-stat-number">2,500</div>
                    <div class="recurso-stat-label">Páginas</div>
                </div>
                <div class="recurso-stat">
                    <div class="recurso-stat-number">15K</div>
                    <div class="recurso-stat-label">Descargas</div>
                </div>
            </div>
            <button class="recurso-btn">
                <i class="fas fa-download"></i> Descargar Guías
            </button>
        </div>
        
        <div class="recurso-card">
            <div class="recurso-icon">👥</div>
            <h3 class="recurso-title">Webinars en Vivo</h3>
            <p class="recurso-subtitle">Sesiones Interactivas</p>
            <p class="recurso-description">
                Sesiones interactivas con expertos donde puedes hacer preguntas en tiempo real, 
                participar en debates y conectar con otros profesionales del sector.
            </p>
            <div class="recurso-stats">
                <div class="recurso-stat">
                    <div class="recurso-stat-number">52</div>
                    <div class="recurso-stat-label">Webinars</div>
                </div>
                <div class="recurso-stat">
                    <div class="recurso-stat-number">5K</div>
                    <div class="recurso-stat-label">Participantes</div>
                </div>
                <div class="recurso-stat">
                    <div class="recurso-stat-number">104</div>
                    <div class="recurso-stat-label">Horas</div>
                </div>
            </div>
            <button class="recurso-btn">
                <i class="fas fa-video"></i> Próximos Webinars
            </button>
        </div>
    </div>

    <!-- Sección de cursos -->
    <div class="cursos-section">
        <h3 class="cursos-title">Cursos Disponibles</h3>
        
        <!-- Filtros y búsqueda -->
        <div class="curso-filters">
            <div class="filter-search">
                <input type="text" placeholder="Buscar cursos, instructores o temas...">
                <i class="fas fa-search"></i>
            </div>
        </div>
        
        <!-- Tags de filtros -->
        <div class="curso-tags">
            <span class="curso-tag active">Todos</span>
            <span class="curso-tag">Técnicas de Cultivo</span>
            <span class="curso-tag">Manejo Integrado de Plagas</span>
            <span class="curso-tag">Agricultura Orgánica</span>
            <span class="curso-tag">Riego Tecnificado</span>
            <span class="curso-tag">Fertilización</span>
            <span class="curso-tag">Postcosecha</span>
        </div>
        
        <!-- Grid de cursos -->
        <div class="curso-grid">
            <div class="curso-card" data-curso-id="agricultura-sostenible">
                <div class="curso-header">
                    <div class="curso-badge nuevo">Nuevo</div>
                    <div class="curso-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-text">4.8 (234)</span>
                    </div>
                </div>
                <h4 class="curso-name">Fundamentos de Agricultura Sostenible</h4>
                <p class="curso-description">
                    Aprende los principios básicos de la agricultura sostenible y cómo implementarlos 
                    en tu finca para obtener mejores resultados a largo plazo.
                </p>
                <div class="curso-instructor">
                    <div class="instructor-avatar">CM</div>
                    <div class="instructor-name">Dr. Carlos Mendoza</div>
                </div>
                <div class="curso-progress">
                    <div class="curso-progress-fill" style="width: 0%"></div>
                </div>
                <div class="curso-meta">
                    <span class="curso-duration">
                        <i class="fas fa-clock"></i> 4 horas
                    </span>
                    <span class="curso-type">Gratis</span>
                </div>
                <div class="curso-actions">
                    <button class="curso-btn primary">
                        <i class="fas fa-play"></i> Iniciar Curso
                    </button>
                    <button class="curso-btn secondary">
                        <i class="fas fa-eye"></i> Vista Previa
                    </button>
                </div>
            </div>
            
            <div class="curso-card" data-curso-id="manejo-plagas">
                <div class="curso-header">
                    <div class="curso-badge popular">Popular</div>
                    <div class="curso-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-text">4.9 (567)</span>
                    </div>
                </div>
                <h4 class="curso-name">Manejo Integrado de Plagas</h4>
                <p class="curso-description">
                    Estrategias efectivas para controlar plagas sin dañar el medio ambiente. 
                    Incluye métodos biológicos, químicos y culturales.
                </p>
                <div class="curso-instructor">
                    <div class="instructor-avatar">LR</div>
                    <div class="instructor-name">Dr. Luis Ramírez</div>
                </div>
                <div class="curso-progress">
                    <div class="curso-progress-fill" style="width: 0%"></div>
                </div>
                <div class="curso-meta">
                    <span class="curso-duration">
                        <i class="fas fa-clock"></i> 6 horas
                    </span>
                    <span class="curso-type">$49</span>
                </div>
                <div class="curso-actions">
                    <button class="curso-btn primary">
                        <i class="fas fa-play"></i> Iniciar Curso
                    </button>
                    <button class="curso-btn secondary">
                        <i class="fas fa-eye"></i> Vista Previa
                    </button>
                </div>
            </div>
            
            <div class="curso-card" data-curso-id="agricultura-precision">
                <div class="curso-header">
                    <div class="curso-badge avanzado">Avanzado</div>
                    <div class="curso-rating">
                        <span class="stars">★★★★☆</span>
                        <span class="rating-text">4.7 (189)</span>
                    </div>
                </div>
                <h4 class="curso-name">Agricultura de Precisión</h4>
                <p class="curso-description">
                    Tecnologías avanzadas para optimizar la producción agrícola usando datos, 
                    sensores IoT y análisis predictivo.
                </p>
                <div class="curso-instructor">
                    <div class="instructor-avatar">LP</div>
                    <div class="instructor-name">Ing. Laura Paredes</div>
                </div>
                <div class="curso-progress">
                    <div class="curso-progress-fill" style="width: 0%"></div>
                </div>
                <div class="curso-meta">
                    <span class="curso-duration">
                        <i class="fas fa-clock"></i> 8 horas
                    </span>
                    <span class="curso-type">$99</span>
                </div>
                <div class="curso-actions">
                    <button class="curso-btn primary">
                        <i class="fas fa-play"></i> Iniciar Curso
                    </button>
                    <button class="curso-btn secondary">
                        <i class="fas fa-eye"></i> Vista Previa
                    </button>
                </div>
            </div>
            
            <div class="curso-card" data-curso-id="preparacion-suelos">
                <div class="curso-header">
                    <div class="curso-badge basico">Básico</div>
                    <div class="curso-rating">
                        <span class="stars">★★★★☆</span>
                        <span class="rating-text">4.6 (345)</span>
                    </div>
                </div>
                <h4 class="curso-name">Preparación de Suelos</h4>
                <p class="curso-description">
                    Técnicas fundamentales para preparar el suelo antes de la siembra. 
                    Incluye análisis, laboreo y enmiendas.
                </p>
                <div class="curso-instructor">
                    <div class="instructor-avatar">AT</div>
                    <div class="instructor-name">Ing. Ana Torres</div>
                </div>
                <div class="curso-progress">
                    <div class="curso-progress-fill" style="width: 0%"></div>
                </div>
                <div class="curso-meta">
                    <span class="curso-duration">
                        <i class="fas fa-clock"></i> 3 horas
                    </span>
                    <span class="curso-type">Gratis</span>
                </div>
                <div class="curso-actions">
                    <button class="curso-btn primary">
                        <i class="fas fa-play"></i> Iniciar Curso
                    </button>
                    <button class="curso-btn secondary">
                        <i class="fas fa-eye"></i> Vista Previa
                    </button>
                </div>
            </div>
            
            <div class="curso-card" data-curso-id="sistemas-riego">
                <div class="curso-header">
                    <div class="curso-badge intermedio">Intermedio</div>
                    <div class="curso-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-text">4.8 (423)</span>
                    </div>
                </div>
                <h4 class="curso-name">Sistemas de Riego Eficientes</h4>
                <p class="curso-description">
                    Optimización del uso del agua en sistemas de riego modernos. 
                    Incluye goteo, aspersión y riego automatizado.
                </p>
                <div class="curso-instructor">
                    <div class="instructor-avatar">MG</div>
                    <div class="instructor-name">Ing. María González</div>
                </div>
                <div class="curso-progress">
                    <div class="curso-progress-fill" style="width: 0%"></div>
                </div>
                <div class="curso-meta">
                    <span class="curso-duration">
                        <i class="fas fa-clock"></i> 5 horas
                    </span>
                    <span class="curso-type">$39</span>
                </div>
                <div class="curso-actions">
                    <button class="curso-btn primary">
                        <i class="fas fa-play"></i> Iniciar Curso
                    </button>
                    <button class="curso-btn secondary">
                        <i class="fas fa-eye"></i> Vista Previa
                    </button>
                </div>
            </div>
            
            <div class="curso-card" data-curso-id="cultivos-hidroponicos">
                <div class="curso-header">
                    <div class="curso-badge especializado">Especializado</div>
                    <div class="curso-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-text">4.9 (156)</span>
                    </div>
                </div>
                <h4 class="curso-name">Cultivos Hidropónicos</h4>
                <p class="curso-description">
                    Introducción a los cultivos sin suelo y sus ventajas productivas. 
                    Sistemas NFT, DWC y técnicas avanzadas.
                </p>
                <div class="curso-instructor">
                    <div class="instructor-avatar">JS</div>
                    <div class="instructor-name">Ing. José Silva</div>
                </div>
                <div class="curso-progress">
                    <div class="curso-progress-fill" style="width: 0%"></div>
                </div>
                <div class="curso-meta">
                    <span class="curso-duration">
                        <i class="fas fa-clock"></i> 7 horas
                    </span>
                    <span class="curso-type">$79</span>
                </div>
                <div class="curso-actions">
                    <button class="curso-btn primary">
                        <i class="fas fa-play"></i> Iniciar Curso
                    </button>
                    <button class="curso-btn secondary">
                        <i class="fas fa-eye"></i> Vista Previa
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de especialidades -->
    <div class="especialidades-section">
        <h3 class="especialidades-title">Especialidades Disponibles</h3>
        
        <div class="especialidades-grid">
            <div class="especialidad-card">
                <div class="especialidad-icon">🌱</div>
                <div class="especialidad-name">Agricultura Orgánica</div>
                <div class="especialidad-count">12 cursos disponibles</div>
            </div>
            
            <div class="especialidad-card">
                <div class="especialidad-icon">🏠</div>
                <div class="especialidad-name">Manejo de Invernaderos</div>
                <div class="especialidad-count">8 cursos disponibles</div>
            </div>
            
            <div class="especialidad-card">
                <div class="especialidad-icon">🍃</div>
                <div class="especialidad-name">Fertilización Foliar</div>
                <div class="especialidad-count">6 cursos disponibles</div>
            </div>
            
            <div class="especialidad-card">
                <div class="especialidad-icon">🐛</div>
                <div class="especialidad-name">Control Biológico</div>
                <div class="especialidad-count">9 cursos disponibles</div>
            </div>
            
            <div class="especialidad-card">
                <div class="especialidad-icon">📦</div>
                <div class="especialidad-name">Postcosecha</div>
                <div class="especialidad-count">7 cursos disponibles</div>
            </div>
            
            <div class="especialidad-card">
                <div class="especialidad-icon">🏆</div>
                <div class="especialidad-name">Certificaciones</div>
                <div class="especialidad-count">5 cursos disponibles</div>
            </div>
        </div>
    </div>

    <!-- Testimonios de estudiantes -->
    <div class="testimonios-section">
        <h3 class="testimonios-title">Lo que dicen nuestros estudiantes</h3>
        
        <div class="testimonios-grid">
            <div class="testimonio-card">
                <p class="testimonio-text">
                    "Los cursos de formación han transformado completamente mi manera de manejar mis cultivos. 
                    Los instructores son expertos reales y el contenido es muy práctico."
                </p>
                <div class="testimonio-author">
                    <div class="testimonio-avatar">JP</div>
                    <div class="testimonio-info">
                        <h5>Juan Pérez</h5>
                        <span>Agricultor - Huancayo</span>
                        <div class="testimonio-rating">★★★★★</div>
                    </div>
                </div>
            </div>
            
            <div class="testimonio-card">
                <p class="testimonio-text">
                    "Excelente plataforma de aprendizaje. He completado 5 cursos y cada uno me ha dado 
                    herramientas valiosas para mejorar mi producción."
                </p>
                <div class="testimonio-author">
                    <div class="testimonio-avatar">ME</div>
                    <div class="testimonio-info">
                        <h5>María Elena</h5>
                        <span>Ingeniera Agrónoma - Cusco</span>
                        <div class="testimonio-rating">★★★★★</div>
                    </div>
                </div>
            </div>
            
            <div class="testimonio-card">
                <p class="testimonio-text">
                    "La calidad de los videos y materiales es excepcional. Poder acceder desde cualquier 
                    lugar me ha permitido estudiar a mi propio ritmo."
                </p>
                <div class="testimonio-author">
                    <div class="testimonio-avatar">RS</div>
                    <div class="testimonio-info">
                        <h5>Roberto Silva</h5>
                        <span>Productor Orgánico - Arequipa</span>
                        <div class="testimonio-rating">★★★★★</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas de la plataforma -->
    <div class="stats-section">
        <h2 class="stats-title">Nuestra Plataforma en Números</h2>
        <p class="stats-subtitle">Miles de agricultores ya confían en nosotros</p>
        
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">15,000+</div>
                <div class="stat-label">Estudiantes</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">150+</div>
                <div class="stat-label">Cursos</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">25</div>
                <div class="stat-label">Especialidades</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">98%</div>
                <div class="stat-label">Satisfacción</div>
            </div>
        </div>
    </div>
</div>

<!-- Incluir JavaScript específico -->
<script src="assets/js/formacion.js"></script>