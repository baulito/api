

# OnBoarding Process

La propuesta busca simplificar el mantenimiento y administración de los procesos de onboarding.
En términos generales y a manera de estructura de interacción un onboarding consta de:

1. Un panel de conversaciones en donde el sistema plantea una pregunta al usuario y el usuario responde
conforme al tipo de pregunta. En este contexto se tienen preguntas de los siguientes tipos:
    - Abiertas: En este caso el usuario debe simplemente ingresar su respuesta en una caja de entrada. Estas cajas de entrada
    pueden hacer referencia a tipos de datos distintos, así los tipos de respuesta abierta gestionan:
        - Texto corto.
        - Números. Pueden ser incluso decimales
        - Texto largo, en cuyo caso se presenta al usuario un textbox.
    - Cerradas: Esto significa que al usuario se  le dan un conjunto de posibilidades de las cuales el puede escoger. Dentro de este 
    contexto las preguntas pueden seguir el siguiente formato:
        - Lista. El usuario puede seleccionar un elemento de una lista.
        - Lista Múltiple: El usuario puede seleccionar varios elementos de la lista.
        - Lista de Opciones tipo Radio button. Para muy pocas opciones.
        - Foto. El usuario debe subir una foto durante el proceso.
2. Un panel de soporte contextual que permite al usuario informarse del sentido o las posibilidades que ofrece la pregunta activa.
    - Una pregunta se activa cuando el usuario explícitamente la activa al hacerle click o cuando es la última pregunta
    que el sistema arroja.
    
3. El proceso de onboarding establece un conjunto de preguntas base que todo onboarding debe tener. En este sentido en TOGROOW existen
genéricamente 2 tipos de onboarding.
    1. De usuarios.
    2. De negocios.

    NOTA: Cada red puede definir campos adicionales a los perfiles de usuario que se denominan información extendida del perfil, pero
    siempre captura los datos básicos necesarios para TOGROOW. Estos son: 
    1. Perfil Usuario:
        - Red Base
        - Tipo Perfil
        - Nombres
        - Correo Electrónico
        - Teléfono de Contacto
        - Dirección
        - Estado
        - Descripción
        - Imagen de Perfil
        - Imagen Fondo de Perfil
    2. Perfil de Negocio:
        - Nombre del Negocio
        - Tipo de Negocio. Persona Jurídica/Persona Natural
        - Dirección 
        - Teléfono de Contacto
        - Nombre del Contacto Principal
        - Correo de Contacto.
        - Tipo de Empresa --> Varía de acuerdo a las características de la red a la que pertenece orginalmente.
    
    NOTA:Cada perfil extiende sus atributos de los anteriores.
    
# Modelo de Perfiles. 

   Los perfiles tienen una estructura del tipo:
   
   Perfil Base
   - Atributos Perfil Base
   
   Tipo Perfil (Perfil Negocio, Perfil Personal)
   
   Extensiónes 
    - Tipo Perfil
    - Red 
    - Atributos extendidos
    
# Modelo de Onboarding.

El modelo de Onboarding se estructura a través de 3 elementos persistentes.
- OnBoarding
- PreguntasOnboarding
- RespuestasOnboarding
- SecuenciaPreguntas

- OnBoarding contempla los siguientes campos
    - IdOnboarding
    - Nombre
    - Estado
    - Tipo - G/E (Genérico/Específico)- En cuyo caso se puede usar para varias redes. Si el onboarding es específico entonces se ajusta a la red.  
    - Red - Si es genérico este campo no se usa, de lo contrario almacena el id de la red.

- PreguntaOnboarding persiste de la siguiente forma:
    - IdOnboarding
    - IdPregunta
    - Pregunta
    - EsBase?
    - ClasePregunta (a,c)
    - TipoPregunta (text, number, longtext, list, multi, radio, file, photo)
    - TablaOpciones
    - Opciones. Opcional si se quieren manejar las opciones directamente.
    - CampoOpciones
    - Requerido
   

## Proceso
- Cuando el usuario ingresa por una acción de crear usuario o perfil se debe enviar como parámetro la red base y el tipo de perfil.
- El controlador recibe estos datos y consulta en la base de datos en la tabla PreguntasOnboarding las preguntas base correspondientes
al proceso y las preguntas extendidas del proceso. Nótese que todas las preguntas tienen un indicador que establece si onboarding a relizar es 
base o no además del id del onboarding.
- El cliente recibe la lista de todas las preguntas señalando cual es la primera.
- Cada vez que el usuario en el cliente responde una pregunta invoca al servidor para determinar la secuencia del indicador de la siguiente
pregunta     
- 
    
   
        
