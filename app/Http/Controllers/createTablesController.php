<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createTablesController extends Controller
{
    
    public function create_table(){

        /*Schema::table('courses', function (Blueprint $table) {
            $table->string('link')->nullable();
        });*/
/*
        Schema::table('actions', function (Blueprint $table) {
            $table->integer('submitted')->default(0);
            $table->integer('approved')->default(0);
        });
*/
        /*
        Schema::table('actions', function (Blueprint $table) {
            $table->drop();
        });

        Schema::create('actions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_description')->nullable();
            $table->string('purpose')->nullable();
            $table->string('expected_result')->nullable();
            $table->string('method')->nullable();
            $table->string('time_place')->nullable();
            $table->string('person_in_charge')->nullable();
            $table->string('indicator_success')->nullable();
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('results', function (Blueprint $table) {
            $table->drop();
        });

        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->float('result');
            $table->string('final_result');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('course_id')->unsigned();
            $table->timestamps();
        });*/
    }
}
