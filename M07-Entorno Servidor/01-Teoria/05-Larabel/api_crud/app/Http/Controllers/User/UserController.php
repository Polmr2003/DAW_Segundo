<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // recojemos los datos de la consulta
        $data = json_decode($request->getContent());

        // miramos si el usuario existe i lo recojemos en la variable user
        $user = User::where('email', $data->email)->first(); // first para recojer la primera coincidencia

        // si existe el usuario
        if ($user) {
            // miramos si su contraseña coincide
            // si esta cifrada tendremos que utilizar Hash::check para hacer eso
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

    public function registro(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Crear y guardar el nuevo usuario
        $usuario = new User();
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = Hash::make($$request->input('password'));
        $usuario->roles = 'user';

        // guardamos el usuario en la base de datos
        $usuario->save();

        if ($usuario) {
            // Si no esta vacio la variable comments
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con los comentarios i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $usuario,
                'message' => "Datos recojidos exitosamente"
            ], 200);
        } else {
            // Si esta vacio la variable comments
            // Enviamos una respuesta con un código de estado 400 y un objeto JSON con:
            // un booleno de error a false, un array de data a null i enviamos un mensage de error
            return response()->json([
                'error' => true,
                'data' => null,
                'message' => "Error al obtener los datos"
            ], 400);
        }
    }
}
