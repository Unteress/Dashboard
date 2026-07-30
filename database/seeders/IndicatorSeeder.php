<?php

namespace Database\Seeders;

use App\Models\Indicator;
use Illuminate\Database\Seeder;

class IndicatorSeeder extends Seeder
{
    public function run(): void
    {
        $indicators = [
            [
                'dimension' => 'Estructura',
                'average' => 2.7,
                'diagnosis' => 'Procesos rígidos',
                'simulated_indicator' => 'Org. institucional: 54%',
                'author' => 'Likert',
                'priority' => 'Alta',
                'recommendation' => 'Simplificar procesos.',
            ],
            [
                'dimension' => 'Responsabilidad',
                'average' => 3.1,
                'diagnosis' => 'Participación moderada',
                'simulated_indicator' => 'Partic. docente: 62%',
                'author' => 'Schein',
                'priority' => 'Media',
                'recommendation' => 'Delegar responsabilidades.',
            ],
            [
                'dimension' => 'Recompensa',
                'average' => 2.3,
                'diagnosis' => 'Bajo reconocimiento y burnout',
                'simulated_indicator' => 'Satisfacción: 68%, Burnout: 62%',
                'author' => 'Cameron & Quinn',
                'priority' => 'Alta',
                'recommendation' => 'Implementar programas de bienestar.',
            ],
            [
                'dimension' => 'Riesgo',
                'average' => 2.5,
                'diagnosis' => 'Resistencia al cambio',
                'simulated_indicator' => 'Innovación pedagógica: 55%',
                'author' => 'Likert',
                'priority' => 'Alta',
                'recommendation' => 'Fortalecer capacitación.',
            ],
            [
                'dimension' => 'Calidez',
                'average' => 3.0,
                'diagnosis' => 'Relaciones aceptables afectadas por estrés',
                'simulated_indicator' => 'Clima organizacional: 63%',
                'author' => 'Schein',
                'priority' => 'Media',
                'recommendation' => 'Promover integración.',
            ],
            [
                'dimension' => 'Apoyo',
                'average' => 2.8,
                'diagnosis' => 'Acompañamiento insuficiente',
                'simulated_indicator' => 'Apoyo institucional: 56%',
                'author' => 'Cameron & Quinn',
                'priority' => 'Alta',
                'recommendation' => 'Reforzar seguimiento.',
            ],
            [
                'dimension' => 'Normas',
                'average' => 3.6,
                'diagnosis' => 'Normativa con aplicación poco uniforme',
                'simulated_indicator' => 'Cumplimiento normas: 72%',
                'author' => 'Likert',
                'priority' => 'Media',
                'recommendation' => 'Actualizar protocolos.',
            ],
            [
                'dimension' => 'Conflicto',
                'average' => 2.6,
                'diagnosis' => 'Dificultades en resolución',
                'simulated_indicator' => 'Comunicación Institucional: 60%',
                'author' => 'Schein',
                'priority' => 'Alta',
                'recommendation' => 'Implementar estrategias de mediación.',
            ],
            [
                'dimension' => 'Identidad',
                'average' => 3.2,
                'diagnosis' => 'Sentido de pertenencia moderado',
                'simulated_indicator' => 'Identidad: 70%',
                'author' => 'Cameron & Quinn',
                'priority' => 'Media',
                'recommendation' => 'Fortalecer participación comunitaria.',
            ],
        ];

        foreach ($indicators as $indicator) {
            Indicator::create($indicator);
        }
    }
}
