import React, { useState, useEffect } from 'react';
import { Leaf } from 'lucide-react';
import './App.css';
import { FaLeaf, FaCloudSun, FaSearch, FaCalculator, FaChartLine } from 'react-icons/fa';

import aboutImage from './images/agricultura-peru.jpg';
import sideImage from './images/agricultor-app.jpg';
import personImage from './images/persona-señalando.jpg';
import fondoContacto from './images/fondo-contacto.jpg';
import logoImage from './images/logo.jpg';


// Componente del carrusel definido fuera del componente principal
const CarouselComponent = () => {
  const [currentSlide, setCurrentSlide] = useState(0);

  const images = [
    {
      url: "https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=900&h=500&fit=crop",
      alt: "Agricultor trabajando en el campo",
      title: "Gestión Agrícola Inteligente"
    },
    {
      url: "https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=900&h=500&fit=crop",
      alt: "Cultivos optimizados",
      title: "Optimización de Cultivos"
    },
    {
      url: "https://images.unsplash.com/photo-1464207687429-7505649dae38?w=900&h=500&fit=crop",
      alt: "Monitoreo del clima",
      title: "Monitoreo Climático"
    },
    {
      url: "https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=900&h=500&fit=crop",
      alt: "Detección de plagas",
      title: "Detección de Plagas"
    },
    {
      url: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=900&h=500&fit=crop",
      alt: "Análisis de datos agrícolas",
      title: "Análisis de Datos"
    }
  ];

  // Auto-advance carousel
  useEffect(() => {
    const interval = setInterval(() => {
      setCurrentSlide((prev) => (prev + 1) % images.length);
    }, 5000);
    return () => clearInterval(interval);
  }, [images.length]);

  const nextSlide = () => {
    setCurrentSlide((prev) => (prev + 1) % images.length);
  };

  const prevSlide = () => {
    setCurrentSlide((prev) => (prev - 1 + images.length) % images.length);
  };

  const goToSlide = (index) => {
    setCurrentSlide(index);
  };

  return (
    <div className="carousel-container" style={{
      maxWidth: '1000px',
      margin: '2rem auto',
      position: 'relative',
      width: '100%'
    }}>
      <div style={{
        height: '500px',
        borderRadius: '16px',
        overflow: 'hidden',
        border: '2px solid #e5e7eb',
        position: 'relative',
        boxShadow: '0 8px 32px rgba(0,0,0,0.1)'
      }}>
        {/* Contenedor de imágenes */}
        <div style={{
          display: 'flex',
          transform: `translateX(-${currentSlide * 100}%)`,
          transition: 'transform 0.5s ease-in-out',
          height: '100%'
        }}>
          {images.map((image, index) => (
            <div key={index} style={{
              minWidth: '100%',
              height: '100%',
              position: 'relative'
            }}>
              <img
                src={image.url}
                alt={image.alt}
                style={{
                  width: '100%',
                  height: '100%',
                  objectFit: 'cover'
                }}
              />
              {/* Overlay con título */}
              <div style={{
                position: 'absolute',
                bottom: '0',
                left: '0',
                right: '0',
                background: 'linear-gradient(transparent, rgba(0,0,0,0.7))',
                color: 'white',
                padding: '2rem',
                textAlign: 'center'
              }}>
                <h3 style={{
                  fontSize: '1.5rem',
                  fontWeight: 'bold',
                  margin: '0'
                }}>
                  {image.title}
                </h3>
              </div>
            </div>
          ))}
        </div>

        {/* Controles del carrusel */}
        <button
          onClick={prevSlide}
          style={{
            position: 'absolute',
            left: '16px',
            top: '50%',
            transform: 'translateY(-50%)',
            backgroundColor: 'rgba(59, 130, 246, 0.9)',
            color: 'white',
            border: 'none',
            borderRadius: '50%',
            width: '48px',
            height: '48px',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'center',
            cursor: 'pointer',
            boxShadow: '0 4px 12px rgba(0,0,0,0.15)',
            fontSize: '20px',
            fontWeight: 'bold',
            transition: 'all 0.3s ease',
            zIndex: 10
          }}
        >
          ‹
        </button>

        <button
          onClick={nextSlide}
          style={{
            position: 'absolute',
            right: '16px',
            top: '50%',
            transform: 'translateY(-50%)',
            backgroundColor: 'rgba(59, 130, 246, 0.9)',
            color: 'white',
            border: 'none',
            borderRadius: '50%',
            width: '48px',
            height: '48px',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'center',
            cursor: 'pointer',
            boxShadow: '0 4px 12px rgba(0,0,0,0.15)',
            fontSize: '20px',
            fontWeight: 'bold',
            transition: 'all 0.3s ease',
            zIndex: 10
          }}
        >
          ›
        </button>
      </div>

      {/* Indicadores de puntos */}
      <div style={{
        display: 'flex',
        justifyContent: 'center',
        gap: '12px',
        marginTop: '20px'
      }}>
        {images.map((_, index) => (
          <button
            key={index}
            onClick={() => goToSlide(index)}
            style={{
              width: currentSlide === index ? '24px' : '12px',
              height: '12px',
              borderRadius: '6px',
              backgroundColor: currentSlide === index ? '#22c55e' : '#d1d5db',
              border: 'none',
              cursor: 'pointer',
              transition: 'all 0.3s ease'
            }}
          />
        ))}
      </div>
    </div>
  );
};

