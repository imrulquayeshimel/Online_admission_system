@extends(Auth::user()->is_admin?'layouts.admin':'layouts.user')
