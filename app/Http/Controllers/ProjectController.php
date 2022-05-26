<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Events\ProjectSaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProjectRequest;

//use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    public function __construct()
    {
        //invocar desde acá del constructor al middleware, 
        //tiene mas flexibilidad q desde las rutas web.php o api.php
        //$this->middleware('auth')->only('create', 'edit', 'store', 'update', 'destroy');
        $this->middleware('auth')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        //$portfolio = DB::table('projects')->get();
        $projects = Project::latest('updated_at');

        return view('projects.index', [PortolioController::Class, 'index'],[
                'projects' => Project::with('category')->latest('updated_at')->paginate()
            ]); 
    }

    /**
     * Create a new resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create',[
            'project'=> new Project,
            'categories' => Category::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProjectRequest $request)
    {
        //Usando metodo get del objeto $request
        //si pasara Request $request al metodo store()
        //return $request()->get('title');
        
        //Usando funcion estatica request() de la clase use Illuminate\Http\Request;
        //return request(['title', 'description']);

        /* USando modelo Project y metodo estático CREATE del model
        *   
        * Para este caso, donde se especifican los campos
        * es importante, dentro del modelo PROJECT, usar las
        * propiedades FILLABLE or GUARDED
        Project::create([
                'title' => request('title'),
                'url' => request('url'),
                'description' => request('description')
        ]);
        */

        /*
        * Tambien se puede pasar a guardar TODOS
        * los campos que se reciben desde el request
        * pero es algo peligroso, ya que editanto el HTML
        * desde el navagador, se pueden agregar propiedades
        * no esperadas
        *
        * Project::create( request()->all() );
        */

        /*Opción mas optima, y validada para cada campo
        * 
        * Segun el curso, capitulo 29 "Que son y como utilizar Form Request"
        * es mejor encapsular en una clase de tipo REQUEST (make:request)
        * y adeministrar desde allí autorizacion y reglas.
        * Entonces, se evista desde acá usar el metodo estatico validate()
        * 
        * $fields = request()->validate([
        *        'title' => 'required',
        *        'url' => 'required',
        *        'description' => 'required',
        *]);
        * Project::create($fields);
        */
        
        //return $request->all();

        
        /*
        * Se crea una nueva instanacia del model Project, para que de esa forma
        * se guarda el request y la imagen en el objeto local, y finalmente se 
        * se realiza un save(), haciendo de esa forma una sola conexion a la base.
        * si trabajara con el static Project::create, y luego agregara la imagen,
        * serían dos conexiones a la base para un mismo proceso.
        */
        $project = new Project( $request->validated() ); //Project::create( $request->validated() );
        
        $project->image = $request->file('image')->store('images','public');

        $project->save();

        ProjectSaved::dispatch($project); //Evento para optimizar la imagen

        /*
        * Hacer el return de la vista, es igual al metodo index del controlador.
        * Si pusiera la vista, es duplicar el codigo de @index
        *
        return view('projects.index', [PortolioController::Class, 'index'],[
            'projects' => Project::latest('updated_at')->paginate()
        ]);
        */
        
        /*
        * Aca redirecciono al metodo @index del controlador y no duplico codigo.
        * Adicionalmente, es mas declarativo y utilizo la ruta ya creada
        */
        return redirect()
            ->route('projects.index')
            ->with('status','El proyecto fué creado con éxito');        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project
        ]);
        
    }

    public function edit(Project $project)
    {
        
        
        return view('projects.edit', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, SaveProjectRequest $request)
    {
        /*$project->update([
            'title' => request('title'),
            'url' => request('url'),
            'description' => request('description'),
        ]);*/

     
        if ( $request->hasFile('image'))
        {
            Storage::disk('public')->delete($project->image);
            
            $project->fill( $request->validated() );
        
            $project->image = $request->file('image')->store('images','public');
    
            $project->save();

            ProjectSaved::dispatch($project); //Evento para optimizar la imagen
                
        } else {
            $project->update( array_filter( $request->validated() ) );
        }

        return redirect()
            ->route('projects.show', $project)
            ->with('status','El proyecto fué actualizado con éxito');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Storage::disk('public')->delete($project->image);
        $project->delete();
                
        return redirect()->route('projects.index')->with('status','El proyecto fué eliminado con éxito');
    }

}
