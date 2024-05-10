<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios\Negocios;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Seguridad\User;
use App\Models\Servicios\Sportodos\SpUsuario;
use Mockery\Exception;
use \Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Firebase\Auth\Token\Exception\InvalidToken;
use App\Models\Servicios\Togroow\Amigos;
use App\Models\Servicios\Togroow\Usuarios;
use App\Models\Servicios\Togroow\Notificaciones;
use App\Traits\UploadTrait;
use App\Models\Servicios\Togroow\Useraddress;
use Illuminate\Support\Facades\Mail;
use App\Mail\Restorepassword;
use League\Csv\Reader;
/**
 * @group Gestion de Usuarios
 * clase que permite gestionar los diferentes usuarios que tiene acceso al sistema
 */
class UserController extends Controller
{

    /**
     * retorna el campo con el cual se hace la autenticacion
     */
    public function username()
    {
        return 'user_email';
    }

    /**
     * retorna las credenciales de autenticacion del sistema
     *
     * @param Request $request
     * @return void
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'user_password');
    }
    /**
     * retorna las credenciales de autenticacion del usuario logueado
     * @return void
     */
    public function me()
    {
        $user  = auth()->user();
        $usuario = [];
        $usuario["user_id"] = $user->user_id;
        $usuario["user_names"] = $user->user_names;
        $usuario["user_lastnames"] = $user->user_lastnames;
        $usuario["user_email"] = $user->user_email;
        $usuario["user_typepople"] = $user->user_typepople;
        $usuario["user_typeid"] = $user->user_typeid;
        $usuario["user_idnumber"] = $user->user_idnumber;
        $usuario["user_city"] = $user->user_city;
        $usuario["user_country"] = $user->user_country;
        $usuario["user_phone"] = $user->user_phone;
        $usuario["user_address"] = $user->user_address;
        if($user->user_foto != ''){
            $usuario["user_foto"] = "https://togroow.com/images/".$user->user_foto;
        }
        $usuario["address"] = Useraddress::where("user_id",$user->user_id)->orderBy("id","DESC")->get();
        return response()->json($usuario);
    }

