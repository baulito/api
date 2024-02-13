---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://api.togroow.local/docs/collection.json)

<!-- END_INFO -->

#Gestion Barreras deportivas

clase  con los servicios listar, crear, editar, eliminar y ver el detalle  para las barreras deportivas tanto para las ambientales como fisicas
<!-- START_d9ac04644d665cc156959ff638a36944 -->
## Funcion para traer el listado de barreras devuelve un json con la informacion de las barreras

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/deportes/barreras" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportes/barreras"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "nombre": "Visual",
        "tipo": 1,
        "created_at": "2021-01-08 20:06:23",
        "updated_at": "2021-01-08 20:06:23"
    },
    {
        "id": 2,
        "nombre": "Auditiva",
        "tipo": 1,
        "created_at": "2021-01-08 20:06:23",
        "updated_at": "2021-01-08 20:06:23"
    },
    {
        "id": 3,
        "nombre": "Habla",
        "tipo": 1,
        "created_at": "2021-01-08 20:06:24",
        "updated_at": "2021-01-08 20:06:24"
    },
    {
        "id": 4,
        "nombre": "Movilidad",
        "tipo": 1,
        "created_at": "2021-01-08 20:06:24",
        "updated_at": "2021-01-08 20:06:24"
    },
    {
        "id": 5,
        "nombre": "Cognición",
        "tipo": 1,
        "created_at": "2021-01-08 20:06:24",
        "updated_at": "2021-01-08 20:06:24"
    },
    {
        "id": 6,
        "nombre": "Psicológica",
        "tipo": 1,
        "created_at": "2021-01-08 20:06:25",
        "updated_at": "2021-01-08 20:06:25"
    },
    {
        "id": 7,
        "nombre": "Requiere atención Especial",
        "tipo": 1,
        "created_at": "2021-01-08 20:06:25",
        "updated_at": "2021-01-08 20:06:25"
    },
    {
        "id": 8,
        "nombre": "Dinero",
        "tipo": 2,
        "created_at": "2021-01-08 20:06:25",
        "updated_at": "2021-01-08 20:06:25"
    },
    {
        "id": 9,
        "nombre": "Condición Física",
        "tipo": 2,
        "created_at": "2021-01-08 20:06:26",
        "updated_at": "2021-01-08 20:06:26"
    },
    {
        "id": 10,
        "nombre": "Salud",
        "tipo": 2,
        "created_at": "2021-01-08 20:06:26",
        "updated_at": "2021-01-08 20:06:26"
    },
    {
        "id": 11,
        "nombre": "Espacios Deportivos",
        "tipo": 2,
        "created_at": "2021-01-08 20:06:27",
        "updated_at": "2021-01-08 20:06:27"
    },
    {
        "id": 12,
        "nombre": "Transporte",
        "tipo": 2,
        "created_at": "2021-01-08 20:06:27",
        "updated_at": "2021-01-08 20:06:27"
    },
    {
        "id": 13,
        "nombre": "Tiempo",
        "tipo": 2,
        "created_at": "2021-01-08 20:06:27",
        "updated_at": "2021-01-08 20:06:27"
    },
    {
        "id": 14,
        "nombre": "Ubicación Geográfica",
        "tipo": 2,
        "created_at": "2021-01-08 20:06:28",
        "updated_at": "2021-01-08 20:06:28"
    },
    {
        "id": 15,
        "nombre": "Discriminación",
        "tipo": 2,
        "created_at": "2021-01-08 20:06:28",
        "updated_at": "2021-01-08 20:06:28"
    },
    {
        "id": 16,
        "nombre": "Falta de Interés",
        "tipo": 2,
        "created_at": "2021-01-08 20:06:28",
        "updated_at": "2021-01-08 20:06:28"
    },
    {
        "id": 18,
        "nombre": "Condiciones de Violencia",
        "tipo": 2,
        "created_at": "2021-01-08 20:06:30",
        "updated_at": "2021-01-08 20:06:30"
    },
    {
        "id": 19,
        "nombre": "Falta de elementos deportivos.",
        "tipo": 2,
        "created_at": "2021-04-06 05:57:08",
        "updated_at": "2021-04-06 05:57:08"
    }
]
```

### HTTP Request
`GET api/sportodos/deportes/barreras`


<!-- END_d9ac04644d665cc156959ff638a36944 -->

<!-- START_ea883e7e67671bcd73fbab3e0119e87f -->
## Funcion para traer el listado de barreras devuelve un json con la informacion de las barreras

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/deportebarrera" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportebarrera"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/deportebarrera`


<!-- END_ea883e7e67671bcd73fbab3e0119e87f -->

<!-- START_9a7f844cbc14b5c9075413f411d7d08d -->
## Funcion que sirve para crear una barrera deportiva

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/deportebarrera/crear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportebarrera/crear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/deportebarrera/crear`


<!-- END_9a7f844cbc14b5c9075413f411d7d08d -->

<!-- START_b786837f6907939d381690bbe5baa3d6 -->
## Funcion para editar una barrera deportiva

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/sportodos/deportebarrera/nobis/editar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportebarrera/nobis/editar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/sportodos/deportebarrera/{id}/editar`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | este parametro recibe el identificador de la barrera que se va editar

<!-- END_b786837f6907939d381690bbe5baa3d6 -->

<!-- START_72cdbc091d64f868e881fd3ca946e3d9 -->
## Funcion para eliminar una barrera deportiva

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/api/sportodos/deportebarrera/voluptatem/eliminar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportebarrera/voluptatem/eliminar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/sportodos/deportebarrera/{id}/eliminar`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | este parametro recibe el identificador de la barrera que se va a eliminar

<!-- END_72cdbc091d64f868e881fd3ca946e3d9 -->

<!-- START_6ce62621b87dc637494b299a45c4e161 -->
## Funcion para retornar la informacion de una barrera en especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/deportebarrera/omnis/detalle" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportebarrera/omnis/detalle"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/deportebarrera/{id}/detalle`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | este parametro recibe el identificador de la barrera que se va retornar

<!-- END_6ce62621b87dc637494b299a45c4e161 -->

#Gestion Categorias para iniciativas

 clase  con los servicios listar, crear, editar, eliminar y ver el detalle  para las categorias de las diferentes iniciativas de sportodos
<!-- START_9f0e5f709bdaa1c354ecfedddcf340ea -->
## funcion para traer el listado de las categorias de iniciativas  retorna un json con la información

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/iniciativas/tipos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/iniciativas/tipos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/iniciativas/tipos`


<!-- END_9f0e5f709bdaa1c354ecfedddcf340ea -->

<!-- START_7e501876f946b0f4abc72e25e295d091 -->
## funcion que sirve para crear una categoria de iniciativa

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/categoriasiniciativas/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/categoriasiniciativas/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/categoriasiniciativas/create`


<!-- END_7e501876f946b0f4abc72e25e295d091 -->

<!-- START_5564a8073fc029d3523676f087e1d854 -->
## Funcion para actualizar una categoria de iniciativa

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/sportodos/categoriasiniciativas/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/categoriasiniciativas/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/sportodos/categoriasiniciativas/{id}/edit`


<!-- END_5564a8073fc029d3523676f087e1d854 -->

<!-- START_10e5230a6836a05996ad4278679c74bf -->
## Funcion para eliminar una categoria

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/api/sportodos/categoriasiniciativas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/categoriasiniciativas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/sportodos/categoriasiniciativas/{id}`


<!-- END_10e5230a6836a05996ad4278679c74bf -->

<!-- START_62ac0befb5cb344402247f4d6cb01e51 -->
## funcion para retornar la informacion de una categoria especifica

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/categoriasiniciativas/detalle/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/categoriasiniciativas/detalle/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/categoriasiniciativas/detalle/{id}`


<!-- END_62ac0befb5cb344402247f4d6cb01e51 -->

<!-- START_97aa102a7d251c1d28924b2d9b1ee0a7 -->
## funcion para traer el listado de las categorias de iniciativas  retorna un json con la información

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/iniciativas/poblaciones" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/iniciativas/poblaciones"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/iniciativas/poblaciones`


<!-- END_97aa102a7d251c1d28924b2d9b1ee0a7 -->

#Gestion de Categorias de negocio

clase que permite ver las diferentes categorias en la que se encuentran los negocios del sistema
<!-- START_6f02ea966d58ca564ad932270fdf5eb5 -->
## listado de categorias a las cuales pueden pertenecer los negocios

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/negocios/categorias/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/negocios/categorias/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/negocios/categorias/all`


<!-- END_6f02ea966d58ca564ad932270fdf5eb5 -->

#Gestion de Comentarios

clase que permite la creacion de los comentarios que se ingresan a los diferentes elementos dentro del sistema
<!-- START_6338ecb32c93aab182d9acb28896c7fb -->
## funcion que retorna el listado de comentarios en el sistema para un elemento especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/posts/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/posts/1/comments"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/posts/{id}/comments`


<!-- END_6338ecb32c93aab182d9acb28896c7fb -->

