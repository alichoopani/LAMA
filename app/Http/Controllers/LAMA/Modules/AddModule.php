<?php

namespace App\Http\Controllers\LAMA\Modules;

use App\Entities\Module;
use App\Http\Controllers\LAMA\Handler\Response;
use Illuminate\Support\Facades\DB;

class AddModule
{
    public function view()
    {
        return view('LAMA.Modules.AddModule');
    }

    public function getModulesList()
    {
        $modules = Module::all()->toArray();
        return Response::Handle(true, ['modules' => $modules], 1, 20000);
    }

    public function addModule($req)
    {

        try {
            DB::transaction(function () use ($req) {
                $newModule = new Module();
                $newModule->title = $req['title'];
                $newModule->sys_title = $req['sys_title'];
                $newModule->file_name = $req['file_name'];
                $newModule->status = (int)$req['status'];
                $newModule->parent_id = ((int)$req['parent_id'] == 0) ? null : (int)$req['parent_id'];
                $newModule->has_parent = ((int)$req['parent_id'] == 0) ? 0 : 1;
                $newModule->save();
                if (isset($req['methods']))
                    foreach ($req['methods'] as $item)
                        if (isset($item['public_name']))
                            $newModule->methods()->create($item);
                if ((int)$req['parent_id'] != 0) {
                    Module::where(['id' => $req['parent_id']])->update(['has_child' => 1]);
                }
            });
            //creat model of module
            $file = fopen('../app/Http/Controllers/LAMA/Modules/' . $req['file_name'] . '.php', 'w');
            $txt = '<?php
namespace App\Http\Controllers\LAMA\Modules;

class ' . $req['file_name'] . '
{';

            if (isset($req['methods']))
                foreach ($req['methods'] as $item)
                    $txt .= '
    public function ' . $item['sys_name'] . '() {
        //
    }
                ';
            $txt .= '
}
            ';
            fwrite($file, $txt);
            fclose($file);

            //create view of module
            $file = fopen('../resources/views/LAMA/Modules/' . $req['file_name'] . '.blade.php', 'w');
            fwrite($file, '');
            fclose($file);

            return Response::Handle(true, '', 1, 60000);
        } catch (\Exception $e) {
            return Response::Handle(false, ['errorCode' => $e->getMessage()], 2, 70000);
        }
    }


}
