<?php

namespace App\Listeners;

use App\Events\ProjectSaved;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OptimizeProjectImage
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
     * @param  \App\Events\ProjectSaved  $event
     * @return void
     */
    public function handle(ProjectSaved $event)
    {
        $image = Image::make(Storage::disk('public')->get($event->project->image))
            ->widen(600)
            ->limitcolors(255) //limitar los colores daña mucho la imagen
            ->encode();

        //ahora reemplazo la imagen
        Storage::disk('public')->put($event->project->image, (string) $image);
    }
}
