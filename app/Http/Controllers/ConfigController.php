<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Http\Requests\StoreConfigRequest;
use App\Http\Requests\UpdateConfigRequest;
use Illuminate\Http\Request;

class ConfigController extends Controller
{

    public function create()
    {
        //
        $config= Config::find('message.payed');
        if($config==null){
            $config= new Config();
            $config->key= 'message.payed';
            $config->value= '<p class="MsoNormal" style="mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal; mso-outline-level: 2;"><strong><span style="font-family: helvetica, arial, sans-serif;"><span style="font-size: 18pt;">Terima Kasih</span></span></strong></p>
            <p class="MsoNormal" style="mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;"><span style="font-size: 12pt; font-family: helvetica, arial, sans-serif;">Telah bergabung dengan <strong>HIMATIFA X Partnership UI/UX Mini Bootcamp</strong>. <strong>HIMATIFA X Partnership UI/UX Mini Bootcamp</strong> merupakan rangkaian mini bootcamp yang diadakan oleh <strong>Himpunan Mahasiswa Informatika Universitas Pembangunan Nasional "Veteran" Jawa Timur</strong> dengan tujuan untuk mengenalkan UI/UX dikalangan pelajar/mahasiswa/umum.</span></p>
            <p class="MsoNormal" style="mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;"><span style="font-family: helvetica, arial, sans-serif;"><strong><span style="font-size: 12pt;">HIMATIFA X Partnership UI/UX Mini Bootcamp</span></strong><span style="font-size: 12pt;">&nbsp;diperuntukan untuk pelajar/mahasiswa/umum. Acara ini mengusung tema "<strong>Show Your Skills and Build Your Career</strong>" dengan harapan peserta dapat meningkatkan wawasan, kemampuan serta dapat karir di bidang UI/UX</span></span></p>
            <ul type="disc">
            <li class="MsoNormal" style="line-height: normal; font-family: helvetica, arial, sans-serif;"><span style="font-size: 12pt; font-family: helvetica, arial, sans-serif;">&nbsp;E-sertifikat</span></li>
            <li class="MsoNormal" style="line-height: normal; font-family: helvetica, arial, sans-serif;"><span style="font-size: 12pt; font-family: helvetica, arial, sans-serif;">&nbsp;Ilmu</span></li>
            <li class="MsoNormal" style="line-height: normal; font-family: helvetica, arial, sans-serif;"><span style="font-size: 12pt; font-family: helvetica, arial, sans-serif;">&nbsp;Menambah pengalaman dan networking</span></li>
            </ul>
            <p class="MsoNormal" style="mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;">&nbsp;</p>
            <p class="MsoNormal" style="mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;"><span style="font-size: 12pt; font-family: helvetica, arial, sans-serif;">Untuk informasi lebih lanjut terkait acara anda dapat bergabung pada link berikut :</span></p>
            <p><a class="btn btn-success" href="#">Bergabung dengan Whatsapp</a></p>';
            $config->save();
        }
        return view('back.payed.editor', compact('config'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required',
            'value' => 'required',
        ]);

        $config= Config::find('message.payed');
        if($config==null){
            $config= new Config();
            $config->key= $request->key;
        }
        $config->value= $request->value;
        $config->save();
        return redirect()->route('admin.editor')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function show(Config $config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function edit(Config $config)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConfigRequest  $request
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConfigRequest $request, Config $config)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function destroy(Config $config)
    {
        //
    }
}
