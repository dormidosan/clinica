<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
#use Redirect;
use Illuminate\Support\Facades\Redirect;
use finfo;
//use File;

use Illuminate\Support\Facades\DB;
//use Storage;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;



use App\Paciente;
use App\TipoSanguineo;
use App\Alergia;
use App\Sexo;
use App\Persona;
use App\Expediente;
use App\Observacion;
use App\Telefono;
use App\TipoFoto;
use App\Foto;



class PacienteController extends Controller
{
    //
    public function index()
    {
        //$pacientes = Paciente::where('id','!=',0)->paginate(5); 
        $pacientes = Paciente::all();
        #return view('pacientes.listado')->with('pacientes', $pacientes);
        return view('pacientes.busqueda')->with('pacientes', $pacientes);
    }

    public function creacion()
    {   
        $tipo_sanguineos = TipoSanguineo::where('id','!=',0)->pluck('tipo_nombre','id'); 
        $alergias = Alergia::where('id','!=',0)->pluck('tipo_nombre','id');
        $sexos = Sexo::where('id','!=',0)->get(); 
        return view('pacientes.creacion')
        ->with('alergias', $alergias)
        ->with('sexos', $sexos)
        ->with('tipo_sanguineos', $tipo_sanguineos);
    }

    public function creacion_expediente(Request $request, Redirector $redirect)
    {

        $persona = new Persona($request->all());
        $persona->save();

        $paciente = new Paciente($request->all());
        $paciente->persona_id = $persona->id;
        $paciente->save();

        if ($request->telefono) {
            $telefono = new Telefono();
            $telefono->paciente_id = $paciente->id;
            $telefono->numero = $request->telefono;
            $telefono->save();
        }
        


        

        $expediente = new Expediente();
        $expediente->paciente_id = $paciente->id;
        $expediente->tipo_sanguineo_id = $request->tipo_sanguineo_id;
        $expediente->save();

        if ($request->l_alergias) {
            $expediente->alergias()->attach($request->l_alergias);
        }
        

        if ($request->observacion) {
            $observacion = new Observacion();
            $observacion->observacion = $request->observacion;
            $observacion->save();
            $expediente->observaciones()->attach($observacion->id);
        }


        //return $this->index();

        #echo url("/busqueda");
        return Redirect::route('busqueda.get');
        //dd($paciente); 

    }


    public function busqueda()
    {   
        #cambiar a ajax
        #$pacientes = Paciente::where('id','=','0')->get();
        $pacientes = Paciente::all();
        //return view('pacientes.busqueda');
        return view('pacientes.busqueda')->with('pacientes', $pacientes);
    }

    public function buscar_expedientes(Request $request, Redirector $redirect)
    {   
        //$pacientes = Paciente::where('id','=','0')->get();


        if (($request->codigo or $request->nombre) == NULL) {
            $pacientes = Paciente::all();
            return view('pacientes.busqueda')->with('pacientes', $pacientes);
        }else{
            if ($request->codigo != NULL) {
                $pacientes = Paciente::where('id','=',$request->codigo)->get();
                return view('pacientes.busqueda.tabla')->with('pacientes', $pacientes); 

            } elseif($request->nombre != NULL) {

            // separar nombres en un array
                $nombres = explode(" ", $request->nombre);

            // buscar id de la vista, usando los nombres completos 
                $id_personas = DB::table('nombres_completos')
                //->select('id')
                ->where(function ($query) use ($nombres) {
                    foreach($nombres as $nombre) {
                      $query->orWhere('completo', 'like', '%' . $nombre . '%');
                  }
                          //})->get();
              })->pluck('id')->toArray();
            //dd($id_personas); 

            //$ids = array_column($sqlnombres, 'id');
            //dd($ids); 
            //$users = DB::table('users')
                    //->whereIn('id', [1, 2, 3])->get();
                $pacientes = Paciente::whereIn('persona_id',$id_personas)->get();

            //dd($pacientes); 

                return view('pacientes.busqueda.tabla')->with('pacientes', $pacientes); 
            }
            else {
                return view('pacientes.busqueda.tabla')->with('pacientes', $pacientes);
            }

        }

        
        

        //return view('pacientes.busqueda');
    }

    public function expediente(Request $request, Redirector $redirect)
    {   
        $expediente = Expediente::where('paciente_id','=',$request->paciente_id)->first();
        return view('pacientes.expediente')->with('expediente', $expediente);
    }
    

    public function fotos(Request $request, Redirector $redirect)
    {  
        return $this->listadoFotos($request->expediente_id);
    }




    public function upload(Request $request, Redirector $redirect)
    {   
        $expediente = Expediente::where('id','=',$request->expediente_id)->first();
        $tipo_fotos = TipoFoto::all()->pluck('tipo_nombre','id'); 

        return view('pacientes.fotos.upload')
        ->with('expediente', $expediente)
        ->with('tipo_fotos', $tipo_fotos);
    }

