<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $posts = Post::create($request->all());

        return new PostResource($posts);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // return response()->json([
        //     'message' => "Successfully deleted",
        //     'success' => true
        // ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response(null, 204);
    }

    public function login(Request $request)
    {
        // recojemos los datos de la consulta
        $data = json_decode($request->getContent());
        // $data = json_decode($request->getContent());

        // miramos si el usuario existe i lo recojemos en la variable user
        $user = User::where('email', $data->email)->first(); // first para recojer la primera coincidencia

        // si existe el usuario
        if ($user) {

            // miramos si su contraseña coincide, como esta cifrada tendremos que utilizar Hash::check para hacer eso
            // Hash::check($user->password, $request->password)
            if ($user->password == $request->password) {

                // creamos el token (para esto hay que poner "use HasApiTokens" en el modelo) , que tendra de nombre el nombre de usuario
                $token = $user->createToKen($user->email);

                // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
                // un booleno de error a false, un array de token con el token i enviamos un mensage de error
                return response()->json([
                    'error' => false,
                    'user' => $user,
                    'token' => $token,
                    'message' => "Autenticación exitosa"
                ], 200);
            } else {
                // si esta mal la contraseña
                // Enviamos una respuesta con un código de estado 401 y un objeto JSON con:
                // un booleno de error a true, un array de token a null i enviamos un mensage de error
                return response()->json([
                    'error' => true,
                    'message' => "Credenciales incorrectas"
                ], 401);
            }
        } else {
            // si no a encontrado el usuario
            // Enviamos una respuesta con un código de estado 401 y un objeto JSON con:
            // un booleno de error a true, un array de token a null i enviamos un mensage de error
            return response()->json([
                'error' => true,
                'message' => "No existe el usuario"
            ], 401);
        }
    }
}