<!-- START_bc753dd90f72b29228abb040e9873933 -->
## funcion para crear un comentario

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/posts/1/comment/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/posts/1/comment/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/posts/{id}/comment/create`


<!-- END_bc753dd90f72b29228abb040e9873933 -->

#Gestion de Deportes

clase que permite listar crear editar y eliminar un deporte
<!-- START_3cc37ff9da1a3d6bcd0cfc6e9291f0e0 -->
## listado dedeportes que estan cargados en el sistema

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/deportes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "nombre": "Fútbol",
        "icono": "icon-soccer-ball",
        "tipo": 0,
        "minimo": 5,
        "maximo": 16,
        "created_at": "2021-01-08 20:06:07",
        "updated_at": "2021-03-12 12:05:36",
        "posiciones": [
            {
                "id": 1,
                "nombre": "Arquero",
                "deporte_id": 1,
                "created_at": "2021-01-08 20:06:30",
                "updated_at": "2021-01-08 20:06:30"
            },
            {
                "id": 2,
                "nombre": "Defensa",
                "deporte_id": 1,
                "created_at": "2021-01-08 20:06:30",
                "updated_at": "2021-01-08 20:06:30"
            },
            {
                "id": 3,
                "nombre": "Volante",
                "deporte_id": 1,
                "created_at": "2021-01-08 20:06:30",
                "updated_at": "2021-01-08 20:06:30"
            },
            {
                "id": 4,
                "nombre": "Delantero",
                "deporte_id": 1,
                "created_at": "2021-01-08 20:06:31",
                "updated_at": "2021-01-08 20:06:31"
            }
        ]
    },
    {
        "id": 2,
        "nombre": "Baloncesto",
        "icono": "icon-basketball",
        "tipo": 0,
        "minimo": 5,
        "maximo": 10,
        "created_at": "2021-01-08 20:06:08",
        "updated_at": "2021-01-08 20:06:08",
        "posiciones": [
            {
                "id": 9,
                "nombre": "Base",
                "deporte_id": 2,
                "created_at": "2021-01-08 20:06:32",
                "updated_at": "2021-01-08 20:06:32"
            },
            {
                "id": 10,
                "nombre": "Escolta",
                "deporte_id": 2,
                "created_at": "2021-01-08 20:06:33",
                "updated_at": "2021-01-08 20:06:33"
            },
            {
                "id": 11,
                "nombre": "Alero",
                "deporte_id": 2,
                "created_at": "2021-01-08 20:06:33",
                "updated_at": "2021-01-08 20:06:33"
            },
            {
                "id": 12,
                "nombre": "Ala pivot",
                "deporte_id": 2,
                "created_at": "2021-01-08 20:06:33",
                "updated_at": "2021-01-08 20:06:33"
            },
            {
                "id": 13,
                "nombre": "Pivot",
                "deporte_id": 2,
                "created_at": "2021-01-08 20:06:33",
                "updated_at": "2021-01-08 20:06:33"
            }
        ]
    },
    {
        "id": 6,
        "nombre": "Tenis",
        "icono": "icon-tennis-ball",
        "tipo": 0,
        "minimo": 1,
        "maximo": 2,
        "created_at": "2021-01-08 20:06:09",
        "updated_at": "2021-01-08 20:06:09",
        "posiciones": []
    },
    {
        "id": 7,
        "nombre": "Voleibol",
        "icono": "icon-volleyball",
        "tipo": 0,
        "minimo": 5,
        "maximo": 10,
        "created_at": "2021-01-08 20:06:10",
        "updated_at": "2021-01-08 20:06:10",
        "posiciones": [
            {
                "id": 5,
                "nombre": "Libero",
                "deporte_id": 7,
                "created_at": "2021-01-08 20:06:31",
                "updated_at": "2021-01-08 20:06:31"
            },
            {
                "id": 6,
                "nombre": "Armador",
                "deporte_id": 7,
                "created_at": "2021-01-08 20:06:31",
                "updated_at": "2021-01-08 20:06:31"
            },
            {
                "id": 7,
                "nombre": "Remachador",
                "deporte_id": 7,
                "created_at": "2021-01-08 20:06:32",
                "updated_at": "2021-01-08 20:06:32"
            },
            {
                "id": 8,
                "nombre": "Defensa",
                "deporte_id": 7,
                "created_at": "2021-01-08 20:06:32",
                "updated_at": "2021-01-08 20:06:32"
            }
        ]
    },
    {
        "id": 8,
        "nombre": "Béisbol",
        "icono": "icon-baseball",
        "tipo": null,
        "minimo": 9,
        "maximo": 18,
        "created_at": "2021-01-08 20:06:11",
        "updated_at": "2021-01-08 20:06:11",
        "posiciones": [
            {
                "id": 14,
                "nombre": "Lanzador",
                "deporte_id": 8,
                "created_at": "2021-01-08 20:06:33",
                "updated_at": "2021-01-08 20:06:33"
            },
            {
                "id": 15,
                "nombre": "Receptor",
                "deporte_id": 8,
                "created_at": "2021-01-08 20:06:34",
                "updated_at": "2021-01-08 20:06:34"
            },
            {
                "id": 16,
                "nombre": "1 Base",
                "deporte_id": 8,
                "created_at": "2021-01-08 20:06:34",
                "updated_at": "2021-01-08 20:06:34"
            },
            {
                "id": 17,
                "nombre": "2 Base",
                "deporte_id": 8,
                "created_at": "2021-01-08 20:06:34",
                "updated_at": "2021-01-08 20:06:34"
            },
            {
                "id": 18,
                "nombre": "3 Base",
                "deporte_id": 8,
                "created_at": "2021-01-08 20:06:35",
                "updated_at": "2021-01-08 20:06:35"
            },
            {
                "id": 19,
                "nombre": "Campo Corto",
                "deporte_id": 8,
                "created_at": "2021-01-08 20:06:36",
                "updated_at": "2021-01-08 20:06:36"
            },
            {
                "id": 20,
                "nombre": "Jardinero",
                "deporte_id": 8,
                "created_at": "2021-01-08 20:06:37",
                "updated_at": "2021-01-08 20:06:37"
            }
        ]
    },
    {
        "id": 9,
        "nombre": "Rugby",
        "icono": "icon-rugby-ball",
        "tipo": null,
        "minimo": null,
        "maximo": null,
        "created_at": "2021-01-08 20:06:11",
        "updated_at": "2021-01-08 20:06:11",
        "posiciones": [
            {
                "id": 21,
                "nombre": "Pilar",
                "deporte_id": 9,
                "created_at": "2021-01-08 20:06:37",
                "updated_at": "2021-01-08 20:06:37"
            },
            {
                "id": 22,
                "nombre": "Talador",
                "deporte_id": 9,
                "created_at": "2021-01-08 20:06:37",
                "updated_at": "2021-01-08 20:06:37"
            },
            {
                "id": 23,
                "nombre": "Segunda Linea",
                "deporte_id": 9,
                "created_at": "2021-01-08 20:06:37",
                "updated_at": "2021-01-08 20:06:37"
            },
            {
                "id": 24,
                "nombre": "Saguero",
                "deporte_id": 9,
                "created_at": "2021-01-08 20:06:37",
                "updated_at": "2021-01-08 20:06:37"
            },
            {
                "id": 25,
                "nombre": "Flanker",
                "deporte_id": 9,
                "created_at": "2021-01-08 20:06:37",
                "updated_at": "2021-01-08 20:06:37"
            },
            {
                "id": 26,
                "nombre": "Numero 8",
                "deporte_id": 9,
                "created_at": "2021-01-08 20:06:37",
                "updated_at": "2021-01-08 20:06:37"
            },
            {
                "id": 27,
                "nombre": "Apertura",
                "deporte_id": 9,
                "created_at": "2021-01-08 20:06:38",
                "updated_at": "2021-01-08 20:06:38"
            },
            {
                "id": 28,
                "nombre": "Ala",
                "deporte_id": 9,
                "created_at": "2021-01-08 20:06:38",
                "updated_at": "2021-01-08 20:06:38"
            },
            {
                "id": 29,
                "nombre": "1 Centro",
                "deporte_id": 9,
                "created_at": "2021-01-08 20:06:38",
                "updated_at": "2021-01-08 20:06:38"
            }
        ]
    },
    {
        "id": 10,
        "nombre": "Ultimate",
        "icono": "icon-rugby",
        "tipo": null,
        "minimo": null,
        "maximo": null,
        "created_at": "2021-01-08 20:06:11",
        "updated_at": "2021-01-08 20:06:11",
        "posiciones": [
            {
                "id": 30,
                "nombre": "Hangler",
                "deporte_id": 10,
                "created_at": "2021-01-08 20:06:39",
                "updated_at": "2021-01-08 20:06:39"
            },
            {
                "id": 31,
                "nombre": "Medio",
                "deporte_id": 10,
                "created_at": "2021-01-08 20:06:39",
                "updated_at": "2021-01-08 20:06:39"
            },
            {
                "id": 32,
                "nombre": "Deep",
                "deporte_id": 10,
                "created_at": "2021-01-08 20:06:39",
                "updated_at": "2021-01-08 20:06:39"
            }
        ]
    },
    {
        "id": 12,
        "nombre": "Ciclismo",
        "icono": "icon-bike",
        "tipo": 1,
        "minimo": 1,
        "maximo": null,
        "created_at": "2021-01-08 20:06:11",
        "updated_at": "2021-01-08 20:06:11",
        "posiciones": []
    },
    {
        "id": 13,
        "nombre": "Atletismo",
        "icono": "icon-run-shoes",
        "tipo": 1,
        "minimo": null,
        "maximo": null,
        "created_at": "2021-01-08 20:06:12",
        "updated_at": "2021-01-08 20:06:12",
        "posiciones": []
    },
    {
        "id": 14,
        "nombre": "Natación (Waterpolo)",
        "icono": "icon-swimming",
        "tipo": null,
        "minimo": null,
        "maximo": null,
        "created_at": "2021-01-08 20:06:12",
        "updated_at": "2021-01-08 20:06:12",
        "posiciones": []
    },
    {
        "id": 16,
        "nombre": "Patinaje",
        "icono": "icon-skating",
        "tipo": 1,
        "minimo": null,
        "maximo": null,
        "created_at": "2021-01-08 20:06:12",
        "updated_at": "2021-01-08 20:06:12",
        "posiciones": []
    },
    {
        "id": 17,
        "nombre": "Hockey",
        "icono": "icon-hockey",
        "tipo": null,
        "minimo": null,
        "maximo": null,
        "created_at": "2021-01-08 20:06:13",
        "updated_at": "2021-01-08 20:06:13",
        "posiciones": []
    },
    {
        "id": 18,
        "nombre": "Microfútbol",
        "icono": "icon-soccer",
        "tipo": null,
        "minimo": null,
        "maximo": null,
        "created_at": "2021-01-08 20:06:14",
        "updated_at": "2021-01-08 20:06:14",
        "posiciones": []
    },
    {
        "id": 19,
        "nombre": "MicroFútbol Paralímpico",
        "icono": "icon-paralympic-games",
        "tipo": null,
        "minimo": null,
        "maximo": null,
        "created_at": "2021-01-08 20:06:15",
        "updated_at": "2021-01-08 20:06:15",
        "posiciones": []
    },
    {
        "id": 20,
        "nombre": "Baloncesto Paralímpico",
        "icono": "icon-paralympic-games",
        "tipo": null,
        "minimo": null,
        "maximo": null,
        "created_at": "2021-01-08 20:06:16",
        "updated_at": "2021-01-08 20:06:16",
        "posiciones": []
    },
    {
        "id": 21,
        "nombre": "Voleibol Paralímpico",
        "icono": "icon-paralympic-games",
        "tipo": null,
        "minimo": null,
        "maximo": null,
        "created_at": "2021-01-08 20:06:16",
        "updated_at": "2021-01-08 20:06:16",
        "posiciones": []
    },
    {
        "id": 22,
        "nombre": "Natación Paralímpico",
        "icono": "icon-paralympic-games",
        "tipo": null,
        "minimo": null,
        "maximo": null,
        "created_at": "2021-01-08 20:06:16",
        "updated_at": "2021-01-08 20:06:16",
        "posiciones": []
    },
    {
        "id": 23,
        "nombre": "Tenis Paralímpico",
        "icono": "icon-paralympic-games",
        "tipo": null,
        "minimo": null,
        "maximo": null,
        "created_at": "2021-01-08 20:06:17",
        "updated_at": "2021-01-08 20:06:17",
        "posiciones": []
    }
]
```

### HTTP Request
`GET api/sportodos/deportes`


<!-- END_3cc37ff9da1a3d6bcd0cfc6e9291f0e0 -->

<!-- START_99ec34f6a31b44881b4216251904ef16 -->
## funcion que permite crear un deporte

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/deportes/crear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportes/crear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/deportes/crear`


<!-- END_99ec34f6a31b44881b4216251904ef16 -->

<!-- START_6397b4376db00629f7c05de8d0cbf5ce -->
## funcion que permite editar el deporte

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/sportodos/deportes/1/editar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportes/1/editar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/sportodos/deportes/{id}/editar`


<!-- END_6397b4376db00629f7c05de8d0cbf5ce -->

<!-- START_6e9a96e6b789bb4b28169240e3bd4416 -->
## funcion para eliminar un deporte en especifico

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/api/sportodos/deportes/1/eliminar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportes/1/eliminar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/sportodos/deportes/{id}/eliminar`


<!-- END_6e9a96e6b789bb4b28169240e3bd4416 -->

<!-- START_b48381fe85d8af4b8e5a7b30dcf86e36 -->
## funcion que retorna el detalle de un deporte

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/deportes/1/detalle" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportes/1/detalle"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/deportes/{id}/detalle`


<!-- END_b48381fe85d8af4b8e5a7b30dcf86e36 -->

#Gestion de Equipos

clase  con los servicios listado de equipos, creacion de equipos, edicion de equipos,  agregar miembros de equipo , aceptar y rechazar miembros de equipo.
<!-- START_752896e61886f1e20b3556fe344f5d8c -->
## funcion que retorna el  listado de equipos a los que pertenece un usuario en especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/usuarios/1/equiposu" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/usuarios/1/equiposu"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[]
```

### HTTP Request
`GET api/sportodos/usuarios/{user_id}/equiposu`


<!-- END_752896e61886f1e20b3556fe344f5d8c -->

<!-- START_9396b5fe1045ce3424a5628a270fe42b -->
## funcion que retorna el  listado de equipos a los que pertenece un usuario en especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/usuarios/1/equipos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/usuarios/1/equipos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/usuarios/{user_id}/equipos`


<!-- END_9396b5fe1045ce3424a5628a270fe42b -->

<!-- START_28fa7d441313b131fe9aa6bb9dc3cbc1 -->
## funcion que sirve para crear un equipo

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/equipos/agregar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/equipos/agregar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/equipos/agregar`


<!-- END_28fa7d441313b131fe9aa6bb9dc3cbc1 -->

<!-- START_c758bd40b1369751a5db88a86a11b1f1 -->
## funcion que retorna el  listado de equipos creados

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/equipos/buscar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/equipos/buscar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/equipos/buscar`


<!-- END_c758bd40b1369751a5db88a86a11b1f1 -->

<!-- START_5056e5e5d1047703e51d82ad05104d51 -->
## funcion que sirve para editar un equipo

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/sportodos/equipos/1/actualizar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/equipos/1/actualizar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/sportodos/equipos/{team_id}/actualizar`


<!-- END_5056e5e5d1047703e51d82ad05104d51 -->

<!-- START_d7046306c200389673003659bc7e49aa -->
## Funcion para agregar un participante al equipo

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/equipos/1/participantes/agregar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/equipos/1/participantes/agregar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/equipos/{team_id}/participantes/agregar`


<!-- END_d7046306c200389673003659bc7e49aa -->

<!-- START_ca6740d0ca484e4553ce6c789dbea85e -->
## funcion que actauliza las imagenes ya sea del escudo del equipo o de la imagen de portada

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/equipos/1/actualizar/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/equipos/1/actualizar/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/equipos/{team_id}/actualizar/{imagen}`


<!-- END_ca6740d0ca484e4553ce6c789dbea85e -->

<!-- START_af5c48c280a88c331012bceb197641d0 -->
## funcion para retornar las estadisticas que tiene el equipo con un formato especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/equipos/1/stats" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/equipos/1/stats"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/equipos/{team_id}/stats`


<!-- END_af5c48c280a88c331012bceb197641d0 -->

<!-- START_ae3340706a4af5ea4fd667f59e88b636 -->
## Aceptar Participante

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/sportodos/equipos/1/participantes/actualizar/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/equipos/1/participantes/actualizar/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/sportodos/equipos/{team_id}/participantes/actualizar/{teamMemberId}`


<!-- END_ae3340706a4af5ea4fd667f59e88b636 -->

<!-- START_66d4483c933ffa36f732c009a3cab62d -->
## Funcion para eliminar un participante

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/api/sportodos/equipos/1/participantes/eliminar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/equipos/1/participantes/eliminar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/sportodos/equipos/{team_id}/participantes/eliminar`


<!-- END_66d4483c933ffa36f732c009a3cab62d -->

