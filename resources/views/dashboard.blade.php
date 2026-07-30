<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Gestión - Consultora Líderes 2026</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
            min-height: 100vh;
        }
        
        .glass-panel {
            background: rgba(255, 255, 255, 0.45);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
        }
        
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        /* Toggle Switch Custom CSS */
        .toggle-checkbox:checked {
            right: 0;
            border-color: #68D391;
        }
        .toggle-checkbox:checked + .toggle-label {
            background-color: #68D391;
        }
    </style>
</head>
<body class="p-3 sm:p-6 md:p-10 font-sans text-gray-800 antialiased selection:bg-blue-300 relative overflow-x-hidden">
    
    <div class="max-w-[1400px] mx-auto space-y-8 pb-20">
        
        <!-- Header con Toggle -->
        <header class="glass-panel p-5 md:p-8 rounded-3xl flex flex-col xl:flex-row xl:items-center justify-between gap-6 transition-transform duration-300 hover:scale-[1.01]">
            <div class="text-center xl:text-left">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-blue-900 tracking-tight">Dashboard de Gestión</h1>
                <p class="text-blue-700 mt-1 md:mt-2 font-medium text-sm sm:text-base md:text-lg">Consultora Líderes 2026 - Clima Organizacional</p>
            </div>
            
            <!-- Controles (Privacidad & IA) -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 w-full xl:w-auto">
                <!-- Botón IA -->
                <button id="aiButton" class="w-full sm:w-auto flex justify-center items-center gap-2 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-5 py-3 rounded-2xl shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 transition-all duration-300 font-bold group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>Consultora IA</span>
                </button>
                
                <!-- Toggle Privacidad -->
                <div class="w-full sm:w-auto flex justify-center items-center gap-3 bg-white/50 px-4 py-3 rounded-2xl border border-white/60 shadow-inner">
                    <span class="text-sm font-bold text-gray-700 whitespace-nowrap">Modo Privacidad</span>
                    <div class="relative inline-block w-12 align-middle select-none transition duration-200 ease-in flex-shrink-0">
                        <input type="checkbox" name="toggle" id="privacyToggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer transition-all duration-300 z-10 top-0 left-0"/>
                        <label for="privacyToggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer transition-colors duration-300"></label>
                    </div>
                </div>
            </div>
        </header>

        <!-- Filtros -->
        <div class="glass-panel p-6 rounded-3xl flex flex-col md:flex-row gap-6 items-center">
            <div class="w-full md:w-2/3 relative">
                <label for="searchInput" class="block text-sm font-bold text-blue-900 mb-2">Buscar (Dimensión o Diagnóstico)</label>
                <input type="text" id="searchInput" placeholder="Ej: Estructura, Resistencia..." 
                    class="w-full px-5 py-3 rounded-xl border border-white/60 bg-white/50 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-400/30 transition-all text-gray-700 placeholder-gray-500 shadow-inner">
            </div>
            
            <div class="w-full md:w-1/3">
                <label for="prioritySelect" class="block text-sm font-bold text-blue-900 mb-2">Filtrar por Prioridad</label>
                <select id="prioritySelect" 
                    class="w-full px-5 py-3 rounded-xl border border-white/60 bg-white/50 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-400/30 transition-all text-gray-700 shadow-inner">
                    <option value="">Todas las prioridades</option>
                    <option value="Alta">Alta</option>
                    <option value="Media">Media</option>
                    <option value="Baja">Baja</option>
                </select>
            </div>
        </div>

        <!-- Tarjetas de KPIs Superiores -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="glass-panel p-6 rounded-3xl border-l-8 border-l-red-500 flex items-center justify-between hover:-translate-y-1 transition-transform duration-300">
                <div>
                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-1">Alerta Crítica</p>
                    <h3 class="text-xl font-extrabold text-red-700">Burnout</h3>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl font-black text-gray-800 privacy-text" data-value="62%">62%</span>
                    <div class="bg-red-100 p-3 rounded-full text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="glass-panel p-6 rounded-3xl border-l-8 border-l-orange-500 flex items-center justify-between hover:-translate-y-1 transition-transform duration-300">
                <div>
                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-1">Advertencia</p>
                    <h3 class="text-xl font-extrabold text-orange-700">Resistencia</h3>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl font-black text-gray-800 privacy-text" data-value="55%">55%</span>
                    <div class="bg-orange-100 p-3 rounded-full text-orange-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Card 3 -->
            <div class="glass-panel p-6 rounded-3xl border-l-8 border-l-green-500 flex items-center justify-between hover:-translate-y-1 transition-transform duration-300">
                <div>
                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-1">Óptimo</p>
                    <h3 class="text-xl font-extrabold text-green-700">Normativa</h3>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl font-black text-gray-800 privacy-text" data-value="72%">72%</span>
                    <div class="bg-green-100 p-3 rounded-full text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Layout Principal: Gráficos a la Izquierda, Tabla a la Derecha -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            
            <!-- Columna Izquierda: Gráficos -->
            <div class="lg:col-span-1 flex flex-col gap-8">
                <!-- Gráfico de Barras -->
                <div class="glass-panel p-6 rounded-3xl flex flex-col flex-1">
                    <h2 class="text-lg font-bold text-blue-900 mb-4">Promedios por Dimensión</h2>
                    <div class="flex-grow relative min-h-[220px]">
                        <canvas id="indicatorChart"></canvas>
                    </div>
                </div>

                <!-- Gráfico de Radar -->
                <div class="glass-panel p-6 rounded-3xl flex flex-col flex-1">
                    <h2 class="text-lg font-bold text-blue-900 mb-4">Mapa Multidimensional</h2>
                    <div class="flex-grow relative min-h-[220px]">
                        <canvas id="radarChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Tabla -->
            <div class="lg:col-span-2 glass-panel rounded-3xl overflow-hidden flex flex-col shadow-lg">
                <div class="overflow-x-auto no-scrollbar flex-grow">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-blue-900/10 text-blue-900 text-sm uppercase tracking-wider">
                                <th class="p-5 font-bold">Dimensión</th>
                                <th class="p-5 font-bold text-center">Puntaje</th>
                                <th class="p-5 font-bold">Autor Base</th>
                                <th class="p-5 font-bold">Diagnóstico</th>
                                <th class="p-5 font-bold text-center">Prioridad</th>
                                <th class="p-5 font-bold text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="divide-y divide-white/40 text-sm">
                            <!-- Filas renderizadas vía JS -->
                        </tbody>
                    </table>
                </div>
            </div> <!-- Fin Columna Derecha -->

        </div> <!-- Fin Grid Layout -->
    </div>

    <!-- (El Botón de IA ahora está en el Header) -->

    <!-- Modal Detalles del Indicador -->
    <div id="detailsModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 hidden flex items-center justify-center opacity-0 transition-opacity duration-300">
        <div class="bg-white/95 backdrop-blur-md w-11/12 md:w-1/2 lg:w-1/3 rounded-3xl border border-white/60 shadow-2xl overflow-hidden transform scale-95 translate-y-4 transition-all duration-300" id="detailsModalContent">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4 flex items-center justify-between">
                <h3 class="text-white font-extrabold text-xl flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Detalles de Dimensión
                </h3>
                <button id="closeDetailsModal" class="text-white/80 hover:text-white transition-colors bg-white/10 hover:bg-white/20 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <!-- Body -->
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase">Dimensión Evaluada</p>
                        <p id="modalDimension" class="text-2xl font-black text-blue-900"></p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-bold text-gray-400 uppercase">Promedio</p>
                        <p id="modalAverage" class="text-2xl font-black text-gray-800"></p>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-blue-50/50 p-4 rounded-2xl border border-blue-100">
                        <p class="text-xs font-bold text-blue-400 uppercase mb-1">Autor Base</p>
                        <p id="modalAuthor" class="text-sm font-semibold text-blue-900"></p>
                    </div>
                    <div class="bg-blue-50/50 p-4 rounded-2xl border border-blue-100">
                        <p class="text-xs font-bold text-blue-400 uppercase mb-1">Prioridad</p>
                        <div class="mt-1"><span id="modalPriority" class=""></span></div>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-xs font-bold text-gray-400 uppercase mb-1">Diagnóstico Detallado</p>
                    <p id="modalDiagnosis" class="text-sm text-gray-700"></p>
                </div>

                <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-xs font-bold text-gray-400 uppercase mb-1">Indicador Simulado</p>
                    <p id="modalSimulated" class="text-sm text-gray-700 font-mono"></p>
                </div>

                <div class="bg-indigo-50 border border-indigo-100 p-5 rounded-2xl">
                    <div class="flex items-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <p class="text-sm font-bold text-indigo-800 uppercase">Recomendación Estratégica</p>
                    </div>
                    <p id="modalRecommendation" class="text-sm text-indigo-900 leading-relaxed"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Analítica IA (Chatbot) -->
    <div id="aiModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-md z-50 hidden flex items-center justify-center opacity-0 transition-opacity duration-300">
        <div class="bg-white/95 backdrop-blur-xl w-11/12 md:w-3/4 max-w-4xl h-[80vh] rounded-3xl border border-white/60 shadow-2xl overflow-hidden transform scale-95 transition-all duration-300 flex flex-col" id="aiModalContent">
            
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-indigo-700 to-purple-700 px-6 py-4 flex items-center justify-between shadow-md">
                <div class="flex items-center gap-3 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span class="font-bold text-lg">Consultora IA - Líderes 2026</span>
                </div>
                <button id="closeAiModal" class="text-white/80 hover:text-white bg-white/10 hover:bg-white/20 p-2 rounded-full transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <!-- Chat Area -->
            <div id="aiChatArea" class="flex-grow p-4 md:p-6 overflow-y-auto bg-slate-50 space-y-4 md:space-y-6">
                <!-- Mensaje Inicial de la IA -->
                <div class="flex gap-4">
                    <div class="bg-indigo-600 text-white p-3 rounded-full h-10 w-10 flex-shrink-0 flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    </div>
                    <div class="bg-white border border-gray-200 p-4 rounded-2xl rounded-tl-none shadow-sm text-gray-700 max-w-[80%]">
                        <p>¡Hola! Soy tu asistente de consultoría estratégica. He analizado la base de datos de Clima Organizacional.</p>
                        <p class="mt-2 text-sm text-gray-500 font-bold">Selecciona una de las consultas predefinidas abajo para comenzar.</p>
                    </div>
                </div>
            </div>

            <!-- Input Area con Prompts -->
            <div class="bg-white border-t border-gray-200 p-3 md:p-4">
                <div class="flex flex-wrap justify-center gap-2 md:gap-3 mb-1" id="aiPromptsContainer">
                    <button onclick="sendAiPrompt(1, 'Analizar causas profundas del Burnout (62%)')" class="bg-indigo-50 hover:bg-indigo-100 text-indigo-700 border border-indigo-200 px-4 py-2 rounded-full text-sm font-semibold transition-colors">
                        🔥 Analizar Burnout
                    </button>
                    <button onclick="sendAiPrompt(2, 'Proponer estrategia para mitigar la Resistencia al Cambio')" class="bg-orange-50 hover:bg-orange-100 text-orange-700 border border-orange-200 px-4 py-2 rounded-full text-sm font-semibold transition-colors">
                        ⚠️ Mitigar Resistencia
                    </button>
                    <button onclick="sendAiPrompt(3, 'Evaluación del impacto del cumplimiento Normativo (72%)')" class="bg-green-50 hover:bg-green-100 text-green-700 border border-green-200 px-4 py-2 rounded-full text-sm font-semibold transition-colors">
                        ✅ Impacto Normativo
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notificación Toast Privacidad -->
    <div id="privacyToast" class="fixed top-10 left-1/2 transform -translate-x-1/2 bg-indigo-900 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 z-50 opacity-0 translate-y-[-20px] transition-all duration-300 pointer-events-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
        </svg>
        <span class="font-medium text-sm">Manifiesto Ético: Datos sensibles anonimizados para evitar sesgos algorítmicos.</span>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const prioritySelect = document.getElementById('prioritySelect');
        const tableBody = document.getElementById('tableBody');
        const privacyToggle = document.getElementById('privacyToggle');
        const privacyToast = document.getElementById('privacyToast');
        
        const aiButton = document.getElementById('aiButton');
        const aiModal = document.getElementById('aiModal');
        const aiModalContent = document.getElementById('aiModalContent');
        const closeAiModal = document.getElementById('closeAiModal');
        const aiChatArea = document.getElementById('aiChatArea');
        const aiPromptsContainer = document.getElementById('aiPromptsContainer');

        const barCtx = document.getElementById('indicatorChart').getContext('2d');
        const radarCtx = document.getElementById('radarChart').getContext('2d');
        let barChartInstance = null;
        let radarChartInstance = null;
        let isPrivacyMode = false;
        
        let allData = []; 

        // Fetch Data
        const fetchData = async () => {
            const search = searchInput.value.trim();
            const priority = prioritySelect.value;
            
            try {
                const url = `/api/data?search=${encodeURIComponent(search)}&priority=${encodeURIComponent(priority)}`;
                const response = await fetch(url);
                const data = await response.json();
                
                allData = data.indicators;
                renderTable(allData);
                renderBarChart(allData);
                renderRadarChart(allData);
                
            } catch (error) {
                console.error("Error al obtener los datos de la API:", error);
            }
        };

        // Render Table
        const renderTable = (indicators) => {
            tableBody.innerHTML = '';
            
            if (indicators.length === 0) {
                tableBody.innerHTML = '<tr><td colspan="6" class="p-8 text-center text-gray-500 font-medium text-lg">No se encontraron registros que coincidan con la búsqueda.</td></tr>';
                return;
            }

            indicators.forEach(indicator => {
                const tr = document.createElement('tr');
                tr.className = "hover:bg-white/60 transition-colors duration-200 group";
                
                // Prioridad Badge
                let priorityClass = "bg-gray-100 text-gray-700";
                if (indicator.priority === 'Alta') priorityClass = "bg-red-100 text-red-800 border border-red-200";
                if (indicator.priority === 'Media') priorityClass = "bg-orange-100 text-orange-800 border border-orange-200";
                if (indicator.priority === 'Baja') priorityClass = "bg-green-100 text-green-800 border border-green-200";

                // Autor Badge Colors 
                let authorClass = "bg-indigo-100 text-indigo-800 border-indigo-200";
                if (indicator.author === 'Likert') authorClass = "bg-cyan-100 text-cyan-800 border-cyan-200";
                if (indicator.author === 'Schein') authorClass = "bg-fuchsia-100 text-fuchsia-800 border-fuchsia-200";

                const blurClass = isPrivacyMode ? "blur-md opacity-30 select-none bg-gray-200 rounded text-transparent" : "transition-all duration-300";

                tr.innerHTML = `
                    <td class="p-5 font-bold text-blue-900 group-hover:text-blue-600 transition-colors">${indicator.dimension}</td>
                    <td class="p-5 text-center">
                        <span class="font-extrabold text-gray-800 text-base ${blurClass} inline-block">${indicator.average}</span>
                    </td>
                    <td class="p-5">
                        <span class="px-3 py-1 rounded-lg border text-xs font-bold shadow-sm ${authorClass}">
                            ${indicator.author}
                        </span>
                    </td>
                    <td class="p-5 text-gray-700 font-medium">${indicator.diagnosis}</td>
                    <td class="p-5 text-center">
                        <span class="px-4 py-1.5 rounded-full text-xs font-bold shadow-sm ${priorityClass}">
                            ${indicator.priority}
                        </span>
                    </td>
                    <td class="p-5 text-center">
                        <button onclick='inspectDimension(${JSON.stringify(indicator)})' class="text-blue-500 hover:text-blue-700 bg-blue-50 hover:bg-blue-100 p-2 rounded-full transition-all duration-200" title="Inspeccionar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </td>
                `;
                tableBody.appendChild(tr);
            });
        };

        // Render Bar Chart
        const renderBarChart = (indicators) => {
            const labels = indicators.map(i => i.dimension);
            const data = indicators.map(i => i.average);
            
            const backgroundColors = indicators.map(i => {
                if (i.priority === 'Alta') return 'rgba(239, 68, 68, 0.85)';
                if (i.priority === 'Media') return 'rgba(249, 115, 22, 0.85)';
                return 'rgba(34, 197, 94, 0.85)';
            });

            if (barChartInstance) barChartInstance.destroy();

            barChartInstance = new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Promedio Obtenido',
                        data: data,
                        backgroundColor: backgroundColors,
                        borderRadius: 6,
                        borderWidth: 1,
                        borderColor: 'rgba(255, 255, 255, 0.7)',
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: 'rgba(15, 23, 42, 0.95)',
                            padding: 14,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    return isPrivacyMode ? 'Valor Protegido (Manifiesto Ético)' : `Promedio: ${context.parsed.y}`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 5,
                            grid: { color: 'rgba(0, 0, 0, 0.05)' },
                        },
                        x: { grid: { display: false } }
                    }
                }
            });
        };

        // Render Radar Chart
        const renderRadarChart = (indicators) => {
            const labels = indicators.map(i => i.dimension);
            const realData = indicators.map(i => i.average);
            const goalData = indicators.map(i => 4.0);

            if (radarChartInstance) radarChartInstance.destroy();

            radarChartInstance = new Chart(radarCtx, {
                type: 'radar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Promedio Actual',
                            data: realData,
                            backgroundColor: 'rgba(59, 130, 246, 0.2)', // Blue-500 20%
                            borderColor: 'rgba(59, 130, 246, 1)', // Blue-500
                            pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgba(59, 130, 246, 1)',
                            borderWidth: 2,
                        },
                        {
                            label: 'Meta Institucional (4.0)',
                            data: goalData,
                            backgroundColor: 'rgba(16, 185, 129, 0.1)', // Emerald-500 10%
                            borderColor: 'rgba(16, 185, 129, 0.6)', // Emerald-500
                            borderDash: [5, 5],
                            pointBackgroundColor: 'rgba(16, 185, 129, 0.6)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgba(16, 185, 129, 1)',
                            borderWidth: 2,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        r: {
                            angleLines: { color: 'rgba(0, 0, 0, 0.1)' },
                            grid: { color: 'rgba(0, 0, 0, 0.1)' },
                            pointLabels: {
                                color: '#475569',
                                font: { size: 11, weight: 'bold' }
                            },
                            ticks: {
                                min: 0,
                                max: 5,
                                stepSize: 1,
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                font: { family: 'Inter', size: 12 },
                                usePointStyle: true,
                                padding: 20
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(15, 23, 42, 0.95)',
                            padding: 12,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    if (context.datasetIndex === 1) return `Meta: 4.0`;
                                    return isPrivacyMode ? 'Valor Protegido (Manifiesto Ético)' : `Promedio: ${context.parsed.r}`;
                                }
                            }
                        }
                    }
                }
            });
        };

        // Lógica: Inspeccionar Dimensión (Modal)
        const detailsModal = document.getElementById('detailsModal');
        const detailsModalContent = document.getElementById('detailsModalContent');
        const closeDetailsModal = document.getElementById('closeDetailsModal');

        window.inspectDimension = (indicator) => {
            document.getElementById('modalDimension').textContent = indicator.dimension;
            document.getElementById('modalAverage').textContent = isPrivacyMode ? 'Protegido' : indicator.average;
            document.getElementById('modalDiagnosis').textContent = indicator.diagnosis;
            document.getElementById('modalAuthor').textContent = indicator.author;
            document.getElementById('modalRecommendation').textContent = indicator.recommendation;
            document.getElementById('modalSimulated').textContent = indicator.simulated_indicator;
            
            let badgeClass = "bg-gray-100 text-gray-800";
            if (indicator.priority === 'Alta') badgeClass = "bg-red-100 text-red-800 border-red-200";
            if (indicator.priority === 'Media') badgeClass = "bg-orange-100 text-orange-800 border-orange-200";
            if (indicator.priority === 'Baja') badgeClass = "bg-green-100 text-green-800 border-green-200";
            
            const priorityEl = document.getElementById('modalPriority');
            priorityEl.textContent = indicator.priority;
            priorityEl.className = `px-3 py-1 rounded-full text-xs font-bold border ${badgeClass}`;

            detailsModal.classList.remove('hidden');
            setTimeout(() => {
                detailsModal.classList.remove('opacity-0');
                detailsModalContent.classList.remove('scale-95', 'translate-y-4');
                detailsModalContent.classList.add('scale-100', 'translate-y-0');
            }, 10);
        };

        if(closeDetailsModal) {
            closeDetailsModal.addEventListener('click', () => {
                detailsModal.classList.add('opacity-0');
                detailsModalContent.classList.remove('scale-100', 'translate-y-0');
                detailsModalContent.classList.add('scale-95', 'translate-y-4');
                setTimeout(() => {
                    detailsModal.classList.add('hidden');
                }, 300);
            });
        }

        // Toggle Privacidad Lógica
        privacyToggle.addEventListener('change', (e) => {
            isPrivacyMode = e.target.checked;
            
            // Actualizar tabla y gráficas
            renderTable(allData); 
            renderBarChart(allData);
            renderRadarChart(allData);
            
            // Actualizar Textos que tienen clase privacy-text manualmente para KPIs
            const privacyTexts = document.querySelectorAll('.privacy-text');
            privacyTexts.forEach(el => {
                if (isPrivacyMode) {
                    el.classList.add('blur-md', 'opacity-30', 'select-none', 'bg-gray-200', 'rounded', 'text-transparent');
                } else {
                    el.classList.remove('blur-md', 'opacity-30', 'select-none', 'bg-gray-200', 'rounded', 'text-transparent');
                }
            });

            if (isPrivacyMode) {
                privacyToast.classList.remove('opacity-0', 'translate-y-[-20px]');
                privacyToast.classList.add('opacity-100', 'translate-y-0');
                
                setTimeout(() => {
                    privacyToast.classList.remove('opacity-100', 'translate-y-0');
                    privacyToast.classList.add('opacity-0', 'translate-y-[-20px]');
                }, 4000);
            }
        });

        // AI Modal Chatbot Lógica
        aiButton.addEventListener('click', () => {
            aiModal.classList.remove('hidden');
            setTimeout(() => {
                aiModal.classList.remove('opacity-0');
                aiModalContent.classList.remove('scale-95');
                aiModalContent.classList.add('scale-100');
            }, 10);
        });

        closeAiModal.addEventListener('click', () => {
            aiModal.classList.add('opacity-0');
            aiModalContent.classList.remove('scale-100');
            aiModalContent.classList.add('scale-95');
            setTimeout(() => {
                aiModal.classList.add('hidden');
            }, 300);
        });

        window.sendAiPrompt = (promptId, promptText) => {
            aiPromptsContainer.classList.add('opacity-50', 'pointer-events-none');
            
            aiChatArea.innerHTML += `
                <div class="flex gap-4 justify-end">
                    <div class="bg-blue-600 text-white p-4 rounded-2xl rounded-tr-none shadow-sm max-w-[80%]">
                        <p>${promptText}</p>
                    </div>
                </div>
            `;
            aiChatArea.scrollTop = aiChatArea.scrollHeight;

            const typingId = 'typing-' + Date.now();
            aiChatArea.innerHTML += `
                <div id="${typingId}" class="flex gap-4 mt-6">
                    <div class="bg-indigo-600 text-white p-3 rounded-full h-10 w-10 flex-shrink-0 flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    </div>
                    <div class="bg-white border border-gray-200 p-4 rounded-2xl rounded-tl-none shadow-sm flex gap-1 items-center h-[52px]">
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                    </div>
                </div>
            `;
            aiChatArea.scrollTop = aiChatArea.scrollHeight;

            setTimeout(() => {
                document.getElementById(typingId).remove();
                
                let responseHtml = '';
                if(promptId === 1) {
                    responseHtml = `
                        <p class="font-bold text-red-600 mb-2">Diagnóstico de Burnout (Alerta Crítica)</p>
                        <p>El nivel de 62% en la dimensión de Recompensa correlaciona directamente con la rigidez estructural (54%).</p>
                        <p class="mt-2 text-sm bg-gray-100 p-3 rounded-xl border border-gray-200 text-gray-800 font-medium">Recomendación: Implementar modelo de salario emocional inmediato y flexibilizar horarios en un 15%.</p>
                    `;
                } else if(promptId === 2) {
                    responseHtml = `
                        <p class="font-bold text-orange-600 mb-2">Análisis de Resistencia al Cambio</p>
                        <p>La resistencia (55%) surge por una deficiencia en la participación docente (62%).</p>
                        <p class="mt-2 text-sm bg-gray-100 p-3 rounded-xl border border-gray-200 text-gray-800 font-medium">Recomendación: Establecer mesas de trabajo participativas (Modelo de Schein) para rediseñar procesos clave con los docentes.</p>
                    `;
                } else {
                    responseHtml = `
                        <p class="font-bold text-green-600 mb-2">Impacto del Cumplimiento Normativo</p>
                        <p>El alto cumplimiento (72%) asegura estabilidad legal, pero opera como estresor secundario debido a la inflexibilidad del entorno.</p>
                        <p class="mt-2 text-sm bg-gray-100 p-3 rounded-xl border border-gray-200 text-gray-800 font-medium">Recomendación: Transicionar a "Cultura Adhocrática" para mantener la norma pero agilizar los procedimientos.</p>
                    `;
                }

                aiChatArea.innerHTML += `
                    <div class="flex gap-4 mt-6">
                        <div class="bg-indigo-600 text-white p-3 rounded-full h-10 w-10 flex-shrink-0 flex items-center justify-center shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                        </div>
                        <div class="bg-white border border-gray-200 p-4 rounded-2xl rounded-tl-none shadow-sm text-gray-700 max-w-[80%]">
                            ${responseHtml}
                        </div>
                    </div>
                `;
                aiChatArea.scrollTop = aiChatArea.scrollHeight;
                aiPromptsContainer.classList.remove('opacity-50', 'pointer-events-none');
            }, 1800);
        };

        // Eventos de Filtros
        searchInput.addEventListener('keyup', fetchData);
        prioritySelect.addEventListener('change', fetchData);

        // Init
        document.addEventListener('DOMContentLoaded', fetchData);
    </script>
</body>
</html>
