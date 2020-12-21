<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Requests\StoreUpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        /*$teste = 123;
        $var = "Variavel definida no controle";
        $str = "String com HTML implicita no conteúdo <strong>Conteudo</strong> ";*/
        $teste = 1234;
        $teste2 = 321;
        //$products = ['TV',"PV","Monitor","Mouse","Teclado","ABNT2"];
        //$products = Product::all();
        $products = Product::paginate();
        return view('admin.pages.products.index',compact('teste','teste2','products'));
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
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $data = $request->only('name','description','price');
        
        if($request->hasFile('image') && $request->image->isValid()){
            $imgPath = $request->image->store('products');
            //dd($imgPath);
            /*$nameFile = $request->name.'.'.$request->image->extension();
            dd($request->file('image')->storeAs('products',$nameFile));*/
            $data['image'] = $imgPath;
        }

        $product = Product::create($data);

        return redirect()->route('products.index');
    }

    public function storeOld(StoreUpdateProductRequest $request)
    {
        //VALIDAÇÃO DE FORMULÁRIO FORMA FEIA
        /*$request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|min:3|max:10000',
            'photo' => 'required|image'
        ]);*/

        //dd('ok');
        
        //dd($request->all());
        //dd($request->only(['name','description']));
        //dd($request->name);
        //dd($request->has('name'));
        //dd($request->input('name','Nome não informado'));
        if($request->file('photo')->isValid()){
            //dd($request->photo->extension());
            //UPLOAD FACIL, SÓ APONTAR A PASTA E O NOME DO ARQUIVO
            //NA VERDADE, NEM O NOME DO ARQUIVO É NCESCESSÁRIO
            
            //dd($request->file('photo')->store('products'));
            $nameFile = $request->name.'.'.$request->photo->extension();
            dd($request->file('photo')->storeAs('products',$nameFile));
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
        //$product = Product::where('id', $id)->first();
        $product = Product::find($id);
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$product){
            return redirect()->back();
        }

        //dd($product);

        return view('admin.pages.products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$product){
            return redirect()->back();
        }

        return view('admin.pages.products.edit',[
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$product){
            return redirect()->back();
        }

        $data = $request->all();

        if($request->hasFile('image') && $request->image->isValid()){

            if($product->image && Storage::exists($product->image)){
                Storage::delete($product->image);
            }

            $imgPath = $request->image->store('products');
            $data['image'] = $imgPath;
        }

        $product->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$product){
            return redirect()->back();
        }

        if($product->image && Storage::exists($product->image)){
            Storage::delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index');
    }

    public function search(Request $request){
        $filters = $request->except('_token');
        $pro = new Product();
        //dd($request->all());
        $products = $pro->search($request->filter);
        return view('admin.pages.products.index',[
            'products' => $products,
            'filters' => $filters
            ]);

    }
}
