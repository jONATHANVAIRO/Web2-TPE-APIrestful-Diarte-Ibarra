# Web2-TPE-APIrestful-Diarte-Ibarra



#### EXPLICACION DE LOS ENDPOINTS:

###### GET:

`GET api/camisetas`
#### 1. Obtener todas las camisetas 
Ejemplo: 

`localhost/tpe-web2-Diarte-Ibarra-rest/api/camisetas`

Resultado:

```json
[
    {
        "id": 126,
        "nombre_equipo": "AAAAAAAAAAAA",
        "categoria_camiseta": "AAAAAAAAAAA",
        "tipo_camiseta": "A",
        "imagen": "https://www.tradeinn.com/f/13664/136644404/copa-camiseta-manga-corta-brazil-1960.jpg",
        "id_decada": 1,
        "numero_decada": 60
    },
    {
        "id": 97,
        "nombre_equipo": "Real Madrid",
        "categoria_camiseta": "Club",
        "tipo_camiseta": "Titular",
        "imagen": "https://estaticos01.marca.com/imagenes/2011/04/19/futbol/copa_rey/1303215006_0.jpg",
        "id_decada": 2,
        "numero_decada": 70
    }
  ]
```

#### 2. Obtener una camiseta por ID
`GET api/camisetas/:ID`

Ejemplo: 

`localhost/tpe-web2-Diarte-Ibarra-rest/api/camisetas/97`

Resultado: 
```json
 {
        "id": 97,
        "nombre_equipo": "Real Madrid",
        "categoria_camiseta": "Club",
        "tipo_camiseta": "Titular",
        "imagen": "https://estaticos01.marca.com/imagenes/2011/04/19/futbol/copa_rey/1303215006_0.jpg",
        "id_decada": 2,
        "numero_decada": 70
    }
```

#### 3. Obtener una camiseta ordenadas por un campo y un orden(ASC o DESC):

`GET api/camisetas`
###### CAMPOS:
- id
- nombre_equipo
- categoria_camiseta
- tipo_camiseta

Ejemplo:
`localhost/tpe-web2-Diarte-Ibarra-rest/api/camisetas?order=numero_decada&sort=DESC`

Resultado:

```json
[
    {
        "id": 112,
        "nombre_equipo": "Manchester City",
        "categoria_camiseta": "Club",
        "tipo_camiseta": "Titular",
        "imagen": "https://perufc.com/wp-content/uploads/2022/07/51189-1.jpg",
        "id_decada": 2015,
        "numero_decada": 2020
    },
    {
        "id": 121,
        "nombre_equipo": "Arsenal",
        "categoria_camiseta": "Club",
        "tipo_camiseta": "Titular",
        "imagen": "https://www.thunderinternacional.com/cdn/shop/products/arsenal-2022-23-adidas-home-kit-10_be987551-744e-4d7b-9378-8960f2459ee4.jpg?v=1663803765&width=493",
        "id_decada": 2015,
        "numero_decada": 2020
    },
    {
        "id": 111,
        "nombre_equipo": "España",
        "categoria_camiseta": "Seleccion",
        "tipo_camiseta": "Alternativa",
        "imagen": "https://cdn.shopify.com/s/files/1/0605/7515/4372/products/1267525263_extras_noticia_foton_7_0.jpg?v=1639478999",
        "id_decada": 6,
        "numero_decada": 2010
    }]
```

------------


#### 4. Crear una nueva camiseta:

###### POST



`POST api/camisetas`

Ejemplo: 

URL: `localhost/tpe-web2-Diarte-Ibarra-rest/api/camisetas`

BODY:
```json
{
        "nombre_equipo": "Nombre...",
        "categoria_camiseta": "Club",
        "tipo_camiseta": "Alternativa",
        "imagen": "https://cdn.shopify.com/s/files/1/0605/7515/4372/products/1267525263_extras_noticia_foton_7_0.jpg?v=1639478999",
        "id_decada": 1
    }
```
###### La camiseta es creada y guardada en la base de datos y luego es mostrada.



------------


#### 5. Modificar una  camiseta:

###### PUT



`PUT api/camisetas/:ID`

Ejemplo: 

URL: `localhost/tpe-web2-Diarte-Ibarra-rest/api/camisetas/126`

BODY:
```json
{
        "nombre_equipo": "Nuevo nombre...",
        "categoria_camiseta": "Club",
        "tipo_camiseta": "Alternativa",
        "imagen":  "https://cdn.shopify.com/s/files/1/0605/7515/4372/products/1267525263_extras_noticia_foton_7_0.jpg?v=1639478999",
        "id_decada": 3
    }
```
##### La camiseta es modificada y guardada en la base de datos y luego es mostrada.