const App = () => {
  const [activeTab, setActiveTab] = useState('acerca');

  const navItems = [
    { id: 'inicio', label: 'Inicio' },
    { id: 'acerca', label: 'Acerca de' },
    { id: 'servicios', label: 'Servicios' },
    { id: 'contactos', label: 'Contactos' }
  ];

  const benefits = [
    "Creemos en el potencial del agro peruano",
    "Queremos que la tecnología beneficie también al campo",
    "Buscamos un desarrollo rural sostenible e inclusivo"
  ];

  const renderTabContent = () => {
    switch (activeTab) {
      case 'inicio':
        return (
          <div className="tab-content">
            {/* Hero Section Principal */}
            <div className="hero-section" style={{
              background: 'linear-gradient(135deg, #f0fdf4, #eff6ff)',
              padding: '4rem 2rem',
              textAlign: 'center',
              minHeight: '70vh',
              display: 'flex',
              flexDirection: 'column',
              justifyContent: 'center',
              alignItems: 'center'
            }}>
              <h1 className="hero-title" style={{
                fontSize: '3rem',
                fontWeight: 'bold',
                color: '#111827',
                lineHeight: '1.2',
                marginBottom: '1.5rem',
                textShadow: '2px 2px 4px rgba(0,0,0,0.1)'
              }}>
                "¡Bienvenido a <span style={{ color: '#22c55e' }}>AgriFarm</span>, tu Asistente Inteligente para la Gestión Agrícola en Puno!"
              </h1>

              <p style={{
                fontSize: '1.1rem',
                color: '#374151',
                lineHeight: '1.7',
                maxWidth: '900px',
                margin: '0 auto 2rem',
                textAlign: 'center'
              }}>
                En el mundo agrícola actual, la tecnología se ha convertido en una herramienta
                fundamental para mejorar la productividad, cuidar el medio ambiente y asegurar cosechas
                exitosas. Por eso, hemos creado tu Asistente Inteligente para la Gestión Agrícola, una
                plataforma digital diseñada especialmente para agricultores, cooperativas y técnicos del
                campo que buscan llevar sus cultivos al siguiente nivel.
              </p>

              {/* Carrusel de imágenes funcional */}
              <CarouselComponent />
            </div>

            {/* Línea divisora verde */}
            <div className="divider" style={{
              maxWidth: '1200px',
              margin: '0 auto',
              padding: '0 2rem'
            }}>
              <hr style={{
                border: 'none',
                borderTop: '3px solid #22c55e',
                margin: '2rem 0',
                borderRadius: '2px'
              }} />
            </div>

            {/* Secciones de contenido en el orden del PDF */}
            <div className="content-sections" style={{
              maxWidth: '1200px',
              margin: '0 auto',
              padding: '0 2rem'
            }}>

              {/* 1. Optimiza tus cultivos de manera eficiente */}
              <div className="dual-column-container" style={{
                display: 'grid',
                gridTemplateColumns: '1fr 1fr',
                gap: '2rem',
                alignItems: 'center',
                marginBottom: '3rem',
                padding: '2rem 0'
              }}>
                <div className="info-box" style={{
                  backgroundColor: 'rgba(224, 242, 254, 0.3)',
                  padding: '2rem',
                  borderRadius: '15px',
                  border: '1px solid #bfdbfe'
                }}>
                  <h2 style={{
                    fontSize: '2rem',
                    fontWeight: 'bold',
                    color: '#111827',
                    marginBottom: '1rem',
                    fontStyle: 'italic'
                  }}>
                    Optimiza tus cultivos de manera eficiente
                  </h2>
                  <p style={{
                    fontSize: '1rem',
                    color: '#374151',
                    lineHeight: '1.7'
                  }}>
                    Nuestro sistema te permite llevar un control detallado de cada una de tus
                    parcelas. Desde el tipo de cultivo, la fase de crecimiento, hasta el uso de
                    fertilizantes y riego.
                  </p>
                </div>

                <div className="image-container">
                  <img
                    src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=500&h=300&fit=crop"
                    alt="Cultivos optimizados"
                    style={{
                      width: '100%',
                      height: '300px',
                      objectFit: 'cover',
                      borderRadius: '15px',
                      border: '1px solid #e5e7eb',
                      boxShadow: '0 4px 12px rgba(0,0,0,0.1)'
                    }}
                  />
                </div>
              </div>

              {/* 2. Monitorea el clima en tiempo real */}
              <div className="dual-column-container" style={{
                display: 'grid',
                gridTemplateColumns: '1fr 1fr',
                gap: '2rem',
                alignItems: 'center',
                marginBottom: '3rem',
                padding: '2rem 0'
              }}>
                <div className="image-container">
                  <img
                    src="https://images.unsplash.com/photo-1464207687429-7505649dae38?w=500&h=300&fit=crop"
                    alt="Monitoreo del clima"
                    style={{
                      width: '100%',
                      height: '300px',
                      objectFit: 'cover',
                      borderRadius: '15px',
                      border: '1px solid #e5e7eb',
                      boxShadow: '0 4px 12px rgba(0,0,0,0.1)'
                    }}
                  />
                </div>

                <div className="info-box" style={{
                  backgroundColor: 'rgba(240, 253, 244, 0.5)',
                  padding: '2rem',
                  borderRadius: '15px',
                  border: '1px solid #bbf7d0'
                }}>
                  <h2 style={{
                    fontSize: '2rem',
                    fontWeight: 'bold',
                    color: '#111827',
                    marginBottom: '1rem',
                    fontStyle: 'italic'
                  }}>
                    Monitorea el clima en tiempo real
                  </h2>
                  <p style={{
                    fontSize: '1rem',
                    color: '#374151',
                    lineHeight: '1.7'
                  }}>
                    El clima es un factor clave en la agricultura, y tomar decisiones sin datos confiables puede ser
                    costoso. Con nuestro asistente inteligente, tendrás acceso a pronósticos meteorológicos
                    precisos, alertas personalizadas y datos históricos de lluvia, temperatura, humedad y viento.
                  </p>
                </div>
              </div>

              {/* 3. Detecta plagas y enfermedades */}
              <div className="dual-column-container" style={{
                display: 'grid',
                gridTemplateColumns: '1fr 1fr',
                gap: '2rem',
                alignItems: 'center',
                marginBottom: '3rem',
                padding: '2rem 0'
              }}>
                <div className="info-box" style={{
                  backgroundColor: 'rgba(254, 242, 242, 0.5)',
                  padding: '2rem',
                  borderRadius: '15px',
                  border: '1px solid #fecaca'
                }}>
                  <h2 style={{
                    fontSize: '2rem',
                    fontWeight: 'bold',
                    color: '#111827',
                    marginBottom: '1rem',
                    fontStyle: 'italic'
                  }}>
                    Detecta plagas y enfermedades
                  </h2>
                  <p style={{
                    fontSize: '1rem',
                    color: '#374151',
                    lineHeight: '1.7'
                  }}>
                    Gracias a la integración de sensores, imágenes satelitales e inteligencia artificial, nuestra
                    plataforma puede ayudarte a detectar signos tempranos de plagas o enfermedades. Recibirás
                    alertas automáticas y recomendaciones de manejo integrado, lo que reduce el uso de pesticidas y
                    protege tus cultivos de manera sostenible.
                  </p>
                </div>

                <div className="image-container">
                  <img
                    src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=500&h=300&fit=crop"
                    alt="Detección de plagas"
                    style={{
                      width: '100%',
                      height: '300px',
                      objectFit: 'cover',
                      borderRadius: '15px',
                      border: '1px solid #e5e7eb',
                      boxShadow: '0 4px 12px rgba(0,0,0,0.1)'
                    }}
                  />
                </div>
              </div>

              {/* 4. Toma decisiones basadas en datos */}
              <div className="dual-column-container" style={{
                display: 'grid',
                gridTemplateColumns: '1fr 1fr',
                gap: '2rem',
                alignItems: 'center',
                marginBottom: '3rem',
                padding: '2rem 0'
              }}>
                <div className="image-container">
                  <img
                    src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=500&h=300&fit=crop"
                    alt="Análisis de datos agrícolas"
                    style={{
                      width: '100%',
                      height: '300px',
                      objectFit: 'cover',
                      borderRadius: '15px',
                      border: '1px solid #e5e7eb',
                      boxShadow: '0 4px 12px rgba(0,0,0,0.1)'
                    }}
                  />
                </div>

                <div className="info-box" style={{
                  backgroundColor: 'rgba(245, 245, 245, 0.5)',
                  padding: '2rem',
                  borderRadius: '15px',
                  border: '1px solid #d1d5db'
                }}>
                  <h2 style={{
                    fontSize: '2rem',
                    fontWeight: 'bold',
                    color: '#111827',
                    marginBottom: '1rem',
                    fontStyle: 'italic'
                  }}>
                    Toma decisiones basadas en datos
                  </h2>
                  <p style={{
                    fontSize: '1rem',
                    color: '#374151',
                    lineHeight: '1.7'
                  }}>
                    El asistente recopila, analiza y presenta información clave para que puedas tomar
                    decisiones basadas en evidencia, no en suposiciones. A través de gráficos, reportes y
                    paneles de control intuitivos, tendrás una visión clara de lo que sucede en tus campos,
                    facilitando la gestión de recursos y la mejora continua.
                  </p>
                </div>
              </div>
            </div>

            {/* Call to Action Final */}
            <div className="cta-section" style={{
              background: 'linear-gradient(135deg, #f0fdf4, #eff6ff)',
              margin: '3rem 2rem',
              borderRadius: '20px',
              padding: '3rem 2rem',
              textAlign: 'center',
              boxShadow: '0 8px 32px rgba(0,0,0,0.1)'
            }}>
              <h2 style={{
                fontSize: '2.5rem',
                fontWeight: 'bold',
                color: '#111827',
                marginBottom: '1rem'
              }}>
                Cultiva con inteligencia, siembra con confianza
              </h2>
              <p style={{
                fontSize: '1.1rem',
                color: '#374151',
                marginBottom: '1rem',
                maxWidth: '800px',
                marginLeft: 'auto',
                marginRight: 'auto',
                lineHeight: '1.6'
              }}>
                Nuestra misión es acompañarte en cada etapa del proceso agrícola, brindándote herramientas
                modernas, confiables y fáciles de usar. Con tu Asistente Inteligente para la Gestión Agrícola, podrás
                enfrentar los retos del campo con mayor preparación, reducir pérdidas y aumentar la rentabilidad de tus
                cosechas.
              </p>
              <p style={{
                fontSize: '1rem',
                color: '#16a34a',
                marginBottom: '2rem',
                fontWeight: '600'
              }}>
                ¡Empieza hoy a transformar tu manera de trabajar el campo!
              </p>
            </div>
          </div>
        );
      case 'acerca':
        return (
          <>
            <div className="hero-section">
              <h2 className="hero-title" style={{ textAlign: 'left', paddingLeft: '2rem' }}>
                Acerca de <span className="highlight">AGRIFARM</span> !
              </h2>

              <div className="hero-content">
                <div className="hero-text-with-image">
                  <div className="about-image-container">
                    <img
                      src={aboutImage}
                      alt="Agricultores peruanos usando tecnología en el campo"
                      className="about-image"
                    />
                  </div>

                  <div className="hero-text">
                    <div className="info-box info-box-1">
                      <p>
                        <strong>AGRIFARM</strong> una plataforma tecnológica creada para revolucionar la forma en que los agricultores de Puno gestionan sus cultivos. Nace como una solución innovadora frente a los desafíos que enfrentan día a día los productores del altiplano peruano: condiciones climáticas impredecibles, falta de acceso a información en tiempo real y escasa asistencia técnica digitalizada.
                      </p>
                    </div>

                    <div className="info-box info-box-2">
                      <p>
                        Nuestra misión es empoderar a los agricultores locales brindándoles herramientas tecnológicas accesibles y fáciles de usar, que les permitan tomar decisiones inteligentes, reducir pérdidas y aumentar el rendimiento de sus cosechas.
                      </p>
                    </div>
                  </div>
                </div>

                <div className="dual-column-container">
                  <div className="green-description-box">
                    <p>
                      A través de AGRIFARM, los usuarios pueden monitorear el estado de sus cultivos, detectar a tiempo plagas o enfermedades, revisar alertas climáticas, y acceder a informes personalizados. Todo desde su celular o computadora.
                    </p>
                  </div>
                  <div className="side-image-container">
                    <img
                      src={sideImage}
                      alt="Agricultor usando la app AGRIFARM en el campo"
                      className="side-image"
                    />
                  </div>
                </div>
              </div>
            </div>

            <div className="benefits-section">
              <div className="benefits-content">
                <div className="benefits-text">
                  <h3 className="section-title">
                    ¿Por qué <span className="highlight">AgriFarm</span>?
                  </h3>

                  <div className="benefits-list">
                    {benefits.map((benefit, index) => (
                      <div key={index} className="benefit-item">
                        <div className="benefit-bullet"></div>
                        <p>{benefit}</p>
                      </div>
                    ))}
                  </div>

                  <div className="team-info">
                    <p>
                      AGRIFARM fue desarrollado por un equipo de profesionales comprometidos con el desarrollo agrícola y tecnológico del Perú, combinando conocimientos en estadística, informática, agronomía e inteligencia artificial.
                    </p>
                  </div>
                </div>

                <div className="why-image-container">
                  <img
                    src={personImage}
                    alt="Persona explicando los beneficios de AgriFarm"
                    className="why-image"
                  />
                </div>
              </div>
            </div>
          </>
        );
      case 'servicios':
        return (
          <div className="tab-content">
            {/* Título Principal */}
            <div className="services-header" style={{
              textAlign: 'center',
              padding: '2rem 0',
              backgroundColor: 'white'
            }}>
              <h2 style={{
                fontSize: '3rem',
                fontWeight: 'bold',
                color: '#111827',
                marginBottom: '1rem'
              }}>
                Nuestros <span className="highlight">Servicios</span>
              </h2>
            </div>

            {/* Grid de Servicios */}
            <div className="services-container" style={{
              maxWidth: '1200px',
              margin: '0 auto',
              padding: '0 2rem 3rem'
            }}>
              <div className="services-grid" style={{
                display: 'grid',
                gridTemplateColumns: '1fr 1fr',
                gap: '3rem',
                alignItems: 'flex-start'
              }}>

                {/* Columna izquierda - Grid de servicios */}
                <div className="services-left">
                  <div style={{
                    display: 'grid',
                    gridTemplateColumns: '1fr 1fr',
                    gap: '2rem'
                  }}>
                    {/* Gestión de Cultivos */}
                    <div className="service-card" style={{
                      textAlign: 'center',
                      padding: '1.5rem',
                      borderRadius: '16px',
                      backgroundColor: 'rgba(255, 255, 255, 0.8)',
                      boxShadow: '0 4px 6px rgba(0, 0, 0, 0.1)',
                      transition: 'all 0.3s ease',
                      cursor: 'pointer',
                      border: '1px solid #e5e7eb'
                    }}>
                      <div style={{
                        width: '80px',
                        height: '80px',
                        margin: '0 auto 1rem',
                        backgroundColor: '#dcfce7',
                        borderRadius: '16px',
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center',
                        fontSize: '32px',
                        transition: 'transform 0.3s ease'
                      }}>
                        <FaLeaf size={32} color="#16a34a" />
                      </div>
                      <h3 style={{
                        fontSize: '1.125rem',
                        fontWeight: 'bold',
                        color: '#111827',
                        marginBottom: '0.5rem'
                      }}>
                        Gestión de Cultivos
                      </h3>
                      <p style={{
                        fontSize: '0.875rem',
                        color: '#6b7280',
                        lineHeight: '1.5'
                      }}>
                        Control completo del ciclo de vida de tus cultivos desde siembra hasta cosecha
                      </p>
                    </div>

                    {/* Monitoreo Climático */}
                    <div className="service-card" style={{
                      textAlign: 'center',
                      padding: '1.5rem',
                      borderRadius: '16px',
                      backgroundColor: 'rgba(255, 255, 255, 0.8)',
                      boxShadow: '0 4px 6px rgba(0, 0, 0, 0.1)',
                      transition: 'all 0.3s ease',
                      cursor: 'pointer',
                      border: '1px solid #e5e7eb'
                    }}>
                      <div style={{
                        width: '80px',
                        height: '80px',
                        margin: '0 auto 1rem',
                        backgroundColor: '#dbeafe',
                        borderRadius: '16px',
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center',
                        fontSize: '32px',
                        transition: 'transform 0.3s ease'
                      }}>
                        <FaCloudSun size={32} color="#3b82f6" />
                      </div>
                      <h3 style={{
                        fontSize: '1.125rem',
                        fontWeight: 'bold',
                        color: '#111827',
                        marginBottom: '0.5rem'
                      }}>
                        Monitoreo Climático
                      </h3>
                      <p style={{
                        fontSize: '0.875rem',
                        color: '#6b7280',
                        lineHeight: '1.5'
                      }}>
                        Datos meteorológicos precisos y alertas en tiempo real para tus campos
                      </p>
                    </div>

                    {/* Detección de Plagas */}
                    <div className="service-card" style={{
                      textAlign: 'center',
                      padding: '1.5rem',
                      borderRadius: '16px',
                      backgroundColor: 'rgba(255, 255, 255, 0.8)',
                      boxShadow: '0 4px 6px rgba(0, 0, 0, 0.1)',
                      transition: 'all 0.3s ease',
                      cursor: 'pointer',
                      border: '1px solid #e5e7eb'
                    }}>
                      <div style={{
                        width: '80px',
                        height: '80px',
                        margin: '0 auto 1rem',
                        backgroundColor: '#fecaca',
                        borderRadius: '16px',
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center',
                        fontSize: '32px',
                        transition: 'transform 0.3s ease'
                      }}>
                        <FaSearch size={32} color="#ef4444" />
                      </div>
                      <h3 style={{
                        fontSize: '1.125rem',
                        fontWeight: 'bold',
                        color: '#111827',
                        marginBottom: '0.5rem'
                      }}>
                        Detección de Plagas
                      </h3>
                      <p style={{
                        fontSize: '0.875rem',
                        color: '#6b7280',
                        lineHeight: '1.5'
                      }}>
                        Identificación temprana usando IA y recomendaciones de tratamiento
                      </p>
                    </div>

                    {/* Cálculo de Insumos */}
                    <div className="service-card" style={{
                      textAlign: 'center',
                      padding: '1.5rem',
                      borderRadius: '16px',
                      backgroundColor: 'rgba(255, 255, 255, 0.8)',
                      boxShadow: '0 4px 6px rgba(0, 0, 0, 0.1)',
                      transition: 'all 0.3s ease',
                      cursor: 'pointer',
                      border: '1px solid #e5e7eb'
                    }}>
                      <div style={{
                        width: '80px',
                        height: '80px',
                        margin: '0 auto 1rem',
                        backgroundColor: '#e9d5ff',
                        borderRadius: '16px',
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center',
                        fontSize: '32px',
                        transition: 'transform 0.3s ease'
                      }}>
                        <FaCalculator size={32} color="#8b5cf6" />
                      </div>
                      <h3 style={{
                        fontSize: '1.125rem',
                        fontWeight: 'bold',
                        color: '#111827',
                        marginBottom: '0.5rem'
                      }}>
                        Cálculo de Insumos
                      </h3>
                      <p style={{
                        fontSize: '0.875rem',
                        color: '#6b7280',
                        lineHeight: '1.5'
                      }}>
                        Optimización automática de fertilizantes y pesticidas
                      </p>
                    </div>

                    {/* Predicción de Cosechas */}
                    <div className="service-card" style={{
                      gridColumn: 'span 2',
                      textAlign: 'center',
                      padding: '1.5rem',
                      borderRadius: '16px',
                      backgroundColor: 'rgba(255, 255, 255, 0.8)',
                      boxShadow: '0 4px 6px rgba(0, 0, 0, 0.1)',
                      transition: 'all 0.3s ease',
                      cursor: 'pointer',
                      border: '1px solid #e5e7eb'
                    }}>
                      <div style={{
                        width: '80px',
                        height: '80px',
                        margin: '0 auto 1rem',
                        backgroundColor: '#fed7aa',
                        borderRadius: '16px',
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center',
                        fontSize: '32px',
                        transition: 'transform 0.3s ease'
                      }}>
                        <FaChartLine size={32} color="#f97316" />
                      </div>
                      <h3 style={{
                        fontSize: '1.125rem',
                        fontWeight: 'bold',
                        color: '#111827',
                        marginBottom: '0.5rem'
                      }}>
                        Predicción de Cosechas
                      </h3>
                      <p style={{
                        fontSize: '0.875rem',
                        color: '#6b7280',
                        lineHeight: '1.5',
                        maxWidth: '400px',
                        margin: '0 auto'
                      }}>
                        Modelos predictivos para estimar rendimientos y planificar la cosecha
                      </p>
                    </div>
                  </div>
                </div>

                {/* Columna derecha - Imagen principal */}
                <div className="services-right" style={{ position: 'relative' }}>
                  <div style={{
                    width: '100%',
                    height: '500px',
                    backgroundColor: '#f3f4f6',
                    borderRadius: '16px',
                    border: '1px solid #e5e7eb',
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'center',
                    position: 'relative',
                    overflow: 'hidden'
                  }}>
                    <img
                      src="https://www.fayerwayer.com/resizer/v2/BYLNUJCBMNG47FLJTZYECP6UEM.jpg?auth=a90eec6a13b520a44e911344355a50853b48a5be2f6d0684f8adac6f1fb621b9&width=800&height=547"
                      alt="Tractor agrícola"
                      style={{
                        width: '100%',
                        height: '100%',
                        objectFit: 'cover'
                      }}
                    />

                    {/* Overlays con datos */}
                    <div style={{
                      position: 'absolute',
                      top: '16px',
                      right: '16px',
                      backgroundColor: 'rgba(255,255,255,0.95)',
                      backdropFilter: 'blur(8px)',
                      borderRadius: '12px',
                      padding: '12px',
                      boxShadow: '0 4px 12px rgba(0,0,0,0.15)',
                      border: '1px solid rgba(255,255,255,0.3)'
                    }}>
                      <div style={{ textAlign: 'center' }}>
                        <div style={{
                          fontSize: '1.5rem',
                          fontWeight: 'bold',
                          color: '#22c55e'
                        }}>
                          98%
                        </div>
                        <div style={{
                          fontSize: '0.75rem',
                          color: '#6b7280'
                        }}>
                          Precisión
                        </div>
                      </div>
                    </div>

                    <div style={{
                      position: 'absolute',
                      bottom: '16px',
                      left: '16px',
                      backgroundColor: 'rgba(255,255,255,0.95)',
                      backdropFilter: 'blur(8px)',
                      borderRadius: '12px',
                      padding: '12px',
                      boxShadow: '0 4px 12px rgba(0,0,0,0.15)',
                      border: '1px solid rgba(255,255,255,0.3)'
                    }}>
                      <div style={{
                        display: 'flex',
                        alignItems: 'center',
                        gap: '8px'
                      }}>
                        <div style={{
                          width: '12px',
                          height: '12px',
                          backgroundColor: '#22c55e',
                          borderRadius: '50%'
                        }}></div>
                        <span style={{
                          fontSize: '0.875rem',
                          fontWeight: '500',
                          color: '#111827'
                        }}>
                          Sistema Activo
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {/* Call to Action */}
            <div className="services-cta" style={{
              backgroundColor: '#16a34a',
              margin: '2rem 0',
              borderRadius: '16px',
              padding: '4rem 2rem',
              textAlign: 'center'
            }}>
              <h2 style={{
                fontSize: '2.25rem',
                fontWeight: 'bold',
                color: 'white',
                marginBottom: '1.5rem'
              }}>
                ¿Listo para Revolucionar tu Agricultura?
              </h2>
              <p style={{
                fontSize: '1.25rem',
                color: 'rgba(255,255,255,0.9)',
                marginBottom: '2rem',
                maxWidth: '600px',
                margin: '0 auto 2rem'
              }}>
                Únete a miles de agricultores que ya están transformando sus operaciones con AgriFarm
              </p>
              <div style={{
                display: 'flex',
                flexDirection: 'column',
                gap: '1rem',
                alignItems: 'center'
              }}>
                <button style={{
                  backgroundColor: 'white',
                  color: '#16a34a',
                  padding: '1rem 2rem',
                  borderRadius: '12px',
                  border: 'none',
                  fontSize: '1.125rem',
                  fontWeight: '600',
                  cursor: 'pointer',
                  transition: 'all 0.3s ease',
                  boxShadow: '0 4px 6px rgba(0, 0, 0, 0.1)'
                }}>
                  Comenzar Prueba Gratuita →
                </button>
                <button style={{
                  backgroundColor: 'transparent',
                  color: 'white',
                  padding: '1rem 2rem',
                  border: '2px solid white',
                  borderRadius: '12px',
                  fontSize: '1.125rem',
                  fontWeight: '600',
                  cursor: 'pointer',
                  transition: 'all 0.3s ease'
                }}>
                  Solicitar Demo
                </button>
              </div>
            </div>
          </div>
        );

      case 'contactos':
        return (
          <div className="tab-content contact-tab" style={{
            backgroundImage: `url(${fondoContacto})`,
            backgroundSize: 'cover',
            backgroundPosition: 'center',
            backgroundAttachment: 'fixed',
            minHeight: 'calc(100vh - 120px)',
            padding: '2rem 0',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'center'
          }}>
            <div className="contact-container" style={{
              backgroundColor: 'rgba(255, 255, 255, 0.9)',
              backdropFilter: 'blur(5px)',
              borderRadius: '15px',
              padding: '2.5rem',
              width: '90%',
              maxWidth: '800px',
              boxShadow: '0 8px 32px rgba(0, 0, 0, 0.2)',
              border: '1px solid rgba(255, 255, 255, 0.3)'
            }}>
              <div className="contact-header" style={{ textAlign: 'center', marginBottom: '2rem' }}>
                <h2 style={{ color: '#1e3a8a', fontSize: '2rem', marginBottom: '0.5rem' }}>Contactos</h2>
                <p className="contact-slogan" style={{
                  color: '#4b5563',
                  fontSize: '1.1rem',
                  fontStyle: 'italic'
                }}>
                  "Estamos aquí para ayudarte en tu camino agrícola"
                </p>
              </div>

              <form className="contact-form" style={{
                backgroundColor: 'rgba(224, 242, 254, 0.7)',
                borderRadius: '10px',
                padding: '2rem',
                border: '1px solid #bfdbfe'
              }}>
                {[
                  { id: 'name', label: 'Nombre', type: 'text', placeholder: 'Ingresa tu nombre completo' },
                  { id: 'email', label: 'Correo Electrónico', type: 'email', placeholder: 'ejemplo@correo.com' },
                  { id: 'subject', label: 'Asunto', type: 'text', placeholder: 'Motivo de tu consulta' }
                ].map((field) => (
                  <div key={field.id} style={{ marginBottom: '1.5rem' }}>
                    <label htmlFor={field.id} style={{
                      display: 'block',
                      marginBottom: '0.5rem',
                      color: '#1e3a8a',
                      fontWeight: '500'
                    }}>
                      {field.label}:
                    </label>
                    <input
                      type={field.type}
                      id={field.id}
                      placeholder={field.placeholder}
                      style={{
                        width: '100%',
                        padding: '0.75rem',
                        borderRadius: '6px',
                        border: '1px solid #93c5fd',
                        backgroundColor: 'rgba(255, 255, 255, 0.8)',
                        fontSize: '1rem'
                      }}
                    />
                  </div>
                ))}

                <div style={{ marginBottom: '2rem' }}>
                  <label htmlFor="message" style={{
                    display: 'block',
                    marginBottom: '0.5rem',
                    color: '#1e3a8a',
                    fontWeight: '500'
                  }}>
                    Mensaje:
                  </label>
                  <textarea
                    id="message"
                    rows="5"
                    placeholder="Describe tu consulta o solicitud..."
                    style={{
                      width: '100%',
                      padding: '0.75rem',
                      borderRadius: '6px',
                      border: '1px solid #93c5fd',
                      backgroundColor: 'rgba(255, 255, 255, 0.8)',
                      fontSize: '1rem',
                      resize: 'vertical',
                      minHeight: '120px'
                    }}
                  ></textarea>
                </div>

                <button type="submit" style={{
                  backgroundColor: '#2563eb',
                  color: 'white',
                  border: 'none',
                  padding: '0.75rem 1.5rem',
                  borderRadius: '6px',
                  fontSize: '1rem',
                  fontWeight: '500',
                  cursor: 'pointer',
                  width: '100%',
                  transition: 'all 0.3s ease',
                  boxShadow: '0 4px 6px rgba(37, 99, 235, 0.2)'
                }}>
                  Enviar
                </button>
              </form>
            </div>
          </div>
        );

      default:
        return null;
    }
  };

  return (
    <div className="app">
      <header className="header">
        <div className="container">
          <div className="header-content">
            <div className="logo">
              <img
                src={logoImage}
                alt="AGRIFARM "
                className="logo-image"
                onClick={() => setActiveTab('inicio')}
                style={{
                  height: 'auto',
                  width: '260px',
                }}
              />
            </div>

            <nav className="navigation">
              {navItems.map((item) => (
                <button
                  key={item.id}
                  onClick={() => setActiveTab(item.id)}
                  className={`nav-button ${activeTab === item.id ? 'active' : ''}`}
                >
                  {item.label}
                </button>
              ))}
            </nav>

            <button
              type="button"
              className="login-button"
              onClick={() => window.location.href = 'http://localhost/green-auth/phploge/login.php'}
            >
              Acceder
            </button>



          </div>
        </div>
      </header>

      <main className="main-content">
        {renderTabContent()}
      </main>

      <footer className="footer">
        <div className="container">
          <div className="footer-content">
            <div className="footer-logo">
              <Leaf size={24} />
              <span>AGRIFARM</span>
            </div>
            <p>© 2025 AGRIFARM. Transformando la agricultura peruana con tecnología.</p>
          </div>
        </div>
      </footer>
    </div>
  );
};

export default App;