#Gestion de Espacios deportivos

clase  con los servicios listar, crear, editar, eliminar y ver el detalle y busqueda  para los espacios deportivos
<!-- START_734149524bcce3b1a20869b4d88b7da8 -->
## Funcion para retornar un listado de espacios deportivos con unos filtros en especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/espacios" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/espacios"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/espacios`


<!-- END_734149524bcce3b1a20869b4d88b7da8 -->

<!-- START_0c064c5ebccf710ff51be753ec95fb69 -->
## funcion para listar los espacios deportivos

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/espacios/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/espacios/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/espacios/all`


<!-- END_0c064c5ebccf710ff51be753ec95fb69 -->

<!-- START_f6a28b6f45af6ec03bbb278415f6432f -->
## funcion para crear un espacio deportivo

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/espacios/crear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/espacios/crear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/espacios/crear`


<!-- END_f6a28b6f45af6ec03bbb278415f6432f -->

<!-- START_7a16755c05c08b0a2900b1ba88fd8f21 -->
## funcion para actualizar informacion de un espacio deportivo

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/sportodos/espacios/1/editar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/espacios/1/editar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/sportodos/espacios/{id}/editar`


<!-- END_7a16755c05c08b0a2900b1ba88fd8f21 -->

<!-- START_1cf997a13ed45362ead1170ab0511bc1 -->
## funcion para eliminar un espacio deportivo

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/api/sportodos/espacios/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/espacios/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/sportodos/espacios/{id}`


<!-- END_1cf997a13ed45362ead1170ab0511bc1 -->

<!-- START_82739686d36e84ac8291b7fab37dca66 -->
## retorna el detalle de un espacio deportivo

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/espacios/1/detalle" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/espacios/1/detalle"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/espacios/{id}/detalle`


<!-- END_82739686d36e84ac8291b7fab37dca66 -->

#Gestion de Iniciativas

clase que permite la creacion, edicion, listado y eliminacion de iniciativas
<!-- START_86a5558d1c76cb6c8713f96c6c657e8c -->
## funcion para listar las iniciativas

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/iniciativas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/iniciativas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/iniciativas`


<!-- END_86a5558d1c76cb6c8713f96c6c657e8c -->

<!-- START_6dc06fb91210a7002e1e5d3edac9d05d -->
## funcion para crear las iniciativas

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/iniciativas/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/iniciativas/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/iniciativas/create`


<!-- END_6dc06fb91210a7002e1e5d3edac9d05d -->

<!-- START_04ea59d72bd42de64ff1da5265d61ec8 -->
## funcion para editar una iniciativa

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/sportodos/iniciativas/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/iniciativas/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/sportodos/iniciativas/{id}/edit`


<!-- END_04ea59d72bd42de64ff1da5265d61ec8 -->

<!-- START_9d364a2e0678ba57238d93aeea88a099 -->
## funcion para eliminar una iniciativa

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/api/sportodos/iniciativas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/iniciativas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/sportodos/iniciativas/{id}`


<!-- END_9d364a2e0678ba57238d93aeea88a099 -->

<!-- START_985f8e96ba4f3dad318923c55f1bae60 -->
## retorna el detalle de una iniciativa en especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/iniciativas/detalle/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/iniciativas/detalle/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/iniciativas/detalle/{id}`


<!-- END_985f8e96ba4f3dad318923c55f1bae60 -->

#Gestion de Likes

clase para controlar los likes de los diferentes elmentos dentro de la pagina
<!-- START_2894036d597ab4b9e34889d5fb961d53 -->
## funcion para retornar el listado de likes de un elemnto en especifico

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/post/1/likes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/post/1/likes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/post/{id}/likes`


<!-- END_2894036d597ab4b9e34889d5fb961d53 -->

<!-- START_6b9cda23e041c547aa30adfe9624bad9 -->
## funcion pra crear un like

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/post/1/likes/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/post/1/likes/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/post/{id}/likes/create`


<!-- END_6b9cda23e041c547aa30adfe9624bad9 -->

#Gestion de Lugares Sportodos

clase que se encarga de devolver la informacion de ciudades con covertura de sportodos, y zonas de cada ciudad
<!-- START_e13ad0b1ff4f1eeedef8068a1b48a147 -->
## listado de ciudades en la que sportodos tiene covertura en un pais en especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/lugares/paises/1/ciudades" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/lugares/paises/1/ciudades"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 6881,
        "pais": "CO",
        "ciudad": "Bogotá",
        "pais_id": "CO",
        "created_at": null,
        "updated_at": null,
        "latitud": "4.6274335",
        "longitud": "-74.0648901"
    },
    {
        "id": 10839,
        "pais": "CO",
        "ciudad": "Medellín",
        "pais_id": "CO",
        "created_at": null,
        "updated_at": null,
        "latitud": "3.3949068",
        "longitud": "-76.5033828"
    },
    {
        "id": 10222,
        "pais": "CO",
        "ciudad": "Cali",
        "pais_id": "CO",
        "created_at": null,
        "updated_at": null,
        "latitud": "6.2519435",
        "longitud": "-75.5786816"
    }
]
```

### HTTP Request
`GET api/sportodos/lugares/paises/{pais}/ciudades`


<!-- END_e13ad0b1ff4f1eeedef8068a1b48a147 -->

<!-- START_fd12cd8751a700c24b2e08699d5e4d97 -->
## funcion para listar las zonas que se asignan a un espacio deportivo

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/lugares/ciudades/6881/zonas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/lugares/ciudades/6881/zonas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 15,
        "nombre": "Antonio Nariño",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.549",
        "longitud": "-74.101",
        "created_at": "2021-01-08 20:06:43",
        "updated_at": "2021-01-08 20:06:43"
    },
    {
        "id": 12,
        "nombre": "Barrios Unidos",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.666",
        "longitud": "-74.084",
        "created_at": "2021-01-08 20:06:43",
        "updated_at": "2021-01-08 20:06:43"
    },
    {
        "id": 7,
        "nombre": "Bosa",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.6236689",
        "longitud": "-74.1993526",
        "created_at": "2021-01-08 20:06:42",
        "updated_at": "2021-01-08 20:06:42"
    },
    {
        "id": 2,
        "nombre": "Chapinero",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.6543165",
        "longitud": "-74.0527136",
        "created_at": "2021-01-08 20:06:41",
        "updated_at": "2021-01-08 20:06:41"
    },
    {
        "id": 19,
        "nombre": "Ciudad Bolívar",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.507",
        "longitud": "-74.154",
        "created_at": "2021-01-08 20:06:44",
        "updated_at": "2021-01-08 20:06:44"
    },
    {
        "id": 10,
        "nombre": "Engativá",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.7068169",
        "longitud": "-74.1094958",
        "created_at": "2021-01-08 20:06:43",
        "updated_at": "2021-01-08 20:06:43"
    },
    {
        "id": 9,
        "nombre": "Fontibón",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.6793677",
        "longitud": "-74.1403078",
        "created_at": "2021-01-08 20:06:42",
        "updated_at": "2021-01-08 20:06:42"
    },
    {
        "id": 8,
        "nombre": "Kennedy",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.6342663",
        "longitud": "-74.1506367",
        "created_at": "2021-01-08 20:06:42",
        "updated_at": "2021-01-08 20:06:42"
    },
    {
        "id": 17,
        "nombre": "La Candelaria",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.594",
        "longitud": "-74.074",
        "created_at": "2021-01-08 20:06:44",
        "updated_at": "2021-01-08 20:06:44"
    },
    {
        "id": 14,
        "nombre": "Los Mártires",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.603",
        "longitud": "-74.091",
        "created_at": "2021-01-08 20:06:43",
        "updated_at": "2021-01-08 20:06:43"
    },
    {
        "id": 16,
        "nombre": "Puente Aranda",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.615",
        "longitud": "-74.123",
        "created_at": "2021-01-08 20:06:44",
        "updated_at": "2021-01-08 20:06:44"
    },
    {
        "id": 18,
        "nombre": "Rafael Uribe Uribe",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.565",
        "longitud": "-74.116",
        "created_at": "2021-01-08 20:06:44",
        "updated_at": "2021-01-08 20:06:44"
    },
    {
        "id": 4,
        "nombre": "San Cristóbal",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.561513",
        "longitud": "-74.0878446",
        "created_at": "2021-01-08 20:06:41",
        "updated_at": "2021-01-08 20:06:41"
    },
    {
        "id": 3,
        "nombre": "Santa Fe",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.6116671",
        "longitud": "-74.0684935",
        "created_at": "2021-01-08 20:06:41",
        "updated_at": "2021-01-08 20:06:41"
    },
    {
        "id": 11,
        "nombre": "Suba",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.7368553",
        "longitud": "-74.0727332",
        "created_at": "2021-01-08 20:06:43",
        "updated_at": "2021-01-08 20:06:43"
    },
    {
        "id": 20,
        "nombre": "Sumapaz",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.035",
        "longitud": "-74.315",
        "created_at": "2021-01-08 20:06:44",
        "updated_at": "2021-01-08 20:06:44"
    },
    {
        "id": 13,
        "nombre": "Teusaquillo",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.645",
        "longitud": "-74.094",
        "created_at": "2021-01-08 20:06:43",
        "updated_at": "2021-01-08 20:06:43"
    },
    {
        "id": 6,
        "nombre": "Tunjuelito",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.5742451",
        "longitud": "-74.1331319",
        "created_at": "2021-01-08 20:06:42",
        "updated_at": "2021-01-08 20:06:42"
    },
    {
        "id": 1,
        "nombre": "Usaquén",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.7196678",
        "longitud": "-74.0266123",
        "created_at": "2021-01-08 20:06:41",
        "updated_at": "2021-01-08 20:06:41"
    },
    {
        "id": 5,
        "nombre": "Usme",
        "pais_cod": "CO",
        "ciudad_id": 6881,
        "latitud": "4.5073433",
        "longitud": "-74.1058393",
        "created_at": "2021-01-08 20:06:41",
        "updated_at": "2021-01-08 20:06:41"
    }
]
```

### HTTP Request
`GET api/sportodos/lugares/ciudades/{ciudad}/zonas`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `ciudad` |  optional  | 

<!-- END_fd12cd8751a700c24b2e08699d5e4d97 -->

#Gestion de Niveles Deportivos

Clase que retorna la informacion delos diferentes niveles deportivos en los que se puede encontrar un jugador, ademas permite su creacion, edicion y eliminacion
<!-- START_b9c392b6c7048ea59dd975a357279d88 -->
## retorna el listado de niveles deportivos

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/deportes/niveles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportes/niveles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "nivel": "Aficionado",
        "created_at": "2021-01-08 20:06:50",
        "updated_at": "2021-01-08 20:06:50"
    },
    {
        "id": 2,
        "nivel": "Amateur",
        "created_at": "2021-01-08 20:06:51",
        "updated_at": "2021-01-08 20:06:51"
    },
    {
        "id": 3,
        "nivel": "Semiprofesional",
        "created_at": "2021-01-08 20:06:51",
        "updated_at": "2021-01-08 20:06:51"
    },
    {
        "id": 4,
        "nivel": "Profesional",
        "created_at": "2021-01-08 20:06:51",
        "updated_at": "2021-01-08 20:06:51"
    },
    {
        "id": 5,
        "nivel": "Pensionado",
        "created_at": "2021-01-08 20:06:51",
        "updated_at": "2021-01-08 20:06:51"
    }
]
```

### HTTP Request
`GET api/sportodos/deportes/niveles`


<!-- END_b9c392b6c7048ea59dd975a357279d88 -->

<!-- START_80440da122749d1177b81ed94f12a539 -->
## funcion para crear un nivel deportivo

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/deportes/niveles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportes/niveles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/deportes/niveles`


<!-- END_80440da122749d1177b81ed94f12a539 -->

<!-- START_b197759badc457a01b087b891d7b7d42 -->
## funcion para editar un nivel deportivo

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/sportodos/deportes/niveles/1/editar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportes/niveles/1/editar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/sportodos/deportes/niveles/{id}/editar`


<!-- END_b197759badc457a01b087b891d7b7d42 -->

<!-- START_f8de4b8e908bd7c4030a13044c11bf31 -->
## funcion para eliminar un nivel deportivo

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/api/sportodos/deportes/niveles/autem/borrar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportes/niveles/autem/borrar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/sportodos/deportes/niveles/{id}/borrar`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador de un nivel deportivo a eliminar

<!-- END_f8de4b8e908bd7c4030a13044c11bf31 -->

#Gestion de Notificaciones

clase  con los servicios listar, editar, eliminar las notificaciones
<!-- START_bf15c0091a6d5872a011046ef7a123ae -->
## Funcion para listar las notificaciones del usuario que esta autenticado

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/notificaciones/usuario/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/notificaciones/usuario/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/notificaciones/usuario/{user_id}`


<!-- END_bf15c0091a6d5872a011046ef7a123ae -->

<!-- START_fabcac7a57478a66ffb3eb2729a0ee4a -->
## Funcion para cambiar el estado de  una notificacion

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/notificaciones/maiores/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/notificaciones/maiores/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/notificaciones/{id}/update`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador de la notificacion a editar

