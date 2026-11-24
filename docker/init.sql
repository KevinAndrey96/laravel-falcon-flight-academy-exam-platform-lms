-- Falcon Escuela de Aviación | Pilot Examination & Certification LMS
-- Schema & Seed Data for MySQL 5.7 / 8.0
-- Standard UAEAC / RAC Pilot Evaluation Questions

CREATE DATABASE IF NOT EXISTS `falcon_flight_academy` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `falcon_flight_academy`;

-- Users Table
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Questions Table
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optionA` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `optionB` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optionC` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optionD` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optionE` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert Default Instructor & Student Pilot (passwords: Falcon2024* / Piloto2024*)
INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Capitán Instructor Falcon', 'admin@falconaviacion.edu.co', 'Admin', '$2y$10$vNl1O8eO7X1V7V4i4bE7lO5C1c.xX7s2H9o0p1q2r3s4t5u6v7w8x', NOW(), NOW()),
(2, 'Estudiante Piloto Comercial', 'piloto@falconaviacion.edu.co', 'User', '$2y$10$wOl2P9fP8Y2W8W5j5cF8mP6D2d.yY8t3I0p1q2r3s4t5u6v7w8x9y', NOW(), NOW())
ON DUPLICATE KEY UPDATE `name`=VALUES(`name`);

-- Insert Official Aviation Exam Questions
INSERT INTO `questions` (`id`, `title`, `area`, `question`, `answer`, `optionA`, `optionB`, `optionC`, `optionD`, `optionE`, `created_at`, `updated_at`) VALUES
(1, 'Piloto Comercial (PCA) - Fase Teórica UAEAC', 'Reglamentación Aeronáutica de Colombia (RAC)', 
 'De acuerdo con el RAC 61 y las normas UAEAC, ¿cuál es el mínimo de horas totales de vuelo requeridas para optar a la licencia de Piloto Comercial de Avión (PCA)?', 
 'C', 
 '150 horas de vuelo registradas y certificadas.', 
 '180 horas de vuelo incluyendo 30 horas de simulador FTD.', 
 '200 horas de vuelo (o 150 horas si se completa un curso integrado de instrucción reconocida en un centro RAC 141).', 
 '250 horas de vuelo exclusivamente en aeronaves multimotor.', 
 '300 horas bajo supervisión directa de un instructor certificado.', NOW(), NOW()),

(2, 'Piloto Comercial (PCA) - Fase Teórica UAEAC', 'Reglamentación Aeronáutica de Colombia (RAC)', 
 '¿Cuál es la reserva reglamentaria de combustible obligatoria para un vuelo IFR (Reglas de Vuelo por Instrumentos) según los Reglamentos Aeronáuticos de Colombia?', 
 'B', 
 'Combustible para volar al destino más 30 minutos a régimen normal de crucero.', 
 'Combustible hasta el aeródromo de destino, de allí al aeródromo de alternativa más 45 minutos a velocidad de crucero normal.', 
 'Combustible hasta el destino y 60 minutos de espera a velocidad de sostenimiento.', 
 'Combustible hasta el destino más 15% de contingencia en ruta.', 
 'Combustible hasta el alterno más 20 minutos con empuje de descenso.', NOW(), NOW()),

(3, 'Piloto Comercial (PCA) - Fase Teórica UAEAC', 'Aerodinámica y Principios de Vuelo', 
 '¿Qué efecto produce un incremento en el ángulo de ataque más allá del ángulo crítico de pérdida (Stall Angle)?', 
 'A', 
 'La separación rápida de la capa límite en el extradós del perfil alar y una disminución brusca de la sustentación (CL).', 
 'Un aumento cuadrático de la sustentación acompañado de una reducción de la resistencia inducida.', 
 'Un desplazamiento del centro de presiones hacia el borde de ataque que incrementa la estabilidad longitudinal.', 
 'Un incremento instantáneo de la velocidad indicada (IAS) debido al menor arrastre parásito.', 
 'Una transición inmediata de sustentación aerodinámica a compresión dinámica supersónica.', NOW(), NOW()),

(4, 'Piloto Comercial (PCA) - Fase Teórica UAEAC', 'Aerodinámica y Principios de Vuelo', 
 'En viraje coordinado a nivel de vuelo constante, el factor de carga (Load Factor / G-load) a 60 grados de inclinación alar (Bank Angle) es exactamente:', 
 'C', 
 '1.41 G', 
 '1.73 G', 
 '2.00 G (la velocidad de pérdida se incrementa en un 41%).', 
 '2.50 G', 
 '3.00 G', NOW(), NOW()),

(5, 'Piloto Comercial (PCA) - Fase Teórica UAEAC', 'Meteorología Aeronáutica', 
 'En un informe meteorológico aeronáutico de rutina (METAR), ¿qué indica el grupo "WS COND BLW 2000FT RWY 13R"?', 
 'D', 
 'Viento en superficie de calma con visibilidad reducida por niebla.', 
 'Pista mojada con coeficiente de frenado medio inferior a 2000 metros.', 
 'Visibilidad horizontal de 2000 pies por humo o ceniza volcánica.', 
 'Condición de cortante de viento (Windshear) por debajo de 2.000 pies en la aproximación a la pista 13 derecha.', 
 'Viento cruzado de 20 nudos sostenido a lo largo de toda la pista.', NOW(), NOW()),

