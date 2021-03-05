<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['title'] = "Home";
		return view('home',$data);
	}

	public function home()
	{
		if(in_groups('admin')){
			return redirect()->to(site_url('admin/dashboard'))->withCookies()->with('message', lang('Auth.loginSuccess'));
		}
		if(in_groups('staff')){
			return redirect()->to(site_url('admin/dashboard'))->withCookies()->with('message', lang('Auth.loginSuccess'));
		}
		if(in_groups('collector')){
			return redirect()->to(site_url('collector/dashboard'))->withCookies()->with('message', lang('Auth.loginSuccess'));
		}
	}
}
