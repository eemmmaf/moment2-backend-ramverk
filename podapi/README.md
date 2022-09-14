# DT193G, Moment 2 (Back-end ramverk)
Detta repository innehåller koden för en REST-webbtjänst skapad med Laravel. REST-webbtjänsten har CRUD(Create, Read, Update och Delete)-funktionalitet. Webbtjänsten hanterar mina favorit-podcast och har publicerats med Heroku. Datan presenterats i JSON-format och går att testköra. 

## Länk till REST-webbtjänsten
https://warm-chamber-88577.herokuapp.com/ 

## Databas
När databasen installeras skapas tabellen Podcasts. Tabellen lagrar:
* Podcastens id
* Podcastens namn(name)
* Vilken kategori den har, exempelvis humor/skräck(category)
* Hur många medlemmar podcasten har(members)
* Om den kommer ut veckovis(weekly)
* När den har lagrats(created_at)
* När den uppdaterades senast(updated_at)

### Tabellen Podcasts
| Namn  | Typ |
| ------------- | ------------- |
| id  | bigint(20)  |
| name  | varchar(70)  |
| category  | varchar(50)  |
| members  | int(11)  |
| weekly  | tinyint(1)  |
| created_at  | timestamp  |
| updated_at  | timestamp  |

### Databas-server
Till denna uppgift har ett plugin som heter JawsDB MySQL installerats på Heroku. 

## Controller
En controller har skapats och filen har namnet PodcastController.php. Controllern innehåller 5 funktioner. 
### Funktioner i controllern
#### Public function index
Returnerar alla lagrade podcasts. 
#### Public function store
Funktionen lägger till en podcast. I den görs en kontroll som kollar om allting är ifyllt. 
#### Public function show
Denna funktion visar en utvald podcast. Där görs en kontroll ifall den eftersökta podcasten hittas eller ej. Om den inte hittas skrivs ett felmeddelande ut, annars visas den. 
#### Public function update
Funktionen uppdaterar utvald podcast. I den görs också en kontroll om den utvalda pocasten hittas. Felmeddelande skrivs ut om den inte hittas, annars uppdateras podcasten. 
#### Public function destroy
Denna funktion tar bort en enskild podcast. En kontroll görs för att se om podcasten hittas eller inte. Om den hittas tas den bort och ett meddelande skrivs ut som bekräftar borttagningen. Om den inte hittas får användaren ett felmeddelande. 

## Model
En model har skapats. Filen heter Podcast.php och den hittas i mappen Models. 

## Migrering
En migrerings-fil har skapats. I den finns funktionen _up()_. I den skapas tabellen.
```
 public function up()
    {
        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 70); //Podcastens namn
            $table->string('category', 50); //Podcastens kategori
            $table->integer('members'); //Antal medlemmar
            $table->boolean('weekly'); //Kommer den ut veckovis?
            $table->timestamps();
        });
```

För att köra migreringsfilen och skapa tabellen används kommandot 
```php artisan migrate```


## Använda webbtjänsten
Det går att testköra webbtjänsten. För att både hämta alla podcast och enskild podcast går det att testköra webbtjänsten direkt i webbläsaren. För att lägga till, uppdatera och ta bort en podcast går det bra att använda exempelvis Thunderclient eller Postman. 

Nedan finns beskrivet hur man kan nå APIet på olika vis:
| Metod  | Ändpunkt | Beskrivning | URL | 
| ------------- | ------------- | ------------- | ------------- |
| GET  | api/podcasts  | Hämtar alla lagrade podcasts | http://warm-chamber-88577.herokuapp.com/api/podcasts |
| GET  | api/podcasts/id  | Hämtar en specifik podcast med angivet ID. | https://warm-chamber-88577.herokuapp.com/api/podcasts/2 |
| POST  | api/podcasts  | Lagrar en ny podcast. Kräver att ett podcast-objekt skickas med. | http://warm-chamber-88577.herokuapp.com/api/podcasts |
| PUT  | api/podcasts/id  | Uppdaterar en lagrad podcast med angivet ID. Kräver att ett podcast-objekt skickas med. | https://warm-chamber-88577.herokuapp.com/api/podcasts/2 |
| DELETE  | api/podcasts/id  | Raderar en podcast med angivet ID. | https://warm-chamber-88577.herokuapp.com/api/podcasts/2 |

Ett podcast-objekt med id 2 returneras/skickas som JSON med följande struktur:
```
{
  "id": 2,
  "name": "Haveristerna",
  "category": "Satir",
  "members": 3,
  "weekly": false,
  "created_at": "2022-09-13T12:47:35.000000Z",
  "updated_at": "2022-09-13T14:05:55.000000Z"
}
```

## Publicering
Webbtjänsten har publicerats med [Heroku](https://www.heroku.com/).  





