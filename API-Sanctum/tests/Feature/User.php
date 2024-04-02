<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class User extends TestCase
{
    public function testRegisterSuccess(){
        $this->post('/api/users',[
            'nama_pengguna' => 'dian',
            'email'=>'admin1@gmail.com',
            'password'=>'admin123',
            'telepon'=>'0892763821',
            'alamat'=>'kotabumi'
        ])->assertStatus(201)
            ->assertJson([
                'data'=>[
                    'nama_pengguna' => 'dian',
                    'email'=>'admin1@gmail.com',
                    'telepon'=>'0892763821',
                    'alamat'=>'kotabumi'
                ]
            ]);

    }

    // public function testRegisterFailed(){
    //     $this->post('/api/users',[
    //         'nama_pengguna' => '',
    //         'email'=>'',
    //         'password'=>'',
    //         'telepon'=>'',
    //         'alamat'=>''
    //     ])->assertStatus(400)
    //         ->assertJson([
    //             'errors'=>[
    //                 'nama_pengguna' => [
    //                     "the nama_pengguna field is required."
    //                 ],
    //                 'email'=>[
    //                     "the email field is required."
    //                 ],
    //                 'password'=>[
    //                     "the password field is required."
    //                 ],
    //                 'telepon'=>[
    //                     "the telepon field is required."
    //                 ],
    //                 'alamat'=>[
    //                     "the alamat field is required."
    //                 ],
    //             ]
    //         ]);

    //}

    public function testRegisterUsernameAlreadyExists(){
        $this->testRegisterSuccess();
        $this->post('/api/users',[
            'nama_pengguna' => 'dian',
            'email'=>'admin1@gmail.com',
            'password'=>'admin123',
            'telepon'=>'0892763821',
            'alamat'=>'kotabumi'
        ])->assertStatus(400)
            ->assertJson([
                'errors'=>[
                    'email'=>[
                        "email already registered "
                    ]
                    ]
            ]);
    }
}