<!-- END_fabcac7a57478a66ffb3eb2729a0ee4a -->

<!-- START_b2766ae411ff8da9cc5a95cdea4cce8c -->
## Funcion para eliminar una notificacion

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/api/notificaciones/fugiat/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/notificaciones/fugiat/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/notificaciones/{id}/delete`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador de la notificacion a eliminar

<!-- END_b2766ae411ff8da9cc5a95cdea4cce8c -->

#Gestion de Pocisiones Deportivas

clase  con los servicios listar, crear, editar, eliminar y ver el detalle de las diferentes pocisiones de cada uno de los deportes de sportodos
<!-- START_6f8e06301c06ba6ac3ac1bd9ebd3cb93 -->
## funcion para traer el listado de las posiciones deportivas  retorna un json con la información

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/deportes/1/posiciones" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportes/1/posiciones"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "nombre": "Arquero",
        "deporte_id": 1,
        "created_at": "2021-01-08 20:06:30",
        "updated_at": "2021-01-08 20:06:30"
    },
    {
        "id": 2,
        "nombre": "Defensa",
        "deporte_id": 1,
        "created_at": "2021-01-08 20:06:30",
        "updated_at": "2021-01-08 20:06:30"
    },
    {
        "id": 3,
        "nombre": "Volante",
        "deporte_id": 1,
        "created_at": "2021-01-08 20:06:30",
        "updated_at": "2021-01-08 20:06:30"
    },
    {
        "id": 4,
        "nombre": "Delantero",
        "deporte_id": 1,
        "created_at": "2021-01-08 20:06:31",
        "updated_at": "2021-01-08 20:06:31"
    },
    {
        "id": 5,
        "nombre": "Libero",
        "deporte_id": 7,
        "created_at": "2021-01-08 20:06:31",
        "updated_at": "2021-01-08 20:06:31"
    },
    {
        "id": 6,
        "nombre": "Armador",
        "deporte_id": 7,
        "created_at": "2021-01-08 20:06:31",
        "updated_at": "2021-01-08 20:06:31"
    },
    {
        "id": 7,
        "nombre": "Remachador",
        "deporte_id": 7,
        "created_at": "2021-01-08 20:06:32",
        "updated_at": "2021-01-08 20:06:32"
    },
    {
        "id": 8,
        "nombre": "Defensa",
        "deporte_id": 7,
        "created_at": "2021-01-08 20:06:32",
        "updated_at": "2021-01-08 20:06:32"
    },
    {
        "id": 9,
        "nombre": "Base",
        "deporte_id": 2,
        "created_at": "2021-01-08 20:06:32",
        "updated_at": "2021-01-08 20:06:32"
    },
    {
        "id": 10,
        "nombre": "Escolta",
        "deporte_id": 2,
        "created_at": "2021-01-08 20:06:33",
        "updated_at": "2021-01-08 20:06:33"
    },
    {
        "id": 11,
        "nombre": "Alero",
        "deporte_id": 2,
        "created_at": "2021-01-08 20:06:33",
        "updated_at": "2021-01-08 20:06:33"
    },
    {
        "id": 12,
        "nombre": "Ala pivot",
        "deporte_id": 2,
        "created_at": "2021-01-08 20:06:33",
        "updated_at": "2021-01-08 20:06:33"
    },
    {
        "id": 13,
        "nombre": "Pivot",
        "deporte_id": 2,
        "created_at": "2021-01-08 20:06:33",
        "updated_at": "2021-01-08 20:06:33"
    },
    {
        "id": 14,
        "nombre": "Lanzador",
        "deporte_id": 8,
        "created_at": "2021-01-08 20:06:33",
        "updated_at": "2021-01-08 20:06:33"
    },
    {
        "id": 15,
        "nombre": "Receptor",
        "deporte_id": 8,
        "created_at": "2021-01-08 20:06:34",
        "updated_at": "2021-01-08 20:06:34"
    },
    {
        "id": 16,
        "nombre": "1 Base",
        "deporte_id": 8,
        "created_at": "2021-01-08 20:06:34",
        "updated_at": "2021-01-08 20:06:34"
    },
    {
        "id": 17,
        "nombre": "2 Base",
        "deporte_id": 8,
        "created_at": "2021-01-08 20:06:34",
        "updated_at": "2021-01-08 20:06:34"
    },
    {
        "id": 18,
        "nombre": "3 Base",
        "deporte_id": 8,
        "created_at": "2021-01-08 20:06:35",
        "updated_at": "2021-01-08 20:06:35"
    },
    {
        "id": 19,
        "nombre": "Campo Corto",
        "deporte_id": 8,
        "created_at": "2021-01-08 20:06:36",
        "updated_at": "2021-01-08 20:06:36"
    },
    {
        "id": 20,
        "nombre": "Jardinero",
        "deporte_id": 8,
        "created_at": "2021-01-08 20:06:37",
        "updated_at": "2021-01-08 20:06:37"
    },
    {
        "id": 21,
        "nombre": "Pilar",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:37",
        "updated_at": "2021-01-08 20:06:37"
    },
    {
        "id": 22,
        "nombre": "Talador",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:37",
        "updated_at": "2021-01-08 20:06:37"
    },
    {
        "id": 23,
        "nombre": "Segunda Linea",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:37",
        "updated_at": "2021-01-08 20:06:37"
    },
    {
        "id": 24,
        "nombre": "Saguero",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:37",
        "updated_at": "2021-01-08 20:06:37"
    },
    {
        "id": 25,
        "nombre": "Flanker",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:37",
        "updated_at": "2021-01-08 20:06:37"
    },
    {
        "id": 26,
        "nombre": "Numero 8",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:37",
        "updated_at": "2021-01-08 20:06:37"
    },
    {
        "id": 27,
        "nombre": "Apertura",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:38",
        "updated_at": "2021-01-08 20:06:38"
    },
    {
        "id": 28,
        "nombre": "Ala",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:38",
        "updated_at": "2021-01-08 20:06:38"
    },
    {
        "id": 29,
        "nombre": "1 Centro",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:38",
        "updated_at": "2021-01-08 20:06:38"
    },
    {
        "id": 30,
        "nombre": "Hangler",
        "deporte_id": 10,
        "created_at": "2021-01-08 20:06:39",
        "updated_at": "2021-01-08 20:06:39"
    },
    {
        "id": 31,
        "nombre": "Medio",
        "deporte_id": 10,
        "created_at": "2021-01-08 20:06:39",
        "updated_at": "2021-01-08 20:06:39"
    },
    {
        "id": 32,
        "nombre": "Deep",
        "deporte_id": 10,
        "created_at": "2021-01-08 20:06:39",
        "updated_at": "2021-01-08 20:06:39"
    }
]
```

### HTTP Request
`GET api/sportodos/deportes/{id}/posiciones`


<!-- END_6f8e06301c06ba6ac3ac1bd9ebd3cb93 -->

<!-- START_9cf47f46f84e8cdde94450cb40b836ec -->
## funcion para traer el listado de las posiciones deportivas  retorna un json con la información

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/deportes/posiciones/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deportes/posiciones/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "nombre": "Arquero",
        "deporte_id": 1,
        "created_at": "2021-01-08 20:06:30",
        "updated_at": "2021-01-08 20:06:30"
    },
    {
        "id": 2,
        "nombre": "Defensa",
        "deporte_id": 1,
        "created_at": "2021-01-08 20:06:30",
        "updated_at": "2021-01-08 20:06:30"
    },
    {
        "id": 3,
        "nombre": "Volante",
        "deporte_id": 1,
        "created_at": "2021-01-08 20:06:30",
        "updated_at": "2021-01-08 20:06:30"
    },
    {
        "id": 4,
        "nombre": "Delantero",
        "deporte_id": 1,
        "created_at": "2021-01-08 20:06:31",
        "updated_at": "2021-01-08 20:06:31"
    },
    {
        "id": 5,
        "nombre": "Libero",
        "deporte_id": 7,
        "created_at": "2021-01-08 20:06:31",
        "updated_at": "2021-01-08 20:06:31"
    },
    {
        "id": 6,
        "nombre": "Armador",
        "deporte_id": 7,
        "created_at": "2021-01-08 20:06:31",
        "updated_at": "2021-01-08 20:06:31"
    },
    {
        "id": 7,
        "nombre": "Remachador",
        "deporte_id": 7,
        "created_at": "2021-01-08 20:06:32",
        "updated_at": "2021-01-08 20:06:32"
    },
    {
        "id": 8,
        "nombre": "Defensa",
        "deporte_id": 7,
        "created_at": "2021-01-08 20:06:32",
        "updated_at": "2021-01-08 20:06:32"
    },
    {
        "id": 9,
        "nombre": "Base",
        "deporte_id": 2,
        "created_at": "2021-01-08 20:06:32",
        "updated_at": "2021-01-08 20:06:32"
    },
    {
        "id": 10,
        "nombre": "Escolta",
        "deporte_id": 2,
        "created_at": "2021-01-08 20:06:33",
        "updated_at": "2021-01-08 20:06:33"
    },
    {
        "id": 11,
        "nombre": "Alero",
        "deporte_id": 2,
        "created_at": "2021-01-08 20:06:33",
        "updated_at": "2021-01-08 20:06:33"
    },
    {
        "id": 12,
        "nombre": "Ala pivot",
        "deporte_id": 2,
        "created_at": "2021-01-08 20:06:33",
        "updated_at": "2021-01-08 20:06:33"
    },
    {
        "id": 13,
        "nombre": "Pivot",
        "deporte_id": 2,
        "created_at": "2021-01-08 20:06:33",
        "updated_at": "2021-01-08 20:06:33"
    },
    {
        "id": 14,
        "nombre": "Lanzador",
        "deporte_id": 8,
        "created_at": "2021-01-08 20:06:33",
        "updated_at": "2021-01-08 20:06:33"
    },
    {
        "id": 15,
        "nombre": "Receptor",
        "deporte_id": 8,
        "created_at": "2021-01-08 20:06:34",
        "updated_at": "2021-01-08 20:06:34"
    },
    {
        "id": 16,
        "nombre": "1 Base",
        "deporte_id": 8,
        "created_at": "2021-01-08 20:06:34",
        "updated_at": "2021-01-08 20:06:34"
    },
    {
        "id": 17,
        "nombre": "2 Base",
        "deporte_id": 8,
        "created_at": "2021-01-08 20:06:34",
        "updated_at": "2021-01-08 20:06:34"
    },
    {
        "id": 18,
        "nombre": "3 Base",
        "deporte_id": 8,
        "created_at": "2021-01-08 20:06:35",
        "updated_at": "2021-01-08 20:06:35"
    },
    {
        "id": 19,
        "nombre": "Campo Corto",
        "deporte_id": 8,
        "created_at": "2021-01-08 20:06:36",
        "updated_at": "2021-01-08 20:06:36"
    },
    {
        "id": 20,
        "nombre": "Jardinero",
        "deporte_id": 8,
        "created_at": "2021-01-08 20:06:37",
        "updated_at": "2021-01-08 20:06:37"
    },
    {
        "id": 21,
        "nombre": "Pilar",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:37",
        "updated_at": "2021-01-08 20:06:37"
    },
    {
        "id": 22,
        "nombre": "Talador",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:37",
        "updated_at": "2021-01-08 20:06:37"
    },
    {
        "id": 23,
        "nombre": "Segunda Linea",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:37",
        "updated_at": "2021-01-08 20:06:37"
    },
    {
        "id": 24,
        "nombre": "Saguero",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:37",
        "updated_at": "2021-01-08 20:06:37"
    },
    {
        "id": 25,
        "nombre": "Flanker",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:37",
        "updated_at": "2021-01-08 20:06:37"
    },
    {
        "id": 26,
        "nombre": "Numero 8",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:37",
        "updated_at": "2021-01-08 20:06:37"
    },
    {
        "id": 27,
        "nombre": "Apertura",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:38",
        "updated_at": "2021-01-08 20:06:38"
    },
    {
        "id": 28,
        "nombre": "Ala",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:38",
        "updated_at": "2021-01-08 20:06:38"
    },
    {
        "id": 29,
        "nombre": "1 Centro",
        "deporte_id": 9,
        "created_at": "2021-01-08 20:06:38",
        "updated_at": "2021-01-08 20:06:38"
    },
    {
        "id": 30,
        "nombre": "Hangler",
        "deporte_id": 10,
        "created_at": "2021-01-08 20:06:39",
        "updated_at": "2021-01-08 20:06:39"
    },
    {
        "id": 31,
        "nombre": "Medio",
        "deporte_id": 10,
        "created_at": "2021-01-08 20:06:39",
        "updated_at": "2021-01-08 20:06:39"
    },
    {
        "id": 32,
        "nombre": "Deep",
        "deporte_id": 10,
        "created_at": "2021-01-08 20:06:39",
        "updated_at": "2021-01-08 20:06:39"
    }
]
```

### HTTP Request
`GET api/sportodos/deportes/posiciones/all`


<!-- END_9cf47f46f84e8cdde94450cb40b836ec -->

<!-- START_1a608046fd6c3240839318c88ec311b3 -->
## funcion para traer el listado de las posiciones deportivas  retorna un json con la información

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/deporteposicion/deporte/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deporteposicion/deporte/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/deporteposicion/deporte/{id}`


