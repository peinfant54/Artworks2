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
[Get Postman Collection](http://localhost:8000/docs/collection.json)
<!-- END_INFO -->

#general
<!-- START_0d5559dd04c331bd14e76c15071978bc -->
## art/location/index

> Example request:

```bash
curl -X GET "http://localhost:8000/art/location/index" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/art/location/index",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET art/location/index`

`HEAD art/location/index`


<!-- END_0d5559dd04c331bd14e76c15071978bc -->

<!-- START_3794cef310e375d17a43833ae8f509d1 -->
## art/location/delete

> Example request:

```bash
curl -X POST "http://localhost:8000/art/location/delete" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/art/location/delete",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST art/location/delete`


<!-- END_3794cef310e375d17a43833ae8f509d1 -->

<!-- START_9a258b6d675a5db85ab99be90f3bbee4 -->
## art/location/create

> Example request:

```bash
curl -X POST "http://localhost:8000/art/location/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/art/location/create",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST art/location/create`


<!-- END_9a258b6d675a5db85ab99be90f3bbee4 -->

<!-- START_246f1ea08d2b12e927374e615e9079f2 -->
## art/location/edit

> Example request:

```bash
curl -X POST "http://localhost:8000/art/location/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/art/location/edit",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST art/location/edit`


<!-- END_246f1ea08d2b12e927374e615e9079f2 -->

<!-- START_4db8d330f54c22d0077a1bbf217bfcd0 -->
## art/obra/index

> Example request:

```bash
curl -X GET "http://localhost:8000/art/obra/index" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/art/obra/index",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET art/obra/index`

`HEAD art/obra/index`


<!-- END_4db8d330f54c22d0077a1bbf217bfcd0 -->

<!-- START_a34cdb59bd909f06b2e0d40ce54aeac2 -->
## art/obra/delete

> Example request:

```bash
curl -X POST "http://localhost:8000/art/obra/delete" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/art/obra/delete",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST art/obra/delete`


<!-- END_a34cdb59bd909f06b2e0d40ce54aeac2 -->

<!-- START_5ad6a99874e00197935b3957189b9140 -->
## art/obra/create

> Example request:

```bash
curl -X POST "http://localhost:8000/art/obra/create" \
-H "Accept: application/json" \
    -d "n_inv"="iusto" \
    -d "titulo"="iusto" \
    -d "tecnica"="iusto" \
    -d "dimension"="iusto" \
    -d "ano"="iusto" \
    -d "edicion"="iusto" \
    -d "procedencia"="iusto" \
    -d "catalogo"="iusto" \
    -d "certificacion"="iusto" \
    -d "valoracion"="iusto" \
    -d "foto1"="iusto" \
    -d "foto2"="iusto" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/art/obra/create",
    "method": "POST",
    "data": {
        "n_inv": "iusto",
        "titulo": "iusto",
        "tecnica": "iusto",
        "dimension": "iusto",
        "ano": "iusto",
        "edicion": "iusto",
        "procedencia": "iusto",
        "catalogo": "iusto",
        "certificacion": "iusto",
        "valoracion": "iusto",
        "foto1": "iusto",
        "foto2": "iusto"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST art/obra/create`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    n_inv | string |  required  | Maximum: `10`
    titulo | string |  required  | Maximum: `100`
    tecnica | string |  optional  | Maximum: `200`
    dimension | string |  optional  | Maximum: `200`
    ano | string |  optional  | Maximum: `20`
    edicion | string |  optional  | Maximum: `200`
    procedencia | string |  optional  | Maximum: `100`
    catalogo | string |  optional  | Maximum: `200`
    certificacion | string |  optional  | Maximum: `100`
    valoracion | string |  optional  | Maximum: `100`
    foto1 | image |  optional  | Must be an image (jpeg, png, bmp, gif, or svg) Allowed mime types: `jpeg`, `bmp`, `png` or `jpg` Maximum: `5120`
    foto2 | image |  optional  | Must be an image (jpeg, png, bmp, gif, or svg) Allowed mime types: `tif`

<!-- END_5ad6a99874e00197935b3957189b9140 -->

<!-- START_d5bc77a38c7594498af35f62ce8c8714 -->
## art/obra/edit

> Example request:

```bash
curl -X POST "http://localhost:8000/art/obra/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/art/obra/edit",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST art/obra/edit`


<!-- END_d5bc77a38c7594498af35f62ce8c8714 -->

<!-- START_30914c1e521a23ceaf7bc146f827489d -->
## art/artist/index

> Example request:

```bash
curl -X GET "http://localhost:8000/art/artist/index" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/art/artist/index",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET art/artist/index`

`HEAD art/artist/index`


<!-- END_30914c1e521a23ceaf7bc146f827489d -->

<!-- START_75f9733aa3214786a202b3428d705013 -->
## art/artist/delete

> Example request:

```bash
curl -X POST "http://localhost:8000/art/artist/delete" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/art/artist/delete",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST art/artist/delete`


<!-- END_75f9733aa3214786a202b3428d705013 -->

<!-- START_57a35d5b8221514d1c2c2c29d0dd935c -->
## art/artist/create

> Example request:

```bash
curl -X POST "http://localhost:8000/art/artist/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/art/artist/create",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST art/artist/create`


<!-- END_57a35d5b8221514d1c2c2c29d0dd935c -->

<!-- START_a8d6a69cfa19df04ef07871d1a63d962 -->
## art/artist/edit

> Example request:

```bash
curl -X POST "http://localhost:8000/art/artist/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/art/artist/edit",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST art/artist/edit`


<!-- END_a8d6a69cfa19df04ef07871d1a63d962 -->

<!-- START_0918ca90cae3dbeba564c614a2ed6e3b -->
## art/artist/export/{id}

> Example request:

```bash
curl -X GET "http://localhost:8000/art/artist/export/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/art/artist/export/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET art/artist/export/{id}`

`HEAD art/artist/export/{id}`


<!-- END_0918ca90cae3dbeba564c614a2ed6e3b -->

<!-- START_f7868e7428496e42ad8101bb3e5f65df -->
## art/artist/pdfexport

> Example request:

```bash
curl -X GET "http://localhost:8000/art/artist/pdfexport" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/art/artist/pdfexport",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET art/artist/pdfexport`

`HEAD art/artist/pdfexport`


<!-- END_f7868e7428496e42ad8101bb3e5f65df -->

