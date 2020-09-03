<?php


namespace App\Services;
use Illuminate\Support\Facades\DB;
use App\Models\Album;


class CriaAlbum
{
    public function criaAlbum(
        string $name,
        string $description,
        int $maxSelectPhotos
    ):Album{
        DB::beginTransaction();
        $album = Album::create([
            'name' => $name,
            'description'=>$description,
            'maxSelectPhotos'=>$maxSelectPhotos
        ]);
        #$qtdTemporadas = $qtdTemporadas;

        #$this->addPhotos($qtdTemporadas, $serie, $epPorTemporada);
        DB::commit();
        return $album;
    }

}