    /**
     * Funcion que  desloguea al usuario dentro del sistema
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Salida exitosa']);
    }

    /**
     * Funcion para refrescar el toquen de login
     *
     * @return void
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

    /**
     * Funcion para actualizar la imagen de portada del usuario
     *
     * @param Request $request
     * @param [type] $user_id id del usuario a modificar
     * @urlParam  user_id  id del usuario a modificar
     * @return void
     */
    public function updateUserBackImage(Request $request, $user_id)
    {
        try {
            if (!isset($user_id)) {
                throw new Exception('Id de usuario es obligatorio');
            } else {
                $user = User::find($user_id);
                if(isset($user)){
                    if ($request->hasFile('background')) {
                        $image = $request->file('background');
                        $imagenew = UploadTrait::uploadImageOne($image);
                        $user->update(['user_fondo' => $imagenew]);
                        $usuario = $user;
                        if($user->user_foto != ''){
                            $usuario['user_foto'] = $this->rutarecursos."/images/".$user->user_foto;
                        } else {
                            $usuario['user_foto'] = $this->rutarecursos."/skins/sistem/images/perfil.jpg";
                        }
                        if($user->user_fondo != ''){
                            $usuario['user_fondo'] = $this->rutarecursos."/images/".$user->user_fondo;
                        }  else {
                            $usuario['user_fondo'] = null;
                        }
                        return response()->json($usuario, 200);
                    } else {
                        return response()->json(['message' => 'no envio ningun archivo de imagen'], 422);   
                    }
                } else {       
                    return response()->json(['error' => 'usuario no encontrado'], 500);
                }
            }
        } catch (ModelNotFoundException $ex) { // User not found
            abort(422, 'Id de usuario no encontrado ó inválido');
        } catch (Exception $ex) { // Anything that went wrong
            abort(500, 'Error en la petición');
        }
    }
    /**
     * Funcion para actualizar la imagen de perfil del usuario
     *
     * @param Request $request
     * @param [type] $user_id id del usuario a modificar
     * @urlParam  user_id  id del usuario a modificar
     * @return void
     */
    public function updateUserAvatarImage(Request $request, $user_id)
    {
        try {
            if (!isset($user_id)) {
                throw new Exception('Id de usuario es obligatorio');
            } else {
                $user = User::find($user_id);
                if(isset($user)){
                    if ($request->hasFile('avatar')) {
                        $image = $request->file('avatar');
                        $imagenew = UploadTrait::uploadImageOne($image);
                        $user->update(['user_foto' => $imagenew]);
                        $usuario = $user;
                        if($user->user_foto != ''){
                            $usuario['user_foto'] = $this->rutarecursos."/images/".$user->user_foto;
                        } else {
                            $usuario['user_foto'] = $this->rutarecursos."/skins/sistem/images/perfil.jpg";
                        }
                        if($user->user_fondo != ''){
                            $usuario['user_fondo'] = $this->rutarecursos."/images/".$user->user_fondo;
                        }  else {
                            $usuario['user_fondo'] = null;
                        }
                        return response()->json($usuario, 200);
                    } else {
                        return response()->json(['message' => 'no envio ningun archivo de imagen'], 422);   
                    }
                } else {       
                    return response()->json(['error' => 'usuario no encontrado'], 500);
                }
            }
        } catch (ModelNotFoundException $ex) { // User not found
            abort(422, 'Id de usuario no encontrado ó inváido');
        } catch (Exception $ex) { // Anything that went wrong
            abort(500, 'Error en la petición');
        }
    }
    /**
     * Inicio de sesión multifuncional. Primero verificamos si esta solicitud de inicio de sesión proviene de Firebase, si es así, validamos el token y
     * comprobar si el usuario ya existe en db. Si no se encuentra el token, intentamos continuar con el flujo de inicio de sesión normal.
     */
    public function login(Request $request)
    {
        try {
            $idTokenString = $request->input('Firebasetoken');
            if ($idTokenString) {
                $json = $this->loginFirebase($idTokenString, $request);
                if (isset($json['error_code'])) {
                    return response()->json($json, $json['error_code']);
                }
                return response()->json($json, 201);
            }
            $data = $request->only('email', 'password','user');
            //print_r($data);
            $credentials = [];
            $user_isset = 0;
            $pass_isset = 0;
            if(isset($data['email'])){
                if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                    $credentials['user_email'] = $data['email'];
                    $user_isset = 1;
                } else{
                    $credentials['user_user'] = $data['email'];
                    $user_isset = 1;
                } 
            } else if(isset($data['user'])){
                if(filter_var($data['user'], FILTER_VALIDATE_EMAIL)){
                    $credentials['user_email'] = $data['user'];
                    $user_isset = 1;
                } else{
                    $credentials['user_user'] = $data['user'];
                    $user_isset = 1;
                } 
            } 
            if(isset($data['password'])){
                $credentials['password'] = $data['password'];
                $pass_isset = 1;
            }
            if($pass_isset == 1 &&  $user_isset ==1){
                if (Auth::guard('web')->attempt($credentials, true)) {
                    $user = Auth::guard('web')->user();
                    //print_r($user);
                    $token =  $user->createToken('Personal Access Token')->accessToken;
                    $json = $this->respondWithToken($token);

                    if($user->user_foto != ''){
                        $json['usuario']['user_foto'] = $this->rutarecursos."/images/".$user->user_foto;
                    } else {
                        $json['usuario']['user_foto'] = $this->rutarecursos."/skins/sistem/images/perfil.jpg";
                    }
                    if($user->user_fondo != ''){
                        $json['usuario']['user_fondo'] = $this->rutarecursos."/images/".$user->user_fondo;
                    }  else {
                        $json['usuario']['user_fondo'] = null;
                    }
                    return response()->json($json, 201);
                }
                return response()->json(['error' => 'Usuario o Password inválidos!'], 401);
            } else {
                return response()->json(['message' => 'Todos los datos son requeridos'], 422);
            } 
        } catch (ModelNotFoundException $ex) { // User not found
            return response()->json(['message' => 'Usuario o Password inválidos!'], 422);
        } catch (Exception $ex) { // Anything that went wrong
            return response()->json(['message' => 'Error procesando credenciales'], 500);
        }
    }

    /**
     * funcion para hacer registro y autenticacion de un usuario de forma externa con firebase
     *
     * @param Request $request
     * @return void
     */
    public function signup(Request $request)
    {
        // First we check if the user is coming from an external authentication provider...specifically Firebase
        try {
            $idTokenString = $request->input('Firebasetoken');
            if ($idTokenString) {
                $json = $this->loginFirebase($idTokenString, $request, true);
                if (isset($json['error_code'])) {
                    abort($json['error_code'], $json['message']);
                }
                return response()->json($json, 201);
            }
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $user = User::where('user_email', $data['email'])->first();
            if (!$user) {
                $user = new User();
                $user->user_email =  $data['email'];
                $user->user_password =  $data['password'];
                $user->save();
                $token =  $user->createToken('Personal Access Token')->accessToken;
                $json = $this->respondWithToken($token, $user);
                return response()->json($json, 201);
            } else {
                return response()->json(['message' => 'El usuario ya se encuentra registrado'], 409);
            }
        } catch (ModelNotFoundException $ex) { // User not found
            return response()->json(['message' => 'Usuario o Password inválidos'], 403);
        } catch (Exception $ex) { // Anything that went wrong
            return response()->json(['message' => 'Red social no encontrada'], 422);
        }
    }

    /**
     * Funcion para hacer registro con firebase
     *
     * @param [type] $idTokenString
     * @param Request $request
     * @param boolean $isSignup
     * @return void
     */
    public function loginFirebase($idTokenString, Request $request, $isSignup = false)
    {
        // Launch Firebase Auth
        $authFireBase = app('firebase.auth');
        try { // Try to verify the Firebase credential token with Google
            $verifiedIdToken = $authFireBase->verifyIdToken($idTokenString);
        } catch (\InvalidArgumentException $e) { // If the token has the wrong format
            return [
                'message' => 'Origen autenticación Autorizado - Token imposible de leer: ' . $e->getMessage(), 'error_code' =>  401
            ];
        } catch (InvalidToken $e) { // If the token is invalid (expired ...)
            return [
                'message' => 'No Autorizado - Token inválido: ' . $e->getMessage(), 'error_code' =>  401
            ];
        }
        // Retrieve the UID (User ID) from the verified Firebase credential's token
        $uid = $verifiedIdToken->getClaim('sub');
        $fireBaseUser = $authFireBase->getUser($uid);
        $userEmail = $fireBaseUser->email;
        // Retrieve the user model linked in our app with the given email
        $user = User::where('user_email', $userEmail)->first();
        if ((!$isSignup) || isset($user) ) { // The user could be found, so lets check if the user is registered as Firebase user. If not, let's update the user
            if (!$user->user_firebase_uid) {
                $user->user_firebase_uid = $uid; //
                $user->save();
            }
        } else {  // USer not found so let's check if this is a signup request
            if ($isSignup) { // it's a sign up coming from Firebase so we get the user's data from firebase and store it on our db
                $data = $request->all();
                $name = $data['name'];
                $lastname = $data['lastname'];
                $signupChannel = $data['provider'];
                $userSp = SpUsuario::where('user_id',$user->user_id)->get();
                if ($userSp) {
                    return ['message' => 'El usuario ya se encuentra registrado + firebase', 'error_code' => 409];
                }
                $user = new User();
                $user->user_email = $userEmail;
                $user->user_names = $name;
                $user->user_lastnames = $lastname;
                $user->user_redprincipal = $data['network'];
                $urlPhoto = $data['photo'];
                $urlFileName = Carbon::now()->timestamp;
                $user->user_foto = $data['photo'];
                if (copy($urlPhoto, '/images/' . $urlFileName)) {
                    $user->user_foto = $urlFileName;
                }
                $user->user_signup_channel = $signupChannel;
                $user->save();
            } else {
                // The user is not registered so we need to explictly signup this user with the given information. As seen the user has not provided yet
                // any password so the client application should know how to deal with it.
                return [
                    'message' => 'Usuario no registrado: ', 'error_code' => 422
                ];
            }
        }
        $token = $user->createToken('Personal Access Token')->accessToken;
        $json = $this->respondWithToken($token, $user);
        return $json;
    }

    /**
     * funcion para retornar el token de autenticacion al hacer el login
     *
     * @param [type] $token
     * @param [type] $user
     * @return void
     */
    public function respondWithToken($token, $user = null)
    {
        $json['access_token'] = $token;
        $json['token_type'] = 'Bearer';
        $json['expires_in'] = 24 * 60 * 60;
        $user_id =  ($user != null) ? $user->user_id : Auth::guard('web')->user()->user_id;
        $json['usuario'] = $this->getUserDetails($user_id);
        return $json;
    }

    /**
     * Funcion para retornar la informacion de un usuario en especifico
     *
     * @param [type] $user_id identificador del usuario a retornar
     * @urlParam  user_id identificador del usuario a retornar
     * @return void
     */
    private function getUserDetails($user_id)
    {
        $json = User::find($user_id);
        return $json;
    }

    /**
     * funcion prar retornar el detalle de un usuario en especifico
     *
     * @param [type] $id identificador del usuario a retornar
     * @urlParam  id identificador del usuario a retornar
     * @return void
     */
    public function detalle($id)
    {
        try {
            $json = $this->getUserDetails($id);
            return response()->json($json);
        } catch (ModelNotFoundException $ex) { // User not found
            abort(422, 'Usuario no encontrado');
        } catch (Exception $ex) { // Anything that went wrong
            abort(500, 'Error en parámetros');
        }
    }

    /**
     * Funcion que trae el listado de usarios cargados en el sistema con unos filtros en especifico
     *
     * @param Request $request
     * @return void
     */
    public function listado(Request $request)
    {
        try {
            $data = $request->all();
            $redsocial = $data['redsocial'];
            $usuarios = Negocios::select('user.user_id', 'user.user_names', 'user.user_lastnames', 'user.user_email', 'registro.registro_nombre', 'registro.registro_id')->join('user', 'registro.registro_usuario', '=', 'user.user_id')->where("registro.registro_sitio", $redsocial);
            if (isset($data['level'])) {
                $usuarios->where("user_level", $data['level']);
            }
            if (isset($data['negocio'])) {
                $usuarios->where("registro.registro_id", $data['negocio']);
            }
            $usuarios = $usuarios->get();
            return response()->json($usuarios, 200);
        } catch (ModelNotFoundException $ex) { // User not found
            return response()->json(['message' => 'Usuario no encontrado'], 422);
        } catch (Exception $ex) { // Anything that went wrong
            return response()->json(['message' => 'Red social no encontrada'], 500);
        }
    }
    /**
     * Funcion que trae el listado de usarios cargados en el sistema con unos filtros en especifico
     *
     * @param Request $request
     * @return void
     */
    public function listado2(Request $request)
    {
        try {
            $data = $request->all();
            $redsocial = $data['redsocial'];
            $usuarios = Negocios::select('user.user_id', 'user.user_names', 'user.user_lastnames', 'user.user_email', 'registro.registro_nombre', 'registro.registro_id')->join('user', 'registro.registro_usuario', '=', 'user.user_id')->where("registro.registro_sitio", $redsocial);
            if (isset($data['level'])) {
                $usuarios->where("user_level", $data['level']);
            }
            $usuarios = $usuarios->get();
            return response()->json($usuarios);
        } catch (ModelNotFoundException $ex) { // User not found
            return response()->json(['message' => 'Usuario no encontrado'], 422);
        } catch (Exception $ex) { // Anything that went wrong
            return response()->json(['message' => 'Red social no encontrada'], 422);
        }
    }

    /**
     * Funcion para actualizar la contraseña de un usuario
     *
     * @param Request $request
     * @param [type] $user_id identificador del usuario a cambiar la contraseña
     * @urlParam  user_id identificador del usuario a cambiar la contraseña
     * @return void
     */
    public function updateUserPassword(Request $request, $user_id)
    {
        try {
            $data = $request->only('email', 'old_password', 'new_password');
            if (!$user_id) throw new Exception('Request Inválido!');
            if (!$data['old_password'] || !$data['new_password']) throw new Exception('Error de parámetros old y new');
            if (!$data['old_password'] === !$data['new_password']) throw new Exception('Nuevo password no puede ser el mismo');
            $credentials = [];
            $credentials['user_email'] = $data['email'];
            $credentials['password'] = $data['old_password'];
            if (!$token = Auth::attempt($credentials, true)) {
                return response()->json(['error' => 'Contraseña incorrecta'], 401);
            }
            $user = User::findOrFail($user_id);
            $user->user_password = Hash::make($data['new_password']);
            $user->save();
        } catch (ModelNotFoundException $ex) { // User not found
            return response()->json(['message' => 'Usuario no encontrado'], 422);
        } catch (Exception $ex) { // Anything that went wrong
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    /**
     * Funcion para editar la informacion de un usuario dentro del sistema
     *
     * @param Request $request
      * @param [type] $id identificador del usuario a editar
     * @urlParam  id identificador del usuario a editar
     * @return void
     */
    public function editar(Request $request, $id)
    {
        try {
            $data = $request->all();
            unset($data['user_fondo'],$data['user_foto']);
            $element = User::findOrFail($id);
            $element->update($data);
            
            $user = $element;
            $usuario = $user;
            if($user->user_foto != ''){
                $usuario['user_foto'] = $this->rutarecursos."/images/".$user->user_foto;
            } else {
                $usuario['user_foto'] = $this->rutarecursos."/skins/sistem/images/perfil.jpg";
            }
            if($user->user_fondo != ''){
                $usuario['user_fondo'] = $this->rutarecursos."/images/".$user->user_fondo;
            }  else {
                $usuario['user_fondo'] = null;
            }
            return response()->json($usuario);
        } catch (ModelNotFoundException $ex) { // User not found
            return response()->json(['message' => 'Usuario no encontrado'], 422);
        } catch (Exception $ex) { // Anything that went wrong
            return response()->json(['message' => 'Error actualizando usuario'], 500);
        }
    }

     /**
     * Funcion para editar la informacion de un usuario dentro del sistema
     *
     * @param Request $request
      * @param [type] $id identificador del usuario a editar
     * @urlParam  id identificador del usuario a editar
     * @return void
     */
    public function edit(Request $request)
    {
        $userau  = auth()->user();
        try {
            $data = $request->all();
            $element = User::findOrFail($userau->user_id);
            $update = [];
            $update['user_idnumber'] =  $data['document'];
            $update['user_names'] = $data['names'];
            $update['user_lastnames'] = $data['lastnames'];
            $update['user_city'] = $data['city'];
            $update['user_address'] = $data['address'];
            $update['user_phone'] = $data['phone'];
            $element->update($update);
            $user = User::findOrFail($userau->user_id);
            if($user->user_foto != ''){
                $user->user_foto = "https://togroow.com/images/".$user->user_foto;
            }
            $user->address = Useraddress::where("usuario",$user->user_id)->orderBy("principal","DESC")->get();
            return response()->json($user);
        } catch (ModelNotFoundException $ex) { // User not found
            return response()->json(['message' => 'Usuario no encontrado'], 422);
        } catch (Exception $ex) { // Anything that went wrong
            return response()->json(['message' => 'Error actualizando usuario'], 500);
        }
    }

    /**
     * Funcion para eliminar un usuario dentro del sistema
     *
     * @param [type] $id identificador del usuario a eliminar
     * @urlParam  id identificador del usuario a eliminar
     * @return void
     */
    public function eliminar($id)
    {
        try {
            User::destroy($id);
        } catch (ModelNotFoundException $ex) { // User not found
            return response()->json(['message' => 'Usuario no encontrado'], 422);
        } catch (Exception $ex) { // Anything that went wrong
            return response()->json(['message' => 'Error actualizando usuario'], 500);
        }
    }

    /**
     * Funcion para agregar otro usuario como amigo
     *
     * @param Request $request
     * @param [type] $id identificador del usuario que va a agregar un amigo
     * @urlParam  id identificador del usuario que va a agregar un amigo
     * @return void
     */
    public function addamigo(Request $request, $id){
        $data = $request->all();
        $amigo = $data['amigo'];
        $usuario = $data['usuario'];
        if($id == $usuario){
            $amigos = Amigos::where(function ($query) use ($usuario,$amigo) {
                    $query->where('amigo_usuario_1', '=', $usuario)
                      ->where('amigo_usuario_2', '=', $amigo);
                })->orWhere(function ($query) use ($usuario,$amigo) {
                    $query->where('amigo_usuario_2', '=', $usuario)
                    ->where('amigo_usuario_1', '=', $amigo);
                })->get();

            if(count($amigos) > 0){
                return response()->json(['message' => 'Ya hay una amistad con este usuario'], 422);
            } else {
                $datos = [];
                $datos['amigo_usuario_1'] = $usuario;
                $datos['amigo_usuario_2'] = $amigo;
                $datos['amigo_estado'] = '0';
                $datos['amigo_fecha_solicitud'] = date("Y-m-d");
                Amigos::create($datos);
                $dataamigo =  Usuarios::getResumenUsuario($usuario,$amigo);
                Notificaciones::crearnotificacion($usuario,$amigo,101,$amigo);
                return response()->json(['message' => 'Solicitud Enviada', 'usuario'=> $dataamigo ], 200);
            }
        } else {
            return response()->json(['message' => 'Hay una inconsistencia con el usuario'], 422);
        }
    }

    /**
     * Funcion para aceptar la invitacion de un amigo
     *
     * @param Request $request
    * @param [type] $id identificador del usuario que va a aceptar un amigo
     * @urlParam  id identificador del usuario que va a aceptar un amigo
     * @return void
     */
    public function aceptaramigo(Request $request, $id){
        $data = $request->all();
        $amigo = $data['amigo'];
        $usuario = $data['usuario'];
        if($id == $usuario){
            $amigos = Amigos::where(function ($query) use ($usuario,$amigo) {
                $query->where('amigo_usuario_2', '=', $usuario)
                    ->where('amigo_usuario_1', '=', $amigo);
            })->get();
            if(isset($amigos[0])){
                $amigos[0]->amigo_estado = 1;
                $amigos[0]->save();
                $dataamigo =  Usuarios::getResumenUsuario($usuario,$amigo);
                Notificaciones::where("source_user_id",$amigo)->where("dest_user_id",$usuario)->where("tipo","101")->delete();
                Notificaciones::crearnotificacion($usuario,$amigo,201,$amigo);
                return response()->json(['message' => 'Amigo aceptado', 'usuario'=> $dataamigo ], 200);
            } else {
                return response()->json(['message' => 'No tiene solicitudes de este amigo'], 422);
            }
        } else {
            return response()->json(['message' => 'Hay una inconsistencia con el usuario'], 422);
        }
    }

    /**
     * Funcion para eliminar un amigo
     * @param [type] $id identificador del usuario que va a eliminar un amigo
     * @urlParam  id identificador del usuario que va a eliminar un amigo
     * @param [type] $id_amigo identificador del amigo a eliminar
     * @urlParam id_amigo identificador del amigo a eliminar
     * @return void
     */
    public function deleteamigo($id,$id_amigo){
        $amigo = $id_amigo;
        $usuario = $id;
        if($id == $usuario){
            $amigos = Amigos::where(function ($query) use ($usuario,$amigo) {
                    $query->where('amigo_usuario_1', '=', $usuario)
                      ->where('amigo_usuario_2', '=', $amigo);
                })->orWhere(function ($query) use ($usuario,$amigo) {
                    $query->where('amigo_usuario_2', '=', $usuario)
                    ->where('amigo_usuario_1', '=', $amigo);
                })->get();

            if(count($amigos) > 0){
                $amigos[0]->delete();
                $dataamigo =  Usuarios::getResumenUsuario($usuario,$amigo);
                return response()->json(['message' => 'Amigo Rechazado o Eliminado', 'usuario'=> $dataamigo ], 200); 
            } else {
                return response()->json(['message' => 'No se encuentra amistad con este usuario'], 422); 
            }
        } else {
            return response()->json(['message' => 'Hay una inconsistencia con el usuario'], 422);
        }
    }

     /**
     * funcion para hacer registro y autenticacion de un usuario con formulario semi completo
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {
        // First we check if the user is coming from an external authentication provider...specifically Firebase
        try {
            $idTokenString = $request->input('Firebasetoken');
            if ($idTokenString) {
                $json = $this->loginFirebase($idTokenString, $request, true);
                if (isset($json['error_code'])) {
                    abort($json['error_code'], $json['message']);
                }
                return response()->json($json, 201);
            }
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $user = User::where('user_email', $data['email'])->first();
            if (!$user) {
                $user = new User();
                $user->user_email =  $data['email'];
                $user->user_user = $data['email'];
                $user->user_password =  $data['password'];
                $user->user_names = $data['names'];
                $user->user_lastnames = $data['lastnames'];
                if(isset( $data['city'])){
                    $user->user_city = $data['city'];
                }
                if(isset( $data['address'])){
                    $user->user_address = $data['address'];
                }
                $user->user_phone = $data['phone'];
                $user->user_level = 2;
                $user->user_state = 1;
                $user->save();
                $token =  $user->createToken('Personal Access Token')->accessToken;
                $json = $this->respondWithToken($token, $user);
                return response()->json($json, 201);
            } else {
                return response()->json(['message' => 'El usuario ya se encuentra registrado',"error"=>1], 409);
            }
        } catch (ModelNotFoundException $ex) { // User not found
            return response()->json(['message' => 'Usuario o Password inválidos',"error"=>1], 403);
        } catch (Exception $ex) { // Anything that went wrong
            return response()->json(['message' => 'ha ocurrido un error intente mas tarde',"error"=>1], 422);
        }
    }

    public function restorepassword(Request $request){
        $data = $request->all();
        if(isset($data['email'])){
            $user = User::where("user_email",$data['email'])->get();
            if(isset($user[0])){
                $user[0]->user_code = $this->generate_string(6);
                $user[0]->save();
                Mail::to($user[0]->user_email)->send(new Restorepassword($user[0]));
                $res = [];
                $res['message'] = "codigo Enviado";
                $res['status'] = 1;
            } else {
                $res = [];
                $res['message'] = "Usuario no Encontrado";
                $res['status'] = 2;
            }
        } else {
            $res = [];
            $res['message'] = "Usuario no Encontrado";
            $res['status'] = 2;
        }
        return response()->json($res);
        
    }

    public function changepassword(Request $request){
        $data = $request->all();
        if(isset($data['email']) &&  isset($data['code']) && isset($data['password'])){
            $user = User::where("user_email",$data['email'])->get();
            if(isset($user[0]) && $user[0]->user_code == $data['code']  ){
                $user[0]->user_password =  Hash::make($data['password']);
                $user[0]->user_code = $this->generate_string(6);
                $user[0]->save();
                $res = [];
                $res['message'] = "contraseña actualizada";
                $res['status'] = 1;
            } else {
                $res = [];
                $res['message'] = "codigo no valido";
                $res['status'] = 2;
            }
        } else {
            $res = [];
            $res['message'] = "Usuario no Encontrado";
            $res['status'] = 2;
        }
        return response()->json($res);
        
    }

    public function updatepassword(Request $request){
        $data = $request->all();
        $userau  = auth()->user();
        if($userau->user_id){
                $user = User::find($userau->user_id);
                $currentpassword = ($data['currentpassword']);
                if( Hash::check($currentpassword,$user->user_password) ){
                    $user->user_password = Hash::make($data['password']);
                    $user->user_code = $this->generate_string(6);
                    $user->save();
                    $res = [];
                    $res['message'] = "contraseña actualizada";
                    $res['status'] = 1;
                } else {
                    $res = [];
                    $res['message'] = "La contraseña actual no es válida";
                    $res['status'] = 2;
                }
               
        } else {
            $res = [];
            $res['message'] = "Usuario no Encontrado";
            $res['status'] = 2;
        }
        return response()->json($res);
        
    }
   

    public function generate_string($strength = 16) {
        $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

    public function cargaMasiva(){
        set_time_limit(10000);
        $envios = $this->getEnviocsv();
        $usuarios = $this->getUsuarioscsv();
        foreach ($usuarios as $key => $usuario) {
            $idold = $usuario['idold'];
            unset($usuario['idold']);
            $newuser = User::insertGetId($usuario);
            if(isset($envios[$idold])){
                foreach ($envios[$idold] as $key => $envio) {
                    $envio['user_id'] = $newuser;
                    Useraddress::insert($envio);
                }
            }
        }
        return response()->json($usuarios);
    }


    public function getUsuarioscsv()  {
        $filePath = public_path('usuarios.csv'); 
        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setDelimiter(';');
        // Lee los registros del archivo CSV
        $records = $csv->getRecords();
        // Procesa los registros como desees
        $usuarios = [];

        foreach ($records as $key => $record) {
            /*echo "<pre>";
            print_r($record);
            echo "</pre>";*/
            if($key > 0){
                $usuario = [];
                $usuario['idold'] = $record[0];
                $usuario['user_names'] = $record[1];
                $usuario['user_lastnames'] = $record[2];
                $usuario['user_email'] = $record[3];
                if($record[5]!= 'NULL'){
                    $usuario['user_typeid'] = $record[5];
                }
                if($record[6]!= 'NULL'){
                    $usuario['user_idnumber'] = $record[6];
                }
                $usuario['user_city'] = $record[7];
                $usuario['user_phone'] = $record[9];
                $usuario['user_address'] = $record[10];
                $usuario['user_level'] = $record[11];
                $usuario['user_state'] = $record[12];
                if($record[13]!= 'NULL'){
                    $usuario['user_user'] = $record[13];
                } else {
                    $usuario['user_user'] = $record[3];
                }
                $usuario['user_password'] = $record[14];
                if($record[15]!= 'NULL'){
                    $usuario['user_delete'] = $record[15];
                }
                if($record[17]!= 'NULL'){
                    $usuario['user_code'] = $record[17];
                }
                if($record[18]!= 'NULL'){
                    $usuario['user_informacion'] = $record[18];
                }
                array_push($usuarios,$usuario);
            }
        }
        return $usuarios;
    }

    public function getEnviocsv()  {
        $filePath = public_path('direcciones.csv'); 
        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setDelimiter(';');
        // Lee los registros del archivo CSV
        $records = $csv->getRecords();
        // Procesa los registros como desees
        $envio = [];
        foreach ($records as $key => $record) {
            /*echo "<pre>";
            print_r($record);
            echo "</pre>";*/
            if($key > 0){
                if(!isset($envio[$record[1]])){
                    $envio[$record[1]] = [];
                }
                $direccion = [];
                $direccion['nombre'] = $record[2];
                $direccion['documento'] = $record[3];
                $direccion['telefono'] = $record[4];
                $direccion['pais'] = $record[5];
                $direccion['ciudad'] = $record[6];
                $direccion['ciudadnombre'] = $record[7];
                $direccion['barrio'] = $record[8];
                $direccion['direccion'] = $record[9];
                $direccion['adicional'] = $record[10];
                $direccion['principal'] = $record[11];
                array_push($envio[$record[1]],$direccion);
            }
        }
        return $envio;
    }
    
}