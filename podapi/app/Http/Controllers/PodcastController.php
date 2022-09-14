<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    /**
     * Hämtar alla podcasts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Returnerar alla lagrade podcasts
        return Podcast::all();
    }

    /**
     * Lägger till en podcast
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validerar och kontrollerar att allt är ifyllt. Skrivs ut ett felmeddelande om något inte är ifyllt. Krav på att alla fält ska vara ifyllda
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'members' => 'required',
            'weekly' => 'required'
        ]);

        //Lägger till och returnerar den nya podcasten som har skapats
        return Podcast::create($request->all());
    }

    /**
     * Hämtar och visar en specifik podcast
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Hämtar podcast utifrån dess id
        $podcast = Podcast::find($id);

        //Kontroll om variabeln $podcast inte är lika med null
        if ($podcast != null) {
            //Returnerar podcasten
            return $podcast;
        } else {
            //Skriver ut felmeddelande och felkoden 404 om variabeln $podcast är null
            return response()->json([
                'Podcasten kunde inte hittas!'
            ], 404);
        }
    }

    /**
     * Updaterar enskild podcast
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Hämtar podcast utifrån dess id och sparar i variabeln $podcast
        $podcast = Podcast::find($id);

        //Validerar och kontrollerar att allt är ifyllt. Krav på att alla fält ska vara ifyllda
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'members' => 'required',
            'weekly' => 'required'
        ]);

        //Kontroll om variabeln $podcast inte är lika med null
        if ($podcast != null) {
            //Uppdaterar 
            $podcast->update($request->all());
            //Returnerar det uppdaterade innehållet
            return $podcast;
        } else {
            //Returnerar ett felmeddelande och felkod om podcasten inte kunde hittas
            return response()->json(['Podcasten kunde inte hittas'], 404);
        }
    }

    /**
     * Tar bort en podcast utifrån dess id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Hämtar podcast utifrån dess ID
        $podcast = Podcast::find($id);

        //Kontroll om podcasten inte är lika med null
        if ($podcast != null) {
            //Tar bort podcasten
            $podcast->delete();
            //Returnerar 
            return response()->json(['Podcasten har tagits bort']);
        } else {
            return response()->json(['Podcasten kunde inte hittas'], 404);
        }
    }
}
