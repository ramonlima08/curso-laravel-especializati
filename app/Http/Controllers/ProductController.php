<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;

    public function __construct(Request $request){
        //dd($request);
        $this->request = $request;
        //APCLICA MIDDLEWARE EM TODA A CLASSE
        //$this->middleware('auth');
        //APCLICA MIDDLEWARE NOS MÉTODOS INFORMADOS
        //$this->middleware('auth')->only(['create','store']);
        //APCLICA MIDDLEWARE EM TODA A CLASSE, COM EXCESSÃO DOS MÉTODOS INFORMADOS
        //$this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teste = 123;
        $var = "Variavel definida no controle";
        $str = "String com HTML implicita no conteúdo <strong>Conteudo</strong> ";
        return view('teste',compact('teste','var','str'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "Store";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Show {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "Form Edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "Update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "Destroy";
    }
}
