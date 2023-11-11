<?php

require_once 'config.php';

class Model {
  protected $db;

  public function __construct() {
    $this->db = new PDO ("mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8", MYSQL_USER, MYSQL_PASS);
    $this->deploy();
  }

  private function deploy() {
    $query = $this->db->query('SHOW TABLES');
    $tables = $query->fetchAll();
    if(count($tables) == 0) {
      $sql =<<<END

      CREATE TABLE `camisetas` (
        `id` int(10) NOT NULL,
        `nombre_equipo` varchar(50) NOT NULL,
        `categoria_camiseta` varchar(50) NOT NULL,
        `tipo_camiseta` varchar(50) NOT NULL,
        `imagen` varchar(200) NOT NULL,
        `id_decada` int(11) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
      
      --
      -- Volcado de datos para la tabla `camisetas`
      --
      
      INSERT INTO `camisetas` (`id`, `nombre_equipo`, `categoria_camiseta`, `tipo_camiseta`, `imagen`, `id_decada`) VALUES
      (92, 'Barcelona', 'Club', 'Titular', 'https://classic-shirts.com/eng_pl_1984-89-FC-BARCELONA-SHIRT-S-134413_1.jpg', 3),
      (94, 'Paraguay', 'Seleccion', 'Alternativa', 'https://2.bp.blogspot.com/-lIDAQtHrm6Y/Tbd2_j89EUI/AAAAAAAABoE/-pyoY4KdQmU/s1600/Paraguay+2.png', 5),
      (97, 'Real Madrid', 'Club', 'Titular', 'https://estaticos01.marca.com/imagenes/2011/04/19/futbol/copa_rey/1303215006_0.jpg', 2),
      (99, 'Milan', 'Club', 'Titular', 'https://www.91futbol.com/images/2021/11-2/20Retro-308.jpg', 4),
      (100, 'Ajax', 'Club', 'Titular', 'https://http2.mlstatic.com/D_NQ_NP_2X_626343-MLB41791304656_052020-F.jpg', 1),
      (102, 'Milan', 'Club', 'Alternativa', 'https://aguerocamisetas.cl/wp-content/uploads/2021/03/bd8b6b8c.jpg', 5),
      (104, 'Argentina', 'Seleccion', 'Alternativa', 'https://aguerocamisetas.cl/wp-content/uploads/2021/03/bd8b6b8c.jpg', 4),
      (105, 'Escocia', 'Club', 'Titular', 'https://cdn.wallapop.com/images/10420/db/lo/__/c10420p805547153/i2762883260.jpg?pictureSize=W640', 4),
      (106, 'Argentina', 'Seleccion', 'Alternativa', 'https://aguerocamisetas.cl/wp-content/uploads/2021/03/bd8b6b8c.jpg', 4),
      (109, 'Brasil', 'Seleccion', 'Titular', 'https://www.footballshirtretro.com/image/cache/catalog/img/brazil/brazil-2002-home-shirt-1-1000x1000.jpg', 5);
      
      -- --------------------------------------------------------
      
      --
      -- Estructura de tabla para la tabla `decadas`
      --
      
      CREATE TABLE `decadas` (
        `id_decada` int(11) NOT NULL,
        `numero_decada` int(11) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
      
      --
      -- Volcado de datos para la tabla `decadas`
      --
      
      INSERT INTO `decadas` (`id_decada`, `numero_decada`) VALUES
      (1, 60),
      (2, 70),
      (3, 80),
      (4, 90),
      (5, 2000),
      (6, 2010);
      
      -- --------------------------------------------------------
      
      --
      -- Estructura de tabla para la tabla `usuarios`
      --
      
      CREATE TABLE `usuarios` (
        `id_usuario` int(250) NOT NULL,
        `nombre_usuario` varchar(50) NOT NULL,
        `contrasenia` varchar(150) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
      
      --
      -- Volcado de datos para la tabla `usuarios`
      --
      
      INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `contrasenia`) VALUES
      (2, 'webadmin', '$2y$10\$Gaw0.eIGIG8BQ8fMbkpNq.PFJ3z8yk0SFCM1eeVHnnRIUh41W41B2');
      
      --
      -- Índices para tablas volcadas
      --
      
      --
      -- Indices de la tabla `camisetas`
      --
      ALTER TABLE `camisetas`
        ADD PRIMARY KEY (`id`),
        ADD KEY `decadas_id` (`id_decada`);
      
      --
      -- Indices de la tabla `decadas`
      --
      ALTER TABLE `decadas`
        ADD PRIMARY KEY (`id_decada`);
      
      --
      -- Indices de la tabla `usuarios`
      --
      ALTER TABLE `usuarios`
        ADD PRIMARY KEY (`id_usuario`);
      
      --
      -- AUTO_INCREMENT de las tablas volcadas
      --
      
      --
      -- AUTO_INCREMENT de la tabla `camisetas`
      --
      ALTER TABLE `camisetas`
        MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
      
      --
      -- AUTO_INCREMENT de la tabla `decadas`
      --
      ALTER TABLE `decadas`
        MODIFY `id_decada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2012;
      
      --
      -- AUTO_INCREMENT de la tabla `usuarios`
      --
      ALTER TABLE `usuarios`
        MODIFY `id_usuario` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
      
      --
      -- Restricciones para tablas volcadas
      --
      
      --
      -- Filtros para la tabla `camisetas`
      --
      ALTER TABLE `camisetas`
        ADD CONSTRAINT `decadas_id` FOREIGN KEY (`id_decada`) REFERENCES `decadas` (`id_decada`);
      COMMIT;
      END;
      $this->db->query($sql);
            }
        }
    }