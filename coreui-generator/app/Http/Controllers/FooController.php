<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFooRequest;
use App\Http\Requests\UpdateFooRequest;
use App\Repositories\FooRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FooController extends AppBaseController
{
    /** @var  FooRepository */
    private $fooRepository;

    public function __construct(FooRepository $fooRepo)
    {
        $this->fooRepository = $fooRepo;
    }

    /**
     * Display a listing of the Foo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $foos = $this->fooRepository->all();

        return view('foos.index')
            ->with('foos', $foos);
    }

    /**
     * Show the form for creating a new Foo.
     *
     * @return Response
     */
    public function create()
    {
        return view('foos.create');
    }

    /**
     * Store a newly created Foo in storage.
     *
     * @param CreateFooRequest $request
     *
     * @return Response
     */
    public function store(CreateFooRequest $request)
    {
        $input = $request->all();

        $foo = $this->fooRepository->create($input);

        Flash::success('Foo saved successfully.');

        return redirect(route('foos.index'));
    }

    /**
     * Display the specified Foo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $foo = $this->fooRepository->find($id);

        if (empty($foo)) {
            Flash::error('Foo not found');

            return redirect(route('foos.index'));
        }

        return view('foos.show')->with('foo', $foo);
    }

    /**
     * Show the form for editing the specified Foo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $foo = $this->fooRepository->find($id);

        if (empty($foo)) {
            Flash::error('Foo not found');

            return redirect(route('foos.index'));
        }

        return view('foos.edit')->with('foo', $foo);
    }

    /**
     * Update the specified Foo in storage.
     *
     * @param int $id
     * @param UpdateFooRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFooRequest $request)
    {
        $foo = $this->fooRepository->find($id);

        if (empty($foo)) {
            Flash::error('Foo not found');

            return redirect(route('foos.index'));
        }

        $foo = $this->fooRepository->update($request->all(), $id);

        Flash::success('Foo updated successfully.');

        return redirect(route('foos.index'));
    }

    /**
     * Remove the specified Foo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $foo = $this->fooRepository->find($id);

        if (empty($foo)) {
            Flash::error('Foo not found');

            return redirect(route('foos.index'));
        }

        $this->fooRepository->delete($id);

        Flash::success('Foo deleted successfully.');

        return redirect(route('foos.index'));
    }
}
