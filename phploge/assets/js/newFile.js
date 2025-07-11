`;

// Agregar estilos al documento
const styleSheet = document.createElement('style');
styleSheet.textContent = additionalStyles;
document.head.appendChild(styleSheet);

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    window.asesoriaManager = new AsesoriaManager();
});

// Exportar para uso en otros archivos
window.AsesoriaManager = AsesoriaManager;`;