<!-- END_1a608046fd6c3240839318c88ec311b3 -->

<!-- START_7f24b06016334e5d44f3ea7033b43da2 -->
## funcion para traer el listado de las posiciones deportivas  retorna un json con la información

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/deporteposicion" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deporteposicion"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/deporteposicion`


<!-- END_7f24b06016334e5d44f3ea7033b43da2 -->

<!-- START_dc1ac215cfe96c1f260c408ef25b7bca -->
## funcion que sirve para crear una posicion

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/deporteposicion/crear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deporteposicion/crear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/deporteposicion/crear`


<!-- END_dc1ac215cfe96c1f260c408ef25b7bca -->

<!-- START_26fda79b67335b346d58d7714d469271 -->
## Funcion para actualizar una posicion

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/sportodos/deporteposicion/quo/editar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deporteposicion/quo/editar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/sportodos/deporteposicion/{id}/editar`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador de la posicion que se va a editar

<!-- END_26fda79b67335b346d58d7714d469271 -->

<!-- START_20386fccc6f549980b803742f6212dd1 -->
## Funcion para eliminar una posicion

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/api/sportodos/deporteposicion/necessitatibus/eliminar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deporteposicion/necessitatibus/eliminar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/sportodos/deporteposicion/{id}/eliminar`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador de la posicion que se va a eliminar

<!-- END_20386fccc6f549980b803742f6212dd1 -->

<!-- START_7871d16355398bbb73fcd9df2d7b37be -->
## funcion para retornar la informacion de una posicion deportiva

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/deporteposicion/adipisci/detalle" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/deporteposicion/adipisci/detalle"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/deporteposicion/{id}/detalle`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador de la posicion que se va a ver el detalle

<!-- END_7871d16355398bbb73fcd9df2d7b37be -->

#Gestion de Posts

clase para listar, crear ,editar  y eliminar un post
<!-- START_f1d7960a9c444f52e28b8500b526f347 -->
## Funcion para listar los post cargados dentro del sistema

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/posts/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/posts/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/posts/all`


<!-- END_f1d7960a9c444f52e28b8500b526f347 -->

<!-- START_adcb2aabfe84c2370c7b5fefdffb098b -->
## Funcion para listar los post cargados dentro del sistema para una red oscial en especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/posts/red/minima/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/posts/red/minima/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/posts/red/{red}/all`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `red` |  optional  | identificador de la red social a mostrar

<!-- END_adcb2aabfe84c2370c7b5fefdffb098b -->

<!-- START_6a70fcda407b5f1a7ff2809c4ebff500 -->
## Funcion para ver un post en especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/posts/sit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/posts/sit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/posts/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador del post que se decea ver

<!-- END_6a70fcda407b5f1a7ff2809c4ebff500 -->

<!-- START_dd7681925d9cde102801763a94f5882b -->
## Funcion para crear un post

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/post/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/post/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/post/create`


<!-- END_dd7681925d9cde102801763a94f5882b -->

<!-- START_6a0f478a5b47800f280ab5103662b334 -->
## funcion de prueba para carga de imagenes

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/formimagen" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/formimagen"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET formimagen`


<!-- END_6a0f478a5b47800f280ab5103662b334 -->

<!-- START_a9ce4a1169b87c4b100105a5aab022c1 -->
## funcion de prueba paraguardar una imagen

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/cargarimagen" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/cargarimagen"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST cargarimagen`


<!-- END_a9ce4a1169b87c4b100105a5aab022c1 -->

#Gestion de Puntos de encuentro


<!-- START_10cc13bf7238d19ab064b71ba223cda1 -->
## funcion que permite listar los diferentes puntos deportivos

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/puntos/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/puntos/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/puntos/all`


<!-- END_10cc13bf7238d19ab064b71ba223cda1 -->

<!-- START_3edf0896d34304baadd5f98d88801890 -->
## funcion para traer los puntos de una ciudad

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/puntos/ciudades/1/zonas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/puntos/ciudades/1/zonas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/puntos/ciudades/{ciudad_id}/zonas`


<!-- END_3edf0896d34304baadd5f98d88801890 -->

<!-- START_71d75dd1235229ab3f878bad15200137 -->
## funcion para traer lospuntos deportivos de una ciudad y una zona en especifico

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/puntos/ciudades/1/zonas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/puntos/ciudades/1/zonas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/puntos/ciudades/{ciudad_id}/zonas/{zona_id}`


<!-- END_71d75dd1235229ab3f878bad15200137 -->

<!-- START_8c8e993d3de64a252f065b6b07036c1f -->
## funcion para crear un punto deportivo

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/puntos/crear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/puntos/crear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/puntos/crear`


<!-- END_8c8e993d3de64a252f065b6b07036c1f -->

<!-- START_fba2fa7d12bd974b71ab2e1bae759816 -->
## funcion para retornar el detalle de un punto en espesifico con sus diferentes espacios, servicios y deportes

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/puntos/1/detalle" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/puntos/1/detalle"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/puntos/{id}/detalle`


<!-- END_fba2fa7d12bd974b71ab2e1bae759816 -->

<!-- START_5450f286a8e5f17f9ea775150ba92df5 -->
## funcion que permite editar un punto deportivo

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/sportodos/puntos/1/editar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/puntos/1/editar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/sportodos/puntos/{id}/editar`


<!-- END_5450f286a8e5f17f9ea775150ba92df5 -->

#Gestion de Retos Deportivos

clase que permite retornar el listado de retos, crear, editar y eliminar un reto, y gestionar los jugadores y equipos del mismo.
<!-- START_ea0a0f270e35f0ff4574adb4e68a0960 -->
## funcion que retorna el listado de retos  deacuerdo a los diferentes filtros enviados

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/retos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/retos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/retos`


<!-- END_ea0a0f270e35f0ff4574adb4e68a0960 -->

<!-- START_13671b0793602a96c4c570cc4eae3d05 -->
## funcion  que permite crear un reto

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/retos/crear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/retos/crear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/retos/crear`


<!-- END_13671b0793602a96c4c570cc4eae3d05 -->

<!-- START_b7d72e4f9a255338b7ca84b919fd0e37 -->
## funcion  que permite editar un reto un reto

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/sportodos/retos/1/editar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/retos/1/editar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/sportodos/retos/{id}/editar`


<!-- END_b7d72e4f9a255338b7ca84b919fd0e37 -->

<!-- START_0f7ff50ac26451671e308190cbcbc97a -->
## funcion para eliminar un reto

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/api/sportodos/retos/1/eliminar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/retos/1/eliminar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/sportodos/retos/{id}/eliminar`


<!-- END_0f7ff50ac26451671e308190cbcbc97a -->

<!-- START_c1e47e0e629b4125c4008df2af38af86 -->
## funcion que permite ver el detalle de un reto

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/retos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/retos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/retos/{id}`


<!-- END_c1e47e0e629b4125c4008df2af38af86 -->

<!-- START_18cba4459b95d9375375e3791693e301 -->
## funcion diseñada para devoler las estadisticas del reto se encuentra en construccion

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/retos/estadisticas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/retos/estadisticas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/retos/estadisticas/{id}`


<!-- END_18cba4459b95d9375375e3791693e301 -->

<!-- START_45abdd8ba613c9baa5fb98289535c3ec -->
## funcion que retorna el listado de jugadores de un reto en especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/retos/1/jugadores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/retos/1/jugadores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/retos/{id}/jugadores`


<!-- END_45abdd8ba613c9baa5fb98289535c3ec -->

<!-- START_47251439c2aae7739419390c5866829b -->
## funcion que permite agregar los participantes de un reto

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/retos/1/jugadores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/retos/1/jugadores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/retos/{id}/jugadores`


<!-- END_47251439c2aae7739419390c5866829b -->

<!-- START_0252edf3e250caf05692fbbe83ea37c5 -->
## funcion para eliminar un jugador de un reto en especifico

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/api/sportodos/retos/1/jugadores/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/retos/1/jugadores/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/sportodos/retos/{id}/jugadores/{idjugador}`


<!-- END_0252edf3e250caf05692fbbe83ea37c5 -->

#Gestion de Servicios

clase con la cual se van a poder crear editar eliminar y listar los diferentes servicios que ofrecen cada uno de los puntos de encuentro y espacios deportivos
<!-- START_b1b18d75125f2538d675d8a03166507d -->
## listado de servicios que se encuentran en el sistema

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/servicios" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/servicios"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "nombre": "Iluminación Publica",
        "icono": "icon-light",
        "created_at": "2021-01-08 20:06:18",
        "updated_at": "2021-01-08 20:06:18"
    },
    {
        "id": 2,
        "nombre": "Baños",
        "icono": "icon-toilette",
        "created_at": "2021-01-08 20:06:18",
        "updated_at": "2021-01-08 20:06:18"
    },
    {
        "id": 3,
        "nombre": "Parqueadero",
        "icono": "icon-car-parking",
        "created_at": "2021-01-08 20:06:18",
        "updated_at": "2021-01-08 20:06:18"
    },
    {
        "id": 4,
        "nombre": "Vestieres",
        "icono": "icon-hanger",
        "created_at": "2021-01-08 20:06:19",
        "updated_at": "2021-01-08 20:06:19"
    },
    {
        "id": 5,
        "nombre": "Graderías",
        "icono": "icon-stairs",
        "created_at": "2021-01-08 20:06:19",
        "updated_at": "2021-01-08 20:06:19"
    },
    {
        "id": 6,
        "nombre": "Acceso Discapacitados",
        "icono": "icon-wheelchair",
        "created_at": "2021-01-08 20:06:19",
        "updated_at": "2021-01-08 20:06:19"
    },
    {
        "id": 7,
        "nombre": "Adecuaciones para Discapacitados",
        "icono": "icon-wheelchair-ramp",
        "created_at": "2021-01-08 20:06:19",
        "updated_at": "2021-01-08 20:06:19"
    },
    {
        "id": 8,
        "nombre": "Duchas",
        "icono": "icon-bath-tub",
        "created_at": "2021-01-08 20:06:19",
        "updated_at": "2021-01-08 20:06:19"
    },
    {
        "id": 9,
        "nombre": "Tablero Manual de Marcador",
        "icono": "icon-name-card",
        "created_at": "2021-01-08 20:06:19",
        "updated_at": "2021-01-08 20:06:19"
    },
    {
        "id": 10,
        "nombre": "Tablero Digital de Marcador",
        "icono": "icon-video-player",
        "created_at": "2021-01-08 20:06:20",
        "updated_at": "2021-01-08 20:06:20"
    },
    {
        "id": 11,
        "nombre": "Pago con Tarjeta",
        "icono": "icon-credit-card",
        "created_at": "2021-01-08 20:06:20",
        "updated_at": "2021-01-08 20:06:20"
    },
    {
        "id": 12,
        "nombre": "Tienda Accesorios Deportivos",
        "icono": "icon-store",
        "created_at": "2021-01-08 20:06:20",
        "updated_at": "2021-01-08 20:06:20"
    },
    {
        "id": 13,
        "nombre": "Zona de Alimentación",
        "icono": "icon-cutlery",
        "created_at": "2021-01-08 20:06:20",
        "updated_at": "2021-01-08 20:06:20"
    },
    {
        "id": 14,
        "nombre": "Iluminacion Privada",
        "icono": "icon-lamp-floor",
        "created_at": "2021-01-08 20:06:21",
        "updated_at": "2021-01-08 20:06:21"
    },
    {
        "id": 15,
        "nombre": "Cubierto (Techo)",
        "icono": "icon-terrace",
        "created_at": "2021-01-08 20:06:21",
        "updated_at": "2021-01-08 20:06:21"
    },
    {
        "id": 16,
        "nombre": "Servicio de Petos (Diferenciar Equipos)",
        "icono": "icon-sports-tank",
        "created_at": "2021-01-08 20:06:21",
        "updated_at": "2021-01-08 20:06:21"
    },
    {
        "id": 17,
        "nombre": "Ascensor",
        "icono": "icon-lift",
        "created_at": "2021-01-08 20:06:21",
        "updated_at": "2021-01-08 20:06:21"
    },
    {
        "id": 18,
        "nombre": "Zona de Hidratación",
        "icono": "icon-drinking-bottle",
        "created_at": "2021-01-08 20:06:21",
        "updated_at": "2021-01-08 20:06:21"
    },
    {
        "id": 19,
        "nombre": "Otros Deportes",
        "icono": "icon-ticket",
        "created_at": "2021-01-08 20:06:21",
        "updated_at": "2021-01-08 20:06:21"
    },
    {
        "id": 21,
        "nombre": "Bancas",
        "icono": "icon-stairs",
        "created_at": "2021-01-08 20:06:22",
        "updated_at": "2021-03-04 10:21:27"
    },
    {
        "id": 22,
        "nombre": "Gradería Cesped (Pasto)",
        "icono": "icon-stairs",
        "created_at": "2021-01-08 20:06:22",
        "updated_at": "2021-03-04 10:21:14"
    },
    {
        "id": 23,
        "nombre": "Zona Pequeña ( 1 ó 2 Cuadras)",
        "icono": "icon-cutlery",
        "created_at": "2021-01-08 20:06:22",
        "updated_at": "2021-03-04 10:20:43"
    },
    {
        "id": 24,
        "nombre": "Zona Mediana ( 3 ó 4 Cuadras)",
        "icono": "icon-cutlery",
        "created_at": "2021-01-08 20:06:22",
        "updated_at": "2021-03-04 10:20:49"
    },
    {
        "id": 25,
        "nombre": "Zona Alta ( 5 ó + Cuadras)",
        "icono": "icon-cutlery",
        "created_at": "2021-01-08 20:06:23",
        "updated_at": "2021-03-04 10:20:54"
    }
]
```

### HTTP Request
`GET api/sportodos/servicios`


<!-- END_b1b18d75125f2538d675d8a03166507d -->

<!-- START_1a4055907efb709940e6e8c393c4ac89 -->
## listado de servicios que se encuentran en el sistema

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/servicios/listado" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/servicios/listado"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/servicios/listado`


