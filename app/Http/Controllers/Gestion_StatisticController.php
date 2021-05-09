<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;

class Gestion_StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::select("SELECT
        DATE_FORMAT(m1, '%m') AS month,
        DATE_FORMAT(m1, '%Y') AS year,
        DAY(LAST_DAY(m1)) AS days,
        (select IFNULL(COUNT(e.id),0) * 100 / DAY(LAST_DAY(m1)) FROM `events` as e WHERE  e.calendar_id = $id And MONTH(e.start) = DATE_FORMAT(m1, '%m')) AS `nb`,(select IFNULL(COUNT(e.id),0) FROM `events` as e WHERE  e.calendar_id = $id And MONTH(e.start) = DATE_FORMAT(m1, '%m')) AS `even`
      FROM
      (
        SELECT 
         DATE_FORMAT(NOW() ,'%Y-01-01') + INTERVAL m MONTH AS m1
        FROM
         (
           SELECT
             @rownum:=@rownum+1 AS m
           from
            (SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4) t1,
            (SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4) t2,
            (SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4) t3,
            (SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4) t4,
            (SELECT @rownum:=-1) t0
         ) d1
       ) d2 
      WHERE m1 <= DATE_FORMAT(NOW() ,'%Y-12-30') 
      
      GROUP BY month
      ORDER BY month");
    //   dd($data);
    return view('Statistic_data',compact('data'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
