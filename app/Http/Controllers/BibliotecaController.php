<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class BibliotecaController extends Controller
{
    //

    public function index(){

  
        $biblioteca=HTTP::withOptions([ 'verify' => false, ])->get('https://localhost:44318/api/Biblioteca');
        $pasado=$biblioteca;

     return view('biblioteca',['pasado'=>$pasado]);
      }
 
      public function borrar(Request $request)
      {
        $todo=new Biblioteca();
        $todo->idBiblioteca=$request->idBiblioteca;
        $enviado='https://localhost:44318/api/Biblioteca/'.$todo->idBiblioteca;
   
      Http::withOptions(['verify' => false,])
           ->delete($enviado);
   
        return redirect()->route('biblioteca')-> with('success','Biblioteca eliminada');
      }

      public function store(Request $request){
        $request->validate([
            'nombre' => 'required|min:3',
            'direccion'=>'required|min:3'
        ]);
      $todo=new Biblioteca();
         $todo->nombre=$request->nombre;
         $todo->direccion=$request->direccion;
        
         $json_a_enviar=json_encode($todo);

       Http::withBody($json_a_enviar, 'application/json')->withOptions(['verify' => false,])
            ->post('https://localhost:44318/api/Biblioteca');

         return redirect()->route('biblioteca')-> with('success','Biblioteca creada');
      }



     public function actualizar(Request $request)
     {
        
      $request->validate([
        'Nombre' => 'required|min:3',
        'Direccion'=>'required|min:3'
    ]);
  $todo=new Biblioteca();
     $todo->idBiblioteca=$request->idBiblioteca;
     $todo->Nombre=$request->Nombre;
     $todo->Direccion=$request->Direccion;
     
     $json_a_enviar=json_encode($todo);

   Http::withBody($json_a_enviar, 'application/json')->withOptions(['verify' => false,])
        ->put('https://localhost:44318/api/Biblioteca');

     return redirect()->route('biblioteca')-> with('success','Biblioteca editada');
  
     }


}
