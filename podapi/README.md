# DT193G, Moment 2 (Back-end ramverk)
Detta repository innehåller koden för en REST-webbtjänst skapad med Laravel. REST-webbtjänsten har CRUD(Create, Read, Update och Delete)-funktionalitet. Webbtjänsten hanterar mina favorit-podcast och har publicerats med Heroku.

## Länk
https://warm-chamber-88577.herokuapp.com/ 

## Databas
När databasen installeras skapas tabellen Podcasts.
| Tabellnamn  | Fält |
| ------------- | ------------- |
| id  | bigint(20)  |
| name  | varchar(70)  |
| category  | varchar(50)  |
| members  | int(11)  |
| weekly  | tinyint(1)  |
| created_at  | timestamp  |
| updated_at  | timestamp  |

## Använda webbtjänsten
Nedan finns beskrivet hur man nå APIet på olika vis:
| Metod  | Ändpunkt | Beskrivning
| ------------- | ------------- | ------------- |
| GET  | api/podcast  | Hämtar alla lagrade podcasts |
| GET  | api/podcast/id  | Hämtar en specifik podcast med angivet ID. |
| POST  | api/podcast  | Lagrar en ny podcast. Kräver att ett podcast-objekt skickas med. |
| PUT  | api/podcast/id  | Uppdaterar en lagrad podcast med angivet ID. Kräver att ett podcast-objekt skickas med. |
| DELETE  | api/podcast/id  | Raderar en podcast med angivet ID. |

Ett podcast-objekt returneras/skickas som JSON med följande struktur:
`
{
  "id": 2,
  "name": "Haveristerna",
  "category": "Satir",
  "members": 3,
  "weekly": false,
  "created_at": "2022-09-13T12:47:35.000000Z",
  "updated_at": "2022-09-13T14:05:55.000000Z"
}
`