<!-- END_1a4055907efb709940e6e8c393c4ac89 -->

<!-- START_fdddd054c89d6a672689929bf1578438 -->
## funcion para crear un servicio en el sistema

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/servicios/crear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/servicios/crear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/servicios/crear`


<!-- END_fdddd054c89d6a672689929bf1578438 -->

<!-- START_eee2402684cf8bc6bf8847792b962178 -->
## funcion para deitar un servicio en especifico

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/sportodos/servicios/1/editar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/servicios/1/editar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/sportodos/servicios/{id}/editar`


<!-- END_eee2402684cf8bc6bf8847792b962178 -->

<!-- START_f5e646b8bc4840801cc579d810c4980b -->
## funcion que permite eliminar un servicio en especifico

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/api/sportodos/servicios/1/eliminar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/servicios/1/eliminar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/sportodos/servicios/{id}/eliminar`


<!-- END_f5e646b8bc4840801cc579d810c4980b -->

<!-- START_ce729b7f20276df3f7c76a019960067e -->
## funcion que retorna el detalle de un servicio en especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/servicios/1/detalle" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/servicios/1/detalle"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/servicios/{id}/detalle`


<!-- END_ce729b7f20276df3f7c76a019960067e -->

#Gestion de Usuarios

clase que permite gestionar los diferentes usuarios que tiene acceso al sistema
<!-- START_d2e6e9773f8741e58c5e9832e9fdee01 -->
## Inicio de sesión multifuncional. Primero verificamos si esta solicitud de inicio de sesión proviene de Firebase, si es así, validamos el token y
comprobar si el usuario ya existe en db. Si no se encuentra el token, intentamos continuar con el flujo de inicio de sesión normal.

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/usuarios/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/usuarios/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/usuarios/login`


<!-- END_d2e6e9773f8741e58c5e9832e9fdee01 -->

<!-- START_cbcc0ec3d7de3b551a03a2187f0005a9 -->
## funcion para hacer registro y autenticacion de un usuario de forma externa con firebase

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/usuarios/signup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/usuarios/signup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/usuarios/signup`


<!-- END_cbcc0ec3d7de3b551a03a2187f0005a9 -->

<!-- START_26ca68d6f663e2d6d8dc8c20a31ccbf6 -->
## Funcion que  desloguea al usuario dentro del sistema

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/usuarios/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/usuarios/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/usuarios/logout`


<!-- END_26ca68d6f663e2d6d8dc8c20a31ccbf6 -->

<!-- START_27d1bc84f27d0b1727dd253a76d2d662 -->
## Funcion para refrescar el toquen de login

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/usuarios/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/usuarios/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/usuarios/refresh`


<!-- END_27d1bc84f27d0b1727dd253a76d2d662 -->

<!-- START_8a2bdac87935fc9bb163ac3f3cb8b489 -->
## funcion prar retornar el detalle de un usuario en especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/usuarios/cupiditate/detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/usuarios/cupiditate/detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/usuarios/{id}/detail`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador del usuario a retornar

<!-- END_8a2bdac87935fc9bb163ac3f3cb8b489 -->

<!-- START_2e7ad9f6179e2977f8a3872b77039cb6 -->
## Funcion que trae el listado de usarios cargados en el sistema con unos filtros en especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/usuarios/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/usuarios/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/usuarios/all`


<!-- END_2e7ad9f6179e2977f8a3872b77039cb6 -->

<!-- START_728d659e5d82670bbeaff06647c680e7 -->
## Funcion que trae el listado de usarios cargados en el sistema con unos filtros en especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/usuarios/listado2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/usuarios/listado2"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/usuarios/listado2`


<!-- END_728d659e5d82670bbeaff06647c680e7 -->

<!-- START_b70fe89bff349456672e03e770217e95 -->
## Funcion para actualizar la imagen de perfil del usuario

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/usuarios/et/avatar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/usuarios/et/avatar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/usuarios/{user_id}/avatar`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user_id` |  optional  | id del usuario a modificar

<!-- END_b70fe89bff349456672e03e770217e95 -->

<!-- START_33502f1fd547d460be4c28c7ac841256 -->
## Funcion para actualizar la imagen de portada del usuario

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/usuarios/delectus/background" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/usuarios/delectus/background"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/usuarios/{user_id}/background`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user_id` |  optional  | id del usuario a modificar

<!-- END_33502f1fd547d460be4c28c7ac841256 -->

<!-- START_1ae542476a2c38328d3900cd5ca2d40d -->
## retorna las credenciales de autenticacion del usuario logueado

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/usuarios/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/usuarios/me"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/usuarios/me`


<!-- END_1ae542476a2c38328d3900cd5ca2d40d -->

<!-- START_cfa20b758f8a6df7bed9b116670f5c28 -->
## Funcion para actualizar la contraseña de un usuario

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/usuarios/animi/password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/usuarios/animi/password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/usuarios/{user_id}/password`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user_id` |  optional  | identificador del usuario a cambiar la contraseña

<!-- END_cfa20b758f8a6df7bed9b116670f5c28 -->

<!-- START_4c149fb8bc7df806ca14fef7210cbaf2 -->
## Funcion para editar la informacion de un usuario dentro del sistema

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/usuarios/1/editar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/usuarios/1/editar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/usuarios/{user_id}/editar`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador del usuario a editar

<!-- END_4c149fb8bc7df806ca14fef7210cbaf2 -->

<!-- START_5f312c70674ca9060eaca1c3437c888e -->
## Funcion para agregar otro usuario como amigo

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/usuarios/1/amigos/agregar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/usuarios/1/amigos/agregar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/usuarios/{user_id}/amigos/agregar`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador del usuario que va a agregar un amigo

<!-- END_5f312c70674ca9060eaca1c3437c888e -->

<!-- START_31a0ae91692e2afb1adbedc6748b8746 -->
## Funcion para aceptar la invitacion de un amigo

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/sportodos/usuarios/1/amigos/actualizar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/usuarios/1/amigos/actualizar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/sportodos/usuarios/{user_id}/amigos/actualizar`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador del usuario que va a aceptar un amigo

<!-- END_31a0ae91692e2afb1adbedc6748b8746 -->

<!-- START_d1c8f46f36fa6f68b930df7fefbfd08a -->
## Funcion para eliminar un amigo

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/api/sportodos/usuarios/1/amigos/remover/fugiat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/usuarios/1/amigos/remover/fugiat"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/sportodos/usuarios/{user_id}/amigos/remover/{id_amigo}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador del usuario que va a eliminar un amigo
    `id_amigo` |  optional  | identificador del amigo a eliminar

<!-- END_d1c8f46f36fa6f68b930df7fefbfd08a -->

#Gestion del Perfil deportivo de un usuario

clase para retornar editar y crear informacion de un perfil deportivo dentro del sistema
<!-- START_40ce3df8f7ce759c5aafbea4036b7f1f -->
## Retorna todo los datos de un perfil deportivo incluyendo agregados

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/usuarios/1/perfildeportivo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/usuarios/1/perfildeportivo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/usuarios/{user_id}/perfildeportivo`


<!-- END_40ce3df8f7ce759c5aafbea4036b7f1f -->

<!-- START_a66fefc156091eb8228a880407ea9641 -->
## funcion para actualizar la informacion a un perfil deportivo

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/api/sportodos/usuarios/1/perfildeportivo/editar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/usuarios/1/perfildeportivo/editar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/sportodos/usuarios/{user_id}/perfildeportivo/editar`


<!-- END_a66fefc156091eb8228a880407ea9641 -->

<!-- START_64889b69d98ee7cb9347e1b3ad8c53f3 -->
## funcion para crear un perfil deportivo

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/usuarios/1/perfildeportivo/crear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/usuarios/1/perfildeportivo/crear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/usuarios/{user_id}/perfildeportivo/crear`


<!-- END_64889b69d98ee7cb9347e1b3ad8c53f3 -->

<!-- START_3cd0a761649df1db69936d615fc0f823 -->
## cunacion para ver los amigos que tiene un usuario

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/usuarios/1/amigos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/usuarios/1/amigos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/usuarios/{user_id}/amigos`


<!-- END_3cd0a761649df1db69936d615fc0f823 -->

<!-- START_ff708144519d0bc1331928cc9e8db107 -->
## busqueda de usuarios con un perfil deportivo

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/sportodos/usuarios/1/busqueda" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/usuarios/1/busqueda"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/sportodos/usuarios/{user_id}/busqueda`


<!-- END_ff708144519d0bc1331928cc9e8db107 -->

<!-- START_24bb010d014a5fb166b2916cb5138b8c -->
## funcion para añadir deportes a un perfil deportivo

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/usuarios/1/perfildeportivo/agregarDeporte" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/usuarios/1/perfildeportivo/agregarDeporte"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/usuarios/{user_id}/perfildeportivo/agregarDeporte`


<!-- END_24bb010d014a5fb166b2916cb5138b8c -->

<!-- START_31170019f06b0c542d88196a5f29b57a -->
## funcion para añadir una barrera deportiva a un perfil

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/api/sportodos/usuarios/1/perfildeportivo/agregarBarrera" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/sportodos/usuarios/1/perfildeportivo/agregarBarrera"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sportodos/usuarios/{user_id}/perfildeportivo/agregarBarrera`


<!-- END_31170019f06b0c542d88196a5f29b57a -->

#Gestion de negocios


<!-- START_e3cf6d608b0289c323a28e707443ffab -->
## Funcion que permite listar los negocios creados actualmente en el sistema

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/negocios/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/negocios/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/negocios/all`


<!-- END_e3cf6d608b0289c323a28e707443ffab -->

<!-- START_3da08154dae4ce47979671fd8d552f3a -->
## Funcion que lista un negocio en especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/negocios/exercitationem/detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/negocios/exercitationem/detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET api/negocios/{id}/detail`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador del negocio que se va a mostrar

<!-- END_3da08154dae4ce47979671fd8d552f3a -->

#Listado de lugares


