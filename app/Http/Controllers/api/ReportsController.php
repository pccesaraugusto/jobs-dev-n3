<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

/**
 * Autor: Paulo Augusto
 * Classe responsavel pelos metodos reports
 * **/
class ReportsController extends Controller
{
    /**
     * Metodo: Responsavel pela lista dos reports cadastrados na base de dados na tabela reports
     * **/
    public function getAllReports() {
        $reports = Report::get()->toJson(JSON_PRETTY_PRINT);
        return response($reports, 200);
    }

     /**
     * Metodo: Responsavel pela criacao de novos registros na tabela reports
     * **/
    public function createReports(Request $request) {
        #verificando se o usuario esta autenticado
        if (!Auth::guard('api')->check()) {
            return response()->json(['success' => false, 'message' => 'Usuário não autenticado'], 200);
        }

        #gravando o novo registro na base de dados na tabela reports
        Report::create($request->all());

        return response()->json(['success' => false, 'message' => 'Reports cadastrados com sucesso'], 200);

    }

     /**
     * Metodo: Reponsavel por obter um determinado reports por id
     * **/
    public function getReports($id) {
        return Report::findOrFail($id);
    }

     /**
     * Metodo: Responsavel pela alteracao de um determinado reports existente na base de dados
     * **/
    public function updateReports(Request $request, $id) {
        #verificando se o usuario esta autenticado
        if (!Auth::guard('api')->check()) {
            return response()->json(['success' => false, 'message' => 'Usuário não autenticado'], 200);
        }

        #recupera o registro pelo id para realizar a alteracao dos dados
        $reg = Report::findOrFail($id);

        #efetiva a alteracao
        $reg->update($request->all());

        return response()->json(['success' => false, 'message' => 'Reports alterdo com sucesso'], 200);
    }

     /**
     * Metodo: Responsavel pela exclusao de um determinado reports por id
     * **/
    public function deleteReports($id) {
        #verificando se o usuario esta autenticado
        if (!Auth::guard('api')->check()) {
            return response()->json(['success' => false, 'message' => 'Usuário não autenticado'], 200);
        }

        #recupera o registro pelo id para realizar a exclusao dos dados
        $reg = Report::findOrFail($id);

        #efetiva a alteracao
        $reg->delete();

        return response()->json(['success' => false, 'message' => 'Reports excluido com sucesso'], 200);

    }

}
