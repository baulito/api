# Análisis de Objetos Modelo Sportodos.

##  OBJETOS TOGROOW
- Usuario
- Ciudad
- País
- Post
- Negocio
- PerfilNegocioDeportivo

## OBJETOS SPORTODOS

- UsuarioSportodos - OK
- Deporte - OK
- BarreraDeportiva -OK
- Punto - OK
- Espacio - OK
- Tarifa - OK
- Servico - OK
- Reto - OK
- Equipo - OK
- Torneo - OK
- Reserva - OK
- CalificacionReto
- CalificacionDeportista
- CalificacionEspacio
- NegocioSportodos
- Zona - OK
- Iniciativa 

***


# Especificación de Modelos

## UsuarioSportodos

``
export interface UsuarioSportodos {
    - usuario: User // REferencia a Usuario TOGROOW referencia a user_id en User FK campo es foraneo y tiene una relación 1-1 con User a través user_id
    - peso: numerico
    - altura: numerico
    - barreras: Barrera[]; 1 o n 
    - deportes: Deporte[]; 1 o n
    - equipos: Equipo[]; 0 ó n
    - calificacion: Calificacion via calificacion_id;
}
``

## Relaciones
- Barrera: Relacion muchos a muchos
- Deporte: Relacion muchos a muchos
- Equipo: Relacion uno a muchos
- Calificacion: Uno a uno
## Notas
1. La ciudad y dirección del usuario se obtiene a través de User.


## BARRERA
export interface Barrera {
    - id
    - nombre
    - tipo
}

Un usuario tiene multiples barreras y una barrera puede presentarse en varios usuarios.
Tiene entonce una relación n-m;

export interface BarrerasUsuario {
    - id
    - barrera: Barrera. via barrera_id;
    - usuario: UsuarioSportodos. via user_id
}


## DEPORTE
export interface Deporte {
    - id
    - nombre
    - icono
    - posiciones: Posicion[];
}

export interface Posicion {
    - id
    - deporte: Deporte// Referencia a Deporte via deporte_id
    - nombre
}
Un usuario tiene multiples deportes asociados y los deportes son practicados por multiples usuario

export class DeportesUsuario {
    - id
    - usuario: UsuarioSportodos via usuario_id   // user_id en UsuarioSportodos
    - deporte: Deporte via deporte_id   // id en deporte
    - posicion: Posicion via posicion_id  // id en Posicion
}

## EQUIPO

export class Equipo {
    - id
    - nombre
    - deporte: Deporte via deporte_id 
    - dueno: UsuarioSportodos vía user_id en UsuarioSportodos
    - participantes: ParticipanteEquipo[];
    - foto: string; // url
    - banner: string; // url
    - retos: RetoEquipo[];

    // agregar descripcion
    // fotos[]
}

exoport Class ParticipanteEquipo(){
    
}

## SERVICIO

export interface Servicio {
    - id
    - nombre
    - icono
}

## Zona

export interface Zona {
    - id
    - nombre
    - pais : Pais
    - ciudad : Ciudad
}

## PUNTO
export interface Punto {
    - id
    - nombre
    - contacto
    - telefono
    - descripcion
    - direccion
    - pais: Pais
    - ciudad: Ciudad
    - zona: Zona
    - correo
    - longitud:
    - latitud:
    - espacios: Espacio[];
    - calificacion: Calificacion via calificacion_id
}
// Relación muchos a 1 desde Espacios.
// Relación n-m con Deportes pues un deporte puede ser ofrecido en varios Espacios y un espacio puede ofrecer multiples deportes

## ESPACIO
export interface Espacio {
    - id
    - punto: Punto -- via punto id en Punto
    - nombre:
    - deportes: DeporteEspacio[];
    - longitud:
    - latitud:
    - descripcion:
    - tarifas: TarifaEspacio[]
    - bloques: BloqueHorarioEspacio[]
}

export interface DeporteEspacio {
    - id
    - deporte: Deporte via deporte_id;
    - espacio: Espacio via espacio_id;
}


export interface TarifaEspacio {
    - id
    - espacio: Espacio -- via espacio_id;
    - desde:
    - hasta:
    - dias: DiaTarifa[]
    - valor:
}

export interface DiaTarifa {
    - id
    - tarifa: Tarifa via tarifa_id
    - dia:
}

//revision
export interface BloqueHorarioEspacio {
    - id
    - espacio: Espacio via espacio_id
    - desde:
    - hasta:
}



## RETO
export interface Reto {
    - id
    - deporte: Deporte via deporte_id
    - nombre:
    - descripcion:
    - espacio: Espacio via espacio_id
    - visibilidadReto: ABIERTO (Visible), CERRADO (No visible), ACCESO_CONTROLADO (Visible pero requiere autorizacion).
    - tipoReto: Personas, Equipos
    - notas: 
    - fecha:
    - hora:
    - conReserva:
    - reserva: Reserva:
    - tarifa:
    - participantes: ParticipanteReto[]; 
    - calificacion: Calificacion via calificacion_id
}

export ParticipanteEquipo {
    - participante: UsuarioSportodos via participante_id
    - equipo: Equipo via equipo id
}

export ParticipanteReto {
    - participante_id. (equipo_id || usuario_id)
    - reto: Reto via reto_id
    - tipoParticipante: Equipo o un UsuarioSportodos  // Puede ser un Equipo o un ParticipanteEquipo o una Persona
    - estado: estado_invitacion -> default sin confirmar
}

## RESERVA
export interface Reserva {
    - id
    - negocio: Negocio
    - espacio: Espacio
    - desde:
    - hasta:
    - estado:
    - tarifa: TarifaEspacio
    - usuario: UsuarioSportodos via user_id
    - reto?
}

## TORNEOS
export interface Torneo {
    - id
    - nombre
    - creador: UsuarioSportodos
    - descripcion:
    - participantes: ParticipanteEquipo
    - desde:
    - hasta:
    - agenda: AgendaTorneo
}

export interface ParticipanteTorneo {
    - id
    - torneo: Torneo via torneo_id
    - tipoParticipante:
    - participante_id.
}

export interface AgendaTorneo {
    - id
    - torneo: Torneo via torneo_id
    - fechas: FechaTorneo[];
}

export interface FechaTorneo {
    - id:
    - agenda: AgendaTorneo
    - fecha: 
    - local:ParticipanteTorneo
    - vistante: ParticipanteTorneo
    - resultadoLocal:
    - resultadoVisitante: 
    - calificacion: CalificacionReto
}


//deporte punto
// servicio punto