clase que retorna la informacion de los paises y ciudades cargados en el sistema
<!-- START_8b0e61fbaaac096f50bec33e288262f4 -->
## funcion que retorna el listado de paises cargados en el sistema

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/lugares/paises" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/lugares/paises"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "pais_codigo": "AF",
        "pais_nombre": "Afganistan"
    },
    {
        "pais_codigo": "AX",
        "pais_nombre": "Aland Islands"
    },
    {
        "pais_codigo": "AL",
        "pais_nombre": "Albania"
    },
    {
        "pais_codigo": "DE",
        "pais_nombre": "Alemania"
    },
    {
        "pais_codigo": "DZ",
        "pais_nombre": "Algeria"
    },
    {
        "pais_codigo": "AS",
        "pais_nombre": "American Samoa"
    },
    {
        "pais_codigo": "AD",
        "pais_nombre": "Andorra"
    },
    {
        "pais_codigo": "AO",
        "pais_nombre": "Angola"
    },
    {
        "pais_codigo": "AI",
        "pais_nombre": "Anguilla"
    },
    {
        "pais_codigo": "AQ",
        "pais_nombre": "Antarctica"
    },
    {
        "pais_codigo": "AG",
        "pais_nombre": "Antigua and Barbuda"
    },
    {
        "pais_codigo": "AN",
        "pais_nombre": "Antillas Holandesas"
    },
    {
        "pais_codigo": "AR",
        "pais_nombre": "Argentina"
    },
    {
        "pais_codigo": "AM",
        "pais_nombre": "Armenia"
    },
    {
        "pais_codigo": "AW",
        "pais_nombre": "Aruba"
    },
    {
        "pais_codigo": "AP",
        "pais_nombre": "Asia\/Region Pacifica"
    },
    {
        "pais_codigo": "AU",
        "pais_nombre": "Australia"
    },
    {
        "pais_codigo": "AT",
        "pais_nombre": "Austria"
    },
    {
        "pais_codigo": "AZ",
        "pais_nombre": "Azerbaijan"
    },
    {
        "pais_codigo": "BS",
        "pais_nombre": "Bahamas"
    },
    {
        "pais_codigo": "BH",
        "pais_nombre": "Bahrain"
    },
    {
        "pais_codigo": "BD",
        "pais_nombre": "Bangladesh"
    },
    {
        "pais_codigo": "BB",
        "pais_nombre": "Barbados"
    },
    {
        "pais_codigo": "BY",
        "pais_nombre": "Belarus"
    },
    {
        "pais_codigo": "BE",
        "pais_nombre": "Belgica"
    },
    {
        "pais_codigo": "BZ",
        "pais_nombre": "Belize"
    },
    {
        "pais_codigo": "BJ",
        "pais_nombre": "Benin"
    },
    {
        "pais_codigo": "BM",
        "pais_nombre": "Bermuda"
    },
    {
        "pais_codigo": "BT",
        "pais_nombre": "Bhutan"
    },
    {
        "pais_codigo": "BO",
        "pais_nombre": "Bolivia"
    },
    {
        "pais_codigo": "BQ",
        "pais_nombre": "Bonair"
    },
    {
        "pais_codigo": "BA",
        "pais_nombre": "Bosnia y Herzegovina"
    },
    {
        "pais_codigo": "BW",
        "pais_nombre": "Botswana"
    },
    {
        "pais_codigo": "BR",
        "pais_nombre": "Brasil"
    },
    {
        "pais_codigo": "IO",
        "pais_nombre": "British Indian Ocean Territory"
    },
    {
        "pais_codigo": "BN",
        "pais_nombre": "Brunei Darussalam"
    },
    {
        "pais_codigo": "BG",
        "pais_nombre": "Bulgaria"
    },
    {
        "pais_codigo": "BF",
        "pais_nombre": "Burkina Faso"
    },
    {
        "pais_codigo": "BI",
        "pais_nombre": "Burundi"
    },
    {
        "pais_codigo": "KH",
        "pais_nombre": "Cambodia"
    },
    {
        "pais_codigo": "CM",
        "pais_nombre": "Camerun"
    },
    {
        "pais_codigo": "CA",
        "pais_nombre": "Canada"
    },
    {
        "pais_codigo": "CV",
        "pais_nombre": "Cape Verde"
    },
    {
        "pais_codigo": "TD",
        "pais_nombre": "Chad"
    },
    {
        "pais_codigo": "CL",
        "pais_nombre": "Chile"
    },
    {
        "pais_codigo": "CN",
        "pais_nombre": "China"
    },
    {
        "pais_codigo": "CY",
        "pais_nombre": "Chipre"
    },
    {
        "pais_codigo": "CO",
        "pais_nombre": "Colombia"
    },
    {
        "pais_codigo": "KM",
        "pais_nombre": "Comoros"
    },
    {
        "pais_codigo": "CD",
        "pais_nombre": "Cong"
    },
    {
        "pais_codigo": "CG",
        "pais_nombre": "Congo"
    },
    {
        "pais_codigo": "CK",
        "pais_nombre": "Cook Islands"
    },
    {
        "pais_codigo": "CR",
        "pais_nombre": "Costa Rica"
    },
    {
        "pais_codigo": "CI",
        "pais_nombre": "Cote D'Ivoire"
    },
    {
        "pais_codigo": "HR",
        "pais_nombre": "Croacia"
    },
    {
        "pais_codigo": "CU",
        "pais_nombre": "Cuba"
    },
    {
        "pais_codigo": "CW",
        "pais_nombre": "Curacao"
    },
    {
        "pais_codigo": "DK",
        "pais_nombre": "Dinamarca"
    },
    {
        "pais_codigo": "DJ",
        "pais_nombre": "Djibouti"
    },
    {
        "pais_codigo": "DM",
        "pais_nombre": "Dominica"
    },
    {
        "pais_codigo": "EC",
        "pais_nombre": "Ecuador"
    },
    {
        "pais_codigo": "EG",
        "pais_nombre": "Egipto"
    },
    {
        "pais_codigo": "SV",
        "pais_nombre": "El Salvador"
    },
    {
        "pais_codigo": "DX",
        "pais_nombre": "Emiratos &Aacute;rabes"
    },
    {
        "pais_codigo": "EA",
        "pais_nombre": "Emiratos &Aacute;rabes"
    },
    {
        "pais_codigo": "AE",
        "pais_nombre": "Emiratos Arabes"
    },
    {
        "pais_codigo": "GQ",
        "pais_nombre": "Equatorial Guinea"
    },
    {
        "pais_codigo": "ER",
        "pais_nombre": "Eritrea"
    },
    {
        "pais_codigo": "ES",
        "pais_nombre": "Espa&ntilde;a"
    },
    {
        "pais_codigo": "US",
        "pais_nombre": "Estados  Unidos"
    },
    {
        "pais_codigo": "EE",
        "pais_nombre": "Estonia"
    },
    {
        "pais_codigo": "ET",
        "pais_nombre": "Etiopia"
    },
    {
        "pais_codigo": "EU",
        "pais_nombre": "Europa"
    },
    {
        "pais_codigo": "FK",
        "pais_nombre": "Falkland Islands (Malvinas)"
    },
    {
        "pais_codigo": "FO",
        "pais_nombre": "Faroe Islands"
    },
    {
        "pais_codigo": "FJ",
        "pais_nombre": "Fiji"
    },
    {
        "pais_codigo": "FI",
        "pais_nombre": "Finlandia"
    },
    {
        "pais_codigo": "FR",
        "pais_nombre": "Francia"
    },
    {
        "pais_codigo": "PF",
        "pais_nombre": "French Polynesia"
    },
    {
        "pais_codigo": "TF",
        "pais_nombre": "French Southern Territories"
    },
    {
        "pais_codigo": "GA",
        "pais_nombre": "Gabon"
    },
    {
        "pais_codigo": "GM",
        "pais_nombre": "Gambia"
    },
    {
        "pais_codigo": "GE",
        "pais_nombre": "Georgia"
    },
    {
        "pais_codigo": "GH",
        "pais_nombre": "Ghana"
    },
    {
        "pais_codigo": "GI",
        "pais_nombre": "Gibraltar"
    },
    {
        "pais_codigo": "GR",
        "pais_nombre": "Grecia"
    },
    {
        "pais_codigo": "GD",
        "pais_nombre": "Grenada"
    },
    {
        "pais_codigo": "GP",
        "pais_nombre": "Guadalupe"
    },
    {
        "pais_codigo": "GU",
        "pais_nombre": "Guam"
    },
    {
        "pais_codigo": "GT",
        "pais_nombre": "Guatemala"
    },
    {
        "pais_codigo": "GG",
        "pais_nombre": "Guernsey"
    },
    {
        "pais_codigo": "GF",
        "pais_nombre": "Guiana Francesa"
    },
    {
        "pais_codigo": "GN",
        "pais_nombre": "Guinea"
    },
    {
        "pais_codigo": "GW",
        "pais_nombre": "Guinea-Bissau"
    },
    {
        "pais_codigo": "GY",
        "pais_nombre": "Guyana"
    },
    {
        "pais_codigo": "HT",
        "pais_nombre": "Haiti"
    },
    {
        "pais_codigo": "VA",
        "pais_nombre": "Holy See (Vatican City State)"
    },
    {
        "pais_codigo": "HN",
        "pais_nombre": "Honduras"
    },
    {
        "pais_codigo": "HK",
        "pais_nombre": "Hong Kong"
    },
    {
        "pais_codigo": "HU",
        "pais_nombre": "Hungria"
    },
    {
        "pais_codigo": "IN",
        "pais_nombre": "India"
    },
    {
        "pais_codigo": "ID",
        "pais_nombre": "Indonesia"
    },
    {
        "pais_codigo": "EN",
        "pais_nombre": "Ingrlaterra"
    },
    {
        "pais_codigo": "IR",
        "pais_nombre": "Ira"
    },
    {
        "pais_codigo": "IQ",
        "pais_nombre": "Iraq"
    },
    {
        "pais_codigo": "IE",
        "pais_nombre": "Irlanda"
    },
    {
        "pais_codigo": "CC",
        "pais_nombre": "Isla de Cocos (Keeling)"
    },
    {
        "pais_codigo": "CX",
        "pais_nombre": "Isla de Pascua"
    },
    {
        "pais_codigo": "IS",
        "pais_nombre": "Islandia"
    },
    {
        "pais_codigo": "KY",
        "pais_nombre": "Islas Caiman"
    },
    {
        "pais_codigo": "IM",
        "pais_nombre": "Isle of Man"
    },
    {
        "pais_codigo": "IL",
        "pais_nombre": "Israel"
    },
    {
        "pais_codigo": "IT",
        "pais_nombre": "Italia"
    },
    {
        "pais_codigo": "JM",
        "pais_nombre": "Jamaica"
    },
    {
        "pais_codigo": "JP",
        "pais_nombre": "Japon"
    },
    {
        "pais_codigo": "JE",
        "pais_nombre": "Jersey"
    },
    {
        "pais_codigo": "JO",
        "pais_nombre": "Jordan"
    },
    {
        "pais_codigo": "KZ",
        "pais_nombre": "Kazagistan"
    },
    {
        "pais_codigo": "KE",
        "pais_nombre": "Kenya"
    },
    {
        "pais_codigo": "KI",
        "pais_nombre": "Kiribati"
    },
    {
        "pais_codigo": "KP",
        "pais_nombre": "Kore"
    },
    {
        "pais_codigo": "KR",
        "pais_nombre": "Kore"
    },
    {
        "pais_codigo": "KW",
        "pais_nombre": "Kuwait"
    },
    {
        "pais_codigo": "KG",
        "pais_nombre": "Kyrgyzstan"
    },
    {
        "pais_codigo": "LA",
        "pais_nombre": "Lao People's Democratic Republic"
    },
    {
        "pais_codigo": "LV",
        "pais_nombre": "Latvia"
    },
    {
        "pais_codigo": "LS",
        "pais_nombre": "Lesotho"
    },
    {
        "pais_codigo": "LB",
        "pais_nombre": "Libano"
    },
    {
        "pais_codigo": "LR",
        "pais_nombre": "Liberia"
    },
    {
        "pais_codigo": "LY",
        "pais_nombre": "Libya"
    },
    {
        "pais_codigo": "LI",
        "pais_nombre": "Liechtenstein"
    },
    {
        "pais_codigo": "LT",
        "pais_nombre": "Lithuania"
    },
    {
        "pais_codigo": "LU",
        "pais_nombre": "Luxembourg"
    },
    {
        "pais_codigo": "MO",
        "pais_nombre": "Macau"
    },
    {
        "pais_codigo": "MK",
        "pais_nombre": "Macedonia"
    },
    {
        "pais_codigo": "MG",
        "pais_nombre": "Madagascar"
    },
    {
        "pais_codigo": "MW",
        "pais_nombre": "Malawi"
    },
    {
        "pais_codigo": "MY",
        "pais_nombre": "Malaysia"
    },
    {
        "pais_codigo": "MV",
        "pais_nombre": "Maldives"
    },
    {
        "pais_codigo": "ML",
        "pais_nombre": "Mali"
    },
    {
        "pais_codigo": "MT",
        "pais_nombre": "Malta"
    },
    {
        "pais_codigo": "MH",
        "pais_nombre": "Marshall Islands"
    },
    {
        "pais_codigo": "MQ",
        "pais_nombre": "Martinique"
    },
    {
        "pais_codigo": "MR",
        "pais_nombre": "Mauritania"
    },
    {
        "pais_codigo": "MU",
        "pais_nombre": "Mauritius"
    },
    {
        "pais_codigo": "YT",
        "pais_nombre": "Mayotte"
    },
    {
        "pais_codigo": "MX",
        "pais_nombre": "Mexico"
    },
    {
        "pais_codigo": "FM",
        "pais_nombre": "Micronesi"
    },
    {
        "pais_codigo": "MD",
        "pais_nombre": "Moldov"
    },
    {
        "pais_codigo": "MC",
        "pais_nombre": "Monaco"
    },
    {
        "pais_codigo": "MN",
        "pais_nombre": "Mongolia"
    },
    {
        "pais_codigo": "ME",
        "pais_nombre": "Montenegro"
    },
    {
        "pais_codigo": "MS",
        "pais_nombre": "Montserrat"
    },
    {
        "pais_codigo": "MA",
        "pais_nombre": "Morocco"
    },
    {
        "pais_codigo": "MZ",
        "pais_nombre": "Mozambique"
    },
    {
        "pais_codigo": "MM",
        "pais_nombre": "Myanmar"
    },
    {
        "pais_codigo": "NA",
        "pais_nombre": "Namibia"
    },
    {
        "pais_codigo": "NR",
        "pais_nombre": "Nauru"
    },
    {
        "pais_codigo": "NP",
        "pais_nombre": "Nepal"
    },
    {
        "pais_codigo": "NL",
        "pais_nombre": "Netherlands"
    },
    {
        "pais_codigo": "NC",
        "pais_nombre": "New Caledonia"
    },
    {
        "pais_codigo": "NZ",
        "pais_nombre": "New Zealand"
    },
    {
        "pais_codigo": "NI",
        "pais_nombre": "Nicaragua"
    },
    {
        "pais_codigo": "NE",
        "pais_nombre": "Niger"
    },
    {
        "pais_codigo": "NG",
        "pais_nombre": "Nigeria"
    },
    {
        "pais_codigo": "NU",
        "pais_nombre": "Niue"
    },
    {
        "pais_codigo": "NF",
        "pais_nombre": "Norfolk Island"
    },
    {
        "pais_codigo": "MP",
        "pais_nombre": "Northern Mariana Islands"
    },
    {
        "pais_codigo": "NO",
        "pais_nombre": "Norway"
    },
    {
        "pais_codigo": "OM",
        "pais_nombre": "Oman"
    },
    {
        "pais_codigo": "PK",
        "pais_nombre": "Pakistan"
    },
    {
        "pais_codigo": "PW",
        "pais_nombre": "Palau"
    },
    {
        "pais_codigo": "PS",
        "pais_nombre": "Palestinian Territory"
    },
    {
        "pais_codigo": "PA",
        "pais_nombre": "Panama"
    },
    {
        "pais_codigo": "PG",
        "pais_nombre": "Papua New Guinea"
    },
    {
        "pais_codigo": "PY",
        "pais_nombre": "Paraguay"
    },
    {
        "pais_codigo": "PE",
        "pais_nombre": "Peru"
    },
    {
        "pais_codigo": "PH",
        "pais_nombre": "Philippines"
    },
    {
        "pais_codigo": "PN",
        "pais_nombre": "Pitcairn Islands"
    },
    {
        "pais_codigo": "PL",
        "pais_nombre": "Poland"
    },
    {
        "pais_codigo": "PT",
        "pais_nombre": "Portugal"
    },
    {
        "pais_codigo": "PR",
        "pais_nombre": "Puerto Rico"
    },
    {
        "pais_codigo": "QA",
        "pais_nombre": "Qatar"
    },
    {
        "pais_codigo": "GB",
        "pais_nombre": "Reino Unido"
    },
    {
        "pais_codigo": "CZ",
        "pais_nombre": "Rep&uacute;blica Checa"
    },
    {
        "pais_codigo": "CF",
        "pais_nombre": "Rep&uacute;blica de &Aacute;frica Central"
    },
    {
        "pais_codigo": "DO",
        "pais_nombre": "Rep&uacute;blica Dominicana"
    },
    {
        "pais_codigo": "RE",
        "pais_nombre": "Reunion"
    },
    {
        "pais_codigo": "RO",
        "pais_nombre": "Romania"
    },
    {
        "pais_codigo": "RU",
        "pais_nombre": "Russian Federation"
    },
    {
        "pais_codigo": "RW",
        "pais_nombre": "Rwanda"
    },
    {
        "pais_codigo": "BL",
        "pais_nombre": "Saint Barthelemy"
    },
    {
        "pais_codigo": "SH",
        "pais_nombre": "Saint Helena"
    },
    {
        "pais_codigo": "KN",
        "pais_nombre": "Saint Kitts and Nevis"
    },
    {
        "pais_codigo": "LC",
        "pais_nombre": "Saint Lucia"
    },
    {
        "pais_codigo": "MF",
        "pais_nombre": "Saint Martin"
    },
    {
        "pais_codigo": "PM",
        "pais_nombre": "Saint Pierre and Miquelon"
    },
    {
        "pais_codigo": "VC",
        "pais_nombre": "Saint Vincent and the Grenadines"
    },
    {
        "pais_codigo": "WS",
        "pais_nombre": "Samoa"
    },
    {
        "pais_codigo": "SM",
        "pais_nombre": "San Marino"
    },
    {
        "pais_codigo": "ST",
        "pais_nombre": "Sao Tome and Principe"
    },
    {
        "pais_codigo": "A2",
        "pais_nombre": "Satellite Provider"
    },
    {
        "pais_codigo": "SA",
        "pais_nombre": "Saudi Arabia"
    },
    {
        "pais_codigo": "SN",
        "pais_nombre": "Senegal"
    },
    {
        "pais_codigo": "RS",
        "pais_nombre": "Serbia"
    },
    {
        "pais_codigo": "SC",
        "pais_nombre": "Seychelles"
    },
    {
        "pais_codigo": "SL",
        "pais_nombre": "Sierra Leone"
    },
    {
        "pais_codigo": "SG",
        "pais_nombre": "Singapore"
    },
    {
        "pais_codigo": "SX",
        "pais_nombre": "Sint Maarten (Dutch part)"
    },
    {
        "pais_codigo": "SK",
        "pais_nombre": "Slovakia"
    },
    {
        "pais_codigo": "SI",
        "pais_nombre": "Slovenia"
    },
    {
        "pais_codigo": "SB",
        "pais_nombre": "Solomon Islands"
    },
    {
        "pais_codigo": "SO",
        "pais_nombre": "Somalia"
    },
    {
        "pais_codigo": "ZA",
        "pais_nombre": "South Africa"
    },
    {
        "pais_codigo": "GS",
        "pais_nombre": "South Georgia and the South Sandwich Islands"
    },
    {
        "pais_codigo": "SS",
        "pais_nombre": "South Sudan"
    },
    {
        "pais_codigo": "LK",
        "pais_nombre": "Sri Lanka"
    },
    {
        "pais_codigo": "SD",
        "pais_nombre": "Sudan"
    },
    {
        "pais_codigo": "CH",
        "pais_nombre": "Suiza"
    },
    {
        "pais_codigo": "SR",
        "pais_nombre": "Suriname"
    },
    {
        "pais_codigo": "SJ",
        "pais_nombre": "Svalbard and Jan Mayen"
    },
    {
        "pais_codigo": "SZ",
        "pais_nombre": "Swaziland"
    },
    {
        "pais_codigo": "SE",
        "pais_nombre": "Sweden"
    },
    {
        "pais_codigo": "SY",
        "pais_nombre": "Syrian Arab Republic"
    },
    {
        "pais_codigo": "TW",
        "pais_nombre": "Taiwan"
    },
    {
        "pais_codigo": "TJ",
        "pais_nombre": "Tajikistan"
    },
    {
        "pais_codigo": "TZ",
        "pais_nombre": "Tanzani"
    },
    {
        "pais_codigo": "TH",
        "pais_nombre": "Thailand"
    },
    {
        "pais_codigo": "TL",
        "pais_nombre": "Timor-Leste"
    },
    {
        "pais_codigo": "TG",
        "pais_nombre": "Togo"
    },
    {
        "pais_codigo": "TK",
        "pais_nombre": "Tokelau"
    },
    {
        "pais_codigo": "TO",
        "pais_nombre": "Tonga"
    },
    {
        "pais_codigo": "TT",
        "pais_nombre": "Trinidad and Tobago"
    },
    {
        "pais_codigo": "TN",
        "pais_nombre": "Tunisia"
    },
    {
        "pais_codigo": "TM",
        "pais_nombre": "Turkmenistan"
    },
    {
        "pais_codigo": "TC",
        "pais_nombre": "Turks and Caicos Islands"
    },
    {
        "pais_codigo": "TR",
        "pais_nombre": "Turquia"
    },
    {
        "pais_codigo": "TV",
        "pais_nombre": "Tuvalu"
    },
    {
        "pais_codigo": "UG",
        "pais_nombre": "Uganda"
    },
    {
        "pais_codigo": "UA",
        "pais_nombre": "Ukraine"
    },
    {
        "pais_codigo": "UM",
        "pais_nombre": "United States Minor Outlying Islands"
    },
    {
        "pais_codigo": "UY",
        "pais_nombre": "Uruguay"
    },
    {
        "pais_codigo": "UZ",
        "pais_nombre": "Uzbekistan"
    },
    {
        "pais_codigo": "VU",
        "pais_nombre": "Vanuatu"
    },
    {
        "pais_codigo": "VE",
        "pais_nombre": "Venezuela"
    },
    {
        "pais_codigo": "VN",
        "pais_nombre": "Vietnam"
    },
    {
        "pais_codigo": "VG",
        "pais_nombre": "Virgin Island"
    },
    {
        "pais_codigo": "VI",
        "pais_nombre": "Virgin Island"
    },
    {
        "pais_codigo": "WF",
        "pais_nombre": "Wallis and Futuna"
    },
    {
        "pais_codigo": "EH",
        "pais_nombre": "Western Sahara"
    },
    {
        "pais_codigo": "YE",
        "pais_nombre": "Yemen"
    },
    {
        "pais_codigo": "ZM",
        "pais_nombre": "Zambia"
    },
    {
        "pais_codigo": "ZW",
        "pais_nombre": "Zimbabwe"
    }
]
```

### HTTP Request
`GET api/lugares/paises`


<!-- END_8b0e61fbaaac096f50bec33e288262f4 -->

<!-- START_e9e421a3a3c0bdb73879081296432e03 -->
## funcion que retorna el listado de ciudades de un pais en especifico

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/api/lugares/paises/1/ciudades" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/api/lugares/paises/1/ciudades"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[]
```

