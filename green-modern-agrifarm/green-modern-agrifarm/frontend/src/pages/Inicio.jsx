import React, { useState, useEffect } from 'react';

const Inicio = () => {
  const [currentSlide, setCurrentSlide] = useState(0);
  
  const heroImages = [
    "https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=800&h=400&fit=crop",
    "https://images.unsplash.com/photo-1500595046743-cd271d694d30?w=800&h=400&fit=crop",
    "https://www.rocalba.es/blog/wp-content/uploads/cultivos-cosecha-rapida-950x500.jpg"
  ];

  useEffect(() => {
    const interval = setInterval(() => {
      setCurrentSlide((prev) => (prev + 1) % heroImages.length);
    }, 5000);
    return () => clearInterval(interval);
  }, []);

  const nextSlide = () => {
    setCurrentSlide((prev) => (prev + 1) % heroImages.length);
  };

  const prevSlide = () => {
    setCurrentSlide((prev) => (prev - 1 + heroImages.length) % heroImages.length);
  };

  return (
    <div style={{
      minHeight: '100vh',
      backgroundColor: 'white',
      fontFamily: 'Arial, sans-serif'
    }}>
      {/* Header */}
      <header style={{
        backgroundColor: 'white',
        borderBottom: '2px solid #e5e7eb',
        padding: '16px 0',
        boxShadow: '0 1px 3px rgba(0,0,0,0.1)'
      }}>
        <div style={{
          maxWidth: '1200px',
          margin: '0 auto',
          padding: '0 20px',
          display: 'flex',
          justifyContent: 'space-between',
          alignItems: 'center'
        }}>
          {/* Logo */}
          <div style={{ display: 'flex', alignItems: 'center', gap: '12px' }}>
            <div style={{
              width: '64px',
              height: '64px',
              background: 'linear-gradient(135deg, #22c55e, #16a34a)',
              borderRadius: '12px',
              display: 'flex',
              alignItems: 'center',
              justifyContent: 'center',
              fontSize: '24px'
            }}>
              🌱
            </div>
            <div>
              <h1 style={{
                fontSize: '24px',
                fontWeight: 'bold',
                color: '#16a34a',
                margin: '0'
              }}>
                AgriFarm
              </h1>
              <p style={{
                fontSize: '14px',
                color: '#6b7280',
                margin: '0'
              }}>
                Smart Agriculture
              </p>
            </div>
          </div>
          
          {/* Navigation */}
          <nav style={{
            backgroundColor: '#f3f4f6',
            padding: '4px',
            borderRadius: '50px',
            display: 'flex',
            gap: '2px'
          }}>
            <button style={{
              backgroundColor: '#3b82f6',
              color: 'white',
              padding: '10px 24px',
              borderRadius: '50px',
              border: 'none',
              fontSize: '14px',
              fontWeight: '500',
              cursor: 'pointer'
            }}>
              Inicio
            </button>
            <button style={{
              backgroundColor: 'transparent',
              color: '#4b5563',
              padding: '10px 24px',
              borderRadius: '50px',
              border: 'none',
              fontSize: '14px',
              fontWeight: '500',
              cursor: 'pointer'
            }}>
              Acerca de
            </button>
            <button style={{
              backgroundColor: 'transparent',
              color: '#4b5563',
              padding: '10px 24px',
              borderRadius: '50px',
              border: 'none',
              fontSize: '14px',
              fontWeight: '500',
              cursor: 'pointer'
            }}>
              Servicios
            </button>
            <button style={{
              backgroundColor: 'transparent',
              color: '#4b5563',
              padding: '10px 24px',
              borderRadius: '50px',
              border: 'none',
              fontSize: '14px',
              fontWeight: '500',
              cursor: 'pointer'
            }}>
              Contactos
            </button>
          </nav>
          
          {/* Botón Acceder */}
          <button style={{
            backgroundColor: 'white',
            border: '2px solid #d1d5db',
            color: '#4b5563',
            padding: '10px 24px',
            borderRadius: '50px',
            fontSize: '14px',
            fontWeight: '500',
            cursor: 'pointer',
            marginLeft: '16px'
          }}>
            Acceder
          </button>
        </div>
      </header>

      {/* Título Principal */}
      <section style={{
        backgroundColor: 'white',
        padding: '32px 0',
        textAlign: 'center'
      }}>
        <div style={{
          maxWidth: '1200px',
          margin: '0 auto',
          padding: '0 20px'
        }}>
          <h1 style={{
            fontSize: '48px',
            fontWeight: 'bold',
            color: '#111827',
            lineHeight: '1.2',
            marginBottom: '24px'
          }}>
            "¡Bienvenido a AgriFarm, tu Asistente Inteligente para<br />
            la Gestión Agrícola en Puno!"
          </h1>
          <p style={{
            fontSize: '18px',
            color: '#374151',
            lineHeight: '1.7',
            maxWidth: '900px',
            margin: '0 auto 32px'
          }}>
            En el mundo agrícola actual, la tecnología se ha convertido en una herramienta 
            fundamental para mejorar la productividad, cuidar el medio ambiente y asegurar cosechas 
            exitosas. Por eso, hemos creado tu Asistente Inteligente para la Gestión Agrícola, una 
            plataforma digital diseñada especialmente para agricultores, cooperativas y técnicos del 
            campo que buscan llevar sus cultivos al siguiente nivel.
          </p>

          {/* Carrusel */}
          <div style={{
            maxWidth: '800px',
            margin: '0 auto',
            position: 'relative'
          }}>
            <div style={{
              height: '320px',
              borderRadius: '16px',
              overflow: 'hidden',
              border: '1px solid #e5e7eb',
              position: 'relative'
            }}>
              <img 
                src={heroImages[currentSlide]} 
                alt="Agricultor trabajando"
                style={{
                  width: '100%',
                  height: '100%',
                  objectFit: 'cover'
                }}
              />
              
              {/* Controles del carrusel */}
              <button 
                onClick={prevSlide}
                style={{
                  position: 'absolute',
                  left: '16px',
                  top: '50%',
                  transform: 'translateY(-50%)',
                  backgroundColor: '#3b82f6',
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
                  fontSize: '20px'
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
                  backgroundColor: '#3b82f6',
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
                  fontSize: '20px'
                }}
              >
                ›
              </button>
            </div>
            
            {/* Indicadores de puntos */}
            <div style={{
              display: 'flex',
              justifyContent: 'center',
              gap: '8px',
              marginTop: '16px'
            }}>
              {heroImages.map((_, index) => (
                <button
                  key={index}
                  onClick={() => setCurrentSlide(index)}
                  style={{
                    width: '12px',
                    height: '12px',
                    borderRadius: '50%',
                    border: 'none',
                    cursor: 'pointer',
                    backgroundColor: index === currentSlide ? '#22c55e' : '#d1d5db'
                  }}
                />
              ))}
            </div>
          </div>
        </div>
      </section>

      {/* Línea divisora verde */}
      <div style={{
        maxWidth: '1200px',
        margin: '0 auto',
        padding: '0 20px'
      }}>
        <hr style={{
          border: 'none',
          borderTop: '2px solid #22c55e',
          margin: '32px 0'
        }} />
      </div>

      {/* Secciones de contenido */}
      <div style={{
        maxWidth: '1200px',
        margin: '0 auto',
        padding: '0 20px'
      }}>
        {/* Optimización de cultivos */}
        <section style={{
          display: 'grid',
          gridTemplateColumns: '1fr 1fr',
          gap: '32px',
          alignItems: 'flex-start',
          marginBottom: '48px'
        }}>
          <div>
            <h2 style={{
              fontSize: '32px',
              fontWeight: 'bold',
              color: '#111827',
              marginBottom: '16px',
              fontStyle: 'italic'
            }}>
              Optimiza tus cultivos de manera eficiente
            </h2>
            <p style={{
              fontSize: '16px',
              color: '#374151',
              lineHeight: '1.7',
              marginBottom: '24px'
            }}>
              Nuestro sistema te permite llevar un control detallado de cada una de tus 
              parcelas. Desde el tipo de cultivo, la fase de crecimiento, hasta el uso de 
              fertilizantes y riego.
            </p>
            
            {/* Mini gráfico mundial */}
            <div style={{
              position: 'relative',
              width: '192px',
              height: '128px',
              marginBottom: '16px'
            }}>
              <div style={{
                width: '100%',
                height: '100%',
                background: 'linear-gradient(135deg, #dcfce7, #bfdbfe, #dcfce7)',
                borderRadius: '12px',
                position: 'relative',
                overflow: 'hidden'
              }}>
                <div style={{
                  position: 'absolute',
                  top: '30%',
                  left: '15%',
                  width: '70%',
                  height: '25%',
                  backgroundColor: '#22c55e',
                  borderRadius: '8px',
                  opacity: '0.7'
                }}></div>
                <div style={{
                  position: 'absolute',
                  top: '55%',
                  left: '25%',
                  width: '50%',
                  height: '30%',
                  backgroundColor: '#22c55e',
                  borderRadius: '8px',
                  opacity: '0.8'
                }}></div>
                <div style={{
                  position: 'absolute',
                  top: '42%',
                  left: '35%',
                  width: '6px',
                  height: '6px',
                  backgroundColor: '#dc2626',
                  borderRadius: '50%'
                }}></div>
                <div style={{
                  position: 'absolute',
                  top: '52%',
                  left: '55%',
                  width: '6px',
                  height: '6px',
                  backgroundColor: '#dc2626',
                  borderRadius: '50%'
                }}></div>
                <div style={{
                  position: 'absolute',
                  top: '58%',
                  left: '75%',
                  width: '6px',
                  height: '6px',
                  backgroundColor: '#dc2626',
                  borderRadius: '50%'
                }}></div>
              </div>
            </div>
          </div>
          
          <div>
            <img 
              src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=500&h=300&fit=crop"
              alt="Cultivos verdes"
              style={{
                width: '100%',
                height: '256px',
                objectFit: 'cover',
                borderRadius: '12px',
                border: '1px solid #e5e7eb'
              }}
            />
          </div>
        </section>

        {/* Monitoreo del clima */}
        <section style={{
          display: 'grid',
          gridTemplateColumns: '1fr 1fr',
          gap: '32px',
          alignItems: 'flex-start',
          marginBottom: '48px'
        }}>
          <div>
            <img 
              src="https://images.unsplash.com/photo-1464207687429-7505649dae38?w=500&h=300&fit=crop"
              alt="Monitoreo climático"
              style={{
                width: '100%',
                height: '256px',
                objectFit: 'cover',
                borderRadius: '12px',
                border: '1px solid #e5e7eb'
              }}
            />
          </div>
          
          <div>
            <h2 style={{
              fontSize: '32px',
              fontWeight: 'bold',
              color: '#111827',
              marginBottom: '16px',
              fontStyle: 'italic'
            }}>
              Monitorea el clima en tiempo real
            </h2>
            <p style={{
              fontSize: '16px',
              color: '#374151',
              lineHeight: '1.7',
              marginBottom: '24px'
            }}>
              El clima es un factor clave en la agricultura, y tomar decisiones sin datos confiables puede ser 
              costoso. Con nuestro asistente inteligente, tendrás acceso a pronósticos meteorológicos 
              precisos, alertas personalizadas y datos históricos de lluvia, temperatura, humedad y viento.
            </p>
          </div>
        </section>
      </div>

      {/* Call to Action */}
      <section style={{
        background: 'linear-gradient(135deg, #f0fdf4, #eff6ff)',
        margin: '0 20px 32px',
        borderRadius: '16px',
        padding: '48px 32px',
        textAlign: 'center'
      }}>
        <h2 style={{
          fontSize: '36px',
          fontWeight: 'bold',
          color: '#111827',
          marginBottom: '16px'
        }}>
          Cultiva con inteligencia, siembra con confianza
        </h2>
        <p style={{
          fontSize: '18px',
          color: '#374151',
          marginBottom: '16px',
          maxWidth: '600px',
          marginLeft: 'auto',
          marginRight: 'auto'
        }}>
          Nuestro asistente puede acompañarte en cada paso del proceso agrícola, brindándote herramientas 
          modernas, confiables y fáciles de usar.
        </p>
        <p style={{
          fontSize: '14px',
          color: '#6b7280',
          marginBottom: '32px'
        }}>
          ¡Empieza hoy a transformar tu manera de trabajar el campo!
        </p>
        
        <div style={{
          display: 'flex',
          flexDirection: 'column',
          gap: '16px',
          alignItems: 'center'
        }}>
          <button style={{
            backgroundColor: '#16a34a',
            color: 'white',
            padding: '12px 32px',
            borderRadius: '12px',
            border: 'none',
            fontSize: '16px',
            fontWeight: '500',
            cursor: 'pointer'
          }}>
            Comenzar Ahora →
          </button>
          <button style={{
            backgroundColor: 'transparent',
            color: '#16a34a',
            padding: '12px 32px',
            border: '2px solid #16a34a',
            borderRadius: '12px',
            fontSize: '16px',
            fontWeight: '500',
            cursor: 'pointer'
          }}>
            Ver Demostración
          </button>
        </div>
      </section>
    </div>
  );
};

export default Inicio;