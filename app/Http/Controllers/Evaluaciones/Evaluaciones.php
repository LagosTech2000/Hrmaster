<?php

namespace App\Http\Controllers\Evaluaciones;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Socketlabs\SocketLabsClient;
use Socketlabs\Message\BasicMessage;
use Socketlabs\Message\EmailAddress;
use Illuminate\Support\Facades\Auth;


class Evaluaciones extends Controller
{
    //
    public function index()
    {

        $data = DB::table('empleados')->get();

        $arrData = json_decode(json_encode($data), true);

        return View('/evaluaciones/evaluaciones')->with(['data' => $arrData]);
    }


    public function evaluar(Request $req)
    {

        session_start();
        $idempleado = $req->id;
        if ($idempleado != null) {
            $_SESSION['idempleado'] = $req->id;
        } else {
            $idempleado = $_SESSION['idempleado'];
        }

        $enviar = $req->guardar;


        if ($enviar) {

            $puntaje = 0;
            $arrpuntaje = array(
                intval($req->trabaja_a_todo_potencial),
                intval($req->calidad_trabajo),
                intval($req->consistencia_trabajo),
                intval($req->comunicacion),
                intval($req->trabajo_independiente),
                intval($req->toma_iniciativa),
                intval($req->trabajo_grupo),
                intval($req->productividad),
                intval($req->creatividad),
                intval($req->honestidad),
                intval($req->integridad),
                intval($req->relaciones_compañeros_trabajo),
                intval($req->relaciones_clientes),
                intval($req->habilidades_tecnicas),
                intval($req->fiabilidad),
                intval($req->puntualidad),
                intval($req->asistencia),
            );
            $i = 0;
            for ($i; $i < count($arrpuntaje); $i++) {
                $puntaje += $arrpuntaje[$i];
            }


            $hoy = date('Y-m-d h:i:s');
            DB::table('evaluaciones')
                ->insert([
                    'trabaja_a_todo_potencial' => intval($req->trabaja_a_todo_potencial),
                    'calidad_trabajo' => intval($req->calidad_trabajo),
                    'consistencia_trabajo' => intval($req->consistencia_trabajo),
                    'comunicacion' => intval($req->comunicacion),
                    'trabajo_independiente' => intval($req->trabajo_independiente),
                    'toma_iniciativa' => intval($req->toma_iniciativa),
                    'trabajo_grupo' => intval($req->trabajo_grupo),
                    'productividad' => intval($req->productividad),
                    'creatividad' => intval($req->creatividad),
                    'honestidad' => intval($req->honestidad),
                    'integridad' => intval($req->integridad),
                    'relaciones_compañeros_trabajo' => intval($req->relaciones_compañeros_trabajo),
                    'relaciones_clientes' => intval($req->relaciones_clientes),
                    'habilidades_tecnicas' => intval($req->habilidades_tecnicas),
                    'fiabilidad' => intval($req->fiabilidad),
                    'puntualidad' => intval($req->puntualidad),
                    'asistencia' => intval($req->asistencia),
                    'objetivos_alcanzados' => $req->objetivos_alcanzados,
                    'objetivos_proxima_evaluacion' => $req->objetivos_proxima_evaluacion,
                    'comentarios' => $req->comentarios,
                    'eval_created_at' => $hoy,
                    'idEmpleado' => intval($idempleado),
                    'valoracion' => $puntaje,
                    'revisor' => $req->revisor

                ]);

            $empleado = DB::table('empleados')
                ->where('empleados.id', $idempleado)
                ->join('users', 'users.id', 'empleados.idUser')
                ->first();

            // $client = new SocketLabsClient(env('SOCKETLABS_SERVER_ID'), env('SOCKETLABS_API_KEY'));
            // $message = new BasicMessage();

            // $message->subject = 'Hola de parte de HrMaster!';
            // $message->htmlBody = '<h1>Se le informa que ha sido evaluado!</h1><br/><p>Su Valoracion: ' . $puntaje . ' </p>';
            // $message->plainTextBody = 'Hello, world!';
            // $message->from = new EmailAddress(env('SOCKETLABS_SENDER'), 'HrMaster');
            // $message->addToAddress($empleado->email);

            // $client->send($message);



            Session::flash('notiGuardado', 'Evaluacion de el empleado ' . $empleado->nombreEmpleado . ' registrada con exito!');
            return redirect()->route('evaluaciones');
        }

        $data = DB::table('empleados')
            ->where('id', $idempleado)
            ->first();

        $arrData = json_decode(json_encode($data), true);


        return View('/evaluaciones/evaluar')->with(['data' => $arrData]);
    }


    public function misevaluaciones()
    {


        // Get the authenticated user's information
        $user = Auth::user();

        $data = DB::table('evaluaciones')
            ->join('empleados', 'evaluaciones.idEmpleado', 'empleados.id')
            ->where('empleados.idUser', intval($user->id))
            ->orderBy('evaluaciones.eval_created_at', 'Desc')
            ->get();

        $arrData = json_decode(json_encode($data), true);


        return view('evaluaciones/misevaluaciones')->with(['data' => $arrData]);
    }

    public function evaluados(Request $req)
    {
        $enviar = $req->enviar;
        if ($enviar) {

            $data = DB::table('evaluaciones')
                ->join('empleados', 'evaluaciones.idEmpleado', 'empleados.id')
                ->where('empleados.areaTrabajo', $req->areaTrabajo)
                ->orderBy('evaluaciones.eval_created_at', 'Desc')
                ->get();

            $arrData = json_decode(json_encode($data), true);

          
            $maxIndividualValue=68;

            $data2 = $data->groupBy('nombreEmpleado')->map(function ($group) use ($maxIndividualValue) {
                $total = $group->sum('valoracion');
                return round(($total / ($group->count() * $maxIndividualValue)) * 68, 2);
            });




            return view('evaluaciones/evaluados')->with(['data' => $arrData,'data2' => $data2]);
        }

        return view('evaluaciones/evaluados');

    }



    public function pdf()
    {

        $user = Auth::user();

        $data = DB::table('evaluaciones')
            ->join('empleados', 'evaluaciones.idEmpleado', 'empleados.id')
            ->where('empleados.idUser', intval($user->id))
            ->orderBy('evaluaciones.eval_created_at', 'Desc')
            ->first();

        // var_dump($data);
        // die();

        $pdf = Pdf::loadView('/evaluaciones/resumen', ['data' => $data]);

        return $pdf->stream("resumen.pdf");
    }

    public function pdf2(Request $req)
    {

        $data = DB::table('evaluaciones')
            ->join('empleados', 'evaluaciones.idEmpleado', 'empleados.id')
            ->where('empleados.idUser', intval($req->id))
            ->orderBy('evaluaciones.eval_created_at', 'Desc')
            ->first();

        // var_dump($data);
        // die();

        $pdf = Pdf::loadView('/evaluaciones/resumen', ['data' => $data]);

        return $pdf->stream("resumen.pdf");
    }
}