(6, 'Piloto Comercial (PCA) - Fase Teórica UAEAC', 'Meteorología Aeronáutica', 
 '¿Cuál de los siguientes fenómenos meteorológicos representa el mayor peligro inmediato para una aeronave en despegue o aproximación final?', 
 'B', 
 'Niebla de radiación matutina con visibilidad mayor a 1 milla.', 
 'Micro-ráfaga descendente (Microburst) asociada a nubes de desarrollo convectivo severo (Cumulonimbus).', 
 'Inversión térmica débil a 4.000 pies AGL.', 
 'Presencia de cúmulos de buen tiempo (Cumulus humilis).', 
 'Precipitación ligera estratiforme sin turbulencia asociada.', NOW(), NOW()),

(7, 'Piloto Comercial (PCA) - Fase Teórica UAEAC', 'Navegación Aérea y Radionavegación', 
 'Durante la interceptación de un radial FROM en una estación VOR (VHF Omnidirectional Range), si la aguja CDI está desviada a la derecha y el selector OBS está en el radial deseado:', 
 'A', 
 'La aeronave se encuentra a la izquierda del curso radial y debe virar a la derecha para interceptarlo.', 
 'La aeronave está exactamente sobre la línea de posición y debe mantener rumbo.', 
 'El indicador TO/FROM cambiará a FLAG por falla de señal portadora.', 
 'La aeronave se encuentra a la derecha y debe alejarse con viraje a la izquierda.', 
 'Indica que el DME ha alcanzado el cono de silencio de la radioayuda.', NOW(), NOW()),

(8, 'Piloto Comercial (PCA) - Fase Teórica UAEAC', 'Motores, Instrumentos y Sistemas de Aeronaves', 
 'Si el orificio de impacto del tubo Pitot se bloquea por formación de hielo pero la toma estática permanece libre, ¿cómo se comportará el Indicador de Velocidad (ASI)?', 
 'C', 
 'Indicará cero nudos de manera permanente en todas las fases de vuelo.', 
 'Continuará marcando la velocidad real de vuelo sin ninguna desviación.', 
 'Actuará como un altímetro: indicará aumento de velocidad al ascender y disminución al descender.', 
 'Actuará en sentido opuesto: indicará velocidad máxima en descenso y cero en ascenso.', 
 'Generará una advertencia intermitente de sobrevelocidad en el sistema primario.', NOW(), NOW()),

(9, 'Piloto Privado (PPA) - Fundamentos Aeronáuticos', 'Reglamentación Aeronáutica de Colombia (RAC)', 
 '¿Cuáles son los mínimos meteorológicos básicos para operar un vuelo bajo Reglas de Vuelo Visual (VFR) en espacio aéreo clase G por debajo de 10.000 pies MSL?', 
 'A', 
 'Visibilidad en vuelo de 5 km (3 millas estatutas) y distancia de nubes de 1.500 m horizontal y 1.000 pies vertical.', 
 'Visibilidad de 1 km y libre de nubes a cualquier altitud.', 
 'Visibilidad de 10 km y techo de nubes no inferior a 3.000 pies AGL.', 
 'No existen mínimos; el piloto al mando determina la condición visual según su criterio.', 
 'Visibilidad de 8 millas y separación vertical de nubes de 2.000 pies.', NOW(), NOW()),

(10, 'Piloto Privado (PPA) - Fundamentos Aeronáuticos', 'Aerodinámica y Principios de Vuelo', 
 '¿Cuáles son las cuatro fuerzas fundamentales que actúan sobre un avión en vuelo recto y nivelado no acelerado?', 
 'B', 
 'Gravedad, Fricción, Inercia y Fuerza Centrípeta.', 
 'Sustentación (Lift), Peso (Weight), Tracción o Empuje (Thrust) y Resistencia (Drag).', 
 'Potencia, Ángulo de Ataque, Momento de Cabeceo y Flotabilidad.', 
 'Camber, Cuerda Alar, Viento Relativo y Efecto Suelo.', 
 'Torque giroscópico, P-factor, Empuje asimétrico y Fuerza lateral.', NOW(), NOW()),

(11, 'Piloto Privado (PPA) - Fundamentos Aeronáuticos', 'Aerodinámica y Principios de Vuelo', 
 'El Efecto Suelo (Ground Effect) experimentado por un avión al volar a una altura inferior a la envergadura de sus alas produce:', 
 'C', 
 'Una reducción drástica de la sustentación y riesgo inmediato de pérdida al despegue.', 
 'Un aumento de la resistencia inducida debido a vórtices de punta de ala más grandes.', 
 'Una disminución de la resistencia inducida, provocando que el avión tienda a flotar sobre la pista.', 
 'Un bloqueo instantáneo de las superficies de control aerodinámico.', 
 'Una pérdida de efectividad en el timón de dirección y en los alerones.', NOW(), NOW()),

(12, 'Piloto Privado (PPA) - Fundamentos Aeronáuticos', 'Meteorología Aeronáutica', 
 'El ajuste altimétrico estándar en la escala de presión barométrica para altímetros de aeronaves a nivel del mar internacional (ISA) es:', 
 'B', 
 '1013.25 mmHg o 28.92 pulgadas de mercurio.', 
 '1013.25 hPa (milibares) o 29.92 pulgadas de mercurio (inHg).', 
 '1000.00 hPa o 30.00 inHg.', 
 '1025.50 hPa o 29.50 inHg.', 
 '980.00 hPa o 27.80 inHg.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `title`=VALUES(`title`);
