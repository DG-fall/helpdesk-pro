<?php
use Illuminate\Support\Facades\Route; use App\Http\Controllers\Api\TicketController;
Route::middleware('auth:sanctum')->apiResource('tickets',TicketController::class);
