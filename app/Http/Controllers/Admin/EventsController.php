<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Event\BulkDestroyEvent;
use App\Http\Requests\Admin\Event\DestroyEvent;
use App\Http\Requests\Admin\Event\IndexEvent;
use App\Http\Requests\Admin\Event\StoreEvent;
use App\Http\Requests\Admin\Event\UpdateEvent;
use App\Models\Event;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class EventsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEvent $request
     * @return array|Factory|View
     */
    public function index(IndexEvent $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Event::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'price', 'category', 'total_seats', 'start_time', 'end_time', 'is_custom_seat'],

            // set columns to searchIn
            ['id', 'name', 'category', 'custom_seats']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.event.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.event.create');

        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEvent $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEvent $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $sanitized['custom_seats'] = json_encode($sanitized['custom_seats']);
        // Store the Event
        $event = Event::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/events'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/events');
    }

    /**
     * Display the specified resource.
     *
     * @param Event $event
     * @throws AuthorizationException
     * @return void
     */
    public function show(Event $event)
    {
        $this->authorize('admin.event.show', $event);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Event $event
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Event $event)
    {
        $this->authorize('admin.event.edit', $event);

        $event->custom_seats = json_decode($event->custom_seats);
        return view('admin.event.edit', [
            'event' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEvent $request
     * @param Event $event
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEvent $request, Event $event)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $sanitized['custom_seats'] = json_encode($sanitized['custom_seats']);

        // Update changed values Event
        $event->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/events'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEvent $request
     * @param Event $event
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEvent $request, Event $event)
    {
        $event->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEvent $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEvent $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Event::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
