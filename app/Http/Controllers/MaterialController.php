<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class MaterialController extends Controller
{

	public function home()
	{
		return view('materials', [
			'type' => 'all',
		]);
	}

	public function materials($type)
	{
		return view('materials', [
			'type' => $type,
		]);
	}

	public function id($id)
	{
		return view('material_id', [
			'id' => $id,
		]);
	}
	
	public function materialsearch()
	{
		return view('materialsearch', [
			
		]);
	}
	
	public function index(){
		return view('index', [
		
		]);
	}
	
	public function info(){
		return view('info', [
		
		]);
	}
	
	public function material(){
		return view('material', [
		
		]);
	}
	
	
    public function api_all()
	{
		$ch = curl_init("niisku.lamk.fi:4320/all");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		echo ($response);
		
		/* TESTI TAULU */
		
		// $taul = [[
				// "_id" => "1",
				// "name" => "kangaskutomon reunanauha", 
				// "type" => 'tekstiili',
				// "location" => "LAMKINTYÖMAA",
				// "company" => "LAMK",
				// "materialDescription" => "Vanhaa nauhaa",
				// ],
			
				// [
					// "_id" => "2",
					// "name" => "pissapoika", 
					// "type" => 'muovi',
					// "location" => "LAMKINTYÖMAA",
					// "company" => "LAMK",
				// ],
			
				// [
					// "_id" => "3",
					// "name" => "puukarhu", 
					// "type" => 'puu',
					// "location" => "LAMKINTYÖMAA",
					// "company" => "LAMK",
				// ]];
		// echo json_encode($taul);
		
	}
	
	public function api_name($name)
	{
		$ch = curl_init("niisku.lamk.fi:4320/material/" . $name);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		echo $response;
	}
	
	public function api_id($id)
	{
		$ch = curl_init("niisku.lamk.fi:4320/id/" . $id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		echo $response;
	}
	
	public function api_type($type)
	{
		$ch = curl_init("niisku.lamk.fi:4320/type/" . $type);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		echo $response;
	}
	
	public function api_add(Request $request)
	{
		$datasend = $request->all();
		$ch = curl_init("niisku.lamk.fi:4320/material/add");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datasend));
		$response = curl_exec($ch);
		curl_close($ch);
		echo $response;
	}
	
	public function api_delete($id)
	{
		$url = "niisku.lamk.fi:4320/material/delete/" . $id;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		echo $response;
	}
	
	public function api_update(Request $request, $id)
	{
		$datasend = $request->all();
		$url = "niisku.lamk.fi:4320/material/update/" . $id;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datasend));
		$response = curl_exec($ch);
		curl_close($ch);
		echo $response;
	}
}
