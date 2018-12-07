<?php

namespace App\Listeners;

use App\Device;
use App\Event;

use App\Events\DoorClosedDetected;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogDoorClosedState
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DoorClosedDetected  $event
     * @return void
     */
    public function handle(DoorClosedDetected $data)
    {
      $device = Device::find($data->device_id);
      $createEvent = Event::Create(
          [
              'device_id' => $device->id,
              'status' => $device->status
          ]);
    }
}