    public function save(Request $request, Redirector $redirect)
    {   
        //dd($request->all());
        $expediente_id  = $request->expediente_id;
        $tipo_foto_id = $request->tipo_foto_id;
        $expediente = Expediente::where('id','=',$expediente_id)->first();
        
        
        $this->fotoGuardar($request->objeto_imagen,$tipo_foto_id,$expediente_id,'fotos');
        
        //$fotos = "../storage/fotos/";
        //dd($expediente); 
        //return view('pacientes.fotos')->with('expediente', $expediente)->with('fotos', $fotos);
        #return $this->retornarFotos($expediente);
        return $this->listadoFotos($expediente_id);
    }

    public function pruebas()
    {
        //14082e02fb5c8db474d20ab11c00a36d.jpg
        $file = Storage::disk('fotos')->get('14082e02fb5c8db474d20ab11c00a36d.jpg');

        return view('pruebas', ['myFile' => $file]);
    }

    public function extraer(Request $request, Redirector $redirect)
    {
        //14082e02fb5c8db474d20ab11c00a36d.jpg
        $file = Storage::disk('fotos')->get('14082e02fb5c8db474d20ab11c00a36d.jpg');
        //200 es el server status
        return response()->make($file, 200, array(
            'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($file)
        ));
        //$file = File::get($path);
        //$type = File::mimeType($file);


        //$response = \Response::make($file, 200);
        //$response->header("Content-Type", $file->mime());

        //return $response;

    }
    

    

    public function fotoGuardar($objeto_imagen, $tipo_foto_id,$expediente_id, $destino)
    {
        //try{
        //$this->guardar_bitacora(Route::getCurrentRoute()->getPath(),"ingreso");
        $imagen = $objeto_imagen;

        if ($this->fotoExiste($tipo_foto_id,$expediente_id) == 1) {
            $foto = Foto::where('expediente_id','=',$expediente_id)->where('tipo_foto_id','=',$tipo_foto_id)->first();
        } else {
            $foto = new Foto();
            $foto->expediente_id = $expediente_id;//$archivo->getClientOriginalName();
            $foto->tipo_foto_id = $tipo_foto_id; // PETICION = 1
        }

        
        
        $ruta = MD5(microtime()) . "." . $imagen->getClientOriginalExtension();
        while (Foto::where('url', '=', $ruta)->first()) {
            $ruta = MD5(microtime()) . "." . $imagen->getClientOriginalExtension();
        }

        $r1 = Storage::disk($destino)->put($ruta, \File::get($imagen));
        //dd($r1); 
        $foto->url = $ruta;
        $foto->fecha_subida = Carbon::now();
        $foto->save();
        return $foto;
        //} 
        /*catch(\Exception $e){
            $this->guardar_bitacora(Route::getCurrentRoute()->getPath(),$e->getMessage());
            return view('errors.catch');
        }*/


    }

    public function fotoExiste($tipo_foto_id,$expediente_id)
    {   
        if (Foto::where('expediente_id','=',$expediente_id)->where('tipo_foto_id','=',$tipo_foto_id)->first()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function retornarFotos($expediente)
    {   
        //$fotos = "../storage/fotos/";

        $foto1 = Foto::where('expediente_id','=',$expediente->id)->where('tipo_foto_id','=','1')->first();
        $foto2 = Foto::where('expediente_id','=',$expediente->id)->where('tipo_foto_id','=','2')->first();
        $foto3 = Foto::where('expediente_id','=',$expediente->id)->where('tipo_foto_id','=','3')->first();
        $foto4 = Foto::where('expediente_id','=',$expediente->id)->where('tipo_foto_id','=','4')->first();
        //dd($expediente); 
        //$url1 = 'cant.png';
        //$url2 = base64_encode(Storage::url($url1));
        //$url = 'data: image/png'.';base64,'.$url2;
        //return "<img src='".$url."'/>";
        //dd("variabl2e"); 
        return view('pacientes.fotos')->with('expediente', $expediente)
        ->with('foto1', $foto1)
        ->with('foto2', $foto2)
        ->with('foto3', $foto3)
        ->with('foto4', $foto4);
    }

    public function listadoFotos($expediente_id)
    {   
        $expediente = Expediente::where('id','=',$expediente_id)->first();
        $fotos = Foto::where('expediente_id','=',$expediente->id)->get();
        $tipo_fotos = TipoFoto::all()->pluck('tipo_nombre','id'); 
        #return $this->retornarFotos($expediente);
        return view('pacientes.fotos')
        ->with('fotos', $fotos)
        ->with('tipo_fotos', $tipo_fotos)
        ->with('expediente', $expediente);
    }

    



    
}
