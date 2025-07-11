<?php
// Datos de ejemplo para el dashboard
$cultivos_activos = 12;
$alertas_dia = 3;
$temperatura = 26;
$alertas_pendientes = 3;

// Datos para el gráfico de rendimiento (últimos 7 días)
$rendimiento_datos = [65, 70, 68, 75, 78, 82, 85];
$labels_dias = ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];

// Página actual
$pagina_actual = isset($_GET['page']) ? $_GET['page'] : 'inicio';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Modern Agrifarm - Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #f0fdf4 100%);
            color: #1f2937;
            height: 100vh;
            overflow: hidden;
        }

        /* Layout principal con espacios fijos */
        .layout-container {
            display: grid;
            grid-template-areas: 
                "sidebar header"
                "sidebar content";
            grid-template-columns: 300px 1fr;
            grid-template-rows: 90px 1fr;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar Premium */
        .sidebar {
            grid-area: sidebar;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 4px 0 20px rgba(5, 150, 105, 0.1);
            padding: 0;
            overflow-y: auto;
            height: 100vh;
            position: relative;
            z-index: 50;
            border-right: 1px solid rgba(5, 150, 105, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            padding: 30px 25px;
            background: linear-gradient(135deg, #059669 0%, #065f46 100%);
            color: white;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
        }

        .logo::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .logo i {
            font-size: 2.5rem;
            margin-right: 15px;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
            position: relative;
            z-index: 2;
        }

        .logo h2 {
            font-size: 1.3rem;
            font-weight: 700;
            line-height: 1.2;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: relative;
            z-index: 2;
        }

        .nav-menu {
            list-style: none;
            padding: 0 15px;
        }

        .nav-item {
            margin-bottom: 8px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 16px 20px;
            color: #64748b;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 12px;
            font-weight: 500;
            font-size: 14px;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(135deg, #059669, #34d399);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .nav-link:hover, .nav-link.active {
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            color: #059669;
            transform: translateX(5px);
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.15);
        }

        .nav-link:hover::before, .nav-link.active::before {
            transform: scaleY(1);
        }

        .nav-link i {
            width: 20px;
            margin-right: 15px;
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .nav-link:hover i {
            transform: scale(1.1);
        }

        /* Header Premium */
        .header {
            grid-area: header;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            padding: 25px 40px;
            box-shadow: 0 4px 20px rgba(5, 150, 105, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
            position: relative;
            border-bottom: 1px solid rgba(5, 150, 105, 0.1);
        }

        .header h1 {
            color: #1f2937;
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #059669, #34d399);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .header-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #059669;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .header-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #059669, #34d399);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .header-icon:hover::before {
            opacity: 1;
        }

        .header-icon:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(5, 150, 105, 0.2);
        }

        .header-icon i {
            font-size: 1.2rem;
            position: relative;
            z-index: 2;
            transition: color 0.3s ease;
        }

        .header-icon:hover i {
            color: white;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            padding: 8px 15px;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
        }

        .user-menu:hover {
            background: linear-gradient(135deg, #059669, #34d399);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(5, 150, 105, 0.2);
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: linear-gradient(135deg, #059669, #34d399);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
        }

        /* Content Premium */
        .content {
            grid-area: content;
            padding: 40px;
            overflow-y: auto;
            height: calc(100vh - 90px);
            position: relative;
            background: transparent;
        }

        /* Inicio Page Styles */
        .hero-section {
            background: linear-gradient(135deg, #059669 0%, #065f46 100%);
            border-radius: 24px;
            padding: 50px 40px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(5, 150, 105, 0.2);
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 700px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            color: white;
            margin-bottom: 15px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .welcome-text {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
            font-weight: 300;
            line-height: 1.6;
        }

        .hero-actions {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 14px 28px;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: white;
            color: #059669;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: white;
            transform: translateY(-2px);
        }

        /* Stats Grid Premium */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(5, 150, 105, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #059669, #34d399);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            background: linear-gradient(135deg, #059669, #34d399);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 8px 20px rgba(5, 150, 105, 0.3);
        }

        .stat-content h3 {
            font-size: 14px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: #059669;
            margin-bottom: 10px;
            display: block;
        }

        .stat-change {
            font-size: 14px;
            color: #059669;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .stat-change.negative {
            color: #dc2626;
        }

        .stat-progress {
            height: 6px;
            background: #f3f4f6;
            border-radius: 3px;
            overflow: hidden;
            margin-top: 15px;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #059669, #34d399);
            border-radius: 3px;
            transition: width 1s ease;
        }

        .weather-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .weather-temp {
            font-size: 2.5rem;
            font-weight: 700;
            color: #059669;
        }

        .weather-details {
            color: #6b7280;
            font-size: 14px;
        }

        /* Chart Section Premium */
        .chart-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .chart-card, .alerts-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(5, 150, 105, 0.1);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .chart-title {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .chart-title i {
            color: #059669;
        }

        .chart-container {
            position: relative;
            height: 300px;
            margin-bottom: 20px;
        }

        .chart-bars {
            display: flex;
            align-items: end;
            height: 100%;
            gap: 20px;
            padding: 0 10px;
        }

        .chart-bar-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
        }

        .chart-bar {
            width: 100%;
            background: linear-gradient(135deg, #059669, #34d399);
            border-radius: 8px 8px 0 0;
            transition: all 0.6s ease;
            position: relative;
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.2);
        }

        .chart-bar:hover {
            background: linear-gradient(135deg, #047857, #10b981);
            transform: scale(1.05);
        }

        .chart-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            padding: 0 10px;
        }

        .chart-label {
            font-size: 12px;
            color: #6b7280;
            font-weight: 500;
        }

        /* Alerts Premium */
        .alerts-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .alerts-counter {
            background: #fef3c7;
            color: #f59e0b;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .alerts-summary {
            margin-bottom: 25px;
            padding: 20px;
            background: #f0fdf4;
            border-radius: 12px;
            border-left: 4px solid #059669;
        }

        .alerts-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .alert-item {
            display: flex;
            gap: 15px;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .alert-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .alert-item.priority-high {
            border-left: 4px solid #dc2626;
            background: #fef2f2;
        }

        .alert-item.priority-medium {
            border-left: 4px solid #f59e0b;
            background: #fffbeb;
        }

        .alert-item.priority-low {
            border-left: 4px solid #059669;
            background: #f0fdf4;
        }

        .alert-item .alert-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .priority-high .alert-icon {
            background: linear-gradient(135deg, #dc2626, #ef4444);
        }

        .priority-medium .alert-icon {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
        }

        .priority-low .alert-icon {
            background: linear-gradient(135deg, #059669, #34d399);
        }

        .alert-content {
            flex: 1;
        }

        .alert-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .alert-header h4 {
            font-size: 16px;
            font-weight: 600;
            color: #1f2937;
        }

        .alert-time {
            font-size: 12px;
            color: #6b7280;
        }

        .alert-content p {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .alert-actions {
            display: flex;
            gap: 10px;
        }

        .btn-alert {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-resolve {
            background: #059669;
            color: white;
        }

        .btn-resolve:hover {
            background: #047857;
            transform: translateY(-1px);
        }

        .btn-view {
            background: #f3f4f6;
            color: #6b7280;
        }

        .btn-view:hover {
            background: #e5e7eb;
            transform: translateY(-1px);
        }

        /* Tools Grid Premium */
        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 10px;
        }

        .section-header p {
            color: #6b7280;
            font-size: 18px;
        }

        .tools-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .tool-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(5, 150, 105, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .tool-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #059669, #34d399);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .tool-card:hover::before {
            transform: scaleX(1);
        }

        .tool-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .tool-icon {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            background: linear-gradient(135deg, #059669, #34d399);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 20px;
            box-shadow: 0 8px 20px rgba(5, 150, 105, 0.3);
        }

        .tool-content h3 {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .tool-content p {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .tool-stats {
            display: flex;
            gap: 15px;
            font-size: 12px;
            color: #059669;
            font-weight: 500;
        }

        .tool-status {
            margin-top: 10px;
        }

        .status-good {
            color: #059669;
            font-size: 12px;
            font-weight: 500;
        }

        .status-pending {
            color: #f59e0b;
            font-size: 12px;
            font-weight: 500;
        }

        /* Page Content Premium */
        .page-content {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(5, 150, 105, 0.1);
            margin-bottom: 30px;
        }

        .page-title {
            color: #1f2937;
            font-size: 2.5rem;
            margin-bottom: 15px;
            font-weight: 700;
            background: linear-gradient(135deg, #059669, #34d399);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 1.2rem;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .layout-container {
                grid-template-areas: 
                    "header"
                    "sidebar"
                    "content";
                grid-template-columns: 1fr;
                grid-template-rows: 90px auto 1fr;
                height: 100vh;
            }
            
            .sidebar {
                height: auto;
                position: static;
                overflow-y: visible;
            }
            
            .content {
                height: calc(100vh - 90px - 200px);
                padding: 20px;
            }
            
            .chart-section {
                grid-template-columns: 1fr;
            }
            
            .hero-title {
                font-size: 2.2rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .tools-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Scroll personalizado */
        .content::-webkit-scrollbar {
            width: 8px;
        }

        .content::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }

        .content::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #059669, #34d399);
            border-radius: 4px;
        }

        .content::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #047857, #10b981);
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #f8fafc;
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #059669, #34d399);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #047857, #10b981);
        }

        /* Animaciones adicionales */
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .animate-in {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="layout-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-leaf"></i>
                <h2>Green Modern<br>AGRIFARM</h2>
            </div>
            
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="?page=inicio" class="nav-link <?php echo $pagina_actual == 'inicio' ? 'active' : ''; ?>">
                        <i class="fas fa-home"></i>
                        Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=clima" class="nav-link <?php echo $pagina_actual == 'clima' ? 'active' : ''; ?>">
                        <i class="fas fa-cloud-sun"></i>
                        Clima
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=gestion-cultivo" class="nav-link <?php echo $pagina_actual == 'gestion-cultivo' ? 'active' : ''; ?>">
                        <i class="fas fa-seedling"></i>
                        Gestión de Cultivo
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=cultivo-insumos" class="nav-link <?php echo $pagina_actual == 'cultivo-insumos' ? 'active' : ''; ?>">
                        <i class="fas fa-calculator"></i>
                        Cultivo de Insumos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=deteccion-plagas" class="nav-link <?php echo $pagina_actual == 'deteccion-plagas' ? 'active' : ''; ?>">
                        <i class="fas fa-search-plus"></i>
                        Detección de plagas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=formacion" class="nav-link <?php echo $pagina_actual == 'formacion' ? 'active' : ''; ?>">
                        <i class="fas fa-graduation-cap"></i>
                        Formación Continua
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=asesoria" class="nav-link <?php echo $pagina_actual == 'asesoria' ? 'active' : ''; ?>">
                        <i class="fas fa-users"></i>
                        Asesoría
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=prediccion" class="nav-link <?php echo $pagina_actual == 'prediccion' ? 'active' : ''; ?>">
                        <i class="fas fa-chart-line"></i>
                        Predicción
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=compra-venta" class="nav-link <?php echo $pagina_actual == 'compra-venta' ? 'active' : ''; ?>">
                        <i class="fas fa-shopping-cart"></i>
                        Compra y Venta
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=informes" class="nav-link <?php echo $pagina_actual == 'informes' ? 'active' : ''; ?>">
                        <i class="fas fa-file-alt"></i>
                        Informes
                    </a>
                </li>
            </ul>
        </div>

        <!-- Header -->
        <div class="header">
            <h1>
                <?php
                $titulos = [
                    'inicio' => 'Bienvenido a Green Modern Agrifarm',
                    'clima' => 'Monitoreo Climático Avanzado',
                    'gestion-cultivo' => 'Gestión Inteligente de Cultivos',
                    'cultivo-insumos' => 'Optimización de Insumos',
                    'deteccion-plagas' => 'Detección IA de Plagas',
                    'formacion' => 'Centro de Aprendizaje',
                    'asesoria' => 'Asesoría Especializada',
                    'prediccion' => 'Análisis Predictivo',
                    'compra-venta' => 'Marketplace Agrícola',
                    'informes' => 'Informes Inteligentes'
                ];
                echo $titulos[$pagina_actual] ?? 'Green Modern Agrifarm';
                ?>
            </h1>
            <div class="header-actions">
                <div class="header-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="header-icon">
                    <i class="fas fa-question-circle"></i>
                </div>
                <div class="user-menu">
                    <div class="user-avatar">U</div>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <?php
            switch($pagina_actual) {
                case 'inicio':
                    if (file_exists('paginas/inicio.php')) {
                        include 'paginas/inicio.php';
                    } else {
                        ?>
                        <!-- Hero Section -->
                        <div class="hero-section">
                            <div class="hero-content">
                                <h1 class="hero-title">🌱 Green Modern Agrifarm</h1>
                                <p class="welcome-text">Tu plataforma de agricultura inteligente comienza aquí. Monitorea, analiza y optimiza tus cultivos con tecnología avanzada de última generación.</p>
                                <div class="hero-actions">
                                    <a href="?page=cultivo-insumos" class="btn btn-primary">
                                        <i class="fas fa-seedling"></i> Empezar Análisis
                                    </a>
                                    <a href="?page=informes" class="btn btn-secondary">
                                        <i class="fas fa-chart-line"></i> Ver Reportes
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Stats Grid -->
                        <div class="stats-grid">
                            <div class="stat-card">
                                <div class="stat-header">
                                    <div class="stat-icon">
                                        <i class="fas fa-seedling"></i>
                                    </div>
                                </div>
                                <div class="stat-content">
                                    <h3>Cultivos Activos</h3>
                                    <div class="stat-number"><?php echo $cultivos_activos; ?></div>
                                    <div class="stat-change">
                                        <i class="fas fa-arrow-up"></i>
                                        +2 este mes
                                    </div>
                                </div>
                                <div class="stat-progress">
                                    <div class="progress-bar" style="width: 78%"></div>
                                </div>
                            </div>
                            
                            <div class="stat-card">
                                <div class="stat-header">
                                    <div class="stat-icon">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                </div>
                                <div class="stat-content">
                                    <h3>Alertas del Día</h3>
                                    <div class="stat-number"><?php echo $alertas_dia; ?></div>
                                    <div class="stat-change negative">
                                        <i class="fas fa-arrow-down"></i>
                                        -1 desde ayer
                                    </div>
                                </div>
                                <div class="stat-progress">
                                    <div class="progress-bar" style="width: 25%"></div>
                                </div>
                            </div>
                            
                            <div class="stat-card">
                                <div class="stat-header">
                                    <div class="stat-icon">
                                        <i class="fas fa-sun"></i>
                                    </div>
                                </div>
                                <div class="stat-content">
                                    <h3>Clima Actual</h3>
                                    <div class="weather-info">
                                        <div class="weather-temp"><?php echo $temperatura; ?>°</div>
                                        <div>
                                            <div style="color: #059669; font-weight: 600;">Soleado</div>
                                            <div class="weather-details">Humedad: 65% | Viento: 12 km/h</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="stat-card">
                                <div class="stat-header">
                                    <div class="stat-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                </div>
                                <div class="stat-content">
                                    <h3>Eficiencia Semanal</h3>
                                    <div class="stat-number">89</div>
                                    <div class="stat-change">
                                        <i class="fas fa-arrow-up"></i>
                                        +5% mejora
                                    </div>
                                </div>
                                <div class="stat-progress">
                                    <div class="progress-bar" style="width: 89%"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Chart and Alerts Section -->
                        <div class="chart-section">
                            <div class="chart-card">
                                <div class="chart-header">
                                    <h3 class="chart-title">
                                        <i class="fas fa-chart-area"></i> Rendimiento de Cultivos
                                    </h3>
                                </div>
                                <div class="chart-container">
                                    <div class="chart-bars">
                                        <?php foreach($rendimiento_datos as $index => $valor): ?>
                                            <div class="chart-bar-wrapper">
                                                <div class="chart-bar" style="height: <?php echo $valor; ?>%"></div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="chart-labels">
                                        <?php foreach($labels_dias as $dia): ?>
                                            <span class="chart-label"><?php echo $dia; ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="alerts-card">
                                <div class="alerts-header">
                                    <h3 class="chart-title">
                                        <i class="fas fa-bell"></i> Centro de Alertas
                                    </h3>
                                    <div class="alerts-counter"><?php echo $alertas_pendientes; ?></div>
                                </div>
                                
                                <div class="alerts-summary">
                                    <p>Tienes <strong><?php echo $alertas_pendientes; ?> alertas</strong> que requieren tu atención inmediata</p>
                                </div>
                                
                                <div class="alerts-list">
                                    <div class="alert-item priority-high">
                                        <div class="alert-icon">
                                            <i class="fas fa-tint"></i>
                                        </div>
                                        <div class="alert-content">
                                            <div class="alert-header">
                                                <h4>Riego Crítico</h4>
                                                <span class="alert-time">Hace 2 horas</span>
                                            </div>
                                            <p>Cultivo de tomates sector A requiere riego inmediato</p>
                                            <div class="alert-actions">
                                                <button class="btn-alert btn-resolve">Resolver</button>
                                                <button class="btn-alert btn-view">Ver detalles</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="alert-item priority-medium">
                                        <div class="alert-icon">
                                            <i class="fas fa-bug"></i>
                                        </div>
                                        <div class="alert-content">
                                            <div class="alert-header">
                                                <h4>Plaga Detectada</h4>
                                                <span class="alert-time">Hace 4 horas</span>
                                            </div>
                                            <p>Posible infestación de pulgones en sector B</p>
                                            <div class="alert-actions">
                                                <button class="btn-alert btn-resolve">Resolver</button>
                                                <button class="btn-alert btn-view">Ver detalles</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="alert-item priority-low">
                                        <div class="alert-icon">
                                            <i class="fas fa-thermometer-three-quarters"></i>
                                        </div>
                                        <div class="alert-content">
                                            <div class="alert-header">
                                                <h4>Temperatura Elevada</h4>
                                                <span class="alert-time">Hace 6 horas</span>
                                            </div>
                                            <p>Temperatura 3°C por encima del promedio</p>
                                            <div class="alert-actions">
                                                <button class="btn-alert btn-resolve">Resolver</button>
                                                <button class="btn-alert btn-view">Ver detalles</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions Section -->
                        <div class="quick-actions-section">
                            <div class="section-header">
                                <h2>Herramientas Inteligentes</h2>
                                <p>Accede a las funcionalidades esenciales para gestionar tu agricultura</p>
                            </div>
                            
                            <div class="tools-grid">
                                <div class="tool-card" onclick="location.href='?page=clima'">
                                    <div class="tool-icon">
                                        <i class="fas fa-cloud-sun"></i>
                                    </div>
                                    <div class="tool-content">
                                        <h3>Monitoreo Climático</h3>
                                        <p>Supervisa condiciones meteorológicas en tiempo real con sensores IoT</p>
                                        <div class="tool-stats">
                                            <span>🌡️ <?php echo $temperatura; ?>°C</span>
                                            <span>💧 65%</span>
                                            <span>🌬️ 12 km/h</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tool-card" onclick="location.href='?page=deteccion-plagas'">
                                    <div class="tool-icon">
                                        <i class="fas fa-search-plus"></i>
                                    </div>
                                    <div class="tool-content">
                                        <h3>Detección de Plagas</h3>
                                        <p>Identifica y previene problemas con IA y visión por computadora</p>
                                        <div class="tool-status">
                                            <span class="status-good">✅ Sistema activo - 98% precisión</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tool-card" onclick="location.href='?page=cultivo-insumos'">
                                    <div class="tool-icon">
                                        <i class="fas fa-calculator"></i>
                                    </div>
                                    <div class="tool-content">
                                        <h3>Calculadora de Insumos</h3>
                                        <p>Optimiza fertilizantes y recursos con algoritmos avanzados</p>
                                        <div class="tool-stats">
                                            <span>💰 Ahorro: 23%</span>
                                            <span>📊 Eficiencia: +15%</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tool-card" onclick="location.href='?page=prediccion'">
                                    <div class="tool-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="tool-content">
                                        <h3>Predicción de Cosechas</h3>
                                        <p>Estima rendimientos usando machine learning y big data</p>
                                        <div class="tool-stats">
                                            <span>📈 Precisión: 94%</span>
                                            <span>🎯 Confianza: 96%</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tool-card" onclick="location.href='?page=gestion-cultivo'">
                                    <div class="tool-icon">
                                        <i class="fas fa-tasks"></i>
                                    </div>
                                    <div class="tool-content">
                                        <h3>Gestión de Cultivos</h3>
                                        <p>Administra y programa tareas agrícolas automáticamente</p>
                                        <div class="tool-status">
                                            <span class="status-pending">⏳ 5 tareas programadas</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tool-card" onclick="location.href='?page=informes'">
                                    <div class="tool-icon">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <div class="tool-content">
                                        <h3>Reportes Inteligentes</h3>
                                        <p>Genera informes detallados con análisis predictivo</p>
                                        <div class="tool-stats">
                                            <span>📊 12 reportes</span>
                                            <span>🔍 Análisis en vivo</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    break;
                    
                default:
                    if (file_exists("paginas/{$pagina_actual}.php")) {
                        include "paginas/{$pagina_actual}.php";
                    } else {
                        ?>
                        <div class="page-content">
                            <h2 class="page-title">
                                <?php echo $titulos[$pagina_actual] ?? 'Página no encontrada'; ?>
                            </h2>
                            <p class="page-subtitle">
                                <?php
                                $descripciones = [
                                    'clima' => 'Monitoreo avanzado de condiciones meteorológicas para optimizar tus cultivos con tecnología IoT',
                                    'gestion-cultivo' => 'Administra y monitorea todos tus cultivos desde un solo lugar con herramientas inteligentes',
                                    'cultivo-insumos' => 'Calcula y gestiona los insumos necesarios para maximizar el rendimiento de tus cultivos',
                                    'deteccion-plagas' => 'Sistema inteligente de IA para identificar y controlar plagas de manera preventiva',
                                    'formacion' => 'Recursos educativos y cursos especializados para mejorar tus técnicas agrícolas',
                                    'asesoria' => 'Consulta con expertos agrónomos para optimizar tu producción y resolver problemas',
                                    'prediccion' => 'Análisis predictivo avanzado para maximizar tus cosechas usando machine learning',
                                    'compra-venta' => 'Plataforma integral de comercialización de productos e insumos agrícolas',
                                    'informes' => 'Genera reportes detallados y análisis de rendimiento de tu actividad agrícola'
                                ];
                                echo $descripciones[$pagina_actual] ?? 'La página solicitada no existe en el sistema';
                                ?>
                            </p>
                            <?php if (isset($descripciones[$pagina_actual])): ?>
                                <div style="background: #f0fdf4; padding: 25px; border-radius: 12px; border-left: 4px solid #059669; margin-top: 20px;">
                                    <h4 style="color: #059669; margin-bottom: 10px;">💡 Módulo en Desarrollo</h4>
                                    <p style="color: #374151; margin-bottom: 15px;">
                                        El archivo <strong>paginas/<?php echo $pagina_actual; ?>.php</strong> no se encontró. 
                                        Este módulo está planificado para incluir las siguientes funcionalidades:
                                    </p>
                                    <ul style="color: #6b7280; margin-left: 20px;">
                                        <?php
                                        $funcionalidades = [
                                            'clima' => ['Datos meteorológicos en tiempo real', 'Pronósticos extendidos', 'Alertas climáticas', 'Historial de condiciones'],
                                            'gestion-cultivo' => ['Seguimiento de cultivos', 'Programación de tareas', 'Control de inventario', 'Gestión de parcelas'],
                                            'cultivo-insumos' => ['Calculadora de fertilizantes', 'Optimización de recursos', 'Control de costos', 'Recomendaciones IA'],
                                            'deteccion-plagas' => ['Reconocimiento por imágenes', 'Alertas tempranas', 'Tratamientos recomendados', 'Historial de plagas'],
                                            'formacion' => ['Cursos especializados', 'Tutoriales interactivos', 'Certificaciones', 'Biblioteca de recursos'],
                                            'asesoria' => ['Chat con expertos', 'Consultas programadas', 'Diagnósticos remotos', 'Planes personalizados'],
                                            'prediccion' => ['Análisis predictivo', 'Estimación de cosechas', 'Tendencias de mercado', 'Modelos ML'],
                                            'compra-venta' => ['Marketplace', 'Gestión de pedidos', 'Seguimiento logístico', 'Pagos seguros'],
                                            'informes' => ['Reportes automáticos', 'Análisis de KPIs', 'Exportación de datos', 'Dashboards personalizados']
                                        ];
                                        
                                        if (isset($funcionalidades[$pagina_actual])) {
                                            foreach ($funcionalidades[$pagina_actual] as $func) {
                                                echo "<li>{$func}</li>";
                                            }
                                        }
                                        ?>
                                    </ul>
                                    <div style="margin-top: 20px; padding-top: 15px; border-top: 1px solid #d1fae5;">
                                        <strong style="color: #059669;">Próximos pasos:</strong> 
                                        <span style="color: #6b7280;">Crea el archivo correspondiente para activar este módulo</span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php
                    }
                    break;
            }
            ?>
        </div>
    </div>

    <script>
        // Animaciones y efectos interactivos
        document.addEventListener('DOMContentLoaded', function() {
            // Animación de barras de progreso
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach((bar, index) => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 500 + (index * 200));
            });
            
            // Animación de barras del gráfico
            const chartBars = document.querySelectorAll('.chart-bar');
            chartBars.forEach((bar, index) => {
                const height = bar.style.height;
                bar.style.height = '0%';
                setTimeout(() => {
                    bar.style.height = height;
                }, 1000 + (index * 150));
            });
            
            // Efectos de hover mejorados
            document.querySelectorAll('.tool-card').forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-8px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0) scale(1)';
                });
            });
            
            // Sistema de notificaciones
            setTimeout(() => {
                showNotification('Sistema Green Modern Agrifarm iniciado correctamente', 'success');
            }, 1500);
        });

        // Sistema de notificaciones premium
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${type === 'success' ? 'linear-gradient(135deg, #059669, #34d399)' : 'linear-gradient(135deg, #3b82f6, #60a5fa)'};
                color: white;
                padding: 18px 25px;
                border-radius: 12px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.2);
                z-index: 1000;
                animation: slideIn 0.3s ease;
                font-weight: 600;
                backdrop-filter: blur(10px);
            `;
            
            notification.innerHTML = `
                <div style="display: flex; align-items: center; gap: 12px;">
                    <i class="fas fa-${type === 'success' ? 'check' : 'info'}-circle" style="font-size: 1.2rem;"></i>
                    <span>${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }, 4000);
        }
    </script>
</body>
</html>