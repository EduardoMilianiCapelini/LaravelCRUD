<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicoRequest;
use App\Models\ModelMedico;
use App\User;

class MedicoController extends Controller
{
    private $objUser;
    private $objMedico;
    public $is_dev = true;

    public function __construct(){
        $this->objUser=new User();
        $this->objMedico=new ModelMedico();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('index');
        //dd($this->objUser->find(2)->relMedicos);
        //$medico=$this->objMedico->all()->sortBy('id');
        $medico=$this->objMedico->paginate(10);
        return view('index',compact('medico'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=$this->objUser->all();
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicoRequest $request)
    {
        $cad=$this->objMedico->create([
            'name'=>$request->name,
            'activities'=>$request->activities,
            'price'=>$request->price,
            'id_user'=>$request->id_user
        ]);
        if ($cad){
            return redirect('dr');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medico=$this->objMedico->find($id);
        return view('show', compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medico=$this->objMedico->find($id);
        $users=$this->objUser->all();
        return view('create', compact('medico','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicoRequest $request, $id)
    {
        $this->objMedico->where(['id'=>$id])->update([
            'name'=>$request->name,
            'activities'=>$request->activities,
            'price'=>$request->price,
            'id_user'=>$request->id_user
        ]);
        return redirect('dr');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objMedico->destroy($id);
        return($del)?"sim":"nao"; //se del é true,return sim, senão return não
        
    }

}
