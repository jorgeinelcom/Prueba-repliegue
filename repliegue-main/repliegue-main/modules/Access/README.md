# AccessControl
Access control es un módulo para el registro y visualización de los ingresos a las plataformas Inelcom

<br /><br />


> **⚠ Importante: Antes de implementar**  
> 1. Este módulo es compatible solo con las plataformas que realicen Login mediante el modelo LoginForm, <br>ya que accede a los datos de usuario mediante las propiedades [Yii::$app->user->identity]
> 2. Se requiere tener instalado el widget export Menu de kartik-v ["kartik-v/yii2-export": "dev-master"]
> 3. Se requiere tener instanciado el gridview dentro de modules en config.php
>  ```
>      'gridview' => ['class' => 'kartik\grid\Module'],
> ```

<br /><br />

## Implementando el modulo


1. Copia la carpeta Acces dentro de la carpeta modules de tu proyecto

2. Añade este módulo en la configuración del archivo web.php copiando el siguiente código dentro del arreglo modules

        'Access' => [
            'class' => 'app\modules\Access\Access',
        ],


3. Importa el InsertController en  de los controladores que registran los ingresos

    ```
        use app\modules\Access\controllers\InsertController
    ```


4. Llama a la función actionAdd desde donde se requiera registrar el ingreso indicando el id de la interacción que se está realizando

      ```
        InsertController::actionAdd(1); #Llama a la función y pasa como parámetro 1 (Login)
      ```


5. Crear las tablas correspondientes en la base de datos

        1. Tabla de Interacciones, Almacena los tipos de interacciones que se registraran,
        por defecto parte con login y logout

            CREATE TABLE IF NOT EXISTS `access_interactions` (
              `id_interaction` int(11) NOT NULL,
              `name` varchar(45) NOT NULL,
              `description` varchar(145) NOT NULL,
              `date` datetime DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

            --
            -- Indices de la tabla `access_interactions`
            --
            ALTER TABLE `access_interactions`
              ADD PRIMARY KEY (`id_interaction`);

            ALTER TABLE `access_interactions`
				        MODIFY `id_interaction` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;


            --
            -- Volcado de datos para la tabla `access_interactions`
            --

            INSERT INTO `access_interactions` (`id_interaction`, `name`, `description`, `date`) VALUES
            (1, 'Ingreso', 'Acceso al sistema', '2021-06-23 14:25:13'),
            (2, 'Salida', 'Salida del sistema', '2021-06-23 14:25:13');

        --------------------------------------------------------------------------------------------------------

        2. Tabla access_control almacena los ingresos al sistema y es usada para mostrar la data de los ingresos

            CREATE TABLE IF NOT EXISTS `access_control` (
            `id_access` int(11) NOT NULL,
            `rut_usuario` varchar(45) NOT NULL,
            `username` varchar(45) NOT NULL,
            `id_interaction` int(11) NOT NULL,
            `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;


            ALTER TABLE `access_control`
            ADD PRIMARY KEY (`id_access`),
            ADD KEY `fk_interactions_fk_idx` (`id_interaction`);

            ALTER TABLE `access_control`
            ADD CONSTRAINT `fk_interactions_fk` FOREIGN KEY (`id_interaction`) REFERENCES `access_interactions` (`id_interaction`) ON DELETE NO ACTION ON UPDATE NO ACTION;

            ALTER TABLE `access_control`
            MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;




<br /><br />

## Visualizando los datos
Para acceder a la visualización de los datos ingresar redireccionar a la url [index.php?r=Access](https://index.php?r=Access).
