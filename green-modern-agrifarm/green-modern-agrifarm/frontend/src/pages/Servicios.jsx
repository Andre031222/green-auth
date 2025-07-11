import React from 'react';
import { Link } from 'react-router-dom';

const Servicios = () => {
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
            <Link to="/" style={{
              backgroundColor: 'transparent',
              color: '#4b5563',
              padding: '10px 24px',
              borderRadius: '50px',
              textDecoration: 'none',
              fontSize: '14px',
              fontWeight: '500'
            }}>
              Inicio
            </Link>
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
              backgroundColor: '#3b82f6',
              color: 'white',
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
            Nuestros Servicios
          </h1>
        </div>
      </section>

      {/* Grid de Servicios */}
      <section style={{
        maxWidth: '1200px',
        margin: '0 auto',
        padding: '0 20px 48px'
      }}>
        <div style={{
          display: 'grid',
          gridTemplateColumns: '1fr 1fr',
          gap: '48px',
          alignItems: 'flex-start'
        }}>
          
          {/* Columna izquierda - Grid de servicios */}
          <div>
            <div style={{
              display: 'grid',
              gridTemplateColumns: '1fr 1fr',
              gap: '32px'
            }}>
              {/* Gestión de Cultivos */}
              <div style={{
                textAlign: 'center',
                cursor: 'pointer',
                transition: 'transform 0.3s ease'
              }}>
                <div style={{
                  width: '80px',
                  height: '80px',
                  margin: '0 auto 16px',
                  backgroundColor: '#dcfce7',
                  borderRadius: '16px',
                  display: 'flex',
                  alignItems: 'center',
                  justifyContent: 'center',
                  fontSize: '32px'
                }}>
                  🌱
                </div>
                <h3 style={{
                  fontSize: '18px',
                  fontWeight: 'bold',
                  color: '#111827',
                  marginBottom: '8px'
                }}>
                  Gestión de Cultivos
                </h3>
                <p style={{
                  fontSize: '14px',
                  color: '#6b7280',
                  lineHeight: '1.5'
                }}>
                  Control completo del ciclo de vida de tus cultivos desde siembra hasta cosecha
                </p>
              </div>

              {/* Monitoreo Climático */}
              <div style={{
                textAlign: 'center',
                cursor: 'pointer',
                transition: 'transform 0.3s ease'
              }}>
                <div style={{
                  width: '80px',
                  height: '80px',
                  margin: '0 auto 16px',
                  backgroundColor: '#dbeafe',
                  borderRadius: '16px',
                  display: 'flex',
                  alignItems: 'center',
                  justifyContent: 'center',
                  fontSize: '32px'
                }}>
                  🌤️
                </div>
                <h3 style={{
                  fontSize: '18px',
                  fontWeight: 'bold',
                  color: '#111827',
                  marginBottom: '8px'
                }}>
                  Monitoreo Climático
                </h3>
                <p style={{
                  fontSize: '14px',
                  color: '#6b7280',
                  lineHeight: '1.5'
                }}>
                  Datos meteorológicos precisos y alertas en tiempo real para tus campos
                </p>
              </div>

              {/* Detección de Plagas */}
              <div style={{
                textAlign: 'center',
                cursor: 'pointer',
                transition: 'transform 0.3s ease'
              }}>
                <div style={{
                  width: '80px',
                  height: '80px',
                  margin: '0 auto 16px',
                  backgroundColor: '#fecaca',
                  borderRadius: '16px',
                  display: 'flex',
                  alignItems: 'center',
                  justifyContent: 'center',
                  fontSize: '32px'
                }}>
                  🔍
                </div>
                <h3 style={{
                  fontSize: '18px',
                  fontWeight: 'bold',
                  color: '#111827',
                  marginBottom: '8px'
                }}>
                  Detección de Plagas
                </h3>
                <p style={{
                  fontSize: '14px',
                  color: '#6b7280',
                  lineHeight: '1.5'
                }}>
                  Identificación temprana usando IA y recomendaciones de tratamiento
                </p>
              </div>

              {/* Cálculo de Insumos */}
              <div style={{
                textAlign: 'center',
                cursor: 'pointer',
                transition: 'transform 0.3s ease'
              }}>
                <div style={{
                  width: '80px',
                  height: '80px',
                  margin: '0 auto 16px',
                  backgroundColor: '#e9d5ff',
                  borderRadius: '16px',
                  display: 'flex',
                  alignItems: 'center',
                  justifyContent: 'center',
                  fontSize: '32px'
                }}>
                  🧮
                </div>
                <h3 style={{
                  fontSize: '18px',
                  fontWeight: 'bold',
                  color: '#111827',
                  marginBottom: '8px'
                }}>
                  Cálculo de Insumos
                </h3>
                <p style={{
                  fontSize: '14px',
                  color: '#6b7280',
                  lineHeight: '1.5'
                }}>
                  Optimización automática de fertilizantes y pesticidas
                </p>
              </div>

              {/* Predicción de Cosechas */}
              <div style={{
                gridColumn: 'span 2',
                textAlign: 'center',
                cursor: 'pointer',
                transition: 'transform 0.3s ease'
              }}>
                <div style={{
                  width: '80px',
                  height: '80px',
                  margin: '0 auto 16px',
                  backgroundColor: '#fed7aa',
                  borderRadius: '16px',
                  display: 'flex',
                  alignItems: 'center',
                  justifyContent: 'center',
                  fontSize: '32px'
                }}>
                  📈
                </div>
                <h3 style={{
                  fontSize: '18px',
                  fontWeight: 'bold',
                  color: '#111827',
                  marginBottom: '8px'
                }}>
                  Predicción de Cosechas
                </h3>
                <p style={{
                  fontSize: '14px',
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
          <div style={{ position: 'relative' }}>
            <img 
              src="https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?w=500&h=600&fit=crop"
              alt="Agricultor con tecnología AR"
              style={{
                width: '100%',
                height: '500px',
                objectFit: 'cover',
                borderRadius: '16px',
                border: '1px solid #e5e7eb'
              }}
            />
            
            {/* Overlays con datos */}
            <div style={{
              position: 'absolute',
              top: '16px',
              right: '16px',
              backgroundColor: 'rgba(255,255,255,0.9)',
              backdropFilter: 'blur(8px)',
              borderRadius: '12px',
              padding: '12px',
              boxShadow: '0 4px 12px rgba(0,0,0,0.15)'
            }}>
              <div style={{ textAlign: 'center' }}>
                <div style={{
                  fontSize: '24px',
                  fontWeight: 'bold',
                  color: '#22c55e'
                }}>
                  98%
                </div>
                <div style={{
                  fontSize: '12px',
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
              backgroundColor: 'rgba(255,255,255,0.9)',
              backdropFilter: 'blur(8px)',
              borderRadius: '12px',
              padding: '12px',
              boxShadow: '0 4px 12px rgba(0,0,0,0.15)'
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
                  fontSize: '14px',
                  fontWeight: '500',
                  color: '#111827'
                }}>
                  Sistema Activo
                </span>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Call to Action */}
      <section style={{
        backgroundColor: '#16a34a',
        padding: '64px 0'
      }}>
        <div style={{
          maxWidth: '1200px',
          margin: '0 auto',
          padding: '0 20px',
          textAlign: 'center'
        }}>
          <h2 style={{
            fontSize: '36px',
            fontWeight: 'bold',
            color: 'white',
            marginBottom: '24px'
          }}>
            ¿Listo para Revolucionar tu Agricultura?
          </h2>
          <p style={{
            fontSize: '20px',
            color: 'rgba(255,255,255,0.9)',
            marginBottom: '32px',
            maxWidth: '600px',
            margin: '0 auto 32px'
          }}>
            Únete a miles de agricultores que ya están transformando sus operaciones con AgriFarm
          </p>
          <div style={{
            display: 'flex',
            flexDirection: 'column',
            gap: '16px',
            alignItems: 'center'
          }}>
            <button style={{
              backgroundColor: 'white',
              color: '#16a34a',
              padding: '16px 32px',
              borderRadius: '12px',
              border: 'none',
              fontSize: '18px',
              fontWeight: '600',
              cursor: 'pointer'
            }}>
              Comenzar Prueba Gratuita →
            </button>
            <button style={{
              backgroundColor: 'transparent',
              color: 'white',
              padding: '16px 32px',
              border: '2px solid white',
              borderRadius: '12px',
              fontSize: '18px',
              fontWeight: '600',
              cursor: 'pointer'
            }}>
              Solicitar Demo
            </button>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer style={{
        backgroundColor: '#111827',
        color: 'white',
        padding: '48px 0'
      }}>
        <div style={{
          maxWidth: '1200px',
          margin: '0 auto',
          padding: '0 20px'
        }}>
          <div style={{
            display: 'grid',
            gridTemplateColumns: 'repeat(auto-fit, minmax(250px, 1fr))',
            gap: '32px'
          }}>
            <div>
              <div style={{
                display: 'flex',
                alignItems: 'center',
                gap: '8px',
                marginBottom: '16px'
              }}>
                <div style={{
                  width: '32px',
                  height: '32px',
                  backgroundColor: '#22c55e',
                  borderRadius: '8px',
                  display: 'flex',
                  alignItems: 'center',
                  justifyContent: 'center',
                  fontSize: '16px'
                }}>
                  🌱
                </div>
                <span style={{
                  fontSize: '18px',
                  fontWeight: 'bold'
                }}>
                  AgriFarm
                </span>
              </div>
              <p style={{
                color: '#9ca3af'
              }}>
                Tu asistente inteligente para la gestión agrícola moderna y sostenible.
              </p>
            </div>
            
            <div>
              <h4 style={{
                fontWeight: 'bold',
                marginBottom: '16px'
              }}>
                Servicios
              </h4>
              <div style={{
                display: 'flex',
                flexDirection: 'column',
                gap: '8px'
              }}>
                <a href="#" style={{
                  color: '#9ca3af',
                  textDecoration: 'none'
                }}>
                  Gestión de Cultivos
                </a>
                <a href="#" style={{
                  color: '#9ca3af',
                  textDecoration: 'none'
                }}>
                  Monitoreo Climático
                </a>
                <a href="#" style={{
                  color: '#9ca3af',
                  textDecoration: 'none'
                }}>
                  Detección de Plagas
                </a>
                <a href="#" style={{
                  color: '#9ca3af',
                  textDecoration: 'none'
                }}>
                  Cálculo de Insumos
                </a>
              </div>
            </div>
            
            <div>
              <h4 style={{
                fontWeight: 'bold',
                marginBottom: '16px'
              }}>
                Empresa
              </h4>
              <div style={{
                display: 'flex',
                flexDirection: 'column',
                gap: '8px'
              }}>
                <a href="#" style={{
                  color: '#9ca3af',
                  textDecoration: 'none'
                }}>
                  Acerca de
                </a>
                <a href="#" style={{
                  color: '#9ca3af',
                  textDecoration: 'none'
                }}>
                  Equipo
                </a>
                <a href="#" style={{
                  color: '#9ca3af',
                  textDecoration: 'none'
                }}>
                  Carreras
                </a>
                <a href="#" style={{
                  color: '#9ca3af',
                  textDecoration: 'none'
                }}>
                  Blog
                </a>
              </div>
            </div>
            
            <div>
              <h4 style={{
                fontWeight: 'bold',
                marginBottom: '16px'
              }}>
                Soporte
              </h4>
              <div style={{
                display: 'flex',
                flexDirection: 'column',
                gap: '8px'
              }}>
                <a href="#" style={{
                  color: '#9ca3af',
                  textDecoration: 'none'
                }}>
                  Centro de Ayuda
                </a>
                <a href="#" style={{
                  color: '#9ca3af',
                  textDecoration: 'none'
                }}>
                  Contacto
                </a>
                <a href="#" style={{
                  color: '#9ca3af',
                  textDecoration: 'none'
                }}>
                  Documentación
                </a>
                <a href="#" style={{
                  color: '#9ca3af',
                  textDecoration: 'none'
                }}>
                  API
                </a>
              </div>
            </div>
          </div>
          
          <div style={{
            borderTop: '1px solid #374151',
            marginTop: '32px',
            paddingTop: '32px',
            textAlign: 'center',
            color: '#9ca3af'
          }}>
            <p>&copy; 2025 AgriFarm. Todos los derechos reservados.</p>
          </div>
        </div>
      </footer>
    </div>
  );
};

export default Servicios;