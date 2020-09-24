<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\archive;
use App\Models\Cell;
use App\Models\folder;
use App\Models\File;
use Illuminate\Http\Response;
use Illuminate\View\Middleware\ShareErrorsFromSession;
class archive_controller extends Controller
{
 public function join(){
$data=DB::table('archive_cabinet')->get();
return view('room', ['data' =>$data ]);

}


// show search result
public function search(){
    $data=DB::table('archive_cabinet')
    ->join('cell', 'archive_cabinet.archive_id','=', 'cell.archive_id')
    ->join('folders', 'folders.cell_id', '=', 'cell.cell_id')
    ->select('archive_cabinet.*', 'cell.*', 'folders.*')
    ->get();
    
    return view('search_table', ['data'=>$data]);
}

//search folders
public function searchData(Request $request)
{
    
    $searchRequest=$request->input('search');

    if (is_numeric($searchRequest)){

    
    $datas=DB::table('archive_cabinet')
   
    ->join('cell', 'archive_cabinet.archive_id','=', 'cell.archive_id')
   
    ->join('folders', 'folders.cell_id', '=', 'cell.cell_id')
   
    ->select('archive_cabinet.*', 'cell.*', 'folders.*')
   
    ->where('folders.folder_id', '=', $searchRequest)
   
    ->get();

    if(count($datas) == 0) {
    echo "There is not this kind of folder";}
    else{
return view ('search', ['datas'=>$datas]);

    }
}
  
    else{
    
  echo "Id must be number";}

}

//show Cells

public function showCell($id)
{
    $datas=DB::table('cell')
   
    ->where('archive_id', '=', $id)->get();


  return view('cell', ['datas'=>$datas, 'id'=>$id]);
}
// show folders
public function showFolder($id)
{
$datas=DB::table('folders')
->where('cell_id', '=', $id)->get();
return view('folder', ['datas'=>$datas, 'id'=>$id]);
}






//create new Cabinet
public function createCabinet(Request $request)
{

    $this->validate($request, ['cabinet_name' => 'required|min:4|max:10|alpha_dash']);
$cabinet_name=$request->input('cabinet_name');
 
$insert= new archive;

    $insert->name_archive =$cabinet_name;
  
$insert->save();
   
return redirect('/showArchive')->with('status', 'New cupboard created!');
  }




// create new cell

public function createCell(Request $request, $id)
{

    $this->validate($request, ['cell_name' => 'required|min:4|max:10|alpha_dash']);
    $cell_name=$request->input('cell_name');








$insert= new Cell;

$insert->archive_id=$id;

    $insert->name_cell =$cell_name;

$insert->save();
 return redirect()->route('showCell', $id)->with('status', 'New cell created!');
}


// create new folder

public function createFolder(Request $request, $id)
{
        
    $this->validate($request, ['folder_name' => 'required|min:4|max:10|alpha_dash']);
    $folder_name=$request->input('folder_name');

    $insert= new folder;

    $insert->cell_id=$id;
    
    $insert->name_folder =$folder_name;
    
    $insert->save();
     return redirect()->route('showFolder', $id)->with('status', 'New folder created!'); 


}



//change location of folder
public function changeLocation(Request $request,$id){
  
    $this->validate($request, ['cell_id' => 'required|numeric']);
  
  
    $new_cell=$request->input('cell_id');
    
$cell=DB::table('cell')
 ->where('cell_id', '=', $new_cell)->get();

if(count($cell) == 0) {


echo "there is not a cell with this id";}
 else{
     
 $insert= DB::table('folders')
->where('folder_id', '=', $id)
->update(['cell_id' => $new_cell]);

return redirect()->action(
    [archive_controller::class, 'showFolder'], ['id' => $new_cell, 'datas'=>$insert]
)->with('status', 'location of folder changed!');
}


}








// show change view
public function changeView($id){
    $datas=DB::table('folders')
->where('folder_id', '=', $id)->get()->first();
    return view('changeLocation', ['id'=>$id]);

}


// show all files in a folder
public function showFiles($id){
    $fileModel=DB::table('Files')
    ->where('folder_id', '=', $id)
    ->get();
    return view ('files', ['id'=>$id, 'fileModel'=>$fileModel]);
}


//upload file 
public function uploadFile(Request $request, $id){
    $this->validate($request,[
        'file_name' => 'required|mimes:csv,txt,xlx,xls,pdf,doc, docx, zip,|max:2048'
        ]);
        

            $fileModel=new File;
       
$fileName= $request->file_name->getClientOriginalName();


$request->file_name->storeAs('public/files', $fileName);


$fileModel->name_file=$fileName;
$fileModel->folder_id=$id;
$fileModel->save();


return redirect()->route("showFiles", $id)->with('status', 'New files uploaded');


}


// view files
public function viewFile($file_id){
    $file=DB::table('Files')
    ->where('file_id', '=', $file_id)
    ->get()->first();
return view('viewFile', ['file'=>$file]);
}
 // download files

 public function downloadFile($file){
return response()->download('storage/files/'.$file);
 }


 // delete files

 public function deleteFolder($id){
    $folder=DB::table('folders')
    ->where('folder_id', '=', $id)->delete();
   
    // $folder->delete();
     
     return redirect()->route('showFolder', $id)->with('status', 'Folder has been deleted'); 
 
    }

    public function deleteCell($id){
        $folder=DB::table('cell')
        ->where('cell_id', '=', $id)->delete();
       
        // $folder->delete();
         
         return redirect()->route('showCell', $id)->with('status', 'Cell has been deleted'); 
     
        }



}
