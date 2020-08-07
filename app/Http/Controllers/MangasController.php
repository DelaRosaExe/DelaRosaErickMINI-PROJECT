<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class MangasController extends Controller
{
    public function MangasStore() {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Mangas;
        $mangaCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $mangas = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Mangas.Index', ['mangas' => $mangas, 'mangaCount' => $mangaCount]);
    }

    // User

    public function AddComment() {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Mangas;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $manga = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('mangaid')) ]);
        $Comments = $manga->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('mangaid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/mangas/".request('mangaid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Mangas;
        $manga = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Mangas.Details', [ "manga" => $manga]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Mangas;
        $mangas = $collection->find();  
        return view('Admin.Mangas.Index', ['mangas' => $mangas]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Mangas;
        $manga = $collection->find();
        return view('Admin.Mangas.Create', [ "mangas" => $manga ]);
    }

    public function Store() {
        $manga = [
            "English Title" => request("English Title"),
            "Synonims Titles" => request("Synonims Titles"),
            "Japanese Title" => request("Japanese Title"),
            "Volumes" => request("Volumes"),
            "Published" => request("Published"),
            "Genres" => request("Genres"),
            "Author" => request("Author"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Mangas;
        $insertOneResult = $collection->insertOne($manga);
        return redirect("/admin/mangas");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Mangas;
        $manga = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Mangas.Edit', [ "manga" => $manga ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Mangas;
        $manga = [
            "English Title" => request("English Title"),
            "Synonims Titles" => request("Synonims Titles"),
            "Japanese Title" => request("Japanese Title"),
            "Volumes" => request("Volumes"),
            "Published" => request("Published"),
            "Genres" => request("Genres"),
            "Author" => request("Author"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("mangaid"))
        ], [
            '$set' => $manga
        ]);
        return redirect('/admin/mangas/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Mangas;
        $manga = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Mangas.Delete', [ "manga" => $manga ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Mangas;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("mangaid"))
        ]);
        return redirect('/admin/mangas/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Mangas;
        $manga = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Mangas.Details', [ "manga" => $manga ]);
    }

}