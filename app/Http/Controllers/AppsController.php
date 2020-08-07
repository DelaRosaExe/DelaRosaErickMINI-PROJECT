<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class AppsController extends Controller
{
    public function AppsStore() {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Apps;
        $appCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $apps = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Apps.Index', ['apps' => $apps, 'appCount' => $appCount]);
    }

    //User

    public function AddComment() {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Apps;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $app= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('appid')) ]);
        $Comments = $app->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('appid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/apps/".request('appid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Apps;
        $app = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Apps.Details', [ "app" => $app]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Apps;
        $apps = $collection->find();  
        return view('Admin.Apps.Index', ['apps' => $apps]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Apps;
        $app = $collection->find();
        return view('Admin.Apps.Create', [ "apps" => $app ]);
    }

    public function Store() {
        $app = [
            "App" => request("App"),
            "Rating" => request("Rating"),
            "Size" => request("Size"),
            "Installs" => request("Installs"),
            "Type" => request("Type"),
            "Genres" => request("Genres"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Apps;
        $insertOneResult = $collection->insertOne($app);
        return redirect("/admin/apps");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Apps;
        $app = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Apps.Edit', [ "app" => $app ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Apps;
        $app = [
            "App" => request("App"),
            "Rating" => request("Rating"),
            "Size" => request("Size"),
            "Installs" => request("Installs"),
            "Type" => request("Type"),
            "Genres" => request("Genres"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("appid"))
        ], [
            '$set' => $app
        ]);
        return redirect('/admin/apps/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Apps;
        $app = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Apps.Delete', [ "app" => $app ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Apps;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("appid"))
        ]);
        return redirect('/admin/apps/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Apps;
        $app = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Apps.Details', [ "app" => $app ]);
    }

}