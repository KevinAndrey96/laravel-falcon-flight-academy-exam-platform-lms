<?php

use Illuminate\Database\Seeder;
use App\Questions;
use App\User;
use Illuminate\Support\Facades\Hash;

class AviationExamSeeder extends Seeder
{
    /**
     * Run the aviation examination database seeders.
     * High-fidelity question bank based on UAEAC / RAC and ICAO pilot standards.
     *
     * @return void
     */
    public function run()
    {
        // 1. Seed Default Instructor Admin & Student Pilot
        User::firstOrCreate(
            ['email' => 'admin@falconaviacion.edu.co'],
            [
                'name' => 'Capitán Instructor Falcon',
                'password' => Hash::make('Falcon2024*'),
                'role' => 'Admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'piloto@falconaviacion.edu.co'],
            [
                'name' => 'Estudiante Piloto Comercial',
                'password' => Hash::make('Piloto2024*'),
                'role' => 'User',
            ]
        );

        // 2. Questions Bank
        $questions = [
            // ==========================================
            // EXAM 1: Piloto Comercial (PCA) - Fase Teórica UAEAC
            // ==========================================
            [
                'title' => 'Piloto Comercial (PCA) - Fase Teórica UAEAC',
                'area' => 'Reglamentación Aeronáutica de Colombia (RAC)',
                'question' => 'De acuerdo con el RAC 61 y las normas UAEAC, ¿cuál es el mínimo de horas totales de vuelo requeridas para optar a la licencia de Piloto Comercial de Avión (PCA)?',
                'answer' => 'C',
                'optionA' => '150 horas de vuelo registradas y certificadas.',
                'optionB' => '180 horas de vuelo incluyendo 30 horas de simulador FTD.',
                'optionC' => '200 horas de vuelo (o 150 horas si se completa un curso integrado de instrucción reconocida en un centro RAC 141).',
                'optionD' => '250 horas de vuelo exclusivamente en aeronaves multimotor.',
                'optionE' => '300 horas bajo supervisión directa de un instructor certificado.',
            ],
            [
                'title' => 'Piloto Comercial (PCA) - Fase Teórica UAEAC',
                'area' => 'Reglamentación Aeronáutica de Colombia (RAC)',
                'question' => '¿Cuál es la reserva reglamentaria de combustible obligatoria para un vuelo IFR (Reglas de Vuelo por Instrumentos) según los Reglamentos Aeronáuticos de Colombia?',
                'answer' => 'B',
                'optionA' => 'Combustible para volar al destino más 30 minutos a régimen normal de crucero.',
                'optionB' => 'Combustible hasta el aeródromo de destino, de allí al aeródromo de alternativa más 45 minutos a velocidad de crucero normal.',
                'optionC' => 'Combustible hasta el destino y 60 minutos de espera a velocidad de sostenimiento.',
                'optionD' => 'Combustible hasta el destino más 15% de contingencia en ruta.',
                'optionE' => 'Combustible hasta el alterno más 20 minutos con empuje de descenso.',
            ],
            [
                'title' => 'Piloto Comercial (PCA) - Fase Teórica UAEAC',
                'area' => 'Aerodinámica y Principios de Vuelo',
                'question' => '¿Qué efecto produce un incremento en el ángulo de ataque más allá del ángulo crítico de pérdida (Stall Angle)?',
                'answer' => 'A',
                'optionA' => 'La separación rápida de la capa límite en el extradós del perfil alar y una disminución brusca de la sustentación (CL).',
                'optionB' => 'Un aumento cuadrático de la sustentación acompañado de una reducción de la resistencia inducida.',
                'optionC' => 'Un desplazamiento del centro de presiones hacia el borde de ataque que incrementa la estabilidad longitudinal.',
                'optionD' => 'Un incremento instantáneo de la velocidad indicada (IAS) debido al menor arrastre parásito.',
                'optionE' => 'Una transición inmediata de sustentación aerodinámica a compresión dinámica supersónica.',
            ],
            [
                'title' => 'Piloto Comercial (PCA) - Fase Teórica UAEAC',
                'area' => 'Aerodinámica y Principios de Vuelo',
                'question' => 'En viraje coordinado a nivel de vuelo constante, el factor de carga (Load Factor / G-load) a 60 grados de inclinación alar (Bank Angle) es exactamente:',
                'answer' => 'C',
                'optionA' => '1.41 G',
                'optionB' => '1.73 G',
                'optionC' => '2.00 G (la velocidad de pérdida se incrementa en un 41%).',
                'optionD' => '2.50 G',
                'optionE' => '3.00 G',
            ],
            [
                'title' => 'Piloto Comercial (PCA) - Fase Teórica UAEAC',
                'area' => 'Meteorología Aeronáutica',
                'question' => 'En un informe meteorológico aeronáutico de rutina (METAR), ¿qué indica el grupo "WS COND BLW 2000FT RWY 13R"?',
                'answer' => 'D',
                'optionA' => 'Viento en superficie de calma con visibilidad reducida por niebla.',
                'optionB' => 'Pista mojada con coeficiente de frenado medio inferior a 2000 metros.',
                'optionC' => 'Visibilidad horizontal de 2000 pies por humo o ceniza volcánica.',
                'optionD' => 'Condición de cortante de viento (Windshear) por debajo de 2.000 pies en la aproximación a la pista 13 derecha.',
                'optionE' => 'Viento cruzado de 20 nudos sostenido a lo largo de toda la pista.',
            ],
            [
                'title' => 'Piloto Comercial (PCA) - Fase Teórica UAEAC',
                'area' => 'Meteorología Aeronáutica',
                'question' => '¿Cuál de los siguientes fenómenos meteorológicos representa el mayor peligro inmediato para una aeronave en despegue o aproximación final?',
                'answer' => 'B',
                'optionA' => 'Niebla de radiación matutina con visibilidad mayor a 1 milla.',
                'optionB' => 'Micro-ráfaga descendente (Microburst) asociada a nubes de desarrollo convectivo severo (Cumulonimbus).',
                'optionC' => 'Inversión térmica débil a 4.000 pies AGL.',
                'optionD' => 'Presencia de cúmulos de buen tiempo (Cumulus humilis).',
                'optionE' => 'Precipitación ligera estratiforme sin turbulencia asociada.',
            ],
            [
                'title' => 'Piloto Comercial (PCA) - Fase Teórica UAEAC',
                'area' => 'Navegación Aérea y Radionavegación',
                'question' => 'Durante la interceptación de un radial FROM en una estación VOR (VHF Omnidirectional Range), si la aguja CDI está desviada a la derecha y el selector OBS está en el radial deseado:',
                'answer' => 'A',
                'optionA' => 'La aeronave se encuentra a la izquierda del curso radial y debe virar a la derecha para interceptarlo.',
                'optionB' => 'La aeronave está exactamente sobre la línea de posición y debe mantener rumbo.',
                'optionC' => 'El indicador TO/FROM cambiará a FLAG por falla de señal portadora.',
                'optionD' => 'La aeronave se encuentra a la derecha y debe alejarse con viraje a la izquierda.',
                'optionE' => 'Indica que el DME ha alcanzado el cono de silencio de la radioayuda.',
            ],
            [
                'title' => 'Piloto Comercial (PCA) - Fase Teórica UAEAC',
                'area' => 'Navegación Aérea y Radionavegación',
                'question' => '¿Cuál es la diferencia entre la Altitud de Presión (Pressure Altitude) y la Altitud de Densidad (Density Altitude)?',
                'answer' => 'B',
                'optionA' => 'La Altitud de Presión está corregida por viento y la Altitud de Densidad por error de compresión.',
                'optionB' => 'La Altitud de Densidad es la Altitud de Presión corregida por desviaciones de la temperatura respecto a la atmósfera estándar (ISA).',
                'optionC' => 'La Altitud de Densidad es siempre menor que la altitud indicada cuando la temperatura ambiente es superior a ISA.',
                'optionD' => 'No existe diferencia; son términos sinónimos en la carta de rendimiento de despegue.',
                'optionE' => 'La Altitud de Presión se lee exclusivamente con el altímetro ajustado en QNH local.',
            ],
            [
                'title' => 'Piloto Comercial (PCA) - Fase Teórica UAEAC',
                'area' => 'Motores, Instrumentos y Sistemas de Aeronaves',
                'question' => 'Si el orificio de impacto del tubo Pitot se bloquea por formación de hielo pero la toma estática permanece libre, ¿cómo se comportará el Indicador de Velocidad (ASI)?',
                'answer' => 'C',
                'optionA' => 'Indicará cero nudos de manera permanente en todas las fases de vuelo.',
                'optionB' => 'Continuará marcando la velocidad real de vuelo sin ninguna desviación.',
                'optionC' => 'Actuará como un altímetro: indicará aumento de velocidad al ascender y disminución al descender.',
                'optionD' => 'Actuará en sentido opuesto: indicará velocidad máxima en descenso y cero en ascenso.',
                'optionE' => 'Generará una advertencia intermitente de sobrevelocidad en el sistema primario.',
            ],
            [
                'title' => 'Piloto Comercial (PCA) - Fase Teórica UAEAC',
                'area' => 'Motores, Instrumentos y Sistemas de Aeronaves',
                'question' => '¿Cuál es el propósito primordial del sistema de encendido dual por magnetos independientes en motores de combustión interna de aviación?',
                'answer' => 'A',
                'optionA' => 'Garantizar redundancia operativa de seguridad y mejorar la eficiencia térmica de combustión en los cilindros.',
                'optionB' => 'Alimentar la barra principal de corriente continua cuando falla el alternador.',
                'optionC' => 'Permitir el encendido asistido por batería durante operaciones de crucero a alta cota.',
                'optionD' => 'Sincronizar el paso de la hélice de velocidad constante con el régimen de RPM.',
                'optionE' => 'Eliminar la formación de hielo en la mariposa del carburador.',
            ],
            [
                'title' => 'Piloto Comercial (PCA) - Fase Teórica UAEAC',
                'area' => 'Factores Humanos y CRM',
                'question' => 'En el modelo de Gestión de Recursos en Cabina (CRM), ¿cuál es el significado del concepto de Conciencia Situacional (Situational Awareness)?',
                'answer' => 'D',
                'optionA' => 'La habilidad psicomotriz para volar bajo condiciones de turbulencia severa.',
                'optionB' => 'El cumplimiento mecánico estricto de las listas de chequeo antes del vuelo.',
                'optionC' => 'La capacidad de comunicarse exclusivamente mediante fraseología aeronáutica OACI.',
                'optionD' => 'La percepción precisa de los factores ambientales, el estado de la aeronave, el tiempo y la proyección de su estado en el futuro próximo.',
                'optionE' => 'La ausencia total de errores humanos durante la operación de vuelo.',
            ],
            [
                'title' => 'Piloto Comercial (PCA) - Fase Teórica UAEAC',
                'area' => 'Factores Humanos y CRM',
                'question' => '¿A qué altitud de cabina no presurizada la reglamentación exige el uso continuo de oxígeno suplementario para la tripulación de vuelo?',
                'answer' => 'B',
                'optionA' => 'Por encima de 8.000 pies MSL en todo momento.',
                'optionB' => 'Por encima de 10.000 pies MSL si el vuelo supera 30 minutos, y obligatoriamente por encima de 12.000 pies MSL en todo momento.',
                'optionC' => 'Únicamente por encima de 18.000 pies MSL (Nivel de Vuelo FL180).',
                'optionD' => 'Por encima de 5.000 pies MSL durante vuelos nocturnos.',
                'optionE' => 'Solamente cuando se presenten síntomas clínicos agudos de hipoxia hipóxica.',
            ],

            // ==========================================
            // EXAM 2: Piloto Privado (PPA) - Fundamentos Aeronáuticos
            // ==========================================
            [
                'title' => 'Piloto Privado (PPA) - Fundamentos Aeronáuticos',
                'area' => 'Reglamentación Aeronáutica de Colombia (RAC)',
                'question' => '¿Cuáles son los mínimos meteorológicos básicos para operar un vuelo bajo Reglas de Vuelo Visual (VFR) en espacio aéreo clase G por debajo de 10.000 pies MSL?',
                'answer' => 'A',
                'optionA' => 'Visibilidad en vuelo de 5 km (3 millas estatutas) y distancia de nubes de 1.500 m horizontal y 1.000 pies vertical.',
                'optionB' => 'Visibilidad de 1 km y libre de nubes a cualquier altitud.',
                'optionC' => 'Visibilidad de 10 km y techo de nubes no inferior a 3.000 pies AGL.',
                'optionD' => 'No existen mínimos; el piloto al mando determina la condición visual según su criterio.',
                'optionE' => 'Visibilidad de 8 millas y separación vertical de nubes de 2.000 pies.',
            ],
            [
                'title' => 'Piloto Privado (PPA) - Fundamentos Aeronáuticos',
                'area' => 'Aerodinámica y Principios de Vuelo',
                'question' => '¿Cuáles son las cuatro fuerzas fundamentales que actúan sobre un avión en vuelo recto y nivelado no acelerado?',
                'answer' => 'B',
                'optionA' => 'Gravedad, Fricción, Inercia y Fuerza Centrípeta.',
                'optionB' => 'Sustentación (Lift), Peso (Weight), Tracción o Empuje (Thrust) y Resistencia (Drag).',
                'optionC' => 'Potencia, Ángulo de Ataque, Momento de Cabeceo y Flotabilidad.',
                'optionD' => 'Camber, Cuerda Alar, Viento Relativo y Efecto Suelo.',
                'optionE' => 'Torque giroscópico, P-factor, Empuje asimétrico y Fuerza lateral.',
            ],
            [
                'title' => 'Piloto Privado (PPA) - Fundamentos Aeronáuticos',
                'area' => 'Aerodinámica y Principios de Vuelo',
                'question' => 'El Efecto Suelo (Ground Effect) experimentado por un avión al volar a una altura inferior a la envergadura de sus alas produce:',
                'answer' => 'C',
                'optionA' => 'Una reducción drástica de la sustentación y riesgo inmediato de pérdida al despegue.',
                'optionB' => 'Un aumento de la resistencia inducida debido a vórtices de punta de ala más grandes.',
                'optionC' => 'Una disminución de la resistencia inducida, provocando que el avión tienda a flotar sobre la pista.',
                'optionD' => 'Un bloqueo instantáneo de las superficies de control aerodinámico.',
                'optionE' => 'Una pérdida de efectividad en el timón de dirección y en los alerones.',
            ],
            [
                'title' => 'Piloto Privado (PPA) - Fundamentos Aeronáuticos',
                'area' => 'Meteorología Aeronáutica',
                'question' => 'El ajuste altimétrico estándar en la escala de presión barométrica para altímetros de aeronaves a nivel del mar internacional (ISA) es:',
                'answer' => 'B',
                'optionA' => '1013.25 mmHg o 28.92 pulgadas de mercurio.',
                'optionB' => '1013.25 hPa (milibares) o 29.92 pulgadas de mercurio (inHg).',
                'optionC' => '1000.00 hPa o 30.00 inHg.',
                'optionD' => '1025.50 hPa o 29.50 inHg.',
                'optionE' => '980.00 hPa o 27.80 inHg.',
            ],
            [
                'title' => 'Piloto Privado (PPA) - Fundamentos Aeronáuticos',
                'area' => 'Navegación Aérea y Radionavegación',
                'question' => 'El rumbo magnético (Magnetic Heading) se obtiene aplicando al rumbo verdadero (True Heading):',
                'answer' => 'A',
                'optionA' => 'La variación o declinación magnética local (Isógonas: West suma, East resta).',
                'optionB' => 'El desvío magnético propio de la brújula de la aeronave.',
                'optionC' => 'El ángulo de deriva por viento en ruta.',
                'optionD' => 'El error de aceleración y desaceleración del giróscopo direccional.',
                'optionE' => 'La corrección de meridiano de convergencia polar.',
            ],
            [
                'title' => 'Piloto Privado (PPA) - Fundamentos Aeronáuticos',
                'area' => 'Motores, Instrumentos y Sistemas de Aeronaves',
                'question' => '¿Cuál es el primer síntoma perceptible de formación de hielo en el carburador en un avión con hélice de paso fijo?',
                'answer' => 'D',
                'optionA' => 'Un incremento brusco de la presión de admisión del motor.',
                'optionB' => 'Un recalentamiento de la temperatura de aceite del cárter.',
                'optionC' => 'Una disminución repentina de la velocidad indicada con aumento de RPM.',
                'optionD' => 'Una pérdida gradual de revoluciones por minuto (RPM) del motor acompañada de funcionamiento irregular.',
                'optionE' => 'Falla inmediata de las bombas mecánicas de combustible.',
            ],
            [
                'title' => 'Piloto Privado (PPA) - Fundamentos Aeronáuticos',
                'area' => 'Factores Humanos y CRM',
                'question' => '¿Qué actitud peligrosa (Hazardous Attitude) se define como: "No me digas qué hacer, las reglas no aplican para mí"?',
                'answer' => 'A',
                'optionA' => 'Anti-autoridad (Antiauthority). Su antídoto es: "Sigue las reglas, suelen tener la razón".',
                'optionB' => 'Impulsividad (Impulsivity). Su antídoto es: "No tan rápido, piensa primero".',
                'optionC' => 'Invulnerabilidad (Invulnerability). Su antídoto es: "A mí también me puede pasar".',
                'optionD' => 'Macho (Macho). Su antídoto es: "Tomar riesgos innecesarios es una tontería".',
                'optionE' => 'Resignación (Resignation). Su antídoto es: "No estoy indefenso, puedo marcar la diferencia".',
            ],
            [
                'title' => 'Piloto Privado (PPA) - Fundamentos Aeronáuticos',
                'area' => 'Reglamentación Aeronáutica de Colombia (RAC)',
                'question' => 'En el circuito de tránsito de aeródromo estándar para operaciones visuales (VFR), los virajes reglamentarios se ejecutan:',
                'answer' => 'B',
                'optionA' => 'Hacia la derecha en todas las fases del patrón.',
                'optionB' => 'Hacia la izquierda, a menos que la carta o la torre de control indiquen patrón derecho.',
                'optionC' => 'Hacia el lado que indique el viento relativo de la manga.',
                'optionD' => 'Libremente a criterio del piloto al mando según el tráfico circundante.',
                'optionE' => 'Siempre hacia el este magnético independiente de la orientación de pista.',
            ],
        ];

        foreach ($questions as $q) {
            Questions::updateOrCreate(
                [
                    'title' => $q['title'],
                    'question' => $q['question'],
                ],
                $q
            );
        }
    }
}
