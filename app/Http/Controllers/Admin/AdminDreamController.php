<?php

namespace App\Http\Controllers\Admin;

use App\Enums\DreamStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Dream;

/**
 * Class AdminDreamController
 * @package App\Http\Controllers\Admin
 */

/**
 * @method accept(int $id)
 * Accept the dream by given id
 * @param int $id
 * @return \Illuminate\Http\RedirectResponse
 */

/**
 * @method delete(int $id)
 * Delete the dream by given id
 * @param int $id
 * @return \Illuminate\Http\RedirectResponse
 */
class AdminDreamController extends  Controller
{

    /**
     * Accept the dream by given id
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept($id)
    {

        if (is_null($id)) {
            abort(404);
        }
        $dream = Dream::find($id);
        if (is_null($dream)) {
            session()->flash('error', 'Dream not found');
            return redirect()->back();
        }
        try {
            $dream->update(['status' => DreamStatusEnum::APPROVE->value]);
            session()->flash('message', 'Dream accepted successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Error accepting dream');
        }
        return redirect()->back();
    }

/**
 * Delete the dream by given id.
 *
 * This method attempts to find the dream with the specified id. If the dream is found,
 * it is deleted, and a success message is flashed to the session. If the dream is not
 * found, an error message is flashed. If the id is not provided, a 404 error is triggered.
 *
 * @param int $id The id of the dream to be deleted.
 * @return \Illuminate\Http\RedirectResponse Redirects back with a session message.
 */
    public function delete($id)
    {
        if ($id) {
            $dream = Dream::findOrFail($id);
            if ($dream) {
                $dream->delete();
                session()->flash('message', 'Dream deleted successfully');
                return redirect()->back();
            } else {
                session()->flash('error', 'Dream not found');
                return redirect()->back();
            }
        } else {
            abort(404);
        }
    }


    /**
     * Restore the dream by given id.
     *
     * This method attempts to find the dream with the specified id. If the dream is found,
     * it is restored, and a success message is flashed to the session. If the dream is not
     * found, an error message is flashed. If the id is not provided, a 404 error is triggered.
     *
     * @param int $id The id of the dream to be restored.
     * @return \Illuminate\Http\RedirectResponse Redirects back with a session message.
     */
    public function restore($id)
    {
        if (is_null($id)) {
            abort(404);
        }
        $dream = Dream::find($id);
        if (is_null($dream)) {
            session()->flash('error', 'Dream not found');
            return redirect()->back();
        }
        try {
            $dream->restore();
            session()->flash('message', 'Dream restored successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Error restoring dream');
        }
        return redirect()->back();
    }

    public function show($id){
        return view('admin.dreams.show' , ['dream' => Dream::find($id) ]);
    }

    public function editStep($id){
        return view('admin.dreams.steps.edit' , ['id'=> $id ]);
    }
}
