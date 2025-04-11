<?php

namespace Botble\Appointment\Http\Controllers;

use Botble\Appointment\Http\Requests\AppointmentRequest;
use Botble\Appointment\Models\Appointment;
use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Appointment\Tables\AppointmentTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Appointment\Forms\AppointmentForm;
use Botble\Base\Forms\FormBuilder;
use Theme;

class AppointmentController extends BaseController
{

    public function form()
    {
        // Rendu de ta vue plugin
        $html = view('plugins/appointment::form')->render();

        // Injecte le HTML dans une variable passée au thème
        return Theme::scope('custom-appointment', [
            'appointmentHtml' => $html,
        ])->render();
    }


    public function clientStore(Request $request, BaseHttpResponse $response)
    {
        Appointment::create([
            'user_id' => auth()->id(),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);

        return redirect()->route('appointment.form')->with('success', 'Rendez-vous enregistré avec succès !');
    }

    public function index(AppointmentTable $table)
    {
        PageTitle::setTitle(trans('plugins/appointment::appointment.name'));

        return $table->renderTable();
    }

    public function create(FormBuilder $formBuilder)
    {
        PageTitle::setTitle(trans('plugins/appointment::appointment.create'));

        return $formBuilder->create(AppointmentForm::class)->renderForm();
    }

    public function store(AppointmentRequest $request, BaseHttpResponse $response)
    {
        Appointment::create([
            'user_id' => auth()->id(),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);

        return redirect()->route('appointment.form')->with('success', 'Rendez-vous enregistré avec succès !');
        // $appointment = Appointment::query()->create($request->input());

        // event(new CreatedContentEvent(APPOINTMENT_MODULE_SCREEN_NAME, $request, $appointment));

        // return $response
        //     ->setPreviousUrl(route('appointment.index'))
        //     ->setNextUrl(route('appointment.edit', $appointment->getKey()))
        //     ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit(Appointment $appointment, FormBuilder $formBuilder)
    {
        PageTitle::setTitle(trans('core/base::forms.edit_item', ['name' => $appointment->name]));

        return $formBuilder->create(AppointmentForm::class, ['model' => $appointment])->renderForm();
    }

    public function update(Appointment $appointment, AppointmentRequest $request, BaseHttpResponse $response)
    {
        $appointment->fill($request->input());

        $appointment->save();

        event(new UpdatedContentEvent(APPOINTMENT_MODULE_SCREEN_NAME, $request, $appointment));

        return $response
            ->setPreviousUrl(route('appointment.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(Appointment $appointment, Request $request, BaseHttpResponse $response)
    {
        try {
            $appointment->delete();

            event(new DeletedContentEvent(APPOINTMENT_MODULE_SCREEN_NAME, $request, $appointment));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }
}
