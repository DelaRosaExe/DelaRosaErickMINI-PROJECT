<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class DragonballsController extends Controller
{
    public function DragonballsStore() {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Dragonballs;
        $dragonballCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $dragonballs = $collection->find([], ["limit" => 16, "skip" => ($page-1) * 16]);  
        return view('Dragonballs.Index', ['dragonballs' => $dragonballs, 'dragonballCount' => $dragonballCount]);
    }

    // User

    public function AddComment() {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Dragonballs;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $dragonball = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('dragonballid')) ]);
        $Comments = $dragonball->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('dragonballid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/dragonballs/".request('dragonballid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Dragonballs;
        $dragonball = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Dragonballs.Details', [ "dragonball" => $dragonball]);
    }

    // Admin

    public function Index() {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Dragonballs;
        $dragonballs = $collection->find();  
        return view('Admin.Dragonballs.Index', ['dragonballs' => $dragonballs]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Dragonballs;
        $dragonball = $collection->find();
        return view('Admin.Dragonballs.Create', [ "dragonballs" => $dragonball ]);
    }

    public function Store() {
        $dragonball = [
            "Character" => request("Character"),
            "Power_Level" => request("Power_Level"),
            "Saga_or_Movie" => request("Saga_or_Movie"),
            "Dragon_Ball_Series" => request("Dragon_Ball_Series"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Dragonballs;
        $insertOneResult = $collection->insertOne($dragonball);
        return redirect("/admin/dragonballs");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Dragonballs;
        $dragonball = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Dragonballs.Edit', [ "dragonball" => $dragonball ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Dragonballs;
        $dragonball = [
            "Character" => request("Character"),
            "Power_Level" => request("Power_Level"),
            "Saga_or_Movie" => request("Saga_or_Movie"),
            "Dragon_Ball_Series" => request("Dragon_Ball_Series"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("dragonballid"))
        ], [
            '$set' => $dragonball
        ]);
        return redirect('/admin/dragonballs/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Dragonballs;
        $dragonball = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Dragonballs.Delete', [ "dragonball" => $dragonball ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Dragonballs;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("dragonballid"))
        ]);
        return redirect('/admin/dragonballs/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Dragonballs;
        $dragonball = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Dragonballs.Details', [ "dragonball" => $dragonball ]);
    }

}