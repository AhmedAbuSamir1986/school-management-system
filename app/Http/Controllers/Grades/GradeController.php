<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Response;
use App\Http\Requests\StoreGrades;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $grades = Grade::all();
    return view('pages.Grades.index',compact('grades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreGrades $request)
  {
      try {
          $validated = $request->validated();
          $grade = new Grade();
          $grade->Name = ['en' => $request->Name_en, 'ar' => $request->Name];
          $grade->Notes = $request->Notes;
          $grade->save();
          toastr()->success(trans('messages.Success'));
          return redirect()->route('Grades.index');
      }
      catch (\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(StoreGrades $request)
  {
      try {

          $validated = $request->validated();
          $Grades = Grade::findOrFail($request->id);
          $Grades->update([
              $Grades->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
              $Grades->Notes = $request->Notes,
          ]);
          toastr()->success(trans('messages.Update'));
          return redirect()->route('Grades.index');
      }
      catch
      (\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
      $MyClass_id = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');
      if($MyClass_id->count() == 0) {
          $grades = Grade::findOrFail($request->id)->delete();
          toastr()->error(trans('messages.Delete'));
          return redirect()->route('Grades.index');
      }
      else {
          toastr()->error(trans('schoolgrade_trans.delete_grade_error'));
          return redirect()->route('Grades.index');
      }
  }

}

?>
