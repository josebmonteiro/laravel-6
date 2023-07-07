<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $request;

    public function __construct(Request $request){
        $this->$request = $request;

        // Posso aplicar o middleware no contrutor para todo o controller, exceto para um metodo específico
        /*$this->middleware('auth')->except([
            'index', 'show'
        ]); */
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ['Product 01', 'Product 02', 'Product 03'];
        
        $teste = 123;
        $teste2 = 456;
        $teste3 = '1,2,3,4,5';
        $products = ['Tv','Geladeira','Forno','Sofá'];
        
        return view('admin.pages.products.index', compact('teste', 'teste2', 'teste3', 'products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Exibindo o produto de id: {$id}";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.products.edit', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        dd('ok');
        /* Validando os dados */
        /*$request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|min:3|max:10000',
            'photo' => 'required|image',
        ]);
        dd('Ok');*/
        /* Pegando os dados */
        //dd($request->except('_token'));
        //dd($request->input('name', 'Default se o campo não existir'));
        //dd($request->has('name'));
        //dd($request->name);
        //dd($request->only(['name', 'description']));
        //dd($request->all());

        /* Pegando o upload */
        //dd($request->file('photo')->isValid());
        if ($request->file('photo')->isValid()){
            //dd($request->photo->extension());
            //dd($request->photo->getClientOriginalName());
            //dd($request->file('photo')->store('products'));
            $nameFile = $request->name . '.' . $request->photo->extension();
            dd($request->file('photo')->storeAs('products', $nameFile));
        }

        return "Cadastrando um novo produto";
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
        dd("Editando o produto: {$id}");
        return "Editando o produto: {$id}";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "Deletando o produto: {$id}";
    }
}