### HTTP Request
`GET api/lugares/paises/{pais}/ciudades`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `[type]` |  optional  | $pais

<!-- END_e9e421a3a3c0bdb73879081296432e03 -->

#general


<!-- START_0c068b4037fb2e47e71bd44bd36e3e2a -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET oauth/authorize`


<!-- END_0c068b4037fb2e47e71bd44bd36e3e2a -->

<!-- START_e48cc6a0b45dd21b7076ab2c03908687 -->
## Approve the authorization request.

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/authorize`


<!-- END_e48cc6a0b45dd21b7076ab2c03908687 -->

<!-- START_de5d7581ef1275fce2a229b6b6eaad9c -->
## Deny the authorization request.

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/authorize`


<!-- END_de5d7581ef1275fce2a229b6b6eaad9c -->

<!-- START_a09d20357336aa979ecd8e3972ac9168 -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/oauth/token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/oauth/token"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/token`


<!-- END_a09d20357336aa979ecd8e3972ac9168 -->

<!-- START_d6a56149547e03307199e39e03e12d1c -->
## Get all of the authorized tokens for the authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/oauth/tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/oauth/tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET oauth/tokens`


<!-- END_d6a56149547e03307199e39e03e12d1c -->

<!-- START_a9a802c25737cca5324125e5f60b72a5 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/oauth/tokens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/oauth/tokens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/tokens/{token_id}`


<!-- END_a9a802c25737cca5324125e5f60b72a5 -->

<!-- START_abe905e69f5d002aa7d26f433676d623 -->
## Get a fresh transient token cookie for the authenticated user.

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/oauth/token/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/oauth/token/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/token/refresh`


<!-- END_abe905e69f5d002aa7d26f433676d623 -->

<!-- START_babcfe12d87b8708f5985e9d39ba8f2c -->
## Get all of the clients for the authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/oauth/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/oauth/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET oauth/clients`


<!-- END_babcfe12d87b8708f5985e9d39ba8f2c -->

<!-- START_9eabf8d6e4ab449c24c503fcb42fba82 -->
## Store a new client.

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/oauth/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/oauth/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/clients`


<!-- END_9eabf8d6e4ab449c24c503fcb42fba82 -->

<!-- START_784aec390a455073fc7464335c1defa1 -->
## Update the given client.

> Example request:

```bash
curl -X PUT \
    "http://api.togroow.local/oauth/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/oauth/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT oauth/clients/{client_id}`


<!-- END_784aec390a455073fc7464335c1defa1 -->

<!-- START_1f65a511dd86ba0541d7ba13ca57e364 -->
## Delete the given client.

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/oauth/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/oauth/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/clients/{client_id}`


<!-- END_1f65a511dd86ba0541d7ba13ca57e364 -->

<!-- START_9e281bd3a1eb1d9eb63190c8effb607c -->
## Get all of the available scopes for the application.

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/oauth/scopes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/oauth/scopes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET oauth/scopes`


<!-- END_9e281bd3a1eb1d9eb63190c8effb607c -->

<!-- START_9b2a7699ce6214a79e0fd8107f8b1c9e -->
## Get all of the personal access tokens for the authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/oauth/personal-access-tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/oauth/personal-access-tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No autenticado"
}
```

### HTTP Request
`GET oauth/personal-access-tokens`


<!-- END_9b2a7699ce6214a79e0fd8107f8b1c9e -->

<!-- START_a8dd9c0a5583742e671711f9bb3ee406 -->
## Create a new personal access token for the user.

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/oauth/personal-access-tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/oauth/personal-access-tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/personal-access-tokens`


<!-- END_a8dd9c0a5583742e671711f9bb3ee406 -->

<!-- START_bae65df80fd9d72a01439241a9ea20d0 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE \
    "http://api.togroow.local/oauth/personal-access-tokens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/oauth/personal-access-tokens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/personal-access-tokens/{token_id}`


<!-- END_bae65df80fd9d72a01439241a9ea20d0 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://api.togroow.local/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://api.togroow.local/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.togroow.local/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->


